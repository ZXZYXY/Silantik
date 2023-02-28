<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    @include('layouts.partials.css')
    @stack('style')
</head>

<body class="hold-transition login-page">
    @yield('content')
    @include('layouts.partials.js')
    @stack('script')
</body>

</html>
