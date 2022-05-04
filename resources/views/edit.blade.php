@extends('master')
@section('content')
    <div class="card">
        <div class="card-header">Product Page</div>
        <div class="card-body">

            <form action="/edit/{{$product->id}}" method="post">
                @csrf

                <input type="hidden" name="id" value="{{ $product->id }}" id="id" />
                <label>Name</label></br>
                <input type="text" name="name" value="{{ $product->name }}" class="form-control"></br>
                <label>price</label></br>
                <input type="text" name="price" value="{{ $product->price }}" class="form-control"></br>
                <label>category</label></br>
                <input type="text" name="category" value="{{ $product->category }}" class="form-control"></br>
                <label>description</label></br>
                <input type="text" name="description" value="{{ $product->description }}" class="form-control"></br>
                <input type="submit" class="btn btn-success"></br>
            </form>

        </div>
    </div>
@endsection
