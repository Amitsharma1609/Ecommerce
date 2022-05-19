@extends('master')
@section('content')
<div class="custom-product">
    @if (!$products->isEmpty())
    <div class="col-sm-12">
        <div class="trending-wrapper">
            <form action="/price" method="POST">
                @csrf
                <div class="dropdown float-end">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Filter
                </button>
                <input type="hidden" value="{{ $products[0]->category }}" name="category">
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><input name="price" type="submit" value="High to low" class="btn btn-light "></li>
                    <li><input name="price" type="submit" value="Low to High" class="btn btn-light "></li>
                </ul>
                        </div>
                    </form>

                    @cannot('isAdmin')
                    <h4>Result for Products</h4>
                    @foreach ($products as $item)
                        <div class=" row searched-item cart-list-devider">
                            <div class="col-sm-4 mt-4">
                                <a href="uploads/{{ $item['id'] }}">
                                    <img class="search-image" src="{{ 'uploads/' . $item['gallery'] }}">
                                </a>
                            </div>
                            <div class="col-sm-4">
                                <div class="">
                                    <h2>{{ $item['name'] }}</h2>
                                    <h5 class="fw-lighter">{{ $item['description'] }}</h5>
                                    <h5 style="">Price: {{ $item['price'] }}</h5>
                                </div>
                            </div>

                            <div class="col-sm-4" >
                                <form action="/add-to-cart" method="POST">
                                    @csrf
                                    <label>No of Item:</label><br>
                                    <input type="number" min="1" value=1 name="quantity"><br><br>
                                    <input type="hidden" name="product_id" value={{ $item['id'] }}>
                                    <button class="btn btn-primary">Add to Cart</button><br>
                                </form>
                                <br>
                                <a href="/orders/{{ $item['id'] }}">
                                    <button type="button" class="btn btn-success">Order Now</button>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
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
        @endcannot
        @endsection

