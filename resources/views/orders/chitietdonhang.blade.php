@extends('layouts.app')

@section('title', 'Chi tiết đơn hàng')

@section('content')

<div class="py-4" style="background:#fbf1e0;">
  <div class="container container-wide">

    <h3 class="mb-3 fw-bold">Đơn hàng #{{ $order->id }}</h3>

    <p><strong>Trạng thái:</strong> {{ $order->status_text }}</p>
    <p><strong>Ngày đặt:</strong> {{ $order->created_at->format('d/m/Y H:i') }}</p>
    <p><strong>Họ tên:</strong> {{ $order->customer_name }}</p>
    <p><strong>SĐT:</strong> {{ $order->customer_phone }}</p>
    <p><strong>Địa chỉ:</strong> {{ $order->customer_address }}</p>
    <p><strong>Thanh toán:</strong>
        {{ $order->payment_method == 'bank_transfer' ? 'Chuyển khoản' : 'Tiền mặt' }}
    </p>

    <h5 class="mt-4">Sản phẩm</h5>
    <table class="table bg-white">
        <thead>
            <tr>
                <th>Sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
            </tr>
        </thead>
       <tbody>
    @foreach($order->items as $item)
        <tr>
            <td>{{ $item->product_name }}</td>
            <td>{{ number_format($item->price_at_order, 0, ',', '.') }} đ</td>
            <td>{{ $item->quantity }}</td>
            <td>{{ number_format($item->subtotal, 0, ',', '.') }} đ</td>
        </tr>
    @endforeach
</tbody>


    </table>

    <p class="fw-bold mt-3">
        Tổng cộng: {{ number_format($order->total, 0, ',', '.') }} đ
    </p>

  </div>
</div>
@endsection
