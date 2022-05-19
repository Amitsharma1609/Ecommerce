@extends('master')
@section('content')
    <div class="container mt-5">
        <h4>my orders </h4>
        <div class="card">
            <div class="trending-wrapper">
                @foreach ($data as $key => $item)
                    <div class=" row searched-item cart-list-devider">
                        <div class="col-sm-4">
                            <a href="">
                                <img class="search-image" src="{{ 'uploads/' . $item['product']->gallery }}">
                            </a>
                        </div>
                        <div class="col-sm-4">
                            <div class="">
                                <h6 class="font-set">Name: {{ $item['product']->name }}</h6>
                                <h6 class=" fw-normal">Address : {{ $item->address }}</h6>
                                <h6 class=" fw-normal">Status : {{ $item->status }}</h5>
                                <h6 class=" fw-normal">Payment Method : {{ $item->payment_method }}</h5>
                            </div>
                        </div>
                        <div class="col-sm-4 mt-5">
                            @if ($item->status =='delivered' || $item->status =='cancelled')
                           <a href={{url("/pdf/".$item->id)}}><button class="invoice border border-0 btn-success">Generate Invoice</button></a><br><br>
                           @endif
                           @if ($item->status =='Ordered')
                            <a href={{url("/cancelled/".$item->id)}}><button class="add-review border border-2 btn-danger">cancelled</button></a>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
