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
                'id'    => 1,
                'name'  => 'Cheese cake',
                'price' => 100000,
                'image' => '/images/BanhNgot/1.jpg',
                'tag'   => 'bánh ngọt',
            ],
            [
                'id'    => 2,
                'name'  => 'Crème brûlée',
                'price' => 100000,
                'image' => '/images/BanhNgot/2.jpg',
                'tag'   => 'bánh ngọt',
            ],
            [
                'id'    => 3,
                'name'  => 'Cupcake',
                'price' => 100000,
                'image' => '/images/BanhNgot/3.jpg',
                'tag'   => 'bánh ngọt',
            ],
            [
                'id'    => 4,
                'name'  => 'Croissant',
                'price' => 100000,
                'image' => '/images/BanhNgot/4.jpg',
                'tag'   => 'bánh ngọt',
            ],
            [
                'id'    => 5,
                'name'  => 'Tiramisu',
                'price' => 100000,
                'image' => '/images/BanhNgot/5.jpg',
                'tag'   => 'bánh ngọt',
            ],

            // BÁNH KEM
            [
                'id'    => 6,
                'name'  => 'Bento cake',
                'price' => 100000,
                'image' => '/images/BanhKem/-1.jpg',
                'tag'   => 'bánh kem',
            ],
            [
                'id'    => 7,
                'name'  => 'Strawberry cake',
                'price' => 100000,
                'image' => '/images/BanhKem/-2.jpg',
                'tag'   => 'bánh kem',
            ],
            [
                'id'    => 8,
                'name'  => 'Fruit cake',
                'price' => 100000,
                'image' => '/images/BanhKem/-3.jpg',
                'tag'   => 'bánh kem',
            ],
            [
                'id'    => 9,
                'name'  => 'Wedding cake',
                'price' => 100000,
                'image' => '/images/BanhKem/-4.jpg',
                'tag'   => 'bánh kem',
            ],
            [
                'id'    => 10,
                'name'  => 'Grape cake',
                'price' => 100000,
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
        return redirect()->route('home');   // hoặc redirect('/');
    }

    $all = collect($this->allProducts());

    // Lọc theo tên bánh và cả tag
   $products = $all->filter(function ($product) use ($keyword) {
    return stripos($product['name'], $keyword) !== false
        || stripos($product['tag'], $keyword) !== false;
})->values();


    return view('search', [
        'products' => $products,
        'keyword'  => $keyword,
    ]);
}

}
