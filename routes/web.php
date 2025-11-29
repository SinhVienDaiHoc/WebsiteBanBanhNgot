<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;


// Trang chủ
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('chinhsach',[HomeController::class,'chinhsach']);

// Bánh ngọt
Route::get('/banh-ngot', [ProductController::class, 'banhngot'])
    ->name('category.banhngot');

// Bánh kem
Route::get('/banh-kem', [ProductController::class, 'banhkem'])
    ->name('category.banhkem');   

// Đăng kí
Route::get('/register',[AuthController::class,'register'])->name('register');
Route::post('/register',[AuthController::class,'postRegister'])->name('postRegister');

// Đăng nhập
Route::get('/dang-nhap', [AuthController::class, 'login'])->name('login');
Route::post('/dang-nhap', [AuthController::class, 'postLogin'])->name('postLogin');

// Đăng xuất
Route::post('/dang-xuat', [AuthController::class, 'logout'])->name('logout');

// GIỎ HÀNG
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');

