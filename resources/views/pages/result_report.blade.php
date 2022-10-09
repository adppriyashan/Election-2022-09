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
                                <h4 class="card-title">Filters</h4>
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
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="from"><small class="text-dark">Election</small></label>
                                                    <select class="form-control" name="election" id="election">
                                                        @foreach ($elections as $item)
                                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="from"><small class="text-dark">From
                                                            Date & Time</small></label>
                                                    <input type="datetime-local" name="from" id="from"
                                                        class="form-control" placeholder="From Date">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="to"><small class="text-dark">To
                                                            Date & Time</small></label>
                                                    <input type="datetime-local" name="to" id="to"
                                                        class="form-control" placeholder="To Date">
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-md-12">
                                                    <button id="filterbtn" class="btn btn-info float-right ml-1"
                                                        onclick="reloadTable()">Get Results</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Results</h4>
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
                                        <table class="table w-100" id="dataTable">
                                            <thead>
                                                <tr>
                                                    <th>Nominator</th>
                                                    <th>Party</th>
                                                    <th>Votes Count</th>
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
        let listTable = $('#dataTable').DataTable({
            dom: 'Bfrtip',
            buttons: [{
                extend: 'print',
                className: 'btn btn-success text-white'
            }],
            serverSide: true,
            lengthMenu: [
                [11, 26, 51, -1],
                [10, 25, 50, "All"]
            ],
            language: {
                searchPlaceholder: "Search By Election Name .."
            },
            responsive: true,
            ordering: false,
            ajax: {
                url: '{{ route('admin.results.list') }}',
                data: function(d) {
                    return $.extend(d, {
                        'from': $('#from').val(),
                        'to': $('#to').val(),
                        'election': $('#election').val()
                    });
                }
            },
            createdRow: function(row, data, dataIndex, cells) {
                $(cells).addClass(' align-middle datatables-sm text-avoid-break');
            }
        });

        function reloadTable() {
            listTable.ajax.reload();
        }
    </script>
@endsection
