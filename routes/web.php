<?php

use App\Http\Controllers\indexController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [indexController::class, 'index']);
//Route::get('/company', [indexController::class, 'company']);
//Route::get('/contacts', [indexController::class, 'contacts']);
Route::prefix('/permissions')->group(function(){
    Route::middleware('cache.headers:public;max_age=2628000;etag')->group(function () {
        Route::get('/', [indexController::class, 'permissions'])->middleware('cache.headers:public;max_age=2628000;etag');
    });
    Route::get('/{slug}', [indexController::class, 'permission'])->name('licenses.single');
});
Route::prefix('/tours')->group(function(){
    Route::get('/', [indexController::class, 'tours']);
    Route::get('/{slug}', [indexController::class, 'tour'])->name('tours.single');;
});
Route::prefix('/blog')->group(function(){
    Route::get('/', [indexController::class, 'blog']);
    Route::get('/{slug}', [indexController::class, 'post']);
});
Route::get('/{page}', \App\Http\Controllers\staticController::class)->where('page', 'company|contacts');
