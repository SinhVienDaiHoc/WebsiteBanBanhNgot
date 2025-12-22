@extends('layouts.app')
@section('title', $category->name)

@section('content')
<style>
    /* Thừa hưởng style từ trang chủ */
    .category-header {
        background-color: #FAF6ED; /* Màu kem đặc trưng */
        padding: 60px 0;
        margin-bottom: 40px;
        text-align: center;
    }
    .category-title {
        font-family: 'Playfair Display', serif;
        font-weight: 700;
        font-size: 2.5rem;
        color: #332D2D;
    }
    .sticky-sidebar {
        position: sticky;
        top: 100px;
        height: fit-content;
    }
    /* Card sản phẩm tinh tế */
    .product-card {
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
    }
    .product-img-wrapper {
        width: 100%;
        aspect-ratio: 1 / 1;
        border-radius: 20px;
        overflow: hidden;
        background-color: #F5F5F5;
        position: relative;
    }
    .product-img-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.8s ease;
    }
    .product-card:hover .product-img-wrapper {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(0,0,0,0.08) !important;
    }
    .product-card:hover img { transform: scale(1.08); }

    /* Nút thêm giỏ hàng trượt lên */
    .quick-add {
        position: absolute;
        bottom: -50px;
        left: 0; right: 0;
        padding: 15px;
        transition: all 0.3s ease;
        text-align: center;
        background: linear-gradient(to top, rgba(255,255,255,0.9), transparent);
    }
    .product-card:hover .quick-add { bottom: 0; }
    .btn-minimal-cart {
        background: #3E4A3D; color: white; border: none;
        padding: 8px 20px; border-radius: 50px; font-size: 0.7rem;
        font-weight: 600; letter-spacing: 1px; transition: 0.3s;
    }
    .btn-minimal-cart:hover { background: #C5A059; }

    .product-price {
        color: #C5A059;
        font-family: 'Playfair Display', serif;
        font-weight: 700;
        font-size: 1.1rem;
    }
</style>

{{-- Header của danh mục --}}
<div class="category-header">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-2">
                <li class="breadcrumb-item"><a href="/" class="text-decoration-none text-muted small">Trang chủ</a></li>
                <li class="breadcrumb-item active small" aria-current="page">{{ $category->name }}</li>
            </ol>
        </nav>
        <h1 class="category-title">{{ $category->name }}</h1>
        <p class="text-muted small">Khám phá những mẫu bánh {{ strtolower($category->name) }} thơm ngon nhất</p>
    </div>
</div>

<div class="container pb-5">
    <div class="row">
        {{-- Sidebar lọc hoặc danh mục khác --}}
        <aside class="col-lg-3">
            <div class="sticky-sidebar d-none d-lg-block">
                <h5 class="fw-bold mb-4 text-uppercase small" style="letter-spacing: 1.5px;">Danh mục liên quan</h5>
                <ul class="list-unstyled">
                    @foreach($globalCategories as $cate)
                        <li class="mb-2">
                            <a href="{{ route('category.show', $cate->id) }}" 
                               class="text-decoration-none {{ $category->id == $cate->id ? 'text-gold fw-bold' : 'text-muted' }} small">
                               {{ $cate->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </aside>

        {{-- Danh sách sản phẩm --}}
        <main class="col-lg-9">
            <div class="row g-4">
                @if($products->isEmpty())
                <div class="col-12 text-center py-5">
                    <img src="{{ asset('images/empty-box.png') }}" alt="Empty" style="width: 100px; opacity: 0.5;">
                    <p class="mt-3 text-muted">Chưa có sản phẩm nào trong danh mục này.</p>
                </div>
                @else
                @foreach ($products as $product)
                <div class="col-6 col-md-4">
                    <div class="product-card border-0 position-relative">
                        <div class="product-img-wrapper shadow-sm mb-3">
                            <a href="{{ route('product.detail', $product->id) }}">
                                <img src="{{ asset('uploads/products/'.$product->image_cover) }}" alt="{{ $product->name }}">
                            </a>
                            <div class="quick-add">
                                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn-minimal-cart">
                                        <i class="bi bi-cart-plus me-1"></i> THÊM NHANH
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="product-info text-center">
                            <h6 class="fw-bold mb-1" style="font-size: 0.9rem;">
                                <a href="{{ route('product.detail', $product->id) }}" class="text-decoration-none text-dark">
                                    {{ $product->name }}
                                </a>
                            </h6>
                            <p class="product-price mb-0">{{ number_format($product->price) }} đ</p>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </main>
    </div>
</div>
@endsection