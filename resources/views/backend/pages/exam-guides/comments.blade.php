@extends('backend.layout.master')
@section('title', 'Exam Guide Comments')

@section('content')
    <div class="content-wrapper rs-table-page">
        <div class="rs-page-head">
            <div>
                <span>Content Management</span>
                <h1>Exam Guide Comments</h1>
                <p>Review and manage comments submitted on exam guides.</p>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-primary">{{ session('success') }}</div>
        @endif

        <div class="card w-100 rs-table-card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="display expandable-table" id="examGuideCommentsTable" style="width: 100%">
                        <thead>
                            <tr>
                                <th>Message</th>
                                <th>Exam Guide</th>
                                <th>IP Address</th>
                                <th>Email</th>
                                <th>Created On</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($comments as $comment)
                                <tr>
                                    <td>{{ $comment->text }}</td>
                                    <td>
                                        @if ($comment->examGuide)
                                            <a href="{{ url('exam-guides/' . $comment->examGuide->slug) }}">{{ $comment->examGuide->title }}</a>
                                        @else
                                            Deleted exam guide
                                        @endif
                                    </td>
                                    <td>{{ $comment->user_ip }}</td>
                                    <td>{{ $comment->email }}</td>
                                    <td>{{ $comment->created_at }}</td>
                                    <td>
                                        <form method="POST" action="{{ route('exam-guide-comment-delete', $comment) }}" onsubmit="return confirm('Delete this comment?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-link p-0" aria-label="Delete comment">
                                                <i class="ti-trash text-danger" aria-hidden="true"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-js')
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(function () {
            $('#examGuideCommentsTable').DataTable({
                dom: 'rt<"rs-table-bottom"ip>',
                pageLength: 10,
                pagingType: 'simple_numbers',
                language: { emptyTable: 'No comments found' }
            });
        });
    </script>
@endsection
