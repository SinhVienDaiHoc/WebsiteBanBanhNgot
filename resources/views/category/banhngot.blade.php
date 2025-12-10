@extends('layouts.app')   {{-- dùng lại layout có header --}}

@section('title', 'Bánh ngọt')

@section('content')
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

                {{-- Giá + nút giỏ --}}
                <div class="d-flex">
                  <div class="flex-grow-1 px-3 py-2"
                       style="background:#c7d600;color:#fff;font-weight:700;">
                    {{ number_format($product['price']) }} đ
                  </div>

                  {{-- Form thêm vào giỏ hàng --}}
                  <form action="{{ route('cart.add', $product['id']) }}" method="POST" class="m-0">
                    @csrf
                    <input type="hidden" name="id" value="{{ $product['id'] }}">
                    <input type="hidden" name="name" value="{{ $product['name'] }}">
                    <input type="hidden" name="price" value="{{ $product['price'] }}">
                    <input type="hidden" name="image" value="{{ $product['image'] }}">

                    <button type="submit"
                            class="btn px-3 py-2 h-100"
                            style="background:#4a1f1b;color:#fff;border-radius:0;">
                      <i class="bi bi-cart"></i>
                    </button>
                  </form>
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
