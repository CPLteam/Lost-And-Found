<title><?= $title ?></title>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo site_url('home') ?>">
                <div class="sidebar-brand-icon">
                    <!-- no rotate-n-15 -->
                    <i class="fas fa-code"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Lost & Found</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider bg-light">

            <!-- Heading Administrator -->
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

            <!-- Heading Management-->
            <div class="sidebar-heading">
                Management
            </div>

            <!-- Nav Item-->
            <!-- <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-database"></i>
                    <span>Kehilangan Barang</span></a>
            </li> -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('penemuan') ?>">
                    <i class="fas fa-database"></i>
                    <span>Penemuan Barang</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('pengambilan') ?>">
                    <i class="fas fa-database"></i>
                    <span>List Barang Diambil</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider bg-light">

            <!-- Nav Item Logout -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Keluar</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block bg-light">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->