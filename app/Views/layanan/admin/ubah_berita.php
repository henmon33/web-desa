<?= $this->extend('layanan/layout/navbar_pegawai'); ?>
<?= $this->section('content'); ?>
<div id="layoutSidenav_content">
    <main>
    <div class="container-fluid px-4">
            <h1 class="mt-4">Data Berita Desa</h1>

            <div class="card mb-4">
                <div class="card-header">
                <h2><span class="badge bg-primary">Ubah Berita Desa</span></h2>
                </div>
                <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="flash-data" data-flashdata="<?= session()->getFlashdata('pesan'); ?>"></div>
                <?php endif; ?>
                <div class="card-body">
                    <form action="/admin/proses_ubah_data_berita/<?= $berita['id']; ?>" method="POST" enctype="multipart/form-data" >
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
                                    <?php if ($berita['gambar']) : ?>
                                        <img src="<?= base_url('img/berita/'.$berita['gambar']) ?>" alt="gambar" class="img-thumbnail" name="gambar" id="gambar" style="width:600px ;">
                                    <?php else : ?>
                                        <br>
                                        <span>Foto Berita Belum Diunggah</span>
                                    <?php endif; ?>
                                    <input type="file" class="form-control" name="gambar" id="gambar" >
                                </div>
                            </div>
                            <input type="hidden" name="gambar_lama" value="<?= $berita['gambar'] ?>">
                            <button type="submit" class="btn btn-primary">Ubah</button>
                        <!-- <a href="/admin/ubah_berita/<?= $berita['id']; ?>" class="btn btn-primary">Ubah Data</a> -->
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>
<script>
    
    // $(document).ready(function(){
    //     var pesan = '<?php echo $pesan = session()->getFlashdata('pesan'); ?>';
    //     if(pesan !== '')
    //     {
    //         console.log('hallo');
    //         Swal.fire({
    //             icon: 'success',
    //             title: 'Berhasil',
    //             text: 'Berita berhasil diubah!',
    //             showConfirmButton: false,
    //             timer: 1500
    //         });
    //         setTimeout(() => {
    //             window.history.back();
    //         }, 750); // Refresh halaman setelah notifikasi berhasil muncul
    //     }
    // })

    const flashData = $('.flash-data').data('flashdata');
    if (flashData) {
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: flashData,
            showConfirmButton: false,
            timer: 1500
        });
    }
</script>
<?= $this->endSection(); ?>