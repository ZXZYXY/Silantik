<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Author: HiBootstrap Theme, Category: IT, Multipurpose, HTML, SASS" />

    <!-- title -->
    <title>@yield('title') - {{ konfigurasi()->nama_aplikasi }}</title>
    @include('frontend.layouts.css')
    @stack('style')

</head>

<body>
    <!-- start Preloader section-->
    {{-- <div class="preloader-main">
        <div class="loader">
            <div class="loader-dot"></div>
            <div class="loader-dot"></div>
            <div class="loader-dot"></div>
        </div>
    </div> --}}
    <!--end preloader section -->

    @include('frontend.layouts.header')
    @yield('content')

    @include('frontend.layouts.footer')

    @include('frontend.layouts.js')
    @stack('script')
</body>

</html>
