<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('/transaksi') ?>">
        <div class="mx-3">APIK</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('wallet') ?>">
            <i class="fas fa-fw fa-wallet"></i>
            <span>Wallet</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('transaksi') ?>">
            <i class="fas fa-fw fa-clipboard-list"></i>
            <span>Transaksi</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('report') ?>">
            <i class="fas fa-fw fa-chart-line"></i>
            <span>Report</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('profil') ?>">
            <i class="fas fa-fw fa-user"></i>
            <span>Profil</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('help') ?>">
            <i class="fas fa-fw fa-question"></i>
            <span>Help</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-fw fa-solid fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li>


</ul>
<!-- End of Sidebar -->