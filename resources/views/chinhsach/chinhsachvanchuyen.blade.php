@extends('layouts.app')
@section('title', 'Dịch vụ giao hàng tận nơi - Sweet Corner')

@section('content')
<style>
    .policy-page {
        background-color: #FAF6ED;
        padding: 60px 0;
    }
    .policy-card {
        background: #ffffff;
        padding: 45px;
        border-radius: 30px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.03);
    }
    
    .policy-header {
        text-align: center;
        margin-bottom: 40px;
    }
    .policy-header h2 {
        font-family: 'Playfair Display', serif;
        font-weight: 800;
        font-size: 1.8rem;
        color: #332D2D;
        line-height: 1.4;
        text-transform: uppercase;
    }

    .letter-greeting {
        font-family: 'Playfair Display', serif;
        font-style: italic;
        color: #4a1f1b;
        font-size: 1.1rem;
        margin-bottom: 15px;
        display: block;
    }

    .policy-text {
        color: #666;
        line-height: 1.7;
        font-size: 0.95rem;
        text-align: justify;
        margin-bottom: 25px;
    }

    /* Bảng phí ship tinh tế */
    .shipping-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0 8px;
        margin: 20px 0;
    }
    .shipping-table tr {
        background: #fdfaf5;
        transition: 0.3s;
    }
    .shipping-table td {
        padding: 15px;
        border: none;
        font-size: 0.9rem;
    }
    .shipping-table td:first-child {
        border-radius: 12px 0 0 12px;
        font-weight: 600;
        color: #332D2D;
    }
    .shipping-table td:last-child {
        border-radius: 0 12px 12px 0;
        text-align: right;
    }

    .price-badge {
        background: #C5A059;
        color: white;
        padding: 4px 12px;
        border-radius: 50px;
        font-weight: 700;
        font-size: 0.8rem;
    }

    .free-badge {
        background: #3E4A3D;
        color: white;
        padding: 4px 12px;
        border-radius: 50px;
        font-weight: 700;
        font-size: 0.8rem;
    }

    .shipping-note {
        background: #f8f9fa;
        padding: 15px;
        border-radius: 12px;
        font-size: 0.85rem;
        border-left: 4px solid #C5A059;
        color: #666;
    }

    /* Sidebar Style */
    .sidebar-policy {
        position: sticky;
        top: 20px;
    }
    .sidebar-title {
        font-family: 'Playfair Display', serif;
        font-weight: 700;
        color: #332D2D;
        margin-bottom: 20px;
    }
</style>

<div class="policy-page">
    <div class="container">
        <div class="row">
            
            <div class="col-lg-8 mb-4">
                <div class="policy-card">
                    <div class="policy-header">
                        <h2>Thông báo dịch vụ <br> Giao hàng tận nơi</h2>
                        <div class="mx-auto mt-3" style="width: 50px; height: 2px; background: #C5A059;"></div>
                    </div>

                    <div class="policy-body">
                        <span class="letter-greeting">Kính gửi Quý khách,</span>
                        
                        <p class="policy-text">
                            <strong>Sweet Corner</strong> xin cảm ơn Quý khách đã tin tưởng. Để mang lại sự tiện lợi tối đa và đảm bảo những chiếc bánh luôn tươi ngon khi đến tay bạn, chúng tôi xin thông báo biểu phí vận chuyển dựa trên khoảng cách thực tế như sau:
                        </p>

                        <div class="p-3 mb-4 rounded-4 text-center" style="background: #FAF6ED; border: 1px dashed #C5A059;">
                            <p class="mb-0 fw-bold small" style="color: #4a1f1b;">
                                <i class="bi bi-info-circle me-2"></i> 
                                Áp dụng cho đơn hàng từ 200.000 VNĐ
                            </p>
                        </div>

                        <table class="shipping-table">
                            <tbody>
                                <tr>
                                    <td><i class="bi bi-geo-alt me-2 text-gold"></i> Dưới 1km</td>
                                    <td><span class="free-badge">MIỄN PHÍ</span></td>
                                </tr>
                                <tr>
                                    <td><i class="bi bi-geo-alt me-2 text-gold"></i> Từ 1km - 3km</td>
                                    <td><span class="price-badge">20k - 30k</span></td>
                                </tr>
                                <tr>
                                    <td><i class="bi bi-geo-alt me-2 text-gold"></i> Từ 3km - 5km</td>
                                    <td><span class="price-badge">30k - 40k</span></td>
                                </tr>
                                <tr>
                                    <td><i class="bi bi-geo-alt me-2 text-gold"></i> Từ 5km - 8km</td>
                                    <td><span class="price-badge">50k - 60k</span></td>
                                </tr>
                                <tr>
                                    <td><i class="bi bi-geo-alt me-2 text-gold"></i> Trên 8km</td>
                                    <td><span class="text-muted fst-italic small">Tư vấn theo app</span></td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="shipping-note mt-4">
                            <p class="mb-0">
                                <i class="bi bi-clock-history me-2"></i>
                                <strong>Lưu ý:</strong> Áp dụng khung giờ <strong>06:00 - 18:00</strong>. Ngoài giờ này Quý khách vui lòng liên hệ hotline để được hỗ trợ.
                            </p>
                        </div>

                        <div class="text-center mt-4">
                            <p class="font-serif italic small" style="color: #4a1f1b;">Trân trọng cảm ơn!</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="sidebar-policy">
                    <h4 class="sidebar-title">Đọc thêm</h4>
                    <hr class="w-25 mb-4" style="border-top: 3px solid #C5A059;">
                    
                    {{-- Gọi danh sách link chính sách --}}
                    @include('chinhsach.policy_link')

                    <div class="mt-5 text-center">
                        <a href="{{ url('/') }}" class="btn btn-outline-dark btn-sm rounded-pill px-4 shadow-sm">
                            <i class="bi bi-house-door me-1"></i> Về trang chủ
                        </a>
                    </div>
                </div>
            </div>

        </div> </div>
</div>
@endsection