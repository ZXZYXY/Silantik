<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-{{ konfigurasi()->mode }}-{{ konfigurasi()->sidebar_color }} elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link bg-{{ konfigurasi()->brandlogo_color }}">
        <img src="{{ asset('images/' . konfigurasi()->logo_kecil) }}" alt="Logo" class="brand-image">
        <span class="brand-text
            font-weight-light">{{ konfigurasi()->nama_aplikasi }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">

            <div class="image">
                <a href="{{ url('profil') }}">
                    <img src="{{ auth()->user()->getAvatarProfil() }}" class="img-circle elevation-2" alt="User Image"
                        style="object-fit: cover; position: relative; width:40px !important;height:40px !important;">
                </a>
            </div>
            <div class="info">
                <a href="{{ url('profil') }}" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-header">MENU</li>
                @can('dashboard-index')
                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link {{ setActive('home') }}">
                            <i class="nav-icon fas fa-home"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                @endcan
                @can('user-list')
                    <li class="nav-item">
                        <a href="{{ route('users.index') }}" class="nav-link {{ setActive('users') }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Users</p>
                        </a>
                    </li>
                @endcan

                <li class="nav-item {{ openMenu('setting') }}">
                    @if (auth()->user()->can('role-list') ||
                            auth()->user()->can('permission-list') ||
                            auth()->user()->can('konfigurasiweb-list'))
                        <a href="#"
                            class="nav-link {{ setActive('setting/roles') . setActive('setting/permission') . setActive('setting/konfigurasi-web') }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Setting <i class="right fas fa-angle-left"></i></p>
                        </a>
                    @endif
                    <ul class="nav nav-treeview">
                        @can('role-list')
                            <li class="nav-item">
                                <a href="{{ route('roles.index') }}" class="nav-link {{ setActive('setting/roles') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Role</p>
                                </a>
                            </li>
                        @endcan
                        @can('permission-list')
                            <li class="nav-item">
                                <a href="{{ route('permission.index') }}"
                                    class="nav-link {{ setActive('setting/permission') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Permission</p>
                                </a>
                            </li>
                        @endcan
                        @can('konfigurasiweb-list')
                            <li class="nav-item">
                                <a href="{{ url('setting/konfigurasi-web') }}"
                                    class="nav-link {{ setActive('setting/konfigurasi-web') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Konfigurasi Web</p>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
