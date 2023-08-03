<?= $this->extend('layanan/layout/navbar_pegawai'); ?>
<?= $this->section('content'); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="card mb-4 mt-3">
                <div class="card-header">
                    <h4><i class="fas fa-table me-1"></i>Data Anak</h4>
                </div>

                <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('pesan'); ?>
                    </div>
                <?php endif; ?>
                <div class="card-body">
                    <button type="button" class="btn btn-primary my-2" data-bs-toggle="modal" data-bs-target="#tambahmodal">
                        Tambah Data Anak
                    </button>
                    <div class="table-responsive">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Nama Anak</th>
                                <th>Jenis Kelamin</th>
                                <th>Tanggal Lahir</th>
                                <th>Nama Ayah</th>
                                <th>Nama Ibu</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($dataanak as $d) : ?>
                                <tr>
                                    <td><?= $d->nama; ?></td>
                                    <td><?= $d->jenis_kelamin; ?></td>
                                    <td><?= date("d-m-Y", strtotime($d->tgl_lahir)); ?></td>
                                    <td><?= $d->nama_ayah; ?></td>
                                    <td><?= $d->nama_ibu; ?></td>
                                    <td>
                                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ubahmodal<?= $d->id;?>">Ubah</button>
                                       <a href="/admin/hapus_data_anak/<?= $d->id; ?>" class="tombol_hapus">
                                        <button type="button" class="btn btn-danger" id="tombol_hapus">Hapus </button>
                                       </a>
                                    </td>
                                </tr>
                                <div class="modal fade" id="ubahmodal<?= $d->id; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Ubah Data Anak</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="reload()"></button>
                                        </div>
                                        <div class="modal-body">

                                            <form action="" id="formubah" novalidate>
                                                <?= csrf_field() ?>
                                                <input type="hidden" name="id" id="inputid" value="<?= $d->id; ?>">
                                                <div class="row mb-3">
                                                    <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $d->nama; ?>">
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="jenis_kelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" value="<?= $d->jenis_kelamin; ?>">
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="tgl_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                                    <div class="col-sm-8">
                                                        <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= $d->tgl_lahir; ?>">
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="nik_ayah" class="col-sm-3 col-form-label">NIK Ayah</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="nik_ayah" name="nik_ayah" value="<?= $d->nik_ayah; ?>">
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="nik_ibu" class="col-sm-3 col-form-label">NIK Ayah</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="nik_ibu" name="nik_ibu" value="<?= $d->nik_ibu; ?>">
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                </div>
                                                
                                                <button type="submit" class="btn btn-success" id="btn-ubah">Ubah</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             </div>

                            </div>
                            <?php endforeach; ?>
                            </tbody>
                    </table>
                    </div>
                    <div class="modal fade" id="tambahmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Anak</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="reload()"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="" id="formtambah" novalidate>
                                                <?= csrf_field() ?>
                                                <div class="row mb-3">
                                                    <label for="tambah_nama" class="col-sm-3 col-form-label">Nama</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="tambah_nama" name="tambah_nama">
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="tambah_jenis_kelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="tambah_jenis_kelamin" name="tambah_jenis_kelamin">
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="tambah_tgl_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                                    <div class="col-sm-8">
                                                        <input type="date" class="form-control" id="tambah_tgl_lahir" name="tambah_tgl_lahir">
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="tambah_nik_ayah" class="col-sm-3 col-form-label">NIK Ayah</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="tambah_nik_ayah" name="tambah_nik_ayah">
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="tambah_nik_ibu" class="col-sm-3 col-form-label">NIK Ayah</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="tambah_nik_ibu" name="tambah_nik_ibu">
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-success" id="btn-tambah">Tambah Data</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                </div>
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
<script>

    $("#formtambah").submit(function(e) {
    
        e.preventDefault();
        if (!this.checkValidity()) {
            e.preventDefault();
            $(this).addClass('was-validated');
            console.log(response.message);
        } else {
            var $nama = $('#tambah_nama').val();
            var $jenis_kelamin = $('#tambah_jenis_kelamin').val();
            var $tgl_lahir = $('#tambah_tgl_lahir').val();
            var $nik_ayah = $('#tambah_nik_ayah').val();
            var $nik_ibu = $('#tambah_nik_ibu').val();
            $.ajax({
                url: '<?= site_url('admin/tambah_data_anak') ?>' ,
                type: 'post',
                data: {
                    nama: $nama,
                    jenis_kelamin: $jenis_kelamin,
                    tgl_lahir: $tgl_lahir,
                    nik_ayah: $nik_ayah,
                    nik_ibu: $nik_ibu,
                },
                dataType: 'json',
                success: function(response) {
                    if (response.error) {
                        if (response.message.nama) {
                            $("#tambah_nama").addClass('is-invalid');
                            $("#tambah_nama").next().text(response.message.nama);
                        }
                        if (response.message.nama == null) {
                            $("#tambah_nama").removeClass('is-invalid');
                        }
                        if (response.message.jenis_kelamin) {
                            $("#tambah_jenis_kelamin").addClass('is-invalid');
                            $("#tambah_jenis_kelamin").next().text(response.message.jenis_kelamin);
                        }
                        if (response.message.jenis_kelamin == null) {
                            $("#tambah_jenis_kelamin").removeClass('is-invalid');
                        }
                        if (response.message.tgl_lahir) {
                            $("#tambah_tgl_lahir").addClass('is-invalid');
                            $("#tambah_tgl_lahir").next().text(response.message.tgl_lahir);
                        }
                        if (response.message.tgl_lahir == null) {
                            $("#tambah_tgl_lahir").removeClass('is-invalid');
                        }
                        if (response.message.nik_ayah) {
                            $("#tambah_nik_ayah").addClass('is-invalid');
                            $("#tambah_nik_ayah").next().text(response.message.nik_ayah);
                        }
                        if (response.message.nik_ayah == null) {
                            $("#tambah_nik_ayah").removeClass('is-invalid');
                        }
                        if (response.message.nik_ibu) {
                            $("#tambah_nik_ibu").addClass('is-invalid');
                            $("#tambah_nik_ibu").next().text(response.message.nik_ibu);
                        }
                        if (response.message.nik_ibu == null) {
                            $("#tambah_nik_ibu").removeClass('is-invalid');
                        }
                    } else {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: response.message,
                            showConfirmButton: false,
                            timer: 1500
                        });
                        location.href = "<?= site_url('admin/data_anak') ?>";
                    }
                }
            })
        }
    })
    $("#formubah").submit(function(e) {
    
        e.preventDefault();
        if (!this.checkValidity()) {
            e.preventDefault();
            $(this).addClass('was-validated');
            console.log(response.message);
        } else {
            var $id = $('#inputid').val();
            var $nama = $('#nama').val();
            var $jenis_kelamin = $('#jenis_kelamin').val();
            var $tgl_lahir = $('#tgl_lahir').val();
            var $nik_ayah = $('#nik_ayah').val();
            var $nik_ibu = $('#nik_ibu').val();
            $.ajax({
                url: '<?= site_url('admin/ubah_data_anak/') ?>' + $id,
                type: 'post',
                data: {
                    id: $id,
                    nama: $nama,
                    jenis_kelamin: $jenis_kelamin,
                    tgl_lahir: $tgl_lahir,
                    nik_ayah: $nik_ayah,
                    nik_ibu: $nik_ibu,
                },
                dataType: 'json',
                success: function(response) {
                    if (response.error) {
                        if (response.message.nama) {
                            $("#nama").addClass('is-invalid');
                            $("#nama").next().text(response.message.nama);
                        }
                        if (response.message.nama == null) {
                            $("#nama").removeClass('is-invalid');
                        }
                        if (response.message.jenis_kelamin) {
                            $("#jenis_kelamin").addClass('is-invalid');
                            $("#jenis_kelamin").next().text(response.message.jenis_kelamin);
                        }
                        if (response.message.jenis_kelamin == null) {
                            $("#jenis_kelamin").removeClass('is-invalid');
                        }
                        if (response.message.tgl_lahir) {
                            $("#tgl_lahir").addClass('is-invalid');
                            $("#tgl_lahir").next().text(response.message.tgl_lahir);
                        }
                        if (response.message.tgl_lahir == null) {
                            $("#tgl_lahir").removeClass('is-invalid');
                        }
                        if (response.message.nik_ayah) {
                            $("#nik_ayah").addClass('is-invalid');
                            $("#nik_ayah").next().text(response.message.nik_ayah);
                        }
                        if (response.message.nik_ayah == null) {
                            $("#nik_ayah").removeClass('is-invalid');
                        }
                        if (response.message.nik_ibu) {
                            $("#nik_ibu").addClass('is-invalid');
                            $("#nik_ibu").next().text(response.message.nik_ibu);
                        }
                        if (response.message.nik_ibu == null) {
                            $("#form_nik_ibu").removeClass('is-invalid');
                        }
                    } else {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: response.message,
                            showConfirmButton: false,
                            timer: 1500
                        });
                        location.href = "<?= site_url('admin/data_anak') ?>";
                    }
                }
            })
        }
    })
    $(".tombol_hapus").on('click', function(e){
        e.preventDefault();
        const href = $(this).attr('href');
        Swal.fire({
        title: 'Anda Yakin Ingin Menghapus Data Ini ?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus Data!'
        }).then((result) => {
        if (result.isConfirmed) {
            if(result.value){
            document.location.href = href;
            }
            
        }
        })

    })
    function reload(){
        location.reload();
    }

</script>
<?= $this->endSection(); ?>
