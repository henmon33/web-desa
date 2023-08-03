<?= $this->extend('layanan/layout/navbar_pegawai'); ?>
<?= $this->section('content'); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">

            <div class="card mb-4 mt-4">
                <div class="card-header">
                    
                    <button class="dropdown-toggle" data-bs-toggle="dropdown">
                        <i class="fas fa-table me-1"></i>
                        <?php if ($id_halaman == '0') : ?>
                            Pengaduan Masuk
                        <?php elseif($id_halaman == '1') : ?>
                            Pengaduan Selesai
                        <?php endif; ?>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/admin/pengaduan_saran/0">Pengaduan Masuk</a></li>
                        <li><a class="dropdown-item" href="/admin/pengaduan_saran/1">Pengaduan Selesai</a></li>
                    </ul>


                </div>
                <div class="card-body">
                    <?php if (session()->getFlashdata('pesan')) : ?>
                        <div class="alert alert-success" role="alert">
                            <?= session()->getFlashdata('pesan'); ?>
                        </div>
                    <?php endif; ?>
                    <div class="table-responsive">
                    <table id="datatablesSimple" class="table table-bordered">
                        <thead class="text-center" >
                            <tr>
                                <th>Tanggal Pengaduan</th>
                                <th>Pengaduan</th>
                                <th>Bukti Pengaduan</th>
                                <th>Status</th>
                                <th>Tanggapan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($datadb) : ?>
                            <?php foreach ($datadb as $d) : ?>
                                <tr>
                                    <td><?= $d->created_at; ?></td>
                                    <td><?= character_limiter($d->aduan, 20); ?></td>
                                    <td>
                                        <img src="/img/aduan/<?= $d->gambar; ?>" class="img-thumbnail" id="gambar_aduan" alt="">
                                    </td>
                                    <td class="test-center">
                                        <?php if ($d->status == "DIPROSES") : ?>
                                                <p class="alert alert-primary text-center" role="alert"><?= strtoupper($d->status); ?></p>
                                        <?php endif; ?>
                                        <?php if ($d->status == "SELESAI") : ?>
                                            <p class="alert alert-success text-center" role="alert"><?= strtoupper($d->status); ?></p>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#rincianmodal<?= $d->id; ?>">
                                            Rincian
                                        </button>
                                        <?php if ($d->status == "DIPROSES") :  ?>
                                            <a href="/admin/respon_aduan/<?= $d->id; ?>">
                                                <button type="button" class="btn btn-secondary">Tanggapi</button>
                                            </a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <!-- Modal -->
                                <div class="modal fade" id="rincianmodal<?= $d->id ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Rincian Pengaduan</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">

                                                <form>
                                                    <fieldset disabled>
                                                        <div class="row mb-3">
                                                            <label for="nik" class="col-sm-3 col-form-label">Aduan</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control" id="nik" name="nik" placeholder="<?= $d->aduan; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="nama" class="col-sm-3 col-form-label">Bukti</label>
                                                            <div class="col-sm-8">
                                                                <img src="/img/aduan/<?= $d->gambar; ?>" style="width:400px ;">
                                                            </div>
                                                        </div>

                                                        <div class="row mb-3">
                                                            <label for="status" class="col-sm-3 col-form-label">Status</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control" id="status" name="status" placeholder="<?= $d->status; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="tgl_buat" class="col-sm-3 col-form-label">Tanggal Dibuat</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control" id="tgl_buat" name="tgl_buat" placeholder="<?= $d->created_at; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label for="tgl_respon" class="col-sm-3 col-form-label">Tanggal Respon</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control" id="tgl_respon" name="tgl_respon" placeholder="<?= $d->updated_at; ?>">
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <?php else : ?>
                                <tr class="py-auto">
                                    <td colspan="5" class="text-center">
                                        <small >Belum Ada Pengaduan Masuk</small>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
            <div class="card mb-4 mt-4">
            <div class="card-header">
                </div>
                <div class="card-body">
                    <table id="datatablesSimple" class="table table-bordered">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>Waktu Dibuat</th>
                                <th>Detail Saran</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if($saran) : ?>
                            <?php $id = 1 ?>
                                <?php foreach ($saran as $s) : ?>
                                    <tr>
                                        <td><?= $id++; ?></td>
                                        <td><?= $s['selisihWaktu']; ?></td>
                                        <td><?= $s['saran']; ?></td>
                                    </tr><?php endforeach; ?>
                                <?php else : ?>
                                    <tr>
                                        <td colspan="5">
                                            <small>Belum Pernah Memberikan saran</small>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

    </main>
    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Website Desa Kembuan &copy; <?= date('Y'); ?></div>
            </div>
        </div>
    </footer>
</div>
</div>
<?= $this->endSection(); ?>