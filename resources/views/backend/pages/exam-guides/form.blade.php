@extends('backend.layout.master')
@section('title', $guide->exists ? 'Edit Exam Guide' : 'Create Exam Guide')
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
                @if (session('success'))
                    <div class="alert alert-primary">{{ session('success') }}</div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
                    </div>
                @endif
            </div>
            <form method="POST" class="col-lg-12" enctype="multipart/form-data" action="{{ $guide->exists ? route('exam-guides.update', $guide) : route('exam-guides.store') }}">
                @csrf
                @if ($guide->exists)
                    @method('PUT')
                @endif
                <div class="rs-form-steps">
                    <span class="active" data-step-nav="1"><b>01</b> Details</span>
                    <span data-step-nav="2"><b>02</b> Meta & Publish</span>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-9 col">
                                <h4 class="card-title">Exam Guide</h4>
                            </div>
                            <div class="col-md-3 col rs-switch-group">
                                <div class="rs-switch-field">
                                    <input class="form-check-input" name="is_active" type="checkbox" role="switch" id="activeCheck" value="1" @checked(old('is_active', $guide->exists ? $guide->is_active : false))>
                                    <label class="form-check-label" for="activeCheck">Publish</label>
                                </div>
                            </div>
                        </div>
                        <p class="card-description">Create Exam Guide Form</p>
                        <div class="rs-step-panel" data-step-panel="1">
                            <textarea name="content" id="tinyMceExample">{{ old('content', $guide->content?->content ?? 'Edit your content here...') }}</textarea>
                            <br>
                            <h4 class="card-title rs-step-title">Exam Guide Details</h4>
                            <div class="form-group row">
                                <label for="guideTitle" class="col-sm-3 col-form-label">Exam Guide Title<span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input class="form-control" id="guideTitle" name="title" value="{{ old('title', $guide->title === 'New Exam Guide' ? '' : $guide->title) }}" required placeholder="Enter exam guide title">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="guideSlug" class="col-sm-3 col-form-label">Exam Guide URL<span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input class="form-control" id="guideSlug" name="slug" value="{{ old('slug', str_starts_with($guide->slug, 'new-exam-guide-') ? '' : $guide->slug) }}" required placeholder="Enter URL slug">
                                </div>
                            </div>
                        </div>

                        <div class="rs-step-panel" data-step-panel="2" style="display:none">
                            <h4 class="card-title rs-step-title">Meta & Publish</h4>
                            <div class="form-group row">
                                <label for="metaTitle" class="col-sm-3 col-form-label">Meta Title</label>
                                <div class="col-sm-9"><input class="form-control" id="metaTitle" name="meta_title" value="{{ old('meta_title', $guide->meta_title) }}"></div>
                            </div>
                            <div class="form-group row">
                                <label for="metaDescription" class="col-sm-3 col-form-label">Meta Description</label>
                                <div class="col-sm-9"><textarea class="form-control" id="metaDescription" name="meta_description" rows="3">{{ old('meta_description', $guide->meta_description) }}</textarea></div>
                            </div>
                            <div class="form-group row">
                                <label for="metaKeyword" class="col-sm-3 col-form-label">Meta Keywords</label>
                                <div class="col-sm-9"><textarea class="form-control" id="metaKeyword" name="meta_keyword" rows="2">{{ old('meta_keyword', $guide->meta_keyword) }}</textarea></div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Hero Image Upload</label>
                                <div class="col-sm-9">
                                    <input type="file" name="image" id="uploadImage" class="file-upload-default" accept="image/*" onchange="PreviewImage();">
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                                        <span class="input-group-append"><button class="file-upload-browse btn btn-primary" type="button">Upload</button></span>
                                    </div>
                                    <div class="pt-2 w-100">
                                        <div class="float-left" id="previewTitle" style="display:none"><h5>Preview Hero Image:</h5></div>
                                        <img src="{{ $guide->hero_image ? asset($guide->hero_image) : '' }}" style="{{ $guide->hero_image ? '' : 'display:none' }}" class="float-right w-50" id="uploadPreview" alt="Exam Guide Hero Image">
                                    </div>
                                </div>
                            </div>
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

            @if ($guide->exists)
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Upload Attachment Here</h4>
                        <p class="card-description">Upload images, videos, PDFs, Word documents, or text notes. Documents can be downloaded by visitors from the guide page (maximum 20 MB).</p>
                        <form id="attachment_form" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label for="FileType" class="col-sm-3 col-form-label">File Type</label>
                                <div class="col-sm-9">
                                    <select class="js-example-basic-single w-100" id="FileType">
                                        <option value="1" selected>Image</option><option value="2">GIF</option><option value="3">Video</option><option value="4">Document / Notes (PDF, Word, TXT, RTF)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Attachment File</label>
                                <div class="col-sm-9">
                                    <input type="file" name="attachment" id="uploadAttachment" class="file-upload-default" accept="image/*">
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Attachment">
                                        <span class="input-group-append"><button class="file-upload-browse btn btn-primary" type="button">Upload</button></span>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit" id="submitFileBtn">Add Attachment</button>
                            <button class="btn btn-primary" type="button" id="loadingBtn" style="display:none"><i class="fa fa-spinner fa-spin"></i></button>
                        </form>
                        <hr>
                        <h4>Uploaded Attachments (<span id="totalAttachment">{{ $guide->attachments->count() }}</span>)</h4>
                        <div id="attachmentList">
                            @foreach ($guide->attachments as $attachment)
                                <div class="col-12" id="AttachmentFile{{ $attachment->id }}">
                                    <br>
                                    <a class="pr-2" href="{{ $attachment->file_url }}" target="_blank" rel="noopener">{{ $attachment->name ?: basename($attachment->file) }}</a>
                                    <a class="px-2 text-danger bg-light" href="javascript:void(0)" onclick="removeAttachment({{ $attachment->id }})">Remove</a>
                                    @if ((int) $attachment->file_type !== 4)
                                    <a class="px-2 text-primary bg-light" href="javascript:void(0)" data-toggle="modal" data-target="#attachmentModal" onclick="viewAttachment(@js($attachment->file_url))">View</a>
                                    @else
                                    <span class="px-2 text-muted">Document</span>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>

    <div class="modal fade" id="attachmentModal" tabindex="-1" role="dialog" aria-labelledby="attachmentModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document"><div class="modal-content">
            <div class="modal-header"><h5 class="modal-title" id="attachmentModalLabel">Attachment View</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
            <div class="modal-body"><img src="" id="attachmentModalSrc" style="width:100%" alt="Attachment preview"></div>
            <div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button></div>
        </div></div>
    </div>
