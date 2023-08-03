<?= $this->extend('layanan/layout/navbar_administrasi'); ?>
<?= $this->section('content'); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">

            <div class="card mb-4 mt-4">
                <div class="card-header">
                    <h5>
                        <i class="fas fa-table me-1"></i>
                        Tabel Surat <?= $status; ?>
                    </h5>

                </div>
                <div class="card-body">
                    <?php if (session()->getFlashdata('pesan')) : ?>
                        <div class="alert alert-success" role="alert">
                            <?= session()->getFlashdata('pesan'); ?>
                        </div>
                    <?php endif; ?>

                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Pengajuan</th>
                                <th>NIK</th>
                                <th>Jenis Surat</th>
                                <th>Status</th>
                                <th>Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = "1"; ?>
                            <?php foreach ($data_surat as $d) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= (new DateTime($d['created_at']))->format('d/m/Y'); ?></td>
                                    <td><?= $d['nik']; ?></td>
                                    <td><?= $d['jenis_surat']; ?></td>
                                    <td style="text-transform: uppercase ;"><?= $d['status']; ?></td>
                                    <td>
                                        <?php if ($d['status'] == "DIAJUKAN") : ?>
                                            <!-- Button trigger modal proses  -->
                                            <a href="/administrasi/rincian_surat/<?= $d['id']; ?>">
                                                <button type="button" class="btn btn-primary" >
                                                    Rincian
                                                </button>
                                            </a>
                                            
                                        <?php endif; ?>
                                        <?php if ($d['status'] == "DIPROSES") : ?>
                                            <a target="_blank" href="/administrasi/cetak/<?= $d['id']; ?>/<?= $d['nik']; ?>/<?= $d['jenis_surat']; ?>">
                                                <button type="button" class="btn btn-primary">
                                                <i class="fa-solid fa-print fa-sm"></i>
                                                    Cetak
                                                </button>
                                            </a>
                                        <?php endif; ?>
                                        <?php if ($d['status'] == "DICETAK") : ?>
                                            <a target="_blank" href="/administrasi/cetak/<?= $d['id']; ?>/<?= $d['nik']; ?>/<?= $d['jenis_surat']; ?>">
                                                <button type="button" class="btn btn-primary">
                                                <i class="fa-solid fa-print fa-sm"></i>
                                                    Cetak Ulang
                                                </button>
                                            </a>
                                            <a href="/administrasi/surat_selesai/<?= $d['id']; ?>">
                                                <button type="button" class="btn btn-primary">
                                                    <i class="fa-solid fa-circle-check fa-sm"></i>
                                                    Selesai
                                                </button>
                                            </a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                    <!-- Modal Tolak-->
                    <div class="modal fade" id="tolakmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Rincian Pengurusan Surat</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="reload()"></button>
                                </div>
                                <div class="modal-body">

                                    <form action="" id="formtolak" novalidate>
                                        <?= csrf_field() ?>
                                        <input type="hidden" name="id" id="inputid">
                                        <div class="row mb-3">
                                            <label for="nik" class="col-sm-3 col-form-label">NIK</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="inputnik" name="nik" readonly>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="jenis_surat" class="col-sm-3 col-form-label">Jenis Surat</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="inputjenis_surat" name="jenis_surat" readonly>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="keperluan" class="col-sm-3 col-form-label">Tujuan Pengurusan</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="inputkeperluan" name="keperluan" readonly>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="status" class="col-sm-3 col-form-label">Status</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="inputstatus" name="status" readonly>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="alasan" class="col-sm-3 col-form-label">Alasan Penolakan</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control <?= ($validation->hasError('alasan')) ? 'is-invalid' : ''; ?>" id="alasan" name="alasan" placeholder="Masukan Alasan Ditolak">
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-danger" id="btn-tolak">Tolak</button>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="reload()">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
</div>
<script>

    function reload(){
        location.reload();
    }
    function tampil_modal($status){
        console.log($status);
        if ($status == "Surat Keterangan Usaha") {
            $('#dokumen_ktp').show();
            $('#dokumen_kk').hide();
            $('#dokumen_surat_rt').hide();
            $('#dokumen_surat_keterangan_dokter').hide();
            $('#dokumen_akta_kelahiran').hide();
            $('#dokumen_ktp_yang_meninggal').hide();
            $('#dokumen_kematian_rs').hide();
            $('#dokumen_ktp_pasangan').hide();
            $('#dokumen_foto_barang_hilang').hide();
        };
        if ($status == 'Surat Keterangan Tidak Mampu') {
            $('#dokumen_ktp').show();
            $('#dokumen_kk').show();
            $('#dokumen_surat_rt').show();
            $('#dokumen_surat_keterangan_dokter').hide();
            $('#dokumen_ktp_yang_meninggal').hide();
            $('#dokumen_kematian_rs').hide();
            $('#dokumen_ktp_pasangan').hide();
            $('#dokumen_foto_barang_hilang').hide();
            $('#dokumen_akta_kelahiran').hide();
            $('#dokumen_akta_nikah').hide();
        }; 
        if ($status == 'Surat Kelahiran') {
            $('#dokumen_ktp').show();
            $('#dokumen_surat_rt').show();
            $('#dokumen_surat_keterangan_dokter').show();
            $('#dokumen_ktp_yang_meninggal').hide();
            $('#dokumen_kk').hide();
            $('#dokumen_kematian_rs').hide();
            $('#dokumen_ktp_pasangan').hide();
            $('#dokumen_foto_barang_hilang').hide();
            $('#dokumen_akta_kelahiran').hide();
            $('#dokumen_akta_nikah').hide();
        };
        if ($status == 'Surat Pengantar Pembuatan KTP') {
            $('#dokumen_kk').show();
            $('#dokumen_akta_kelahiran').show();
            $('#dokumen_surat_rt').show();
            $('#tgl_lahir').show();
            $('#dokumen_ktp').hide();
            $('#dokumen_surat_keterangan_dokter').hide();
            $('#dokumen_ktp_yang_meninggal').hide();
            $('#dokumen_kematian_rs').hide();
            $('#dokumen_ktp_pasangan').hide();
            $('#dokumen_foto_barang_hilang').hide();
            $('#dokumen_akta_nikah').hide();
        }
        if ($status == 'Surat Pengantar Pembuatan KK') {
                $('#dokumen_ktp').show();
                $('#dokumen_ktp_pasangan').show();
                $('#dokumen_akta_nikah').show();
                $('#dokumen_surat_rt').show();
                $('#dokumen_kk').hide();
                $('#dokumen_akta_kelahiran').hide();
                $('#dokumen_surat_keterangan_dokter').hide();
                $('#dokumen_ktp_yang_meninggal').hide();
                $('#dokumen_kematian_rs').hide();
                $('#dokumen_foto_barang_hilang').hide();
        }
        if ($status == 'Surat Pengantar SKCK') {
            $('#dokumen_ktp').show();
            $('#dokumen_kk').show();
            $('#dokumen_akta_kelahiran').show();
            $('#dokumen_surat_rt').hide();
            $('#dokumen_ktp_pasangan').hide();
            $('#dokumen_akta_nikah').hide();
            $('#dokumen_surat_keterangan_dokter').hide();
            $('#dokumen_ktp_yang_meninggal').hide();
            $('#dokumen_kematian_rs').hide();
            $('#dokumen_foto_barang_hilang').hide();
        }
        if ($status == 'Surat Kehilangan') {
            $('#dokumen_kk').show();
            $('#dokumen_surat_rt').show();
            $('#dokumen_foto_barang_hilang').show();
            $('#dokumen_ktp').hide();
            $('#dokumen_ktp_pasangan').hide();
            $('#dokumen_akta_nikah').hide();
            $('#dokumen_akta_kelahiran').hide();
            $('#dokumen_surat_keterangan_dokter').hide();
            $('#dokumen_ktp_yang_meninggal').hide();
            $('#dokumen_kematian_rs').hide();
        }
        if ($status == 'Surat Keterangan Pindah Tempat') {
            $('#dokumen_ktp').show();
            $('#dokumen_kk').show();
            $('#dokumen_surat_rt').show();
            $('#dokumen_foto_barang_hilang').hide();
            $('#dokumen_ktp_pasangan').hide();
            $('#dokumen_akta_nikah').hide();
            $('#dokumen_akta_kelahiran').hide();
            $('#dokumen_surat_keterangan_dokter').hide();
            $('#dokumen_ktp_yang_meninggal').hide();
            $('#dokumen_kematian_rs').hide();
        };
        if ($status == 'Surat Kematian') {
            $('#dokumen_ktp_yang_meninggal').show();
            $('#dokumen_kk').show();
            $('#dokumen_surat_rt').show();
            $('#dokumen_ktp').show();
            $('#dokumen_kematian_rs').show();
            $('#dokumen_surat_keterangan_dokter').hide();
            $('#dokumen_foto_barang_hilang').hide();
            $('#dokumen_ktp_pasangan').hide();
            $('#dokumen_akta_nikah').hide();
            $('#dokumen_akta_kelahiran').hide();
            $('#dokumen_surat_keterangan_dokter').hide();
        }
    }
    
    $("#formtolak").submit(function(e) {
        e.preventDefault();
        // const formData = new FormData(this);
        if (!this.checkValidity()) {
            e.preventDefault();
            $(this).addClass('was-validated');
            console.log(response.message);
        } else {
            var $id = $('#inputid').val();
            var $nik = $('#inputnik').val();
            var $jenis = $('#inputjenis_surat').val();
            var $keperluan = $('#inputkeperluan').val();
            var $status = $('#inputstatus').val();
            var $alasan = $('#alasan').val();
            $.ajax({
                url: '<?= site_url('adminstrasi/menolak') ?>',
                type: 'post',
                data: {
                    id: $id,
                    nik: $nik,
                    jenis_surat: $jenis,
                    keperluan: $keperluan,
                    status: $status,
                    alasan: $alasan
                },
                dataType: 'json',
                success: function(response) {
                    if (response.error) {
                        $("#alasan").addClass('is-invalid');
                        $("#alasan").next().text(response.message.alasan);

                    } else {
                        $("#tolakmodal").modal('hide');
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: response.message,
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                }
            })
        }
    })
</script>
<?= $this->endSection(); ?>