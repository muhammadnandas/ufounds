<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="{{ url('/') }}">
            <img src="{{ asset('assets/img/logo.jpeg') }}" width="50" height="50" alt="logo">
        </a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="{{ url('/') }}">
            <img src="{{ asset('assets/img/logo.jpeg') }}" width="50" height="50" alt="logo">
        </a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Main Menu</li>
        <li class="{{ Route::is('dashboard') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="fas fa-fire"></i>
                <span>Dashboard</span>
            </a>
        </li>
        {{-- aktifkan ini jika mau dropdown --}}
        {{-- <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-cog"></i>
                <span>Dropdown Menu</span>
            </a>
            <ul class="dropdown-menu">
                <li><a href="#">Dropdown Item</a></li>
            </ul>
        </li> --}}

        {{-- sidebar superadmin --}}
        {{-- @can('superadmin')
        <li class="menu-header">Administrator</li>
        @endcan --}}

        {{-- sidebar admin --}}
        @can('admin')
            <li class="menu-header">Administrator</li>
            <li class="{{ Route::is('user*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('user.index') }}">
                    <i class="fas fa-users"></i>
                    <span>Kelola User</span>
                </a>
            </li>
            <li class="{{ Route::is('laporan*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('laporan.index') }}">
                    <i class="fas fa-box"></i>
                    <span>Kelola Laporan</span>
                </a>
            </li>
            <li class="{{ Route::is('klaim*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('klaim.index') }}">
                    <i class="fas fa-box"></i>
                    <span>Kelola Klaim</span>
                </a>
            </li>
            <li class="{{ Route::is('serah-terima*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('serah-terima.index') }}">
                    <i class="fas fa-calendar-check"></i>
                    <span>Atur Serah Terima</span>
                </a>
            </li>
        @endcan

        {{-- sidebar user --}}
        @can('user')
            <!--<li class="menu-header text-center"><h5>Finder</h5></li>-->
            <li class="{{ Route::is('laporan*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('laporan.index') }}">
                    <i class="fas fa-box"></i>
                    <span>Buat Laporan</span>
                </a>
            </li>

            <li class="{{ Route::is('klaim*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('klaim.index') }}">
                    <i class="fas fa-box"></i>
                    <span>Kelola Klaim</span>
                </a>
            </li>

            <li class="{{ Route::is('serah-terima*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('serah-terima.index') }}">
                    <i class="fas fa-calendar-check"></i>
                    <span>Atur Serah Terima</span>
                </a>
            </li>
        @endcan
    </ul>
</aside>