<!doctype html>
<html lang="id">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Kembuan</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link href="<?= base_url('template-frontend'); ?>/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="<?= base_url('template-frontend'); ?>/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?= base_url('template-frontend'); ?>/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?= base_url('template-frontend'); ?>/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Template Main CSS File -->
    <link href="<?= base_url('template-frontend'); ?>/assets/css/style.css" rel="stylesheet">


</head>

<body class="bg-dark bg-opacity-10">


    <div class="container text-center mb-2">
        <picture>

            <img src="/img/minahasa.png" class=" mx-auto mt-4 d-block" width="60px" alt="...">
        </picture>
        <h1 class="fw-bold fs-5">DESA KEMBUAN</h1>
        <span class="fs-6">Kec. Tondano Utara, Kab. Minahasa, Prov. Sulawesi Utara </span>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger sticky-top">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link <?= session('active_menu') === 'menu_index' ? 'active' : '' ?> fw-bold" aria-current="page" href="<?= base_url('/'); ?>">BERANDA</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link <?= session('active_menu') === 'menu_profil' ? 'active' : '' ?> fw-bold dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            PROFIL
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="fs-6 dropdown-item" href="<?= base_url('/home/sejarah'); ?>">SEJARAH</a></li>
                            <li><a class="fs-6 dropdown-item" href="<?= base_url('/home/struktur'); ?>">STRUKTUR PEMERINTAHAN</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= session('active_menu') === 'menu_potensi' ? 'active' : '' ?> fw-bold" href="<?= base_url('/home/potensi'); ?>">POTENSI</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= session('active_menu') === 'menu_bumdes' ? 'active' : '' ?> fw-bold" href="<?= base_url('/home/bumdes'); ?>">BUMDes</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link <?= session('active_menu') === 'menu_statistik' ? 'active' : '' ?> fw-bold dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">STATISTIK</a>
                        <ul class=" dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="fs-6 dropdown-item" href="<?= base_url('/home/statistik_jenis'); ?>" id="jenis">Data Jenis Kelamin</a></li>
                            <li><a class="fs-6 dropdown-item" href="<?= base_url('/home/statistik_agama'); ?>" id="agama">Data Agama</a></li>
                            <li><a class="fs-6 dropdown-item" href="<?= base_url('/home/statistik_pendidikan'); ?>" id="pendidikan">Data Pendidikan</a></li>
                            <li><a class="fs-6 dropdown-item" href="<?= base_url('/home/statistik_pekerjaan'); ?>" id="pekerjaan">Data Pekerjaan</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= session('active_menu') === 'menu_anggaran' ? 'active' : '' ?> fw-bold" href="<?= base_url('/home/anggaran'); ?>">ANGGARAN</a>
                    </li>
                    <li class="nav-item">

                        <a class="nav-link fw-bold" href="<?= base_url('/layanan'); ?>">MASUK</a>
                    </li>
                </ul>
                <form class="d-flex" action="" method="post">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="keyword" id="keyword">
                    <button class="btn btn-outline-light" type="submit">Search</button>
                </form>

            </div>
        </div>
    </nav>

    <?= $this->renderSection('content'); ?>
    <?= $this->renderSection('script'); ?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="<?= base_url('template-frontend'); ?>/assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="<?= base_url('template-frontend'); ?>/assets/vendor/aos/aos.js"></script>
    <script src="<?= base_url('template-frontend'); ?>/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="<?= base_url('template-frontend'); ?>/assets/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- <script src="<?= base_url(); ?>/assets/sweetalert2/sweetalert2.all.min.js"></script> -->
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var navLinks = document.querySelectorAll('.nav-link');
        
        // Tambahkan event listener untuk setiap menu
        navLinks.forEach(function(link) {
            link.addEventListener('click', function() {
            // Hapus kelas active dari semua menu
            navLinks.forEach(function(link) {
                link.classList.remove('active');
            });
            
            // Tambahkan kelas active pada menu yang sedang aktif
            this.classList.add('active');
            });
        });
    });
</script>

</html>