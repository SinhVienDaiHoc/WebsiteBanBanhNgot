@extends('layouts.app')
@section('title', 'Chính sách và Quy định chung - Sweet Corner')

@section('content')
<style>
    /* Thừa hưởng style đồng nhất từ website */
    .policy-page {
        background-color: #FAF6ED; /* Màu kem đặc trưng */
        padding: 60px 0;
    }
    
    .policy-card {
        background: #ffffff;
        padding: 45px;
        border-radius: 30px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.03);
        border: 1px solid rgba(197, 160, 89, 0.1);
    }

    /* Tiêu đề chính */
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
    .policy-header .line {
        width: 60px;
        height: 3px;
        background: #C5A059;
        margin: 15px auto;
    }

    /* Các mục nội dung */
    .policy-section {
        margin-bottom: 35px;
    }
    .policy-section h5 {
        font-family: 'Playfair Display', serif;
        font-weight: 700;
        color: #3E4A3D;
        font-size: 1.25rem;
        margin-bottom: 15px;
        display: flex;
        align-items: center;
    }
    .policy-section h5 i {
        color: #C5A059;
        margin-right: 12px;
        font-size: 1.4rem;
    }

    .policy-content {
        padding-left: 35px;
    }
    .policy-content p, .policy-content li {
        color: #666;
        line-height: 1.8;
        list-style: none;
        margin-bottom: 10px;
        position: relative;
        font-size: 0.95rem;
    }
    .policy-content li::before {
        content: "✦";
        color: #C5A059;
        position: absolute;
        left: -25px;
    }

    /* Box liên hệ đặc biệt */
    .contact-badge {
        background: #3E4A3D;
        color: white;
        padding: 25px;
        border-radius: 20px;
        margin-top: 40px;
    }
    .contact-link {
        color: #C5A059;
        text-decoration: none;
        font-weight: 600;
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
                <article class="policy-card">
                    
                    <div class="policy-header">
                        <h2>Chính sách & Quy định chung</h2>
                        <div class="line"></div>
                    </div>

                    <div class="policy-section">
                        <h5><i class="bi bi-award"></i> 1. Tiêu chuẩn dịch vụ</h5>
                        <div class="policy-content">
                            <p><strong>Sweet Corner</strong> tự hào là thương hiệu bánh ngọt Pháp kế thừa tinh hoa từ Công ty cổ phần bánh ngọt Anh Hòa.</p>
                            <ul>
                                <li>Nguyên liệu được tuyển chọn khắt khe từ: <strong>New Zealand, Mỹ, Pháp, Bỉ...</strong></li>
                                <li>Xưởng sản xuất hiện đại đạt tiêu chuẩn <strong>ISO 22000:2018</strong>.</li>
                            </ul>
                        </div>
                    </div>

                    <div class="policy-section">
                        <h5><i class="bi bi-shield-check"></i> 2. Cam kết chất lượng</h5>
                        <div class="policy-content">
                            <ul>
                                <li><strong>Sạch & Tươi:</strong> Bánh tươi trong ngày, 100% không chất bảo quản.</li>
                                <li><strong>An toàn:</strong> Quy trình kiểm soát vệ sinh nghiêm ngặt nhất.</li>
                                <li><strong>Tâm huyết:</strong> Sản phẩm từ đội ngũ nghệ nhân lành nghề.</li>
                            </ul>
                        </div>
                    </div>

                    <div class="policy-section">
                        <h5><i class="bi bi-truck"></i> 3. Quy trình vận hành</h5>
                        <div class="policy-content">
                            <ul>
                                <li>Bảo quản trong môi trường nhiệt độ tiêu chuẩn.</li>
                                <li>Hệ thống vận chuyển chuyên dụng đến khắp TP. Hồ Chí Minh.</li>
                            </ul>
                        </div>
                    </div>

                    <div class="contact-badge text-center">
                        <h6 class="text-white mb-3 fw-bold">4. Thông tin hỗ trợ</h6>
                        <p class="small text-white-50 mb-3">Mọi thắc mắc vui lòng kết nối với chúng tôi:</p>
                        <div class="d-flex justify-content-center gap-3 flex-wrap">
                            <span class="small"><i class="bi bi-facebook me-1 text-gold"></i> <a href="#" class="contact-link">Sweet Corner Official</a></span>
                            <span class="small"><i class="bi bi-telephone-fill me-1 text-gold"></i> <a href="tel:1900xxxx" class="contact-link">1900 xxxx</a></span>
                        </div>
                    </div>

                </article>
            </div>

            <div class="col-lg-4">
                <div class="sidebar-policy">
                    <h4 class="sidebar-title">Đọc thêm</h4>
                    <hr class="w-25 mb-4" style="border-top: 3px solid #C5A059;">
                    
                    {{-- File chứa các link <li> mà bạn đã tạo --}}
                    @include('chinhsach.policy_link')

                    <div class="text-center mt-5">
                        <a href="{{ url('/') }}" class="text-muted text-decoration-none small">
                            <i class="bi bi-house-door me-1"></i> Quay lại Trang chủ
                        </a>
                    </div>
                </div>
            </div>

        </div> </div>
</div>
@endsection