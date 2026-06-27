@extends('backend.layout.master')
@section('title', 'Snipits')
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
                        <p class="card-title">Snipits</p>
                        <p class=""><a class="btn btn-primary" href="{{ route('create-snipit') }}"><i class="fa fa-plus"></i> Add New Snipit</a>
                        </p>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="example" class="display expandable-table table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Category</th>
                                            <th>Created By</th>
                                            <th>Title</th>
                                            <th>Page View</th>
                                            <th>Last Click</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($snipits as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->snipit_type->title }}</td>
                                                <td>{{ $item->user->first_name . ' ' . $item->user->last_name }}</td>
                                                <td>{{ $item->title }}</td>
                                                <td>{{ $item->pageview }}</td>
                                                <td>{{ $item->updated_at }}</td>
                                                <td>
                                                    @if ($item->is_active)
                                                        <label class="text-success">Active</label>
                                                    @else
                                                        <label class="text-danger">In-Active</label>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ url($item->canonical_tag) }}"><i
                                                            class="fa fa-eye text-success"
                                                            aria-hidden="true"></i></a>&nbsp;&nbsp;
                                                    <a href="{{ route('snipit-delete', $item->id) }}"
                                                        onclick="return confirm('Are you sure you want to delete this item?');"><i
                                                            class="fa fa-trash text-danger"
                                                            aria-hidden="true"></i></a>&nbsp;&nbsp;
                                                    <a href="{{ route('save-snipit', base64_encode($item->id)) }}"><i
                                                            class="fa fa-edit text-primary"
                                                            aria-hidden="true"></i></a>&nbsp;&nbsp;
                                                </td>
                                            </tr>
                                        @endforeach
                                        @if (count($snipits) == 0)
                                            <tr>
                                                <td colspan="8" class="text-center">No data found
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
