@extends('frontend.layouts.master')
@section('title')
    Reset Password
@endsection
@section('content')
    <!-- start page title area-->
    <div class="page-title-area bg-thin">
        <div class="container">
            <div class="page-title-content">
                <h1>Reset Password</h1>
                <ul>
                    <li class="item"><a href="/">Beranda</a></li>
                    <li class="item"><a href="{{ url('login') }}">Reset Password</a></li>
                </ul>
            </div>
        </div>
        <div class="shape">
            <span class="shape1"></span>
            <span class="shape2"></span>
            <span class="shape3"></span>
            <span class="shape4"></span>
        </div>
    </div>
    <!-- end page title area -->

    <!-- signin Section -->
    <section class="signinup-section ptb-100 bg-thin">
        <div class="container">

            <div class="signin-box">

                <!-- Title Box -->
                <div class="title-box">
                    <h2>Reset Password</h2>

                </div>
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password-confirm"
                            class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Reset Password') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- end signin section -->
@endsection
