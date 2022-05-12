@extends('master')
@section('content')
    <!-- Carousel -->
    <div id="demo" class="carousel slide" data-bs-ride="carousel">
        <!-- Indicators/dots -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="3"></button>

        </div>
        <div class="carousel-inner">
            @foreach ($products->take(4) as $item)
                <div class="carousel-item {{ $item['id'] == 1 ? 'active' : '' }}">
                    <a href="{{ 'uploads/' . $item['id'] }}">
                        <img class="slider-img" src="{{ 'uploads/' . $item['gallery'] }}">
                        <div class="carousel-caption slider-text">
                            <h3>{{ $item['name'] }}</h3>
                            <p>{{ $item['description'] }}</p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <!-- Left and right controls/icons -->
        <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
    <div class="trending">
        <h3>Trending Product</h3>
        @foreach ($products->take(5) as $item)
            <div class="trending-item">
                <a href="uploads/{{ $item['id'] }}">
                    <img class="trending-img" src="{{ 'uploads/' . $item['gallery'] }}">
                    <div class="">
                        <h4>{{ $item['name'] }}</h4>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endsection
