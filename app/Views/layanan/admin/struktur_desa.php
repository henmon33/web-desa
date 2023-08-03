<?= $this->extend('layanan/layout/navbar_pegawai'); ?>
<?= $this->section('content'); ?>
    <div id="layoutSidenav_content">
        <main>
        <div class="container-fluid px-4 d-flex flex-wrap">
        <h1 class="mt-4">Struktur Kepegawaian Desa Kembuan</h1>
            <div class="card mb-4">
                <div class="card-header">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modaltambah">
                        <i class="fa-solid fa-pen-to-square"></i>
                        Tambah Data Jabatan
                    </button>
                </div>
                <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="flash-data" data-flashdata="<?= session()->getFlashdata('pesan'); ?>"></div>
                <?php endif; ?>
                <div class="card-body">
                <div class="row justify-content-center">
                    <div class="row ">
                        <?php foreach ($struktur as $s) : ?>
                            <?php if ($s['jabatan'] == 'Hukum Tua') : ?>
                                <div class="col ">
                                    <div class="card border border-danger mx-auto my-1 px-2 py-2  text-center shadow-lg p-3 mb-5 bg-body-tertiary rounded" style="width: 18rem;">
                                        <img src="/img/struktur/<?= $s['gambar']; ?>" class="img-fluid">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $s['nama'] ?></h5>
                                            <p class="card-text"><?= $s['jabatan'] ?></p>
                                            <div class="inline">
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalubah<?= $s['id']; ?>">
                                                Ubah Data
                                                </button>
                                                <button class="btn btn-danger btn-hapus" data-id="<?= $s['id']; ?>">Hapus</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                    <div class="row py-2">
                        <?php foreach ($struktur as $s) : ?>
                            <?php if(strpos(strtolower($s['jabatan']), 'sekertaris desa') !== false ) : ?>
                                <div class="col ">
                                <div class="card border border-danger mx-auto my-1 px-2 py-2 text-center shadow-lg p-3 mb-5 bg-body-tertiary rounded " style="width: 18rem;">
                                        <img src="/img/struktur/<?= $s['gambar']; ?>" class="img-fluid">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $s['nama'] ?></h5>
                                            <p class="card-text"><?= $s['jabatan'] ?></p>
                                            <div class="inline">
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalubah<?= $s['id']; ?>">
                                                Ubah Data
                                                </button>
                                                <button class="btn btn-danger btn-hapus" data-id="<?= $s['id']; ?>">Hapus</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                    <div class="row py-2">
                    <?php foreach ($struktur as $s) : ?>
                        <?php if(strpos(strtolower($s['jabatan']), 'kepala seksi') !== false) : ?>
                            <div class="col">
                                    <div class="card border border-danger mx-auto my-1 py-2 text-center shadow-lg p-3 mb-5 bg-body-tertiary rounded " style="width: 18rem;">
                                        <img src="/img/struktur/<?= $s['gambar']; ?>" class="img-fluid">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $s['nama'] ?></h5>
                                            <p class="card-text"><?= $s['jabatan'] ?></p>
                                            <div class="inline">
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalubah<?= $s['id']; ?>">
                                                Ubah Data
                                                </button>
                                                <button class="btn btn-danger btn-hapus" data-id="<?= $s['id']; ?>">Hapus</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    </div>
                    <div class="row py-2">
                    <?php foreach ($struktur as $s) : ?>
                        <?php if(strpos(strtolower($s['jabatan']), 'kepala lingkungan') !== false) : ?>
                            <div class="col">
                                    <div class="card border border-danger mx-auto my-1 px-2 py-2 text-center shadow-lg p-3 mb-5 bg-body-tertiary rounded" style="width: 18rem;">
                                        <img src="/img/struktur/<?= $s['gambar']; ?>" class="img-fluid">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $s['nama'] ?></h5>
                                            <p class="card-text"><?= $s['jabatan'] ?></p>
                                            <div class="inline">
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalubah<?= $s['id']; ?>">
                                                    Ubah Data
                                                </button>
                                                <button class="btn btn-danger btn-hapus" data-id="<?= $s['id']; ?>">Hapus</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php endif; ?>
                        

                        <!-- Modal -->
                        <div class="modal fade" id="modalubah<?= $s['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Ubah Data Jabatan</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                
                                <form id="formUbah" action="" method="post" enctype="multipart/form-data">
                                        <input type="hidden" class="form-control" id="id" name="id" value="<?= $s['id']; ?>">        
                                        <div class="row mb-3">
                                            <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="nama" name="nama" value="<?= $s['nama']; ?>">
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="jabatan" class="col-sm-3 col-form-label">Jabatan</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?= $s['jabatan']; ?>">
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="nama" class="col-sm-3 col-form-label">Foto Pegawai</label>
                                            <div class="col-sm-8">
                                                <?php if ($s['gambar']) : ?>
                                                    <img src="/img/struktur/<?= $s['gambar']; ?>" alt="gambar" class="img-thumbnail"  style="width:200px ;">
                                                <?php else : ?>
                                                <br>
                                                    <span>Foto Pegawai Belum Diunggah</span>
                                                <?php endif; ?>
                                                <input type="file" class="form-control" id="gambar" name="gambar" aria-describedby="inputGroupFileAddon03" aria-label="Upload" value="<?= $s['gambar'] ?>">
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="gambar_lama" value="<?= $s['gambar'] ?>">
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Ubah Data</button>
                                    </div>
                                </form>

                                </div>
                                
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="modaltambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data Jabatan</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                
                                <form id="formTambah" action="" method="post" enctype="multipart/form-data"> 
                                        <div class="row mb-3">
                                            <label for="tambah_nama" class="col-sm-3 col-form-label">Nama</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="tambah_nama" name="tambah_nama">
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="tambah_jabatan" class="col-sm-3 col-form-label">Jabatan</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="tambah_jabatan" name="tambah_jabatan">
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="tambah_gambar" class="col-sm-3 col-form-label">Foto Pegawai</label>
                                            <div class="col-sm-8">
                                                <input type="file" class="form-control" id="tambah_gambar" name="tambah_gambar" aria-describedby="Pilih Gambar" aria-label="Pilih Gambar">
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                                    </div>
                                </form>

                                </div>
                                
                                </div>
                            </div>
                        </div>
            </div>
        </div>
        </main>
    </div>

    <script>
    $("#formTambah").submit(function(e) {
        
        e.preventDefault();
        const formData = new FormData(this);
            $.ajax({
                url: '<?= site_url('admin/tambah_struktur') ?>',
                method: 'post',
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                dataType: 'json',
                success: function(response) {
                    if (response.error) {
                        console.log(response.message);
                        if (response.message.tambah_nama) {
                            $("#tambah_nama").addClass('is-invalid');
                            $("#tambah_nama").next().text(response.message.tambah_nama);
                        }
                        if (response.message.tambah_nama == null) {
                            $("#tambah_nama").removeClass('is-invalid');
                        }
                        if (response.message.tambah_jabatan) {
                            $("#tambah_jabatan").addClass('is-invalid');
                            $("#tambah_jabatan").next().text(response.message.tambah_jabatan);
                        }
                        if (response.message.tambah_jabatan == null) {
                            $("#tambah_jabatan").removeClass('is-invalid');
                        }
                        if (response.message.tambah_gambar) {
                            $("#tambah_gambar").addClass('is-invalid');
                            $("#tambah_gambar").next().text(response.message.tambah_gambar);
                        }
                        if (response.message.tambah_gambar == null) {
                            $("#tambah_gambar").removeClass('is-invalid');
                        }
                    } else {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: response.message,
                            showConfirmButton: false,
                        })
                        setTimeout(function() {
                            location.reload();
                        }, 800);
                    }
                }
            })
    })

    $(document).on('click', '.btn-hapus', function (e) {
        e.preventDefault();

        const id = $(this).data('id');

        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Anda tidak akan dapat mengembalikan data yang dihapus!",
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
                    url: '/admin/hapus_struktur/' + id,
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
                        }, 1500); // Refresh halaman setelah notifikasi berhasil muncul
                    }
                });
            }
        });
    });

    $('#formUbah').submit(function(e) {
        e.preventDefault();
        const formData = new FormData(this);
        var $id = $('#id').val();
        $.ajax({
            url: '<?= site_url('admin/ubah_struktur/') ?>' + $id,
            method: 'post',
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            dataType: 'json',
            success: function(response) {
                if (response.error) {
                    // Jika terdapat error validasi, tampilkan pesan error
                    if (response.message.nama) {
                        $("#nama").addClass('is-invalid');
                        $("#nama").next().text(response.message.nama);
                    }
                    if (response.message.nama == null) {
                        $("#nama").removeClass('is-invalid');
                    }
                    if (response.message.jabatan) {
                        $("#jabatan").addClass('is-invalid');
                        $("#jabatan").next().text(response.message.jabatan);
                    }
                    if (response.message.jabatan == null) {
                        $("#jabatan").removeClass('is-invalid');
                    }
                } else {
                    Swal.fire({
                        icon: 'success',
                        text: response.message,
                        showConfirmButton: false,
                    })
                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                }
            }
        });
    });

    </script>
<?= $this->endSection(); ?>