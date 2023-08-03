<?= $this->extend('layanan/layout/navbar_pegawai'); ?>
<?= $this->section('content'); ?>
    <div id="layoutSidenav_content">
        <main>
        <div class="container-fluid ">
        <h1 class="mt-4">Potensi Desa Kembuan</h1>
            <div class="card mb-4">
                <div class="card-header">
                <a href="/admin/tambah_potensi" class="btn btn-primary">
                        <i class="fa-solid fa-pen-to-square"></i>
                        Tambah Data Potensi Desa
                </a>
                </div>
                <div class="card-body">
                    <div class="row">
                    <?php foreach($potensi as $p) : ?>
                        <div class="card col-lg-4 col-md-6 mx-2 my-2 d-flex align-items-stretch" style="width: 20rem;">
                            <img src="/img/potensi/<?= $p['gambar']; ?>" class="card-img-top rounded mx-auto mt-2 " style="width: 90%; height: 170px;">
                            <div class="card-body">
                                <h5 class="card-title "><?= $p['judul']; ?></h5>
                                <p class="card-text" style="text-align: justify;"><small><?= word_limiter($p['deskripsi'], 20, '...'); ?></small></p>
                                <button data-bs-toggle="modal" data-bs-target="#modalrinci" class="btn btn-primary btn-detail"
                                data-id="<?= $p['id']; ?>"
                                data-judul="<?= $p['judul']; ?>"
                                data-gambar="/img/potensi/<?= $p['gambar']; ?>"
                                data-deskripsi="<?= nl2br($p['deskripsi']); ?>"
                                >Baca Selengkapnya</button>
                            </div>
                        </div>

                    <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        </main>
        <!-- modal -->
        <div class="modal fade" id="modalrinci" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="judul"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body mx-2">
                        <img src="" id="gambar" class="mx-auto d-block my-4" style="width: 90%; height: 350px;">
                        <p id="deskripsi" style="text-align: justify;"></p>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="id_modal">
                        <button type="button" class="btn btn-danger btn-hapus" data-id="">Hapus Data</button>
                        <a href="" class="btn btn-primary btn-ubah">Ubah Data</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
    $('.btn-detail').click(function() {
        var id = $(this).data('id');
        var judul = $(this).data('judul');
        var gambar = $(this).data('gambar');
        var deskripsi = $(this).data('deskripsi');
        var formatdeskripsi = deskripsi.replace(/(\r\n|\r|\n)/g, "<br>");    
        $('#judul').text(judul);
        $('#gambar').attr('src', gambar);
        $('#deskripsi').html(formatdeskripsi);
        $('#id_modal').val(id);
        $('.btn-ubah').attr('href', '/admin/ubah_potensi/' + id);

    })
    $(document).on('click', '.btn-hapus', function (e) {
        e.preventDefault();

        const id = $('#id_modal').val();
        console.log(id);

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
                    url: '/admin/hapus_potensi/' + id,
                    type: 'DELETE',
                    success: function (response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: 'Berita berhasil dihapus!',
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
</script>
<?= $this->endSection(); ?>