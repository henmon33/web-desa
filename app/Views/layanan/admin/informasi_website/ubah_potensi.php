<?= $this->extend('layanan/layout/navbar_pegawai'); ?>
<?= $this->section('content'); ?>
<div id="layoutSidenav_content">
    <main>
    <div class="container-fluid px-4">
            <h1 class="mt-4">Data Potensi Desa</h1>

            <div class="card mb-4">
                <div class="card-header">
                <h2><span class="badge bg-primary">Ubah Data Potensi Desa</span></h2>
                </div>
                <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="flash-data" data-flashdata="<?= session()->getFlashdata('pesan'); ?>"></div>
                <?php endif; ?>
                <div class="card-body">
                    <form action="/admin/proses_ubah_potensi/<?= $potensi['id']; ?>" method="POST" enctype="multipart/form-data" >
                            <div class="row mb-3">
                                <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?>" id="judul" name="judul" value="<?= old('judul', $potensi['judul']); ?>">
                                    <?php if ($validation->hasError('judul')) : ?>
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= $validation->getError('judul') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-floating row mb-3">
                                <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                                <div class="col-sm-10 offset-sm-2">
                                    <textarea class="form-control <?= ($validation->hasError('deskripsi')) ? 'is-invalid' : ''; ?>" id="deskripsi" name="deskripsi" style="height: 400px;" ><?= old('deskripsi', $potensi['deskripsi']); ?></textarea>
                                    <?php if ($validation->hasError('deskripsi')) : ?>
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= $validation->getError('deskripsi') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="gambar" class="col-sm-2 col-form-label">Foto</label>
                                <div class="col-sm-10">
                                    <?php if ($potensi['gambar']) : ?>
                                        <img src="/img/potensi/<?= $potensi['gambar']; ?>" alt="gambar" class="img-thumbnail" name="gambar" id="gambar" style="width:500px ;">
                                    <?php else : ?>
                                        <br>
                                        <span>Foto potensi Belum Diunggah</span>
                                    <?php endif; ?>
                                    <input type="file" class="form-control <?= ($validation->hasError('gambar')) ? 'is-invalid' : ''; ?>" name="gambar" id="gambar" >
                                    <?php if ($validation->hasError('gambar')) : ?>
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= $validation->getError('gambar') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <input type="hidden" name="gambar_lama" value="<?= $potensi['gambar'] ?>">
                            <button type="submit" class="btn btn-primary">Ubah</button>
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
            icon: 'error',
            title: 'Gagal',
            text: flashData,
            showConfirmButton: false,
            timer: 1500
        });
    }
</script>
<?= $this->endSection(); ?>