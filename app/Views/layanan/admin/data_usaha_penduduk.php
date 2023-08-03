<?= $this->extend('layanan/layout/navbar_pegawai'); ?>
<?= $this->section('content'); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="card mb-4 mt-3">
                <div class="card-header">
                    <h4><i class="fas fa-table me-1"></i>Data Usaha Penduduk</h4>
                </div>

                <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('pesan'); ?>
                    </div>
                <?php endif; ?>
                <div class="card-body">
                    <a href="/Admin/tambah_usaha_penduduk">
                        <button type="submit" class="btn btn-primary my-2">
                            Tambah Data Usaha Penduduk
                        </button>
                    </a>
                    <div class="table-responsive">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Jenis Usaha</th>
                                <th>Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($datausaha as $d) : ?>
                                <tr>
                                    <td><?= $d['nik']; ?></td>
                                    <td><?= $d['nama']; ?></td>
                                    <td><?= $d['jenis_usaha']; ?></td>
                                    <td>
                                        <a href="/Admin/ubah_usaha_penduduk/<?= $d['id']; ?>">
                                            <button type="button" class="btn btn-success ">
                                                Ubah
                                            </button>
                                        </a>
                                        <a href="/Admin/hapus_usaha_penduduk/<?= $d['id']; ?>">
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ?')">Hapus </button>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    </div>
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