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
                                <h4 class="card-title">Nominator List</h4>
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
                                                    <th>Reference</th>
                                                    <th>Details</th>
                                                    <th>Date Of Birth</th>
                                                    <th>Party</th>
                                                    <th>City</th>
                                                    <th>Province</th>
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
                        <form autocomplete="off" action="{{ route('admin.nominators.enroll') }}" method="POST"
                            id="user_form">
                            @csrf
                            <input type="hidden" id="isnew" name="isnew"
                                value="{{ old('isnew') ? old('isnew') : '1' }}">
                            <input type="hidden" id="record" name="record"
                                value="{{ old('record') ? old('record') : '' }}">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Add/Edit Nominator</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><label for="resetbtn"><a data-action="reload"><i
                                                            class="ft-rotate-cw"></i></a></label></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body pt-0">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label for="name"><small class="text-dark">Reference
                                                                Number{!! required_mark() !!}</small></label>
                                                        <input value="{{ old('ref') }}" type="text" name="ref"
                                                            id="ref" class="form-control">
                                                        @error('ref')
                                                            <span class="text-danger"><small>{{ $message }}</small></span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-12 mt-1">
                                                        <label for="name"><small
                                                                class="text-dark">Name{!! required_mark() !!}</small></label>
                                                        <input value="{{ old('name') }}" type="text" name="name"
                                                            id="name" class="form-control">
                                                        @error('name')
                                                            <span class="text-danger"><small>{{ $message }}</small></span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-12 mt-1">
                                                        <label for="address"><small
                                                                class="text-dark">Address{!! required_mark() !!}</small></label>
                                                        <textarea class="form-control" name="address" id="address" cols="30" rows="5">{{ old('address') }}</textarea>
                                                        @error('address')
                                                            <span class="text-danger"><small>{{ $message }}</small></span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-12 mt-1">
                                                        <label for="name"><small class="text-dark">National Identity
                                                                Card Number{!! required_mark() !!}</small></label>
                                                        <input value="{{ old('nic') }}" type="text" name="nic"
                                                            id="nic" class="form-control">
                                                        @error('nic')
                                                            <span class="text-danger"><small>{{ $message }}</small></span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-12 mt-1">
                                                        <label for="dob"><small class="text-dark">Date Of
                                                                Birth{!! required_mark() !!}</small></label>
                                                        <input value="{{ old('dob') }}" type="date" name="dob"
                                                            id="dob" class="form-control">
                                                        @error('dob')
                                                            <span class="text-danger"><small>{{ $message }}</small></span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-12 mt-1">
                                                        <label for="city"><small
                                                                class="text-dark">City{!! required_mark() !!}</small></label>
                                                        <input value="{{ old('city') }}" type="text" name="city"
                                                            id="city" class="form-control">
                                                        @error('city')
                                                            <span
                                                                class="text-danger"><small>{{ $message }}</small></span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-12 mt-1">
                                                        <label for="gender"><small>Gender
                                                                {!! required_mark() !!}</small></label>
                                                        <select class="form-control" name="gender" id="gender">
                                                            <option {{ old('gender') == 1 ? 'selected' : '' }}
                                                                value="1">
                                                                Male
                                                            </option>
                                                            <option {{ old('gender') == 2 ? 'selected' : '' }}
                                                                value="2">
                                                                Female
                                                            </option>
                                                        </select>
                                                        @error('gender')
                                                            <span class="text-danger">
                                                                <small>{{ $message }}</small>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-12 mt-1">
                                                        <label for="province"><small>Province
                                                                {!! required_mark() !!}</small></label>
                                                        <select class="form-control" name="province" id="province">
                                                            @foreach (App\Models\Provinces::$list as $key => $item)
                                                                <option {{ old('province') == $key ? 'selected' : '' }}
                                                                    value="{{ $key }}">
                                                                    {{ $item }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('province')
                                                            <span class="text-danger">
                                                                <small>{{ $message }}</small>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-12 mt-1">
                                                        <label for="election">
                                                            <small>Election
                                                                {!! required_mark() !!}
                                                            </small>
                                                        </label>
                                                        <select class="form-control" name="election" id="election">
                                                            @foreach ($elections as $key => $item)
                                                                <option
                                                                    {{ old('election') == $item->id ? 'selected' : '' }}
                                                                    value="{{ $item->id }}">
                                                                    {{ $item->name }} : {{ $item->election_date }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('election')
                                                            <span class="text-danger">
                                                                <small>{{ $message }}</small>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-12 mt-1">
                                                        <label for="party"><small>Party
                                                                {!! required_mark() !!}</small></label>
                                                        <select class="form-control" name="party" id="party">
                                                            @foreach ($parties as $key => $item)
                                                                <option {{ old('party') == $item->id ? 'selected' : '' }}
                                                                    value="{{ $item->id }}">
                                                                    {{ $item->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('party')
                                                            <span class="text-danger">
                                                                <small>{{ $message }}</small>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    @if (doPermitted('//nominators/approve'))
                                                        <div class="col-md-12 mt-1">
                                                            <label for="status"><small>Status
                                                                    {!! required_mark() !!}</small></label>
                                                            <select class="form-control" name="status" id="status">
                                                                @foreach (App\Models\Nominators::$status as $key=>$item)
                                                                <option {{ old('status') == $key ? 'selected' : '' }}
                                                                value="{{ $key }}">
                                                                {{ $item }}
                                                            </option> 
                                                                @endforeach
                                                                
                                                            </select>
                                                            @error('status')
                                                                <span class="text-danger">
                                                                    <small>{{ $message }}</small>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    @endif
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
    <script>
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
            ajax: "{{ route('admin.nominators.list') }}",
            columns: [{
                    name: 'ref'
                },
                {
                    name: 'info'
                },
                {
                    name: 'dob'
                },
                {
                    name: 'party'
                },
                {
                    name: 'city'
                },
                {
                    name: 'province'
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
                    url: "{{ route('admin.nominators.get.one') }}",
                    data: {
                        'id': id
                    },
                    success: function(response) {
                        $('#ref').val(response.ref);
                        $('#name').val(response.name);
                        $('#address').val(response.address);
                        $('#nic').val(response.nic);
                        $('#dob').val(response.dob);
                        $('#city').val(response.city);
                        $('#gender').val(response.gender);
                        $('#province').val(response.province);
                        $('#party').val(response.party);
                        $('#election').val(response.election);
                        @if (doPermitted('//nominators/approve'))
                            $('#status').val(response.status);
                        @endif
                        $('#record').val(response.id);
                        $('#isnew').val('2').trigger('change');
                    }
                });
            });
        }

        function doApprove(id) {
            showAlert('Are you sure to approve this record ?', function() {
                $.ajax({
                    type: "GET",
                    url: "{{ route('admin.nominators.approve.one') }}",
                    data: {
                        'id': id
                    },
                    success: function(response) {
                        listTable.ajax.reload();
                    }
                });
            });
        }

        function doDelete(id) {
            showAlert('Are you sure to delete this record ?', function() {
                window.location = "{{ route('admin.nominators.delete.one') }}?id=" + id;
            });
        }

        @if (old('record'))
            $('#record').val({{ old('record') }});
        @endif

        @if (old('isnew'))
            $('#isnew').val({{ old('isnew') }}).trigger('change');
        @endif
    </script>
@endsection
