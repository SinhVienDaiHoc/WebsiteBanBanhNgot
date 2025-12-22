@extends('layouts.app')
@section('title', 'Blogs & Bí quyết làm bánh')

@section('content')
<style>
    /* Header Blogs */
    .blog-header {
        background-color: #FAF6ED;
        padding: 80px 0 50px 0;
        text-align: center;
        margin-bottom: 50px;
    }
    .blog-header h1 {
        font-family: 'Playfair Display', serif;
        font-weight: 800;
        font-size: 3rem;
        color: #332D2D;
    }

    /* Card Blog Tinh Tế */
    .blog-card {
        border: none;
        background: transparent;
        transition: all 0.4s ease;
        margin-bottom: 40px;
    }
    .blog-img-wrapper {
        width: 100%;
        aspect-ratio: 16 / 10;
        border-radius: 25px;
        overflow: hidden;
        margin-bottom: 20px;
    }
    .blog-img-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s ease;
    }
    .blog-card:hover .blog-img-wrapper img {
        transform: scale(1.05);
    }

    .blog-date {
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 2px;
        color: #B2935B;
        font-weight: 600;
        margin-bottom: 10px;
        display: block;
    }
    .blog-title {
        font-family: 'Playfair Display', serif;
        font-weight: 700;
        font-size: 1.4rem;
        line-height: 1.3;
        margin-bottom: 15px;
    }
    .blog-title a {
        color: #332D2D;
        text-decoration: none;
        transition: 0.3s;
    }
    .blog-title a:hover { color: #B2935B; }

    .blog-excerpt {
        color: #777;
        font-size: 0.9rem;
        line-height: 1.6;
    }

    .btn-read-more {
        font-size: 0.8rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: #332D2D;
        text-decoration: none;
        border-bottom: 2px solid #B2935B;
        padding-bottom: 4px;
        transition: 0.3s;
    }
    .btn-read-more:hover { color: #B2935B; padding-left: 5px; }
</style>

<div class="blog-header">
    <div class="container">
        <span class="blog-date" style="color: #777;">Chuyện nhà STU</span>
        <h1>Blogs & Recipes</h1>
        <p class="mx-auto mt-3 text-muted" style="max-width: 600px;">
            Nơi chia sẻ những bí quyết làm bánh ngon và những câu chuyện ngọt ngào sau lò nướng.
        </p>
    </div>
</div>

<div class="container pb-5">
    <div class="row g-4">
        
        <div class="col-md-6 col-lg-4">
            <article class="blog-card">
                <div class="blog-img-wrapper shadow-sm">
                    <a href="#">
                        <img src="https://images.unsplash.com/photo-1488477181946-6428a0291777?q=80&w=1000&auto=format&fit=crop" alt="Bí quyết làm bánh">
                    </a>
                </div>
                <div class="blog-content">
                    <span class="blog-date">20 Tháng 12, 2025</span>
                    <h2 class="blog-title">
                        <a href="#">Bí quyết để lớp vỏ Croissant luôn giòn tan</a>
                    </h2>
                    <p class="blog-excerpt">
                        Làm thế nào để tạo ra hàng trăm lớp bơ mỏng tang trong chiếc bánh sừng bò? Hãy cùng STU khám phá kỹ thuật cán bột thủ công...
                    </p>
                    <a href="#" class="btn-read-more">Đọc tiếp</a>
                </div>
            </article>
        </div>

        <div class="col-md-6 col-lg-4">
            <article class="blog-card">
                <div class="blog-img-wrapper shadow-sm">
                    <a href="#">
                        <img src="https://images.unsplash.com/photo-1555507036-ab1f4038808a?q=80&w=1000&auto=format&fit=crop" alt="STU Story">
                    </a>
                </div>
                <div class="blog-content">
                    <span class="blog-date">15 Tháng 12, 2025</span>
                    <h2 class="blog-title">
                        <a href="#">Hành trình tìm kiếm hương vị bột mì hữu cơ</a>
                    </h2>
                    <p class="blog-excerpt">
                        Chúng tôi đã đi qua những cánh đồng lúa mì tại vùng quê yên bình để chọn ra loại nguyên liệu tốt nhất cho sức khỏe của bạn...
                    </p>
                    <a href="#" class="btn-read-more">Đọc tiếp</a>
                </div>
            </article>
        </div>

        <div class="col-md-6 col-lg-4">
            <article class="blog-card">
                <div class="blog-img-wrapper shadow-sm">
                    <a href="#">
                        <img src="https://images.unsplash.com/photo-1510812431401-41d2bd2722f3?q=80&w=1000&auto=format&fit=crop" alt="Tiệc bánh">
                    </a>
                </div>
                <div class="blog-content">
                    <span class="blog-date">10 Tháng 12, 2025</span>
                    <h2 class="blog-title">
                        <a href="#">Gợi ý những set bánh trà cho buổi chiều hoàng hôn</a>
                    </h2>
                    <p class="blog-excerpt">
                        Một ly trà Earl Grey ấm nóng cùng vài chiếc Macaron sắc màu sẽ làm buổi chiều của bạn trở nên ngọt ngào và thơ mộng hơn...
                    </p>
                    <a href="#" class="btn-read-more">Đọc tiếp</a>
                </div>
            </article>
        </div>

    </div>
</div>
@endsection