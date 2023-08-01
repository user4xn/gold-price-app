<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="/" class="app-brand-link">
            <span class="">
                <img src="https://www.emas-nu.com/ibank-v2/img/logo_emas_nu_landscape.webp" alt="logo_image" style="height:46px">
            </span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
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
        <li class="menu-item {{ ($menu == 'transaction') ? 'active' : '' }}">
            <a href="{{ route('transaction') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-currency-dollar"></i>
                <div>Transaksi</div>
            </a>
        </li>
    </ul>
</aside>