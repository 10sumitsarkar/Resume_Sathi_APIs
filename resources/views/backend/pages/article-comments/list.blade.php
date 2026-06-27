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
                    <p class="card-title">Article Comments({{ count($comments) }})</p>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="example" class="display expandable-table table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Message</th>
                                            <th>Article </th>
                                            <th>IP Address</th>
                                            <th>Country</th>
                                            <th>State</th>
                                            <th>City</th>
                                            <th>Created By</th>
                                            <th>Created On</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($comments as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->text }}</td>
                                                <td>
                                                    <a href="{{ url($item->article->canonical_tag) }}">{{ $item->article->article_title }}</a>
                                                </td>
                                                <td>{{ $item->user_ip }}</td>
                                                <td>{{ $item->country }}</td>
                                                <td>{{ $item->state }}</td>
                                                <td>{{ $item->city }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->created_at }}</td>
                                                <td>
                                                    <a href="{{ route('article-comment-delete', $item->id) }}"
                                                        onclick="return confirm('Are you sure you want to delete this item?');"><i
                                                            class="fa fa-trash text-danger" aria-hidden="true"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        @if (count($comments) == 0)
                                            <tr>
                                                <td colspan="10" class="text-center">No data found
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
