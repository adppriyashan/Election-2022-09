<div class="modal fade" id="modal-content" tabindex="-1" role="dialog" aria-labelledby="modal-contentLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header border-0 text-center">
                <h5 class="modal-title text-danger" id="modal-contentLabel">Emergency</h5>
                <button type="button" onclick="continueProcess()" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-active">
                            <thead>
                                <tr>
                                    <th>Vehicle Number</th>
                                    <th>In Time</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $item->number_plate }}</td>
                                        <td>{{ $item->start }}</td>
                                        <td><button class="btn btn-sm btn-danger" onclick="offEmergency({{ $item->id }})">Checked & Turn Off</button></td>
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
