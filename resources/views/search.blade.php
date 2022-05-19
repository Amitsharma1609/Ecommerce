@extends('master')
@section('content')
    <div class="custom-product">
        <div class="col-sm-12">
            <div class="trending-wrapper">
                    @if (!$products->isEmpty())
                    <h4>Result for Products</h4>
                    @foreach ($products as $item)
                    <div class="row searched-item cart-list-devider">
                                <div class="col-sm-4">
                                    <a href="uploads/{{ $item['id'] }}">
                                        <img class="search-image" src="{{ 'uploads/' . $item['gallery'] }}">
                                    </a>
                                </div>
                                <div class="col-sm-4">
                                    <div class="">
                                        <h2>{{ $item['name'] }}</h2>
                                        <h5 class="fw-lighter" style="color:rgb(19, 19, 20);">{{ $item['description'] }}</h5>
                                        <h5 class="fw-light">Price: {{ $item['price'] }}</h5>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <a href="uploads/{{ $item['id'] }}">
                                    <button class="btn btn-success m-4">Details</button>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                </div>
            @else
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <h2 class="font-set">Item is Not Available in the store</h2>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection
