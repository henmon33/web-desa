<?= $this->extend('layanan/layout/template'); ?>
<?= $this->section('navbar'); ?>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3">
            <marquee> Selamat Datang, <?= $username; ?></marquee>
        </a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link" href="/anggaran/">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open fa-lg"></i></div>
                            Data Anggaran
                        </a>
                        <a class="nav-link" href="<?= site_url('layanan/logout'); ?>">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-right-from-bracket fa-lg"></i></div>
                            Logout
                        </a>
                    </div>
                </div>
                
            </nav>
        </div>
<?= $this->renderSection('content'); ?>
<?= $this->endSection(); ?>