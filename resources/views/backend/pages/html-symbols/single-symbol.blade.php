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
                                <h4 class="card-title">HTML Symbols</h4>
                            </div>
                            <div class="col-md-3 col">
                                <div class=" float-right">
                                    <input class="form-check-input" name="is_active" type="checkbox" role="switch"
                                        id="activeCheck"  {{ $symbol->is_active ? 'checked' : '' }}>
                                    <label class="form-check-label" for="activeCheck">Active</label>
                                </div>
                            </div>
                        </div>
                        <p class="card-description">
                            Create Symbol Form
                        </p>
                        <h4 class="card-title">Symbol Detail</h4>
                        <div class="form-group row">
                            <div class="col">
                                <label>UNICODE</label>
                                <div id="the-basics">
                                    <input class="typeahead" type="text" placeholder="UNICODE" value="{{$symbol->unicode}}" name="unicode">
                                </div>
                            </div>
                            <div class="col">
                                <label>HEX CODE</label>
                                <div id="bloodhound">
                                    <input class="typeahead" type="text" placeholder="HEX CODE" value="{{$symbol->hex_code}}" name="hex_code">
                                </div>
                            </div>
                            <div class="col">
                                <label>HTML CODE</label>
                                <div id="the-basics">
                                    <input class="typeahead" type="text" placeholder="HTML CODE" value="{{$symbol->html_code}}" name="html_code">
                                </div>
                            </div>
                            <div class="col">
                                <label>HTML ENTITY</label>
                                <div id="bloodhound">
                                    <input class="typeahead" type="text" placeholder="HTML ENTITY" value="{{$symbol->html_entity}}" name="html_entity">
                                </div>
                            </div>
                            <div class="col">
                                <label>CSS CODE</label>
                                <div id="the-basics">
                                    <input class="typeahead" type="text" placeholder="CSS CODE" value="{{$symbol->css_code}}" name="css_code">
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col">
                                <label>Symbol Name<span
                                    class="text-danger">*</span></label>
                                <div id="the-basics">
                                    <input class="typeahead" type="text" placeholder="Symbol name here..." value="{{$symbol->name}}" name="name" required>
                                </div>
                            </div>
                            <div class="col">
                                <label>URL Name<span
                                    class="text-danger">*</span></label>
                                <div id="the-basics">
                                    <input class="typeahead" type="text" placeholder="URL name here..." value="{{$symbol->url_name}}" name="url_name" required>
                                </div>
                            </div>
                            <div class="col">
                                <label>Symbol Category</label>
                                <div id="bloodhound">
                                    <div class="form-group">
                                        <select class="js-example-basic-single w-100" required name="category_id">
                                            @foreach (getHtmlSymbolCategories() as $item)
                                            @if (intval($symbol->category_id) === intval($item->id))
                                            <option value="{{$item->id}}" selected>{{$item->name}}</option>
                                            @else
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                      </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="MetaTitle" class="col-sm-3 col-form-label">Meta Title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="MetaTitle" value="{{$symbol->meta_title}}" name="meta_title" value=""
                                    placeholder="Meta title here...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="MetaDescription" class="col-sm-3 col-form-label">Meta Description</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="MetaDescription" value="{{$symbol->meta_description}}" name="meta_description"
                                    value="" placeholder="Meta description here...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="MetaKeyword" class="col-sm-3 col-form-label">Meta Keyword</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="MetaKeyword" value="{{$symbol->meta_keyword}}" name="meta_keyword"
                                    value="" placeholder="Meta keyword here...">
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
