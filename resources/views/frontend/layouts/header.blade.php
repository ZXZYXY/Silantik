<!-- header begin -->
<header>
    <div class="container">
        <div id="logo">
            <div class="inner">
                <a href="{{ url('') }}">
                    <img src="{{ asset('images/' . konfigurasi()->favicon) }}" style="width: 100%;" width="100px"
                        alt="logo"></a>
            </div>
        </div>

        <span class="menu-btn"></span>

        <!-- mainmenu begin -->
        <div class="de_menu">
            <div id="mainmenu" class="mainmenu">
                <li><a href="{{ url('/') }}">Beranda</a></li>

                <li><a href="{{ url('news') }}">Berita</a></li>

                <li><a href="#">Galeri</a>
                    <ul>
                        <li><a href="{{ url('galeri/foto') }}">Foto</a></li>
                        <li><a href="{{ url('galeri/video') }}">Video</a></li>
                    </ul>
                </li>
                <li><a href="{{ url('faq') }}">FAQ</a></li>
                <li><a href="{{ url('/login') }}">Login</a></li>

                </ul>
                <!-- mainmenu close -->

            </div>
        </div>
    </div>
</header>
<!-- header close -->
