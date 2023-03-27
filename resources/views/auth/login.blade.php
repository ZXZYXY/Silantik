@extends('auth.app')
@section('title')
    Login
@endsection
@section('content')
    <!-- wrapper -->
    <div class="wrapper">
        <div class="section-authentication-login d-flex align-items-center justify-content-center mt-4">
            <div class="row">
                <div class="col-12 col-lg-8 mx-auto">
                    <div class="card radius-15 overflow-hidden">
                        <div class="row g-0">
                            <div class="col-xl-6">
                                <div class="card-body p-5">
                                    <div class="text-center">
                                        <img src="{{ asset('theme') }}/assets/images/logo-icon.png" width="80"
                                            alt="">
                                        <h3 class="mt-4 font-weight-bold">Layanan TIK</h3>
                                    </div>
                                    <div class="">


                                        <div class="form-body">
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul
                                                        style="margin-bottom:0px;list-style-type: none;margin:0px;padding:0px;">
                                                        @foreach ($errors->all() as $error)
                                                            <li><i class="fa fa-exclamation"></i> {{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                            <form class="row g-3" action="{{ route('login') }}" method="POST">
                                                @csrf
                                                <div class="col-12">
                                                    <label for="inputEmailAddress" class="form-label">Email Address</label>
                                                    <input type="email" name="email"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        id="email" placeholder="john@doe.com">
                                                </div>
                                                <div class="col-12">
                                                    <label for="inputChoosePassword" class="form-label">Enter
                                                        Password</label>
                                                    <div class="input-group" id="show_hide_password">
                                                        <input type="password" name="password"
                                                            class="form-control border-end-0 @error('password') is-invalid @enderror"
                                                            id="password" value="" placeholder="Enter Password"> <a
                                                            href="javascript:;" class="input-group-text bg-transparent"><i
                                                                class="bx bx-hide"></i></a>
                                                    </div>
                                                </div>
                                                {{-- <div class="col-md-6">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="flexSwitchCheckChecked" checked="">
                                                        <label class="form-check-label"
                                                            for="flexSwitchCheckChecked">Remember Me</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 text-end">
                                                    @if (Route::has('password.request'))
                                                        <a href="{{ route('password.request') }}">Forgot password?</a>
                                                    @endif

                                                </div> --}}
                                                <div class="col-12">
                                                    <div class="d-grid">
                                                        <button type="submit" class="btn btn-primary"><i
                                                                class="bx bxs-lock-open"></i>Sign in</button>
                                                    </div>
                                                </div>
                                                {{-- <div class="col-12 text-center">
                                                    <p>Don't have an account yet? <a href="authentication-signup.html">Sign
                                                            up here</a></p>
                                                </div> --}}
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 bg-login-color d-flex align-items-center justify-content-center">
                                <img src="{{ asset('theme') }}/assets/images/login-images/login-frent-img.jpg"
                                    class="img-fluid" alt="...">
                            </div>
                        </div>
                        <!--end row-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end wrapper -->


@endsection
