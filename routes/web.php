<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RoutingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BusinessControllerOg;

Route::get('/', function () {
    return redirect('/dashboard');
});

// Route::get('/upload-category', [App\Http\Controllers\CategoryController::class, 'UploadCategoriesDB']);
// Route::get('/fetch-business-api', [App\Http\Controllers\BusinessControllerOg::class, 'fetchData']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', [RoutingController::class, 'dashboard'])->name('dashboard');
    Route::get('/categories', [RoutingController::class, 'categories'])->name('categories');
    Route::post('/add-category', [RoutingController::class, 'addCategory'])->name('add.category');

    Route::post('/articles', [RoutingController::class, 'allArticles'])->name('articles');
    Route::post('/edit-article', [RoutingController::class, 'editArticle'])->name('edit.article');

});
