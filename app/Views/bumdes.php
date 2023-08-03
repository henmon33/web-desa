<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container mt-3" >
    <div class="row">
        <?php if($data): ?>
                    <?php foreach($data as $b) : ?>

                        <div class="card col-lg-4 col-md-8 mt-3 mx-2 d-flex justify-content-between" data-aos="zoom-in" data-aos-delay="100" style="width: 22rem;">
                            <img src="/img/bumdes/<?= $b['gambar']; ?>" class="card-img-top rounded mx-auto mt-2 " style="width: 90%; height: 170px;">
                            <div class="card-body">
                                <h5 class="card-title"><?= $b['nama_usaha']; ?></h5>
                                <p class="card-text" style="text-align: justify;"><small class="text-body-secondary"><?= word_limiter($b['deskripsi'], 15, '...'); ?></small></p>
                                <p class="card-text mb-0"><small class="text-body-secondary">Alamat : <?= $b['alamat']; ?></small></p>
                                <p class="card-text"><small class="text-body-secondary">Kontak :  <?= $b['kontak']; ?></small></p>
                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalrinci<?= $b['id']; ?>" >Baca Selengkapnya</button>
                            </div>
                        </div>

                        <!-- modal -->
                        <div class="modal fade" id="modalrinci<?= $b['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" >
                            <div class="modal-dialog modal-dialog-scrollable modal-lg ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title"><?= $b['nama_usaha']; ?></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <img src="/img/bumdes/<?= $b['gambar']; ?>" class="mx-auto d-block my-4" style="width: 90%; height: 90%;">
                                        <div class="row mb-3">
                                            <div class="col-md-2">
                                                <label for="deskripsi" class="form-label fw-bold" id="deskripsi-label">Deskripsi</label>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="form-floating">
                                                    <label for="deskripsi" class="form-label">&nbsp;</label>
                                                    <p class="mx-1" style="text-align: justify;"><?= htmlspecialchars($b['deskripsi']); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="alamat" class="col-sm-2 col-form-label fw-bold">Alamat</label>
                                            <div class="col-sm-10">
                                                <p class="mx-1" style="text-align: justify;"><?= $b['alamat']; ?></p>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="stok" class="col-sm-2 col-form-label fw-bold">Stok</label>
                                            <div class="col-sm-10">
                                                <p class="mx-1" style="text-align: justify;"><?= $b['stok']; ?></p>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="kontak" class="col-sm-2 col-form-label fw-bold">kontak</label>
                                            <div class="col-sm-10">
                                                
                                                <p class="mx-1" style="text-align: justify;"><i class="fa-solid fa-square-phone fa-2xl" style="color: #ed072a;"></i> <?= $b['kontak']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
        <?php else : ?>
            <div class="card my-2" data-aos="fade-up" data-aos-delay="100" style="max-width: 1250px;">
                <div class="row g-0">
                    <div class="card-body text-center">
                        <small class=" text-body-secondary">Data tidak ditemukan</small>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
<?= $this->endSection(); ?>