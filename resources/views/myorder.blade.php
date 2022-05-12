@extends('master')
@section('content')
    <div class="custom-product">
        <div class="col-sm-10">
            <div class="trending-wrapper">
                <h4>my orders </h4>
                @foreach ($data as $key => $item)
                    <div class=" row searched-item cart-list-devider">
                        <div class="col-sm-6">
                            <a href="">
                                <img class="search-image" src="{{ 'uploads/' . $item['product']->gallery }}">
                            </a>
                        </div>
                        <div class="col-sm-6">
                            <div class="">
                                <h6>Name: {{ $item['product']->name }}</h6>
                                <h6>Address : {{ $item->address }}</h6>
                                <h6 class="font-set">Payment Status : {{ $item->payment_status }}</h5>
                                    <h6 class="font-set">Payment Method : {{ $item->payment_method }}</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
