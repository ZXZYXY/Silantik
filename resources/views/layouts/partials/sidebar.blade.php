<!--navigation-->
<ul class="metismenu" id="menu">
    <li class="menu-label">Menu</li>
    @can('dashboard-index')
        <li {{ setActive('home') }}>
            <a href="{{ route('home') }}">
                <div class="parent-icon icon-color-2"><i class="bx bx-home-alt"></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
    @endcan

    @can('user-list')
        <li class="{{ setActive('users') }}">
            <a href="{{ route('users.index') }}">
                <div class="parent-icon icon-color-12"><i class="bx bx-group"></i>
                </div>
                <div class="menu-title">Users</div>
            </a>
        </li>
    @endcan

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
