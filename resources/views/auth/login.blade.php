@extends('frontend.layouts.master')
@section('title')
    Login
@endsection
@section('content')
    <!-- start page title area-->
    <div class="page-title-area bg-thin">
        <div class="container">
            <div class="page-title-content">
                <h1>sign in</h1>
                <ul>
                    <li class="item"><a href="index.html">Home</a></li>
                    <li class="item"><a href="sign-in.html">Sign In</a></li>
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
                    <h2>Sign in</h2>

                </div>

                <!-- signin Form -->
                <form class="signin-form" action="{{ route('login') }}" method="POST">
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
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="text" class="form-control @error('login') is-invalid @enderror"
                                    name="login" placeholder="Username or Email" required="required" />
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password" placeholder="Password" required="required" />
                            </div>
                        </div>
                        <div class="col-lg-12 form-check-box">

                            @if (Route::has('password.request'))
                                <p class="forgot-password"><a href="{{ route('password.request') }}">Forgot Password?</a>
                                </p>
                            @endif

                        </div>
                    </div>
                    <div class="cta-btn">
                        <button type="submit" class="btn btn-solid">sign in</button>
                    </div>

                    <div class="form-group col-lg-12">
                        <div class="users">Belum Punya akun?? <a href="{{ url('daftar') }}">Daftar Disini</a></div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- end signin section -->


@endsection
