<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\BusinessControllerOg;

// Artisan::command('inspire', function () {
//     $this->comment(Inspiring::quote());
// })->purpose('Display an inspiring quote');


Schedule::call(new BusinessControllerOg)->dailyAt('00:57')->timezone('Asia/Kolkata');

Schedule::call(new BusinessControllerOg)->dailyAt('04:30')->timezone('Asia/Kolkata');

Schedule::call(new BusinessControllerOg)->dailyAt('08:30')->timezone('Asia/Kolkata');