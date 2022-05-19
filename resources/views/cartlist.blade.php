@extends('master')
@section('content')
    <div class="container">
        <div class="col-sm-12">
            <div class="card-group row-cols-md-3 m-4">
                @foreach ($carts as $key => $item)
                    <div class="col mb-4">
                        <div class="card m-4 h-100 mb-4">
                            <a href="/uploads/{{ $item['products'][0]->id }}">
                                <img class="trending-image" src="uploads/{{ $item['products'][0]->gallery }}">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">{{ $item['products'][0]->name }}</h5>
                                <p class="card-text">{{ $item['products'][0]->description }}</p>
                                <p class="card-text">Price:{{ $item['products'][0]->price * $item->quantity }}</p>
                                <p class="card-text">Quantity:{{ $item->quantity }}</p>
                            </div>
                            <a href="remove-cart/{{ $item->id }}" class="btn btn-primary">Remove from Cart</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="container">
        <div class="col-sm-8 m-5">
            <div class="card border-success mb-3" style="margin-left: 120px">
                <h5 class="card-header bg-transparent border-success">Total</h5>
                <div class="card-body text-success">
                    <h5 class="card-title" style="margin-left: 200px">Quantity:{{ $quantity }} </h5>
                    <p class="card-text" style="margin-left: 200px">Sum:{{ $sum }}</p>
                    <a class="btn btn-success w-50" style="margin-left: 110px" href="ordernow">Order Now</a>
                </div>
            </div>
        </div>
    </div>
@endsection
