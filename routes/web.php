<?php

use App\Http\Controllers\CookieController;
use App\Http\Controllers\EncodeDecodeController;
use App\Http\Controllers\FavouriteController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return redirect('/gallery');
});
Route::middleware(['auth'])->group(function () {
    Route::post('/decode',[GalleryController::class,'decode']);
    Route::resource('/user' , UserController::class);
    Route::post('/update-password',[UserController::class,'updatePassword'])->name('update_password');
    Route::resource('/favourite',FavouriteController::class);
    // Route::get('/dashboard', function () {
        //     return view('dashboard');
        // })->name('dashboard');
        Route::post('/encode',[GalleryController::class,'encode']);
        Route::resource('/gallery' , GalleryController::class);
    });
    // Route::get('/logout',[App\Http\Controllers\Auth\AuthenticatedSessionController::class,'destroy']);

require __DIR__.'/auth.php';
