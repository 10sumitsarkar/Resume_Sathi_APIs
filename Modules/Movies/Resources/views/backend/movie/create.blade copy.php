@extends('backend.layout.master')
@section('title', 'Create Movie')
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
                                <input type="text" class="form-control" id="MovieAudienceType" name="audience_type"
                                    value="{{ $movie->audience_type }}"
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
                                <input type="text" class="form-control" id="MetaDescription" name="meta_description"
                                    value="{{ $movie->meta_description }}" required
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
                                <select class="js-example-basic-single w-100" name="language[]" multiple>
                                    @foreach ($languages as $language)
                                        @if (in_array($language->id, $movie->language_ids()))
                                            <option selected value="{{ $language->id }}">{{ $language->name }}</option>
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
                                            <option selected value="{{ $dub_language->id }}">{{ $dub_language->name }}
                                            </option>
                                        @else
                                            <option value="{{ $dub_language->id }}">{{ $dub_language->name }}</option>
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
                                            <option selected value="{{ $platform->id }}">{{ $platform->name }}</option>
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
                                            <option selected value="{{ $platform->id }}">{{ $platform->name }}</option>
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
                                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
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
                                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
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
                                                data-src="{{ asset($attachment->file) }}" data-target="#attachmentModal"
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
    </div>
    <div class="modal fade" id="attachmentModal" tabindex="-1" role="dialog" aria-labelledby="attachmentModalLabel"
        aria-hidden="true">
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
@endsection
@section('custom-js')
    <script src="{{ asset('dashboard-assets/js/jquery.min.js') }}"></script>
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
@endsection
