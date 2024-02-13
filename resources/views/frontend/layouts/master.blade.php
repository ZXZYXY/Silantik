<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Boxass - Startup Landing Page Template">

    <!-- ========== Page Title ========== -->
    <title>@yield('title') - SILANTIK</title>

    <!-- ========== Favicon Icon ========== -->
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">

    <!-- ========== Start Stylesheet ========== -->
    @include('frontend.layouts.css')
    @stack('style')
    <!-- ========== End Stylesheet ========== -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5/html5shiv.min.js"></script>
      <script src="assets/js/html5/respond.min.js"></script>
    <![endif]-->

    <!-- ========== Google Fonts ========== -->
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,800" rel="stylesheet">

</head>

<body>

    <!-- Preloader Start -->
    <div class="se-pre-con"></div>
    <!-- Preloader Ends -->

    @include('frontend.layouts.header')

    @yield('content')

    @include('frontend.layouts.footer')

    <!-- jQuery Frameworks
    ============================================= -->
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
