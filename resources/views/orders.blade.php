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
                <tr>
                    <td>{{ $details->name }}</td>
                    <td>{{ $details->description }}</td>
                    <td>{{ $details->price }}</td>
                </tr>
                <tr>
                    <td colspan="2">Total</td>
                    <td>{{ $details->price }}</td>
                </tr>
            </tbody>
        </table>
        <form action="/order-place" method="POST">
            @csrf
            <div class="form-group">
                <label>Address:</label>
                <textarea name="address" placeholder="enter your address" class="form-control"></textarea>
                @error('address')
                    <div style="color:red"> {{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="pwd">Payment Method</label> <br> <br>
                <input type="radio" value="cash" name="payment"> <span>online payment</span> <br> <br>
                @error('address')
                    <div style="color:red"> {{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">Pay Now</button>
        </form>
    </div>
@endsection
