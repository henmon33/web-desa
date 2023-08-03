<?= $this->extend('layanan/layout/navbar_pegawai'); ?>
<?= $this->section('content'); ?>
    <div id="layoutSidenav_content">
        <main>
        <div class="container-fluid">
        <h1 class="mt-4">Badan Usaha Milik Desa</h1>
            <div class="card mb-4">
                <div class="card-header">
                    <h4>Data Seluruh Pengelola BUMDes</h4>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahkelolaModal">
                            <i class="fa-solid fa-pen-to-square"></i>
                            Tambah Pengelola BUMDes
                    </button>
                </div>
                <div class="card-body">
                    <?php if (session()->getFlashdata('pesan')) : ?>
                        <div class="flash-data" data-flashdata="<?= session()->getFlashdata('pesan'); ?>"></div>
                    <?php endif; ?>
                    <div class="row">
                        <div class="table-responsive">
                        <table id="datatablesSimple" class="table table-striped">
                            <thead >
                                <tr >
                                    <th >Nama</th>
                                    <th>Nama Usaha</th>
                                    <th>Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($kelola_usaha as $k) : ?>
                                    <tr>
                                        <td><?= $k['nama']; ?></td>
                                        <td>
                                            <ol class="list-group list-group-numbered">
                                                <?php foreach ($k['usaha'] as $usaha) : ?>
                                                    <li class="list-group-item"> <?= $usaha['nama_usaha']; ?></li>
                                                <?php endforeach; ?>
                                            </ol>
                                        </td>
                                        <td>
                                            <div class="container text-center">
                                                    <div class="col">
                                                        
                                                        <button type="btn" class="btn btn-danger btn-hapus-pengelola" data-id="<?= $k['id']; ?>">Hapus </button>
                                                        
                                                    </div>
                                            </div>
                                        </td>

                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <h4>Data Seluruh BUMDes</h4>
                </div>
                <div class="card-body">
                    <?php if (session()->getFlashdata('pesan')) : ?>
                        <div class="flash-data" data-flashdata="<?= session()->getFlashdata('pesan'); ?>"></div>
                    <?php endif; ?>
                    <div class="row">
                    <?php foreach($bumdes as $b) : ?>

                        <div class="card col-lg-4 col-md-6 mx-2 my-2 d-flex align-items-stretch" style="width: 20rem;">
                        <img src="/img/bumdes/<?= $b['gambar']; ?>" class="card-img-top rounded mx-auto mt-2 " style="width: 90%; height: 170px;">
                        <div class="card-body">
                            <h5 class="card-title"><?= $b['nama_usaha']; ?></h5>
                            <p class="card-text" style="text-align: justify;"><small class="text-body-secondary"><?= word_limiter($b['deskripsi'], 20, '...'); ?></small></p>
                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalrinci<?= $b['id']; ?>" >Baca Selengkapnya</button>
                        </div>
                        </div>

                        <!-- modal -->
                        <div class="modal fade" id="modalrinci<?= $b['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"><?= $b['nama_usaha']; ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <img src="/img/bumdes/<?= $b['gambar']; ?>" class="mx-auto d-block my-4" style="width: 90%; height: 350px;">
                                    <div class="row mb-3">
                                        <div class="col-md-2">
                                            <label for="deskripsi" class="form-label fw-bold" id="deskripsi-label">Deskripsi</label>
                                        </div>
                                        <div class="col-md-10">
                                            <p style="text-align: justify;"><?= htmlspecialchars($b['deskripsi']); ?></p>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="alamat" class="col-sm-2 col-form-label fw-bold">Alamat</label>
                                        <div class="col-sm-10">
                                        <p style="text-align: justify;"><?= $b['alamat']; ?></p>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="kontak" class="col-sm-2 col-form-label fw-bold">kontak</label>
                                        <div class="col-sm-10">
                                            <p style="text-align: justify;"><?= $b['kontak']; ?></p>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="kontak" class="col-sm-2 col-form-label fw-bold">Pengelola</label>
                                        <div class="col-sm-10">
                                            <p style="text-align: justify;"><?= $b['username']; ?></p>
                                        </div>
                                    </div>
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
        <!-- Modal -->
        <div class="modal fade" id="tambahkelolaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Pengelola BUMDes</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" id="tambah_kelola">
                <div class="modal-body">
                    <div class="mb-3 row">
                        <label for="username" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="username" name="username" autocomplete="off">
                        <div class="invalid-feedback"></div>    
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" name="password" autocomplete="new-password">
                        <div class="invalid-feedback"></div>
                    </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Tambah Pengelola</button>
                </div>
            </form>
                </div>
            </div>
        </div>
        <!-- modal -->
    </div>
<script>
    $(document).on('click', '.btn-hapus-pengelola', function (e) {
        e.preventDefault();
        const id = $(this).data('id');
        console.log(id);
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data Usaha Yang Bersangkutan Akan Ikut Terhapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus data!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Jika user mengklik tombol "Ya, hapus berita"
                $.ajax({
                    url: '/admin/hapus_pengelola_bumdes/' + id,
                    type: 'DELETE',
                    success: function (response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: response.message,
                            showConfirmButton: false,
                            timer: 1500
                        });
                        setTimeout(() => {
                            location.reload();
                        }, 750); // Refresh halaman setelah notifikasi berhasil muncul
                    }
                });
            }
        });
    });

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

    $("#tambah_kelola").submit(function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            if (!this.checkValidity()) {
                e.preventDefault();
                $(this).addClass('was-validated');
            } else {
                $.ajax({
                    url: '<?= base_url('admin/tambah_pengelola_bumdes') ?>',
                    method: 'post',
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData: false,
                    dataType: 'json',
                    success: function(response) {
                        if (response.error) {
                            if (response.message.username) {
                                $("#username").addClass('is-invalid');
                                $("#username").next().text(response.message.username);

                            }
                            if (response.message.username == null) {
                                $("#username").removeClass('is-invalid');
                                $("#username").next().text('');
                            }
                            if (response.message.password) {
                                $("#password").addClass('is-invalid');
                                $("#password").next().text(response.message.password);
                            }
                            if (response.message.password == null) {
                                $("#password").removeClass('is-invalid');
                            }
                        } else {
                            Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: response.message,
                            showConfirmButton: false,
                            timer: 1500
                            });
                            location.reload(); 
                        }
                    }
                });
            }
        });
</script>
<?= $this->endSection(); ?>