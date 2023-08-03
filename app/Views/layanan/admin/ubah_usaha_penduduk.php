<?= $this->extend('layanan/layout/navbar_pegawai'); ?>
<?= $this->section('content'); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4 py-4">
            <div class="card mb-4 mt-4">
                <div class="card-header">
                    <h2><span class="badge bg-primary">Ubah Data Usaha Penduduk</span></h2>
                </div>
                <?php

                use PhpParser\Node\Stmt\Echo_;

                if (session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('pesan'); ?>
                    </div>
                <?php endif; ?>
                <div class="card-body">
                    <form action="/admin/proses_ubah_usaha_penduduk/<?= $usaha['id']; ?>" method="POST">
                        <?= csrf_field() ?>
                        <input type="hidden" name="id" value="<?= $usaha['id']; ?>">
                        <div class="row mb-3">
                            <label for="nik" class="col-sm-2 col-form-label">NIK</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('nik')) ? 'is-invalid' : ''; ?>" id="nik" name="nik" value="<?= (old('nik')) ? old('nik') : $usaha['nik']; ?>" readonly>
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('nik') ?>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" value="<?= (old('nama')) ? old('nama') : $usaha['nama']; ?>" readonly>
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('nama') ?>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="jenis_usaha" class="col-sm-2 col-form-label">Jenis Usaha</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('jenis_usaha')) ? 'is-invalid' : ''; ?>" id="jenis_usaha" name="jenis_usaha" value="<?= (old('jenis_usaha')) ? old('jenis_usaha') : $usaha['jenis_usaha']; ?>">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('jenis_usaha') ?>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Ubah Data</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>
<?= $this->endSection(); ?>