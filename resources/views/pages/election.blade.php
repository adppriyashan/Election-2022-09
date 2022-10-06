@extends('layouts.app')

@section('content')
    @include('layouts.navbar')
    @include('layouts.sidebar')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="row">
                    @include('layouts.flash')
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Election List</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a onclick="refreshTable()" data-action="reload"><i
                                                    class="ft-rotate-cw"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table w-100" id="usersTable">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Status</th>
                                                    <th>Action</th>

                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <form autocomplete="off" action="{{ route('admin.election.enroll') }}" method="POST"
                            id="voter_form" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" id="isnew" name="isnew"
                                value="{{ old('isnew') ? old('isnew') : '1' }}">
                            <input type="hidden" id="record" name="record"
                                value="{{ old('record') ? old('record') : '' }}">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Add/Edit Election</h4>
                                    <a class="heading-elements-toggle">
                                        <i class="la la-ellipsis-v font-medium-3"></i>
                                    </a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li>
                                                <label for="resetbtn">
                                                    <a data-action="reload">
                                                        <i class="ft-rotate-cw"></i>
                                                    </a>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body pt-0">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">

                                                    {{-- ELECTION TYPE --}}
                                                    <div class="col-md-12">
                                                        <label for="election_type">
                                                            <small>Election Type
                                                                {!! required_mark() !!}
                                                            </small>
                                                        </label>

                                                        <select class="form-control" name="election_type"
                                                            id="election_type">
                                                            <option {{ old('election_type') == 1 ? 'selected' : '' }}
                                                                value="1">
                                                                Presidential
                                                            </option>
                                                            <option {{ old('election_type') == 2 ? 'selected' : '' }}
                                                                value="2">
                                                                Provincial
                                                            </option>
                                                        </select>

                                                        @error('election_type')
                                                            <span class="text-danger">
                                                                <small>{{ $message }}</small>
                                                            </span>
                                                        @enderror

                                                    </div>

                                                    {{-- ELECTION NAME --}}
                                                    <div class="col-md-12 mt-2">
                                                        <label for="election_name">
                                                            <small class="text-dark">
                                                                Name{!! required_mark() !!}
                                                            </small>
                                                        </label>
                                                        <input type="text" id="election_name" name="election_name"
                                                            class="form-control" placeholder="Election Name"
                                                            value="{{ old('election_name') }}">
                                                        @error('election_name')
                                                            <span class="text-danger">
                                                                <small>{{ $message }}</small>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    {{-- ELECTION DATE --}}
                                                    <div class="col-md-12 mt-1">
                                                        <label for="election_date">
                                                            <small class="text-dark">
                                                                Election Date
                                                                {!! required_mark() !!}
                                                            </small>
                                                        </label>

                                                        <input type="date" id="election_date" name="election_date"
                                                            class="form-control" placeholder="NIC"
                                                            value="{{ old('election_date') }}">
                                                        @error('election_date')
                                                            <span class="text-danger"><small>{{ $message }}</small></span>
                                                        @enderror
                                                    </div>

                                                    {{-- ELECTION START TIME --}}
                                                    <div class="col-md-6 mt-1">
                                                        <label for="election_start_time">
                                                            <small class="text-dark">
                                                                Election Start Time
                                                                {!! required_mark() !!}
                                                            </small>
                                                        </label>

                                                        <input type="time" id="election_start_time"
                                                            name="election_start_time" class="form-control"
                                                            value="{{ old('election_start_time') }}">
                                                        @error('election_start_time')
                                                            <span class="text-danger">
                                                                <small>{{ $message }}</small>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    {{-- ELECTION END TIME --}}
                                                    <div class="col-md-6 mt-1">
                                                        <label for="election_end_time">
                                                            <small class="text-dark">
                                                                Election End Time
                                                                {!! required_mark() !!}
                                                            </small>
                                                        </label>

                                                        <input type="time" id="election_end_time"
                                                            name="election_end_time" class="form-control"
                                                            value="{{ old('election_end_time') }}">
                                                        @error('election_end_time')
                                                            <span class="text-danger">
                                                                <small>{{ $message }}</small>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    {{-- REGISTRATION START DATE --}}
                                                    <div class="col-md-12 mt-1">
                                                        <label for="election_registration_start_date">
                                                            <small class="text-dark">
                                                                Registration Start Date
                                                                {!! required_mark() !!}
                                                            </small>
                                                        </label>

                                                        <input type="date" id="election_registration_start_date"
                                                            name="election_registration_start_date" class="form-control"
                                                            value="{{ old('election_registration_start_date') }}">
                                                        @error('election_registration_start_date')
                                                            <span class="text-danger">
                                                                <small>{{ $message }}</small>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    {{-- REGISTRATION END DATE --}}
                                                    <div class="col-md-12 mt-1">
                                                        <label for="election_registration_end_date">
                                                            <small class="text-dark">
                                                                Registration End Date
                                                                {!! required_mark() !!}
                                                            </small>
                                                        </label>

                                                        <input type="date" id="election_registration_end_date"
                                                            name="election_registration_end_date" class="form-control"
                                                            value="{{ old('election_registration_end_date') }}">
                                                        @error('election_registration_end_date')
                                                            <span class="text-danger">
                                                                <small>{{ $message }}</small>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    {{-- REGISTRATION START TIME --}}
                                                    <div class="col-md-6 mt-1">
                                                        <label for="election_registration_start_time">
                                                            <small class="text-dark">
                                                                Registration Start Time
                                                                {!! required_mark() !!}
                                                            </small>
                                                        </label>

                                                        <input type="time" id="election_registration_start_time"
                                                            name="election_registration_start_time" class="form-control"
                                                            value="{{ old('election_registration_start_time') }}">
                                                        @error('election_registration_start_time')
                                                            <span class="text-danger">
                                                                <small>{{ $message }}</small>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    {{-- REGISTRATION END TIME --}}
                                                    <div class="col-md-6 mt-1">
                                                        <label for="election_registration_end_time">
                                                            <small class="text-dark">
                                                                Registration End Time
                                                                {!! required_mark() !!}
                                                            </small>
                                                        </label>

                                                        <input type="time" id="election_registration_end_time"
                                                            name="election_registration_end_time" class="form-control"
                                                            value="{{ old('election_registration_end_time') }}">
                                                        @error('election_registration_end_time')
                                                            <span class="text-danger">
                                                                <small>{{ $message }}</small>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                </div>

                                                <div class="row mt-1">
                                                    <div class="col-md-12">
                                                        <label for="status"><small>Status
                                                                {!! required_mark() !!}</small></label>
                                                        <select class="form-control" name="status" id="status">
                                                            <option {{ old('status') == 1 ? 'selected' : '' }}
                                                                value="1">
                                                                Active
                                                            </option>
                                                            <option {{ old('status') == 2 ? 'selected' : '' }}
                                                                value="2">
                                                                Inactive
                                                            </option>
                                                        </select>
                                                        @error('status')
                                                            <span class="text-danger">
                                                                <small>{{ $message }}</small>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <hr class="my-2">
                                                <div class="row">
                                                    <div class="col-md-6"> <input id="submitbtn"
                                                            class="btn btn-success w-100" type="submit" value="Submit">
                                                    </div>
                                                    <div class="col-md-6 mt-md-0 mt-1"><input class="btn btn-danger w-100"
                                                            type="button" form="user_form" id="resetbtn"
                                                            value="Reset">
                                                    </div>
                                                </div>

                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
    </div>
    <!-- END: Content-->



    @include('layouts.footer')
    @include('layouts.scripts')
    {{-- <script>
        let listTable = $('#usersTable').DataTable({
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            serverSide: true,
            responsive: true,
            language: {
                searchPlaceholder: "Search By ..."
            },
            ajax: "{{ route('admin.parties.list') }}",
            columns: [{
                    name: 'name'
                },
                {
                    name: 'status',
                    orderable: false,
                    searchable: false
                },
                {
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
            ],
            createdRow: function(row, data, dataIndex, cells) {
                $(cells).addClass(' align-middle datatables-sm');
            }
        });

        function doEdit(id) {
            showAlert('Are you sure to edit this record ?', function() {
                $.ajax({
                    type: "GET",
                    url: "{{ route('admin.parties.get.one') }}",
                    data: {
                        'id': id
                    },
                    success: function(response) {
                        $('#name').val(response.name);
                        $('#status').val(response.status);
                        $('#record').val(response.id);
                        $('#isnew').val('2').trigger('change');
                    }
                });
            });
        }

        function doDelete(id) {
            showAlert('Are you sure to delete this record ?', function() {
                window.location = "{{ route('admin.parties.delete.one') }}?id=" + id;
            });
        }

        @if (old('record'))
            $('#record').val({{ old('record') }});
        @endif

        @if (old('isnew'))
            $('#isnew').val({{ old('isnew') }}).trigger('change');
        @endif
    </script> --}}
@endsection
