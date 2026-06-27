@extends('backend.layout.master')
@section('title', 'Subscribers')
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
                  <p class="card-title">Subscribers({{ count($subscribers) }})</p>
                  <div class="row">
                    <div class="col-12">
                      <div class="table-responsive">
                        <table id="example" class="display expandable-table table-bordered" style="width:100%">
                          <thead>
                            <tr>
                                <th>#</th>
                                <th>Email Id</th>
                                <th>Created By</th>
                                <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($subscribers as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->email }}</td>

                                <td>{{ $item->created_at }}</td>
                                <td>
                                    <a href="{{ route('subscriber-delete', $item->id) }}" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a>&nbsp;&nbsp;
                                </td>
                            </tr>
                            @endforeach
                            @if (count($subscribers) == 0)
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