@endsection

@section('custom-js')
    <script src="{{ asset('dashboard-assets/js/jquery.min.js') }}"></script>
    <script>
        function PreviewImage() {
            const file = document.getElementById('uploadImage').files[0];
            if (!file) return;
            const reader = new FileReader();
            reader.onload = event => {
                document.getElementById('previewTitle').style.display = 'block';
                document.getElementById('uploadPreview').style.display = 'block';
                document.getElementById('uploadPreview').src = event.target.result;
            };
            reader.readAsDataURL(file);
        }

        $(function () {
            $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });

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
            $('.rs-step-next').on('click', function () {
                const title = document.getElementById('guideTitle');
                const slug = document.getElementById('guideSlug');
                if (!title.checkValidity()) return title.reportValidity();
                if (!slug.checkValidity()) return slug.reportValidity();
                const textarea = document.getElementById('tinyMceExample');
                const editor = window.tinymce ? tinymce.get('tinyMceExample') : null;
                let content = editor && editor.initialized
                    ? editor.getContent({ format: 'text' })
                    : textarea.value.replace(/<[^>]*>/g, '');
                content = (content || '').replace(/\u00a0/g, ' ').trim();
                if (!content || content === 'Edit your content here...') {
                    alert('Content is required.');
                    return;
                }
                showStep(2);
            });
            $('.rs-step-back').on('click', function () { showStep(1); });
            showStep(1);

            let attachment;
            const attachmentAccept = {
                1: 'image/*',
                2: 'image/gif',
                3: 'video/*',
                4: '.pdf,.doc,.docx,.txt,.rtf'
            };
            $('#FileType').on('change', function () {
                $('#uploadAttachment').attr('accept', attachmentAccept[$(this).val()]);
                $('#uploadAttachment').val('');
                attachment = null;
            });
            $('#uploadAttachment').on('change', function (event) { attachment = event.target.files[0]; });
            $('#attachment_form').on('submit', function (event) {
                event.preventDefault();
                if (!attachment) {
                    alert('Attachment is required.');
                    return;
                }
                const formData = new FormData();
                formData.append('attachment', attachment);
                formData.append('action_id', '{{ $guide->id }}');
                formData.append('file_type', $('#FileType').val());
                formData.append('attachment_for', 'exam-guide');
                $('#submitFileBtn').hide();
                $('#loadingBtn').show();
                $.ajax({
                    cache: false,
                    contentType: false,
                    processData: false,
                    type: 'POST',
                    data: formData,
                    url: '{{ route('upload-attachment') }}',
                }).done(function (response) {
                    if (!response.success) {
                        alert(response.message || 'Attachment upload failed.');
                        return;
                    }
                    const id = response.data.file_id;
                    const src = response.data.file;
                    const row = $('<div>', { class: 'col-12', id: 'AttachmentFile' + id });
                    row.append($('<br>'));
                    row.append($('<a>', { class: 'pr-2', href: src, text: response.data.name || attachment.name, target: '_blank', rel: 'noopener' }));
                    row.append($('<a>', { class: 'px-2 text-danger bg-light', href: 'javascript:void(0)', text: 'Remove' }).on('click', function () { removeAttachment(id); }));
                    if ($('#FileType').val() !== '4') {
                        row.append($('<a>', { class: 'px-2 text-primary bg-light', href: 'javascript:void(0)', text: 'View', 'data-toggle': 'modal', 'data-target': '#attachmentModal' }).on('click', function () { viewAttachment(src); }));
                    } else {
                        row.append($('<span>', { class: 'px-2 text-muted', text: 'Document' }));
                    }
                    $('#attachmentList').append(row);
                    $('#totalAttachment').text(Number($('#totalAttachment').text()) + 1);
                    $('#uploadAttachment').val('');
                    $('.file-upload-info').val('');
                    attachment = null;
                }).fail(function (xhr) {
                    const message = xhr.responseJSON?.message || 'Attachment upload failed. Please try again.';
                    alert(message);
                }).always(function () {
                    $('#loadingBtn').hide();
                    $('#submitFileBtn').show();
                });
            });
        });

        function removeAttachment(id) {
            if (!confirm('Are you sure you want to remove this attachment?')) return;
            $.post('{{ route('delete-attachment') }}', { id: id, attachment_for: 'exam-guide' })
                .done(function (response) {
                    if (!response.success) {
                        alert(response.message || 'Attachment could not be removed.');
                        return;
                    }
                    $('#AttachmentFile' + id).remove();
                    $('#totalAttachment').text(Math.max(0, Number($('#totalAttachment').text()) - 1));
                })
                .fail(function (xhr) {
                    alert(xhr.responseJSON?.message || 'Attachment could not be removed.');
                });
        }

        function viewAttachment(src) {
            $('#attachmentModalSrc').attr('src', src);
            $('#attachmentModal').modal('show');
        }
    </script>
@endsection
