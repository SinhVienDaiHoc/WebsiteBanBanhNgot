@extends('layouts.app')
@section('title', 'Chính sách đổi trả - Sweet Corner')

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
        color: #332D2D;
        font-size: 2.2rem;
    }
    
    .section-title {
        font-family: 'Playfair Display', serif;
        font-weight: 700;
        color: #4a1f1b;
        border-bottom: 2px solid #C5A059;
        display: inline-block;
        margin-bottom: 20px;
        padding-bottom: 5px;
    }

    .note-box {
        background-color: #fff9f0;
        border-left: 4px solid #C5A059;
        padding: 20px;
        margin: 20px 0;
        border-radius: 0 15px 15px 0;
    }
    .warning-box {
        background-color: #fff5f5;
        border-left: 4px solid #dc3545;
        padding: 15px;
        margin: 15px 0;
        border-radius: 0 15px 15px 0;
    }

    .method-label {
        background: #3E4A3D;
        color: white;
        padding: 4px 12px;
        border-radius: 50px;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        margin-bottom: 12px;
        display: inline-block;
    }

    .policy-list {
        list-style: none;
        padding-left: 0;
    }
    .policy-list li {
        position: relative;
        padding-left: 25px;
        margin-bottom: 10px;
        color: #555;
        line-height: 1.7;
        font-size: 0.95rem;
    }
    .policy-list li::before {
        content: "→";
        color: #C5A059;
        position: absolute;
        left: 0;
        font-weight: bold;
    }

    .temp-guide {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 15px;
    }
    .temp-item {
        background: #f8f9fa;
        padding: 8px 12px;
        border-radius: 10px;
        font-size: 0.8rem;
        border: 1px solid #eee;
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
                        <h2>Chính sách đổi trả & Hoàn tiền</h2>
                        <p class="text-muted small">Đảm bảo quyền lợi tốt nhất cho trải nghiệm của bạn</p>
                    </div>

                    <div class="mb-5">
                        <h5 class="section-title">1. Điều kiện đổi trả</h5>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <span class="method-label">Tại cửa hàng</span>
                                <ul class="policy-list">
                                    <li>Đổi trực tiếp khi chưa rời khỏi quầy.</li>
                                    <li>Sản phẩm còn nguyên trạng, chưa sử dụng.</li>
                                </ul>
                            </div>
                            <div class="col-md-6 mb-3">
                                <span class="method-label">Đặt hàng Online</span>
                                <ul class="policy-list">
                                    <li>Sai mẫu mã, chủng loại đơn hàng.</li>
                                    <li>Hư hại do quá trình vận chuyển.</li>
                                </ul>
                            </div>
                        </div>

                        <div class="note-box shadow-sm small">
                            <h6 class="fw-bold"><i class="bi bi-info-circle-fill me-2"></i>Quy định đồng kiểm</h6>
                            <p class="mb-0">Quý khách vui lòng <strong>đồng kiểm cùng Shipper</strong>. Nếu có sự cố xô lệch, hãy chụp ảnh và từ chối nhận. Chúng tôi sẽ xử lý ngay đơn mới.</p>
                        </div>
                    </div>

                    <div class="mb-5">
                        <h5 class="section-title">2. Chính sách hủy đơn & Hoàn tiền</h5>
                        <div class="p-3 border rounded-4 mb-3 bg-white">
                            <p class="mb-1 fw-bold text-success small">Hoàn 100%:</p>
                            <p class="small text-muted mb-0">Khi khách hàng hủy đơn trước khi xưởng tiến hành làm bánh.</p>
                        </div>
                        <div class="p-3 border rounded-4 bg-white">
                            <p class="mb-1 fw-bold text-danger small">Không hoàn tiền:</p>
                            <p class="small text-muted mb-0">Khi bánh đã hoàn thiện (vì sản phẩm tươi không thể tái sử dụng).</p>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h5 class="section-title">3. Hướng dẫn bảo quản</h5>
                        <div class="temp-guide">
                            <div class="temp-item"><i class="bi bi-thermometer-half text-warning"></i> 20°C: Bánh mì</div>
                            <div class="temp-item"><i class="bi bi-snow text-primary"></i> 3-7°C: Bánh kem</div>
                            <div class="temp-item"><i class="bi bi-ice-front text-info"></i> Tủ đá: Các loại Kem</div>
                        </div>
                        <p class="warning-box mt-3 small mb-0">
                            Phản hồi chất lượng cần gửi trong vòng <strong>12 giờ</strong> kể từ khi nhận bánh.
                        </p>
                    </div>

                    <div class="text-center p-4 rounded-4" style="background:#332D2D; color: #FAF6ED;">
                        <p class="small mb-1">Hotline khiếu nại (7:00 - 22:00)</p>
                        <h4 class="fw-bold" style="color: #C5A059;">0866 89 3570</h4>
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
                        <a href="{{ url('/') }}" class="text-muted text-decoration-none small">
                            <i class="bi bi-house-door me-1"></i> Quay lại Trang chủ
                        </a>
                    </div>
                </div>
            </div>

        </div> </div>
</div>
@endsection