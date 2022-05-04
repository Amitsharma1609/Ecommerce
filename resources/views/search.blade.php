@extends('master')
@section('content')
<div class="custom-product">

    <div class="col-sm-4">
        @if (!$products->isEmpty())
        <div class="trending-wrapper">
            <h4>Result for Products</h4>
            @foreach($products as $item)
            <div class="searched-item">
              <a href="{{$item['id']}}">
              <img class="trending-image" src="{{'uploads/'.$item['gallery']}}">
              <div class="">
                <h2>{{$item['name']}}</h2>
                <h5>{{$item['description']}}</h5>
              </div>
            </a>
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
</div>
@endif
@endsection
