<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // STATUS = 3 => HOÀN TẤT
        $completedStatus = 3;

        // ===== 1) DOANH THU + SỐ LƯỢNG BÁN THEO SẢN PHẨM (CHỈ TÍNH HOÀN TẤT) =====
        $productStats = DB::table('order_items')
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->join('orders', 'order_items.order_id', '=', 'orders.id')
            ->where('orders.status', $completedStatus)
            ->select(
                'products.id',
                'products.name as product_name',
                DB::raw('SUM(order_items.quantity) as total_sold'),
                DB::raw('SUM(order_items.quantity * products.price) as total_revenue')
            )
            ->groupBy('products.id', 'products.name')
            ->orderByDesc('total_revenue')
            ->get();

        // ===== 2) TỔNG DOANH THU TRONG THÁNG HIỆN TẠI (CHỈ TÍNH HOÀN TẤT) =====
                $currentMonthRevenue = DB::table('orders')
                ->where('status', 3)
                ->whereMonth('updated_at', now()->month)
                  ->whereYear('updated_at', now()->year)
                 ->sum('total');


        // ===== 3) DANH SÁCH KHÁCH HÀNG CÓ ĐƠN HOÀN TẤT =====
        $customers = DB::table('orders')
         ->where('status', 3) // chỉ đơn hoàn tất
        ->whereNotNull('customer_name')
         ->whereNotNull('customer_phone')
         ->select(
        'customer_name',
        'customer_phone',
        DB::raw('COUNT(*) as total_orders'),
        DB::raw('MAX(updated_at) as last_order_at')
         )
        ->groupBy('customer_name', 'customer_phone')
        ->orderByDesc('last_order_at')
        ->get();


        // ===== 4) TỔNG DOANH THU TẤT CẢ (CHỈ HOÀN TẤT) =====
        $totalRevenue = (float) $productStats->sum('total_revenue');

        // ===== 5) TRẢ VIEW =====
        return view('admin.dashboard.dashboard', compact(
            'productStats',
            'currentMonthRevenue',
            'customers',
            'totalRevenue'
        ));
    }
}
