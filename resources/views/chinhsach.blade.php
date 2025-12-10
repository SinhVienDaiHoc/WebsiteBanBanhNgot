@extends('layouts.app')
@section ('title','Chinh sach')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   
   
    <title>Chính sách của cửa hàng</title>
</head>
<body>
    <section class="py-3 container ">
        
        <div class="row">
         <div class="container col-8">
           
            {{-- start thông báo --}}
            <p>Tại
                {{-- start tên cửa hàng put here --}}
                 <strong><<"Tên cửa hàng">></strong>
                {{-- end tên cửa hàng put here --}}
                sự hài lòng của khách hàng được đặt lên hàng đầu. Tiệm áp dụng <strong>chính sách kiểm hàng</strong> minh bạch để đảm bảo khách hàng nhận được những chiếc bánh đúng như mong muốn, mong đợi. 
                </p>
                
                {{-- end thông báo --}}

                {{-- start chính sách kiểm hàng --}}
                <h2 class="py-3">Chính sách kiểm hàng</h2>

                {{-- start kiểm hàng khi nhận bánh --}}
                <h5>1. Kiểm hàng ngay khi nhận bánh</h5>
                <p>Khi nhận bánh từ nhân viên giao hàng, khách hàng được kiểm tra ngoại quan sản phẩm trước khi thanh toán. Việc kiểm tra bao gồm:</p>
                <li>Đối chiếu sản phẩm: Kiểm tra loại bánh, mẫu mã và số lượng có đúng với thông tin đã đặt hàng hay không.</li>
                <li>Tình trạng sản phẩm: Đảm bảo bánh không bị bể vỡ, móp méo hoặc hư hỏng trong quá trình vận chuyển.</li>
                <p class="text-danger
                            fw-bold
                "><<"Tên cửa hàng">> khuyến khích khách hàng kiểm tra kĩ lưỡng đơn hàng trước khi nhận bánh từ shipper.</p>
                {{-- end kiểm hàng khi nhận bánh --}}

                 {{-- start Đồng kiểm cùng shipper --}}
                <h5>2. Đồng kiểm cùng shipper</h5>
                <p>Sau khi kiểm tra và xác nhận bánh còn nguyên vẹn, khách hàng chỉ cần ký nhận để hoàn tất đơn. Việc đồng kiểm giúp đảm bảo quyền lợi cho khách hàng  nếu có phát sinh vấn đề.</p>
                {{-- end Đồng kiểm cùng shipper --}}


                {{-- start Xử lí khi có vấn đề --}}
                <h5>3. Xử lý khi có vấn đề</h5>
                <p>Nếu trong quá trình kiểm tra, khách hàng phát hiện sản phẩm bị lỗi, sai mẫu hoặc hư hỏng, <<"Tên cửa hàng">> sẽ tiếp nhận phản hồi và hỗ trợ đổi trả sản phẩm hoàn toàn miễn phí với những lỗi trực tiếp từ tiệm. Đồng thời, tiệm cũng hỗ trợ chỉnh sửa bánh có phí đối với lỗi từ đơn vị vận chuyển.</p>
                <p><strong><div class="fst-italic">Lưu ý:</div></strong> Việc đổi trả chỉ áp dụng tại thời điểm giao hàng và có sự xác nhận của nhân viên giao hàng.</p>
                {{-- end Xử lí khi có vấn đề --}}


                {{-- start thông tin liên hệ --}}
                <h5>4. Thông tin liên hệ</h5>
                <p>Nếu cần hỗ trợ thêm, vui lòng liên hệ với cửa hàng thông qua:</p>
                <li>Fanpage:"CHÈN LINK FAN PAGE "</li>
                <li></li>
                {{-- end thông tin liên hệ --}}
                  {{-- end chính sách kiểm hàng --}}
         </div>
         <div class="container col-4">
            {{-- còn tiếp --}}
            Bài viết mới
Cách chọn size bánh kem phù hợp cho bữa tiệc
Tiệm bánh kem ngon ở Sài Gòn
Hướng dẫn bảo quản bánh kem
Chính sách bảo mật thông tin cá nhân
Chính sách đổi trả và hoàn tiền
         </div>
         </div>

    
    </section>
    
</body>
</html>
@endsection
