<?= $this->extend('layanan/layout/navbar_pegawai'); ?>
<?= $this->section('content'); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4 py-4">
            <div class="card mb-4 mt-4">
                <div class="card-header">
                    <h2><span class="badge bg-primary">Ubah Data Penduduk</span></h2>
                </div>
                <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('pesan'); ?>
                    </div>
                <?php endif; ?>
                <div class="card-body">
                    <form action="/admin/proses_ubah_data_penduduk/<?= $masyarakat['id']; ?>" method="POST">
                        <?= csrf_field() ?>
                        <div class="row mb-3">
                            <label for="nik" class="col-sm-2 col-form-label">NIK</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('nik')) ? 'is-invalid' : ''; ?>" id="nik" name="nik" value="<?= $masyarakat['nik']; ?>" >
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('nik') ?>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="nkk" class="col-sm-2 col-form-label">nkk</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('nkk')) ? 'is-invalid' : ''; ?>" id="nkk" name="nkk" value="<?= $masyarakat['nkk']; ?>" >
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('nkk') ?>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" value="<?= $masyarakat['nama']; ?>">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('nama') ?>
                                </div>
                            </div>
                        </div>
                        <fieldset class="row mb-3">
                            <legend class="col-form-label col-sm-2 pt-0">Jenis Kelamin</legend>
                            <div class="col-sm-10">
                                <div class="form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="laki-laki" <?php if ($masyarakat['jenis_kelamin'] == 'laki-laki') echo 'checked' ?>>
                                    <label class="form-check-label" for="jenis_kelamin">
                                        Laki-Laki
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="perempuan" <?php if ($masyarakat['jenis_kelamin'] == 'perempuan') echo 'checked' ?>>
                                    <label class="form-check-label" for="jenis_kelamin">
                                        Perempuan
                                    </label>
                                </div>

                            </div>
                        </fieldset>
                        <div class="row mb-3">
                            <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('tempat_lahir')) ? 'is-invalid' : ''; ?>" id="tempat_lahir" name="tempat_lahir" value="<?= $masyarakat['tempat_lahir']; ?>" >
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('tempat_lahir') ?>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="tgl_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control <?= ($validation->hasError('tgl_lahir')) ? 'is-invalid' : ''; ?>" id="tgl_lahir" name="tgl_lahir" value="<?= $masyarakat['tgl_lahir']; ?>" >
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('tgl_lahir') ?>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="agama" class="col-sm-2 col-form-label">Agama</label>
                            <div class="col-sm-10">
                                <select class="form-select <?= ($validation->hasError('agama')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" name="agama" id="agama">
                                    <option value="kristen" <?php if ($masyarakat['agama'] == 'kristen') echo 'selected' ?>>Kristen</option>
                                    <option value="islam" <?php if ($masyarakat['agama'] == 'islam') echo 'selected' ?>>Islam</option>
                                    <option value="hindu" <?php if ($masyarakat['agama'] == 'hindu') echo 'selected' ?>>Hindu</option>
                                    <option value="budha" <?php if ($masyarakat['agama'] == 'budha') echo 'selected' ?>>Budha</option>
                                    <option value="konghucu" <?php if ($masyarakat['agama'] == 'konghucu') echo 'selected' ?>>Konghucu</option>
                                </select>
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('agama') ?>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="pendidikan" class="col-sm-2 col-form-label">Pendidikan Terakhir</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('pendidikan')) ? 'is-invalid' : ''; ?>" id="pendidikan" name="pendidikan" value="<?= $masyarakat['pendidikan']; ?>">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('pendidikan') ?>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="jenis_pekerjaan" class="col-sm-2 col-form-label">Pekerjaan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('pekerjaan')) ? 'is-invalid' : ''; ?>" id="jenis_pekerjaan" name="jenis_pekerjaan" value="<?= $masyarakat['jenis_pekerjaan']; ?>">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('pekerjaan') ?>
                                </div>
                            </div>
                        </div>
                        <fieldset class="row mb-3">
                            <legend class="col-form-label col-sm-2 pt-0">Status Perkawinan</legend>
                            <div class="col-sm-10">
                                <div class="form-check-inline">
                                    <input class="form-check-input" type="radio" name="status_perkawinan" id="status_perkawinan" value="menikah" <?php if ($masyarakat['status_perkawinan'] == 'menikah') echo 'checked' ?>>
                                    <label class="form-check-label" for="status_perkawinan">
                                        Menikah
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <input class="form-check-input" type="radio" name="status_perkawinan" id="status_perkawinan" value="belum_menikah" <?php if ($masyarakat['status_perkawinan'] == 'belum_menikah') echo 'checked' ?>>
                                    <label class="form-check-label" for="status_perkawinan">
                                        Belum Menikah
                                    </label>
                                </div>

                            </div>
                        </fieldset>
                        <div class="row mb-3">
                            <label for="status_dalam_keluarga" class="col-sm-2 col-form-label">Status Dalam Keluarga</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="status_dalam_keluarga" name="status_dalam_keluarga" value="<?= $masyarakat['status_dalam_keluarga']; ?>">
                            </div>
                        </div>
                        <fieldset class="row mb-3">
                            <legend class="col-form-label col-sm-2 pt-0">Kewarganegaraan</legend>
                            <div class="col-sm-10">
                                <div class="form-check-inline">
                                    <input class="form-check-input" type="radio" name="kewarganegaraan" id="kewarganegaraan" value="wni" <?php if ($masyarakat['kewarganegaraan'] == 'wni') echo 'checked' ?>>
                                    <label class="form-check-label" for="kewarganegaraan">
                                        Warga Negara Indonesia
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <input class="form-check-input" type="radio" name="kewarganegaraan" id="kewarganegaraan" value="wna" <?php if ($masyarakat['kewarganegaraan'] == 'wna') echo 'checked' ?>>
                                    <label class="form-check-label" for="kewarganegaraan">
                                        Warga Negara Asing
                                    </label>
                                </div>
                            </div>
                        </fieldset>
                        <div class="row mb-3">
                            <label for="no_paspor" class="col-sm-2 col-form-label">Nomor Pasport</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="no_paspor" name="no_paspor" value="<?= $masyarakat['no_paspor']; ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="no_kitas" class="col-sm-2 col-form-label">Nomor KITAS</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="no_kitas" name="no_kitas" value="<?= $masyarakat['no_kitas']; ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="nama_ayah" class="col-sm-2 col-form-label">Nama Ayah</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" value="<?= $masyarakat['nama_ayah']; ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="nama_ibu" class="col-sm-2 col-form-label">Nama Ibu</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" value="<?= $masyarakat['nama_ibu']; ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="rt" class="col-sm-2 col-form-label">RT</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('rt')) ? 'is-invalid' : ''; ?>" id="rt" name="rt" value="<?= $masyarakat['rt']; ?>">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('rt') ?>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="rw" class="col-sm-2 col-form-label">RW</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('rw')) ? 'is-invalid' : ''; ?>" id="rw" name="rw" value="<?= $masyarakat['rw']; ?>">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('rw') ?>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" class="form-control" id="desa" name="desa" value="<?= $masyarakat['desa']; ?>">
                        <input type="hidden" class="form-control" id="kecamatan" name="kecamatan" value="<?= $masyarakat['kecamatan']; ?>">
                        <input type="hidden" class="form-control" id="kabupaten" name="kabupaten" value="<?= $masyarakat['kabupaten']; ?>">
                        <input type="hidden" class="form-control" id="provinsi" name="provinsi" value="<?= $masyarakat['provinsi']; ?>">
                        <input type="hidden" class="form-control" id="kode_pos" name="kode_pos" value="<?= $masyarakat['kode_pos']; ?>">
                        <button type="submit" class="btn btn-primary">Ubah Data</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>
<?= $this->endSection(); ?>