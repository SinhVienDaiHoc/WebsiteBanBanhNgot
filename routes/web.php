<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\UserOrderController;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\PolicyController;
use App\Http\Middleware\IsAdmin;

// USER ROUTES

// TRANG CHỦ
Route::get('/', [HomeController::class, 'index'])->name('home');

// CHÍNH SÁCH
Route::get('/chinhsach', [HomeController::class, 'chinhsach'])->name('chinhsach');

//CÁC CHÍNH SÁCH CỦA CỬA HÀNG
Route::get('/chinhsach', [PolicyController::class, 'index'])->name('chinhsach.mainchinhsach');
Route::get('/chinhsachchung', [PolicyController::class, 'chinhsachchung'])->name('chinhsachchung');
Route::get('/chinhsachvanchuyen', [PolicyController::class, 'chinhsachvanchuyen'])->name('chinhsachvanchuyen');
Route::get('/chinhsachdoitra', [PolicyController::class, 'chinhsachdoitra'])->name('chinhsachdoitra');
Route::get('/chinhsachbaomat', [PolicyController::class, 'chinhsachbaomat'])->name('chinhsachbaomat');
Route::get('/chinhsachthanhtoan', [PolicyController::class, 'chinhsachthanhtoan'])->name('chinhsachthanhtoan');


// SẢN PHẨM 
Route::get('/danh-muc/{id}', [ProductController::class, 'showByCategory'])->name('category.show');


// Route xem chi tiết sản phẩm (nhận vào ID)
Route::get('/san-pham/{id}', [ProductController::class, 'detail'])->name('product.detail');

// TÌM KIẾM
Route::get('/search', [ProductController::class, 'search'])->name('search');

// AUTH USER
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'postRegister'])->name('postRegister');

Route::get('/dang-nhap', [AuthController::class, 'login'])->name('login');
Route::post('/dang-nhap', [AuthController::class, 'postLogin'])->name('postLogin');

Route::post('/dang-xuat', [AuthController::class, 'logout'])->name('logout');

// GIỎ HÀNG
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');

// THANH TOÁN
Route::get('/thanhtoan', [CheckoutController::class, 'show'])->name('checkout.show');
Route::post('/thanhtoan', [CheckoutController::class, 'process'])->name('checkout.process');

// ĐƠN HÀNG USER (cần login)
Route::middleware('auth')->group(function () {
    Route::get('/don-hang', [UserOrderController::class, 'index'])->name('orders.index');
    Route::get('/don-hang/{order}', [UserOrderController::class, 'show'])->name('orders.show');
    Route::delete('/don-hang/{order}', [UserOrderController::class, 'destroy'])->name('orders.destroy');

    //PROFILE
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/password', [ProfileController::class, 'changePassword'])->name('user-password.update');
});



// ADMIN AUTH ROUTES (KHÔNG LẶP)

Route::get('admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AdminLoginController::class, 'login'])->name('admin.login.post');
Route::post('admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');



// ADMIN ROUTES
Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', IsAdmin::class])
    ->group(function () {

        // TRANG ADMIN HOME (sau khi login)
        Route::get('/view', function () {
            return view('admin.adminview');
        })->name('view');

        // DASHBOARD
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])
            ->name('dashboard');

        // WARNING
        Route::get('/warning', [AdminController::class, 'warning'])->name('warning');

        // ORDERS
        Route::get('/orders', [AdminOrderController::class, 'index'])->name('orders.index');
        Route::patch('/orders/{order}/status', [AdminOrderController::class, 'updateStatus'])
            ->name('orders.updateStatus');

        // PRODUCTS
        Route::prefix('products')->name('product.')->group(function () {
            Route::get('/', [AdminProductController::class, 'index'])->name('qlysanpham');
            Route::get('/create', [AdminProductController::class, 'create'])->name('create');
            Route::post('/store', [AdminProductController::class, 'store'])->name('store');

            Route::get('/edit/{id}', [AdminProductController::class, 'edit'])->name('edit');
            Route::put('/update/{id}', [AdminProductController::class, 'update'])->name('update');

            Route::delete('/delete/{id}', [AdminProductController::class, 'destroy'])->name('destroy');
        });

        // CATEGORIES
        Route::prefix('categories')->name('category.')->group(function () {
            Route::get('/', [AdminCategoryController::class, 'index'])->name('index');
            Route::get('/create', [AdminCategoryController::class, 'create'])->name('create');
            Route::post('/store', [AdminCategoryController::class, 'store'])->name('store');

            Route::get('/edit/{id}', [AdminCategoryController::class, 'edit'])->name('edit');
            Route::put('/update/{id}', [AdminCategoryController::class, 'update'])->name('update');

            Route::delete('/delete/{id}', [AdminCategoryController::class, 'destroy'])->name('destroy');
        });
    });
