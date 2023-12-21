<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProfileController;
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

Route::middleware('splade')->group(function () {
    // Registers routes to support the interactive components...
    Route::spladeWithVueBridge();

    // Registers routes to support password confirmation in Form and Link components...
    Route::spladePasswordConfirmation();

    // Registers routes to support Table Bulk Actions and Exports...
    Route::spladeTable();

    // Registers routes to support async File Uploads with Filepond...
    Route::spladeUploads();

  

    Route::get('/', \App\Http\Controllers\IndexController::class . "@test");

    Route::get("orders/create-temp-order", \App\Http\Controllers\OrderController::class . "@createTemp")->name("orders.status");


    Route::get("orders/view-qr-code/{token}", \App\Http\Controllers\OrderController::class . "@viewQR")->name("orders.qr.view");

    Route::get("businesses/profile/{token}", \App\Http\Controllers\IndexController::class . "@businessProfile")->name("businesses.profile");
    Route::post("orders/redeem/{token}", \App\Http\Controllers\IndexController::class . "@redeemOrder")->name("orders.redeem");


    Route::middleware('auth')->group(function () {
        Route::get('/dashboard',  [IndexController::class, 'dashborad'] )->middleware(['verified'])->name('dashboard');

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        Route::resource('businesses', \App\Http\Controllers\BusinessController::class);
        Route::put("businesses/{business}/status", \App\Http\Controllers\BusinessController::class . "@updateStatus")->name("businesses.status");

        Route::resource('offers', \App\Http\Controllers\OfferController::class);
        Route::put("offers/{offer}/status", \App\Http\Controllers\OfferController::class . "@updateStatus")->name("offers.status");


        Route::resource('orders', \App\Http\Controllers\OrderController::class);
        Route::put("orders/{order}/status", \App\Http\Controllers\OrderController::class . "@updateStatus")->name("orders.status");


        Route::resource('products', \App\Http\Controllers\ProductController::class);
        Route::put("products/{product}/status", \App\Http\Controllers\ProductController::class . "@updateStatus")->name("products.status");



        Route::resource('orders', \App\Http\Controllers\OrderController::class);


        Route::resource('items', \App\Http\Controllers\itemController::class);
        Route::put("items/{item}/status", \App\Http\Controllers\itemController::class . "@updateStatus")->name("items.status");


        // update later
        Route::resource('qrs', \App\Http\Controllers\ProductController::class);
        Route::put("qrs/{product}/status", \App\Http\Controllers\ProductController::class . "@updateStatus")->name("products.status");
    });




    require __DIR__ . '/auth.php';
});
