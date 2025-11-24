@extends('layouts.app')
@section('title')

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


  </div>
</section>
@endsection
