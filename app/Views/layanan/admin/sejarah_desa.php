<?= $this->extend('layanan/layout/navbar_pegawai'); ?>
<?= $this->section('content'); ?>
<div id="layoutSidenav_content">
    <main>
    <div class="container-fluid px-4 pt-3">
            <div class="card mb-4">
                <div class="card-header">
                <h1><span class="badge bg-danger">Sejarah Desa</span></h1>
                </div>
                <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="flash-data" data-flashdata="<?= session()->getFlashdata('pesan'); ?>"></div>
                <?php endif; ?>
                <div class="card-body">
                    <form action="/admin/proses_ubah_sejarah/<?= $sejarah['judul']; ?>" method="POST">
                            <div class="row mb-3">
                                <div class="text-center">
                                    <img src="/img/<?= $sejarah['gambar']; ?>" class="img-thumbnail" name="gambar" id="gambar" style="width:150px ;">
                                </div>
                            </div>
                            <div class="form-floating row mb-3">
                                <div class="text-center">
                                    <textarea class="form-control <?= ($validation->hasError('deskripsi')) ? 'is-invalid' : ''; ?>" id="deskripsi" name="deskripsi" style="height: 400px; text-align: justify;"><?= $sejarah['deskripsi']; ?></textarea>
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <h3><?= $validation->getError('deskripsi') ?></h3>
                                    </div>
                                </div>
                            </div>
                        <button type="submit" class="btn btn-danger">Ubah Data Sejarah</button>
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
    }
</script>

<?= $this->endSection(); ?>