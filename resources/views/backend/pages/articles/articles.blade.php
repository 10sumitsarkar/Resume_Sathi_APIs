@extends('backend.layout.master')
@section('title', 'Articles')

@section('content')
    <div class="content-wrapper rs-table-page">
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
            </div>

            <div class="rs-page-head">
                <div>
                    <span>Content Management</span>
                    <h1>Articles</h1>
                    <p>Manage article information, drafts, published content and SEO details.</p>
                </div>
                <a class="btn btn-primary" href="{{ route('create-article') }}"><i class="fa fa-plus"></i> Add Article</a>
            </div>

            <div class="card w-100 rs-table-card">
                <div class="card-body">
                    <div class="rs-table-toolbar">
                        <label class="rs-table-search">
                            <i class="fa fa-search"></i>
                            <input type="search" id="tableSearch" placeholder="Name, category, author or title">
                        </label>
                        <select id="statusFilter">
                            <option value="">All status</option>
                            <option value="Active">Active</option>
                            <option value="In-Active">Inactive</option>
                        </select>
                        <button type="button" class="btn rs-icon-btn" id="tableReset"><i class="fa fa-refresh"></i></button>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="example" class="display expandable-table" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Article</th>
                                            <th>Category</th>
                                            <th>Language</th>
                                            <th>Created At</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($articles as $item)
                                            <tr>
                                                <td>
                                                    <div class="rs-table-person">
                                                        @if ($item->hero_image)
                                                            <img src="{{ asset($item->hero_image) }}" alt="{{ $item->article_title ?: 'Article' }}">
                                                        @else
                                                            <span>{{ strtoupper(substr($item->article_title ?: 'A', 0, 2)) }}</span>
                                                        @endif
                                                        <div>
                                                            <strong>{{ $item->article_title ?: 'Untitled article' }}</strong>
                                                            <small>{{ $item->url_name ?: 'no-slug' }}</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>{{ optional($item->article_category)->article_name ?? 'N/A' }}</td>
                                                <td>{{ $item->language ? $item->language->title : '--' }}</td>
                                                <td>{{ $item->created_at }}</td>
                                                <td>
                                                    @if ($item->is_active)
                                                        <a class="rs-status-toggle active" href="{{ route('article-status', $item->id) }}">Active</a>
                                                    @else
                                                        <a class="rs-status-toggle inactive" href="{{ route('article-status', $item->id) }}">In-Active</a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('article-delete', $item->id) }}"
                                                        onclick="return confirm('Are you sure you want to delete this item?');"><i
                                                            class="ti-trash text-danger"
                                                            aria-hidden="true"></i></a>
                                                    <a href="{{ route('save-article', base64_encode($item->id)) }}"><i
                                                            class="ti-pencil-alt text-primary"
                                                            aria-hidden="true"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page-js')
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $.fn.DataTable.ext.pager.numbers_length = 3;
            var table = $('#example').DataTable({
                dom: 'rt<"rs-table-bottom"ip>',
                pageLength: 10,
                pagingType: 'simple_numbers',
                language: {
                    lengthMenu: '_MENU_ per page',
                    info: 'Showing _START_ to _END_ of _TOTAL_ articles',
                    emptyTable: 'No articles found'
                }
            });
            $('#tableSearch').on('keyup change', function() {
                table.search(this.value).draw();
            });
            $('#statusFilter').on('change', function() {
                table.column(4).search(this.value).draw();
            });
            $('#tableReset').on('click', function() {
                $('#tableSearch').val('');
                $('#statusFilter').val('');
                table.search('').columns().search('').draw();
            });
        });
    </script>
@endsection


