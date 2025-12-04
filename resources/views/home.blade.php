@extends('layouts.app')
@section('title','HomePage')

@section('content')

<div class="my-4 text-center">
  <img src="{{ asset('images/banner.png') }}" 
       alt="Banner" 
       style="width: 60%; height: 20cm; border-radius: 12px; box-shadow: 0 4px 10px rgba(0,0,0,.1);">
</div>
<section class="py-3">
  <div class="container container-wide hero">

    {{-- Slider banner lớn --}}
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">

        {{-- Slide 1 --}}
        <div class="carousel-item active">

      </div>

      
    </div>

  </div>
</section>
</section>
<div class="py-4" style="background:#f9f1e3;">
    <div class="container container-wide">

      <h3 class="mb-4 fw-bold">Bánh ngọt</h3>

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

              <div class="card-body p-0">
                <div class="d-flex">
                  <div class="flex-grow-1 px-3 py-2"
                       style="background:#c7d600;color:#fff;font-weight:700;">
                    {{ $product['price'] }}
                  </div>
                  <button class="btn px-3 py-2"
                          style="background:#4a1f1b;color:#fff;border-radius:0;">
                    <i class="bi bi-cart"></i>
                  </button>
                </div>

                <div class="px-3 py-3">
                  <div class="fw-bold text-uppercase small">
                    {{ $product['name'] }}
                  </div>
                  @if(!empty($product['tag']))
                    <div class="mt-1 small text-muted">
                      {{ $product['tag'] }}
                    </div>
                  @endif
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>

    </div>
  </div>

@endsection

