@extends('master')
@section('content')
    <div class="container mt-3">
        <h2>Order Now</h2>
        <table class="table">
            <thead>
                <tr class="bg-info">
                    <th>Product Name</th>
                    <th>Description</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->price }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="2">Total</td>
                    <td>{{ $product }}</td>
                </tr>
            </tbody>
        </table>
        <form action="/order-place" method="POST">
            @csrf
            <div class="form-group">
                <label>Address:</label>
                <textarea name="address" placeholder="enter your address" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="pwd">Payment Method</label> <br> <br>
                <input type="radio" value="cash" name="payment"> <span>online payment</span> <br> <br>
                <input type="radio" value="cash" name="payment"> <span>EMI payment</span> <br><br>
                <input type="radio" value="cash" name="payment"> <span>Payment on Delivery</span> <br> <br>

            </div>
            <button type="submit" class="btn btn-success">Order Now</button>
        </form>
    </div>
@endsection
