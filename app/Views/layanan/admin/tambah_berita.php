<?= $this->extend('layanan/layout/navbar_pegawai'); ?>
<?= $this->section('content'); ?>
<div id="layoutSidenav_content">
    <main>
    <div class="container-fluid px-4">
            <h1 class="mt-4">Data Berita Desa</h1>

            <div class="card mb-4">
                <div class="card-header">
                <h2><span class="badge bg-primary">Tambah Data Berita Desa</span></h2>
                </div>
                <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('pesan'); ?>
                    </div>
                <?php endif; ?>
                <div class="card-body">
                    <form action="/admin/proses_tambah_data_berita" method="POST" autocomplete="off" enctype="multipart/form-data" >
                        <?= csrf_field() ?>
                        <div class="row mb-3">
                            <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?>" id="judul" name="judul" value="<?= old('judul') ?>">
                                <?php if ($validation->hasError('judul')) : ?>
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('judul') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-floating row mb-3">
                            <label for="keterangan" class="col-sm-2 col-form-label">Deskripsi</label>
                            <div class="col-sm-10 offset-sm-2">
                                <textarea class="form-control <?= ($validation->hasError('keterangan')) ? 'is-invalid' : ''; ?>" placeholder="Masukkan keterangan" id="keterangan" name="keterangan" style="height: 250px;"><?= old('keterangan') ?></textarea>
                                <div class="text-danger"><?= $validation->getError('keterangan') ?></div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="gambar" class="col-sm-2 col-form-label">Foto</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control <?= ($validation->hasError('gambar')) ? 'is-invalid' : ''; ?>" id="gambar" name="gambar">
                                <?php if ($validation->hasError('gambar')) : ?>
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('gambar') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>
<?= $this->endSection(); ?>