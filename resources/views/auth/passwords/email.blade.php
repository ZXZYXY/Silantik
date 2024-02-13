@extends('frontend.layouts.master')
@section('title')
    Reset Password
@endsection
@section('content')
    <div class="login-area bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="login-items">
                        <div class="login-box">
                            <div class="login-content">
                                <div class="col-md-6 info">
                                    <img src="{{ asset('frontend') }}/img/logo.png" alt="Login">
                                    <h2>Welcome!</h2>
                                    <p>
                                        Position greatest so desirous. So wound stood guest weeks no terms up ought. By so
                                        these am so rapid blush songs begin. Nor but mean time one over.
                                    </p>
                                </div>
                                <div class="col-md-6 content">
                                    <h4>Reset Password</h4>
                                    @if (session('status'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                    <form action="{{ route('password.email') }}" method="POST">
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
                                                    <input class="form-control @error('email') is-invalid @enderror"
                                                        placeholder="Email" name="email" value="{{ old('email') }}"
                                                        type="text">

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12">
                                            <div class="row">
                                                <button type="submit">
                                                    {{ __('Kirim Link Reset Password') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
