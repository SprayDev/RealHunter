<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('sendMail', [\App\Http\Controllers\apiController::class, 'send_mail'])->name('api.mail');
Route::post('licenses/filter', [\App\Http\Controllers\apiController::class, 'licenses_filter'])->name('api.license.filter');
