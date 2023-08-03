<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container my-2">
    
        <div class="card mb-4">
            <div class="card-header">
                <h3 class="mt-auto">Potensi Desa Kembuan</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <?php if($potensi) : ?>
                    <?php foreach($potensi as $p) : ?>
                        <div class="card col-lg-4 col-md-6 mx-auto my-2 d-flex justify-content-between" data-aos="zoom-in" data-aos-delay="100" style="width: 20rem;">
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

                        <!-- modal -->
                        <!-- <div class="modal fade" id="modalrinci<?= $p['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"><?= $p['judul']; ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <img src="/img/potensi/<?= $p['gambar']; ?>" class="mx-auto d-block my-4" style="width: 90%; height: 350px;">
                                    <p style="text-align: justify;"><?= nl2br($p['deskripsi']); ?></p>
                                </div>
                                <div class="modal-footer">
                                    
                                </div>
                                </div>
                            </div>
                        </div> -->
                    <?php endforeach; ?>
                    <?php else : ?>
                        <div class="card my-2" data-aos="fade-up" data-aos-delay="100" style="max-width: 1250px;">
                            <div class="row g-0">
                                    <div class="card-body text-center">
                                        <small class=" text-body-secondary">Data tidak ditemukan</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
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
                    </div>
                </div>
            </div>
        </div>
</div>
<script>
    $('.btn-detail').click(function() {
        var judul = $(this).data('judul');
        var gambar = $(this).data('gambar');
        var deskripsi = $(this).data('deskripsi');
        var formatdeskripsi = deskripsi.replace(/(\r\n)/g, "<br>");    
        $('#judul').text(judul);
        $('#gambar').attr('src', gambar);
        $('#deskripsi').html(formatdeskripsi);

    })
</script>
<?= $this->endSection(); ?>