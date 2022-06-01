@extends('master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card-header">Product</div>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Product name</th>
                                <th>Address</th>
                                <th>Payment method</th>
                                <th>Status</th>
                                <th>Quantity</th>
                                <th>Order At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($order as $item)
                                <tr>

                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>{{ $item->user->email }}</td>
                                    <td>{{$item->product->name}}</td>
                                    <td>{{ $item->address }}</td>
                                    <td>{{ $item->payment_method }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{$item->created_at}}
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-danger dropdown-toggle " type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                              Status
                                            </button>

                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                              <form action="update/{{$item->id}}" method="POST">
                                                @csrf
                                                <li>
                                                    <input name="status" type="submit" value="delivered" style="width:100% ">
                                                </li>
                                              <li><input name="status" type="submit" value="cancelled" style="width:100%"></li>
                                              </form>
                                            </ul>
                                          </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
{{$order->links()}} 
                </div>
            </div>
        </div>
    </div>
@endsection
