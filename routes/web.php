<?php

use Illuminate\Support\Facades\Route;
 
Route::get('/', function () {
    return redirect('/dashboard');
});
Route::match(['get', 'post'], '/register', function() {
    abort(404);
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
