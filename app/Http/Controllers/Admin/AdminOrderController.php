<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function index()
    {
        
        $orders = Order::latest()->paginate(10);
        return view('admin.adminorders', compact('orders'));
    }

    public function updateStatus(Request $request, Order $order)
    {
        // (Nếu muốn chỉ admin mới được sửa thì check thêm role ở đây)

        $request->validate([
            'status' => 'required|in:0,1,2,3,4',
        ]);

        $order->status = (int) $request->input('status');
        $order->save();

        return back()->with('success', 'Cập nhật trạng thái đơn hàng thành công.');
    }
}
