<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>@yield('title')</title>
    @include('layouts.partials.css')
    @stack('style')
</head>

<body>
    <!-- wrapper -->
    <div class="wrapper">
        <!--sidebar-wrapper-->
        <div class="sidebar-wrapper" data-simplebar="true">
            <div class="sidebar-header">
                <div class="">
                    <img src="{{ asset('images/' . konfigurasi()->logo_kecil) }}" class="logo-icon-2" alt="" />
                </div>
                <div>
                    <h4 class="logo-text">APTIKA</h4>
                </div>
                <a href="javascript:;" class="toggle-btn ms-auto"> <i class="bx bx-menu"></i>
                </a>
            </div>
            @include('layouts.partials.sidebar')
        </div>
        <!--end sidebar-wrapper-->
        @include('layouts.partials.header')
        <!--page-wrapper-->
        <div class="page-wrapper">
            @yield('content')
        </div>
        <!--end page-wrapper-->
        <!--start overlay-->
        <div class="overlay toggle-btn-mobile"></div>
        <!--end overlay-->
        <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i
                class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->
        @include('layouts.partials.footer')
    </div>
    <!-- end wrapper -->

    @include('layouts.partials.js')
    @stack('script')
</body>

</html>
