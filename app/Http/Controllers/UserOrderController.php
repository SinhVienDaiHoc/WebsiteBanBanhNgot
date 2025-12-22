<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class UserOrderController extends Controller
{
   public function index()
{
    $orders = Order::with('items')   
        ->where('user_id', Auth::id())
        ->orderByDesc('created_at')
        ->get();

    return view('orders.donhang', compact('orders'));
}


    public function show($id)
    {
        $order = Order::with('items')
            ->where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        return view('orders.chitietdonhang', compact('order'));
    }

    


    public function destroy(Order $order)
    {
   if ($order->status < 2) {
        
        $order->update([
            'status' => 4,
            'updated_at' => now()
        ]);

        return redirect()->route('orders.index')->with('success', 'Đã hủy đơn hàng thành công.');
        
    } else {
        return redirect()->route('orders.index')->with('error', 'Đơn hàng đang giao hoặc đã hoàn thành, không thể hủy!');
    }
    
}}
