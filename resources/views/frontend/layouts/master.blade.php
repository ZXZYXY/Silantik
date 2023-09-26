<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Author: HiBootstrap Theme, Category: IT, Multipurpose, HTML, SASS" />

    <!-- title -->
    <title>@yield('title') - {{ konfigurasi()->nama_aplikasi }}</title>
    <link rel="icon" href="{{ asset('images/' . konfigurasi()->favicon) }}">
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
    <script src="{{ asset('theme/sweetalert/sweetalert.min.js') }}"></script>
    <script>
        @if (session()->has('success'))
            swal({
                icon: "success",
                title: "BERHASIL!",
                text: "{{ session('success') }}",
                timer: 1500,
                buttons: false,
            });
        @elseif (session()->has('gagal'))
            swal({
                icon: "error",
                title: "GAGAL!",
                text: "{{ session('gagal') }}",
            });
        @else
        @endif
    </script>
    @stack('script')
</body>

</html>
