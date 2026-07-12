@extends('backend.layout.master')
@section('title', 'Create Movie')
@section('page-css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('dashboard-assets/vendors/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard-assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">

    <style>
        .tabs {
            display: flex;
            margin-bottom: 20px;
            background-color: #ddedfd;
            width: fit-content;
            padding: 5px;
            border-radius: 10px;
        }

        .tab {
            padding: 10px 35px;
            cursor: pointer;
            border-radius: 10px;
            margin-right: 5px;
            color: #007BFF;
            font-weight: bold;
        }

        .tab.active {
            background-color: #007BFF;
            border-top: 2px solid #007BFF;
            font-weight: bold;
            color: #fff
        }

        .tab-content {
            display: none;
            padding: 0 !important;
            border: none !important;
        }

        .tab-content.active {
            display: block;
        }

        .movie-details-head {
            font-size: 28px;
            font-weight: 700;
            color: #242424;
        }

        #movie-id-input {
            border: 1px solid #dfdfdf;
            padding: 12px 20px;
            border-radius: 5px;
            font-size: 16px;
            color: #242424;
        }

        #movie-details {
            margin-top: 15px
        }

        #movie-details h2 {
            font-size: 20px;
            font-weight: 600;
            color: #242424;
        }

        #movie-details .poster {
            width: auto;
            height: 250px;
            border: 1px solid #ddd;
            border-radius: 10px
        }

        #movie-details table.table-area {
            width: 100%;
            border-spacing: 0;
            border-radius: 5px;
            overflow: hidden;
        }

        #movie-details table.table-area {
            visibility: visible;
            position: relative;
        }

        #movie-details table.table-area tr {
            border: none;
            border-bottom: 1px solid #a8a8a8;
        }

        #movie-details table.table-area tr th {
            text-align: left;
            padding: 12px 15px;
            border: none;
            color: #000;
            font-size: 16px;
            font-weight: 600;
            padding: 15px;
            white-space: nowrap;
        }

        #movie-details table.table-area tr th:nth-last-child(1) {
            text-align: left;
        }

        #movie-details table.table-area tr {
            display: table-row;
            border: none;
            border-radius: 0;
            text-align: left;
            border: none;
            border-bottom: 1px solid #eee;
        }

        #movie-details table.table-area tr:hover {
            background-color: #f2f9fc;
        }

        #movie-details table.table-area tr td {
            display: table-cell;
            border: none;
            padding: 12px 15px;
            color: #212121;
            font-size: 16px;
            font-weight: 400;
        }

        #movie-details table.table-area tr td:nth-last-child(1) {
            text-align: left;
        }

        #movie-details table.table-area tr:nth-child(even) {
            background: #f0f0f0;
        }

        .sub-head h3 {
            font-size: 18px;
            font-weight: 600;
            color: #555;
            margin-bottom: 15px
        }

        .screenshot-images {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px
        }

        .screenshot-images img {
            width: auto;
            height: 200px;
            border: 1px solid #ddd;
            border-radius: 10px
        }

        .select2-container{
            width: 100%!important;
        }
    </style>
@endsection
@section('page-js')
    <script src="{{ asset('dashboard-assets/vendors/select2/select2.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/js/select2.js') }}"></script>
    <script src="{{ asset('dashboard-assets/js/file-upload.js') }}"></script>
