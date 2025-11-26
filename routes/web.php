<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

// Trang chủ
Route::get('/', [HomeController::class, 'index'])->name('home');

// Bánh ngọt
Route::get('/banh-ngot', [ProductController::class, 'cakes'])
    ->name('category.banhngot');

// Bánh mì
Route::get('/banh-kem', [ProductController::class, 'banhkem'])
    ->name('category.banhkem');   
