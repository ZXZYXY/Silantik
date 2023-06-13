<!--navigation-->

<ul class="metismenu" id="menu">
    <li class="menu-label">{{ TanggalID(now()) }}</li>
    @can('dashboard-index')
        <li {{ setActive('home') }}>
            <a href="{{ route('home') }}">
                <div class="parent-icon icon-color-2"><i class="bx bx-home-alt"></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
    @endcan

    @can('daftaraplikasi-list')
        <li class="{{ setActive('daftaraplikasi') }}">
            <a href="{{ route('daftaraplikasi.index') }}">
                <div class="parent-icon icon-color-4"><i class="bx bx-archive"></i>
                </div>
                <div class="menu-title">Daftar Aplikasi</div>
            </a>
        </li>
    @endcan

    <li class="{{ openMenu('permohonan') }}">
        @if (auth()->user()->can('permohonan-list'))
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon icon-color-10"><i class="bx bx-comment-edit"></i>
                </div>
                <div class="menu-title">Permohonan</div>
            </a>
        @endif
        <ul>
            @can('permohonan-list')
                <li class="{{ setActive('permohonan/pembuatan') }}">
                    <a href="{{ url('permohonan/pembuatan') }}"><i class="bx bx-right-arrow-alt"></i>Pembuatan Aplikasi</a>
                </li>
            @endcan

            @can('permohonan-list')
                <li class="{{ setActive('permohonan/pembaharuan') }}">
                    <a href="{{ url('permohonan/pembaharuan') }}"><i class="bx bx-right-arrow-alt"></i>Pembaharuan
                        Aplikasi</a>
                </li>
            @endcan
            @can('permohonan-list')
                <li class="{{ setActive('permohonan/permintaan_domain') }}">
                    <a href="{{ url('permohonan/permintaan_domain') }}"><i class="bx bx-right-arrow-alt"></i>Permintaan
                        Domain</a>
                </li>
            @endcan
        </ul>
    </li>

    <li class="{{ openMenu('pengaduan') }}">
        @if (auth()->user()->can('pengaduan-list'))
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon icon-color-11"><i class="bx bx-help-circle"></i>
                </div>
                <div class="menu-title">Pengaduan</div>
            </a>
        @endif
        <ul>
            @can('pengaduan-list')
                <li class="{{ setActive('pengaduan/aplikasi') }}">
                    <a href="{{ url('pengaduan/aplikasi') }}"><i class="bx bx-right-arrow-alt"></i>Aplikasi</a>
                </li>
            @endcan

            @can('pengaduan-list')
                <li class="{{ setActive('pengaduan/jaringan') }}">
                    <a href="{{ url('pengaduan/jaringan') }}"><i class="bx bx-right-arrow-alt"></i>Jaringan</a>
                </li>
            @endcan
        </ul>
    </li>

    @can('team-list')
        <li class="{{ setActive('team') }}">
            <a href="{{ route('team.index') }}">
                <div class="parent-icon icon-color-1"><i class="bx bx-group"></i>
                </div>
                <div class="menu-title">Team APTIKA</div>
            </a>
        </li>
    @endcan

    @can('user-list')
        <li class="{{ setActive('users') }}">
            <a href="{{ route('users.index') }}">
                <div class="parent-icon icon-color-3"><i class="bx bx-group"></i>
                </div>
                <div class="menu-title">Users</div>
            </a>
        </li>
    @endcan

    @can('berita-list')
        <li class="{{ setActive('berita') }}">
            <a href="{{ route('berita.index') }}">
                <div class="parent-icon icon-color-5"><i class="bx bx-conversation"></i>
                </div>
                <div class="menu-title">Berita</div>
            </a>
        </li>
    @endcan

    @can('faq-list')
        <li class="{{ setActive('faq') }}">
            <a href="{{ url('faq') }}">
                <div class="parent-icon icon-color-9"><i class="bx bx-help-circle"></i>
                </div>
                <div class="menu-title">FAQ</div>
            </a>
        </li>
    @endcan

    <li class="{{ openMenu('data-master') }}">
        @if (auth()->user()->can('opd-list'))
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon icon-color-8"><i class="bx bx-folder"></i>
                </div>
                <div class="menu-title">Master Data</div>
            </a>
        @endif
        <ul>
            @can('opd-list')
                <li class="{{ setActive('data-master/opd') }}">
                    <a href="{{ route('opd.index') }}"><i class="bx bx-right-arrow-alt"></i>OPD</a>
                </li>
            @endcan

            @can('jenisaplikasi-list')
                <li class="{{ setActive('data-master/jenisaplikasi') }}">
                    <a href="{{ route('jenisaplikasi.index') }}"><i class="bx bx-right-arrow-alt"></i>Jenis Aplikasi</a>
                </li>
            @endcan

            @can('kategori-list')
                <li class="{{ setActive('data-master/kategori') }}">
                    <a href="{{ route('kategori.index') }}"><i class="bx bx-right-arrow-alt"></i>Kategori</a>
                </li>
            @endcan

            @can('sektor-list')
                <li class="{{ setActive('data-master/sektor') }}">
                    <a href="{{ route('sektor.index') }}"><i class="bx bx-right-arrow-alt"></i>Sektor</a>
                </li>
            @endcan

            @can('jabatan-list')
                <li class="{{ setActive('data-master/jabatan') }}">
                    <a href="{{ route('jabatan.index') }}"><i class="bx bx-right-arrow-alt"></i>Jabatan</a>
                </li>
            @endcan

            @can('statuspermohonan-list')
                <li class="{{ setActive('data-master/statuspermohonan') }}">
                    <a href="{{ route('statuspermohonan.index') }}"><i class="bx bx-right-arrow-alt"></i>Status
                        Permohonan</a>
                </li>
            @endcan

        </ul>
    </li>

    <li class="{{ openMenu('setting') }}">
        @if (auth()->user()->can('role-list') ||
                auth()->user()->can('permission-list') ||
                auth()->user()->can('konfigurasiweb-list'))
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon icon-color-10"><i class="bx bx-cog"></i>
                </div>
                <div class="menu-title">Setting</div>
            </a>
        @endif
        <ul>
            @can('role-list')
                <li class="{{ setActive('setting/roles') }}">
                    <a href="{{ route('roles.index') }}"><i class="bx bx-right-arrow-alt"></i>Role</a>
                </li>
            @endcan

            @can('permission-list')
                <li class="{{ setActive('setting/permission') }}">
                    <a href="{{ route('permission.index') }}"><i class="bx bx-right-arrow-alt"></i>Permission</a>
                </li>
            @endcan

            @can('konfigurasiweb-list')
                <li class="{{ setActive('setting/konfigurasi-web') }}">
                    <a href="{{ url('setting/konfigurasi-web') }}"><i class="bx bx-right-arrow-alt"></i>Konfigurasi Web</a>
                </li>
            @endcan

        </ul>
    </li>

</ul>
<!--end navigation-->
