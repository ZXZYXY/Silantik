<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>

    <!-- Prevent the demo from appearing in search engines -->
    <meta name="robots" content="noindex">
    @include('layouts.partials.css')
    @stack('style')
</head>

<body class="layout-login-centered-boxed">
    @yield('content')

    @include('layouts.partials.js')
    @stack('script')
</body>

</html>
