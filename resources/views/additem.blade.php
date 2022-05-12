@extends('master')
@section('content')
    <div class="container-fluid">
        <div class="container">
            <div class="col-sm-4 form">
                <form action="/add" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="Product Name">Product Name:</label>
                        <input type="Product Name" class="form-control m-2" placeholder="Enter Product Name" name="name">
                    </div>
                    <div class="form-group">
                        <label>Price:</label>
                        <input type="text" class="form-control m-2" placeholder="Enter Price" name="price">
                    </div>
                    <div class="form-group">
                        <label>catergory:</label>
                        <input type="text" class="form-control m-2" placeholder="Enter catergory" name="category">
                    </div>

                    <div class="form-group">
                        <label>quantity:</label>
                        <input type="number" class="form-control m-2" placeholder="Enter quantity" name="quantity">
                    </div>
                    <div class="form-group">
                        <label>description:</label>
                        <input type="text" class="form-control m-2" placeholder="Enter description" name="description">
                    </div>
                    <div class="form-group">
                        <label for="formFile" class="form-label">Image</label>
                        <input type="file" name="gallery" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-success m-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
