<?= $this->extend('layanan/layout/navbar_bumdes'); ?>
<?= $this->section('content'); ?>
    <div id="layoutSidenav_content">
        <main>
        <div class="container-fluid ">
        <h1 class="mt-4">Data Usaha Saya</h1>
            <div class="card mb-4">
                <div class="card-header">
                <a href="/bumdes/tambah_bumdes" class="btn btn-primary">
                        <i class="fa-solid fa-pen-to-square"></i>
                        Tambah Data BUMDes
                </a>
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
                                    <div class="mb-3 row">
                                        <label for="deskripsi" class="col-sm-2 col-form-label fw-bold">Deskripsi</label>
                                        <div class="col-sm-10">
                                            <p class="me-4" style="text-align: justify;"><?= htmlspecialchars($b['deskripsi']); ?></p>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="stok" class="col-sm-2 col-form-label fw-bold">Stok</label>
                                        <div class="col-sm-10">
                                            <p style="text-align: justify;"><?= $b['stok']; ?></p>
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
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger btn-hapus" data-id="<?= $b['id']; ?>">Hapus Data</button>
                                    <a href="/bumdes/ubah_bumdes/<?= $b['id']; ?>" class="btn btn-primary">Ubah Data</a>
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
<script>
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
                    url: '/bumdes/hapus_bumdes/' + id,
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
</script>
<?= $this->endSection(); ?>