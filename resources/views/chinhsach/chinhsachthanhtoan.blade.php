@extends('layouts.app')
@section('title', 'Chính sách giao dịch & Thanh toán - Sweet Corner')

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
        border: 1px solid rgba(197, 160, 89, 0.1);
    }
    .policy-header {
        text-align: center;
        margin-bottom: 40px;
    }
    .policy-header h2 {
        font-family: 'Playfair Display', serif;
        font-weight: 800;
        font-size: 2.2rem;
        color: #332D2D;
    }

    /* Thiết kế quy trình theo bước */
    .transaction-steps {
        position: relative;
        padding-left: 10px;
    }
    .step-item {
        position: relative;
        padding-left: 55px;
        margin-bottom: 35px;
    }
    .step-item::before {
        content: "";
        position: absolute;
        left: 19px;
        top: 40px;
        width: 2px;
        height: calc(100% - 10px);
        background: #F1E4CC;
    }
    .step-item:last-child::before {
        display: none;
    }

    .step-number {
        position: absolute;
        left: 0;
        top: 0;
        width: 40px;
        height: 40px;
        background: #C5A059;
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        font-family: 'Playfair Display', serif;
        z-index: 1;
        box-shadow: 0 4px 10px rgba(197, 160, 89, 0.2);
    }

    .step-content h5 {
        font-family: 'Playfair Display', serif;
        font-weight: 700;
        color: #4a1f1b;
        margin-bottom: 10px;
    }
    .step-content p {
        color: #666;
        line-height: 1.7;
        font-size: 0.95rem;
    }

    /* Box phương thức thanh toán */
    .payment-methods {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
        margin-top: 15px;
    }
    .payment-badge {
        background: #fdfaf5;
        border: 1px solid #C5A059;
        padding: 10px 20px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 0.9rem;
        font-weight: 600;
        color: #3E4A3D;
    }
    .payment-badge i {
        font-size: 1.2rem;
        color: #C5A059;
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
                        <span class="text-gold text-uppercase fw-bold small" style="letter-spacing: 2px;">Shopping Guide</span>
                        <h2 class="mt-2">Giao dịch & Thanh toán</h2>
                        <div class="mx-auto mt-2" style="width: 50px; height: 2px; background: #C5A059;"></div>
                    </div>

                    <div class="transaction-steps">
                        <div class="step-item">
                            <div class="step-number">01</div>
                            <div class="step-content">
                                <h5>Tìm kiếm & Tư vấn</h5>
                                <p>Khách hàng lựa chọn hương vị yêu thích trên website. Sweet Corner sẵn sàng tư vấn qua Hotline hoặc Chatbot về nguyên liệu và mẫu mã phù hợp nhất.</p>
                            </div>
                        </div>

                        <div class="step-item">
                            <div class="step-number">02</div>
                            <div class="step-number">02</div>
                            <div class="step-content">
                                <h5>Lựa chọn điểm mua hàng</h5>
                                <p>Chúng tôi sẽ hướng dẫn bạn đến cửa hàng gần nhất hoặc hỗ trợ đặt hàng giao tận nơi trong khu vực TP. Hồ Chí Minh.</p>
                            </div>
                        </div>

                        <div class="step-item">
                            <div class="step-number">03</div>
                            <div class="step-content">
                                <h5>Phương thức thanh toán</h5>
                                <p>Nhằm mang lại sự tiện lợi, chúng tôi hỗ trợ các hình thức thanh toán bảo mật:</p>
                                <div class="payment-methods">
                                    <div class="payment-badge">
                                        <i class="bi bi-cash-stack"></i> Tiền mặt tại quầy / COD
                                    </div>
                                    <div class="payment-badge">
                                        <i class="bi bi-bank"></i> Chuyển khoản ngân hàng
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-5 pt-4 border-top">
                        <p class="text-muted small mb-0">Cảm ơn bạn đã tin tưởng đồng hành cùng Sweet Corner</p>
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
                        <a href="{{ url('/') }}" class="btn btn-outline-dark btn-sm rounded-pill px-4">
                            <i class="bi bi-house-door me-1"></i> Về trang chủ
                        </a>
                    </div>
                </div>
            </div>

        </div> </div>
</div>
@endsection