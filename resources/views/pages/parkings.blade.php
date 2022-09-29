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
                                <h4 class="card-title">Parkings List</h4>
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
                                        <table class="table w-100" id="datatable">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Mobile</th>
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
                        <form autocomplete="off" action="{{ route('admin.parkings.enroll') }}" method="POST"
                            id="enrollment_form">
                            @csrf
                            <input type="hidden" id="isnew" name="isnew"
                                value="{{ old('isnew') ? old('isnew') : '1' }}">
                            <input type="hidden" id="record" name="record"
                                value="{{ old('record') ? old('record') : '' }}">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Add/Edit Parkings</h4>
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
                                                        <label for="name"><small class="text-dark">Parking
                                                                Name{!! required_mark() !!}</small></label>
                                                        <input value="{{ old('name') }}" type="text" name="name"
                                                            id="name" class="form-control">
                                                        @error('name')
                                                            <span class="text-danger"><small>{{ $message }}</small></span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row mt-1">
                                                    <div class="col-md-12">
                                                        <label for="nic"><small class="text-dark">Mobile
                                                                Number{!! required_mark() !!}</small></label>
                                                        <input value="{{ old('mobile') }}" type="text" name="mobile"
                                                            id="mobile" class="form-control">
                                                        @error('mobile')
                                                            <span class="text-danger"><small>{{ $message }}</small></span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row mt-1">
                                                    <div class="col-md-12">
                                                        <label for="no"><small
                                                                class="text-dark">Address{!! required_mark() !!}</small></label>
                                                        <textarea class="form-control textarea" name="address" id="address" cols="30" rows="3"></textarea>
                                                        @error('address')
                                                            <span class="text-danger"><small>{{ $message }}</small></span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row mt-1">
                                                    <div class="col-md-12">
                                                        <label for="lng"><small class="text-dark">Location
                                                                Longitude{!! required_mark() !!}</small></label>
                                                        <input value="{{ old('lng') }}" type="text" name="lng"
                                                            id="lng" class="form-control">
                                                        @error('lng')
                                                            <span class="text-danger"><small>{{ $message }}</small></span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row mt-1">
                                                    <div class="col-md-12">
                                                        <label for="ltd"><small class="text-dark">Location
                                                                Latitude{!! required_mark() !!}</small></label>
                                                        <input value="{{ old('ltd') }}" type="text" name="ltd"
                                                            id="ltd" class="form-control">
                                                        @error('ltd')
                                                            <span class="text-danger"><small>{{ $message }}</small></span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row mt-1">
                                                    <div class="col-md-12">
                                                        <label for="user"><small>Permitted User
                                                            {!! required_mark() !!}</small></label>
                                                    <select class="form-control" name="user" id="user">
                                                        <option value="0"> - Select -</option>
                                                        @foreach ($users as $user)
                                                            <option value="{{ $user->id }}">{{ $user->name }}
                                                                ({{ $user->email }})</option>
                                                        @endforeach
                                                    </select>
                                                    @error('user')
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
                                                            class="btn btn-primary w-100" type="submit" value="Submit">
                                                    </div>
                                                    <div class="col-md-6 mt-md-0 mt-1"><input class="btn btn-danger w-100"
                                                            type="button" form="enrollment_form" id="resetbtn"
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
        let listTable = $('#datatable').DataTable({
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            serverSide: true,
            responsive: true,
            language: {
                searchPlaceholder: "Name / Mobile"
            },
            ajax: "{{ route('admin.parkings.list') }}",
            columns: [{
                    name: 'name'
                },
                {
                    name: 'mobile'
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
                    url: "{{ route('admin.parkings.get.one') }}",
                    data: {
                        'id': id
                    },
                    success: function(response) {
                        $('#name').val(response.name);
                        $('#mobile').val(response.mobile);
                        $('#address').html(response.address);
                        $('#lng').val(response.lng);
                        $('#ltd').val(response.ltd);
                        $('#status').val(response.status);
                        $('#record').val(response.id);
                        $('#user').val(response.user);
                        $('#isnew').val('2').trigger('change');

                        $('.permissions').bootstrapToggle('off');

                        let types = JSON.parse(response.vehicletypes);

                        for (const data in types) {
                            $('#vehicletypes' + data).bootstrapToggle('on');
                        }
                    }
                });
            });
        }

        function showSlots(id) {
            showAlert('Are you sure to show slots for this record ?', function() {
                $.ajax({
                    type: "GET",
                    url: "{{ route('admin.parkings.get.slots') }}",
                    data: {
                        'id': id
                    },
                    success: function(response) {
                        $('#modal-div').html(response);
                        $('#modal-content').modal('show');
                    }
                });
            });
        }

        function doDeleteSlot(id) {
            showAlert('Are you sure to delete this record ?', function() {
                window.location = "{{ route('admin.parkings.slots.delete.one') }}?id=" + id;
            });
        }

        function doEditSlot(id) {
            showAlert('Are you sure to edit this record ?', function() {
                $.ajax({
                    type: "GET",
                    url: "{{ route('admin.parkings.slots.get.one') }}",
                    data: {
                        'id': id
                    },
                    success: function(response) {
                        $('#slot_name').val(response.name);
                        $('#slot_number').val(response.no);
                        $('#slot_price').val(response.charge_per_hour);
                        $('#slot_carpark').val(response.carpark);
                        $('#slot_status').val(response.status);
                        $('#slot_record').val(response.id);
                        $('#slot_isnew').val('2').trigger('change');
                    }
                });
            });
        }

        function doDelete(id) {
            showAlert('Are you sure to delete this record ?', function() {
                window.location = "{{ route('admin.parkings.delete.one') }}?id=" + id;
            });
        }

        function slotEnroll() {
            let slot_record = $('#slot_record').val();
            let slot_isNew = $('#slot_isnew').val();
            let slot_name = $('#slot_name').val();
            let slot_number = $('#slot_number').val();
            let slot_price = $('#slot_price').val();
            let slot_status = $('#slot_status').val();
            let slot_carpark = $('#slot_carpark').val();

            if (slot_name && slot_number && slot_price && slot_status && slot_carpark && slot_isNew) {
                $.ajax({
                    type: "GET",
                    url: "{{ route('admin.parkingslot.enroll') }}",
                    data: {
                        'name': slot_name,
                        'no': slot_number,
                        'price': slot_price,
                        'status': slot_status,
                        'isnew': slot_isNew,
                        'record': slot_record,
                        'carpark': slot_carpark,
                    },
                    success: function(response) {
                        if (response == '1') {
                            $('#modal-content').modal('hide');
                            showSlots(slot_carpark);
                            showWarning('Successfully Assigned');
                        } else {
                            showWarning('Something Wrong');
                        }
                    }
                });
            } else {
                showWarning('Please fill above fields');
            }
        }

        @if (old('record'))
            $('#record').val({{ old('record') }});
        @endif

        @if (old('isnew'))
            $('#isnew').val({{ old('isnew') }}).trigger('change');
        @endif
    </script>
@endsection
