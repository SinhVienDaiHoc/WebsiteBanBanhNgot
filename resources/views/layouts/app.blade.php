<!doctype html>
<html lang="{{ str_replace('_','-', app()->getLocale() ) }}">
<head>

  <meta charset="utf-8">
  <title>STU Bakery</title>
  
  
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title') | {{ config('app.name') }}</title>

  {{-- Bootstrap + Icons (CDN) --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <style>
    .container-wide{max-width:1200px}
    .topbar{background:#F8EEDB;box-shadow:0 6px 14px rgba(0,0,0,.04)}
    .brand{font-weight:800;color:#ffb000}
    .search-input{border-radius:999px;background:#f6f7fb}
    .category-btn{border-radius:12px;background:#f4f6f8}
    .hero .carousel-item img{width:100%;height:420px;object-fit:cover;border-radius:16px}
    .badge-dot{position:absolute;top:0;right:0;transform:translate(30%,-30%)}
    @media (max-width:576px){.hero .carousel-item img{height:240px}}
  </style>
  @stack('head')
</head>
<body class="site-background">


<header class="topbar sticky-top custom-header">

  <div class="container container-wide py-2">
    <div class="d-flex align-items-center gap-3">
      

      {{-- start Logo --}}
      <a href="{{ route('home') }}" class="text-decoration-none d-flex align-items-center gap-2">
        <span class="brand fs-4">STU Bakery</span>
      </a>
       {{-- end Logo --}}

      {{-- start Tìm kiếm desktop --}}
      <form class="flex-grow-1 d-none d-md-block">
        <div class="input-group">
          <input class="form-control search-input px-4" type="search" placeholder="Tìm kiếm">
           <button class="btn search-btn px-3 rounded-end-pill" type="submit">
           <i class="bi bi-search"></i>
             </button>


        </div>
      </form>
      {{-- end Tìm kiếm desktop --}}

      {{-- start Icon phải --}}
      <div class="ms-auto d-flex align-items-center gap-3">
        <a href="#" class="position-relative text-dark text-decoration-none">
          <i class="bi bi-cart3 fs-4"></i>
          <span class="badge bg-danger rounded-pill badge-dot">0</span>
          <span class="ms-1 d-none d-lg-inline">Giỏ hàng</span>
        </a>

        <div class="dropdown">
          <a href="#" class="text-dark text-decoration-none dropdown-toggle d-flex align-items-center gap-2" data-bs-toggle="dropdown">
            <i class="bi bi-person-circle fs-4"></i>
            <span class="d-none d-lg-inline">@auth{{ Auth::user()->name }}
           @else
            Tài khoản
           @endauth
           </span>
          </a>
          <ul class="dropdown-menu dropdown-menu-end">

            @guest
        {{-- Khi CHƯA đăng nhập --}}
        <li>
            <a class="dropdown-item" href="{{ route('login') }}">Đăng nhập</a>
        </li>
        <li>
            <a class="dropdown-item" href="{{ route('register') }}">Đăng ký</a>
        </li>
    @endguest


    @auth
        {{-- Khi ĐÃ đăng nhập --}}
        <li class="dropdown-item text-dark fw-bold">
            👤 {{ Auth::user()->name }}
        </li>
          <li><a class="dropdown-item" href="#">Đơn hàng</a></li>
        <li>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="dropdown-item text-danger" type="submit">
                    Đăng xuất
                </button>
            </form>
        </li>
    @endauth

</ul>

        </div>
        {{-- end Icon phải --}}

        {{-- start Nút search mobile --}}
        <button class="btn d-md-none" data-bs-toggle="collapse" data-bs-target="#mSearch">
          <i class="bi bi-search fs-5"></i>
        </button>
      </div>
    </div>
     {{-- end Nút search mobile --}}

    {{-- start Ô tìm kiếm mobile --}}
    <div id="mSearch" class="collapse mt-2 d-md-none">
      <form>
        <div class="input-group">
          <input class="form-control search-input px-4" type="search" placeholder="Tìm kiếm">
          <button class="btn btn-outline-secondary px-3 rounded-end-pill" type="submit">
            <i class="bi bi-search"></i>
          </button>
        </div>
      </form>
    </div>
    {{-- end Ô tìm kiếm mobile --}}

    {{-- start Nút Danh mục --}}
    <div class="mt-3">
      <button class="btn category-btn px-3 py-2" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCategories">
        <i class="bi bi-list me-2"></i> Danh mục
      </button>
    </div>
  </div>
</header>
{{-- end Nút Danh mục --}}

{{-- start Offcanvas Danh mục --}}
<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasCategories">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title">Danh mục</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
  </div>
  <div class="offcanvas-body small">
    <ul class="list-unstyled">

      
      <li><a class="dropdown-item py-2" href="chinhsach">Các chính sách của cửa hàng</a></li>


  

      {{-- Bánh ngọt: link sang trang mới --}}
      <li>
        <a class="dropdown-item py-2" href="{{ route('category.banhngot') }}">
          Bánh ngọt
        </a>
      </li>
      <li>

    <a class="dropdown-item py-2" href="{{ route('category.banhkem') }}">
        Bánh kem
    </a>
</li>




      <li><a class="dropdown-item py-2" href="#">Cần thêm</a></li>
      <li><a class="dropdown-item py-2" href="#">Cần thêm</a></li>

    </ul>
  </div>
</div>
{{-- end Offcanvas Danh mục --}}

{{-- start Layout main body --}}
<main>@yield('content')</main>
{{-- end Layout main body --}}

{{-- start footer --}}
  <footer class="mt-5 py-4 footer-background">
  <div class="container container-wide text-center small text-muted">
    © {{ date('Y') }} Stu-DoAn
  </div>
</footer>
{{-- end footer --}}

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>
