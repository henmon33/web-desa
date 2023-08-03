<?= $this->extend('layanan/layout/navbar_bumdes'); ?>
<?= $this->section('content'); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="card mb-4 mt-3">
                <div class="card-header">
                   <h4><i class="fas fa-table me-1"></i>Data Usaha</h4> 
                </div>
                <div class="card-body">
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
<?= $this->endSection(); ?>