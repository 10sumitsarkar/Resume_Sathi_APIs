@extends('backend.layout.master')
@section('title', 'contacts')

@section('content')
    <div class="content-wrapper rs-table-page rs-contact-list-page">
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
            </div>
            <div class="rs-page-head rs-contact-list-head">
                <div>
                    <span>Leads</span>
                    <h1>Contact Requests</h1>
                    <p>Manage enquiries submitted from the website.</p>
                </div>
                <span class="rs-contact-count"><i class="ti-email"></i> {{ number_format($contacts->count()) }} {{ \Illuminate\Support\Str::plural('request', $contacts->count()) }}</span>
            </div>
            <div class="card w-100 rs-table-card">
                <div class="card-body">
                  <div class="rs-table-toolbar">
                    <label class="rs-table-search"><i class="fa fa-search"></i><input type="search" id="tableSearch" placeholder="Search contacts"></label>
                    <button type="button" class="btn rs-icon-btn" id="tableReset"><i class="fa fa-refresh"></i></button>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <div class="table-responsive">
                        <table id="example" class="display expandable-table rs-contact-table" style="width:100%">
                          <thead>
                            <tr>
                                <th>Full Name</th>
                                <th>Email </th>
                                <th>Phone</th>
                                <th>Message</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($contacts as $item)
                            <tr>
                                <td data-label="Full Name"><strong>{{ $item->fullName() ?: 'Not provided' }}</strong></td>
                                <td data-label="Email">
                                    @if ($item->email)
                                        <a class="rs-contact-value-link" href="mailto:{{ $item->email }}">{{ $item->email }}</a>
                                    @else
                                        Not provided
                                    @endif
                                </td>
                                <td data-label="Phone">
                                    @if ($item->phone_number)
                                        <a class="rs-contact-value-link" href="tel:{{ $item->phone_number }}">{{ $item->phone_number }}</a>
                                    @else
                                        Not provided
                                    @endif
                                </td>
                                <td data-label="Message"><span class="rs-message-truncate" title="{{ $item->message }}">{{ $item->message ?: 'No message provided' }}</span></td>
                                <td data-label="Created At">{{ optional($item->created_at)->format('d M Y, h:i A') }}</td>
                                <td data-label="Actions" class="rs-contact-actions">
                                    <a class="rs-table-action rs-table-action-view" href="{{ route('contact-us-view', $item) }}"><i class="ti-eye" aria-hidden="true"></i><span>View</span></a>
                                    <a class="rs-table-action rs-table-action-delete" href="{{ route('contact-us-delete', $item->id) }}" aria-label="Delete contact request from {{ $item->fullName() }}" title="Delete" onclick="return confirm('Are you sure you want to delete this item?');"><i class="ti-trash" aria-hidden="true"></i></a>
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
                language: { info: 'Showing _START_ to _END_ of _TOTAL_ contacts', emptyTable: 'No contacts found' }
            });
            $('#tableSearch').on('keyup change', function() { table.search(this.value).draw(); });
            $('#tableReset').on('click', function() { $('#tableSearch').val(''); table.search('').draw(); });
        });
    </script>
@endsection






