@extends('backend.layout.master')
@section('title', 'courses')
@section('custom-css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="row grid-margin">
            <div class="col-sm-12">
                @if (Session::get('success'))
                    <div class="demo-spacing-0">
                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                            <div class="alert-body">
                                {{ Session::get('success') }}
                            </div>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                @endif
                @if (Session::get('fail'))
                    <div class="demo-spacing-0">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <div class="alert-body">
                                {{ Session::get('fail') }}
                            </div>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                @endif
                <br>
            </div>
            <div class="card w-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <p class="card-title">Tutorials</p>
                        <p class=""><a class="btn btn-primary" href="{{ route('add-tutorial') }}"><i class="fa fa-plus"></i> Add New Tutorial</a>
                        </p>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="example" class="display expandable-table table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Tutorial Name</th>
                                            <th>URL</th>
                                            <th>Logo</th>
                                            <th>Created By</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tutorials as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->title }}</td>
                                                <td>{{ $item->url_name }}</td>
                                                <td><img src="{{ asset($item->image) }}" height="50" alt=""></td>
                                                <td>{{ $item->user->first_name }} {{ $item->user->last_name }}</td>
                                                <td>
                                                    <a href="{{ route('tutorial-delete', $item->id) }}"
                                                        onclick="return confirm('Are you sure you want to delete this item?');"><i
                                                            class="fa fa-trash text-danger"
                                                            aria-hidden="true"></i></a>&nbsp;&nbsp;
                                                    <a href="{{ route('tutorial-edit', base64_encode($item->id)) }}"><i
                                                            class="fa fa-edit text-primary"
                                                            aria-hidden="true"></i></a>&nbsp;&nbsp;
                                                </td>
                                            </tr>
                                        @endforeach
                                        @if (count($tutorials) == 0)
                                            <tr>
                                                <td colspan="6" class="text-center">No data found
                                                    <hr class="w-100">
                                                </td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page-js')
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
@endsection
