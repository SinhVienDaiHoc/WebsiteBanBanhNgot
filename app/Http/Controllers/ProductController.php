<?php

namespace App\Http\Controllers;

class ProductController extends Controller
{
    public function cakes()
    {
        
        $products = [
            [
                'name'  => 'PETIT MOUSSE TIRAMISU',
                'price' => '100,000đ',
                'image' => '/images/BanhNgot/1.jpg',
                'tag'   => ''
            ],
            [
                'name'  => 'PETIT MOUSSE MÂM XÔI',
                'price' => '100,000đ',
                'image' => '/images/BanhNgot/2.jpg',
                'tag'   => ''
            ],
            [
                'name'  => 'PETIT MOUSSE ĐÀO',
                'price' => '100,000đ',
                'image' => '/images/BanhNgot/3.jpg',
                'tag'   => ''
            ],
            [
                'name'  => 'CUPCAKE TRÀ XANH',
                'price' => '100.000đ',
                'image' => '/images/BanhNgot/4.jpg',
                'tag'   => ''
            ],
        ];

        return view('category.banhngot', compact('products'));
    }

   public function banhkem()
{
    $products = [
        [
            'name'  => 'BÁNH KEM ',
            'price' => '100,000đ',
            'image' => '/images/BanhKem/-1.jpg',
            'tag'   => 'Bán chạy',
        ],
        [
            'name'  => 'BÁNH KEM ',
            'price' => '100,000đ',
            'image' => '/images/BanhKem/-2.jpg',
            'tag'   => 'Mới',
        ],
         [
            'name'  => 'BÁNH KEM ',
            'price' => '100,000đ',
            'image' => '/images/BanhKem/-3.jpg',
            'tag'   => 'Mới',
        ],
         [
            'name'  => 'BÁNH KEM ',
            'price' => '100,000đ',
            'image' => '/images/BanhKem/-4.jpg',
            'tag'   => 'Mới',
        ],
        
    ];

    return view('category.banhkem', compact('products'));
}

   

}
