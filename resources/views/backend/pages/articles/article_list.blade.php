@extends('admin_dashoard.layout.master')
@push('custom_css')
    <style>
        .Article {
            background-color: #007BFF !important;
            color: #fff;
        }
    </style>
@endpush
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Article Management</a></li>
                            <li class="breadcrumb-item active">Article List</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class=" m-2">
            <div class="d-flex">
                <div class="mx-1">
                    <a href="{{ url('create_article') }}"><button class="btn btn-success"><i class="fa fa-plus"></i> Create
                            New Article</button></a>
                </div>
                <div class="mx-1">
                    <a href="{{ route('article_list') }}" class="btn btn-primary"><i class="fa fa-list"></i> List</a>
                </div>
            </div>

        </div>
        <section class="content">
            @if (\Session::has('success'))
                <div class="form-group">
                    <div class="text-success col-md-12 text-center " id="hideMe">
                        <h5 id="hideMe" style=" text-align:center !important;">{!! \Session::get('success') !!}</h5>
                    </div>
                </div>
            @endif
            @if (\Session::has('danger'))
                <div class="form-group">
                    <div class="text-danger col-md-12 text-center " id="hideMe">
                        <h5 id="hideMe" style=" text-align:center !important;">{!! \Session::get('danger') !!}</h5>
                    </div>
                </div>
            @endif
            <div class="container-fluid ">
                <div class="row">
                    @foreach ($articles_data as $item)
                        <div class="col-12 col-lg-3 col-4">
                            <div class="card p-2" style="">
                                <img class="shadow card-img-top "
                                    src="{{ asset('/articles_image') }}/{{ $item->front_image }}" alt="Post Title">
                                <div class="card-body p-1">
                                    @foreach ($articles as $article)
                                        @if ($article->article_id == $item->article_type)
                                            <label class="m-0" for="">{{ $article->article_name }}</label>
                                        @endif
                                    @endforeach
                                    <br class="m-0">
                                    <div class="d-flex justify-content-between">
                                        <span class="m-0"
                                            style="font-size: 10px;">{{ $item->created_at->format('d M Y H:m') }}</span>
                                        <span class="m-0" style="font-size: 10px;"> <i
                                                class="fa fa-eye text-primary"></i> {{ $item->pageview }}</span>
                                    </div>
                                    <hr class="solid m-0">
                                    <h6 class="title"
                                        style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                        <b>{{ $loop->iteration }}</b>. {{ $item->article_title }}</h6>
                                    <div class="d-flex">
                                        <div class="mr-1">
                                            <a href="{{ url($item->canonical_tag) }}"
                                                class="shadow btn btn-success">View</a>
                                        </div>
                                        <div class="mr-1">
                                            <a href="{{ url('edit_article') }}/{{ $item->id }}"
                                                class="shadow btn btn-primary">Edit</a>
                                        </div>
                                        <div class="ml-1">
                                            <a href="{{ url('article_delete') }}/{{ $item->id }}"
                                                onclick="return confirm('Are you sure you want to delete this item?');"
                                                class="shadow btn btn-danger">Remove</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </section>
    @endsection
