@extends('master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6">

                <img class="img-detail" src="{{ $details['gallery'] }}">
            </div>
            <div class="col-sm-6">
                <h2 class="font-set">{{ $details['name'] }}</h2>
                <h3 class="font-set">Price : {{ $details['price'] }}</h3>
                <h4 class="font-set">Details: {{ $details['description'] }}</h4>
                <h4 class="font-set">category: {{ $details['category'] }}</h4>

                <br><br>

                <a href="/">Go Back</a>
                <br><br>
                <form action="/add-to-cart" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value={{ $details['id']}}>
                    <button class="btn btn-primary">Add to Cart</button>
                </form>
                <br><br>
                <a href="/orders/{{$details['id']}}">
                <button type="button" class="btn btn-success">Order Now</button>
                </a>
            </div>
        </div>
    @endsection
