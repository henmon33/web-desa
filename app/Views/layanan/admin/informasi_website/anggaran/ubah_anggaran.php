<?= $this->extend('layanan/layout/navbar_pegawai'); ?>
<?= $this->section('content'); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid ">
            <div class="card mb-4 mt-3">
                <div class="card-header">
                    <h4><i class="fas fa-table me-1"></i>Ubah Data Anggaran Desa Tahun <?= $tahun_data; ?></h4>
                </div>
                <div class="card-body">
                <div class="table-responsive">
                    <form action="/admin/proses_ubah_anggaran" method="POST">
                        <table class="table table-striped table-preview">
                            <thead class="thead-light text-center">
                                <tr>
                                    <th class="bg-danger text-white">Detail Sumber</th>
                                    <th class="bg-danger text-white">Anggaran</th>
                                    <th class="bg-danger text-white">Realisasi</th>
                                    <th class="bg-danger text-white">Selisih</th>
                                </tr>
                            </thead>
                            <tbody id="tambah_form_pendapatan">
                                <?php if($sumber) : ?>
                                    <?php foreach ($sumber as $s) : ?>
                                    
                                    <tr>
                                    <input type="hidden" name="tahun_data" value="<?= $tahun_data; ?>">
                                        <!-- <input type="text" class="form-control" id="sumber" name="sumber[]" value="<?= $s->sumber ?>" placeholder="Sumber..."> -->
                                        <th colspan="4" class="fw-bold text-danger"><?= $s->sumber; ?></th>
                                    </tr>
                                     <!-- -->
                                        <?php foreach ($detail as $d) : ?>
                                            <?php if ($s->sumber == $d['sumber']) :?>
                                                <div class="pendapatan">
                                                    <tr>
                                                        <input type="hidden" name="detail_sumber_data[<?= $d['id'] ?>][id]" value="<?= $d['id'] ?>">
                                                        <td>
                                                            <input type="text" class="form-control" id="detail_sumber" name="detail_sumber_data[<?= $d['id'] ?>][detail_sumber]" value="<?= $d['detail_sumber']; ?>" placeholder="Detail Sumber...">
                                                            <!-- <input type="text" class="form-control" id="detail_sumber1" name="detail_sumber[]" placeholder="Detail Sumber..."> -->
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control anggaran" id="detail_anggaran" name="detail_sumber_data[<?= $d['id'] ?>][detail_anggaran]" value="<?= number_format($d['detail_anggaran'], 0, ',', '.'); ?>" placeholder="Sumber...">
                                                            <!-- <input type="number" class="form-control anggaran" id="detail_anggaran1" name="detail_anggaran[]" placeholder="Anggaran..."> -->
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control realisasi" id="detail_realisasi" name="detail_sumber_data[<?= $d['id'] ?>][detail_realisasi]"  value="<?= number_format($d['detail_realisasi'], 0, ',', '.'); ?>" placeholder="Sumber...">
                                                            <!-- <input type="number" class="form-control realisasi" id="detail_realisasi1" name="detail_realisasi[]" placeholder="Realisasi..."> -->
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control selisih" id="detail_selisih" name="detail_sumber_data[<?= $d['id'] ?>][detail_selisih]" value="<?= number_format($d['detail_selisih'], 0, ',', '.'); ?>" placeholder="Sumber...">
                                                            <!-- <input type="number" class="form-control selisih" id="detail_selisih1" name="detail_selisih[]" placeholder="Selisih..."> -->
                                                        </td>
                                                    </tr>
                                                </div>
                                            <?php endif; ?>
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
                        
                        <table class="table table-striped table-preview">
                            <thead class="thead-light text-center ">
                                <th class="bg-danger text-white">Sumber</th>
                                <th class="bg-danger text-white">Anggaran</th>
                                <th class="bg-danger text-white">Realisasi</th>
                                <th class="bg-danger text-white">Selisih</th>
                            </thead>
                            <tbody id="tambah_form_belanja">
                                <?php if($belanja) : ?>
                                <?php foreach ($belanja as $b) : ?>
                                    <div class="belanja">
                                    <tr>
                                        <input type="hidden" name="belanja_data[<?= $b['id'] ?>][id]" value="<?= $b['id'] ?>">
                                        <td>
                                            <input type="text" class="form-control" id="belanja_tujuan1" name="belanja_data[<?= $b['id'] ?>][tujuan]" value="<?= $b['tujuan'] ?>" placeholder="Tujuan">
                                            <!-- <td class="fw-bold text-danger"><?= $b['tujuan']; ?></td> -->
                                        </td>
                                        <td>
                                            <input type="text" class="form-control anggaran" id="anggaran1" name="belanja_data[<?= $b['id'] ?>][anggaran]"  value="<?= number_format($b['anggaran'], 0, ',', '.'); ?>" placeholder="Tujuan">
                                            <!-- <td class="text-center">Rp.<?= number_format($b['anggaran'], 0, ',', '.'); ?></td> -->
                                        </td>
                                        <td>
                                            <input type="text" class="form-control realisasi" id="realisasi1" name="belanja_data[<?= $b['id'] ?>][realisasi]"  value="<?= number_format($b['realisasi'], 0, ',', '.'); ?>" placeholder="Tujuan">
                                            <!-- <td class="text-center">Rp.<?= number_format($b['realisasi'], 0, ',', '.'); ?></td> -->
                                        </td>
                                        <td>
                                            <input type="text" class="form-control selisih" id="selisih1" name="belanja_data[<?= $b['id'] ?>][selisih]" value="<?= number_format($b['selisih'], 0, ',', '.'); ?>" placeholder="Tujuan">
                                            <!-- <td class="text-center">Rp.<?= number_format($b['selisih'], 0, ',', '.'); ?></td> -->
                                        </td>
                                    </tr>
                                    </div>
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
                        
                        <!-- Tombol untuk mengirimkan formulir -->
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
<script>
    $(".anggaran, .realisasi").on("input", function() {
    var value = $(this).val().replace(/\./g, ''); // Menghapus titik pemisah ribuan
    if (value !== "") {
        // Mengecek apakah nilai input tidak kosong
        value = parseInt(value, 10); // Mengubah nilai menjadi tipe integer
        $(this).val(value.toLocaleString('id-ID')); // Mengatur nilai input dengan format ribuan
    }
    });
        // Fungsi untuk menghitung selisih
        function hitungSelisih() {
            var row = $(this).closest("tr");
            var anggaran = parseFloat(row.find(".anggaran").val().replace(/\./g, '').replace(/,/g, ''));
            var realisasi = parseFloat(row.find(".realisasi").val().replace(/\./g, '').replace(/,/g, ''));

            // if (!isNaN(anggaran) && !isNaN(realisasi)) {
            //     var selisih = anggaran - realisasi;
            //     row.find(".selisih").val(selisih.toLocaleString());
            // }
            if (isNaN(anggaran)) {
                anggaran = 0;
            }
            if (isNaN(realisasi)) {
                realisasi = 0;
            }

            var selisih = anggaran - realisasi;
            row.find(".selisih").val(selisih.toLocaleString('id-ID'));
        }

        // Menghitung selisih saat input anggaran atau realisasi berubah
        $(".anggaran, .realisasi").on("input", hitungSelisih);

        // Menghitung selisih untuk setiap baris saat halaman dimuat
        $(".anggaran, .realisasi").each(hitungSelisih);

</script>
<?= $this->endSection(); ?>
