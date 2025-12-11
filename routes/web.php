<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Middleware\IsAdmin;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\UserOrderController;

use App\Http\Controllers\ProfileController;
// TRANG CHỦ 
Route::get('/', [HomeController::class, 'index'])->name('home');


//CÁC CHÍNH SÁCH CỦA CỬA HÀNG
Route::get('/chinhsach', [HomeController::class, 'chinhsach'])->name('chinhsach');

// SẢN PHẨM 
// Bánh ngọt
Route::get('/banh-ngot', [ProductController::class, 'banhngot'])
    ->name('category.banhngot');

// Bánh kem
Route::get('/banh-kem', [ProductController::class, 'banhkem'])
    ->name('category.banhkem');

// TÌM KIẾM
Route::get('/search', [ProductController::class, 'search'])->name('search');

// LOGIN, LOGOUT
// Đăng kí
Route::get('/register', [AuthController::class,'register'])->name('register');
Route::post('/register', [AuthController::class,'postRegister'])->name('postRegister');

// Đăng nhập
Route::get('/dang-nhap', [AuthController::class, 'login'])->name('login');
Route::post('/dang-nhap', [AuthController::class, 'postLogin'])->name('postLogin');

// Đăng xuất
Route::post('/dang-xuat', [AuthController::class, 'logout'])->name('logout');

// GIỎ HÀNG 
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

//  ADMIN 
Route::middleware(['auth', IsAdmin::class])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])
            ->name('dashboard');
    });
Route::get('admin/warning',[AdminController::class,'warning'])->name('admin.warning');

// Đăng nhập admin
Route::get('admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AdminLoginController::class, 'login'])->name('admin.login.post');

Route::post('admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
//  THANH TOÁN 
Route::get('/thanhtoan', [CheckoutController::class, 'show'])
    ->name('checkout.show');

Route::post('/thanhtoan', [CheckoutController::class, 'process'])
    ->name('checkout.process');

//  ĐƠN HÀNG NGƯỜI DÙNG 
Route::middleware('auth')->group(function () {
    // Danh sách đơn hàng
    Route::get('/don-hang', [UserOrderController::class, 'index'])->name('orders.index');

    // Xem chi tiết đơn
    Route::get('/don-hang/{order}', [UserOrderController::class, 'show'])->name('orders.show');

   
    Route::delete('/don-hang/{order}', [UserOrderController::class, 'destroy'])->name('orders.destroy');


    // Profile
   Route::middleware('auth')->group(function(){
Route::get('/profile',[ProfileController::class,'edit'])->name('profile.edit');
Route::put('profile',[ProfileController::class,'update'])->name('profile.update');


   });
});



