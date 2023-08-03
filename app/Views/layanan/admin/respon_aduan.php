<?= $this->extend('layanan/layout/navbar_pegawai'); ?>
<?= $this->section('content'); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">

            <div class="card mb-4 mt-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Respon Pengaduan
                </div>

                <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('pesan'); ?>
                    </div>
                <?php endif; ?>
                <div class="card-body">


                    <?php foreach ($datadb as $d) : ?>
                        <form action="/admin/proses_respon_aduan/<?= $d->id; ?>" method="POST">
                            <?= csrf_field() ?>
                            <input type="hidden" id="id" name="id" value="<?= $d->id; ?>">
                            <div class="mb-3 text-center">
                                <img src="/img/aduan/<?= $d->gambar; ?>" id="gambar_aduan" class="img-thumbnail" style="width:300px ;" >
                            </div>

                            <div class="mb-3">
                                <h2 for="aduan" class="col-form-label">Isi Laporan:</h4>
                                    <p class="border"><?= $d->aduan; ?>
                                    </p>
                            </div>

                            <div class="mb-3">
                                <label for="tanggapan" class="col-form-label">Tanggapan:</label>
                                <input type="text" class="form-control <?= ($validation->hasError('tanggapan')) ? 'is-invalid' : ''; ?>" id="tanggapan" name="tanggapan"></input>
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('tanggapan') ?>
                                </div>
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Kirim Tanggapan</button>
                            </div>
                        </form>
                    <?php endforeach; ?>
                </div>
            </div>

            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2022</div>
                    </div>
                </div>
            </footer>
        </div>
</div>
</main>
</div>
<?= $this->endSection(); ?>