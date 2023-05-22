<!-- Start header Area -->
<header class="navbar-area nav-style-two">
    <!-- menu for mobile device -->
    <div class="mobile-nav">
        <a href="#" class="logo">
            <img src="assets/img/logos/logo_full_light.png" alt="logo_light" />
            <img src="assets/img/logos/logo_dark.png" alt="logo-dark" />
        </a>
    </div>

    <!-- Menu for desktop device-->
    <div class="main-nav">
        <nav class="navbar navbar-expand-md navbar-light">
            <div class="container">
                <a class="navbar-brand" href="index-2.html">
                    <img src="assets/img/logos/logo_full_light.png" alt="logo_light" />
                    <img src="assets/img/logos/logo_dark.png" alt="logo-dark" />
                </a>
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a href="{{ url('/') }}" class="nav-link active">Beranda</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('/kegiatan') }}" class="nav-link">Kegiatan</a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link dropdown-toggle">Galeri</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="{{ url('galeri/foto') }}" class="nav-link"> Foto </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('galeri/foto') }}" class="nav-link"> Video </a>
                                </li>

                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('/faq') }}" class="nav-link">FAQ</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('/team') }}" class="nav-link">Team</a>
                        </li>

                    </ul>

                    <div class="cta-btn">
                        <a href="{{ url('/login') }}" class="btn btn-outline">
                            <i class="envy envy-user"></i>
                            log in
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>
<!-- end header area -->
