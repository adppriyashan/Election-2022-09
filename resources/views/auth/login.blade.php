@extends('layouts.app')

@section('content')

    <body class="hold-transition login-page">

        <div class="bg-light min-vh-100 d-flex flex-row align-items-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <div class="card-group d-block d-md-flex row">
                            <div class="card col-md-7 p-4 mb-0">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="card-body">
                                        <h1>Login</h1>
                                        <p class="text-medium-emphasis">Sign In to your account</p>
                                        <div class="input-group mb-3 mt-5"><span class="input-group-text">
                                                <svg class="icon">
                                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                                                </svg></span>
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        </div>
                                        <div class="input-group mb-4 mt-4"><span class="input-group-text">
                                                <svg class="icon">
                                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-lock-locked">
                                                    </use>
                                                </svg></span>
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror" name="password"
                                                required autocomplete="current-password">
                                        </div>
                                        <div class="row mt-5">
                                            <div class="col-12">
                                                <button class="btn btn-primary px-4 w-100" type="submit">Login</button>
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

        <script src="{{ asset('vendors/@coreui/coreui/js/coreui.bundle.min.js') }}"></script>
        <script src="{{ asset('vendors/simplebar/js/simplebar.min.js') }}"></script>
    </body>
@endsection
