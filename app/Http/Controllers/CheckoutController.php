<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function show()
    {
        $cart = session('cart', []);

        // tính tổng tiền để truyền ra view thanhtoan
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return view('checkout.thanhtoan', compact('total'));
    }

    public function process(Request $request)
    {
        // 1. Validate form
        $data = $request->validate([
            'customer_name'    => ['required', 'string', 'max:255'],
            'customer_phone'   => ['required', 'string', 'max:20'],
            'customer_address' => ['required', 'string', 'max:255'],
            'payment_method'   => ['required', 'in:cash,bank_transfer'],
        ], [
            'customer_name.required'    => 'Vui lòng nhập họ và tên.',
            'customer_phone.required'   => 'Vui lòng nhập số điện thoại.',
            'customer_address.required' => 'Vui lòng nhập địa chỉ nhận hàng.',
            'payment_method.required'   => 'Vui lòng chọn phương thức thanh toán.',
        ]);

        // 2. Lấy giỏ hàng
        $cart = session('cart', []);
        if (empty($cart)) {
            return redirect('/cart')->with('error', 'Giỏ hàng của bạn đang trống.');
        }

        // 3. Tính tổng tiền
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        // 4. Tạo đơn hàng
        $order = Order::create([
            'user_id'          => Auth::id(),
            'total'            => $total,
            'status'           => 'pending',
            'customer_name'    => $data['customer_name'],
            'customer_phone'   => $data['customer_phone'],
            'customer_address' => $data['customer_address'],
            'payment_method'   => $data['payment_method'],
        ]);

        // 5. Tạo các dòng chi tiết đơn hàng
        foreach ($cart as $productId => $item) {
            OrderItem::create([
                'order_id'       => $order->id,
                'product_id'     => $productId,
                'product_name'   => $item['name'],     
                'quantity'       => $item['quantity'],
                'price_at_order' => $item['price'],
            ]);
        }

        // 6. Xoá giỏ hàng
        session()->forget('cart');

        // 7. QUAN TRỌNG: chuyển sang TRANG CHI TIẾT ĐƠN HÀNG
        return redirect('/don-hang/' . $order->id)
            ->with('success', 'Đặt hàng thành công! Cảm ơn bạn đã mua hàng.');
    }
}
