<?= $this->extend('layanan/layout/navbar_pegawai'); ?>
<?= $this->section('content'); ?>
    <div id="layoutSidenav_content">
        <main>
        <div class="container-fluid ">
            <div class="card mt-4 mb-4">
                <div class="card-header">
                    <h3>Data Pengunjung Desa</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <?php foreach($data as $d) : ?>
                        <div class="card mx-2 my-2" style="width: 20rem;">
                            <img src="/img/wajiblapor/<?= $d['ktp']; ?>" class="card-img-top my-2" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?= $d['nama']; ?></h5>
                                <p class="card-text"><?= nl2br(htmlspecialchars(word_limiter($d['tujuan'], 10, '...'))); ?></p>
                                <div class="row">
                                    <button data-bs-toggle="modal" data-bs-target="#modalrinci<?= $d['id']; ?>" class="btn btn-danger col-md-4">Rincian</button>
                                    <?php if($d['status'] == 'DITINJAU') : ?>
                                        <span class="col-md-8 pe-0 text-center">
                                            <small class="text-body-secondary text-success">
                                                <i class="fa-solid fa-circle-check" style="color: #4bdf0c;"></i>
                                                Data Sudah Ditinjau
                                            </small>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="modalrinci<?= $d['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog  modal-dialog-scrollable">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                            <img src="/img/wajiblapor/<?= $d['ktp']; ?>" class="mx-auto d-block my-4 img-fluid" >
                                            <div class="mb-3 row">
                                                <label for="nama" class="col-md-4 col-sm-2 col-form-label fw-bold">Nama</label>
                                                <div class="col-md-8 col-sm-10">
                                                    <p class="mx-1" style="text-align: justify;"><?= $d['nama']; ?></p>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="jenis_kelamin" class="col-md-4 col-sm-2 col-form-label fw-bold">Jenis Kelamin</label>
                                                <div class="col-md-8 col-sm-10">
                                                    <p class="mx-1" style="text-align: justify;"><?= $d['jenis_kelamin']; ?></p>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="usia" class="col-md-4 col-sm-2 col-form-label fw-bold">Usia</label>
                                                <div class="col-md-8 col-sm-10">
                                                    <p class="mx-1" style="text-align: justify;"><?= $d['usia']; ?></p>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="alamat" class="col-md-4 col-sm-2 col-form-label fw-bold">Alamat</label>
                                                <div class="col-md-8 col-sm-10">
                                                    <p class="mx-1" style="text-align: justify;"><?= $d['alamat']; ?></p>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="tgl_datang" class="col-md-4 col-sm-2 col-form-label fw-bold">Tanggal Datang</label>
                                                <div class="col-md-8 col-sm-10">
                                                    <p class="mx-1" style="text-align: justify;"><?= $d['tgl_datang']; ?></p>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="no_hp" class="col-md-4 col-sm-2 col-form-label fw-bold">No HP</label>
                                                <div class="col-md-8 col-sm-10">
                                                    <p class="mx-1" style="text-align: justify;"><?= $d['no_hp']; ?></p>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-4">
                                                    <label for="deskripsi" class="form-label fw-bold" id="tujuan">Tujuan</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-floating">
                                                        <label for="tujuan" class="form-label">&nbsp;</label>
                                                        <p class="mx-1" style="text-align: justify;"><?= htmlspecialchars($d['tujuan']); ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <?php if($d['status'] != 'DITINJAU') : ?>
                                            <a href="/admin/respon_wajib_lapor/<?= $d['id']; ?>"><button type="button" class="btn btn-primary">Tandai Sudah Dilihat</button></a>
                                        <?php endif; ?>
                                    </div>
                                    </div>
                                </div>
                            </div>
    
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        </main>
    </div>
<?= $this->endSection(); ?>