<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="/" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="https://www.emas-nu.com/ibank-v2/img/logo_emas_nu_landscape.webp" alt="logo_image">
            </span>
            <span class="app-brand-text demo menu-text fw-bolder" style="font-size: 17px!important;  font-family: 'Montserrat', sans-serif!important;">Tukang Emas</span>
        </a>

        <a href="javascript:void(0);" style="margin-left:85px!important" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <li class="menu-item {{ ($menu == 'dashboard') ? 'active' : '' }}">
            <a href="/dashboard" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div>Dashboard</div>
            </a>
        </li>
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Manajemen</span>
        </li>
        <li class="menu-item {{ ($menu == 'users') ? 'active' : '' }}">
            <a href="{{ route('users') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-users"></i>
                <div>User</div>
            </a>
        </li>
        <li class="menu-item {{ ($menu == 'product') ? 'active' : '' }}">
            <a href="{{ route('product') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-archive"></i>
                <div>Produk</div>
            </a>
        </li>
        <li class="menu-item {{ ($menu == 'transaction') ? 'active' : '' }}">
            <a href="{{ route('transaction') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-currency-dollar"></i>
                <div>Transaksi</div>
            </a>
        </li>
    </ul>
</aside>