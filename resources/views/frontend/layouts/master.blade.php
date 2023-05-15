<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>@yield('title') - {{ konfigurasi()->nama_aplikasi }}</title>
    <link rel="icon" href="{{ asset('images/' . konfigurasi()->favicon) }}">

    @include('frontend.layouts.css')
    @stack('style')
</head>

<body>
    <div id="wrapper">
        @include('frontend.layouts.header')
        @yield('content')
        @include('frontend.layouts.footer')
    </div>

    @include('frontend.layouts.js')
    @stack('script')
</body>

</html>
