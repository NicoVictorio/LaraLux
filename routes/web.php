<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\HotelTypeController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TransactionController;
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

    Route::get('product/createProduct/{hotel_id}', [ProductController::class, 'createProduct'])->name('product.createProduct');

    //membership
    Route::get('membership', [MemberController::class, 'index'])->name('membership');
    Route::get('editMembership/{id}', [MemberController::class, 'edit'])->name('membership.editMembership');
    Route::put('updateMembership/{id}', [MemberController::class, 'update'])->name('membership.updateMembership');
    Route::get('deleteMembership/{id}', [MemberController::class, 'deleteMembership'])->name('membership.deleteMembership');

    Route::get('/report/mostReservedProduct', [ReportController::class, 'mostReservedProduct'])->name('rp_mostReservedProduct');
    Route::get('/report/mostMembership', [ReportController::class, 'mostMembership'])->name('rp_mostMembership');
    Route::get('/report/mostProduct', [ReportController::class, 'mostProduct'])->name('rp_mostProduct');
});

// Auth
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
