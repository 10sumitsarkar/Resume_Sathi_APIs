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
                                <h4 class="card-title">Edit Extra Sitemap URL</h4>
                            </div>
                        </div>
                        <p class="card-description">
                            Update a custom/static frontend URL. Blog and jobs are generated automatically.
                        </p>
                        <br />
                        <div class="rs-page-intro">
                            <strong>Reminder:</strong> use frontend paths like <code>/tools/new-tool/</code>. Do not add blog/job URLs manually.
                        </div>
                        <h4 class="card-title">URL Detail</h4>
                        <div class="form-group row">
                            <label for="URLName" class="col-sm-3 col-form-label">Frontend URL Path<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="URLName" name="slug" value="{{$sitemap->slug}}" required
                                    placeholder="/tools/new-tool/">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="URLPriority" class="col-sm-3 col-form-label">Priority<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="number" step="0.01" min="0" max="1" class="form-control" id="URLPriority" name="priority" value="{{$sitemap->priority}}" required
                                    placeholder="URL priority here...">
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>

    </div>

@endsection
