<?= $this->extend('layanan/layout/navbar_anggaran'); ?>
<?= $this->section('content'); ?>
    <div id="layoutSidenav_content">
        <main>
        <div class="container-fluid ">
            <div class="card mb-4 mt-3">
                <div class="card-header">
                    <h4><i class="fas fa-table me-1"></i>Laporan Anggaran Desa Tahun <?= $tahun_data; ?></h4> 
                </div>
                <div class="card-body">
                    <a href="/anggaran/tambah_anggaran">
                        <button class="btn btn-primary mb-3"> 
                        <i class="fa-solid fa-plus"></i>
                        Buat Laporan Anggaran Baru
                        </button>
                    </a>
                    <a href="/anggaran/ubah_anggaran/<?= $tahun_data; ?>">
                        <button class="btn btn-primary mb-3"> 
                        <i class="fa-solid fa-pen-to-square"></i>
                        Ubah Laporan Anggaran 
                        </button>
                    </a>
                    <button class="btn btn-danger mb-3 btn-hapus" data-tahun="<?= $tahun_data; ?>"> 
                    <i class="fa-solid fa-trash-can"></i>
                    Hapus Laporan Anggaran 
                    </button>

                    <?php if (session()->getFlashdata('pesan')) : ?>
                        <div class="flash-data" data-flashdata="<?= session()->getFlashdata('pesan'); ?>"></div>
                    <?php endif; ?>
                    <form action="<?= base_url('/anggaran/index'); ?>" method="get">
                        <label for="tahun">Pilih Tahun:</label>
                        <select class="form-control" onchange="this.form.submit()" id="tahun" name="tahun">
                            <option selected>Pilih Tahun Anggaran</option>
                            <?php foreach ($tahun as $t): ?>
                                <option value="<?= $t->tahun; ?>"><?= $t->tahun; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </form>
                    <div class="table-responsive">
                            <div class="mx-2 my-4">
                                <div class="card">
                                    <h5 class="fw-bold card-header">Pendapatan Desa</h5>
                                    <div class="mx-3 my-3 ">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-preview ">
                                                <thead class="thead-light text-center ">
                                                    <th class="bg-danger"></th>
                                                    <th class="bg-danger text-white">Anggaran</th>
                                                    <th class="bg-danger text-white">Realisasi</th>
                                                    <th class="bg-danger text-white">Selisih</th>
                                                </thead>
                                                <tbody>
                                                    <?php if($sumber) : ?>
                                                        <?php foreach ($sumber as $s) : ?>
                                                        <tr>
                                                            <th colspan="4" class="fw-bold text-danger"><?= $s->sumber; ?></th>
                                                        </tr>

                                                        <!-- -->
                                                        <?php $details = $detail[$s->sumber]; ?>
                                                        <?php foreach ($details as $d) : ?>
                                                            <tr>
                                                                <td id="detail_sumber"><?= $d['detail_sumber'] ?></td>
                                                                <td class="text-center" id="detail_anggaran">Rp.<?= number_format($d['detail_anggaran'], 0, ',', '.'); ?></td>
                                                                <td class="text-center" id="detail_realisasi">Rp.<?= number_format($d['detail_realisasi'], 0, ',', '.'); ?></td>
                                                                <td class="text-center" id="detail_selisih">Rp.<?= number_format($d['detail_selisih'], 0, ',', '.'); ?></td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    <?php endforeach; ?>
                                                    <?php else : ?>
                                                        <tr>
                                                            <td colspan="4" class="text-center">
                                                                <small class=" text-body-secondary">Data Belum Diinput</small>
                                                            </td>
                                                        </tr>
                                                    <?php endif; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mx-2 my-4">
                                <div class="card ">
                                    <h5 class="fw-bold card-header">Belanja Desa</h5>
                                    <div class="mx-3 my-3">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-preview">
                                                <thead class="thead-light text-center ">
                                                    <th class="bg-danger"></th>
                                                    <th class="bg-danger text-white">Anggaran</th>
                                                    <th class="bg-danger text-white">Realisasi</th>
                                                    <th class="bg-danger text-white">Selisih</th>
                                                </thead>
                                                <tbody>
                                                <?php if($belanja) : ?>
                                                    <?php foreach ($belanja as $b) : ?>
                                                        <tr>
                                                            <td class="fw-bold text-danger"><?= $b['tujuan']; ?></td>
                                                            <td class="text-center">Rp.<?= number_format($b['anggaran'], 0, ',', '.'); ?></td>
                                                            <td class="text-center">Rp.<?= number_format($b['realisasi'], 0, ',', '.'); ?></td>
                                                            <td class="text-center">Rp.<?= number_format($b['selisih'], 0, ',', '.'); ?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                <?php else : ?>
                                                    <tr>
                                                        <td colspan="4" class="text-center">
                                                            <small class=" text-body-secondary">Data Belum Diinput</small>
                                                        </td>
                                                    </tr>
                                                <?php endif; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        </main>
    </div>
<script>
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
    $(document).on('click', '.btn-hapus', function (e) {
        e.preventDefault();

        const tahun = $(this).data('tahun');

        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Anda tidak akan dapat mengembalikan data yang dihapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, Hapus Laporan!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Jika user mengklik tombol "Ya, hapus laporan"
                $.ajax({
                    url: '/anggaran/hapus_anggaran/' + tahun,
                    type: 'DELETE',
                    success: function (response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: 'Laporan berhasil dihapus!',
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