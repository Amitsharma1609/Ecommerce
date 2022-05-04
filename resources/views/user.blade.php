@extends('master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card-header">User</div>
                <a href="" class="btn btn-success btn-sm" title="Add New Contact">
                    <i class="fa fa-plus" aria-hidden="true"></i> Add New
                </a>
                <br />
                <br />
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>
                                        <a href="/deletes/{{ $item->id }}" title="Edit"><button
                                                class="btn btn-danger btn-sm"><i class="fa fa-pencil-square-o"
                                                    aria-hidden="true"></i> delete</button></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