@endsection
@section('content')

    <div class="content-wrapper">
        <div class="tabs">
            <div class="tab active" data-tab="tab1">Fetch Movie</div>
            <div class="tab" data-tab="tab2">Upload Movie</div>
        </div>

        <div id="tab1" class="tab-content active">
            {{-- Tab First Start --}}
            <div class="card">
                <div class="card-body">
                    <header class="d-flex justify-content-between">
                        <h1 class="movie-details-head">Movie Details</h1>
                        <input type="text" id="movie-id-input" placeholder="Enter Movie ID (e.g., 550)" />
                    </header>
                    <main id="movie-details">
                        <p>Search movie with movie id
                    </main>
                </div>
            </div>
            {{-- Tab First End --}}
        </div>
        <div id="tab2" class="tab-content">
            {{-- Tab Second Start --}}

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
                {{-- {{dd($movie)}} --}}
                <form method="POST" class="col-lg-12" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-9 col">
                                    <h4 class="card-title">Movie</h4>
                                </div>
                                <div class="col-md-3 col">
                                    <div class=" float-right">
                                        <input class="form-check-input" name="is_active" type="checkbox" role="switch"
                                            id="activeCheck" {{ $movie->is_active ? 'checked' : '' }}>
                                        <label class="form-check-label" for="activeCheck">Active</label>
                                    </div>
                                    <div class="">
                                        <input class="form-check-input" name="is_draft" type="checkbox" role="switch"
                                            id="draftCheck" {{ $movie->is_draft ? 'checked' : '' }}>
                                        <label class="form-check-label" for="draftCheck">Draft</label>
                                    </div>
                                </div>
                            </div>
                            <p class="card-description">
                                Create Movie Form
                            </p>
                            <textarea name="editordata" id='tinyMceExample'>
                            @if ($movie->content)
{{ $movie->content->content }}
@else
Edit your content here...
@endif
                        </textarea>
                            <br />
                            <h4 class="card-title">Movie Details</h4>
                            <div class="form-group row">
                                <label for="MovieName" class="col-sm-3 col-form-label">Movie Name<span
                                        class="text-danger"></span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="MovieName" name="name"
                                        value="{{ $movie->name }}" required placeholder="Movie title here...">
                                </div>
                                <input type="text" id="movieValCondition" value="{{ $movie->name }}" hidden>
                            </div>
                            <div class="form-group row">
                                <label for="MovieDescription" class="col-sm-3 col-form-label">Movie Description<span
                                        class="text-danger"></span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="MovieDescription" name="description"
                                        value="{{ $movie->description }}" placeholder="Movie description here...">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="URLTitle" class="col-sm-3 col-form-label">Movie URL<span
                                        class="text-danger"></span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="URLTitle" name="url_name"
                                        value="{{ $movie->url_name }}" required placeholder="URL title here...">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="MovieLabel" class="col-sm-3 col-form-label">Movie Label Tag<span
                                        class="text-danger"></span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="MovieLabel" name="label"
                                        value="{{ $movie->label }}" placeholder="Movie label here...">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="MovieCast" class="col-sm-3 col-form-label">Casts<span
                                        class="text-danger"></span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="MovieCast" name="casts"
                                        value="{{ $movie->casts }}" placeholder="Movie casts here...">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="MovieReleaseDate" class="col-sm-3 col-form-label">Release Date<span
                                        class="text-danger"></span></label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" id="MovieReleaseDate" name="release_date"
                                        value="{{ $movie->release_date ? date_format(date_create($movie->release_date), 'Y-m-d') : '' }}"
                                        placeholder="Movie Release Date here...">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="MovieDuration" class="col-sm-3 col-form-label">Duration<span
                                        class="text-danger"></span></label>
                                <div class="col-sm-9">
                                    <input type="time" class="form-control" id="MovieDuration" name="duration"
                                        value="{{ $movie->duration }}" placeholder="Movie duration here...">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="MovieSeasion" class="col-sm-3 col-form-label">Seasion<span
                                        class="text-danger"></span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="MovieSeasion" name="seasion"
                                        value="{{ $movie->seasion }}" placeholder="Movie seasion here...">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="MovieAudienceType" class="col-sm-3 col-form-label">Audience Type<span
                                        class="text-danger"></span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="MovieAudienceType"
                                        name="audience_type" value="{{ $movie->audience_type }}"
                                        placeholder="Movie audience type here...">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="MovieWriter" class="col-sm-3 col-form-label">Writer<span
                                        class="text-danger"></span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="MovieWriter" name="writer"
                                        value="{{ $movie->writer }}" placeholder="Movie writer here...">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="MovieCinematography" class="col-sm-3 col-form-label">Cinematography<span
                                        class="text-danger"></span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="MovieCinematography"
                                        name="cinematography" value="{{ $movie->cinematography }}"
                                        placeholder="Movie cinematography here...">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="Moviemusic" class="col-sm-3 col-form-label">Music<span
                                        class="text-danger"></span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="Moviemusic" name="music"
                                        value="{{ $movie->music }}" placeholder="Movie music here...">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="MovieProducer" class="col-sm-3 col-form-label">Producers<span
                                        class="text-danger"></span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="MovieProducer" name="producer"
                                        value="{{ $movie->producer }}" placeholder="Movie producer here...">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="MovieProduction" class="col-sm-3 col-form-label">Production<span
                                        class="text-danger"></span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="MovieProduction" name="production"
                                        value="{{ $movie->production }}" placeholder="Movie production here...">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="MovieCertificate" class="col-sm-3 col-form-label">Certificate<span
                                        class="text-danger"></span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="MovieCertificate" name="certificate"
                                        value="{{ $movie->certificate }}" placeholder="Movie certificate here...">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="MovieDirector" class="col-sm-3 col-form-label">Director<span
                                        class="text-danger"></span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="MovieDirector" name="director"
                                        value="{{ $movie->director }}" placeholder="Movie director here...">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="MetaTitle" class="col-sm-3 col-form-label">Meta Title</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="MetaTitle" name="meta_title"
                                        value="{{ $movie->meta_title }}" required placeholder="Meta title here...">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="MetaDescription" class="col-sm-3 col-form-label">Meta Description</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="MetaDescription"
                                        name="meta_description" value="{{ $movie->meta_description }}" required
                                        placeholder="Meta description here...">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="MetaKeyword" class="col-sm-3 col-form-label">Meta Keyword</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="MetaKeyword" name="meta_keyword"
                                        value="{{ $movie->meta_keyword }}" required placeholder="Meta keyword here...">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Select Movie Category</label>
                                <div class="col-sm-9">
                                    <select class="js-example-basic-single w-100" name="category_id">
                                        @foreach ($movies_category as $item)
                                            @if (intval($movie->category_id) === intval($item->id))
                                                <option selected value="{{ $item->id }}">{{ $item->name }}</option>
                                            @else
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Select Language Category</label>
                                <div class="col-sm-9">
                                    <select class="js-example-basic-single w-100" id="jhjd" name="language[]"
                                        multiple>
                                        @foreach ($languages as $language)
                                            @if (in_array($language->id, $movie->language_ids()))
                                                <option selected value="{{ $language->id }}">{{ $language->name }}
                                                </option>
                                            @else
                                                <option value="{{ $language->id }}">{{ $language->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Select Dubbing Language Category</label>
                                <div class="col-sm-9">
                                    <select class="js-example-basic-single w-100" name="dub_languages[]" multiple>
                                        @foreach ($languages as $dub_language)
                                            @if (in_array($dub_language->id, $movie->dub_language_ids()))
                                                <option selected value="{{ $dub_language->id }}">
                                                    {{ $dub_language->name }}
                                                </option>
                                            @else
                                                <option value="{{ $dub_language->id }}">{{ $dub_language->name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Select Genre Category</label>
                                <div class="col-sm-9">
                                    <select class="js-example-basic-single w-100" name="genres[]" multiple>
                                        @foreach ($genres as $genre)
                                            @if (in_array($genre->id, $movie->genre_ids()))
                                                <option selected value="{{ $genre->id }}">{{ $genre->name }}</option>
                                            @else
                                                <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <h4>Watch Platform</h4>
                            <p class="card-description">
                                Enter details of movie watch platform
                            </p>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Select Platform</label>
                                <div class="col-sm-9">
                                    <select class="js-example-basic-single w-100" name="watch_platform_id">
                                        @foreach ($platforms as $platform)
                                            @if ($movie->watchlink && intval($platform->id) === $movie->watchlink->platform_id)
                                                <option selected value="{{ $platform->id }}">{{ $platform->name }}
                                                </option>
                                            @else
                                                <option value="{{ $platform->id }}">{{ $platform->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="watchLink" class="col-sm-3 col-form-label">Watch Link</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="watchLink" name="watch_link"
                                        value="{{ $movie->watchlink ? $movie->watchlink->link : '' }}"
                                        placeholder="Enter Watch Link">
                                </div>
                            </div>
                            <hr>
                            <h4>Book Platform</h4>
                            <p class="card-description">
                                Enter details of movie book platform
                            </p>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Select Platform</label>
                                <div class="col-sm-9">
                                    <select class="js-example-basic-single w-100" name="book_platform_id">
                                        @foreach ($platforms as $platform)
                                            @if ($movie->booklink && intval($platform->id) === $movie->booklink->platform_id)
                                                <option selected value="{{ $platform->id }}">{{ $platform->name }}
                                                </option>
                                            @else
                                                <option value="{{ $platform->id }}">{{ $platform->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="bookLink" class="col-sm-3 col-form-label">Book Link</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="bookLink" name="book_link"
                                        value="{{ $movie->booklink ? $movie->booklink->link : '' }}"
                                        placeholder="Enter Book Link">
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Hero Image Upload</label>
                                <div class="col-sm-9">
                                    <input type="file" name="image" id="uploadImage" class="file-upload-default"
                                        accept="image/*" onchange="PreviewImage();">
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled
                                            placeholder="Upload Image">
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-primary"
                                                type="button">Upload</button>
                                        </span>
                                    </div>
                                    <div class="pt-2 w-100">
                                        @if ($movie->hero_image)
                                            <div class="float-left" id="previewTitle" style="display: none">
                                                <h5>Preview Hero Image : </h5>
                                            </div>
                                            <img src="{{ asset($movie->hero_image) }}" class="float-right  w-50"
                                                id="uploadPreview" alt="Hero Image">
                                        @else
                                            <div class="float-left" id="previewTitle" style="display: none">
                                                <h5>Preview Hero Image : </h5>
                                            </div>
                                            <img src="" style="display: none" class="float-right  w-50"
                                                id="uploadPreview" alt="Hero Image">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <br>
                            <input type="hidden" name="movie_id" value="{{ $movie->id }}">
                            <button type="submit" class="btn btn-primary">Save Detail</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="row grid-margin">
                <form class="col-lg-12" id="attachment_form" enctype="multipart/form-data">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Upload Attachment Here</h4>
                            <p class="card-description">
                                Get attachment URL
                            </p>

                            <div class="">
                                <div class="form-group row">
                                    <label for="FileType" class="col-sm-3 col-form-label">File Type</label>
                                    <div class="col-sm-9">
                                        <select class="js-example-basic-single w-100" id="FileType">
                                            <option value="1" selected>Image</option>
                                            <option value="2">GIF</option>
                                            <option value="3">Video</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Attachment File</label>
                                <div class="col-sm-9">
                                    <input type="file" name="attachment" id="uploadAttachment"
                                        class="file-upload-default" accept="image/*">
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled
                                            placeholder="Upload Attachment">
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-primary"
                                                type="button">Upload</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="attachmentDiv">
                                <hr>
                                <div class="row attachmentList">
                                    <div class="col-12">
                                        <h4>Uploaded Attchements (<span
                                                id="totalAttachment">{{ count($movie->attachments) }}</span>)</h4>
                                    </div>
                                    <div class="col-12" id="attachmentList">
                                        @foreach ($movie->attachments as $attachment)
                                            <div class="col-12" id="AttachmentFile{{ $attachment->id }}">
                                                <br>
                                                <a class="pr-2"
                                                    href="{{ asset($attachment->file) }}">{{ asset($attachment->file) }}</a>
                                                <a class="px-2 text-danger bg-light" data-id="{{ $attachment->id }}"
                                                    onclick="removeAttachment({{ $attachment->id }})">Remove</a>
                                                <a class="px-2 text-primary bg-light" data-toggle="modal"
                                                    data-src="{{ asset($attachment->file) }}"
                                                    data-target="#attachmentModal"
                                                    onclick="viewAttachment('{{ asset($attachment->file) }}')">View</a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <hr>
                            </div>
                            <button type="submit" class="btn btn-primary" id="submitFileBtn">Add</button>
                            <button type="button" class="btn btn-primary" id="loadingBtn" style="display: none"><i
                                    class="fa fa-spinner fa-spin" aria-hidden="true"></i></button>
                        </div>
                    </div>
                </form>
            </div>

            {{-- Tab Second End --}}
        </div>

        <div class="modal fade" id="attachmentModal" tabindex="-1" role="dialog"
            aria-labelledby="attachmentModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="attachmentModalLabel">Attachment View</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img src="" id="attachmentModalSrc" style="width: 100%" alt="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
@section('custom-js')
    <script src="{{ asset('dashboard-assets/js/jquery.min.js') }}"></script>
    <script>
        const API_KEY = '2605081a91ba656a223e3bdf85ff5f02'; // Replace with your TMDb API key
        const BASE_URL = 'https://api.themoviedb.org/3';
        const IMAGE_BASE_URL = 'https://image.tmdb.org/t/p/w500';

        async function fetchMovieDetails(movieId) {
            try {
                const response = await fetch(
                    `${BASE_URL}/movie/${movieId}?api_key=${API_KEY}&append_to_response=credits,images,release_dates`
                );
                const movie = await response.json();
                displayMovieDetails(movie);
            } catch (error) {
                console.error('Error fetching movie details:', error);
            }
        }

        function displayMovieDetails(movie) {
            const movieDetailsContainer = document.getElementById('movie-details');

            if (!movie || !movie.title) {
                movieDetailsContainer.innerHTML = '<p>Movie details could not be loaded.</p>';
                return;
            }

            const posterUrl = movie.poster_path ? `${IMAGE_BASE_URL}${movie.poster_path}` :
                'https://via.placeholder.com/500x750?text=No+Image+Available';

            const runtimeHours = movie.runtime ? Math.floor(movie.runtime / 60) : 0;
            const runtimeMinutes = movie.runtime ? movie.runtime % 60 : 0;
            const runtimeFormatted = runtimeHours && runtimeMinutes ?
                `${runtimeHours} hour${runtimeHours !== 1 ? 's' : ''} and ${runtimeMinutes} minute${runtimeMinutes !== 1 ? 's' : ''}` :
                '';

            const director = movie.credits?.crew?.find(person => person.job === 'Director')?.name || '';

            const writers = movie.credits?.crew
                ?.filter(person => ['Writer', 'Screenplay', 'Story'].includes(person.job))
                .map(writer => writer.name)
                .join(', ') || '';

            const cinematographers = movie.credits?.crew
                ?.filter(person => person.job === 'Director of Photography')
                .map(cinematographer => cinematographer.name)
                .join(', ') || '';

            const producers = movie.credits?.crew
                ?.filter(person => person.job === 'Producer')
                .map(producer => producer.name)
                .join(', ') || '';


            // Full Music Data - List all composers (if any)
            const fullMusic = movie.credits?.crew?.filter(person => person.job === 'Original Music Composer').map(music =>
                music.name).join(', ') || '';

            const productionCompanies = movie.production_companies?.map(company => company.name).join(', ') || '';

            const productionCountries = movie.production_countries?.map(country => country.name).join(', ') || '';

            const certification = movie.release_dates?.results
                ?.find(result => result.iso_3166_1 === 'US')?.release_dates?.[0]?.certification || '';

            const fullCast = movie.credits?.cast?.map(actor => actor.name).join(', ') || '';


            const castWithCharacters = movie.credits?.cast
                ?.map(actor => `<li>${actor.name} as ${actor.character}</li>`)
                .slice(0, 20) // Display the first 20 cast members for brevity
                .join('') || '';

            const screenshots = movie.images?.backdrops?.slice(0, 5);
            const screenshotImages = screenshots?.map(screenshot => `${IMAGE_BASE_URL}${screenshot.file_path}`) || [];



            const rating = movie.vote_average ? `${movie.vote_average} / 10` : '';


            if (document.getElementById('movieValCondition').value === '') {
                //   Insert value to above related fields
                document.getElementById('MovieName').value = movie.title;
                document.getElementById('MovieDescription').value = movie.title + ': Release Date, Trailer, Songs, Cast';
                document.getElementById('URLTitle').value = movie.title.toLowerCase().replace(/\s+/g, '-') + '-movie-' +
                    movie.release_date.split('-')[0];
                document.getElementById('MovieReleaseDate').value = movie.release_date;
                document.getElementById('MovieCast').value = movie.release_date;
                document.getElementById('MovieCast').value = fullCast;
                // Convert movie runtime into hours:minutes:seconds
                let runtime = movie.runtime; // Movie runtime in minutes
                let hours = Math.floor(runtime / 60); // Get the number of hours
                let minutes = runtime % 60; // Get the remaining minutes
                let seconds = 0; // Assume no seconds in the runtime

                // Format the values into "HH:MM:SS"
                let formattedDuration =
                    String(hours).padStart(2, '0') + ':' +
                    String(minutes).padStart(2, '0') + ':' +
                    String(seconds).padStart(2, '0');

                // Set the formatted duration to the input
                document.getElementById('MovieDuration').value = formattedDuration;

                document.getElementById('MovieWriter').value = writers;
                document.getElementById('MovieCinematography').value = cinematographers;
                document.getElementById('Moviemusic').value = fullMusic;
                document.getElementById('MovieProducer').value = producers;
                document.getElementById('MovieProduction').value = productionCompanies;
                document.getElementById('MovieDirector').value = director;
                document.getElementById('MetaTitle').value = movie.title + ' Movie ' + movie.release_date.split('-')[0] +
                    ' | Release Date, Review, Cast, Trailer, Watch Online at Amazon Prime Video, Netflix - ResumeSathi'
                document.getElementById('MetaDescription').value = movie.title + ' Movie: Find ' + movie.title +
                    ' movie release date, cast, trailer, review, critics rating, duration on ResumeSathi';
                document.getElementById('MetaKeyword').value = movie.title + ',' + movie.title + ' cast,' + movie.title +
                    ' director,' + movie.title + ' trailer,' + movie.title + ' ad teaser ';
                tinymce.get('tinyMceExample').setContent(`
<h2>About ${movie.title} Movie ${movie.release_date.split('-')[0]}</h2> <p><strong>${movie.title}</strong> is a ${runtimeFormatted} ${movie.genres?.map(genre => genre.name).join(', ') || ''} film directed by ${director} and written by ${writers}. Produced by ${producers} under the banners of ${productionCompanies}, the movie features an ensemble cast led by</p>
<ul>
${castWithCharacters}
</ul>
<p>With music by ${fullMusic}, and cinematography by ${cinematographers},</p>
<p><strong>Overview</strong></p>
<p>${movie.overview || 'No overview'}</p>
<p>Country : <strong>${productionCountries}</strong></p>
<p>Release Date : <strong>${movie.release_date || 'Release Soon'}</strong></p>
<p>Rating : <strong>${rating}</strong></p>
<h2>${movie.title} Photos</h2>
<div class="row all-movie-photos">${screenshotImages.map(image => `<div class="col-md-6 mt-4"><img src="${image}" alt="Screenshot"></div>`).join('')}</div>
`)

            }

            movieDetailsContainer.innerHTML = `
          <h2>${movie.title}</h2>
          <img src="${posterUrl}" alt="${movie.title} Poster" class="poster">
          <table class="table-area my-4">
            <tr><th>Original Language</th><td>${movie.original_language?.toUpperCase() || ''}</td></tr>
            <tr><th>Spoken Languages</th><td>${movie.spoken_languages?.map(lang => lang.english_name).join(', ') || ''}</td></tr>
            <tr><th>Country</th><td>${productionCountries}</td></tr>
            <tr><th>Release Date</th><td>${movie.release_date || ''}</td></tr>
            <tr><th>Runtime</th><td>${runtimeFormatted}</td></tr>
            <tr><th>Genres</th><td>${movie.genres?.map(genre => genre.name).join(', ') || ''}</td></tr>
            <tr><th>Director</th><td>${director}</td></tr>
            <tr><th>Writer</th><td>${writers}</td></tr>
            <tr><th>Music</th><td>${fullMusic}</td></tr>
            <tr><th>Cinematography</th><td>${cinematographers}</td></tr>
            <tr><th>Producer</th><td>${producers}</td></tr>
            <tr><th>Production Companies</th><td>${productionCompanies}</td></tr>
            <tr><th>Certificate</th><td>${certification}</td></tr>
            <tr><th>Overview</th><td>${movie.overview || ''}</td></tr>
            <tr><th>Certificate</th><td>${certification}</td></tr>
            <tr><th>Rating</th><td>${rating}</td></tr>
          </table>
  
          <div class="sub-head">
            <h3>Cast</h3>
            <p>${fullCast}</p>
          </div>
  
           <div class="sub-head my-4">
            <h3>Cast with Character</h3>
            <p>${castWithCharacters}</p>
          </div>
  
          <div class="sub-head">
            <h3>Screenshots</h3>
           <div class="screenshot-images">
 ${screenshotImages.map(image => `<img src="${image}" alt="Screenshot">`).join('')}
            </div>
          </div>
        `;
        }

        // Event Listener for Input Change
        document.getElementById('movie-id-input').addEventListener('input', () => {
            const movieId = document.getElementById('movie-id-input').value.trim();
            if (movieId) {
                fetchMovieDetails(movieId); // Call the function with the entered movie ID
            }
        });
    </script>
    <script>
        function PreviewImage() {
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

            oFReader.onload = function(oFREvent) {
                document.getElementById("previewTitle").style.display = 'block';
                document.getElementById("uploadPreview").style.display = 'block';
                document.getElementById("uploadPreview").src = oFREvent.target.result;
            };
        };

        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        let attachment;
        const movie_id = "{{ $movie->id }}";

        $('#uploadAttachment').change(function(e) {
            attachment = e.target.files[0];
        })

        $('#attachment_form').on('submit', (e) => {
            e.preventDefault();
            if (!attachment) {
                alert('Attachment is required.');
                return false;
            }
            $('#submitFileBtn').hide();
            $('#loadingBtn').show();
            var file_type = $('#FileType').val();
            var formData = new FormData();
            formData.append('attachment', attachment);
            formData.append('action_id', movie_id);
            formData.append('file_type', file_type);
            formData.append('attachment_for', 'movie');
            $.ajax({
                cache: false,
                contentType: false,
                processData: false,
                type: 'post',
                data: formData,
                url: "{{ route('movie-upload-attachment') }}",
                success: function(response) {
                    console.log(response.data);
                    var count = Number($('#totalAttachment').text()) + 1;
                    $('#totalAttachment').text(count);
                    var src = response.data.file;
                    var html = '';
                    html += '<div class="col-12" id="AttachmentFile' + response.data.file_id + '"><br>';
                    html += '<a class="pr-2" href="' + src + '">' + src + '</a>';
                    html += '<a class="px-2 text-danger bg-light" data-id="' + response.data.file_id +
                        '" onclick="removeAttachment(' + response.data.file_id + ')">Remove</a>';
                    html += '<a class="px-2 text-primary bg-light"  data-toggle="modal" data-src="' +
                        src + '" data-target="#attachmentModal" onclick=viewAttachment("' + src +
                        '")>View</a>';
                    html += '</div>';
                    $('#attachmentList').append(html);
                    $('#loadingBtn').hide();
                    $('#submitFileBtn').show();
                }
            }).fail(() => {
                $('#loadingBtn').hide();
                $('#submitFileBtn').show();
            })
        });

        function removeAttachment(id) {
            if (!confirm("Are you sure? you want to remove this.")) {
                return false;
            }
            var count = Number($('#totalAttachment').text()) - 1;
            $('#totalAttachment').text(count);
            $('#AttachmentFile' + id).fadeOut();
            $.ajax({
                type: 'post',
                data: {
                    id: id,
                    attachment_for: 'movie'
                },
                url: "{{ route('movie-delete-attachment') }}",
            })
        }

        function viewAttachment(src) {
            $('#attachmentModalSrc').attr('src', src);
        }
    </script>

    <script>
        // JavaScript to handle tab switching
        const tabs = document.querySelectorAll('.tab');
        const tabContents = document.querySelectorAll('.tab-content');

        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                // Remove active class from all tabs
                tabs.forEach(t => t.classList.remove('active'));
                tabContents.forEach(content => content.classList.remove('active'));

                // Add active class to clicked tab and corresponding content
                tab.classList.add('active');
                document.getElementById(tab.dataset.tab).classList.add('active');
            });
        });



        if (document.getElementById('movieValCondition').value !== '') {
            const tabs = document.querySelector('.tabs');
            const tabsCOntent = document.querySelectorAll('.tab-content');

            tabs.style.display = "none";

            tabsCOntent[0].style.display = "none"; // Hide the first tab
            tabsCOntent[1].classList.add('active');
        }
    </script>
@endsection
