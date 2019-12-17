<title><?= $title ?></title>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-code"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Lost & Found</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider bg-light">

            <!-- Heading -->
            <div class="sidebar-heading">
                Administrator
            </div>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('home'); ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider bg-light">

            <!-- Heading -->
            <div class="sidebar-heading">
                Management
            </div>

            <!-- Nav Item-->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('kehilangan') ?>">
                    <i class="fas fa-database"></i>
                    <span>Kehilangan Barang</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('penemuan') ?>">
                    <i class="fas fa-database"></i>
                    <span>Penemuan Barang</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('pengambilan') ?>">
                    <i class="fas fa-database"></i>
                    <span>Pengambilan Barang</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider bg-light">

            <!-- Nav Item-->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Logout</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->