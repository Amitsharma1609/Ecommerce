@extends('master')
@section('content')
    <div class="container-fluid">
        <div class="container">
            <div class="col-sm-4 form">
                <form action="/add" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="Product Name">Product Name:</label>
                        <input type="Product Name" class="form-control m-2" id="Product Name"
                            placeholder="Enter Product Name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Price:</label>
                        <input type="" class="form-control m-2" id="pwd" placeholder="Enter " name="price">
                    </div>
                    <div class="form-group">
                        <label for="pwd">catergory:</label>
                        <input type="" class="form-control m-2" id="pwd" placeholder="Enter " name="category">
                    </div>

                    <div class="form-group">
                        <label for="pwd">description:</label>
                        <input type="" class="form-control m-2" id="pwd" placeholder="Enter " name="description">
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
