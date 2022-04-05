<?php

use App\Http\Controllers\Auth\DashboardController;
use App\Http\Controllers\Auth\UserController as AuthUserController;
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
    return redirect('/login');
});

Route::middleware(['auth'])->group(function () {
    Route::view('/download','download');
    Route::resource('/gallery' , GalleryController::class)->except('show','edit' ,'update','store','create');
    Route::post('/encode',[GalleryController::class,'encode']);
    Route::post('/decode',[GalleryController::class,'decode']);
    Route::resource('/user' , UserController::class)->except('create','store','edit','show');
    Route::post('/update-password',[UserController::class,'updatePassword'])->name('update_password');
    Route::resource('/favourite',FavouriteController::class)->only('store','index');
  
    Route::get('/dashboard',[DashboardController::class,'stats'])->middleware('admin')->name('dashboard');
    Route::delete('admin/{gallery}',[DashboardController::class,'destroy'])->name('admin.destroy');
    Route::resource('/admin' , AuthUserController::class)->middleware('admin');
    
    Route::get('/gentoken',[UserController::class,'generateToken']);    
    
});
    
require __DIR__.'/auth.php';
