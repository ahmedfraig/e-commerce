<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderItemController;
use App\Http\Middleware\AdminMiddleWare;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth',AdminMiddleWare::class])->group(function(){
Route::get('/dashboard/main',[DashboardController::class,'view'])->name('dashboard.view');
Route::resource('dashboard',DashboardController::class);
Route::resource('cart',CartController::class);
Route::resource('category',CategoryController::class);
Route::resource('order',OrderController::class);
Route::resource('orderItem',OrderItemController::class);
Route::resource('payment',PaymentController::class);
Route::get('product/category/{id}', [ProductController::class, 'productsAtCategory'])->name('product.byCategory');
Route::resource('product',ProductController::class);

});
//themeFront
Route::get('theme/front', [HomeController::class,'index'])->name('Home.front');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
