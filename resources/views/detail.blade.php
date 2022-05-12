@extends('master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6">

                <img class="img-detail" src="{{ $details['gallery'] }}">
            </div>
            <div class="col-sm-6">
                <h2 class="font-set">Name:{{ $details['name'] }}</h2>
                <h3 class="font-set">Price : {{ $details['price'] }}</h3>
                <h4 class="font-set">Details: {{ $details['description'] }}</h4>
                <br>
                @cannot('isAdmin')

                <form action="/add-to-cart" method="POST">
                    @csrf
                    <label>No of Item:</label><br>
                    <input type="number" min="1" value=1 name="quantity"><br><br>
                    <input type="hidden" name="product_id" value={{ $details['id'] }}>
                    <button class="btn btn-primary">Add to Cart</button>
                </form>
                <br><br>
                <a href="/orders/{{ $details['id'] }}">
                    <button type="button" class="btn btn-success">Order Now</button>
                </a>
                @endcannot
            </div>
            <a href="/">Go Back</a>
        </div>
    @endsection
