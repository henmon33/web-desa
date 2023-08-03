<?= $this->extend('layanan/layout/template'); ?>
<?= $this->section('navbar'); ?>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3"><?= $username; ?></a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <!-- <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
            </div>
        </form> -->
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto me-3 me-lg-4 ">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="<?= site_url('layanan/logout'); ?>"><i class="fa-solid fa-right-from-bracket fa-lg"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-database fa-lg"></i></div>
                            Data Penduduk
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="/admin">Data Seluruh Penduduk</a>
                                <a class="nav-link" href="/admin/data_usaha_penduduk">Data Usaha Penduduk</a>
                                <a class="nav-link" href="/admin/data_anak">Data Anak</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="" data-bs-toggle="collapse" data-bs-target="#pelayananAdministrasi" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open fa-lg"></i></div>
                            <span class="position-relative">
                                Administrasi
                                <span id="administrasi" class=""></span>
                            </span> 
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pelayananAdministrasi" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="/admin/administrasi/DIAJUKAN">
                                    <button type="button" class="btn btn-dark position-relative">
                                        Surat Diajukan
                                        <span class="position-absolute top-0 start-100 translate-middle p-1 badge rounded-pill bg-danger" id="jumlah_surat_diajukan">
                                            </span>
                                    </button>
                                </a>
                                <a class="nav-link" href="/admin/administrasi/DIPROSES">
                                    <button type="button" class="btn btn-dark position-relative">
                                            Surat Diproses
                                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" id="jumlah_surat_diproses">
                                                </span>
                                    </button>
                                </a>
                                <a class="nav-link" href="/admin/administrasi/DICETAK">
                                    <button type="button" class="btn btn-dark position-relative">
                                        Surat Dicetak
                                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" id="jumlah_surat_dicetak">
                                            </span>
                                    </button>
                                </a>
                                <a class="nav-link" href="/admin/administrasi/SELESAI">
                                   <button type="button" class="btn btn-dark position-relative">
                                        Surat Selesai
                                    </button>
                                </a>
                                <a class="nav-link" href="/admin/administrasi/DITOLAK">
                                    <button type="button" class="btn btn-dark position-relative">
                                        Surat Ditolak
                                    </button> 
                                </a>
                            </nav>
                        </div>
                        <a class="nav-link" href="/admin/pengaduan_saran/0">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-file-pen fa-lg"></i></div>
                            Pengaduan & Saran
                        </a>
                        <a class="nav-link collapsed" data-bs-target="#pagesCollapseAuth" href="#" data-bs-toggle="collapse" aria-expanded="false" aria-controls="pagesCollapseAuth">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-circle-info fa-xl"></i></div>
                            <span class="position-relative">
                                Informasi Desa
                                <span id="informasi_desa" class=""></span>
                            </span> 
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="/admin/berita_desa">Berita Desa</a>
                                <a class="nav-link" href="/admin/sejarah_desa">Sejarah Desa</a>
                                <a class="nav-link" href="/admin/struktur_desa">Struktur Kepegawaian</a>
                                <a class="nav-link" href="/admin/potensi_desa">Potensi Desa</a>
                                <a class="nav-link" href="/admin/bumdes">BUMDes</a>
                                <a class="nav-link" href="/admin/anggaran">Anggaran</a>
                                <a class="nav-link" href="/admin/pengunjung">
                                    <span class="position-relative">
                                        Data Pengunjung Desa
                                        <span id="wajiblapor" class=""></span>
                                    </span> 
                                </a>
                            </nav>
                        </div>
                        <!-- <a class="nav-link" href="tables.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-table fa-lg"></i></div>
                            Tables
                        </a> -->
                    </div>
                </div>
            </nav>
        </div>
        <!-- <a class="nav-link collapsed" href="" data-bs-toggle="collapse" data-bs-target="#pelayananAdministrasi" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Administrasi
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a> -->
        <!-- <div class="collapse" id="pelayananAdministrasi" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">

                                <a class="nav-link collapsed" href="admin/administrasi/DIAJUKAN" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                    Surat Diajukan
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="401.html">401 Page</a>
                                        <a class="nav-link" href="404.html">404 Page</a>
                                        <a class="nav-link" href="500.html">500 Page</a>
                                    </nav>
                                </div>
                            </nav>
                        </div> -->
<?= $this->renderSection('content'); ?>
<script>
    $(document).ready(function() {
    function updateNotifikasi() {
        $.ajax({
            url: '/admin/updateNotifikasi',
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                // Update jumlah notifikasi pada tampilan
                if(response.jumlah_surat_diajukan || response.jumlah_surat_diproses || response.jumlah_surat_dicetak || response.jumlah_surat_selesai){
                    $('#administrasi').addClass('position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle');
                }
                if(response.jumlah_wajib_lapor){
                    $('#informasi_desa').addClass('position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle');
                    $('#wajiblapor').addClass('position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle');
                }
                $('#jumlah_surat_diajukan').text(response.jumlah_surat_diajukan);
                $('#jumlah_surat_diproses').text(response.jumlah_surat_diproses);
                $('#jumlah_surat_dicetak').text(response.jumlah_surat_dicetak);
                $('#jumlah_aduan').text(response.jumlah_aduan);
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
            }
        });
    }

    // Panggil fungsi updateNotifikasi setiap beberapa detik (misalnya 5 detik)
    setInterval(updateNotifikasi, 1000);
});

</script>
<?= $this->endSection(); ?>