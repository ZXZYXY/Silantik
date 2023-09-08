<!-- HEADER -->
<div class="header header-1">

    <!-- TOPBAR -->
    <div class="topbar d-none d-md-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-4 col-md-2 col-lg-4">
                    <p class="mb-0"><em>Awesome Template for Business Multipurpose</em></p>
                </div>
                <div class="col-sm-8 col-md-10 col-lg-8">
                    <div class="info pull-right">
                        <div class="info-item">
                            <i class="fa fa-envelope-o"></i> Mail : support@coxe.com
                        </div>
                        <div class="info-item">
                            <i class="fa fa-phone"></i> Call Us : +62 7100 1234
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- NAVBAR SECTION -->
    <div class="navbar-main">
        <div class="container">
            <nav id="navbar-main" class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="index.html">
                    <img src="images/logo.png" alt="" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                    aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a href="{{ url('/') }}" class="nav-link {{ setActive_frontend('/') }}">BERANDA</a>
                        </li>
                        <li
                            class="nav-item {{ setActive_frontend('layanan/pembuatan-aplikasi') || setActive_frontend('layanan/pembaruan-aplikasi') }} dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                LAYANAN
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ url('layanan/pembuatan-aplikasi') }}">PEMBUATAN
                                    APLIKASI</a>
                                <a class="dropdown-item" href="{{ url('layanan/pembaruan-aplikasi') }}">PEMBAHARUAN
                                    APLIKASI</a>
                            </div>
                        </li>


                        <li class="nav-item {{ setActive_frontend('tentang') }}">
                            <a href="{{ url('/tentang') }}" class="nav-link ">TENTANG</a>
                        </li>
                        <li class="nav-item {{ setActive_frontend('informasi') }}">
                            <a href="{{ url('/informasi') }}" class="nav-link ">INFORMASI</a>
                        </li>
                        <li class="nav-item {{ setActive_frontend('portofolio') }}">
                            <a href="{{ url('/portofolio') }}" class="nav-link ">PORTOFOLIO</a>
                        </li>
                        <li class="nav-item {{ setActive_frontend('/login') }}">
                            <a href="{{ url('/login') }}" class="nav-link ">LOGIN</a>
                        </li>
                    </ul>
                </div>
            </nav> <!-- -->
        </div>
    </div>

</div>
