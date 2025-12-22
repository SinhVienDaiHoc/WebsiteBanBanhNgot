@extends('layouts.app')
@section('title','HomePage')

@section('content')
<style>
    /* 1. Xử lý Sticky Sidebar */
    .sticky-sidebar {
        position: -webkit-sticky;
        position: sticky;
        top: 100px; /* Khoảng cách khi cuộn trang dính lại */
        z-index: 10;
        height: fit-content;
    }

    /* 2. Style Card Sản phẩm (Đồng bộ khung & tinh tế) */
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

    /* 3. Nút Thêm nhanh */
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

    /* 4. Sidebar Link Style */
    .sidebar-category li a {
        color: #777; text-decoration: none; font-size: 0.9rem;
        display: block; padding: 10px 0; border-bottom: 1px solid rgba(0,0,0,0.03);
        transition: 0.3s;
    }
    .sidebar-category li a.active, .sidebar-category li a:hover {
        color: #C5A059; font-weight: 600; padding-left: 8px;
    }
</style>

<section class="py-3">
    {{-- PHẦN BANNER - Thu nhỏ lại để vừa cấu trúc --}}
    <div class="container mb-5">
        <div id="heroCarousel" class="carousel slide shadow-sm" data-bs-ride="carousel" style="border-radius: 25px; overflow: hidden;">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('images/banner.png') }}" class="d-block w-100" style="height: 400px; object-fit: cover;">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/banner2.png') }}" class="d-block w-100" style="height: 400px; object-fit: cover;">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/banner3.png') }}" class="d-block w-100" style="height: 400px; object-fit: cover;">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </div>

    {{-- PHẦN DANH MỤC & SẢN PHẨM --}}
    <div class="container">
        <div class="row">
            {{-- SIDEBAR: Dính lại khi cuộn --}}
            <aside class="col-lg-3">
                <div class="sticky-sidebar">
                    <h5 class="fw-bold mb-4 text-uppercase" style="letter-spacing: 1.5px; font-size: 0.9rem;">Danh mục</h5>
                    <ul class="sidebar-category list-unstyled">
                        <li><a href="#" class="{{ !request('category') ? 'active' : '' }}">Tất cả sản phẩm</a></li>
                        @foreach($globalCategories as $cate)
                            <li>
                                <a href="{{ route('category.show', $cate->id) }}" 
                                   class="{{ request('category') == $cate->id ? 'active' : '' }}">
                                   {{ $cate->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </aside>

            {{-- LƯỚI SẢN PHẨM --}}
            <main class="col-lg-9">
                <div class="row row-cols-2 row-cols-md-3 g-4">
                    @forelse($products as $pro)
                    <div class="col">
                        <div class="product-card border-0 position-relative mb-4">
                            <div class="product-img-wrapper shadow-sm mb-3">
                                <a href="{{ route('product.detail', $pro->id) }}">
                                    <img src="{{ asset('uploads/products/'.$pro->image) }}" alt="{{ $pro->name }}" loading="lazy">
                                </a>
                                <div class="quick-add">
                                    <form action="{{ route('cart.add', $pro->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn-minimal-cart">
                                            <i class="bi bi-plus-lg me-1"></i> THÊM VÀO GIỎ
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="product-info text-center">
                                <small class="category-label text-uppercase mb-1 d-block">{{ $pro->category->name ?? 'Handmade' }}</small>
                                <h6 class="product-name fw-bold">
                                    <a href="{{ route('product.detail', $pro->id) }}" class="text-decoration-none text-dark">{{ $pro->name }}</a>
                                </h6>
                                <p class="product-price text-gold fw-bold mb-0">{{ number_format($pro->price, 0, ',', '.') }} đ</p>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12 text-center py-5">
                        <p class="text-muted fst-italic">Hiện chưa có sản phẩm nào phù hợp.</p>
                    </div>
                    @endforelse
                </div>
            </main>
        </div> {{-- Kết thúc Row --}}
    </div> {{-- Kết thúc Container --}}
</section>
@endsection