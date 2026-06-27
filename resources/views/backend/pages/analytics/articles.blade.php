@extends('backend.layout.master')
@section('title', 'Articles')
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
                    <div>
                        <p class="card-title">Articles</p>
                    </div>
                    <form method="GET" action="">
                    <div class="d-block d-md-flex justify-content-between mb-3">
                            <div class="selectPrevDay mb-2">
                                <select name="sort">
                                    <option class="d-none">Select Past days</option>
                                    <option value="1">Past 1 Days</option>
                                    <option value="2">Past 2 Days</option>
                                    <option value="3">Past 3 Days</option>
                                    <option value="4">Past 4 Days</option>
                                    <option value="5">Past 5 Days</option>
                                    <option value="6">Past 6 Days</option>
                                    <option value="7">Past 7 Days</option>
                                    <option value="9">Past 9 Days</option>
                                    <option value="10">Past 10 Days</option>
                                    <option value="15">Past 15Days</option>
                                    <option value="20">Past 20 Days</option>
                                    <option value="30">Past 30 Days</option>
                                </select>
                            </div>
                            <input type="date" name="date" class="dateRangeSelector d-block mb-2">

                            <button class="btn FilterButton mb-2">Filter</button>
                    </div>
                </form>
                <div class="d-flex justify-content-end">
                    <p><a class="btn btn-primary" href="{{ route('create-article') }}"><i
                                class="fa fa-plus"></i> Add New Article</a>
                    </p>
                </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="example" class="display expandable-table table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Language</th>
                                            <th>Title</th>
                                            <th>Views</th>
                                            {{-- <th>Last Click</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($articles as $item)
                                            @if (count($item))
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item['language'] }}</td>
                                                    <td>{{ $item['name'] }}</td>
                                                    <td>{{ $item['views'] }}</td>
                                                    {{-- <td>{{ $item->created_at }}</td> --}}
                                                </tr>
                                            @endif
                                        @endforeach
                                        @if (count($articles) == 0)
                                            <tr>
                                                <td colspan="4" class="text-center">No data found
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
