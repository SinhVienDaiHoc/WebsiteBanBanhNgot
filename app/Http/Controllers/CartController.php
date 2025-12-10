<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    // Hiển thị giỏ hàng
    public function index()
    {
        $cart = session()->get('cart', []);

        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

       
        return view('cart.giohang', compact('cart', 'total'));
    }

    // Thêm sản phẩm vào giỏ
    public function add(Request $request, $id)
    {
        // Lấy giỏ hàng hiện tại trong session
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += 1;
        } else {
            $cart[$id] = [
                'name'     => $request->name ?? 'Sản phẩm',
                'price'    => $request->price ?? 0,
                'quantity' => 1,
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()
            ->with('cart_success', 'Đã thêm vào giỏ hàng');
    }


    // Cập nhật số lượng
    public function update(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = max(1, (int) $request->quantity);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index');
    }

    // Xoá 1 sản phẩm khỏi giỏ
    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index');
    }
}
