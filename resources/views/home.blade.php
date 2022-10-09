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
                    <div class="col-xl-3 col-lg-6 col-12">
                        <div class="card pull-up">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="media-body text-left">
                                            <h3 class="info">{{ $elections }}</h3>
                                            <h6>Ongoing Elections</h6>
                                        </div>
                                        <div>
                                            <i class="la la-connectdevelop info font-large-2 float-right"></i>
                                        </div>
                                    </div>
                                    <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                        <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: 100%"
                                            aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12">
                        <div class="card pull-up">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="media-body text-left">
                                            <h3 class="warning">{{ $nominators }}</h3>
                                            <h6>Nominators</h6>
                                        </div>
                                        <div>
                                            <i class="la la-newspaper-o warning font-large-2 float-right"></i>
                                        </div>
                                    </div>
                                    <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                        <div class="progress-bar bg-gradient-x-warning" role="progressbar"
                                            style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12">
                        <div class="card pull-up">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="media-body text-left">
                                            <h3 class="success">{{ $voters }}</h3>
                                            <h6>Voters</h6>
                                        </div>
                                        <div>
                                            <i class="la la-user success font-large-2 float-right"></i>
                                        </div>
                                    </div>
                                    <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                        <div class="progress-bar bg-gradient-x-success" role="progressbar"
                                            style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12">
                        <div class="card pull-up">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="media-body text-left">
                                            <h3 class="danger">{{ $complains }}</h3>
                                            <h6>Complains</h6>
                                        </div>
                                        <div>
                                            <i class="la la-bookmark danger font-large-2 float-right"></i>
                                        </div>
                                    </div>
                                    <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                        <div class="progress-bar bg-gradient-x-danger" role="progressbar"
                                            style="width: 100%" aria-valuenow="100100" aria-valuemin="0"
                                            aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                @if ($elections > 0)
                    <div class="row">
                        @if (doPermitted('//complain/submit'))
                            <div class="col-md-6">
                            @else
                                <div class="col-md-12">
                        @endif

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Ongoing Election Summery</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body pt-0">
                                    <div class="row mb-1">
                                        <div class="col-md-12">
                                            <hr>
                                            @if ($elections == 0)
                                                <h5 class="card-title text-danger">No ongoing election found</h5>
                                            @else
                                                <h5 class="card-title">Time Left</h5>
                                                <h1 style="font-size: 50px;" class="text-success" id="countdown">Loading
                                                </h1>
                                            @endif
                                            <br>
                                            <button id="end_election" class="btn btn-warning">End Election</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if (doPermitted('//complain/submit'))
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Complains</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body pt-0">
                                        <div class="row mb-1">
                                            <div class="col-md-12">
                                                <label for="">Submit Your Complain</label>
                                                <textarea class="form-control" name="complain" id="complain" cols="30" rows="10"></textarea>
                                                <button id="complainBtn"
                                                    class="btn btn-primary w-100 mt-4">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
            </div>
            @endif

        </div>
    </div>
    </div>

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    @include('layouts.footer')

    @include('layouts.scripts')

    <script>
        $('#end_election').click(function(e) {
            e.preventDefault();
            $.ajax({
                type: "GET",
                url: "{{ route('admin.election.end') }}",
                data: {
                    'election': {{ $electionData != null ? $electionData->id : null }}
                },
                success: function(response) {
                    location.reload();
                }
            });
        });

        $('#complainBtn').click(function(e) {
            e.preventDefault();
            if ($('#complain').val()) {
                $.ajax({
                    type: "GET",
                    url: "{{ route('admin.complain.submit') }}",
                    data: {
                        'complain': $('#complain').val(),
                        'election': {{ $electionData != null ? $electionData->id : null }}
                    },
                    success: function(response) {
                        $('#complain').val('');
                    }
                });
            } else {
                $.dialog({
                    title: 'Alert !',
                    content: 'Please enter your message to inform',
                });
            }

        });

        var informed = false;
        var informed2 = false;
        var countDownDate = new Date('{{ $electionEndtime }}').getTime();
        var x = setInterval(function() {
            var now = new Date().getTime();
            var distance = countDownDate - now;
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);


            if (informed == false && days == 0 && hours == 0 && minutes < 10) {
                $('#countdown').removeClass('text-success').addClass('text-danger');
                $.dialog({
                    title: 'Alert !',
                    content: 'Only lower than 10 minutes left for end the election. Please be alert',
                });
                informed = true;
            }

            if (informed2 == false && days == 0 && hours == 0 && minutes == 0 && seconds == 0) {
                $('#countdown').removeClass('text-success').addClass('text-danger');
                $.dialog({
                    title: 'Alert !',
                    content: 'Election has been over, Please close the voting process',
                });
                informed2 = true;
            }

            document.getElementById("countdown").innerHTML = days + "d " + hours + "h " +
                minutes + "m " + seconds + "s ";
            if (distance < 0) {
                clearInterval(x);
                $('#countdown').removeClass('text-success').addClass('text-danger');
                document.getElementById("countdown").innerHTML = "EXPIRED";
            }
        }, 1000);
    </script>
@endsection
