<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    // Hàm hiển thị sản phẩm theo danh mục
    public function showByCategory($id)
    {
        $category = Category::findOrFail($id);
        $products = Product::where('category_id', $id)->get();
        return view('category.show', compact('category', 'products'));
    }

    /**
     * Tìm kiếm tên bánh 
     */
    public function search(Request $request)
    {
        $keyword = trim($request->input('q'));
        if ($keyword === '') {
            return redirect()->route('home');
        }

        $products = Product::where('name', 'LIKE', "%{$keyword}%")->get();

        return view('search', compact('products', 'keyword'));
    }
}
