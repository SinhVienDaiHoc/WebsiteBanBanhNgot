<?php

namespace App\Http\Controllers;
use App\Models\Product;

class ProductController extends Controller
{
    public function banhngot()
    {
        
        $products = [
            [
                'name'  => 'Cheese cake',
                'price' => '100,000đ',
                'image' => '/images/BanhNgot/1.jpg',
                'tag'   => ''
            ],
            [
                'name'  => 'Crème brûlée',
                'price' => '100,000đ',
                'image' => '/images/BanhNgot/2.jpg',
                'tag'   => ''
            ],
            [
                'name'  => 'Cupcake',
                'price' => '100,000đ',
                'image' => '/images/BanhNgot/3.jpg',
                'tag'   => ''
            ],
            [
                'name'  => 'Croissant',
                'price' => '100.000đ',
                'image' => '/images/BanhNgot/4.jpg',
                'tag'   => ''
            ],
            [
                'name'  => 'Tiramisu',
                'price' => '100.000đ',
                'image' => '/images/BanhNgot/5.jpg',
                'tag'   => ''
            ],
        ];

        return view('category.banhngot', compact('products'));
    }

   public function banhkem()
{
    $products = [
        [
            'name'  => 'Bento cake',
            'price' => '100,000đ',
            'image' => '/images/BanhKem/-1.jpg',
            'tag'   => '',
        ],
        [
            'name'  => 'Strawberry cake ',
            'price' => '100,000đ',
            'image' => '/images/BanhKem/-2.jpg',
            'tag'   => '',
        ],
         [
            'name'  => 'Fruit cake',
            'price' => '100,000đ',
            'image' => '/images/BanhKem/-3.jpg',
            'tag'   => '',
        ],
        [
            'name'  => 'Wedding cake',
            'price' => '100,000đ',
            'image' => '/images/BanhKem/-4.jpg',
            'tag'   => '',
        ],
          [
            'name'  => 'Grape cake',
            'price' => '100,000đ',
            'image' => '/images/BanhKem/-5.jpg',
            'tag'   => '',
        ],
        
    ];

    return view('category.banhkem', compact('products'));
}

   

}
