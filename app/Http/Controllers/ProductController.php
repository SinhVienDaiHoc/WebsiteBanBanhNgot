<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Danh sách TẤT CẢ bánh (bánh ngọt + bánh kem)
    
     */
    private function allProducts()
    {
        return [
            // BÁNH NGỌT
            [
                'name'  => 'Cheese cake',
                'price' => '100,000đ',
                'image' => '/images/BanhNgot/1.jpg',
                'tag'   => 'bánh ngọt',
            ],
            [
                'name'  => 'Crème brûlée',
                'price' => '100,000đ',
                'image' => '/images/BanhNgot/2.jpg',
                'tag'   => 'bánh ngọt',
            ],
            [
                'name'  => 'Cupcake',
                'price' => '100,000đ',
                'image' => '/images/BanhNgot/3.jpg',
                'tag'   => 'bánh ngọt',
            ],
            [
                'name'  => 'Croissant',
                'price' => '100.000đ',
                'image' => '/images/BanhNgot/4.jpg',
                'tag'   => 'bánh ngọt',
            ],
            [
                'name'  => 'Tiramisu',
                'price' => '100.000đ',
                'image' => '/images/BanhNgot/5.jpg',
                'tag'   => 'bánh ngọt',
            ],

            // BÁNH KEM
            [
                'name'  => 'Bento cake',
                'price' => '100,000đ',
                'image' => '/images/BanhKem/-1.jpg',
                'tag'   => 'bánh kem',
            ],
            [
                'name'  => 'Strawberry cake',
                'price' => '100,000đ',
                'image' => '/images/BanhKem/-2.jpg',
                'tag'   => 'bánh kem',
            ],
            [
                'name'  => 'Fruit cake',
                'price' => '100,000đ',
                'image' => '/images/BanhKem/-3.jpg',
                'tag'   => 'bánh kem',
            ],
            [
                'name'  => 'Wedding cake',
                'price' => '100,000đ',
                'image' => '/images/BanhKem/-4.jpg',
                'tag'   => 'bánh kem',
            ],
            [
                'name'  => 'Grape cake',
                'price' => '100,000đ',
                'image' => '/images/BanhKem/-5.jpg',
                'tag'   => 'bánh kem',
            ],
        ];
    }

    /**
     * Trang Bánh ngọt
     */
    public function banhngot()
    {
        $all = collect($this->allProducts());

        // Lọc ra những bánh có tag = banhngot
        $products = $all->where('tag', 'bánh ngọt')->values();

        return view('category.banhngot', compact('products'));
    }

    /**
     * Trang Bánh kem
     */
    public function banhkem()
    {
        $all = collect($this->allProducts());

        // Lọc ra những bánh có tag = banhkem
        $products = $all->where('tag', 'bánh kem')->values();

        return view('category.banhkem', compact('products'));
    }

    /**
     * Tìm kiếm tên bánh 
     */
    public function search(Request $request)
    {
        $keyword = trim($request->input('q'));

        // Nếu không nhập gì thì quay về trang chủ
        if ($keyword === '') {
            return redirect()->route('home');
        }

        $all = collect($this->allProducts());

        // Lọc theo tên bánh 
        $products = $all->filter(function ($product) use ($keyword) {
            return stripos($product['name'], $keyword) !== false;
        })->values();

        return view('search', [
            'products' => $products,
            'keyword'  => $keyword,
        ]);
    }
}
