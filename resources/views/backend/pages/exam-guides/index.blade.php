@extends('backend.layout.master')
@section('title', $isDraftListing ? 'Draft Exam Guides' : 'Exam Guides')
@section('custom-css')
    <style>
        .rs-draft-guide-status {
            background: #fff7ed;
            border-radius: 999px;
            color: #b45309;
            display: inline-flex;
            font-size: 11px;
            font-weight: 800;
            padding: 6px 10px;
        }

        .rs-draft-guide-actions {
            align-items: center;
            display: inline-flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .rs-exam-guide-drafts-page .rs-page-head > div:last-child {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .rs-exam-guide-drafts-page .rs-table-toolbar {
            grid-template-columns: minmax(0, 1fr) 40px;
        }

        .rs-draft-guide-actions a,
        .rs-draft-guide-actions button {
            align-items: center;
            background: #f8fafc;
            border: 1px solid #e5edf7;
            border-radius: 8px;
            color: #334155;
            display: inline-flex;
            font: inherit;
            font-size: 12px;
            font-weight: 700;
            gap: 7px;
            justify-content: center;
            padding: 8px 11px;
            text-decoration: none;
        }

        .rs-draft-guide-actions a:hover {
            background: #fff7f7;
            border-color: #ffc7cf;
            color: var(--rk-brand);
        }

        .rs-draft-guide-actions button {
            color: #b4233b;
            cursor: pointer;
        }

        .rs-draft-guide-actions button:hover {
            background: #fff1f3;
            border-color: #ffc7cf;
        }

        #example tbody td button.rs-status-toggle {
            border: 0;
            cursor: pointer;
            font-family: inherit;
        }

        #example tbody td .rs-table-action-form {
            display: inline-block !important;
            vertical-align: middle;
        }

        #example tbody td button.rs-table-action-button {
            align-items: center;
            background: #f8fafc;
            border: 0;
            border-radius: 8px;
            box-shadow: inset 0 0 0 1px #e5edf7;
            display: inline-flex;
            height: 36px;
            justify-content: center;
            margin: 0 3px 3px 0;
            padding: 0;
            width: 36px;
        }

        #example tbody td button.rs-table-action-button:hover {
            background: #fff7f8;
            box-shadow: inset 0 0 0 1px #ffc7cf;
        }
    </style>
@endsection

