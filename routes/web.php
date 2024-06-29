<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\HotelTypeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\TransactionController;
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
    Route::resource('hotel/product', ProductController::class);
    Route::resource('producttype', ProductTypeController::class);
    Route::resource('transaction', TransactionController::class);
    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');

    // Image
    Route::get('hotel/uploadPhoto/{hotel_id}', [HotelController::class, 'uploadPhoto']);
    Route::post('hotel/simpanPhoto', [HotelController::class, 'simpanPhoto']);
    Route::post('hotel/deletePhoto', [HotelController::class, 'deletePhoto']);

    Route::get('product/uploadPhoto/{product_id}', [ProductController::class, 'uploadPhoto']);
    Route::post('product/simpanPhoto', [ProductController::class, 'simpanPhoto']);
    Route::post('product/deletePhoto', [ProductController::class, 'deletePhoto']);

    Route::post('/transaction/getPrice', [TransactionController::class, 'getPrice'])->name('getPrice');
    Route::post('/transaction/showDataTransaction/', [TransactionController::class, 'showAjax'])->name('transaction.showAjax');

    Route::get('cart', function () {
        return view('cart.index');
    })->name('cart');

    Route::get('cart/add/{id}', [CartController::class, 'addToCart'])->name('addCart');
    Route::get('cart/delete/{id}', [CartController::class, 'deleteFromCart'])->name('delFromCart');
    Route::post('cart/addQty', [CartController::class, 'addQuantity'])->name('addQty');
    Route::post('cart/reduceQty', [CartController::class, 'reduceQuantity'])->name('redQty');
});

// Auth
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//hotel_type
Route::post('customtype/getEditForm', [HotelTypeController::class, 'getEditForm'])->name('hoteltype.getEditForm');
Route::post('customtype/saveDataTD', [HotelTypeController::class, 'saveDataTD'])->name('hoteltype.saveDataTD');
Route::post('customtype/deleteData', [HotelTypeController::class, 'deleteData'])->name('hoteltype.deleteData');
