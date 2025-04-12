<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Sector;
use App\Models\Category;

class CategoryController extends Controller
{
    //
    
    public function UploadCategoriesDB()
    {
        $filePath = public_path('category_priority.csv');

        if (!File::exists($filePath)) {
            return response()->json(['error' => 'File not found.'], 404);
        }

        $csvData = array_map('str_getcsv', file($filePath));

        // If first row is header
        $headers = array_shift($csvData);

        $formattedData = array_map(function($row) use ($headers) {
            return array_combine($headers, $row);
        }, $csvData);

        // return $formattedData;
 
        foreach ($formattedData as $key => $cat) {
             

                Sector::updateOrCreate(
                        ['name' => trim($cat['category_group'])]
                    );
                $sector = Sector::where('name', trim($cat['category_group']))->first();

                if ($sector) {
                    $data = [
                            'sector_id'       => $sector->id,
                            'name'            => trim($cat['category_name']),
                            'category_status' => 'published',
                            'cat_priority' => $cat['cat_priority']
                        ];
 
                    Category::updateOrCreate(
                        ['name' => trim($cat['category_name'])],
                        $data
                    );
 
                } 
            

        }
 

        return response()->json(['message' => 'Categories imported successfully']);
    }

}
