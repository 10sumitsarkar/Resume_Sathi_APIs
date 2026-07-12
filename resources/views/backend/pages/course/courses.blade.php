@extends('backend.layout.master')
@section('title', 'jobs')
@section('custom-css')
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="row grid-margin">
            <div class="col-sm-12">
                @if(Session::get('success'))
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
                @if(Session::get('fail'))
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
                    <p class="card-title">Job Topics</p>
                    <p class=""><a class="btn btn-primary" href="{{ route('create-course') }}"><i class="fa fa-plus"></i> Add New Topic</a>
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
                            @foreach ($courses as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ optional($item->course_category)->course_name ?? 'N/A' }}</td>
                                <td>{{ optional($item->user)->first_name . ' ' . optional($item->user)->last_name }}</td>
                                <td>{{ $item->title ?? $item->topic_name ?? 'Untitled' }}</td>
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
                                    <a href="{{ url((string) $item->canonical_tag) }}"><i class="fa fa-eye text-success" aria-hidden="true"></i></a>&nbsp;&nbsp;
                                    <a href="{{ route('course-delete', ['id' => $item->id]) }}" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a>&nbsp;&nbsp;
                                    <a href="{{ route('save-course', ['id' => base64_encode($item->id)]) }}"><i class="fa fa-edit text-primary" aria-hidden="true"></i></a>&nbsp;&nbsp;
                                </td>
                            </tr>
                            @endforeach
                            @if (count($courses) == 0)
                            <tr><td colspan="8" class="text-center">No data found <hr class="w-100"></td></tr>
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






