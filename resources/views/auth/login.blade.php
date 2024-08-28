@extends('frontend.layouts.master')
@section('title')
    Login
@endsection
@section('content')
    <!-- Start User Login ============================================= -->
    <div class="bg-logins">
        <div class="login-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="login-items">
                            <div class="login-box">
                                <div class="login-content">
                                    <div class="col-md-6 info">
                                        <img src="{{ asset('images') }}/logo_diskominfo_warna.png" width="100px;" margin="auto;" alt="Login">
                                        <h2>
                                            SELAMAT DATANG DI <span class="highlight">SI</span>LAN<span class="highlight">TIK</span>
                                        </h2>

                                    </div>
                                    <div class="col-md-6 content">
                                        <h4>Login</h4>
                                        <form action="{{ route('login') }}" method="POST">
                                            @csrf
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul style="margin-bottom:0px;list-style-type: none;margin:0px;padding:0px;">
                                                        @foreach ($errors->all() as $error)
                                                            <li><i class="fa fa-exclamation"></i> {{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                            <div class="col-lg-12 col-md-12">
                                                <div class="row">
                                                    <div class="form-group">
                                                        <input class="form-control @error('login') is-invalid @enderror"
                                                            placeholder="Username or Email" name="login" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                <div class="row">
                                                    <div class="form-group">
                                                        <input class="form-control @error('password') is-invalid @enderror"
                                                            placeholder="Password" name="password" type="password">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                <div class="row">
                                                    <button type="submit">
                                                        Login
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="sign-up">
                                            @if (Route::has('password.request'))
                                                <p class="forgot-password"><a href="{{ route('password.request') }}">Lupa
                                                        Password?</a>
                                                </p>
                                            @endif
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
    <!-- End User Login -->

@endsection
