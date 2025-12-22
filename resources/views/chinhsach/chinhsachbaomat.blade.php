@extends('layouts.app')
@section('title','Chính sách bảo mật - Sweet Corner')

@section('content')
<style>
    /* Tổng thể trang chính sách */
    .policy-wrapper {
        background-color: #FAF6ED; /* Màu nền kem đồng bộ */
        padding: 60px 0;
    }
    
    .policy-container {
        background: white;
        padding: 40px;
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
        font-size: 2.2rem;
        color: #332D2D;
        margin-bottom: 10px;
    }

    .policy-header .sub-title {
        color: #B2935B;
        text-transform: uppercase;
        letter-spacing: 2px;
        font-size: 0.8rem;
        font-weight: 700;
    }

    .policy-section h5 {
        font-family: 'Playfair Display', serif;
        font-weight: 700;
        color: #4a1f1b;
        border-left: 4px solid #C5A059;
        padding-left: 15px;
        margin-bottom: 15px;
        margin-top: 25px;
    }

    .policy-section p, .policy-section li {
        color: #666;
        line-height: 1.8;
        font-size: 0.95rem;
    }

    .policy-section ul {
        list-style: none;
        padding-left: 0;
    }

    .policy-section ul li {
        position: relative;
        padding-left: 25px;
        margin-bottom: 8px;
    }

    .policy-section ul li::before {
        content: '•';
        color: #C5A059;
        font-weight: bold;
        position: absolute;
        left: 5px;
        font-size: 1.2rem;
    }

    .highlight-box {
        background-color: #fcf8f2;
        border: 1px dashed #C5A059;
        padding: 20px;
        border-radius: 15px;
        margin: 20px 0;
    }

    /* Style cho Sidebar (List Link) */
    .sidebar-policy {
        position: sticky;
        top: 20px;
    }
    
    .sidebar-title {
        font-family: 'Playfair Display', serif;
        font-weight: 700;
        margin-bottom: 20px;
        color: #332D2D;
    }
</style>

<div class="policy-wrapper">
    <div class="container">
        <div class="row">
            
            <div class="col-lg-8 mb-4">
                <div class="policy-container">
                    <div class="policy-header">
                        <span class="sub-title">Điều khoản & Cam kết</span>
                        <h2>Chính sách bảo mật</h2>
                        <div class="mx-auto" style="width: 60px; height: 3px; background: #C5A059;"></div>
                    </div>

                    <div class="policy-section">
                        <h5>1. Mục đích và phạm vi thu thập thông tin</h5>
                        <ul>
                            <li>Các thông tin giao dịch như: lịch sử đơn hàng, giá trị giao dịch sẽ được <strong>Sweet Corner</strong> lưu trữ nhằm giải quyết những vấn đề phát sinh nếu có.</li>
                            <li>Mục đích chính của việc thu thập thông tin là nhằm nâng cao chất lượng dịch vụ, nâng cao tiện ích nhằm chăm sóc khách hàng một cách tốt nhất.</li>
                        </ul>
                    </div>

                    <div class="policy-section">
                        <h5>2. Phạm vi sử dụng thông tin</h5>
                        <p>Thông tin của Quý khách chúng tôi có thể sử dụng cho một số công việc như sau:</p>
                        <ul>
                            <li>Gửi thư tới Quý khách để giới thiệu sản phẩm mới và những chương trình khuyến mãi thông báo, hỗ trợ chăm sóc khách hàng.</li>
                            <li>Giải quyết các vấn đề tranh chấp phát sinh nếu có.</li>
                        </ul>
                        <div class="highlight-box">
                            <p class="mb-2 fw-bold text-dark">Chúng tôi cam kết tuyệt đối trong mọi trường hợp:</p>
                            <ul class="mb-0">
                                <li>Không bán, trao đổi, chia sẻ thông tin cho bên thứ ba.</li>
                                <li>Không đưa khách hàng vào những sự việc vi phạm pháp luật.</li>
                            </ul>
                        </div>
                    </div>

                    <div class="policy-section">
                        <h5>3. Thời gian lưu trữ & Tiếp cận</h5>
                        <p>Chúng tôi lưu trữ thông tin bạn cung cấp để nâng cao chất lượng phục vụ. Các đối tác vận chuyển chỉ nhận được thông tin tối thiểu để hoàn tất việc giao hàng.</p>
                    </div>

                    <div class="policy-section">
                        <h5>4. Cam kết bảo mật</h5>
                        <ul>
                            <li>Chúng tôi bảo mật tuyệt đối các thông tin tài khoản của Quý khách hàng.</li>
                            <li>Quý khách có trách nhiệm bảo vệ mật khẩu cá nhân của mình.</li>
                        </ul>
                    </div>

                    <div class="text-center mt-5">
                        <a href="{{ url('/') }}" class="btn btn-outline-dark px-4 py-2 rounded-pill shadow-sm">
                            <i class="bi bi-arrow-left me-2"></i> Trang chủ
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="sidebar-policy">
                    <h4 class="sidebar-title">Đọc thêm</h4>
                    <hr class="w-25 mb-4" style="border-top: 3px solid #C5A059;">
                    
                    {{-- Gọi file list link của bạn ở đây --}}
                    @include('chinhsach.policy_link')

                    <div class="mt-4 p-4 rounded-4 shadow-sm" style="background: #3E4A3D; color: white;">
                        <h6 class="text-gold mb-2">Hỗ trợ khách hàng</h6>
                        <p class="small mb-3">Nếu có bất kỳ thắc mắc nào, đừng ngần ngại gọi cho chúng tôi.</p>
                        <a href="tel:0866893570" class="text-white fw-bold text-decoration-none">
                            <i class="bi bi-telephone-fill me-2"></i> 0866 89 3570
                        </a>
                    </div>
                </div>
            </div>

        </div> </div>
</div>
@endsection