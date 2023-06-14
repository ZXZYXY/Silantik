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
            <button class="btn btn-primary btn-sm mb-3" onclick="window.history.back();"><i class="fa fa-reply"></i>
                Kembali</button>
            <div class="signin-box">

                <!-- Title Box -->
                <div class="title-box">
                    <h2>Reset Password</h2>

                </div>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="text" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" placeholder="Email Address"
                                    required="required" autocomplete="email" autofocus />
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">
                                {{ __('Kirim Link Reset Password') }}
                            </button>
                        </div>
                    </div>


                </form>
            </div>
        </div>
    </section>
    <!-- end signin section -->
@endsection
