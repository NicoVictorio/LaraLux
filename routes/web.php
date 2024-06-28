<?php

use App\Http\Controllers\HotelController;
use App\Http\Controllers\HotelTypeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductTypeController;
use App\Models\HotelType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['auth'])->group(function () {
    Route::resource('hotel', HotelController::class);
    Route::resource('hoteltype', HotelTypeController::class);
    Route::resource('product', ProductController::class);
    Route::resource('producttype', ProductTypeController::class);
    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');
});

// Auth
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Image
Route::get('hotel/uploadPhoto/{hotel_id}', [HotelController::class, 'uploadPhoto']);
Route::post('hotel/simpanPhoto', [HotelController::class, 'simpanPhoto']);
Route::post('hotel/deletePhoto', [HotelController::class, 'deletePhoto']);

Route::get('product/uploadPhoto/{product_id}', [ProductController::class, 'uploadPhoto']);
Route::post('product/simpanPhoto', [ProductController::class, 'simpanPhoto']);
Route::post('product/deletePhoto', [ProductController::class, 'deletePhoto']);

//hotel_type
Route::post('customtype/getEditForm', [HotelTypeController::class, 'getEditForm'])->name('hoteltype.getEditForm');
Route::post('customtype/saveDataTD', [HotelTypeController::class, 'saveDataTD'])->name('hoteltype.saveDataTD');
Route::post('customtype/deleteData', [HotelTypeController::class, 'deleteData'])->name('hoteltype.deleteData');