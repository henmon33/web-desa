<?= $this->extend('layanan/layout/navbar_pegawai'); ?>
<?= $this->section('content'); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4 py-4">
            <div class="card mb-4 mt-3">
                <div class="card-header">
                    <h2><span class="badge bg-primary">Tambah Data Penduduk</span></h2>
                </div>
                <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('pesan'); ?>
                    </div>
                <?php endif; ?>
                <div class="card-body">

                    <form action="<?= site_url('admin/proses_tambah_data_penduduk') ?>" method="POST" autocomplete="off" >
                        <?= csrf_field() ?>
                        <div class="row mb-3">
                            <label for="nik" class="col-sm-2 col-form-label">NIK</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('nik')) ? 'is-invalid' : ''; ?>" id="nik" name="nik" value="<?= (old('nik')) ? old('nik') : ''; ?>">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('nik') ?>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="nkk" class="col-sm-2 col-form-label">Nomor Kartu Keluarga</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('nkk')) ? 'is-invalid' : ''; ?>" id="nkk" name="nkk" value="<?= (old('nkk')) ? old('nkk') : ''; ?>">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('nkk') ?>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" value="<?= (old('nama')) ? old('nama') : ''; ?>">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('nama') ?>
                                </div>
                            </div>
                        </div>
                        <fieldset class="row mb-3">
                            <legend class="col-form-label col-sm-2 pt-0">Jenis Kelamin</legend>
                            <div class="col-sm-10">
                                <div class="form-check-inline ">
                                    <input class="form-check-input <?= ($validation->hasError('jenis_kelamin')) ? 'is-invalid' : ''; ?>" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="laki-laki" <?= ( old('jenis_kelamin') == 'laki-laki' ? 'checked' : '' ); ?>>
                                    <label class="form-check-label" for="jenis_kelamin">
                                        Laki-Laki
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <input class="form-check-input <?= ($validation->hasError('jenis_kelamin')) ? 'is-invalid' : ''; ?>" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="perempuan" <?= ( old('jenis_kelamin') == 'perempuan' ? 'checked' : '' ); ?>>
                                    <label class="form-check-label" for="jenis_kelamin">
                                        Perempuan
                                    </label>
                                </div>

                            </div>
                        </fieldset>
                        <div class="row mb-3">
                            <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('tempat_lahir')) ? 'is-invalid' : ''; ?>" id="tempat_lahir" name="tempat_lahir" value="<?= (old('tempat_lahir')) ? old('tempat_lahir') : ''; ?>">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('tempat_lahir') ?>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="tgl_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control <?= ($validation->hasError('tgl_lahir')) ? 'is-invalid' : ''; ?>" id="tgl_lahir" name="tgl_lahir" value="<?= (old('tgl_lahir')) ? old('tgl_lahir') : ''; ?>">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('tgl_lahir') ?>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="agama" class="col-sm-2 col-form-label">Agama</label>
                            <div class="col-sm-10">
                                <select class="form-select <?= ($validation->hasError('agama')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" name="agama" id="agama" value="">
                                    <option selected disabled>Silahkan Pilih Agama</option>
                                    <option value="kristen" <?= ( old('agama') == 'kristen' ? 'selected' : '' ); ?>>Kristen</option>
                                    <option value="islam" <?= ( old('agama') == 'islam' ? 'selected' : '' ); ?>>Islam</option>
                                    <option value="hindu" <?= ( old('agama') == 'hindu' ? 'selected' : '' ); ?>>Hindu</option>
                                    <option value="budha" <?= ( old('agama') == 'budha' ? 'selected' : '' ); ?>>Budha</option>
                                    <option value="konghucu" <?= ( old('agama') == 'konghucu' ? 'selected' : '' ); ?>>Konghucu</option>
                                </select>
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('agama') ?>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="pendidikan" class="col-sm-2 col-form-label">Pendidikan Terakhir</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('pendidikan')) ? 'is-invalid' : ''; ?>" id="pendidikan" name="pendidikan" value="<?= (old('pendidikan')) ? old('pendidikan') : ''; ?>">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('pendidikan') ?>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="jenis_pekerjaan" class="col-sm-2 col-form-label">Pekerjaan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('jenis_pekerjaan')) ? 'is-invalid' : ''; ?>" id="jenis_pekerjaan" name="jenis_pekerjaan" value="<?= (old('jenis_pekerjaan')) ? old('jenis_pekerjaan') : ''; ?>">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('jenis_pekerjaan') ?>
                                </div>
                            </div>
                        </div>
                        <fieldset class="row mb-3">
                            <legend class="col-form-label col-sm-2 pt-0">Status Perkawinan</legend>
                            <div class="col-sm-10">
                                <div class="form-check-inline">
                                    <input class="form-check-input <?= ($validation->hasError('status_perkawinan')) ? 'is-invalid' : ''; ?>" type="radio" name="status_perkawinan" id="status_perkawinan" value="kawin" <?= ( old('status_perkawinan') == 'menikah' ? 'checked' : '' ); ?>>
                                    <label class="form-check-label" for="status_perkawinan">
                                        Menikah
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <input class="form-check-input <?= ($validation->hasError('status_perkawinan')) ? 'is-invalid' : ''; ?>" type="radio" name="status_perkawinan" id="status_perkawinan" value="belum kawin" <?= ( old('status_perkawinan') == 'belum_menikah' ? 'checked' : '' ); ?>>
                                    <label class="form-check-label" for="status_perkawinan">
                                        Belum Menikah
                                    </label>
                                </div>
                            </div>
                        </fieldset>
                        <div class="row mb-3">
                            <label for="status_dalam_keluarga" class="col-sm-2 col-form-label">Status Dalam Keluarga</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="status_dalam_keluarga" name="status_dalam_keluarga" value="<?= (old('status_dalam_keluarga')) ? old('status_dalam_keluarga') : ''; ?>">
                            </div>
                        </div>
                        <fieldset class="row mb-3">
                            <legend class="col-form-label col-sm-2 pt-0">Kewarganegaraan</legend>
                            <div class="col-sm-10">
                                <div class="form-check-inline">
                                    <input class="form-check-input <?= ($validation->hasError('kewarganegaraan')) ? 'is-invalid' : ''; ?>" type="radio" name="kewarganegaraan" id="kewarganegaraan" value="wni" <?= ( old('kewarganegaraan') == 'wni' ? 'checked' : '' ); ?> >
                                    <label class="form-check-label" for="kewarganegaraan">
                                        Warga Negara Indonesia
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <input class="form-check-input <?= ($validation->hasError('kewarganegaraan')) ? 'is-invalid' : ''; ?>" type="radio" name="kewarganegaraan" id="kewarganegaraan" value="wna" <?= ( old('kewarganegaraan') == 'wna' ? 'checked' : '' ); ?>>
                                    <label class="form-check-label" for="kewarganegaraan">
                                        Warga Negara Asing
                                    </label>
                                </div>
                            </div>
                        </fieldset>
                        <div class="row mb-3">
                            <label for="no_paspor" class="col-sm-2 col-form-label">Nomor Pasport</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="no_paspor" name="no_paspor" value="<?= (old('no_paspor')) ? old('no_paspor') : ''; ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="no_kitas" class="col-sm-2 col-form-label">Nomor KITAS</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="no_kitas" name="no_kitas" value="<?= (old('no_kitas')) ? old('no_kitas') : ''; ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="nama_ayah" class="col-sm-2 col-form-label">Nama Ayah</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('nama_ayah')) ? 'is-invalid' : ''; ?>" id="nama_ayah" name="nama_ayah" value="<?= (old('nama_ayah')) ? old('nama_ayah') : ''; ?>">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('nama_ayah') ?>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="nama_ibu" class="col-sm-2 col-form-label">Nama Ibu</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('nama_ibu')) ? 'is-invalid' : ''; ?>" id="nama_ibu" name="nama_ibu" value="<?= (old('nama_ibu')) ? old('nama_ibu') : ''; ?>">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('nama_ibu') ?>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="rt" class="col-sm-2 col-form-label">RT</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('rt')) ? 'is-invalid' : ''; ?>" id="rt" name="rt" value="<?= (old('rt')) ? old('rt') : ''; ?>">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('rt') ?>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="rw" class="col-sm-2 col-form-label">RW</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('rw')) ? 'is-invalid' : ''; ?>" id="rw" name="rw" value="<?= (old('rw')) ? old('rw') : ''; ?>">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('rw') ?>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>
<?= $this->endSection(); ?>