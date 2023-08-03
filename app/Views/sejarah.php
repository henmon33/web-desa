<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<main id="main">

    <?php foreach ($sejarah as $s) : ?>
        <div class="card text-center">
            <img src="/img/<?= $s['gambar']; ?>" class="mx-auto my-2" width="170px" alt="...">
            <div class="card-body">
                <h3 class="card-title"><?= $s['judul']; ?></h3>
                <p class="card-text mx-5" style="text-align: justify;"><?= nl2br(htmlspecialchars($s['deskripsi'])); ?></p>
            </div>
        </div>
    <?php endforeach; ?>
</main>
<?= $this->endSection(); ?>