<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="card my-3">

        <div class="table-responsive">
            <div class="card-header text-center ">
                <h5>
                    LAPORAN REALISASI PELAKSANAAN
                </h5>
                <h5>
                    ANGGARAN PENDAPATAN DAN BELANJA DESA
                </h5>
                <h5>
                    PEMERINTAH DESA KEMBUAN
                </h5>
                <h5>
                    TAHUN ANGGARAN <?= $tahun_data; ?>
                </h5>
            </div>
            <div class="pilih-tahun mx-5 my-3">
                <form action="<?= base_url('/home/anggaran/'); ?>" method="get">
                    <select class="form-control" onchange="this.form.submit()" id="tahun" name="tahun">
                        <option selected>Pilih Tahun Anggaran</option>
                        <?php foreach ($tahun as $t): ?>
                            <option value="<?= $t->tahun; ?>"><?= $t->tahun; ?></option>
                        <?php endforeach; ?>
                    </select>
                </form>
            </div>
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
<?= $this->endSection(); ?>