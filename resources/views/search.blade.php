@extends('layouts.app')

@section('title', 'Tìm kiếm')

@section('content')
<section class="py-4 container container-wide">
    <h2 class="mb-4">
        Kết quả cho: <span class="text-danger">"{{ $keyword }}"</span>
    </h2>

    @if($products->isEmpty())
        <p>Không tìm thấy bánh nào phù hợp.</p>
    @else
        <div class="row g-4">
            @foreach ($products as $product)
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="ratio ratio-1x1">
                            <img src="{{ $product['image'] }}"
                                 class="card-img-top"
                                 alt="{{ $product['name'] }}"
                                 style="object-fit:cover;">
                        </div>

                        <div class="card-body d-flex flex-column p-0">
                            <div class="px-3 py-2">
                                <h5 class="card-title mb-1">
                                    {{ $product['name'] }}
                                </h5>
                                <p class="mb-2 fw-bold text-success">
                                    {{ $product['price'] }}
                                </p>
                            </div>

                            <div class="mt-auto d-flex">
                                <a href="#"
                                   class="flex-grow-1 text-center py-2 text-decoration-none text-white"
                                   style="background:#c7d600">
                                    Thêm vào giỏ
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</section>
@endsection
