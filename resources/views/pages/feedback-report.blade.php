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
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Feedback Report</h4>
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
                                                    <th>Carpark</th>
                                                    <th>Slot</th>
                                                    <th>User</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                        </table>
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
                searchPlaceholder: "Parking, Slot No, User"
            },
            ajax: "{{ route('admin.report.feedback.list') }}",
            columns: [
                {
                    name: 'carpark',
                    orderable: false,
                    searchable: false
                },
                {
                    name: 'slot',
                    orderable: false,
                    searchable: false
                },
                {
                    name: 'user',
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

        function view(id) {
            $.ajax({
                type: "GET",
                url: "{{ route('admin.report.feedback.get.one') }}",
                data: {
                    'id':id
                },
                success: function (response) {
                    showMessage(response);
                }
            });
         }
    </script>
@endsection
