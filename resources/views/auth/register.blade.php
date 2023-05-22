@extends('frontend.layouts.master')
@section('title')
    Daftar
@endsection
@section('content')
    <!-- start page title area-->
    <div class="page-title-area bg-thin">
        <div class="container">
            <div class="page-title-content">
                <h1>Daftar</h1>
                <ul>
                    <li class="item"><a href="index.html">Home</a></li>
                    <li class="item"><a href="sign-in.html">Daftar</a></li>
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
                    <h2>Daftar</h2>

                </div>

                <!-- signin Form -->
                <form class="signin-form" method="POST" action="{{ url('daftar/store') }}">
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
                                <input type="text" class="form-control" name="name" placeholder="Nama Lengkap"
                                    required="required" />
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="text" class="form-control" id="username" name="username"
                                    placeholder="Username" required="required" />
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="Email"
                                    required="required" />
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <select name="opd_id" id="opd_id" class="form-control">
                                    <option value="">Pilih</option>
                                    @foreach ($opd as $o)
                                        <option value="{{ $o->id }}">{{ $o->nama_opd }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="Password"
                                    required="required" />
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="password" class="form-control" name="password_confirmation"
                                    placeholder="Konfirmasi Password" required="required" />
                            </div>
                        </div>
                        <div class="form-group captcha">
                            <span>{!! captcha_img('flat') !!}</span>&nbsp;&nbsp;&nbsp;<button type="button" class="reload"
                                id="reload">&nbsp;&nbsp;&nbsp;<i
                                    class="fa fa-undo"></i>&nbsp;&nbsp;&nbsp;</button><br><br>
                            <label>Masukan Kode Captcha diatas <i class="text-danger">*</i></label>
                            <input type="text" name="captcha" class="form-control">
                            @if ($errors->has('captcha'))
                                <span class="text-danger">{{ $errors->first('captcha') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="cta-btn">
                        <button type="submit" class="btn btn-solid">Daftar</button>
                    </div>

                    <div class="form-group col-lg-12">
                        <div class="users">Sudah Punya akun?? <a href="{{ route('login') }}">Login Disini</a></div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- end signin section -->


@endsection
@push('script')
    <script>
        $(document).ready(function() {
            $("#username").on({
                keydown: function(e) {
                    if (e.which === 32)
                        return false;
                },
                keyup: function() {
                    this.value = this.value.toLowerCase();
                },
                change: function() {
                    this.value = this.value.replace(/\s/g, "");

                }
            });
            $('#konfirmasi_password').on('keyup', function() {
                if ($('#password').val() == $('#konfirmasi_password').val()) {
                    $('#message').html('Password cocok').css('color', 'green');
                } else
                    $('#message').html('Password tidak cocok').css('color', 'red');
            });

            $('#reload').click(function() {
                $.ajax({
                    type: 'GET',
                    url: '/reload-captcha',
                    success: function(data) {
                        $(".captcha span").html(data.captcha);
                    }
                });
            });
        });
    </script>
@endpush
