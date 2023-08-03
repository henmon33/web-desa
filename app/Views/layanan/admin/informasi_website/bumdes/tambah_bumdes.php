<?= $this->extend('layanan/layout/navbar_pegawai'); ?>
<?= $this->section('content'); ?>
<div id="layoutSidenav_content">
    <main>
    <div class="container-fluid px-4 pt-3">
            <div class="card mb-4">
                <div class="card-header">
                <h1><span class="badge bg-danger">BUMDes</span></h1>
                </div>
                <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="flash-data" data-flashdata="<?= session()->getFlashdata('pesan'); ?>"></div>
                <?php endif; ?>
                <div class="card-body">
                    <form action="/admin/proses_tambah_bumdes" method="POST" enctype="multipart/form-data">
                            <div class="row mb-3">
                                <label for="nama_usaha" class="col-sm-2 col-form-label">Nama Usaha</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control <?= ($validation->hasError('nama_usaha')) ? 'is-invalid' : ''; ?>" id="nama_usaha" name="nama_usaha" value="<?= old('nama_usaha') ?>">
                                    <?php if ($validation->hasError('nama_usaha')) : ?>
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= $validation->getError('nama_usaha') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" id="alamat" name="alamat" value="<?= old('alamat') ?>">
                                    <?php if ($validation->hasError('alamat')) : ?>
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= $validation->getError('alamat') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="kontak" class="col-sm-2 col-form-label">Kontak</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control <?= ($validation->hasError('kontak')) ? 'is-invalid' : ''; ?>" id="kontak" name="kontak" value="<?= old('kontak') ?>">
                                    <?php if ($validation->hasError('kontak')) : ?>
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= $validation->getError('kontak') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="gambar" class="col-sm-2 col-form-label">Foto</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control <?= ($validation->hasError('gambar')) ? 'is-invalid' : ''; ?>" id="gambar" name="gambar" value="<?= old('gambar') ?>">
                                    <?php if ($validation->hasError('gambar')) : ?>
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= $validation->getError('gambar') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-floating row mb-3">
                                <label for="keterangan" class="col-sm-2 col-form-label">Deskripsi</label>
                                <div class="col-sm-10 offset-sm-2">
                                    <textarea class="form-control <?= ($validation->hasError('deskripsi')) ? 'is-invalid' : ''; ?>" id="deskripsi" name="deskripsi" style="height: 400px;" ><?= old('deskripsi') ?></textarea>
                                    <?php if ($validation->hasError('deskripsi')) : ?>
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= $validation->getError('deskripsi') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <button type="submit" class="btn btn-danger">Tambah Data BUMDes</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>

<script>
    const flashData = $('.flash-data').data('flashdata');
    if (flashData) {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: flashData,
            showConfirmButton: false,
            timer: 1500
        });
        setTimeout(() => {
            window.location.replace("<?= site_url('admin/bumdes') ?>");
        }, 750); 
    }

</script>

<?= $this->endSection(); ?>