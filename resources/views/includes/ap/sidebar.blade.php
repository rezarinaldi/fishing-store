<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item {{ (request()->is('ap/dashboard')) ? 'active' : '' }}">
            <a href="{{ route('ap.dashboard') }}"
                class="nav-link">
                <i class="menu-icon fas fa-tachometer-alt"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item {{ (request()->is('ap/categories*')) ? 'active' : '' }}">
            <a href="{{ route('ap.categories.index') }}"
                class="nav-link">
                <i class="menu-icon fas fa-book"></i>
                <span class="menu-title">Kategori</span>
            </a>
        </li>
        <li class="nav-item {{ (request()->is('ap/items*')) ? 'active' : '' }}">
            <a href="{{ route('ap.items.index') }}"
                class="nav-link">
                <i class="menu-icon fab fa-product-hunt"></i>
                <span class="menu-title">Alat Pancing</span>
            </a>
        </li>
        <li class="nav-item {{ (request()->is('ap/orders*')) ? 'active' : '' }}">
            <a class="nav-link"
                href="{{ route('ap.orders.index') }}">
                <i class="menu-icon fas fa-shopping-basket"></i>
                <span class="menu-title"> Pesanan</span>
            </a>
        </li>
        <li class="nav-item {{ (request()->is('ap/contacts*')) ? 'active' : '' }}">
            <a class="nav-link "
                href="{{ route('ap.contacts.index') }}">
                <i class="menu-icon fas fa-inbox"></i>
                <span class="menu-title">Kotak Pesan</span>
            </a>
        </li>
    </ul>
    <hr>
    <ul class="nav">
        <hr>
        <li class="nav-item {{ (request()->is('ap/settings*')) ? 'active' : '' }}">
        <a class="nav-link" 
            href="{{ route('ap.settings.index') }}">
                <i class="menu-icon  fas fa-cog"></i>
                <span class="menu-title"> Pengaturan</span>
            </a>
        </li>
        <li class="nav-item {{ (request()->is('ap/change_password*')) ? 'active' : '' }}">
            <a class="nav-link"
                href="{{ route('ap.change-password.index') }}">
                <i class="menu-icon fas fa-user-cog"></i>
                <span class="menu-title"> Reset Password</span>
            </a>
        </li>
    </ul>
    <hr>
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/') }}">
                <i class="menu-icon fas fa-globe-asia"></i>
                <span class="menu-title"> Website Utama</span>
            </a>
        </li>
    </ul>
</nav>