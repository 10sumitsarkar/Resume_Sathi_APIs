@extends('backend.layout.master')
@section('title', 'Create Category')
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
                @if (count($errors))
                <div class="demo-spacing-0">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <div class="alert-body">
                            {{$errors->first()}}
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
                                <h4 class="card-title">HTML Symbol Category</h4>
                            </div>
                            <div class="col-md-3 col">
                                <div class=" float-right">
                                    <input class="form-check-input" name="is_active" type="checkbox" role="switch" id="activeCheck" checked >
                                    <label class="form-check-label" for="activeCheck">Active</label>
                                </div>
                            </div>
                        </div>
                        <p class="card-description">
                            Create Category Form
                        </p>
                        <h4 class="card-title">Category Detail</h4>
                        <div class="form-group row">
                            <label for="CategoryName" class="col-sm-3 col-form-label">Category Name<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="CategoryName" name="name" value="{{old('name')}}"
                                    required placeholder="Category name here...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="CategoryTitle" class="col-sm-3 col-form-label">Category Title<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="CategoryTitle" name="title" value="{{old('title')}}"
                                    required placeholder="Category title here...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="URLTitle" class="col-sm-3 col-form-label">URL Name<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="URLTitle" name="url_name" value="{{old('url_name')}}"
                                    required placeholder="URL name here...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="MetaTitle" class="col-sm-3 col-form-label">Meta Title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="MetaTitle" name="meta_title" value="{{old('meta_title')}}"
                                    placeholder="Meta title here...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="MetaDescription" class="col-sm-3 col-form-label">Meta Description</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="MetaDescription" name="meta_description"
                                    value="{{old('meta_description')}}" placeholder="Meta description here...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="MetaKeyword" class="col-sm-3 col-form-label">Meta Keyword</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="MetaKeyword" name="meta_keyword"
                                    value="{{old('meta_keyword')}}" placeholder="Meta keyword here...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="categorySymbol" class="col-sm-3 col-form-label">Category Symbol<span
                                class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="categorySymbol" name="symbol"
                                    value="{{old('symbol')}}" placeholder="Category Symbol here..." required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="categorydescription" class="col-sm-3 col-form-label">Category Description</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="categorydescription" name="description"
                                    value="{{old('description')}}" placeholder="Category description here..." >
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
@section('custom-js')
    <script src="{{ asset('dashboard-assets/js/jquery.min.js') }}"></script>
@endsection
