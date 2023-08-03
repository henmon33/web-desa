<?= $this->extend('layanan/layout/navbar_pegawai'); ?>
<?= $this->section('content'); ?>
<div id="layoutSidenav_content">
    <main>
    <div class="container-fluid px-4 pt-3">
            <div class="card mb-4">
                <div class="card-header">
                <h1><span class="badge bg-danger">Potensi Desa</span></h1>
                </div>
                <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="flash-data" data-flashdata="<?= session()->getFlashdata('pesan'); ?>"></div>
                <?php endif; ?>
                <div class="card-body">
                    <form action="/admin/proses_tambah_potensi" method="POST" enctype="multipart/form-data">
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
                            <div class="row mb-3">
                                <label for="gambar" class="col-sm-2 col-form-label">Foto</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" id="gambar" name="gambar" value="<?= old('gambar') ?>">
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
                        <button type="submit" class="btn btn-danger">Tambah Data Potensi Desa</button>
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
            window.location.replace("<?= site_url('admin/potensi_desa') ?>");
        }, 750); 
    }

</script>

<?= $this->endSection(); ?>