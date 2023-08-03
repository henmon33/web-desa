<?= $this->extend('layanan/layout/navbar_pegawai'); ?>
<?= $this->section('content'); ?>
<div id="layoutSidenav_content">
    <main>
    <div class="container-fluid px-4">
            <h1 class="mt-4">Data Berita Desa</h1>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Tabel Data Berita Desa
                </div>
                <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="flash-data" data-flashdata="<?= session()->getFlashdata('pesan'); ?>"></div>
                <?php endif; ?>
                <div class="card-body">
                    <a href="/Admin/tambah_data_berita">
                        <button type="button" class="btn btn-primary my-2">
                            Tambah Berita Desa
                        </button>
                    </a>
                    <table id="datatablesSimple">
                    <div class="row">
                            <div class="col">
                                <?php foreach ($artikel as $a) : ?>

                                    <div class="card my-2" data-aos="fade-up" data-aos-delay="100" style="max-width: 1250px;">
                                        <div class="row g-0">
                                            <div class="col-md-4">
                                                <img src="/img/berita/<?= $a['gambar']; ?>" class="img-fluid rounded-start my-2 mx-2" style="width: 400px;" data-aos="fade-left" data-aos-delay="100">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body">
                                                    <h5 class="card-title" data-aos="fade-right" data-aos-delay="100"><?= $a['judul']; ?></h5>
                                                    <p class="card-text" data-aos="fade-left" data-aos-delay="100"><?= nl2br(htmlspecialchars(word_limiter($a['keterangan'], 50))); ?></p>
                                                    <a href="/admin/rincian_berita/<?= $a['id']; ?>" class="btn btn-danger">Selengkapnya</a>
                                                    <button class="btn btn-danger btn-hapus" data-id="<?= $a['id']; ?>">Hapus</button>
                                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </table>
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
                            location.reload();
                        }, 1500); // Refresh halaman setelah notifikasi berhasil muncul
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
        setTimeout(() => {
            $.ajax({
                url: '/admin/berita_desa'
            });
        }, 750); 
    }
</script>
<?= $this->endSection(); ?>