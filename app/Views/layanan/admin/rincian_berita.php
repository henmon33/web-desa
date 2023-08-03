<?= $this->extend('layanan/layout/navbar_pegawai'); ?>
<?= $this->section('content'); ?>
<div id="layoutSidenav_content">
    <main>
    <div class="container-fluid px-4">
            <h1 class="mt-4">Data Berita Desa</h1>

            <div class="card mb-4">
                <div class="card-header">
                <h2><span class="badge bg-primary">Rincian Berita Desa</span></h2>
                </div>
                <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('pesan'); ?>
                    </div>
                <?php endif; ?>
                <div class="card-body">
                    <form action="/admin/ubah_data_berita" method="POST" enctype="multipart/form-data" >
                        <fieldset disabled>
                            <div class="row mb-3">
                                <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="judul" name="judul" value="<?= $berita['judul']; ?>">
                                </div>
                            </div>
                            <div class="form-floating row mb-3">
                                <label for="keterangan" class="col-sm-2 col-form-label">Deskripsi</label>
                                <div class="col-sm-10 offset-sm-2">
                                    <textarea class="form-control" id="keterangan" name="keterangan" style="height: 400px;" ><?= $berita['keterangan']; ?></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="gambar" class="col-sm-2 col-form-label">Foto</label>
                                <div class="col-sm-10">
                                    <img src="/img/berita/<?= $berita['gambar']; ?>" class="img-thumbnail" name="gambar" id="gambar" style="width:600px ;">
                                </div>
                            </div>
                        </fieldset>    
                        <button type="button" class="btn btn-danger btn-hapus" data-id="<?= $berita['id']; ?>">Hapus Data</button>
                        <a href="/admin/ubah_berita/<?= $berita['id']; ?>" class="btn btn-primary">Ubah Data</a>
                    </form>
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
            text: "Anda tidak akan dapat mengembalikan berita yang dihapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus berita!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Jika user mengklik tombol "Ya, hapus berita"
                $.ajax({
                    url: '/admin/hapus_berita/' + id,
                    type: 'DELETE',
                    success: function (res) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: 'Berita berhasil dihapus!',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        setTimeout(() => {
                            window.history.back();
                        }, 750); // Refresh halaman setelah notifikasi berhasil muncul
                    }
                });
            }
        });
    });
</script>

<?= $this->endSection(); ?>