@section('content')
    <div class="content-wrapper rs-table-page {{ $isDraftListing ? 'rs-exam-guide-drafts-page' : '' }}">
        <div class="row grid-margin">
            <div class="col-sm-12">
                @if (Session::get('success'))
                    <div class="demo-spacing-0">
                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                            <div class="alert-body">{{ Session::get('success') }}</div>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                @endif
                @if (Session::get('fail'))
                    <div class="demo-spacing-0">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <div class="alert-body">{{ Session::get('fail') }}</div>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                @endif
            </div>

            <div class="rs-page-head">
                <div>
                    <span>{{ $isDraftListing ? 'Exam Guides / Drafts' : 'Content Management' }}</span>
                    <h1>{{ $isDraftListing ? 'Draft Exam Guides' : 'Exam Guides' }}</h1>
                    <p>{{ $isDraftListing ? $guides->count() . ' unpublished guides. Continue editing and publish them when they are ready.' : 'Manage exam guides, published content and SEO details.' }}</p>
                </div>
                <div>
                    @if ($isDraftListing)
                        <a class="btn btn-light" href="{{ route('exam-guides.index') }}"><i class="fa fa-list"></i> All Guides</a>
                    @endif
                    <a class="btn btn-primary" href="{{ route('exam-guides.create') }}"><i class="fa fa-plus"></i> Add Exam Guide</a>
                </div>
            </div>

            <div class="card w-100 rs-table-card">
                <div class="card-body">
                    <div class="rs-table-toolbar">
                        <label class="rs-table-search">
                            <i class="fa fa-search"></i>
                            <input type="search" id="tableSearch" placeholder="{{ $isDraftListing ? 'Search draft exam guides' : 'Name or title' }}">
                        </label>
                        @unless ($isDraftListing)
                            <select id="statusFilter">
                                <option value="">All status</option>
                                <option value="Active">Active</option>
                                <option value="In-Active">Inactive</option>
                            </select>
                        @endunless
                        <button type="button" class="btn rs-icon-btn" id="tableReset"><i class="fa fa-refresh"></i></button>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="example" class="display expandable-table" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Exam Guide</th>
                                            <th>{{ $isDraftListing ? 'Last Updated' : 'Created At' }}</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($guides as $guide)
                                            <tr>
                                                <td>
                                                    <div class="rs-table-person">
                                                        @if ($guide->hero_image)
                                                            <img src="{{ asset($guide->hero_image) }}" alt="{{ $guide->title ?: 'Exam Guide' }}">
                                                        @else
                                                            <span>{{ strtoupper(substr($guide->title ?: 'E', 0, 2)) }}</span>
                                                        @endif
                                                        <div>
                                                            <strong>{{ $guide->title ?: 'Untitled exam guide' }}</strong>
                                                            <small>{{ $guide->slug ?: 'no-slug' }}</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>{{ $isDraftListing ? $guide->updated_at?->format('d M Y, h:i A') : $guide->created_at?->format('d M Y, h:i A') }}</td>
                                                <td>
                                                    @if ($isDraftListing)
                                                        <span class="rs-draft-guide-status"><i class="fa fa-file-text-o mr-1"></i> Draft</span>
                                                    @else
                                                        <form method="POST" action="{{ route('exam-guides.status', $guide) }}" class="d-inline">
                                                            @csrf
                                                            <button class="rs-status-toggle {{ $guide->is_active ? 'active' : 'inactive' }}" type="submit">
                                                                {{ $guide->is_active ? 'Active' : 'In-Active' }}
                                                            </button>
                                                        </form>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($isDraftListing)
                                                        <div class="rs-draft-guide-actions">
                                                            <a href="{{ route('exam-guides.edit', $guide) }}"><i class="ti-pencil-alt" aria-hidden="true"></i> Continue editing</a>
                                                            <form method="POST" action="{{ route('exam-guides.destroy', $guide) }}" onsubmit="return confirm('Delete this draft exam guide?');">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"><i class="ti-trash" aria-hidden="true"></i> Delete</button>
                                                            </form>
                                                        </div>
                                                    @else
                                                        <form method="POST" action="{{ route('exam-guides.destroy', $guide) }}" class="d-inline rs-table-action-form" onsubmit="return confirm('Are you sure you want to delete this item?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="rs-table-action-button" aria-label="Delete {{ $guide->title }}"><i class="ti-trash text-danger" aria-hidden="true"></i></button>
                                                        </form>
                                                        <a href="{{ route('exam-guides.edit', $guide) }}" aria-label="Edit {{ $guide->title }}"><i class="ti-pencil-alt text-primary" aria-hidden="true"></i></a>
                                                    @endif
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
        $(function () {
            $.fn.DataTable.ext.pager.numbers_length = 3;
            var table = $('#example').DataTable({
                dom: 'rt<"rs-table-bottom"ip>',
                pageLength: 10,
                pagingType: 'simple_numbers',
                language: {
                    lengthMenu: '_MENU_ per page',
                    info: 'Showing _START_ to _END_ of _TOTAL_ {{ $isDraftListing ? "draft exam guides" : "exam guides" }}',
                    emptyTable: 'No {{ $isDraftListing ? "draft exam guides" : "exam guides" }} found'
                }
            });
            $('#tableSearch').on('keyup change', function () {
                table.search(this.value).draw();
            });
            @unless ($isDraftListing)
            $('#statusFilter').on('change', function () {
                table.column(2).search(this.value).draw();
            });
            @endunless
            $('#tableReset').on('click', function () {
                $('#tableSearch').val('');
                @unless ($isDraftListing)
                $('#statusFilter').val('');
                @endunless
                table.search('').columns().search('').draw();
            });
        });
    </script>
@endsection
