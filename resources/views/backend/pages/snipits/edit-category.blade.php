@extends('backend.layout.master')
@section('title', 'Create Job')
@section('page-css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('dashboard-assets/vendors/select2/select2.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('dashboard-assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
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
            <form method="POST" class="col-lg-12" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-9 col">
                                <h4 class="card-title">Edit Category</h4>
                                <p><a href="{{ route('snipit-category') }}">View all category</a></p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="CategoryName" class="col-sm-3 col-form-label">Title<span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="CategoryName" name="title" value="{{ old('title') ? old('title') : $category->title }}"
                                   required placeholder="Title here...">
                                @if ($errors->has('title'))
                                <span class="text-danger mb-2 float-left"> *{{ $errors->first('title') }}</span><br>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="URLName" class="col-sm-3 col-form-label">URL Name<span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="URLName" name="url_name" value="{{ old('url_name') ? old('url_name') : $category->url_name }}"
                                   required placeholder="URL name here...">
                                @if ($errors->has('url_name'))
                                <span class="text-danger mb-2 float-left"> *{{ $errors->first('url_name') }}</span><br>
                                @endif
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Save Detail</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
