<!-- Start header Area -->
<header class="navbar-area nav-style-two">
    <!-- menu for mobile device -->
    <div class="mobile-nav">
        <a href="#" class="logo">
            <img src="{{ asset('images') }}/logo_aptika_white.png" width="100px" alt="logo_light" />
            <img src="{{ asset('images') }}/logo_aptika_black.png" width="100px" alt="logo-dark" />
        </a>
    </div>

    <!-- Menu for desktop device-->
    <div class="main-nav">
        <nav class="navbar navbar-expand-md navbar-light">
            <div class="container">
                <a class="navbar-brand" href="index-2.html">
                    <img src="{{ asset('images') }}/logo_aptika_white.png" width="150px" alt="logo_light" />
                    <img src="{{ asset('images') }}/logo_aptika_black.png" width="150px" alt="logo-dark" />
                </a>
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a href="{{ url('/') }}" class="nav-link {{ setActive_frontend('/') }}">Beranda</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('/tentang') }}"
                                class="nav-link {{ setActive_frontend('tentang') }}">Tentang</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('/informasi') }}"
                                class="nav-link {{ setActive_frontend('informasi') }}">Informasi</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('/portofolio') }}"
                                class="nav-link {{ setActive_frontend('portofolio') }}">Portofolio</a>
                        </li>

                        {{-- <li class="nav-item">
                            <a href="#" class="nav-link dropdown-toggle">Galeri</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="{{ url('galeri/foto') }}"
                                        class="nav-link {{ setActive_frontend('galeri/foto') }}"> Foto </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('galeri/video') }}"
                                        class="nav-link {{ setActive_frontend('galeri/video') }}"> Video </a>
                                </li>

                            </ul>
                        </li> --}}

                        <li class="nav-item">
                            <a href="#" class="nav-link dropdown-toggle">Layanan</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="{{ url('layanan/pembuatan-aplikasi') }}"
                                        class="nav-link {{ setActive_frontend('layanan/pembuatan-aplikasi') }}">
                                        Pembuatan
                                        Aplikasi </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('layanan/pembaruan') }}"
                                        class="nav-link {{ setActive_frontend('layanan/pembaruan') }}"> Pembaruan
                                        Aplikasi </a>
                                </li>

                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('/team') }}" class="nav-link {{ setActive_frontend('team') }}">Team</a>
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
