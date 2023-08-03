<?= $this->extend('layanan/layout/navbar_masyarakat'); ?>
<?= $this->section('content'); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="card mb-4 mt-4">
                <div class="card-header">

                    <p class="fs-4"> <i class="fas fa-table me-1"></i>Data Saya</p>
                </div>

                <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('pesan'); ?>
                    </div>
                <?php endif; ?>
                <div class="card-body">
                    <form>
                        <fieldset disabled>
                            <div class="row mb-3">
                                <label for="nik" class="col-sm-3 col-form-label">NIK</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="nik" name="nik" placeholder="<?= $username['nik']; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="<?= $username['nama']; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="jenis_kelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" placeholder="<?= $username['jenis_kelamin']; ?>">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="tempat_lahir" class="col-sm-3 col-form-label">Tempat Lahir</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="<?= $username['tempat_lahir']; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="tgl_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="tgl_lahir" name="tgl_lahir" placeholder="<?= $username['tgl_lahir']; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="agama" class="col-sm-3 col-form-label">Agama</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="agama" name="agama" placeholder="<?= $username['agama']; ?>">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="pendidikan" class="col-sm-3 col-form-label">Pendidikan Terakhir</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="pendidikan" name="pendidikan" placeholder="<?= $username['pendidikan']; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="jenis_pekerjaan" class="col-sm-3 col-form-label">Pekerjaan</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="jenis_pekerjaan" name="jenis_pekerjaan" placeholder="<?= $username['jenis_pekerjaan']; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="status_perkawinan" class="col-sm-3 col-form-label">Status Perkawinan</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="status_perkawinan" name="status_perkawinan" placeholder="<?= $username['status_perkawinan']; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="status_dalam_keluarga" class="col-sm-3 col-form-label">Status Dalam Keluarga</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="status_dalam_keluarga" name="status_dalam_keluarga" placeholder="<?= $username['status_dalam_keluarga']; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="kewarganegaraan" class="col-sm-3 col-form-label">Kewarganegaraan</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="kewarganegaraan" name="kewarganegaraan" placeholder="<?= $username['kewarganegaraan']; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="no_paspor" class="col-sm-3 col-form-label">Nomor Pasport</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="no_paspor" name="no_paspor">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="no_kitas" class="col-sm-3 col-form-label">Nomor KITAS</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="no_kitas" name="no_kitas" placeholder="<?= $username['no_kitas']; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="nama_ayah" class="col-sm-3 col-form-label">Nama Ayah</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" placeholder="<?= $username['nama_ayah']; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="nama_ibu" class="col-sm-3 col-form-label">Nama Ibu</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" placeholder="<?= $username['nama_ibu']; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="rt" class="col-sm-3 col-form-label">RT</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="rt" name="rt" placeholder="<?= $username['rt']; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="rw" class="col-sm-3 col-form-label">RW</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="rw" name="rw" placeholder="<?= $username['rw']; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="desa" class="col-sm-3 col-form-label">Desa</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="desa" name="desa" placeholder="<?= $username['desa']; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="kecamatan" class="col-sm-3 col-form-label">Kecamatan</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="kecamatan" name="kecamatan" placeholder="<?= $username['kecamatan']; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="kabupaten" class="col-sm-3 col-form-label">Kabupaten</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="kabupaten" name="kabupaten" placeholder="<?= $username['kabupaten']; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="provinsi" class="col-sm-3 col-form-label">Provinsi</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="provinsi" name="provinsi" placeholder="<?= $username['provinsi']; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="kode_pos" class="col-sm-3 col-form-label">Kode POS</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="kode_pos" name="kode_pos" placeholder="<?= $username['kode_pos']; ?>">
                                </div>
                            </div>
                        </fieldset>
                    </form>

                </div>
            </div>
        </div>
    </main>
    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy; Your Website 2022</div>
            </div>
        </div>
    </footer>
</div>
</div>
<?= $this->endSection(); ?>