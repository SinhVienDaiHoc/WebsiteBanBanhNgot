<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Voucher;

class CheckoutController extends Controller
{
    public function show()
    {
        //Tính tiền nếu customer ko áp mã giảm giá
        $cart = session('cart', []);
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        //==================================================

        //Tính ti


        return view('checkout.thanhtoan', compact('total'));
    }

    public function process(Request $request)
    {
        // Lấy giỏ hàng từ session
        $cart = session('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')
                ->with('error', 'Giỏ hàng đang trống.');
        }

        // TÍNH TỔNG TIỀN
$total = 0;
foreach ($cart as $item) {
    $total += $item['price'] * $item['quantity'];
}

// TẠO ĐƠN HÀNG
$order = \App\Models\Order::create([
    'user_id'          => Auth::id(),
    'total'            => $total,            // <--- DÒNG NÀY RẤT QUAN TRỌNG
    'status'           => 0,
    'customer_name'    => $request->input('customer_name'),
    'customer_phone'   => $request->input('customer_phone'),
    'customer_address' => $request->input('customer_address'),
    'payment_method'   => $request->input('payment_method', 'cash'),
]);


        // LƯU CÁC SẢN PHẨM TRONG ĐƠN
        foreach ($cart as $productId => $item) {
            OrderItem::create([
                'order_id'       => $order->id,
                'product_id'     => $productId,
                'product_name'   => $item['name'],
                'quantity'       => $item['quantity'],
                'price_at_order' => $item['price'], 
            ]);
        }

        // Xoá giỏ hàng
        session()->forget('cart');

        // Chuyển sang chi tiết đơn hàng
        return redirect()
            ->route('orders.show', $order)
            ->with('success', 'Đặt hàng thành công!');
    }
}
