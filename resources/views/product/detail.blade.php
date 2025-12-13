@extends('layouts.app')

@section('title', $product->name)

@section('content')
<div class="py-5" style="background-color: #fdfbf7;">
    <div class="container">
        <div class="card shadow-sm border-0 mb-5">
            <div class="card-body p-4">
                <div class="row">
                    <div class="col-md-6 mb-4 mb-md-0">
                        <div class="ratio ratio-1x1 shadow-sm rounded overflow-hidden border">
                            <img src="{{ asset('uploads/products/'.$product->image_cover) }}"
                                class="img-fluid object-fit-cover"
                                alt="{{ $product->name }}">
                        </div>
                    </div>

                    <div class="col-md-6 d-flex flex-column justify-content-center">
                        <h1 class="fw-bold text-dark mb-3">{{ $product->name }}</h1>

                        <div class="mb-4">
                            <span class="fs-2 fw-bold text-danger">{{ number_format($product->price) }} đ</span>
                            <div class="mt-2">
                                @if($product->stock > 0)
                                <span class="badge bg-success bg-opacity-75">
                                    <i class="bi bi-box-seam"></i> Còn lại: {{ $product->stock }} cái
                                </span>
                                @else
                                <span class="badge bg-secondary">Hết hàng</span>
                                @endif
                            </div>
                        </div>

                        <p class="text-muted mb-4 border-start border-4 border-warning ps-3 fst-italic">
                            {{ Str::limit($product->description, 180) }}
                        </p>

                        {{-- Form thêm vào giỏ hàng --}}
                        <form action="{{ route('cart.add', $product->id) }}" method="POST">
                            @csrf

                            @if($product->stock > 0)
                            <div class="d-flex align-items-center mb-4">
                                <label class="fw-bold me-3">Số lượng:</label>
                                <div class="input-group" style="width: 130px;">
                                    <button class="btn btn-outline-secondary" type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()">-</button>
                                    <input type="number" name="quantity" class="form-control text-center" value="1" min="1" max="{{ $product->stock }}">
                                    <button class="btn btn-outline-secondary" type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()">+</button>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-warning btn-lg w-100 fw-bold text-white shadow-sm">
                                <i class="bi bi-cart-plus me-2"></i> THÊM VÀO GIỎ NGAY
                            </button>
                            @else
                            <button type="button" class="btn btn-secondary btn-lg w-100" disabled>
                                TẠM HẾT HÀNG
                            </button>
                            @endif
                        </form>
                        <div class="mt-4 pt-3 border-top row text-center">
                            <div class="col-6 border-end">
                                <i class="bi bi-fire text-danger fs-5"></i>
                                <div class="small fw-bold text-uppercase mt-1">Nướng mới mỗi ngày</div>
                            </div>
                            <div class="col-6">
                                <i class="bi bi-box2-heart text-danger fs-5"></i>
                                <div class="small fw-bold text-uppercase mt-1">Đóng gói kỹ càng</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="mt-5">
            <h4 class="fw-bold mb-4 text-uppercase border-start border-4 border-danger ps-3">
                Có thể bạn thích
            </h4>

            <div class="row g-4"> {{-- Sử dụng row để xếp ngang --}}
                @foreach($relatedProducts as $rel)
                <div class="col-6 col-md-3"> {{-- col-md-3 nghĩa là 1 hàng chứa 4 sản phẩm --}}
                    <div class="card border-0 shadow-sm h-100 hover-shadow transition">
                        {{-- Ảnh sản phẩm --}}
                        <div class="ratio ratio-1x1">
                            <a href="{{ route('product.detail', $rel->id) }}">
                                <img src="{{ asset('uploads/products/'.$rel->image_cover) }}"
                                    class="card-img-top object-fit-cover"
                                    alt="{{ $rel->name }}">
                            </a>
                        </div>

                        {{-- Thông tin rút gọn --}}
                        <div class="card-body text-center p-3 d-flex flex-column">
                            <h6 class="card-title mb-2 text-truncate">
                                <a href="{{ route('product.detail', $rel->id) }}" class="text-decoration-none text-dark fw-bold stretched-link">
                                    {{ $rel->name }}
                                </a>
                            </h6>
                            <div class="mt-auto">
                                <p class="card-text text-danger fw-bold fs-5 mb-0">{{ number_format($rel->price) }} đ</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>
</div>
@endsection