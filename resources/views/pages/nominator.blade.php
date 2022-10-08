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
                                <h4 class="card-title">Nominators List</h4>
                                <a class="heading-elements-toggle">
                                    <i class="la la-ellipsis-v font-medium-3"></i>
                                </a>
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
                                        <table class="table w-100" id="nominatorTable">
                                            <thead>
                                                <tr>
                                                    <th>Party</th>
                                                    <th>ref</th>
                                                    <th>Name</th>
                                                    <th>NIC</th>
                                                    <th>DOB</th>
                                                    <th>Address</th>
                                                    <th>City</th>
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
                        <form autocomplete="off" action="{{ route('admin.voters.enroll') }}" method="POST" id="voter_form"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" id="isnew" name="isnew"
                                value="{{ old('isnew') ? old('isnew') : '1' }}">
                            <input type="hidden" id="record" name="record"
                                value="{{ old('record') ? old('record') : '' }}">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Add/Edit Nominators</h4>
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

                                                <label for="usertype">
                                                    <small>
                                                        Party
                                                        {!! required_mark() !!}
                                                    </small>
                                                </label>

                                                <select class="form-control" name="province_id" id="province_id">
                                                    @foreach ($parties as $id => $party)
                                                        <option {{ old('party') == $id ? 'selected' : '' }}
                                                            value="{{ $party->id }}">
                                                            {{ $party->name }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                                @error('id')
                                                    <span class="text-danger">
                                                        <small>{{ $message }}</small>
                                                    </span>
                                                @enderror

                                            </div>

                                            <div class="col-md-12 mt-1">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label for="name">
                                                            <small class="text-dark">Name{!! required_mark() !!}</small>
                                                        </label>
                                                        <input type="text" id="name" name="name"
                                                            class="form-control" placeholder="Name In Full"
                                                            value="{{ old('name') }}">
                                                        @error('name')
                                                            <span class="text-danger"><small>{{ $message }}</small></span>
                                                        @enderror
                                                    </div>

                                                    <div class="col-md-12 mt-1">
                                                        <label for="name">
                                                            <small class="text-dark">NIC{!! required_mark() !!}</small>
                                                        </label>
                                                        <input type="text" id="nic" name="nic"
                                                            class="form-control" placeholder="NIC"
                                                            value="{{ old('nic') }}">
                                                        @error('nic')
                                                            <span class="text-danger"><small>{{ $message }}</small></span>
                                                        @enderror
                                                    </div>

                                                    <div class="col-md-12 mt-1">
                                                        <label for="name">
                                                            <small class="text-dark">DOB{!! required_mark() !!}</small>
                                                        </label>
                                                        <input type="date" id="dob" name="dob"
                                                            class="form-control" placeholder="DOB"
                                                            value="{{ old('dob') }}">
                                                        @error('dob')
                                                            <span class="text-danger"><small>{{ $message }}</small></span>
                                                        @enderror
                                                    </div>

                                                    <div class="col-md-12 mt-1">
                                                        <label for="address">
                                                            <small class="text-dark">Address{!! required_mark() !!}</small>
                                                        </label>
                                                        <input type="text" id="address" name="address"
                                                            class="form-control" placeholder="address"
                                                            value="{{ old('address') }}">
                                                        @error('address')
                                                            <span class="text-danger"><small>{{ $message }}</small></span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12 mt-1">
                                                        <label for="usertype"><small>Province
                                                                {!! required_mark() !!}</small></label>
                                                        <select class="form-control" name="province_id" id="province_id">
                                                            @foreach (App\Models\Provinces::$list as $id => $province)
                                                                <option {{ old('province') == $id ? 'selected' : '' }}
                                                                    value="{{ $id }}">
                                                                    {{ $province }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('province_id')
                                                            <span class="text-danger">
                                                                <small>{{ $message }}</small>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="row mt-1">
                                                    <div class="col-md-12">
                                                        <label for="status">
                                                            <small>Status
                                                                {!! required_mark() !!}
                                                            </small>
                                                        </label>
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
        let listTable = $('#votersTable').DataTable({
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            serverSide: true,
            responsive: true,
            language: {
                searchPlaceholder: "Search By ..."
            },
            ajax: "{{ route('admin.voters.list') }}",
            columns: [{
                    name: 'name'
                },
                {
                    name: 'nic'
                },
                {
                    name: 'Address'
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
            // alert(id);
            showAlert('Are you sure to edit this record ?', function() {
                $.ajax({
                    type: "GET",
                    url: "{{ route('admin.voters.get.one') }}",
                    data: {
                        'id': id
                    },
                    success: function(response) {
                        $('#name').val(response.name);
                        $('#finger_print_id').val(response.finger_print_id);
                        $('#nic').val(response.nic);
                        $('#address').val(response.address);
                        $('#status').val(response.status);
                        $('#record').val(response.id);
                        $('#isnew').val('2').trigger('change');
                    }
                });
            });
        }

        function doDelete(id) {
            showAlert('Are you sure to delete this record ?', function() {
                window.location = "{{ route('admin.voters.delete.one') }}?id=" + id;
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
