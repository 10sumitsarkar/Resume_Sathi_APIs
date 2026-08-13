@extends('backend.layout.master')
@section('title', 'Create Article')
@section('page-css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('dashboard-assets/vendors/select2/select2.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('dashboard-assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
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
            {{-- {{dd($article)}} --}}
            <form method="POST" class="col-lg-12" enctype="multipart/form-data">
                @csrf
                <div class="rs-form-steps">
                    <span class="active" data-step-nav="1"><b>01</b> Details</span>
                    <span data-step-nav="2"><b>02</b> Meta & Publish</span>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-9 col">
                                <h4 class="card-title">Web Development Article</h4>
                            </div>
                            <div class="col-md-3 col rs-switch-group">
                                <input type="hidden" name="is_draft" id="draftCheck" value="1" {{ $article->is_active ? 'disabled' : '' }}>
                                <div class="rs-switch-field">
                                    <input class="form-check-input" name="is_active" type="checkbox" role="switch" id="activeCheck" {{ $article->is_active ? 'checked' : '' }}>
                                    <label class="form-check-label" for="activeCheck">Publish</label>
                                </div>
                            </div>
                        </div>
                        <p class="card-description">
                            Create Article Form
                        </p>
                        <div class="rs-step-panel" data-step-panel="1">
                        <textarea name="editordata" id='tinyMceExample'>
                            @if ($article->content)
                            {{$article->content->content}}
                            @else
                            Edit your content here...
                            @endif
                        </textarea>
                        <br />
                        <h4 class="card-title rs-step-title">Article Details</h4>
                        <div class="form-group row">
                            <label for="ArticleName" class="col-sm-3 col-form-label">Article Title<span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="ArticleName" name="article_title"
                                   value="{{ $article->article_title }}" required placeholder="Article title here...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="URLTitle" class="col-sm-3 col-form-label">Article URL<span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="URLTitle" name="url_name"
                                 value="{{ $article->url_name }}" required  placeholder="URL title here...">
                            </div>
                        </div>
                        </div>
                        <div class="rs-step-panel" data-step-panel="2" style="display:none">
                        <h4 class="card-title rs-step-title">Meta & Publish</h4>
                        <div class="form-group row">
                            <label for="MetaTitle" class="col-sm-3 col-form-label">Meta Title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="MetaTitle" name="meta_title"
                                 value="{{ $article->meta_title }}"   placeholder="Meta title here...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="MetaDescription" class="col-sm-3 col-form-label">Meta Description</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="MetaDescription" name="meta_description"
                                   value="{{ $article->meta_description }}" placeholder="Meta description here...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="MetaKeyword" class="col-sm-3 col-form-label">Meta Keyword</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="MetaKeyword" name="meta_keyword"
                                   value="{{ $article->meta_keyword }}" placeholder="Meta keyword here...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Select Article Category</label>
                            <div class="col-sm-9">
                                <select class="js-example-basic-single w-100" name="article_type">
                                @foreach ($articles_category as $item)
                                @if (intval($article->article_type) === intval($item->id))
                                <option selected value="{{ $item->id }}">{{ $item->article_name }}</option>
                                @else
                                <option value="{{ $item->id }}">{{ $item->article_name }}</option>
                                @endif
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Select Language Category</label>
                            <div class="col-sm-9">
                                <select class="js-example-basic-single w-100"  name="language">
                                    @foreach ($languages as $language)
                                    @if (intval($article->language_id) === intval($language->id))
                                    <option selected value="{{ $language->id }}">{{ $language->title }}</option>
                                    @else
                                    <option value="{{ $language->id }}">{{ $language->title }}</option>
                                    @endif
                                    @endforeach
                                   @if ($article->language_id)
                                   <option value="">None</option>
                                    @else
                                    <option value="" selected>None</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Hero Image Upload</label>
                            <div class="col-sm-9">
                                <input type="file" name="image" id="uploadImage" class="file-upload-default" accept="image/*"  onchange="PreviewImage();">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled
                                        placeholder="Upload Image">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                    </span>
                                </div>
                                <div class="pt-2 w-100" >
                                    @if ($article->hero_image)
                                    <div class="float-left" id="previewTitle" style="display: none">
                                        <h5>Preview Hero Image : </h5>
                                    </div>
                                    <img src="{{ asset($article->hero_image) }}" class="float-right  w-50" id="uploadPreview" alt="Hero Image">
                                    @else
                                    <div class="float-left" id="previewTitle" style="display: none">
                                        <h5>Preview Hero Image : </h5>
                                    </div>
                                    <img src="" style="display: none" class="float-right  w-50"  id="uploadPreview" alt="Hero Image">
                                    @endif
                                </div>
                            </div>
                        </div>
                        <br>
                        <input type="hidden" name="article_id" value="{{ $article->id }}">
                        <button type="submit" class="btn btn-primary rs-inline-submit">Save Detail</button>
                        </div>
                    </div>
                </div>
                <div class="rs-fixed-actions">
                    <button type="button" class="btn rs-step-back" style="display:none"><i class="fa fa-arrow-left"></i> Previous</button>
                    <button type="button" class="btn btn-primary rs-step-next">Next <i class="fa fa-arrow-right"></i></button>
                    <button type="submit" class="btn btn-primary rs-step-submit" style="display:none">Submit</button>
                </div>
            </form>
            <aside class="col-lg-4 d-none">
                <div class="rs-form-checklist">
                    <div class="rs-form-checklist-head">
                        <strong>Article Checklist</strong>
                        <span>2 steps</span>
                    </div>
                    <div class="rs-check-item active"><i class="fa fa-check"></i><div><strong>Details</strong><small>Title, slug, content and category</small></div></div>
                    <div class="rs-check-item"><i class="fa fa-circle-o"></i><div><strong>Meta & Publish</strong><small>SEO fields, image and publish status</small></div></div>
                </div>
            </aside>
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
                                <input type="file" name="attachment" id="uploadAttachment" class="file-upload-default" accept="image/*">
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
                                    <h4>Uploaded Attchements (<span id="totalAttachment">{{ count($article->attachments) }}</span>)</h4>
                                </div>
                                <div class="col-12" id="attachmentList">
                                    @foreach ($article->attachments as $attachment)
                                    <div class="col-12" id="AttachmentFile{{$attachment->id}}">
                                        <br>
                                        <a class="pr-2" href="{{ $attachment->file_url }}">{{ $attachment->file_url }}</a>
                                        <a class="px-2 text-danger bg-light" data-id="{{ $attachment->id }}" onclick="removeAttachment({{ $attachment->id }})">Remove</a>
                                        <a class="px-2 text-primary bg-light" href="javascript:void(0)" data-toggle="modal" data-target="#attachmentModal" onclick="viewAttachment('{{ $attachment->file_url }}')">View</a>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <hr>
                        </div>
                        <button type="submit" class="btn btn-primary" id="submitFileBtn">Add</button>
                        <button type="button" class="btn btn-primary" id="loadingBtn" style="display: none"><i class="fa fa-spinner fa-spin" aria-hidden="true"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="modal fade" id="attachmentModal" tabindex="-1" role="dialog" aria-labelledby="attachmentModalLabel" aria-hidden="true">
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

        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#activeCheck').on('change', function() {
                if (this.checked && !validateAllRequired(true)) {
                    this.checked = false;
                    $('#draftCheck').prop('disabled', false);
                    return;
                }
                $('#draftCheck').prop('disabled', this.checked);
            }).trigger('change');
            let currentStep = 1;
            function showStep(step) {
                currentStep = step;
                $('[data-step-panel]').hide();
                $('[data-step-panel="' + step + '"]').show();
                $('[data-step-nav]').removeClass('active');
                $('[data-step-nav="' + step + '"]').addClass('active');
                $('.rs-step-back').toggle(step === 2);
                $('.rs-step-next').toggle(step === 1);
                $('.rs-step-submit').toggle(step === 2);
            }
            $('.rs-step-next').on('click', function() {
                if (!validateStep(1)) {
                    return;
                }
                showStep(2);
            });
            $('.rs-step-back').on('click', function() { showStep(1); });
            $('.rs-step-submit').on('click', function(e) {
                if ($('#activeCheck').is(':checked') && !validateAllRequired(true)) {
                    e.preventDefault();
                    return false;
                }
            });
            showStep(1);
        });

        function editorContentText() {
            const textarea = document.getElementById('tinyMceExample');
            const editor = window.tinymce ? tinymce.get('tinyMceExample') : null;
            let content = '';
            if (editor && textarea && textarea.dataset.editorReady === '1') {
                content = editor.getContent({ format: 'text' });
            } else if (editor && editor.initialized) {
                content = editor.getContent({ format: 'text' });
            } else if (textarea) {
                content = textarea.value.replace(/<[^>]*>/g, '');
            }
            content = (content || '').replace(/\u00a0/g, ' ').trim();
            return content === 'Edit your content here...' ? '' : content;
        }

        function validateStep(step) {
            const invalid = $('[data-step-panel="' + step + '"]').find('[required]').filter(function() {
                return !this.checkValidity();
            }).first();
            if (invalid.length) {
                invalid[0].reportValidity();
                return false;
            }
            if (step === 1 && window.tinymce && tinymce.get('tinyMceExample') && !tinymce.get('tinyMceExample').initialized) {
                return true;
            }
            if (step === 1 && !editorContentText()) {
                alert('Content is required.');
                return false;
            }
            return true;
        }

        function validateAllRequired(showMessage) {
            if (!validateStep(1)) {
                return false;
            }
            if (!validateStep(2)) {
                return false;
            }
            return true;
        }

        let attachment ;
        const article_id = "{{ $article->id }}";

        $('#uploadAttachment').change(function(e){
         attachment = e.target.files[0];
        })

        $('#attachment_form').on('submit', (e) => {
            e.preventDefault();
            if(!attachment){
                alert('Attachment is required.');
                return false;
            }
            $('#submitFileBtn').hide();
            $('#loadingBtn').show();
            var file_type = $('#FileType').val();
            var formData= new FormData();
            formData.append('attachment' , attachment);
            formData.append('action_id' , article_id);
            formData.append('file_type' , file_type);
            formData.append('attachment_for' , 'article');
            $.ajax({
                cache: false,
                contentType: false,
                processData: false,
                type:'post',
                data:formData,
                url:"{{ route('upload-attachment') }}",
                success:function(response){
                    console.log(response.data);
                    var count = Number($('#totalAttachment').text())+1;
                    $('#totalAttachment').text(count);
                    var src = response.data.file;
                    var html = '';
                    html += '<div class="col-12" id="AttachmentFile'+response.data.file_id+'"><br>';
                    html += '<a class="pr-2" href="'+src+'">'+src+'</a>';
                    html += '<a class="px-2 text-danger bg-light" data-id="'+response.data.file_id+'" onclick="removeAttachment('+response.data.file_id+')">Remove</a>';
                    html += '<a class="px-2 text-primary bg-light" href="javascript:void(0)" data-toggle="modal" data-target="#attachmentModal" onclick="viewAttachment(\''+src+'\')">View</a>';
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

        function removeAttachment(id){
            if(!confirm("Are you sure? you want to remove this.")){
                return false;
            }
            var count = Number($('#totalAttachment').text())-1;
            $('#totalAttachment').text(count);
            $('#AttachmentFile'+id).fadeOut();
            $.ajax({
                type:'post',
                data:{id:id, attachment_for:'article'},
                url:"{{ route('delete-attachment') }}",
            })
        }

        function viewAttachment(src){
            $('#attachmentModalSrc').attr('src', src);
            $('#attachmentModal').modal('show');
        }

    </script>
@endsection
