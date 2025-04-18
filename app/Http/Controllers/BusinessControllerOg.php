<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Business;
use App\Models\Category;
use App\Models\Sector;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

ini_set('max_execution_time', 2000);

class BusinessControllerOg extends Controller
{

     
    public function __invoke(){ 
        $this->fetchData();
    }

    public function fetchData()
    {
        
        $city = "Mumbai, MH, India"; 
        // change default state city below

        $categories = Category::with('sector')
            // ->whereNotIn('name', [
            //     'travel agents',
            //     'old age homes',
            //     'eye hospitals',
            //     'ent doctors',
            //     'gastroenterologists',
            //     'kidney specialist doctors',
            //     'gynaecologist doctors',
            //     'pediatrician doctors',
            //     'orthodontists',
            //     'ophthalmologists',
            //     'occupational therapists',
            //     'interior designers',
            //     'fertility clinics',
            //     'homeopathic clinics',
            //     'counseling centre'
            // ])
            ->where('category_status', 'published')
             
            ->orderByRaw('CASE WHEN cat_priority = 0 THEN 1 ELSE 0 END, cat_priority')
            ->get();

        // return $categories;
 
        $url = 'https://local-business-data.p.rapidapi.com/search';
        $headers = [
            'Content-Type' => 'application/json',
            'x-rapidapi-host' => 'local-business-data.p.rapidapi.com',
            'x-rapidapi-key' => '6de7b1bde2msh7793091e0d46c68p1ea77cjsn105c9ca64c2f', 
        ];
        
        foreach ($categories as $category) {

            $cleanCategory = str_replace(' ', '_', strtolower($category->name));
            $cleanCity = str_replace([', ',' '], '_', strtolower($city));
            $fileName = "{$cleanCategory}_{$cleanCity}.json";

            $catcheFilePath = Storage::path("rapidapi/businesses/$fileName");
            if (file_exists($catcheFilePath)) {
                continue;
            }

            $data = [
                "queries" => [
                    "$category->name in $city",
                ],
                "limit" => 500,
                "region" => "in",
                "language" => "en",
                "coordinates" => "19.0760, 72.8777",
                "zoom" => 13,
                "dedup" => true,
                "extract_emails_and_contacts"=>true,
            ];

            Log::info('API log: ', $data);

            $response = Http::withOptions([
                'verify' => false,
            ])->withHeaders($headers)->post($url, $data);

            if ($response->status() === 200) {
                $businesses = $response->json();

                
                Storage::put("rapidapi/businesses/$fileName", json_encode($businesses, JSON_PRETTY_PRINT));

                $businesses = $businesses['data'];
                if(count($businesses) > 0) {
                    $this->insertData($businesses , "rapidapi/businesses/".$fileName , $category);
                }
                // sleep(1);
            }else{
                Log::error('API request failed', [
                    'url' => $url,
                    'status' => $response->status(),
                    'response' => $response->body(),
                    'data_sent' => $data,
                    'category' => $category->name,
                ]);

                return response()->json([
                    'url' => $url,
                    'status' => $response->status(),
                    'response' => $response->body(),
                    'data_sent' => $data,
                    'category' => $category->name,
                ]); 
            }    
        }

        Log::info('API request Finished', ['category' => $category->name]);

        return response()->json([
            'message' => 'All business data has been fetched and saved',
        ]);      
    }

    public function insertData($businesses,$fileName,$category)
    {
       
        foreach ($businesses as $key => $business) {

            // if ($business['business_status'] == 'OPEN') {
                // if($key > 2) {
                //     break;
                // }
                $exists = Business::where('name', $business['name'])->exists();
                if ($exists) {
                    continue;
                }

                $localImagePath = [];
                if (isset($business['photos_sample']) && isset($business['photos_sample'][0])) {
                    // foreach($business['photos_sample'] as $imgKey => $photos)
                    // {
                    $photos = $business['photos_sample'][0];

                        if($photos['type'] == 'photo') {
                            $imageUrl = $photos['photo_url'] ?? null;
                            $imageLargeUrl = null;

                            if ($imageUrl) {
                                try {

                                    $finfo = new \finfo(FILEINFO_MIME_TYPE);
                                    $extensions = [
                                        'image/jpeg' => 'jpeg',
                                        'image/jpg' => 'jpg',
                                        'image/png' => 'png',
                                        'image/gif' => 'gif',
                                        'image/webp' => 'webp',
                                    ];  

                                    $cleanBusinessName = preg_replace('/[^A-Za-z0-9 ]/', '', $business['name']); // remove special chars
                                    $cleanBusinessName = str_replace(' ', '_', $cleanBusinessName); // replace spaces with underscores
                                    $uuid = Str::uuid();
                                    $destinationPath = '/home/u994465197/domains/findbiz.easydoings.in/public_html/public/business_images/';
                                    if (!file_exists($destinationPath)) {
                                        mkdir($destinationPath, 0755, true);
                                    }

                                    if($imageUrl){
                                        $imageContent = file_get_contents($imageUrl);
                                        $mimeType = $finfo->buffer($imageContent);
                                        $extension = $extensions[$mimeType] ?? 'jpg';
                                        $filename = $cleanBusinessName . '_' . $uuid . '.' . $extension;
                                        $fullPath = $destinationPath . $filename;
                                        if($imageContent){
                                            file_put_contents($fullPath, $imageContent);
                                        }
                                        $localImagePath[] = 'business_images/' . $filename;
                                    }
                                    
                                } catch (\Exception $e) {
                                    Log::error("Image download failed: " . $e->getMessage());
                                }
                            }
                        }
                    // }
                }

                Business::create([
                    'name' => $business['name'] ?? null,
                    'address' => ($business['street_address'] ? Str::limit($business['street_address'], 200) :  ($business['address'] ? Str::limit($business['address'], 200) : null) ),
                    'zip_code' => ($business['zipcode'] ? Str::limit($business['zipcode'], 200) : null),
                    'city' => ($business['city'] ? Str::limit($business['city'], 200) : 'Mumbai'),
                    'state' => ($business['state'] ? Str::limit($business['state'], 200) : 'Maharashtra'),
                    'country' => 'India',
                    'category_id' => $category->id,
                    'sector_id' => $category->sector->id,
                    'phone_1' => $business['phone_number'] ?? null,
                    'ratings' => $business['rating'] ?? null,
                    'review_count' => $business['review_count'] ?? null,
                    'description' => $business['about']['summary'] ?? null,
                    'price' => isset($business['price_level']) ? json_encode($business['price_level'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE):null,
                    'hours' =>isset($business['working_hours']) ? json_encode($business['working_hours'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE):null,
                    'services' => is_array($business['subtypes']) ? implode(',', $business['subtypes']) : null,
                    'img_1' => $localImagePath[0] ?? null,
                    'latitude' => $business['latitude'] ?? null,
                    'longitude' => $business['longitude'] ?? null,
                    'website' => $business['website'] ?? null,
                    'timezone' => $business['timezone'] ?? null,
                    'google_id' => $business['google_id'] ?? null,
                    'place_id' => $business['place_id'] ?? null,
                    'details' => isset($business['about']['details']) ? json_encode($business['about']['details'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE):null,
                    'referance_json_file_path' => $fileName,
                ]);
            // }
        }
    }
}