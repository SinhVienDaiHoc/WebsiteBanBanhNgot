<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Product;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
   private function allProducts(): Collection
    {
        return collect([
            // BÁNH NGỌT
            [ 'name' => 'Cheese cake', 'price' => '100,000đ', 'image' => '/images/BanhNgot/1.jpg', 'tag' => 'bánh ngọt' ],
            [ 'name' => 'Crème brûlée', 'price' => '100,000đ', 'image' => '/images/BanhNgot/2.jpg', 'tag' => 'bánh ngọt' ],
            // ... thêm các sản phẩm còn lại ...

            // BÁNH KEM
            [ 'name' => 'Bento cake', 'price' => '100,000đ', 'image' => '/images/BanhKem/-1.jpg', 'tag' => 'bánh kem' ],
            // ... thêm các sản phẩm Bánh Kem còn lại ...
        ]);
    }

    public function boot(): void
    {
        // 1. Composer cho trang BÁNH NGỌT
        View::composer('category.banhngot', function ($view) {
            $all = $this->allProducts();
            $products = $all->where('tag', 'bánh ngọt')->values();
            $view->with('products', $products);
        });

        // 2. Composer cho trang BÁNH KEM
        View::composer('category.banhkem', function ($view) {
            $all = $this->allProducts();
            $products = $all->where('tag', 'bánh kem')->values();
            $view->with('products', $products);
        });
        Schema::defaultStringLength(191);

        // 3. Nếu muốn chia sẻ chung cho nhiều View (ví dụ: 5 bánh ngọt mới nhất)
        // View::composer(['User.layouts.home', 'User.layouts.app'], function ($view) {
        //     $newest_products = $this->allProducts()->sortByDesc('created_at')->take(5)->values();
        //     $view->with('newest_products', $newest_products);
        // });
    }
}
