<?= $this->extend('layanan/layout/navbar_masyarakat'); ?>
<?= $this->section('content'); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="card mb-4 mt-4">
                <div class="card-header">
                    <h4>FORM PENGAJUAN PEMBUATAN SURAT</h4>
                </div>
                <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('pesan'); ?>
                    </div>
                <?php endif; ?>
                <?php if (session()->getFlashdata('pesan_usia')) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= session()->getFlashdata('pesan_usia'); ?>
                    </div>
                <?php endif; ?>
                <?php if (session()->getFlashdata('pesan_kewarganegaraan')) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= session()->getFlashdata('pesan_kewarganegaraan'); ?>
                    </div>
                <?php endif; ?>
                <div class="card-body">
                    <form action="#" method="post" enctype="multipart/form-data" autocomplete="off" id="form_proses_surat" novalidate>
                        <?= csrf_field() ?>
                        <input style="display: none;" type="hidden" class="form-control <?= ($validation->hasError('tgl_lahir')) ? 'is-invalid' : ''; ?>" id="tgl_lahir" name="tgl_lahir" value="<?= $username['tgl_lahir']; ?>">
                        <div class="row mb-3">
                            <label for="nik" class="col-sm-4 col-form-label">NIK</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control <?= ($validation->hasError('nik')) ? 'is-invalid' : ''; ?>" id="nik" name="nik" value="<?= $username['nik']; ?>" readonly>
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('nik') ?>
                                </div>
                            </div>
                        </div>
                       
                        <div class="row mb-3">
                            <label for="jenis_surat" class="col-sm-4 col-form-label">Jenis Surat</label>
                            <div class="col-sm-8">
                                <select class="form-select <?= ($validation->hasError('jenis_surat')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" name="jenis_surat" id="jenis_surat">
                                    <option selected disabled>Silahkan Pilih Jenis Surat</option>
                                    <option value="Surat Keterangan Usaha">Surat Keterangan Usaha</option>
                                    <option value="Surat Keterangan Tidak Mampu">Surat Keterangan Tidak Mampu</option>
                                    <option value="Surat Kelahiran">Surat Kelahiran</option>
                                    <option value="Surat Pengantar Pembuatan KTP">Surat Pengantar Pembuatan KTP</option>
                                    <option value="Surat Pengantar Pembuatan KK">Surat Pengantar Pembuatan KK</option>
                                    <option value="Surat Pengantar SKCK">Surat Pengantar SKCK</option>
                                    <option value="Surat Kehilangan">Surat Kehilangan</option>
                                    <option value="Surat Keterangan Pindah Tempat">Surat Keterangan Pindah Tempat</option>
                                    <option value="Surat Kematian">Surat Kematian</option>
                                </select>
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('jenis_surat') ?>
                                </div>
                            </div>

                        </div>
                        <div class="row mb-3" id="form_keperluan">
                            <label for="keperluan" class="col-sm-4 col-form-label">Keperluan</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control <?= ($validation->hasError('keperluan')) ? 'is-invalid' : ''; ?>" id="keperluan" name="keperluan">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="row mb-3" id="form_nama_barang" style="display: none;">
                            <label for="nama_barang" class="col-sm-4 col-form-label">Nama Barang Yang Hilang</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control <?= ($validation->hasError('nama_barang')) ? 'is-invalid' : ''; ?>" id="nama_barang" name="nama_barang">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div id="form_alamat_pindah" style="display: none;">
                            <div class="row mb-3">
                                    <label for="alamat_pindah" class="col-sm-4 col-form-label">Alamat Pindah</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control <?= ($validation->hasError('alamat_pindah')) ? 'is-invalid' : ''; ?>" id="alamat_pindah" name="alamat_pindah" >
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= $validation->getError('alamat_pindah') ?>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div id="form_alasan_pindah" class="row mb-3" style="display: none;">
                            <label for="alasan_pindah" class="col-sm-4 col-form-label">Alasan Pindah</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control <?= ($validation->hasError('alasan_pindah')) ? 'is-invalid' : ''; ?>" id="alasan_pindah" name="alasan_pindah">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div id="turut_pindah" style="display: none;">
                            <div class="row mb-3" >
                                <label for="jumlah_orang" class="col-sm-4 col-form-label">Jumlah Orang Turut Pindah</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" id="jumlah_orang" name="jumlah_orang" value="<?= old('jumlah_orang') ?>">
                                </div>
                            </div>
                            <div id="form-detail-orang">
                                
                            </div>
                        </div>
                        <div id="form_surat_kematian" style="display: none;">
                            <div class="border border-danger rounded-1">
                                <h3 class="text-danger border-bottom border-danger">Data Masyarakat Yang Meninggal</h3>
                                <div class="row mb-3">
                                    <label for="nik_meninggal" class="col-sm-4 col-form-label">NIK :</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control <?= ($validation->hasError('nik_meninggal')) ? 'is-invalid' : ''; ?>" id="nik_meninggal" name="nik_meninggal">
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="row mb-3 form_tgl_meninggal">
                                    <label for="tgl_meninggal" class="col-sm-4 col-form-label">Tanggal Meninggal :</label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control <?= ($validation->hasError('tgl_meninggal')) ? 'is-invalid' : ''; ?>" id="tgl_meninggal" name="tgl_meninggal">
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="row mb-3 form_jam_meninggal">
                                    <label for="jam_meninggal" class="col-sm-4 col-form-label">Jam Meninggal :</label>
                                    <div class="col-sm-8">
                                        <input type="time" class="form-control <?= ($validation->hasError('jam_meninggal')) ? 'is-invalid' : ''; ?>" id="jam_meninggal" name="jam_meninggal">
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="row mb-3 form_tempat_meninggal">
                                    <label for="tempat_meninggal" class="col-sm-4 col-form-label">Tempat Meninggal :</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control <?= ($validation->hasError('tempat_meninggal')) ? 'is-invalid' : ''; ?>" id="tempat_meninggal" name="tempat_meninggal">
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="row mb-3 form_sebab_meninggal">
                                    <label for="sebab_meninggal" class="col-sm-4 col-form-label">Sebab Meninggal :</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control <?= ($validation->hasError('sebab_meninggal')) ? 'is-invalid' : ''; ?>" id="sebab_meninggal" name="sebab_meninggal">
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="border border-danger rounded-1">
                                <h3 class="text-danger border-bottom border-danger">Data Tenaga Kesehatan</h3>
                                <div class="row mb-3 form_nama_nakes">
                                    <label for="nama_nakes" class="col-sm-4 col-form-label">Nama Tenaga Kesehatan :</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control <?= ($validation->hasError('nama_nakes')) ? 'is-invalid' : ''; ?>" id="nama_nakes" name="nama_nakes" >
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="row mb-3 form_nik_nakes">
                                    <label for="nik_nakes" class="col-sm-4 col-form-label">NIK Tenaga Kesehatan :</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control <?= ($validation->hasError('nik_nakes')) ? 'is-invalid' : ''; ?>" id="nik_nakes" name="nik_nakes">
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="row mb-3 form_data_lahir_nakes">
                                    <label for="data_lahir_nakes" class="col-sm-4 col-form-label">Tempat/Tanggal Lahir Tenaga Kesehatan :</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control <?= ($validation->hasError('data_lahir_nakes')) ? 'is-invalid' : ''; ?>" id="data_lahir_nakes" name="data_lahir_nakes">
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="row mb-3 form_pekerjaan_nakes">
                                    <label for="pekerjaan_nakes" class="col-sm-4 col-form-label">Pekerjaan Tenaga Kesehatan :</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control <?= ($validation->hasError('pekerjaan_nakes')) ? 'is-invalid' : ''; ?>" id="pekerjaan_nakes" name="pekerjaan_nakes">
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="row mb-3 form_alamat_nakes">
                                    <label for="alamat_nakes" class="col-sm-4 col-form-label">Alamat Tenaga Kesehatan :</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control <?= ($validation->hasError('alamat_nakes')) ? 'is-invalid' : ''; ?>" id="alamat_nakes" name="alamat_nakes">
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="dokumen_ktp" style="display: none;">
                            <div class="row mb-3">
                                <label for="form_dokumen_ktp" class="col-sm-4 col-form-label">Foto KTP</label>
                                <div class="col-sm-8">
                                <input class="form-control <?= ($validation->hasError('form_dokumen_ktp')) ? 'is-invalid' : ''; ?>" type="file" name="form_dokumen_ktp" id="form_dokumen_ktp">
                                        <div class="invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                        <div id="dokumen_kk" style="display: none;">
                            <div class="row mb-3">
                            <label for="form_dokumen_kk" class="col-sm-4 col-form-label">Foto Kartu Keluarga</label>
                                <div class="col-sm-8">
                                <input class="form-control <?= ($validation->hasError('form_dokumen_kk')) ? 'is-invalid' : ''; ?>" type="file" name="form_dokumen_kk" id="form_dokumen_kk">
                                        <div class="invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                        <div id="dokumen_surat_rt" style="display: none;">
                            <div class="row mb-3">
                            <label for="form_dokumen_surat_rt" class="col-sm-4 col-form-label">Foto Surat Keterangan RT/RW</label>
                                <div class="col-sm-8">
                                <input class="form-control <?= ($validation->hasError('form_dokumen_surat_rt')) ? 'is-invalid' : ''; ?>" type="file" name="form_dokumen_surat_rt" id="form_dokumen_surat_rt">
                                        <div class="invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                        <div id="dokumen_surat_keterangan_dokter" style="display: none;">
                            <div class="row mb-3">
                            <label for="form_dokumen_surat_keterangan_dokter" class="col-sm-4 col-form-label">Foto Surat Keterangan Dokter</label>
                                <div class="col-sm-8">
                                <input class="form-control <?= ($validation->hasError('form_dokumen_surat_keterangan_dokter')) ? 'is-invalid' : ''; ?>" type="file" name="form_dokumen_surat_keterangan_dokter" id="form_dokumen_surat_keterangan_dokter">
                                        <div class="invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                        <div id="dokumen_ktp_yang_meninggal" style="display: none;">
                            <div class="row mb-3">
                            <label for="form_dokumen_ktp_yang_meninggal" class="col-sm-4 col-form-label">Foto KTP Yang Meninggal</label>
                                <div class="col-sm-8">
                                <input class="form-control <?= ($validation->hasError('form_dokumen_ktp_yang_meninggal')) ? 'is-invalid' : ''; ?>" type="file" name="form_dokumen_ktp_yang_meninggal" id="form_dokumen_ktp_yang_meninggal">
                                        <div class="invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                        <div id="dokumen_kematian_rs" style="display: none;">
                            <div class="row mb-3">
                            <label for="form_dokumen_kematian_rs" class="col-sm-4 col-form-label">Foto Surat Keterangan Kematian Dari Rumah Sakit</label>
                                <div class="col-sm-8">
                                <input class="form-control <?= ($validation->hasError('form_dokumen_kematian_rs')) ? 'is-invalid' : ''; ?>" type="file" name="form_dokumen_kematian_rs" id="form_dokumen_kematian_rs">
                                        <div class="invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                        <div id="dokumen_ktp_pasangan" style="display: none;">
                            <div class="row mb-3">
                            <label for="form_dokumen_ktp_pasangan" class="col-sm-4 col-form-label">Foto KTP Pasangan (Suami/Istri)</label>
                                <div class="col-sm-8">
                                <input class="form-control <?= ($validation->hasError('form_dokumen_ktp_pasangan')) ? 'is-invalid' : ''; ?>" type="file" name="form_dokumen_ktp_pasangan" id="form_dokumen_ktp_pasangan">
                                        <div class="invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                        <div id="dokumen_akta_kelahiran" style="display: none;">
                            <div class="row mb-3">
                            <label for="form_dokumen_akta_kelahiran" class="col-sm-4 col-form-label">Foto Akta Kelahiran</label>
                                <div class="col-sm-8">
                                <input class="form-control <?= ($validation->hasError('form_dokumen_akta_kelahiran')) ? 'is-invalid' : ''; ?>" type="file" name="form_dokumen_akta_kelahiran" id="form_dokumen_akta_kelahiran">
                                        <div class="invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                        <div id="dokumen_akta_nikah" style="display: none;">
                            <div class="row mb-3">
                            <label for="form_dokumen_akta_nikah" class="col-sm-4 col-form-label">Foto Akta Nikah</label>
                                <div class="col-sm-8">
                                <input class="form-control <?= ($validation->hasError('form_dokumen_akta_nikah')) ? 'is-invalid' : ''; ?>" type="file" name="form_dokumen_akta_nikah" id="form_dokumen_akta_nikah">
                                        <div class="invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                        <div id="dokumen_foto_barang_hilang" style="display: none;">
                            <div class="row mb-3">
                            <label for="form_dokumen_foto_barang_hilang" class="col-sm-4 col-form-label">Foto Barang Yang Hilang</label>
                                <div class="col-sm-8">
                                <input class="form-control <?= ($validation->hasError('form_dokumen_foto_barang_hilang')) ? 'is-invalid' : ''; ?>" type="file" name="form_dokumen_foto_barang_hilang" id="form_dokumen_foto_barang_hilang">
                                        <div class="invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                        <div id="data_kelahiran" style="display: none;">
                            <h3>Data Ayah</h3>
                                <div class="row mb-3">
                                    <label for="nik_ayah" class="col-sm-4 col-form-label">NIK Ayah</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control <?= ($validation->hasError('nik_ayah')) ? 'is-invalid' : ''; ?>" id="nik_ayah" name="nik_ayah" >
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= $validation->getError('nik_ayah') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="nama_ayah" class="col-sm-4 col-form-label">Nama Ayah</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control <?= ($validation->hasError('nama_ayah')) ? 'is-invalid' : ''; ?>" id="nama_ayah" name="nama_ayah" >
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= $validation->getError('nama_ayah') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="tempat_lahir_ayah" class="col-sm-4 col-form-label">Tempat Lahir Ayah</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control <?= ($validation->hasError('tempat_lahir_ayah')) ? 'is-invalid' : ''; ?>" id="tempat_lahir_ayah" name="tempat_lahir_ayah" >
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= $validation->getError('tmepat_lahir_ayah') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="tgl_lahir_ayah" class="col-sm-4 col-form-label">Tanggal Lahir Ayah</label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control <?= ($validation->hasError('tgl_lahir_ayah')) ? 'is-invalid' : ''; ?>" id="tgl_lahir_ayah" name="tgl_lahir_ayah" >
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= $validation->getError('tgl_lahir_ayah') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="alamat_ayah" class="col-sm-4 col-form-label">Alamat Ayah</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control <?= ($validation->hasError('alamat_ayah')) ? 'is-invalid' : ''; ?>" id="alamat_ayah" name="alamat_ayah" >
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= $validation->getError('alamat_ayah') ?>
                                        </div>
                                    </div>
                                </div>
                                <h3>Data Ibu</h3>
                                <div class="row mb-3">
                                    <label for="nik_ibu" class="col-sm-4 col-form-label">NIK Ibu</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control <?= ($validation->hasError('nik_ibu')) ? 'is-invalid' : ''; ?>" id="nik_ibu" name="nik_ibu" >
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= $validation->getError('nik_ibu') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="nama_ibu" class="col-sm-4 col-form-label">Nama Ibu</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control <?= ($validation->hasError('nama_ibu')) ? 'is-invalid' : ''; ?>" id="nama_ibu" name="nama_ibu" >
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= $validation->getError('nama_ibu') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="tempat_lahir_ibu" class="col-sm-4 col-form-label">Tempat Lahir Ibu</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control <?= ($validation->hasError('tempat_lahir_ibu')) ? 'is-invalid' : ''; ?>" id="tempat_lahir_ibu" name="tempat_lahir_ibu" >
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= $validation->getError('tempat_lahir_ibu') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="tgl_lahir_ibu" class="col-sm-4 col-form-label">Tanggal Lahir Ibu</label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control <?= ($validation->hasError('tgl_lahir_ibu')) ? 'is-invalid' : ''; ?>" id="tgl_lahir_ibu" name="tgl_lahir_ibu" >
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= $validation->getError('tgl_lahir_ibu') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="alamat_ibu" class="col-sm-4 col-form-label">Alamat Ibu</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control <?= ($validation->hasError('alamat_ibu')) ? 'is-invalid' : ''; ?>" id="alamat_ibu" name="alamat_ibu" >
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= $validation->getError('alamat_ibu') ?>
                                        </div>
                                    </div>
                                </div>
                                <h3>Data Anak</h3>
                                <div class="row mb-3">
                                    <label for="nama_anak" class="col-sm-4 col-form-label">Nama Anak</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control <?= ($validation->hasError('nama_anak')) ? 'is-invalid' : ''; ?>" id="nama_anak" name="nama_anak" >
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= $validation->getError('nama_anak') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="tempat_lahir_anak" class="col-sm-4 col-form-label">Tempat Lahir Anak</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control <?= ($validation->hasError('tempat_lahir_anak')) ? 'is-invalid' : ''; ?>" id="tempat_lahir_anak" name="tempat_lahir_anak" >
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= $validation->getError('tempat_lahir_anak') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="tgl_lahir_anak" class="col-sm-4 col-form-label">Tanggal Lahir Anak</label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control <?= ($validation->hasError('tgl_lahir_anak')) ? 'is-invalid' : ''; ?>" id="tgl_lahir_anak" name="tgl_lahir_anak" >
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= $validation->getError('tgl_lahir_anak') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="lokasi_lahir" class="col-sm-4 col-form-label">Lahir Di</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control <?= ($validation->hasError('lokasi_lahir')) ? 'is-invalid' : ''; ?>" id="lokasi_lahir" name="lokasi_lahir" >
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= $validation->getError('lokasi_lahir') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="alamat_anak" class="col-sm-4 col-form-label">Alamat Anak</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control <?= ($validation->hasError('alamat_anak')) ? 'is-invalid' : ''; ?>" id="alamat_anak" name="alamat_anak" >
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= $validation->getError('alamat_anak') ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        
                        <button type="submit" class="btn btn-primary" id="btn_ajukan_surat">Ajukan</button>
                    </form>
                </div>
            </div>

            <div class="card mb-4 mt-4">
                <div class="card-header">
                    <h4>Status Pengurusan Surat</h4>

                </div>
                <div class="card-body">

                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jenis Surat</th>
                                <th>Keperluan</th>
                                <th>Status</th>
                                <th>Tanggal Diajukan</th>
                                <th>Tanggal Selesai</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = "1"; ?>
                            <?php foreach ($riwayat as $r) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $r['jenis_surat']; ?></td>
                                    <td><?= $r['keperluan']; ?></td>
                                    <td style="text-transform: uppercase ;"><?= $r['status']; ?></td>
                                    <td><?= $r['created_at']; ?></td>
                                    <td><?= ($r['status'] == "selesai") ? $r['updated_at'] : ''; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </main>
