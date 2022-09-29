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
                                <h4 class="card-title">Current Sale List</h4>
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
                                                    <th>Details</th>
                                                    <th>In</th>
                                                    <th>Out</th>
                                                    <th>Type</th>
                                                    <th>Price</th>
                                                    @if (Auth::user()->usertype == 1)
                                                        <th>Actions</th>
                                                    @endif
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">New Sale</h4>
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
                                                    <label for="vehicle_number"><small class="text-dark">Vehicle
                                                            Number{!! required_mark() !!}</small></label>
                                                    <input value="{{ old('vehicle_number') }}" type="text"
                                                        name="vehicle_number" id="vehicle_number" class="form-control"
                                                        placeholder="WP-0123">
                                                    @error('vehicle_number')
                                                        <span class="text-danger"><small>{{ $message }}</small></span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row mt-1">
                                                <div class="col-md-12">
                                                    <label for="user"><small class="text-dark">User (Vehicle
                                                            Owner){!! required_mark() !!}</small></label>
                                                    <select class="form-control" name="user" id="user">
                                                        @foreach ($users as $user)
                                                            <option value="{{ $user->id }}">{{ $user->name }}
                                                                ({{ $user->email }})
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('user')
                                                        <span class="text-danger"><small>{{ $message }}</small></span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row mt-1">
                                                <div class="col-md-12">
                                                    <label for="parking"><small
                                                            class="text-dark">Parking{!! required_mark() !!}</small></label>
                                                    <select class="form-control" name="parking" id="parking">
                                                        @foreach ($parkings as $parking)
                                                            <option value="{{ $parking->id }}">{{ $parking->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('parking')
                                                        <span class="text-danger"><small>{{ $message }}</small></span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row mt-1">
                                                <div class="col-md-12">
                                                    <label for="slot"><small
                                                            class="text-dark">Slot{!! required_mark() !!}</small></label>
                                                    <select class="form-control" name="slot" id="slot">
                                                        @foreach ($slots as $slot)
                                                            <option value="{{ $slot->id }}">{{ $slot->no }}
                                                                ({{ $slot->name }})
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('slot')
                                                        <span class="text-danger"><small>{{ $message }}</small></span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <hr class="my-2">
                                            <div class="row">
                                                <div class="col-md-12"> <input onclick="submitSale()"
                                                        class="btn btn-success w-100" type="submit" value="Submit Sale">
                                                </div>
                                                <div class="col-md-12 mt-1"> <input onclick="showQR()()"
                                                        class="btn btn-warning w-100" type="button" value="Show QR Code">
                                                </div>
                                                <div class="col-md-12 mt-1"> <input onclick="scanQR()"
                                                        class="btn btn-danger w-100" type="button" value="QR Scan Data">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
    </div>
    <!-- END: Content-->

    <div>
        <div class="modal fade" id="showqr" tabindex="-1" role="dialog" aria-labelledby="showqrLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header border-0">
                        <h5 class="modal-title" id="showqrLabel">Scan QR</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 justify-content-center">
                                <center>
                                    <div id="qrcode"></div>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footer')
    @include('layouts.scripts')

    <script>
        var listTable = $('#datatable').DataTable({
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            serverSide: true,
            responsive: true,
            language: {
                searchPlaceholder: "Vehicle Number"
            },
            ajax: "{{ route('admin.sale.list') }}",
            columns: [{
                    name: 'number_plate'
                },
                {
                    name: 'start',
                    orderable: false,
                    searchable: false
                },
                {
                    name: 'end',
                    orderable: false,
                    searchable: false
                },
                {
                    name: 'type',
                    orderable: false,
                    searchable: false
                },
                {
                    name: 'price',
                    orderable: false,
                    searchable: false
                },
                @if (Auth::user()->usertype == 1)
                    {
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                @endif
            ],
            rowCallback: function(row, data) {
                let price = data[4];
                $('td:eq(4)', row).html('LKR ' + price.toFixed(2));
            },
            createdRow: function(row, data, dataIndex, cells) {
                $(cells).addClass(' align-middle datatables-sm');
            }
        });

        function submitSale() {
            showAlert("Are you sure to confirm the sale.", function() {
                let vehicle_number = $('#vehicle_number');
                let user = $('#user');
                let parking = $('#parking');
                let slot = $('#slot');

                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.sale.enroll') }}",
                    data: {
                        'vehicle_number': vehicle_number.val(),
                        'user': user.val(),
                        'parking': parking.val(),
                        'slot': slot.val()
                    },
                    success: function(response) {
                        vehicle_number.val('');
                        user.val('');
                        parking.val('');
                        slot.val('');

                        if (response == 1) {
                            listTable.ajax.reload();
                            showSuccess("Slot Reserved Successfully");
                        } else {
                            showAlertWithCancel("Please complete valid inputs", function() {},
                                function() {});
                        }
                    }
                });
            });
        }

        function deleteSale(id) {
            @if (Auth::user()->usertype == 1)
                showAlert("Are you sure to delete the sale.", function() {
                    window.location.replace("{{ route('admin.sale.delete') }}?id=" + id);
                });
            @endif
        }

        var doSearchEmergency = true;

        function doSearchEmergencyProcess() {
            if (doSearchEmergency == true) {
                console.log('Emergenct Alert');
                $.ajax({
                    type: "GET",
                    url: "{{ route('admin.sale.emergency') }}",
                    success: function(response) {
                        if (response.length > 1) {
                            $('#modal-div').html(response);
                            $('#modal-content').modal('show');
                            doSearchEmergency = false;
                        }
                    }
                });
            }
        }

        function continueProcess() {
            doSearchEmergency = true;
        }

        var qrcode = new QRCode(document.getElementById("qrcode"), {
            text: "{{ Auth::user()->id }}",
            width: 300,
            height: 300,
            colorDark: "#000000",
            colorLight: "#ffffff",
            correctLevel: QRCode.CorrectLevel.H
        });

        function showQR() {
            $('#showqr').modal('show');
        }

        function scanQR() {
            let user = $('#user');
            let parking = $('#parking');
            $.ajax({
                type: "GET",
                url: "{{ route('admin.sale.scan.result') }}",
                success: function(response) {
                    alert(JSON.stringify(response));
                    user.val(response.selected_user);
                    parking.val(response.selected_carpark).trigger('change');;
                }
            });
        }

        function offEmergency(slotid) {
            $.ajax({
                type: "GET",
                url: "{{ route('admin.sale.emergency.off') }}",
                data: {
                    'id': slotid
                },
                success: function(response) {
                    $('#modal-content').modal('hide');
                    continueProcess();
                }
            });
        }

        window.setInterval(doSearchEmergencyProcess, 5000);
        doSearchEmergencyProcess();

        function makePayment(id, type) {
            showAlert("Are you sure to complete the sale and mark as leaved.", function() {
                $.ajax({
                    type: "GET",
                    url: "{{ route('admin.sale.complete') }}",
                    data: {
                        'id': id,
                        'type': type
                    },
                    success: function(response) {
                        console.log(response);

                        if (response != 1) {
                            var printWindow = window.open('', 'Print-Window');
                            var doc = printWindow.document;
                            doc.write(response);
                            doc.close();

                            function show() {
                                if (doc.readyState === "complete") {
                                    printWindow.focus();
                                    printWindow.print();
                                    printWindow.document.close();
                                    setTimeout(function() {
                                        printWindow.close();
                                    }, 100);
                                } else {
                                    setTimeout(show, 100);
                                }
                                listTable.ajax.reload();
                            };
                            show();
                        } else {
                            listTable.ajax.reload();
                        }
                    }
                });
            });
        }

        $('#parking').change(function(e) {
            e.preventDefault();
            $.ajax({
                type: "GET",
                url: "{{ route('admin.parkings.slots.get.all') }}",
                data: {
                    'carpark': $(this).val()
                },
                success: function(response) {
                    $('#slot').html('');
                    response.forEach(slot => {
                        $('#slot').append($('<option value=' + slot.id + '>' + slot.no + ' (' +
                            slot.name + ')</option>'));
                    });
                }
            });
        });
    </script>
@endsection
