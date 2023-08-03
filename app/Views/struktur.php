<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<main id="main">
    <!-- ======= Section Struktur ======= -->
    <section id="trainers" class="trainers">
        <div class="container" >
        <div class="card-body">
                <div class="row justify-content-center">
                    <div class="row ">
                        <?php foreach ($struktur as $s) : ?>
                            <?php if ($s['jabatan'] == 'Hukum Tua') : ?>
                                <div class="col ">
                                    <div class="card border border-danger mx-auto my-1 text-center shadow-lg p-3 mb-5 bg-body-tertiary rounded" data-aos="fade-up" style="width: 18rem; height: 22rem;">
                                        <img src="/img/struktur/<?= $s['gambar']; ?>" class="rounded-circle">
                                        <div class="card-body">
                                            <h5 class="card-title fw-bold"><?= $s['nama'] ?></h5>
                                            <p class="card-text"><small><?= $s['jabatan'] ?></small></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                    <div class="row ">
                        <?php foreach ($struktur as $s) : ?>
                            <?php if(strpos(strtolower($s['jabatan']), 'sekertaris desa') !== false ) : ?>
                                <div class="col ">
                                <div class="card border border-danger mx-auto my-1 text-center shadow-lg p-3 mb-5 bg-body-tertiary rounded " data-aos="fade-up" style="width: 18rem; height: 22rem;">
                                        <img src="/img/struktur/<?= $s['gambar']; ?>" class="rounded-circle">
                                        <div class="card-body">
                                            <h5 class="card-title fw-bold"><?= $s['nama'] ?></h5>
                                            <p class="card-text"><small><?= $s['jabatan'] ?></small></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                    <div class="row">
                    <?php foreach ($struktur as $s) : ?>
                        <?php if(strpos(strtolower($s['jabatan']), 'kepala seksi') !== false) : ?>
                            <div class="col">
                                    <div class="card border border-danger mx-auto my-1  text-center shadow-lg p-3 mb-5 bg-body-tertiary rounded " data-aos="fade-up" style="width: 18rem; height: 22rem;">
                                        <img src="/img/struktur/<?= $s['gambar']; ?>" class="rounded-circle">
                                        <div class="card-body">
                                            <h5 class="card-title fw-bold"><?= $s['nama'] ?></h5>
                                            <p class="card-text"><small><?= $s['jabatan'] ?></small></p>
                                        </div>
                                    </div>
                                </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    </div>
                    <div class="row">
                    <?php foreach ($struktur as $s) : ?>
                        <?php if(strpos(strtolower($s['jabatan']), 'kepala lingkungan') !== false) : ?>
                            <div class="col">
                                    <div class="card border border-danger mx-auto my-1  text-center shadow-lg p-3 mb-5 bg-body-tertiary rounded" data-aos="fade-up" style="width: 18rem; height: 22rem;">
                                        <img src="/img/struktur/<?= $s['gambar']; ?>" class="rounded-circle">
                                        <div class="card-body">
                                            <h5 class="card-title fw-bold"><?= $s['nama'] ?></h5>
                                            <p class="card-text"><small><?= $s['jabatan'] ?></small></p>
                                        </div>
                                    </div>
                                </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
        </div>
    </section>
    <!-- Akhir Section Struktur  -->
</main>

<?= $this->endSection(); ?>