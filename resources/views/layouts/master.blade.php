<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    @include('layouts.partials.css')
    @stack('style')
</head>

<body class="hold-transition sidebar-mini text-sm layout-fixed layout-footer-fixed layout-navbar-fixed">
    <div class="wrapper">
        @include('layouts.partials.header')
        @include('layouts.partials.sidebar')
        @yield('content')
        @include('layouts.partials.footer')
    </div>

    <!-- REQUIRED SCRIPTS -->
    @include('layouts.partials.js')
    @stack('script')
</body>

</html>
