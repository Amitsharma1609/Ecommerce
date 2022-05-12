@extends('master')
@section('content')
<div class="custom-product">
    <div class="col-sm-12">
        <div class="trending-wrapper">
            <h4>Result for Products</h4>
            @if (!$products->isEmpty())
            @foreach ($products as $item)
                <div class=" row searched-item cart-list-devider">
                    <div class="col-sm-6">
                        <a href="uploads/{{ $item['id'] }}">
                            <img class="search-image" src="{{ 'uploads/' . $item['gallery'] }}">
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <div class="">
                            <h2>{{ $item['name'] }}</h2>
                            <h5 class="font-set" style="color:blue;">{{ $item['description'] }}</h5>
                            <h5 style="color:red;">Price: {{ $item['price']}}</h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
