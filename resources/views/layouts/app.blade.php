<!doctype html>
<html lang="{{ str_replace('_','-', app()->getLocale() ) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') | {{ config('app.name') }}</title>

    {{-- Fonts & Icons --}}
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=Plus+Jakarta+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    
    <style>
        :root {
            --cream: #FAF9F6;
            --gold: #C5A059;
            --dark-olive: #3E4A3D;
            --soft-white: #ffffff;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--cream);
            color: var(--dark-olive);
        }

        /* Navbar Ngang - Aesthetic Style */
        .topbar {
            background: var(--soft-white);
            border-bottom: 1px solid rgba(197, 160, 89, 0.15);
            padding: 1rem 0;
            transition: all 0.3s ease;
        }

        .brand {
            font-family: 'Playfair Display', serif;
            font-weight: 900;
            color: var(--dark-olive);
            font-size: 1.6rem;
            letter-spacing: -0.5px;
        }

        .brand span { color: var(--gold); }

        /* Ô tìm kiếm tinh tế */
        .search-container { max-width: 400px; position: relative; }
        .search-input {
            border-radius: 12px;
            border: 1px solid #eee;
            background: #f8f9fa;
            padding-left: 40px;
            font-size: 0.9rem;
            transition: 0.3s;
        }
        .search-input:focus {
            box-shadow: 0 0 0 3px rgba(197, 160, 89, 0.1);
            border-color: var(--gold);
            background: #fff;
        }
        .search-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
        }

        /* Menu ngang */
        .nav-menu {
            list-style: none;
            display: flex;
            gap: 25px;
            margin: 0;
            padding: 0;
            align-items: center;
        }
        .nav-link-item {
            text-decoration: none;
            color: var(--dark-olive);
            font-size: 0.85rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: 0.3s;
        }
        .nav-link-item:hover { color: var(--gold); }

        /* Icons Group */
        .icon-link {
            color: var(--dark-olive);
            text-decoration: none;
            position: relative;
            transition: 0.3s;
        }
        .icon-link:hover { color: var(--gold); }
        
        .badge-cart {
            background: var(--gold);
            font-size: 0.65rem;
            padding: 0.35em 0.6em;
        }

        /* Hero Carousel Adjustment */
        .hero .carousel-item img {
            height: 500px;
            object-fit: cover;
            border-radius: 25px;
        }

        @media (max-width: 992px) {
            .nav-menu { display: none; } /* Mobile sẽ dùng offcanvas */
        }
    </style>
    @stack('head')
</head>

<body>

    <header class="topbar {{ request()->routeIs('home') ? 'sticky-top' : '' }}">
        <div class="container d-flex align-items-center justify-content-between">
            
          {{-- Tool --}}
            <div class="d-flex align-items-center gap-4">
                <a href="{{ route('home') }}" class="text-decoration-none">
                    <h1 class="brand mb-0">STU <span>Bakery</span></h1>
                </a>
                    
                <a class="nav-link-item py-2" href="{{ route('chinhsachchung') }}">Chính sách cửa hàng</a>

                
                <button class="btn border-0 fw-bold d-none d-lg-block" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCategories" style="font-size: 0.9rem;">
                    <i class="bi bi-grid-fill me-1 text-gold"></i> VOUCHER</button>
                <a class="nav-link-item py-2" href="{{ route('blogs') }}">BLOGS</a>

            </div>
             {{-- Tool --}}

            {{-- SEARCH --}}
            <div class="search-container flex-grow-1 mx-5 d-none d-lg-block">
                <form action="{{ route('search') }}" method="GET">
                    <i class="bi bi-search search-icon"></i>
                    <input class="form-control search-input" type="search" name="q" placeholder="Tìm kiếm hương vị bạn yêu thích...">
                </form>
            </div>
           

            <div class="d-flex align-items-center gap-4">
                <button class="btn d-lg-none" data-bs-toggle="collapse" data-bs-target="#mSearch">
                    <i class="bi bi-search fs-5"></i>
                </button>
                 {{-- SEARCH --}}

                <a href="{{ route('cart.index') }}" class="icon-link">
                    <i class="bi bi-bag-heart fs-4"></i>
                    @php $cartCount = session('cart') ? array_sum(array_column(session('cart'), 'quantity')) : 0; @endphp
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill badge-cart">
                        {{ $cartCount }}
                    </span>
                </a>

                {{-- AUTH --}}
                <div class="dropdown">
                    <a href="#" class="icon-link d-flex align-items-center gap-2" data-bs-toggle="dropdown">
                        <i class="bi bi-person fs-4"></i>
                        @auth <span class="small fw-bold d-none d-md-inline">{{ Auth::user()->name }}</span> @endauth
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0 mt-3">
                        @guest
                            <li><a class="dropdown-item" href="{{ route('login') }}">Đăng nhập</a></li>
                            <li><a class="dropdown-item" href="{{ route('register') }}">Đăng ký</a></li>
                        @endguest
                        @auth
                            <li class="dropdown-header border-bottom mb-2">
                                <span class="text-gold fw-bold">⭐ {{ \Illuminate\Support\Facades\DB::table('points')->where('user_id', Auth::id())->sum('points') }} Điểm</span>
                            </li>
                            <li><a class="dropdown-item" href="{{ url('/profile') }}">Hồ sơ của tôi</a></li>
                            <li><a class="dropdown-item" href="{{ url('/don-hang') }}">Lịch sử đơn hàng</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button class="dropdown-item text-danger" type="submit">Đăng xuất</button>
                                </form>
                            </li>
                        @endauth
                    </ul>
                </div>
                {{-- AUTH --}}
            </div>
        </div>
        
        <div id="mSearch" class="collapse px-3 mt-2 d-lg-none">
            <form action="{{ route('search') }}" method="GET">
                <input class="form-control search-input" type="search" name="q" placeholder="Tìm kiếm bánh...">
            </form>
        </div>
    </header>

    {{-- SOURCE CỦA VOUCHER --}}
    <div class="offcanvas offcanvas-start border-0" tabindex="-1" id="offcanvasCategories" style="background: var(--cream);">
       
        <div class="offcanvas-body">
            <nav class="nav flex-column gap-2">
                <a class="nav-link-item py-2 border-bottom" href="{{ route('voucher.exchange.index') }}"><i class="bi bi-gift me-2 text-success"></i> Đổi thưởng Voucher</a>
                <a class="nav-link-item py-2 border-bottom" href="{{ route('user-voucher.index') }}"><i class="bi bi-ticket-perforated me-2"></i> Túi Voucher của tôi</a>
               
            </nav>
        </div>
    </div>{{-- SOURCE CỦA VOUCHER --}}

    <main>@yield('content')</main>

    <footer class="mt-5 py-5" style="background: #f1efeb;">
        <div class="container text-center">
            <h2 class="brand mb-3">STU <span>Bakery</span></h2>
            <p class="small text-muted mb-0">© {{ date('Y') }} STU-DoAn. Handmade with Passion.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')

    {{-- Toast Success --}}
    @if (session('cart_success'))
    <div id="toast-cart" class="shadow-lg border-0" style="position: fixed; top: 90px; right: 30px; background: #fff; border-left: 5px solid var(--gold) !important; padding: 15px 25px; border-radius: 8px; z-index: 9999;">
        <i class="bi bi-check-circle-fill text-success me-2"></i> {{ session('cart_success') }}
    </div>
    <script>
        setTimeout(() => {
            const t = document.getElementById('toast-cart');
            if (t) { t.style.opacity = '0'; setTimeout(() => t.remove(), 400); }
        }, 3000);
    </script>
    @endif
</body>
</html>