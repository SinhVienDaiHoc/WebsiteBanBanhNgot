<style>
    .policy-list-sidebar {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .policy-list-sidebar li {
        margin-bottom: 8px;
    }
    .policy-link-item {
        display: flex;
        align-items: center;
        padding: 12px 18px;
        color: #555;
        text-decoration: none;
        background: #fdfaf5;
        border-radius: 12px;
        border: 1px solid transparent;
        transition: all 0.3s ease;
        font-size: 0.95rem;
    }
    .policy-link-item i {
        margin-right: 12px;
        color: #C5A059;
        font-size: 1.1rem;
    }
    .policy-link-item:hover {
        background: #ffffff;
        border-color: #C5A059;
        color: #C5A059;
        transform: translateX(5px);
        box-shadow: 0 4px 12px rgba(197, 160, 89, 0.1);
    }
    /* Style cho link đang được chọn (Active) */
    .policy-link-item.active {
        background: #C5A059;
        color: white;
    }
    .policy-link-item.active i {
        color: white;
    }
</style>

<ul class="policy-list-sidebar">
    <li>
        <a href="{{ route('chinhsachchung') }}" class="policy-link-item {{ Request::routeIs('chinhsachchung') ? 'active' : '' }}">
            <i class="bi bi-info-circle"></i> Chính sách chung
        </a>
    </li>
    <li>
        <a href="{{ route('chinhsachvanchuyen') }}" class="policy-link-item {{ Request::routeIs('chinhsachvanchuyen') ? 'active' : '' }}">
            <i class="bi bi-truck"></i> Chính sách vận chuyển
        </a>
    </li>
    <li>
        <a href="{{ route('chinhsachdoitra') }}" class="policy-link-item {{ Request::routeIs('chinhsachdoitra') ? 'active' : '' }}">
            <i class="bi bi-arrow-left-right"></i> Chính sách đổi trả
        </a>
    </li>
    <li>
        <a href="{{ route('chinhsachbaomat') }}" class="policy-link-item {{ Request::routeIs('chinhsachbaomat') ? 'active' : '' }}">
            <i class="bi bi-shield-lock"></i> Chính sách bảo mật
        </a>
    </li>
    <li>
        <a href="{{ route('chinhsachthanhtoan') }}" class="policy-link-item {{ Request::routeIs('chinhsachthanhtoan') ? 'active' : '' }}">
            <i class="bi bi-credit-card"></i> Giao dịch & Thanh toán
        </a>
    </li>
</ul>