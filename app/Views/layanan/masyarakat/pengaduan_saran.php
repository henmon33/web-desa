<?= $this->extend('layanan/layout/navbar_masyarakat'); ?>
<?= $this->section('content'); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">

            <div class="card mb-4 mt-4">
                <div class="card-header">
                    <button type="button" class="btn btn-primary buat_aduan" data-bs-toggle="modal" data-bs-target="#modaltambahaduan">
                        <i class="fa-solid fa-pen-to-square"></i>
                        Buat Pengaduan
                    </button>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatablesSimple" class="table table-bordered border-dark text-center">
                            <thead>
                                <tr>
                                    <th>Tanggal Pengaduan</th>
                                    <th>Detail Pengaduan</th>
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
                                        <td>
                                            <?= character_limiter($d->aduan, 20); ?></td>
                                        <td>
                                            <img src="/img/aduan/<?= $d->gambar; ?>" id="gambar_saran" class="img-thumbnail" id="gambar_aduan">
                                        </td>
                                        <td class="text-uppercase fw-bold align-middle <?= ($d->status == "selesai") ? 'table-primary' : 'table-danger'; ?>">
                                            <?= $d->status; ?>

                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-primary buat_aduan" data-bs-toggle="modal" data-bs-target="#modalrincianaduan<?= $d->id; ?>">
                                                Rincian
                                            </button>
                                        </td>
                                    </tr>

                                    <!-- Modal rincian aduan -->
                                    <div class="modal fade" id="modalrincianaduan<?= $d->id; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">Detail Data Penduduk</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="alert alert-success sukses" role="alert" style="display: none;"></div>
                                                <div class="alert alert-danger error" role="alert" style="display: none;"></div>
                                                <div class="modal-body">
                                                    <div class="row mb-3">
                                                        <label for="gambar" class="col-sm-3 col-form-label">Bukti Aduan</label>
                                                        <div class="col-sm-8">
                                                            <img src="/img/aduan/<?= $d->gambar; ?>" class="img-thumbnail" id="detail_gambar_aduan" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="aduan" class="col-sm-3 col-form-label">Detail Aduan</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="aduan" name="aduan" value="<?= $d->aduan; ?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="aduan" class="col-sm-3 col-form-label">Status</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="aduan" name="aduan" value="<?= $d->status; ?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="aduan" class="col-sm-3 col-form-label">Tanggal Diadukan</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="aduan" name="aduan" value="<?= $d->created_at; ?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="aduan" class="col-sm-3 col-form-label">Tanggal Selesai</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="aduan" name="aduan" value="<?= $d->updated_at; ?>" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- akhir dari modal rincian aduan -->

                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <tr>
                                        <td colspan="5">
                                            <small>Belum Pernah Membuat Aduan</small>
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
                    <button type="button" class="btn btn-primary buat_saran" data-bs-toggle="modal" data-bs-target="#modalsaran">
                            <i class="fa-solid fa-pen-to-square"></i>
                            Buat Saran
                        </button>
                </div>
                <div class="card-body">
                    <table id="datatablesSimple" class="table">
                        <thead>
                            <tr>
                                <th>Waktu Dibuat</th>
                                <th>Detail Saran</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if($saran) : ?>
                                <?php foreach ($saran as $s) : ?>
                                    <tr>
                                        <td><?= $s->created_at; ?></td>
                                        <td><?= $s->saran; ?></td>
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
        </div>
        <!-- Modal tambah aduan -->
        <div class="modal fade" id="modaltambahaduan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                    <div class="modal-content">
                        <?php if (session()->getFlashdata('pesan')) : ?>
                            <div class="alert alert-success" role="alert">
                                <?= session()->getFlashdata('pesan'); ?>
                            </div>
                        <?php endif; ?>
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Buat Pengaduan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="alert alert-success sukses" role="alert" style="display: none;"></div>
                        <div class="alert alert-danger error" role="alert" style="display: none;"></div>
                        <form action="#" method="POST" enctype="multipart/form-data" id="buataduan" novalidate>
                            <?= csrf_field() ?>
                            <div class="modal-body">
                                <input type="hidden" id="nik" name="nik" value="<?= $username['nik']; ?>">
                                <div class="row mb-3">
                                    <label for="input_aduan" class="col-sm-3 col-form-label">Detail Aduan</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control " id="input_aduan" name="input_aduan">
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="gambar" class="col-sm-3 col-form-label">Bukti Aduan</label>
                                    <div class="col-sm-8">
                                        <input class="form-control " type="file" id="gambar" name="gambar">
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary" id="btn_buat_aduan">Buat Pengaduan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal tambah saran -->
        <div class="modal fade" id="modalsaran" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                    <div class="modal-content">
                        <?php if (session()->getFlashdata('pesan')) : ?>
                            <div class="alert alert-success" role="alert">
                                <?= session()->getFlashdata('pesan'); ?>
                            </div>
                        <?php endif; ?>
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Buat Saran</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="alert alert-success sukses" role="alert" style="display: none;"></div>
                        <div class="alert alert-danger error" role="alert" style="display: none;"></div>
                        <form action="#" method="POST" id="buatsaran" novalidate>
                            <?= csrf_field() ?>
                            <div class="modal-body">
                                <input type="hidden" id="nik" name="nik" value="<?= $username['nik']; ?>">
                                <div class="row mb-3">
                                    <label for="input_saran" class="col-sm-3 col-form-label">Detail Saran</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="input_saran" name="input_saran">
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary" id="btn_buat_saran">Buat Saran</button>
                        </form>
                    </div>
                </div>
            </div>
    </main>
    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy; Your Website 2022</div>
            </div>
        </div>
    </footer>
