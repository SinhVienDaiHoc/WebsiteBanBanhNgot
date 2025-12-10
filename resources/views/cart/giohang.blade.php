@extends('layouts.app')

@section('title', 'Giỏ hàng')

@section('content')
<div class="container py-4">
    <h3 class="mb-4">Giỏ hàng của bạn</h3>

    @if (empty($cart))
        <p>Giỏ hàng đang trống.</p>
    @else
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>Sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cart as $id => $item)
                    <tr>
                        <td>
                            @if(!empty($item['image']))
                                <img src="{{ $item['image'] }}" alt="" style="width:60px;height:60px;object-fit:cover;">
                            @endif
                            {{ $item['name'] }}
                        </td>
                        <td>{{ number_format($item['price']) }} đ</td>
                        <td>
                            <form action="{{ route('cart.update', $id) }}" method="POST" class="d-flex">
                                @csrf
                                <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1"
                                       class="form-control form-control-sm" style="width:70px;">
                                <button class="btn btn-sm btn-outline-secondary ms-2" type="submit">Cập nhật</button>
                            </form>
                        </td>
                        <td>{{ number_format($item['price'] * $item['quantity']) }} đ</td>
                        <td>
                            <form action="{{ route('cart.remove', $id) }}" method="POST">
                                @csrf
                                <button class="btn btn-sm btn-danger" type="submit">Xoá</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="text-end">
            <h5>Tổng cộng: <strong>{{ number_format($total) }} đ</strong></h5>
            <a href="{{ route('checkout.show') }}" class="btn btn-success">
                   Thanh toán
                    </a>

        </div>
    @endif
</div>
@endsection
