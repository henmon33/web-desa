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
                                <a class="nav-link" href="/administrasi/index/DIAJUKAN">
                                    <button type="button" class="btn btn-dark position-relative">
                                        Surat Diajukan
                                        <span class="position-absolute top-0 start-100 translate-middle p-1 badge rounded-pill bg-danger" id="jumlah_surat_diajukan">
                                            </span>
                                    </button>
                                </a>
                                <a class="nav-link" href="/administrasi/index/DIPROSES">
                                    <button type="button" class="btn btn-dark position-relative">
                                            Surat Diproses
                                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" id="jumlah_surat_diproses">
                                                </span>
                                    </button>
                                </a>
                                <a class="nav-link" href="/administrasi/index/DICETAK">
                                    <button type="button" class="btn btn-dark position-relative">
                                        Surat Dicetak
                                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" id="jumlah_surat_dicetak">
                                            </span>
                                    </button>
                                </a>
                                <a class="nav-link" href="/administrasi/index/SELESAI">
                                   <button type="button" class="btn btn-dark position-relative">
                                        Surat Selesai
                                    </button>
                                </a>
                                <a class="nav-link" href="/administrasi/index/DITOLAK">
                                    <button type="button" class="btn btn-dark position-relative">
                                        Surat Ditolak
                                    </button> 
                                </a>
                            </nav>
                        </div>
                        <a class="nav-link" href="<?= site_url('administrasi/ubah_data'); ?>">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-pen-nib fa-lg"></i></div>
                            Ubah Username & Password
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
<script>
    $(document).ready(function() {
    function updateNotifikasi() {
        $.ajax({
            url: '/administrasi/updateNotifikasi',
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