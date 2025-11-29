<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;

// Trang chủ
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('chinhsach',[HomeController::class,'chinhsach']);


// Bánh ngọt
Route::get('/banh-ngot', [ProductController::class, 'cakes'])
    ->name('category.banhngot');

// Bánh mì
Route::get('/banh-kem', [ProductController::class, 'banhkem'])
    ->name('category.banhkem');   

// Đăng kí
Route::get('/register',[AuthController::class,'register'])->name('register');
Route::post('/register',[AuthController::class,'postRegister'])->name('postRegister');


// Đăng nhập ( CẦN CHECK LẠI ************)
// Route::get('/login',[AuthController::class,'login'])->name('login');
// Route::get('/login',[AuthController::class,'postLogin'])->name('postLogin');