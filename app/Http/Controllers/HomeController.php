<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Product;
use App\Models\Category;
class HomeController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $globalCategories = Category::all(); 
        return view('home', compact('products', 'globalCategories'));

    return view('home', compact('products'));
    }
    public function chinhsach(){
        return view('chinhsach');
    }
    public function blogs(){
        $globalCategories = Category::all(); 
        return view('blogs', compact('globalCategories'));
    }
}


