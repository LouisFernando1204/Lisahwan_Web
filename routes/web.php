<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\GalleryController;
use Illuminate\Support\Facades\Auth;

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



Route::get('/', [ProductController::class, 'best_seller']); // halaman HOME
Route::get('/products', [ProductController::class, 'index']); // halaman PRODUCTS
Route::get('/products/{product_id}', [ProductController::class, 'show']);
Route::get('/gallery', [GalleryController::class, 'index']); // halaman PRODUCTS

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