</div>
</div>

<script>
    $(function() {
        // add new post ajax request
        $("#buataduan").submit(function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            if (!this.checkValidity()) {
                e.preventDefault();
                $(this).addClass('was-validated');
            } else {
                $.ajax({
                    url: '<?= base_url('masyarakat/buat_aduan') ?>',
                    method: 'post',
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData: false,
                    dataType: 'json',
                    success: function(response) {
                        if (response.error) {
                            console.log(response)
                            if (response.message.input_aduan) {
                                $("#input_aduan").addClass('is-invalid');
                                $("#input_aduan").next().text(response.message.input_aduan);

                            }
                            if (response.message.input_aduan == null) {
                                $("#input_aduan").removeClass('is-invalid');
                                $("#input_aduan").next().text('');
                            }
                            if (response.message.gambar) {
                                $("#gambar").addClass('is-invalid');
                                $("#gambar").next().text(response.message.gambar);
                            }
                            if (response.message.gambar == null) {
                                $("#gambar").removeClass('is-invalid');
                            }
                        } else {
                            $("#modaltambahaduan").modal('hide');
                            $("#buataduan")[0].reset();
                            $("#input_aduan").removeClass('is-invalid');
                            $("#gambar").removeClass('is-invalid');
                            $("#gambar").next().text('');
                            $("#aduan").next().text('');
                            $("#buataduan").removeClass('was-validated');
                            Swal.fire(
                                'Berhasil',
                                response.message,
                                'success'
                            );
                        }
                    }
                });
            }
        });
    })

    $(function() {
        // add new post ajax request
        $("#buatsaran").submit(function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            if (!this.checkValidity()) {
                e.preventDefault();
                $(this).addClass('was-validated');
            } else {
                $.ajax({
                    url: '<?= base_url('masyarakat/buat_saran') ?>',
                    method: 'post',
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData: false,
                    dataType: 'json',
                    success: function(response) {
                        if (response.error) {
                            console.log(response)
                            if (response.message.input_saran) {
                                $("#input_saran").addClass('is-invalid');
                                $("#input_saran").next().text(response.message.input_saran);

                            }
                            if (response.message.input_saran == null) {
                                $("#input_saran").removeClass('is-invalid');
                            }
                        } else {
                            $("#modalsaran").modal('hide');
                            $("#buatsaran")[0].reset();
                            $("#input_saran").removeClass('is-invalid');
                            $("#input_saran").next().text('');
                            $("#buatsaran").removeClass('was-validated');
                            Swal.fire(
                                'Berhasil',
                                response.message,
                                'success'
                            );
                        }
                    }
                });
            }
        });
    })
</script>

<?= $this->endSection(); ?>