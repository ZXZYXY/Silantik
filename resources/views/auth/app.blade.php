<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>@yield('title') - {{ konfigurasi()->nama_aplikasi }}</title>
    <!--favicon-->
    <link rel="icon" href="{{ asset('images/' . konfigurasi()->favicon) }}">

    <!-- loader-->
    <link href="{{ asset('theme') }}/assets/css/pace.min.css" rel="stylesheet" />
    <script src="{{ asset('theme') }}/assets/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('theme') }}/assets/css/bootstrap.min.css" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&family=Roboto&display=swap" />
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{ asset('theme') }}/assets/css/icons.css" />
    <!-- App CSS -->
    <link rel="stylesheet" href="{{ asset('theme') }}/assets/css/app.css" />
    @stack('style')
</head>

<body class="bg-login">
    @yield('content')

    <!--plugins-->
    <script src="{{ asset('theme') }}/assets/js/jquery.min.js"></script>
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
    <!--Password show & hide js -->
    <script>
        $(document).ready(function() {
            $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("bx-hide");
                    $('#show_hide_password i').removeClass("bx-show");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("bx-hide");
                    $('#show_hide_password i').addClass("bx-show");
                }
            });
        });
    </script>

    @stack('script')
</body>

</html>
