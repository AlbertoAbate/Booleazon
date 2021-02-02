@extends('layouts.main')

@section('title-page')
    <title>Booleazon</title>
@endsection

@section('content')
    <!-- Slider main container -->
    <div class="swiper-container">
    <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->
            @foreach ($products as $product)
            <div class="swiper-slide">
                <img src="{{ asset('storage/' . $product->image) }}" alt="">
            </div>
            @endforeach
            
        </div>
        <!-- If we need pagination -->
        <div class="swiper-pagination"></div>

        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>

        <!-- If we need scrollbar -->
        <div class="swiper-scrollbar"></div>
    </div>
@endsection