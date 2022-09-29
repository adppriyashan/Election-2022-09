<div class="modal fade" id="modal-content" tabindex="-1" role="dialog" aria-labelledby="modal-contentLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title" id="modal-contentLabel">Parking Slots</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <input type="hidden" id="slot_isnew" name="isnew"
                            value="{{ old('slot_isnew') ? old('isnew') : '1' }}">
                        <input type="hidden" id="slot_carpark" name="slot_carpark" value="{{ $id }}">
                        <input type="hidden" id="slot_record" name="slot_record"
                            value="{{ old('slot_record') ? old('slot_record') : '' }}">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add/Edit Parkings</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><label for="slot_resetbtn"><a data-action="reload"><i
                                                        class="ft-rotate-cw"></i></a></label></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body pt-0">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="slot_name"><small class="text-dark">Parking Slot
                                                            Name{!! required_mark() !!}</small></label>
                                                    <input value="{{ old('slot_name') }}" type="text"
                                                        name="slot_name" id="slot_name" class="form-control">
                                                    @error('slot_name')
                                                        <span class="text-danger"><small>{{ $message }}</small></span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="slot_name"><small class="text-dark">Parking Slot
                                                            Number{!! required_mark() !!}</small></label>
                                                    <input value="{{ old('slot_number') }}" type="text"
                                                        name="slot_number" id="slot_number" class="form-control">
                                                    @error('slot_number')
                                                        <span class="text-danger"><small>{{ $message }}</small></span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row mt-1">
                                                <div class="col-md-6">
                                                    <label for="slot_price"><small class="text-dark">Price Per
                                                            Hour{!! required_mark() !!}</small></label>
                                                    <input value="{{ old('slot_price') }}" type="number"
                                                        name="slot_price" id="slot_price" class="form-control">
                                                    @error('slot_price')
                                                        <span class="text-danger"><small>{{ $message }}</small></span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="slot_status"><small>Status
                                                            {!! required_mark() !!}</small></label>
                                                    <select class="form-control" name="slot_status" id="slot_status">
                                                        <option {{ old('slot_status') == 1 ? 'selected' : '' }}
                                                            value="1">
                                                            Active
                                                        </option>
                                                        <option {{ old('slot_status') == 2 ? 'selected' : '' }}
                                                            value="2">
                                                            Inactive
                                                        </option>
                                                    </select>
                                                    @error('slot_status')
                                                        <span class="text-danger">
                                                            <small>{{ $message }}</small>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <hr class="my-2">
                                            <div class="row">
                                                <div class="col-md-6"> <input id="slot_submitbtn"
                                                        class="btn btn-primary w-100" onclick="slotEnroll()"
                                                        type="button" value="Submit">
                                                </div>
                                                <div class="col-md-6 mt-md-0 mt-1"><input class="btn btn-danger w-100"
                                                        type="button" form="slot_enrollment_form" id="slot_resetbtn"
                                                        value="Reset">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-active">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>No</th>
                                        <th>Price / Hour</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="slots_table_body" class="max-height-300">
                                    @php
                                        $index = 1;
                                    @endphp
                                    @forelse ($slots as $slot)
                                        <tr>
                                            <td>{{ $index }}</td>
                                            <td class="text-avoid-line-break">{{ $slot->name }}</td>
                                            <td>{{ $slot->no }}</td>
                                            <td>{{ format_currency($slot->charge_per_hour) }}</td>
                                            <td><span
                                                    class="badge badge-{{ (new App\Models\Colors())->getColor($slot->status) }}">{{ App\Models\ParkingSlots::$status[$slot->status] }}</span>
                                            </td>
                                            <td><i title="Edit" onclick="doEditSlot({{ $slot->id }})"
                                                    class="la la-edit mr-1 text-warning"></i><i title="Delete"
                                                    onclick="doDeleteSlot({{ $slot->id }})"
                                                    class="la la-trash ml-1 text-danger"></td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="text-center text-danger" colspan="6"><small>No Records Found</small></td>
                                        </tr>
                                        @php
                                            $index++;
                                        @endphp
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