</div>
<script>
 // Menampilkan form input untuk detail orang yang pindah berdasarkan jumlah orang yang diinputkan
    // Menampilkan form input untuk detail orang yang pindah berdasarkan jumlah orang yang diinputkan
    $('#jumlah_orang').on('input', function() {
        $('#form-detail-orang').empty();
        var jumlahOrang = parseInt($('#jumlah_orang').val());
        for (var i = 1; i <= jumlahOrang; i++) {
            var nik = '', nama = '';
            if (typeof old !== 'undefined') {
                nik = old('nik_orang'+i);
                nama = old('nama_orang'+i);
            }
            $('#form-detail-orang').append(`
                <h3>Orang #${i}</h3>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="nik_orang${i}">NIK</label>
                        <input type="text" class="form-control" id="nik_orang${i}" name="nik_orang[]" >
                    </div>
                    <div class="col-md-8">
                        <label for="nama_orang${i}">Nama</label>
                        <input type="text" class="form-control" id="nama_orang${i}" name="nama_orang[]">
                    </div>
                </div>
            `);
        }
    });

    $('#jenis_surat').change(function() {
        $("#form_dokumen_ktp").removeClass('is-invalid');
        $("#form_dokumen_kk").removeClass('is-invalid');
        $("#form_dokumen_surat_rt").removeClass('is-invalid');
        $("#form_dokumen_surat_keterangan_dokter").removeClass('is-invalid');
        $("#form_dokumen_ktp_yang_meninggal").removeClass('is-invalid');
        $("#form_dokumen_kematian_rs").removeClass('is-invalid');
        $("#form_dokumen_ktp_pasangan").removeClass('is-invalid');
        $("#form_dokumen_foto_barang_hilang").removeClass('is-invalid');
        $("#form_dokumen_akta_kelahiran").removeClass('is-invalid');
        $("#form_dokumen_akta_nikah").removeClass('is-invalid');
        $("#form_alamat_pindah").removeClass('is-invalid');
        $("#form_alasan_pindah").removeClass('is-invalid');
        $("#keperluan").removeClass('is-invalid');
        $("#form_nama_barang").removeClass('is-invalid');
        $("#nik_meninggal").removeClass('is-invalid');
        $("#tgl_meninggal").removeClass('is-invalid');
        $("#jam_meninggal").removeClass('is-invalid');
        $("#tempat_meninggal").removeClass('is-invalid');
        $("#sebab_meninggal").removeClass('is-invalid');
        $("#nama_nakes").removeClass('is-invalid');
        $("#nik_nakes").removeClass('is-invalid');
        $("#data_lahir_nakes").removeClass('is-invalid');
        $("#pekerjaan_nakes").removeClass('is-invalid');
        $("#alamat_nakes").removeClass('is-invalid');

        $("#form_dokumen_ktp").next().text('');
        $("#form_dokumen_kk").next().text('');
        $("#form_dokumen_surat_rt").next().text('');
        $("#form_dokumen_surat_keterangan_dokter").next().text('');
        $("#form_dokumen_ktp_yang_meninggal").next().text('');
        $("#form_dokumen_kematian_rs").next().text('');
        $("#form_dokumen_ktp_pasangan").next().text('');
        $("#form_dokumen_foto_barang_hilang").next().text('');
        $("#form_dokumen_akta_kelahiran").next().text('');
        $("#form_dokumen_akta_nikah").next().text('');
        $("#keperluan").next().text('');
        $("#nama_barang").next().text('');
        $("#alamat_pindah").next().text('');
        $("#alasan_pindah").next().text('');
        $("#nik_meninggal").next().text('');
        $("#tgl_meninggal").next().text('');
        $("#jam_meninggal").next().text('');
        $("#tempat_meninggal").next().text('');
        $("#sebab_meninggal").next().text('');
        $("#nama_nakes").next().text('');
        $("#nik_nakes").next().text('');
        $("#data_lahir_nakes").next().text('');
        $("#pekerjaan_nakes").next().text('');
        $("#alamat_nakes").next().text('');

        if ($(this).val() == 'Surat Keterangan Usaha') {
            $('#form_keperluan').show();
            $('#dokumen_ktp').show();
            $('#dokumen_kk').hide();
            $('#dokumen_surat_rt').hide();
            $('#dokumen_surat_keterangan_dokter').hide();
            $('#dokumen_ktp_yang_meninggal').hide();
            $('#dokumen_kematian_rs').hide();
            $('#dokumen_ktp_pasangan').hide();
            $('#dokumen_foto_barang_hilang').hide();
            $('#data_kelahiran').hide();
            $('#form_nama_barang').hide();
            $('#form_alamat_pindah').hide();
            $('#form_alasan_pindah').hide();
            $('#turut_pindah').hide();
            $('#form_surat_kematian').hide();

            $("#form_proses_surat").submit(function(e) {
                e.preventDefault();
                const formData = new FormData(this);
                if (!this.checkValidity()) {
                    e.preventDefault();
                    $(this).addClass('was-validated');
                } else {
                    $.ajax({
                        url: '<?= base_url('masyarakat/proses_surat') ?>',
                        method: 'post',
                        data: formData,
                        contentType: false,
                        cache: false,
                        processData: false,
                        dataType: 'json',
                        success: function(response) {
                            if (response.error) {
                                console.log(response)
                                if (response.message.dokumen_ktp) {
                                    $("#form_dokumen_ktp").addClass('is-invalid');
                                    $("#form_dokumen_ktp").next().text(response.message.dokumen_ktp);
                                }
                                if (response.message.dokumen_ktp == null) {
                                    $("#form_dokumen_ktp").removeClass('is-invalid');
                                }
                                if (response.message.keperluan) {
                                    $("#keperluan").addClass('is-invalid');
                                    $("#keperluan").next().text(response.message.keperluan);
                                }
                                if (response.message.keperluan == null) {
                                    $("#keperluan").removeClass('is-invalid');
                                }
                            } else {
                                $("#form_proses_surat")[0].reset();
                                $("#form_dokumen_ktp").removeClass('is-invalid');
                                $("#keperluan").removeClass('is-invalid');
                                $("#form_dokumen_ktp").next().text('');
                                $("#keperluan").next().text('');
                                $("#form_proses_surat").removeClass('was-validated');
                                Swal.fire(
                                    'Berhasil',
                                    response.message,
                                    'success'
                                );
                            }
                        }
                    });
                    
                    
                }
            })
        };
        if ($(this).val() == 'Surat Keterangan Tidak Mampu') {
            $('#form_keperluan').show();
            $('#dokumen_ktp').show();
            $('#dokumen_kk').show();
            $('#dokumen_surat_rt').show();
            $('#dokumen_surat_keterangan_dokter').hide();
            $('#dokumen_ktp_yang_meninggal').hide();
            $('#dokumen_kematian_rs').hide();
            $('#dokumen_ktp_pasangan').hide();
            $('#dokumen_foto_barang_hilang').hide();
            $('#dokumen_akta_kelahiran').hide();
            $('#dokumen_akta_nikah').hide();
            $('#data_kelahiran').hide();
            $('#form_nama_barang').hide();
            $('#form_alamat_pindah').hide();
            $('#form_alasan_pindah').hide();
            $('#turut_pindah').hide();
            $('#form_surat_kematian').hide();

            $("#form_proses_surat").submit(function(e) {
                e.preventDefault();
                const formData = new FormData(this);
                if (!this.checkValidity()) {
                    e.preventDefault();
                    $(this).addClass('was-validated');
                } else {
                    $.ajax({
                        url: '<?= base_url('masyarakat/proses_surat') ?>',
                        method: 'post',
                        data: formData,
                        contentType: false,
                        cache: false,
                        processData: false,
                        dataType: 'json',
                        success: function(response) {
                            if (response.error) {
                                console.log(response)
                                if (response.message.dokumen_ktp) {
                                    $("#form_dokumen_ktp").addClass('is-invalid');
                                    $("#form_dokumen_ktp").next().text(response.message.dokumen_ktp);

                                }
                                if (response.message.dokumen_ktp == null) {
                                    $("#form_dokumen_ktp").removeClass('is-invalid');
                                }
                                if (response.message.dokumen_kk) {
                                    $("#form_dokumen_kk").addClass('is-invalid');
                                    $("#form_dokumen_kk").next().text(response.message.dokumen_kk);
                                }
                                if (response.message.dokumen_kk == null) {
                                    $("#form_dokumen_kk").removeClass('is-invalid');
                                }
                                if (response.message.dokumen_surat_rt) {
                                    $("#form_dokumen_surat_rt").addClass('is-invalid');
                                    $("#form_dokumen_surat_rt").next().text(response.message.dokumen_surat_rt);
                                }
                                if (response.message.dokumen_surat_rt == null) {
                                    $("#form_dokumen_surat_rt").removeClass('is-invalid');
                                }
                                if (response.message.keperluan) {
                                    $("#keperluan").addClass('is-invalid');
                                    $("#keperluan").next().text(response.message.keperluan);
                                }
                                if (response.message.keperluan == null) {
                                    $("#keperluan").removeClass('is-invalid');
                                }
                            } else {
                                $("#form_proses_surat")[0].reset();
                                $("#form_dokumen_ktp").removeClass('is-invalid');
                                $("#form_dokumen_kk").removeClass('is-invalid');
                                $("#form_dokumen_surat_rt").removeClass('is-invalid');
                                $("#keperluan").removeClass('is-invalid');
                                $("#form_dokumen_ktp").next().text('');
                                $("#form_dokumen_kk").next().text('');
                                $("#form_dokumen_surat_rt").next().text('');
                                $("#keperluan").next().text('');
                                $("#form_proses_surat").removeClass('was-validated');
                                Swal.fire(
                                    'Berhasil',
                                    response.message,
                                    'success'
                                );
                            }
                        }
                    });
                }
            });
        }; 
        if ($(this).val() == 'Surat Kelahiran') {
            $('#form_keperluan').show();
            $('#dokumen_ktp').show();
            $('#dokumen_surat_rt').show();
            $('#dokumen_surat_keterangan_dokter').show();
            $('#data_kelahiran').show();
            $('#dokumen_ktp_yang_meninggal').hide();
            $('#dokumen_kk').hide();
            $('#dokumen_kematian_rs').hide();
            $('#dokumen_ktp_pasangan').hide();
            $('#dokumen_foto_barang_hilang').hide();
            $('#dokumen_akta_kelahiran').hide();
            $('#dokumen_akta_nikah').hide();
            $('#form_nama_barang').hide();
            $('#form_alamat_pindah').hide();
            $('#form_alasan_pindah').hide();
            $('#turut_pindah').hide();
            $('#form_surat_kematian').hide();

            $("#form_proses_surat").submit(function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            if (!this.checkValidity()) {
                e.preventDefault();
                $(this).addClass('was-validated');
            } else {
                $.ajax({
                    url: '<?= base_url('masyarakat/proses_surat') ?>',
                    method: 'post',
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData: false,
                    dataType: 'json',
                    success: function(response) {
                        if (response.error) {
                            console.log(response)
                            if (response.message.dokumen_ktp) {
                                $("#form_dokumen_ktp").addClass('is-invalid');
                                $("#form_dokumen_ktp").next().text(response.message.dokumen_ktp);

                            }
                            if (response.message.dokumen_ktp == null) {
                                $("#form_dokumen_ktp").removeClass('is-invalid');
                            }
                            if (response.message.dokumen_surat_keterangan_dokter) {
                                $("#form_dokumen_surat_keterangan_dokter").addClass('is-invalid');
                                $("#form_dokumen_surat_keterangan_dokter").next().text(response.message.dokumen_surat_keterangan_dokter);
                            }
                            if (response.message.dokumen_surat_keterangan_dokter == null) {
                                $("#form_dokumen_surat_keterangan_dokter").removeClass('is-invalid');
                            }
                            if (response.message.dokumen_surat_rt) {
                                $("#form_dokumen_surat_rt").addClass('is-invalid');
                                $("#form_dokumen_surat_rt").next().text(response.message.dokumen_surat_rt);
                            }
                            if (response.message.dokumen_surat_rt == null) {
                                $("#form_dokumen_surat_rt").removeClass('is-invalid');
                            }
                            if (response.message.nik_ayah) {
                                $("#nik_ayah").addClass('is-invalid');
                                $("#nik_ayah").next().text(response.message.nik_ayah);
                            }
                            if (response.message.nik_ayah == null) {
                                $("#nik_ayah").removeClass('is-invalid');
                            }
                            if (response.message.nama_ayah) {
                                $("#nama_ayah").addClass('is-invalid');
                                $("#nama_ayah").next().text(response.message.nama_ayah);
                            }
                            if (response.message.nama_ayah == null) {
                                $("#nama_ayah").removeClass('is-invalid');
                            }
                            if (response.message.tempat_lahir_ayah) {
                                $("#tempat_lahir_ayah").addClass('is-invalid');
                                $("#tempat_lahir_ayah").next().text(response.message.tempat_lahir_ayah);
                            }
                            if (response.message.tempat_lahir_ayah == null) {
                                $("#tempat_lahir_ayah").removeClass('is-invalid');
                            }
                            if (response.message.tgl_lahir_ayah) {
                                $("#tgl_lahir_ayah").addClass('is-invalid');
                                $("#tgl_lahir_ayah").next().text(response.message.tgl_lahir_ayah);
                            }
                            if (response.message.tgl_lahir_ayah == null) {
                                $("#tgl_lahir_ayah").removeClass('is-invalid');
                            }
                            if (response.message.alamat_ayah) {
                                $("#alamat_ayah").addClass('is-invalid');
                                $("#alamat_ayah").next().text(response.message.alamat_ayah);
                            }
                            if (response.message.alamat_ayah == null) {
                                $("#alamat_ayah").removeClass('is-invalid');
                            }
                            if (response.message.nik_ibu) {
                                $("#nik_ibu").addClass('is-invalid');
                                $("#nik_ibu").next().text(response.message.nik_ibu);
                            }
                            if (response.message.nik_ibu == null) {
                                $("#nik_ibu").removeClass('is-invalid');
                            }
                            if (response.message.nama_ibu) {
                                $("#nama_ibu").addClass('is-invalid');
                                $("#nama_ibu").next().text(response.message.nama_ibu);
                            }
                            if (response.message.nama_ibu == null) {
                                $("#nama_ibu").removeClass('is-invalid');
                            }
                            if (response.message.tempat_lahir_ibu) {
                                $("#tempat_lahir_ibu").addClass('is-invalid');
                                $("#tempat_lahir_ibu").next().text(response.message.tempat_lahir_ibu);
                            }
                            if (response.message.tempat_lahir_ibu == null) {
                                $("#tempat_lahir_ibu").removeClass('is-invalid');
                            }
                            if (response.message.tgl_lahir_ibu) {
                                $("#tgl_lahir_ibu").addClass('is-invalid');
                                $("#tgl_lahir_ibu").next().text(response.message.tgl_lahir_ibu);
                            }
                            if (response.message.tgl_lahir_ibu == null) {
                                $("#tgl_lahir_ibu").removeClass('is-invalid');
                            }
                            if (response.message.alamat_ibu) {
                                $("#alamat_ibu").addClass('is-invalid');
                                $("#alamat_ibu").next().text(response.message.alamat_ibu);
                            }
                            if (response.message.alamat_ibu == null) {
                                $("#alamat_ibu").removeClass('is-invalid');
                            }
                            if (response.message.nama_anak) {
                                $("#nama_anak").addClass('is-invalid');
                                $("#nama_anak").next().text(response.message.nama_anak);
                            }
                            if (response.message.nama_anak == null) {
                                $("#nama_anak").removeClass('is-invalid');
                            }
                            if (response.message.tempat_lahir_ibu) {
                                $("#tempat_lahir_anak").addClass('is-invalid');
                                $("#tempat_lahir_anak").next().text(response.message.tempat_lahir_anak);
                            }
                            if (response.message.tempat_lahir_anak == null) {
                                $("#tempat_lahir_anak").removeClass('is-invalid');
                            }
                            if (response.message.tgl_lahir_anak) {
                                $("#tgl_lahir_anak").addClass('is-invalid');
                                $("#tgl_lahir_anak").next().text(response.message.tgl_lahir_anak);
                            }
                            if (response.message.tgl_lahir_anak == null) {
                                $("#tgl_lahir_anak").removeClass('is-invalid');
                            }
                            if (response.message.lokasi_lahir) {
                                $("#lokasi_lahir").addClass('is-invalid');
                                $("#lokasi_lahir").next().text(response.message.lokasi_lahir);
                            }
                            if (response.message.lokasi_lahir == null) {
                                $("#lokasi_lahir").removeClass('is-invalid');
                            }
                            if (response.message.alamat_anak) {
                                $("#alamat_anak").addClass('is-invalid');
                                $("#alamat_anak").next().text(response.message.alamat_anak);
                            }
                            if (response.message.alamat_anak == null) {
                                $("#alamat_anak").removeClass('is-invalid');
                            }
                            if (response.message.keperluan) {
                                $("#keperluan").addClass('is-invalid');
                                $("#keperluan").next().text(response.message.keperluan);
                            }
                            if (response.message.keperluan == null) {
                                $("#keperluan").removeClass('is-invalid');
                            }
                        } else {
                            $("#form_proses_surat")[0].reset();
                            $("#form_dokumen_ktp").removeClass('is-invalid');
                            $("#form_dokumen_kk").removeClass('is-invalid');
                            $("#form_dokumen_surat_rt").removeClass('is-invalid');
                            $("#form_dokumen_surat_keterangan_dokter").removeClass('is-invalid');
                            $("#keperluan").removeClass('is-invalid');
                            $("#form_dokumen_ktp").next().text('');
                            $("#form_dokumen_kk").next().text('');
                            $("#form_dokumen_surat_rt").next().text('');
                            $("#form_dokumen_surat_keterangan_dokter").next().text('');
                            $("#keperluan").next().text('');
                            $("#form_proses_surat").removeClass('was-validated');
                            Swal.fire(
                                'Berhasil',
                                response.message,
                                'success'
                            );
                        }
                    }
                });
            }
            })
        };

        if ($(this).val() == 'Surat Pengantar Pembuatan KTP') {
            $('#form_keperluan').show();
            $('#dokumen_kk').show();
            $('#dokumen_akta_kelahiran').show();
            $('#dokumen_surat_rt').show();
            $('#tgl_lahir').show();
            $('#dokumen_ktp').hide();
            $('#dokumen_surat_keterangan_dokter').hide();
            $('#dokumen_ktp_yang_meninggal').hide();
            $('#dokumen_kematian_rs').hide();
            $('#dokumen_ktp_pasangan').hide();
            $('#dokumen_foto_barang_hilang').hide();
            $('#dokumen_akta_nikah').hide();
            $('#data_kelahiran').hide();
            $('#form_nama_barang').hide();
            $('#form_alamat_pindah').hide();
            $('#form_alasan_pindah').hide();
            $('#turut_pindah').hide();
            $('#form_surat_kematian').hide();

            var birthdate = $('#tgl_lahir').val();
            var currentdate = new Date();
            var birthdate = new Date(birthdate);
            var age = currentdate.getFullYear() - birthdate.getFullYear();
            var m = currentdate.getMonth() - birthdate.getMonth();
            if (m < 0 || (m === 0 && currentdate.getDate() < birthdate.getDate())) {
                age--;
            }
            $("#tgl_lahir").val(age);
            $("#form_proses_surat").submit(function(e) {
                    e.preventDefault();
                    const formData = new FormData(this);
                    if (!this.checkValidity()) {
                        e.preventDefault();
                        $(this).addClass('was-validated');
                    } else {
                        $.ajax({
                            url: '<?= base_url('masyarakat/proses_surat') ?>',
                            method: 'post',
                            data: formData,
                            contentType: false,
                            cache: false,
                            processData: false,
                            dataType: 'json',
                            success: function(response) {
                                if (response.error) {
                                    console.log(response)
                                    if (response.message.tgl_lahir) {
                                        Swal.fire({
                                            icon: 'error',
                                            text: response.message.tgl_lahir,
                                        })
                                    }
                                    if (response.message.dokumen_kk) {
                                        $("#form_dokumen_kk").addClass('is-invalid');
                                        $("#form_dokumen_kk").next().text(response.message.dokumen_kk);

                                    }
                                    if (response.message.dokumen_kk == null) {
                                        $("#form_dokumen_kk").removeClass('is-invalid');
                                    }
                                    if (response.message.dokumen_surat_rt) {
                                        $("#form_dokumen_surat_rt").addClass('is-invalid');
                                        $("#form_dokumen_surat_rt").next().text(response.message.dokumen_surat_rt);

                                    }
                                    if (response.message.dokumen_surat_rt == null) {
                                        $("#form_dokumen_surat_rt").removeClass('is-invalid');
                                    }
                                    if (response.message.dokumen_akta_kelahiran) {
                                        $("#form_dokumen_akta_kelahiran").addClass('is-invalid');
                                        $("#form_dokumen_akta_kelahiran").next().text(response.message.dokumen_akta_kelahiran);
                                    }
                                    if (response.message.dokumen_akta_kelahiran == null) {
                                        $("#form_dokumen_akta_kelahiran").removeClass('is-invalid');
                                    }
                                    if (response.message.keperluan) {
                                        $("#keperluan").addClass('is-invalid');
                                        $("#keperluan").next().text(response.message.keperluan);
                                    }
                                    if (response.message.keperluan == null) {
                                        $("#keperluan").removeClass('is-invalid');
                                    }
                                } else {
                                    $("#form_proses_surat")[0].reset();
                                    $("#form_dokumen_kk").removeClass('is-invalid');
                                    $("#form_dokumen_surat_rt").removeClass('is-invalid');
                                    $("#form_dokumen_akta_kelahiran").removeClass('is-invalid');
                                    $("#keperluan").removeClass('is-invalid');
                                    $("#form_dokumen_kk").next().text('');
                                    $("#form_dokumen_akta_kelahiran").next().text('');
                                    $("#form_dokumen_surat_rt").next().text('');
                                    $("#keperluan").next().text('');
                                    $("#form_proses_surat").removeClass('was-validated');
                                    Swal.fire(
                                        'Berhasil',
                                        response.message,
                                        'success'
                                    );
                                }
                            }
                        });
                    }
                
            });

        };
        if ($(this).val() == 'Surat Pengantar Pembuatan KK') {
                $('#form_keperluan').show();
                $('#dokumen_ktp').show();
                $('#dokumen_ktp_pasangan').show();
                $('#dokumen_akta_nikah').show();
                $('#dokumen_surat_rt').show();
                $('#dokumen_kk').hide();
                $('#dokumen_akta_kelahiran').hide();
                $('#dokumen_surat_keterangan_dokter').hide();
                $('#dokumen_ktp_yang_meninggal').hide();
                $('#dokumen_kematian_rs').hide();
                $('#dokumen_foto_barang_hilang').hide();
                $('#data_kelahiran').hide();
                $('#form_nama_barang').hide();
                $('#form_alamat_pindah').hide();
                $('#form_alasan_pindah').hide();
                $('#turut_pindah').hide();
                $('#form_surat_kematian').hide();

                $("#form_proses_surat").submit(function(e) {
                    e.preventDefault();
                    const formData = new FormData(this);
                    if (!this.checkValidity()) {
                        e.preventDefault();
                        $(this).addClass('was-validated');
                    } else {
                        $.ajax({
                            url: '<?= base_url('masyarakat/proses_surat') ?>',
                            method: 'post',
                            data: formData,
                            contentType: false,
                            cache: false,
                            processData: false,
                            dataType: 'json',
                            success: function(response) {
                                if (response.error) {
                                    console.log(response)
                                    if (response.message.dokumen_ktp) {
                                        $("#form_dokumen_ktp").addClass('is-invalid');
                                        $("#form_dokumen_ktp").next().text(response.message.dokumen_ktp);

                                    }
                                    if (response.message.dokumen_ktp == null) {
                                        $("#form_dokumen_ktp").removeClass('is-invalid');
                                    }
                                    if (response.message.dokumen_ktp_pasangan) {
                                        $("#form_dokumen_ktp_pasangan").addClass('is-invalid');
                                        $("#form_dokumen_ktp_pasangan").next().text(response.message.dokumen_ktp_pasangan);

                                    }
                                    if (response.message.dokumen_ktp_pasangan == null) {
                                        $("#form_dokumen_ktp_pasangan").removeClass('is-invalid');
                                    }
                                    if (response.message.dokumen_akta_nikah) {
                                        $("#form_dokumen_akta_nikah").addClass('is-invalid');
                                        $("#form_dokumen_akta_nikah").next().text(response.message.dokumen_akta_nikah);
                                    }
                                    if (response.message.dokumen_akta_nikah == null) {
                                        $("#form_dokumen_akta_nikah").removeClass('is-invalid');
                                    }
                                    if (response.message.dokumen_surat_rt) {
                                        $("#form_dokumen_surat_rt").addClass('is-invalid');
                                        $("#form_dokumen_surat_rt").next().text(response.message.dokumen_surat_rt);
                                    }
                                    if (response.message.dokumen_surat_rt == null) {
                                        $("#form_dokumen_surat_rt").removeClass('is-invalid');
                                    }
                                    if (response.message.keperluan) {
                                        $("#keperluan").addClass('is-invalid');
                                        $("#keperluan").next().text(response.message.keperluan);
                                    }
                                    if (response.message.keperluan == null) {
                                        $("#keperluan").removeClass('is-invalid');
                                    }
                                } else {
                                    $("#form_proses_surat")[0].reset();
                                    $("#form_dokumen_kk").removeClass('is-invalid');
                                    $("#form_dokumen_surat_rt").removeClass('is-invalid');
                                    $("#form_dokumen_akta_nikah").removeClass('is-invalid');
                                    $("#keperluan").removeClass('is-invalid');
                                    $("#form_dokumen_kk").next().text('');
                                    $("#form_dokumen_akta_nikah").next().text('');
                                    $("#form_dokumen_surat_rt").next().text('');
                                    $("#keperluan").next().text('');
                                    $("#form_proses_surat").removeClass('was-validated');
                                    Swal.fire(
                                        'Berhasil',
                                        response.message,
                                        'success'
                                    );
                                }
                            }
                        });
                    }
                });
        };
        if ($(this).val() == 'Surat Pengantar SKCK') {
            $('#form_keperluan').show();
            $('#dokumen_ktp').show();
            $('#dokumen_kk').show();
            $('#dokumen_akta_kelahiran').show();
            $('#dokumen_surat_rt').hide();
            $('#dokumen_ktp_pasangan').hide();
            $('#dokumen_akta_nikah').hide();
            $('#dokumen_surat_keterangan_dokter').hide();
            $('#dokumen_ktp_yang_meninggal').hide();
            $('#dokumen_kematian_rs').hide();
            $('#dokumen_foto_barang_hilang').hide();
            $('#data_kelahiran').hide();
            $('#form_nama_barang').hide();
            $('#form_alamat_pindah').hide();
            $('#form_alasan_pindah').hide();
            $('#turut_pindah').hide();
            $('#form_surat_kematian').hide();

            $("#form_proses_surat").submit(function(e) {
                    e.preventDefault();
                    const formData = new FormData(this);
                    if (!this.checkValidity()) {
                        e.preventDefault();
                        $(this).addClass('was-validated');
                    } else {
                        $.ajax({
                            url: '<?= base_url('masyarakat/proses_surat') ?>',
                            method: 'post',
                            data: formData,
                            contentType: false,
                            cache: false,
                            processData: false,
                            dataType: 'json',
                            success: function(response) {
                                if (response.error) {
                                    console.log(response)
                                    if (response.message.dokumen_ktp) {
                                        $("#form_dokumen_ktp").addClass('is-invalid');
                                        $("#form_dokumen_ktp").next().text(response.message.dokumen_ktp);

                                    }
                                    if (response.message.dokumen_ktp == null) {
                                        $("#form_dokumen_ktp").removeClass('is-invalid');
                                    }
                                    if (response.message.dokumen_kk) {
                                        $("#form_dokumen_kk").addClass('is-invalid');
                                        $("#form_dokumen_kk").next().text(response.message.dokumen_kk);

                                    }
                                    if (response.message.dokumen_kk == null) {
                                        $("#form_dokumen_kk").removeClass('is-invalid');
                                    }
                                    
                                    if (response.message.dokumen_akta_kelahiran) {
                                        $("#form_dokumen_akta_kelahiran").addClass('is-invalid');
                                        $("#form_dokumen_akta_kelahiran").next().text(response.message.dokumen_akta_kelahiran);
                                    }
                                    if (response.message.dokumen_akta_kelahiran == null) {
                                        $("#form_dokumen_akta_kelahiran").removeClass('is-invalid');
                                    }
                                    if (response.message.keperluan) {
                                        $("#keperluan").addClass('is-invalid');
                                        $("#keperluan").next().text(response.message.keperluan);
                                    }
                                    if (response.message.keperluan == null) {
                                        $("#keperluan").removeClass('is-invalid');
                                    }
                                    if (response.message.tenaga_kesehatan) {
                                        $("#tenaga_kesehatan").addClass('is-invalid');
                                        $("#tenaga_kesehatan").next().text(response.message.tenaga_kesehatan);
                                    }
                                    if (response.message.tenaga_kesehatan == null) {
                                        $("#tenaga_kesehatan").removeClass('is-invalid');
                                    }
                                } else {
                                    $("#form_proses_surat")[0].reset();
                                    $("#form_dokumen_kk").removeClass('is-invalid');
                                    $("#form_dokumen_surat_rt").removeClass('is-invalid');
                                    $("#form_dokumen_akta_kelahiran").removeClass('is-invalid');
                                    $("#keperluan").removeClass('is-invalid');
                                    $("#tenaga_kesehatan").removeClass('is-invalid');
                                    $("#form_dokumen_kk").next().text('');
                                    $("#form_dokumen_akta_kelahiran").next().text('');
                                    $("#form_dokumen_surat_rt").next().text('');
                                    $("#keperluan").next().text('');
                                    $("#tenaga_kesehatan").next().text('');
                                    $("#form_proses_surat").removeClass('was-validated');
                                    Swal.fire(
                                        'Berhasil',
                                        response.message,
                                        'success'
                                    );
                                }
                            }
                        });
                    }
                
            });

            
        };
        if ($(this).val() == 'Surat Kehilangan') {
            $('#form_keperluan').show();
            $('#dokumen_kk').show();
            $('#dokumen_surat_rt').show();
            $('#dokumen_foto_barang_hilang').show();
            $('#form_nama_barang').show();
            $('#dokumen_ktp').hide();
            $('#dokumen_ktp_pasangan').hide();
            $('#dokumen_akta_nikah').hide();
            $('#dokumen_akta_kelahiran').hide();
            $('#dokumen_surat_keterangan_dokter').hide();
            $('#dokumen_ktp_yang_meninggal').hide();
            $('#dokumen_kematian_rs').hide();
            $('#data_kelahiran').hide();
            $('#form_alamat_pindah').hide();
            $('#form_alasan_pindah').hide();
            $('#turut_pindah').hide();
            $('#form_surat_kematian').hide();

            $("#form_proses_surat").submit(function(e) {
                    e.preventDefault();
                    const formData = new FormData(this);
                    if (!this.checkValidity()) {
                        e.preventDefault();
                        $(this).addClass('was-validated');
                    } else {
                        $.ajax({
                            url: '<?= base_url('masyarakat/proses_surat') ?>',
                            method: 'post',
                            data: formData,
                            contentType: false,
                            cache: false,
                            processData: false,
                            dataType: 'json',
                            success: function(response) {
                                if (response.error) {
                                    console.log(response)
                                    if (response.message.dokumen_kk) {
                                        $("#form_dokumen_kk").addClass('is-invalid');
                                        $("#form_dokumen_kk").next().text(response.message.dokumen_kk);

                                    }
                                    if (response.message.dokumen_kk == null) {
                                        $("#form_dokumen_kk").removeClass('is-invalid');
                                    }
                                    if (response.message.dokumen_surat_rt) {
                                        $("#form_dokumen_surat_rt").addClass('is-invalid');
                                        $("#form_dokumen_surat_rt").next().text(response.message.dokumen_surat_rt);

                                    }
                                    if (response.message.dokumen_surat_rt == null) {
                                        $("#form_dokumen_surat_rt").removeClass('is-invalid');
                                    }
                                    if (response.message.dokumen_foto_barang_hilang) {
                                        $("#form_dokumen_foto_barang_hilang").addClass('is-invalid');
                                        $("#form_dokumen_foto_barang_hilang").next().text(response.message.dokumen_foto_barang_hilang);
                                    }
                                    if (response.message.dokumen_foto_barang_hilang == null) {
                                        $("#form_dokumen_foto_barang_hilang").removeClass('is-invalid');
                                    }
                                    if (response.message.keperluan) {
                                        $("#keperluan").addClass('is-invalid');
                                        $("#keperluan").next().text(response.message.keperluan);
                                    }
                                    if (response.message.keperluan == null) {
                                        $("#keperluan").removeClass('is-invalid');
                                    }
                                    if (response.message.nama_barang) {
                                        $("#nama_barang").addClass('is-invalid');
                                        $("#nama_barang").next().text(response.message.nama_barang);
                                    }
                                    if (response.message.nama_barang == null) {
                                        $("#nama_barang").removeClass('is-invalid');
                                    }
                                } else {
                                    $("#form_proses_surat")[0].reset();
                                    $("#form_dokumen_kk").removeClass('is-invalid');
                                    $("#form_dokumen_surat_rt").removeClass('is-invalid');
                                    $("#form_dokumen_akta_kelahiran").removeClass('is-invalid');
                                    $("#keperluan").removeClass('is-invalid');
                                    $("#form_nama_barang").removeClass('is-invalid');
                                    $("#form_dokumen_kk").next().text('');
                                    $("#form_dokumen_akta_kelahiran").next().text('');
                                    $("#form_dokumen_surat_rt").next().text('');
                                    $("#keperluan").next().text('');
                                    $("#form_nama_barang").next().text('');
                                    $("#form_proses_surat").removeClass('was-validated');
                                    Swal.fire(
                                        'Berhasil',
                                        response.message,
                                        'success'
                                    );
                                }
                            }
                        });
                    }
                
            });

        };
        if ($(this).val() == 'Surat Keterangan Pindah Tempat') {
            $('#form_alasan_pindah').show();
            $('#form_alamat_pindah').show(); 
            $('#dokumen_ktp').show();
            $('#dokumen_kk').show();
            $('#dokumen_surat_rt').show();
            $('#turut_pindah').show();
            $('#form_keperluan').hide();
            $('#dokumen_foto_barang_hilang').hide();
            $('#dokumen_ktp_pasangan').hide();
            $('#dokumen_akta_nikah').hide();
            $('#dokumen_akta_kelahiran').hide();
            $('#dokumen_surat_keterangan_dokter').hide();
            $('#dokumen_ktp_yang_meninggal').hide();
            $('#dokumen_kematian_rs').hide();
            $('#data_kelahiran').hide();
            $('#form_nama_barang').hide();
            $('#form_surat_kematian').hide();

            $("#form_proses_surat").submit(function(e) {
                e.preventDefault();
                const formData = new FormData(this);
                if (!this.checkValidity()) {
                    e.preventDefault();
                    $(this).addClass('was-validated');
                } else {
                    console.log(formData);
                    $.ajax({
                        url: '<?= base_url('masyarakat/proses_surat') ?>',
                        method: 'post',
                        data: formData,
                        contentType: false,
                        cache: false,
                        processData: false,
                        dataType: 'json',
                        success: function(response) {
                            if (response.error) {
                                console.log(response)
                                if (response.message.dokumen_ktp) {
                                    $("#form_dokumen_ktp").addClass('is-invalid');
                                    $("#form_dokumen_ktp").next().text(response.message.dokumen_ktp);
                                }
                                if (response.message.dokumen_ktp == null) {
                                    $("#form_dokumen_ktp").removeClass('is-invalid');
                                }
                                if (response.message.dokumen_kk) {
                                    $("#form_dokumen_kk").addClass('is-invalid');
                                    $("#form_dokumen_kk").next().text(response.message.dokumen_kk);
                                }
                                if (response.message.dokumen_kk == null) {
                                    $("#form_dokumen_kk").removeClass('is-invalid');
                                }
                                if (response.message.dokumen_surat_rt) {
                                    $("#form_dokumen_surat_rt").addClass('is-invalid');
                                    $("#form_dokumen_surat_rt").next().text(response.message.dokumen_surat_rt);
                                }
                                if (response.message.dokumen_surat_rt == null) {
                                    $("#form_dokumen_surat_rt").removeClass('is-invalid');
                                }
                                if (response.message.keperluan) {
                                    $("#keperluan").addClass('is-invalid');
                                    $("#keperluan").next().text(response.message.keperluan);
                                }
                                if (response.message.keperluan == null) {
                                    $("#keperluan").removeClass('is-invalid');
                                }
                                if (response.message.alamat_pindah) {
                                    $("#alamat_pindah").addClass('is-invalid');
                                    $("#alamat_pindah").next().text(response.message.alamat_pindah);
                                }
                                if (response.message.alamat_pindah == null) {
                                    $("#alamat_pindah").removeClass('is-invalid');
                                }
                                if (response.message.alasan_pindah) {
                                    $("#alasan_pindah").addClass('is-invalid');
                                    $("#alasan_pindah").next().text(response.message.alasan_pindah);
                                }
                                if (response.message.alasan_pindah == null) {
                                    $("#alasan_pindah").removeClass('is-invalid');
                                }
                            } else {
                                $("#form_proses_surat")[0].reset();
                                $("#form_dokumen_ktp").removeClass('is-invalid');
                                $("#keperluan").removeClass('is-invalid');
                                $("#form_alamat_pindah").removeClass('is-invalid');
                                $("#form_alasan_pindah").removeClass('is-invalid');
                                $("#form_dokumen_ktp").next().text('');
                                $("#keperluan").next().text('');
                                $("#form_alamat_pindah").next().text('');
                                $("#form_alasan_pindah").next().text('');
                                $("#form_proses_surat").removeClass('was-validated');
                                Swal.fire(
                                    'Berhasil',
                                    response.message,
                                    'success'
                                );
                            }
                        }
                    });
                }   
            });
        };
        if ($(this).val() == 'Surat Kematian') {
            $('#form_keperluan').show();
            $('#dokumen_ktp_yang_meninggal').show();
            $('#dokumen_kk').show();
            $('#dokumen_surat_rt').show();
            $('#dokumen_ktp').show();
            $('#dokumen_kematian_rs').show();
            $('#form_surat_kematian').show();
            $('#dokumen_surat_keterangan_dokter').hide();
            $('#dokumen_foto_barang_hilang').hide();
            $('#dokumen_ktp_pasangan').hide();
            $('#dokumen_akta_nikah').hide();
            $('#dokumen_akta_kelahiran').hide();
            $('#dokumen_surat_keterangan_dokter').hide();
            $('#data_kelahiran').hide();
            $('#form_nama_barang').hide();
            $('#form_alamat_pindah').hide();
            $('#form_alasan_pindah').hide();
            $('#turut_pindah').hide();

            $("#form_proses_surat").submit(function(e) {
                e.preventDefault();
                const formData = new FormData(this);
                if (!this.checkValidity()) {
                    e.preventDefault();
                    $(this).addClass('was-validated');
                } else {
                    $.ajax({
                        url: '<?= base_url('masyarakat/proses_surat') ?>',
                        method: 'post',
                        data: formData,
                        contentType: false,
                        cache: false,
                        processData: false,
                        dataType: 'json',
                        success: function(response) {
                            if (response.error) {
                                console.log(response)
                                if (response.message.dokumen_ktp) {
                                    $("#form_dokumen_ktp").addClass('is-invalid');
                                    $("#form_dokumen_ktp").next().text(response.message.dokumen_ktp);
                                }
                                if (response.message.dokumen_ktp == null) {
                                    $("#form_dokumen_ktp").removeClass('is-invalid');
                                }
                                if (response.message.dokumen_kk) {
                                    $("#form_dokumen_kk").addClass('is-invalid');
                                    $("#form_dokumen_kk").next().text(response.message.dokumen_kk);
                                }
                                if (response.message.dokumen_kk == null) {
                                    $("#form_dokumen_kk").removeClass('is-invalid');
                                }
                                if (response.message.dokumen_surat_rt) {
                                    $("#form_dokumen_surat_rt").addClass('is-invalid');
                                    $("#form_dokumen_surat_rt").next().text(response.message.dokumen_surat_rt);

                                    }
                                if (response.message.dokumen_surat_rt == null) {
                                    $("#form_dokumen_ktp_yang_meninggal").removeClass('is-invalid');
                                }
                                if (response.message.dokumen_kematian_rs) {
                                    $("#form_dokumen_kematian_rs").addClass('is-invalid');
                                    $("#form_dokumen_kematian_rs").next().text(response.message.dokumen_kematian_rs);

                                    }
                                if (response.message.dokumen_kematian_rs == null) {
                                    $("#form_dokumen_kematian_rs").removeClass('is-invalid');
                                }
                                if (response.message.dokumen_ktp_yang_meninggal) {
                                    $("#form_dokumen_ktp_yang_meninggal").addClass('is-invalid');
                                    $("#form_dokumen_ktp_yang_meninggal").next().text(response.message.dokumen_ktp_yang_meninggal);

                                    }
                                if (response.message.dokumen_ktp_yang_meninggal == null) {
                                    $("#form_dokumen_ktp_yang_meninggal").removeClass('is-invalid');
                                }
                                if (response.message.keperluan) {
                                    $("#keperluan").addClass('is-invalid');
                                    $("#keperluan").next().text(response.message.keperluan);
                                }
                                if (response.message.keperluan == null) {
                                    $("#keperluan").removeClass('is-invalid');
                                }
                                if (response.message.nik_meninggal) {
                                    $("#nik_meninggal").addClass('is-invalid');
                                    $("#nik_meninggal").next().text(response.message.nik_meninggal);
                                }
                                if (response.message.nik_meninggal == null) {
                                    $("#nik_meninggal").removeClass('is-invalid');
                                }
                                if (response.message.tgl_meninggal) {
                                    $("#tgl_meninggal").addClass('is-invalid');
                                    $("#tgl_meninggal").next().text(response.message.tgl_meninggal);
                                }
                                if (response.message.tgl_meninggal == null) {
                                    $("#tgl_meninggal").removeClass('is-invalid');
                                }
                                if (response.message.jam_meninggal) {
                                    $("#jam_meninggal").addClass('is-invalid');
                                    $("#jam_meninggal").next().text(response.message.jam_meninggal);
                                }
                                if (response.message.jam_meninggal == null) {
                                    $("#jam_meninggal").removeClass('is-invalid');
                                }
                                if (response.message.tempat_meninggal) {
                                    $("#tempat_meninggal").addClass('is-invalid');
                                    $("#tempat_meninggal").next().text(response.message.tempat_meninggal);
                                }
                                if (response.message.tempat_meninggal == null) {
                                    $("#tempat_meninggal").removeClass('is-invalid');
                                }
                                if (response.message.sebab_meninggal) {
                                    $("#sebab_meninggal").addClass('is-invalid');
                                    $("#sebab_meninggal").next().text(response.message.sebab_meninggal);
                                }
                                if (response.message.sebab_meninggal == null) {
                                    $("#sebab_meninggal").removeClass('is-invalid');
                                }
                                if (response.message.nama_nakes) {
                                    $("#nama_nakes").addClass('is-invalid');
                                    $("#nama_nakes").next().text(response.message.nama_nakes);
                                }
                                if (response.message.nama_nakes == null) {
                                    $("#nama_nakes").removeClass('is-invalid');
                                }
                                if (response.message.nik_nakes) {
                                    $("#nik_nakes").addClass('is-invalid');
                                    $("#nik_nakes").next().text(response.message.nik_nakes);
                                }
                                if (response.message.nik_nakes == null) {
                                    $("#nik_nakes").removeClass('is-invalid');
                                }
                                if (response.message.data_lahir_nakes) {
                                    $("#data_lahir_nakes").addClass('is-invalid');
                                    $("#data_lahir_nakes").next().text(response.message.data_lahir_nakes);
                                }
                                if (response.message.data_lahir_nakes == null) {
                                    $("#data_lahir_nakes").removeClass('is-invalid');
                                }
                                if (response.message.pekerjaan_nakes) {
                                    $("#pekerjaan_nakes").addClass('is-invalid');
                                    $("#pekerjaan_nakes").next().text(response.message.pekerjaan_nakes);
                                }
                                if (response.message.pekerjaan_nakes == null) {
                                    $("#pekerjaan_nakes").removeClass('is-invalid');
                                }
                                if (response.message.alamat_nakes) {
                                    $("#alamat_nakes").addClass('is-invalid');
                                    $("#alamat_nakes").next().text(response.message.alamat_nakes);
                                }
                                if (response.message.alamat_nakes == null) {
                                    $("#alamat_nakes").removeClass('is-invalid');
                                }
                            } else {
                                $("#form_proses_surat")[0].reset();
                                $("#form_dokumen_ktp").removeClass('is-invalid');
                                $("#keperluan").removeClass('is-invalid');
                                $("#form_dokumen_ktp").next().text('');
                                $("#keperluan").next().text('');
                                $("#form_proses_surat").removeClass('was-validated');
                                Swal.fire(
                                    'Berhasil',
                                    response.message,
                                    'success'
                                );
                            }
                        }
                    });
                }   
            });
            
        };
    });


</script>
<?= $this->endSection(); ?>