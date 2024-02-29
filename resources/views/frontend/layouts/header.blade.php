<!-- Header
    ============================================= -->
<header id="home">

    <!-- Start Navigation -->
    <nav class="navbar navbar-default navbar-fixed dark no-background bootsnav">

        <div class="container">

            <!-- Start Atribute Navigation -->
            <div class="attr-nav button">
                <ul>
                    <li>
                        <a href="{{ url('login') }}">LOGIN</a>
                    </li>
                </ul>
            </div>
            <!-- End Atribute Navigation -->

            <!-- Start Header Navigation -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="/">
                    <img src="{{ asset('images') }}/logo_aptika_black.png" width="130px" class="logo logo-display"
                        alt="Logo">
                    <img src="{{ asset('images') }}/logo_aptika_black.png" width="130px" class="logo logo-scrolled"
                        alt="Logo">
                </a>
            </div>
            <!-- End Header Navigation -->

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-menu">
                <ul class="nav navbar-nav navbar-right" data-in="#" data-out="#">
                    <li>
                        <a class="smooth-menu" href="/">Beranda</a>
                    </li>
                    <li class="dropdown dropdown-right">
                        <a href="#layanan" class="dropdown-toggle smooth-menu" data-toggle="dropdown">Layanan</a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ url('layanan/aplikasi') }}">Permohonan Pembuatan Aplikasi</a></li>
                            <li><a href="{{ url('cek-permohonan') }}">Cek Permohonan</a></li>

                        </ul>
                    </li>

                    <li>
                        <a class="smooth-menu" href="{{ url('tentang') }}">Tentang</a>
                    </li>
                    <li>
                        <a class="smooth-menu" href="{{ url('informasi') }}">Informasi</a>
                    </li>
                    <li>
                        <a class="smooth-menu" href="{{ url('tanya-jawab') }}">FAQ</a>
                    </li>

                </ul>
            </div><!-- /.navbar-collapse -->
        </div>

    </nav>
    <!-- End Navigation -->

</header>
<!-- End Header -->
