@extends('layouts.app')
@section('title', $title ?? 'Trung tâm hỗ trợ khách hàng')

@section('content')
<style>
    .policy-wrapper {
        background-color: #FAF6ED;
        padding: 60px 0;
        min-height: 80vh;
    }
    .main-policy-content {
        background: #ffffff;
        padding: 45px;
        border-radius: 25px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.02);
    }
    .welcome-text {
        font-family: 'Playfair Display', serif;
        line-height: 1.6;
        color: #555;
        border-bottom: 1px solid #eee;
        padding-bottom: 30px;
        margin-bottom: 30px;
    }
    .policy-sidebar { padding-left: 30px; position: sticky; top: 20px; }
    .sidebar-title {
        font-family: 'Playfair Display', serif;
        font-weight: 700;
        font-size: 1.5rem;
        color: #332D2D;
        margin-bottom: 20px;
        position: relative;
    }
    .sidebar-title::after {
        content: ''; display: block; width: 40px; height: 3px;
        background: #C5A059; margin-top: 10px;
    }
    /* Style cho các link trong policy_link.blade.php */
    .policy-sidebar ul { list-style: none; padding: 0; }
    .policy-sidebar li a {
        text-decoration: none; color: #777; font-weight: 500;
        display: flex; align-items: center; padding: 10px 15px;
        border-radius: 10px; transition: 0.3s;
    }
    .policy-sidebar li a:hover {
        background: #fff; color: #C5A059; padding-left: 20px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }
    @media (max-width: 991.98px) { .policy-sidebar { padding-left: 12px; margin-top: 50px; } }
</style>

<div class="policy-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="main-policy-content shadow-sm">
                    <div class="welcome-text">
                        <h5>
                            Tại <strong>Sweet Corner</strong>, sự hài lòng của khách hàng được đặt lên hàng đầu. 
                            Chúng tôi cam kết minh bạch trong mọi quy trình để bạn an tâm tận hưởng những hương vị ngọt ngào.
                        </h5>
                    </div>
                    <div class="policy-body-render">
                        @yield('main_chinhsach')
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="policy-sidebar">
                    <h4 class="sidebar-title">Trung tâm hỗ trợ</h4>
                    <div class="mt-4">
                        @include('chinhsach.policy_link')
                    </div>
                    <div class="mt-5 p-4 rounded-4 text-center" style="background: #3E4A3D; color: white;">
                        <i class="bi bi-headset fs-1 text-gold"></i>
                        <h6 class="mt-3">Bạn cần hỗ trợ gấp?</h6>
                        <a href="tel:0866893570" class="btn btn-sm btn-gold rounded-pill px-4 mt-2">0866 89 3570</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection