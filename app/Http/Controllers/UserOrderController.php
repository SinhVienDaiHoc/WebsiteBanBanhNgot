<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class UserOrderController extends Controller
{
    // Danh sách đơn hàng 
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())
            ->orderByDesc('created_at')
            ->get();

        return view('orders.donhang', compact('orders'));
    }

    // Xem chi tiết 1 đơn
    public function show(Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        return view('orders.chitietdonhang', compact('order'));
    }

    //HÀM XOÁ ĐƠN HÀNG
    public function destroy(Order $order)
    {
        // Chỉ cho xoá đơn của chính mình
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }
        $order->delete();

        return redirect()->route('orders.index')
            ->with('success', 'Đã xoá đơn hàng khỏi lịch sử.');
    }
}
