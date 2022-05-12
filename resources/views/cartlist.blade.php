@extends('master')
@section('content')
    <div class="custom-product">
        <div class="col-sm-12">
            <div class="trending-wrapper">
                <h4>Result for Products</h4>
                <a class="btn btn-success" href="ordernow">Order Now</a> <br> <br>

                @foreach ($carts as  $key=>$item)
                    <div class=" row searched-item cart-list-devider">
                        <div class="col-sm-3">
                            <a href="/uploads/{{$item['products'][0]->id}}">
                                <img class="trending-image" src="uploads/{{$item['products'][0]->gallery}}">
                            </a>
                        </div>
                        <div class="col-sm-4">
                            <div class="">
                                <h2 >Name: {{ $item['products'][0]->name }}</h2>
                                <h5>Description: {{ $item['products'][0]->description}}</h5>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <h5>{{$item->quantity}}</h5>
                        </div>
                        <div class="col-sm-3">
                            <a href="remove-cart/{{$item->id}}" class="btn btn-warning">Remove to Cart</a>
                        </div>
                    </div>
                @endforeach
            </div>
            <a class="btn btn-success" href="ordernow">Order Now</a> <br> <br>

        </div>
    </div>
@endsection
