<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CouponController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CheckoutController;
use App\Http\Controllers\Api\WishlistController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/products',[ProductController::class,'index'])->name('products.index');
Route::post('/products',[ProductController::class,'store'])->name('products.store');
Route::get('/products/{id}',[ProductController::class,'show'])->name('products.show');
Route::put('/products/{id}',[ProductController::class,'update'])->name('products.update');

Route::get('/wishlist',[WishlistController::class,'index'])->name('wishlist.index');
Route::post('/wishlist',[WishlistController::class,'store'])->name('wishlist.store');
Route::delete('/wishlist/{id}',[WishlistController::class,'destroy'])->name('wishlist.destroy');

Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');

Route::get('/coupons', [CouponController::class, 'index'])->name('coupons.index');
Route::post('/coupons', [CouponController::class, 'store'])->name('coupons.store');
Route::get('/coupons/{coupon}', [CouponController::class, 'show'])->name('coupons.show');
Route::put('/coupons/{coupon}', [CouponController::class, 'update'])->name('coupons.update');
Route::delete('/coupons/{coupon}', [CouponController::class, 'destroy'])->name('coupons.destroy');



