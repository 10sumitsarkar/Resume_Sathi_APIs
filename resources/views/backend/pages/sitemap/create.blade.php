@extends('backend.layout.master')
@section('title', 'Create Sitemap')
@section('page-css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('dashboard-assets/vendors/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard-assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
@endsection
@section('page-js')
    <script src="{{ asset('dashboard-assets/vendors/select2/select2.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/js/select2.js') }}"></script>
    <script src="{{ asset('dashboard-assets/js/file-upload.js') }}"></script>
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
            <form method="POST" class="col-lg-12" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-9 col">
                                <h4 class="card-title">Web Development Sitemap</h4>
                            </div>
                        </div>
                        <p class="card-description">
                            Create Sitemap Form
                        </p>
                        <br />
                        <h4 class="card-title">Sitemap Detail</h4>
                        <div class="form-group row">
                            <label for="URLName" class="col-sm-3 col-form-label">Sitemap Title<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="URLName" name="slug" required
                                    placeholder="URL Slug here...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="URLName" class="col-sm-3 col-form-label">Sitemap Priority<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="URLName" name="priority" required
                                    placeholder="URL priority here...">
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>

    </div>

@endsection
