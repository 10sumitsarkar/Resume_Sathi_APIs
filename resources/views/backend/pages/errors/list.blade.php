@extends('backend.layout.master')
@section('title', 'Errors')
@section('custom-css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/brands.min.js" integrity="sha512-rbApvPERCHI8cOpTOKfMLVJNlXSCs4QRu8UsJ0HieeHyNKkHtUIQTZq3hv0pT7X0SUsLrRGEUsMTTpzwpdeIuw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
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
                    <p class="card-title">Errors({{ count($errors) }})</p>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="example" class="display expandable-table table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Status</th>
                                            <th>Message</th>
                                            <th>URL </th>
                                            <th>file </th>
                                            <th>Line</th>
                                            <th>Created By</th>
                                            <th>Action</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($errors as $item)
                                            <tr>
                                                @if ($item->is_resolved)
                                                    <td><del>{{ $loop->iteration }}</del></td>
                                                    <td>
                                                        @if ($item->is_resolved)
                                                            <span class="text-success">Fixed</span>
                                                        @else
                                                            <span class="text-danger">Not Fixed</span>
                                                        @endif
                                                    </td>
                                                    <td><del>{{ $item->message }}</del></td>
                                                    <td><del>{{ $item->url }}</del></td>
                                                    <td><del>{{ $item->file }}</del></td>
                                                    <td><del>{{ $item->line }}</del></td>
                                                    <td><del>{{ $item->created_at }}</del></td>
                                                @else
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>
                                                        @if ($item->is_resolved)
                                                            <span class="text-success">Fixed</span>
                                                        @else
                                                            <span class="text-danger">Not Fixed</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $item->message }}</td>
                                                    <td>{{ $item->url }}</td>
                                                    <td>{{ $item->file }}</td>
                                                    <td>{{ $item->line }}</td>
                                                    <td>{{ $item->created_at }}</td>
                                                @endif

                                                <td>
                                                    <div class="d-flexr">
                                                        @if ($item->is_resolved)
                                                            <a href="{{ route('change-error-report-status', $item->id) }}"
                                                                class="">click to unresolve</a>
                                                        @else
                                                            <a href="{{ route('change-error-report-status', $item->id) }}"
                                                                class="">click to resolve</a>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="{{ route('error-report-delete', $item->id) }}"
                                                        onclick="return confirm('Are you sure you want to delete this item?');"><i
                                                            class="fa fa-trash text-danger" aria-hidden="true"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        @if (count($errors) == 0)
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
