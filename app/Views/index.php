<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="mx-auto my-4 card p-3 mb-2  text-white" style="background-image:url(/img/desa.jpg); background-size:cover; background-color: black;">
        <div class="row">
            <div class="col">
                <figure class="text-center" data-aos="zoom-in" data-aos-delay="100">
                    <blockquote class="blockquote ">
                        <h3 class="fw-bold">VISI</h3>
                        <p class="fst-italic text-uppercase">kembuan maju dalam ekonomi dan budaya berdaulat adil dan sejahtera</p>
                    </blockquote>
                    <blockquote class="blockquote">
                        <H3 class="fw-bold">MISI</H3>
                        <p class="fst-italic">
                            Meningkatkan pembangunan sumber daya manusia yang berbudaya dan berdaya saing tinggi.
                        </p>
                        <p class="fst-italic">
                            Mewujudkan kemandirian ekonomi dengan mendorongsektor pertanian, peternakan dan kuliner.
                        </p>
                        <p class="fst-italic">
                            Memantabkan menejemen birokrasi yang profesional melalui tatakelola desa yang baik.
                        </p>
                    </blockquote>
                </figure>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 col-md-12">
            <?php if($data) : ?>
            <?php foreach ($data as $d) : ?>

                <div class="card card-sm my-2" data-aos="fade-up" data-aos-delay="100" style="max-width: 1250px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="/img/berita/<?= $d['gambar']; ?>" class="img-fluid rounded-start my-2 mx-2" style="width: 400px;" data-aos="fade-left" data-aos-delay="100">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title" data-aos="fade-right" data-aos-delay="100"><?= $d['judul']; ?></h5>
                                <p class="card-text" style="text-align: justify;" data-aos="fade-left" data-aos-delay="100"><?= nl2br(htmlspecialchars(word_limiter($d['keterangan'], 25, '...'))); ?></p>
                                <button data-bs-toggle="modal" data-bs-target="#modalrinci<?= $d['id']; ?>" class="btn btn-danger">Selengkapnya</button>
                                <p class="card-text"><small class="text-muted">diubah pada <?= $d['selisihWaktu']; ?></small></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="modalrinci<?= $d['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title"><?= $d['judul']; ?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <img src="/img/berita/<?= $d['gambar']; ?>" class="mx-auto d-block my-4" style="width: 600px;">
                                <p><?= nl2br($d['keterangan']); ?></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
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
                </div>
            <?php endif; ?>
        </div>
        <div class="col-lg-4 col-md-12">
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="flash-data" data-flashdata="<?= session()->getFlashdata('pesan'); ?>"></div>
            <?php endif; ?>
            <div class="card my-2 border border-danger" data-aos="fade-up" data-aos-delay="100" style="max-width: 100%;">
                <div class="row g-0">
                <div class="col-md-12">
                    <div class="card-header bg-danger text-white fw-bold text-center border-bottom border-danger">
                        Pendatang Wajib Lapor 1x24 Jam
                    </div>
                    <div class="card-body">
                    <form action="/home/wajib lapor" method="POST" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" value="<?= (old('nama')) ? old('nama') : ''; ?>" id="nama" name="nama">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('nama') ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="no_hp" class="form-label">No. Hp</label>
                            <input type="text" class="form-control <?= ($validation->hasError('no_hp')) ? 'is-invalid' : ''; ?>" value="<?= (old('no_hp')) ? old('no_hp') : ''; ?>" id="no_hp" name="no_hp">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('no_hp') ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                            <select class="form-select <?= ($validation->hasError('jenis_kelamin')) ? 'is-invalid' : ''; ?>" id="jenis_kelamin" name="jenis_kelamin" aria-label="Pilih Jenis Kelamin">
                                <option value="laki-laki">Laki-laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="usia" class="form-label">Usia</label>
                            <input type="text" class="form-control <?= ($validation->hasError('usia')) ? 'is-invalid' : ''; ?>" value="<?= (old('usia')) ? old('usia') : ''; ?>" id="usia" name="usia">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('usia') ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" value="<?= (old('alamat')) ? old('alamat') : ''; ?>" id="alamat" name="alamat">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('alamat') ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="tgl_datang" class="form-label">Tanggal Datang</label>
                            <input type="date" class="form-control <?= ($validation->hasError('tgl_datang')) ? 'is-invalid' : ''; ?>" value="<?= (old('tgl_datang')) ? old('tgl_datang') : ''; ?>" name="tgl_datang" id="tgl_datang">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('tgl_datang') ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="tujuan" class="form-label">Tujuan Ke Desa Kembuan</label>
                            <textarea class="form-control <?= ($validation->hasError('tujuan')) ? 'is-invalid' : ''; ?>" value="<?= (old('tujuan')) ? old('tujuan') : ''; ?>" name="tujuan" id="tujuan" rows="3"></textarea>
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('tujuan') ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="ktp" class="form-label">Silahkan Pilih File KTP</label>
                            <input class="form-control <?= ($validation->hasError('ktp')) ? 'is-invalid' : ''; ?>" value="<?= (old('ktp')) ? old('ktp') : ''; ?>" type="file" id="ktp" name="ktp">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('ktp') ?>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-danger">Kirim</button>
                    </form>
                    </div>
                </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
<script>
    function showToast() {
        var toastEl = document.getElementById('liveToast');
        var toast = new bootstrap.Toast(toastEl);
        toast.show();
    }

    const pesan = $('.flash-data').data('flashdata');
    if(pesan){
        Swal.fire({
            icon: 'success',
            title: 'Data Kunjungan Anda',
            text: pesan,
        })
    }
</script>
<?= $this->endSection(); ?>