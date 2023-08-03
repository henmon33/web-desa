<?= $this->extend('layanan/layout/navbar_pegawai'); ?>
<?= $this->section('content'); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
        <div class="card mb-4 mt-4 p-3">
            <?php foreach ($data_rincian as $d ) :?>
            <form action="/admin/proses_surat/<?= $d['id']; ?>" method="POST">
                 <fieldset disabled>
                    <input type="hidden" name="id" id="id" value="<?= $d['id']; ?>">
                   <div class="row mb-3">
                        <label for="nik" class="col-sm-4 col-form-label">NIK Yang Mengajukan :</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nik_modal" name="nik_modal" value="<?= $d['nik']; ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="jenis_surat" class="col-sm-4 col-form-label">Jenis Surat :</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="jenis_surat" name="jenis_surat" value="<?= $d['jenis_surat']; ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="tgl_pengajuan" class="col-sm-4 col-form-label">Tanggal Pengajuan :</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="tgl_pengajuan" name="tgl_pengajuan" value="<?= (new DateTime($d['created_at']))->format('d/m/Y'); ?>" >
                        </div>
                    </div> 
                    <div class="row mb-3" id="form_keperluan">
                        <label for="keperluan" class="col-sm-4 col-form-label">Tujuan Pengurusan :</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="keperluan" name="keperluan" value="<?= $d['keperluan']; ?>">
                        </div>
                    </div>
                    <div class="row mb-3" id="form_nama_barang" style="display: none;">
                        <label for="nama_barang" class="col-sm-4 col-form-label">Nama Barang Yang Hilang :</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?= $d['nama_barang']; ?>">
                        </div>
                    </div>
                    <div class="row mb-3" id="form_alamat_pindah" style="display: none;">
                        <label for="alamat_pindah" class="col-sm-4 col-form-label">Alamat Tujuan Pindah :</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="alamat_pindah" name="alamat_pindah" value="<?= $d['alamat_pindah']; ?>">
                        </div>
                    </div>
                    <div class="row mb-3" id="form_alasan_pindah" style="display: none;">
                        <label for="alasan_pindah" class="col-sm-4 col-form-label">Alasan Pindah :</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="alasan_pindah" name="alasan_pindah" value="<?= $d['alasan_pindah']; ?>">
                        </div>
                    </div>
                    <?php if($data_kematian) :?>
                        <div class="row mb-3" id="form_surat_kematian" style="display: none;">
                            <div class="mb-2 border border-danger rounded-1">
                                <h3 class="text-danger border-bottom border-danger">Data Masyarakat Yang Meninggal</h3>
                                <div class="row mb-3 form_nik_meninggal">
                                    <label for="nik_meninggal" class="col-sm-4 col-form-label">NIK :</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="nik_meninggal" name="nik_meninggal" value="<?= $data_kematian['nik']; ?>">
                                    </div>
                                </div>
                                <div class="row mb-3 form_nama_meninggal">
                                    <label for="nama_meninggal" class="col-sm-4 col-form-label">Nama :</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="nama_meninggal" name="nama_meninggal" value="<?= $data_kematian['nama']; ?>">
                                    </div>
                                </div>
                                <div class=" row mb-3 form_jenis_kelamin_meninggal">
                                    <label for="jenis_kelamin" class="col-sm-4 col-form-label">Jenis Kelamin :</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" value="<?= $data_kematian['jenis_kelamin']; ?>">
                                    </div>
                                </div>
                                <div class="row mb-3 form_data_lahir_meninggal">
                                    <label for="data_lahir" class="col-sm-4 col-form-label">Tempat/Tanggal Lahir :</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?= $data_kematian['tempat_lahir']; ?>, <?= $data_kematian['tgl_lahir']; ?>">
                                    </div>
                                </div>
                                <div class="row mb-3 form_kewarganegaraan_meninggal">
                                    <label for="kewarganegaraan" class="col-sm-4 col-form-label">Kewarganegaraan :</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="kewarganegaraan" name="kewarganegaraan" value="<?= $data_kematian['kewarganegaraan']; ?>">
                                    </div>
                                </div>
                                <div class="row mb-3 form_agama_meninggal">
                                    <label for="agama" class="col-sm-4 col-form-label">Agama :</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="agama" name="agama" value="<?= $data_kematian['agama']; ?>">
                                    </div>
                                </div>
                                <div class="row mb-3 form_pekerjaan_meninggal">
                                    <label for="pekerjaan" class="col-sm-4 col-form-label">Pekerjaan :</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="<?= $data_kematian['jenis_pekerjaan']; ?>">
                                    </div>
                                </div>
                                <div class="row mb-3 form_status_perkawinan_meninggal">
                                    <label for="status_perkawinan" class="col-sm-4 col-form-label">Status Pernikahan :</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="status_perkawinan" name="status_perkawinan" value="<?= $data_kematian['status_perkawinan']; ?>">
                                    </div>
                                </div>
                                <div class="row mb-3 form_alamat">
                                    <label for="desa" class="col-sm-4 col-form-label">Alamat :</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="desa" name="desa" value="Desa <?= $data_kematian['desa']; ?>, Kecamatan <?= $data_kematian['kecamatan']; ?>, Kabupaten <?= $data_kematian['kabupaten']; ?>">
                                    </div>
                                </div>
                                <div class="row mb-3 form_tgl_meninggal">
                                    <label for="tgl_meninggal" class="col-sm-4 col-form-label">Tanggal Meninggal :</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="tgl_meninggal" name="tgl_meninggal" value=" <?= $d['tgl_meninggal']; ?>">
                                    </div>
                                </div>
                                <div class="row mb-3 form_jam_meninggal">
                                    <label for="jam_meninggal" class="col-sm-4 col-form-label">Jam Meninggal :</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="jam_meninggal" name="jam_meninggal" value=" <?= $d['jam_meninggal']; ?>">
                                    </div>
                                </div>
                                <div class="row mb-3 form_tempat_meninggal">
                                    <label for="tempat_meninggal" class="col-sm-4 col-form-label">Tempat Meninggal :</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="tempat_meninggal" name="tempat_meninggal" value=" <?= $d['tempat_meninggal']; ?>">
                                    </div>
                                </div>
                                <div class="row mb-3 form_sebab_meninggal">
                                    <label for="sebab_meninggal" class="col-sm-4 col-form-label">Sebab Meninggal :</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="sebab_meninggal" name="sebab_meninggal" value=" <?= $d['sebab_meninggal']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="border border-danger rounded-1">
                                <h3 class="text-danger border-bottom border-danger">Data Tenaga Kesehatan</h3>
                                <div class="row mb-3 form_nama_nakes">
                                    <label for="nama_nakes" class="col-sm-4 col-form-label">Nama Tenaga Kesehatan :</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="nama_nakes" name="nama_nakes" value=" <?= $d['nama_nakes']; ?>">
                                    </div>
                                </div>
                                <div class="row mb-3 form_nik_nakes">
                                    <label for="nik_nakes" class="col-sm-4 col-form-label">NIK Tenaga Kesehatan :</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="nik_nakes" name="nik_nakes" value=" <?= $d['nik_nakes']; ?>">
                                    </div>
                                </div>
                                <div class="row mb-3 form_data_lahir_nakes">
                                    <label for="data_lahir_nakes" class="col-sm-4 col-form-label">Tempat/Tanggal Lahir Tenaga Kesehatan :</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="data_lahir_nakes" name="data_lahir_nakes" value=" <?= $d['data_lahir_nakes']; ?>">
                                    </div>
                                </div>
                                <div class="row mb-3 form_pekerjaan_nakes">
                                    <label for="pekerjaan_nakes" class="col-sm-4 col-form-label">Pekerjaan Tenaga Kesehatan :</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="pekerjaan_nakes" name="pekerjaan_nakes" value=" <?= $d['pekerjaan_nakes']; ?>">
                                    </div>
                                </div>
                                <div class="row mb-3 form_alamat_nakes">
                                    <label for="alamat_nakes" class="col-sm-4 col-form-label">Alamat Tenaga Kesehatan :</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="alamat_nakes" name="alamat_nakes" value=" <?= $d['alamat_nakes']; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="row mb-3 border border-danger rounded-1">
                        <h3 class="text-danger border-bottom border-danger">Dokumen Persyaratan</h3>                    
                        <div id="dokumen_ktp" style="display: none;">
                            <div class="row mb-3">
                                <label for="dokumen_ktp" class="col-sm-4 col-form-label">Foto KTP</label>
                                <div class="col-sm-8">
                                    <img src="/img/dokumen/<?= $d['dokumen_ktp']; ?>" class="img-thumbnail" name="dokumen_ktp" id="dokumen_ktp" style="width:300px ;">
                                </div>
                            </div>
                        </div>
                        <div id="dokumen_kk" style="display: none;">
                            <div class="row mb-3">
                                <label for="dokumen_kk" class="col-sm-4 col-form-label">Foto Kartu Keluarga</label>
                                    <div class="col-sm-8">
                                        <img src="/img/dokumen/<?= $d['dokumen_kk']; ?>" class="img-thumbnail" name="dokumen_kk" id="dokumen_kk" style="width:300px ;">
                                    </div>
                            </div>
                        </div>
                        <div id="dokumen_surat_rt" style="display: none;">
                            <div class="row mb-3">
                                <label for="form_dokumen_surat_rt" class="col-sm-4 col-form-label">Foto Surat Keterangan RT/RW</label>
                                <div class="col-sm-8">
                                    <img src="/img/dokumen/<?= $d['dokumen_surat_rt']; ?>" class="img-thumbnail" name="form_dokumen_surat_rt" id="form_dokumen_surat_rt" style="width:300px ;">
                                                    
                                </div>
                            </div>
                        </div>
                        <div id="dokumen_surat_keterangan_dokter" style="display: none;">
                            <div class="row mb-3">
                                <label for="form_dokumen_surat_keterangan_dokter" class="col-sm-4 col-form-label">Foto Surat Keterangan Dokter</label>
                                <div class="col-sm-8">
                                    <img src="/img/dokumen/<?= $d['dokumen_surat_keterangan_dokter']; ?>" class="img-thumbnail" name="form_dokumen_surat_keterangan_dokter" id="form_dokumen_surat_keterangan_dokter" style="width:300px ;">
                                                                    
                                </div>
                            </div>
                        </div>
                        <div id="dokumen_ktp_yang_meninggal" style="display: none;">
                            <div class="row mb-3">
                                <label for="form_dokumen_ktp_yang_meninggal" class="col-sm-4 col-form-label">Foto KTP Yang Meninggal</label>
                                <div class="col-sm-8">
                                    <img src="/img/dokumen/<?= $d['dokumen_ktp_yang_meninggal']; ?>" class="img-thumbnail" name="form_dokumen_ktp_yang_meninggal" id="form_dokumen_ktp_yang_meninggal" style="width:300px ;">
                                                                
                                </div>
                            </div>
                        </div>
                        <div id="dokumen_kematian_rs" style="display: none;">
                            <div class="row mb-3">
                                <label for="form_dokumen_kematian_rs" class="col-sm-4 col-form-label">Foto Surat Keterangan Kematian Dari Rumah Sakit</label>
                                <div class="col-sm-8">
                                    <img src="/img/dokumen/<?= $d['dokumen_kematian_rs']; ?>" class="img-thumbnail" name="form_dokumen_kematian_rs" id="form_dokumen_kematian_rs" style="width:300px ;">
                                </div>
                            </div>
                        </div>
                        <div id="dokumen_ktp_pasangan" style="display: none;">
                            <div class="row mb-3">
                                <label for="form_dokumen_ktp_pasangan" class="col-sm-4 col-form-label">Foto KTP Pasangan (Suami/Istri)</label>
                                <div class="col-sm-8">
                                    <img src="/img/dokumen/<?= $d['dokumen_ktp_pasangan']; ?>" class="img-thumbnail" name="form_dokumen_ktp_pasangan" id="form_dokumen_ktp_pasangan" style="width:300px ;">
                                </div>
                            </div>
                        </div>
                        <div id="dokumen_akta_kelahiran" style="display: none;">
                            <div class="row mb-3">
                                <label for="form_dokumen_akta_kelahiran" class="col-sm-4 col-form-label">Foto Akta Kelahiran</label>
                                <div class="col-sm-8">
                                    <img src="/img/dokumen/<?= $d['dokumen_akta_kelahiran']; ?>" class="img-thumbnail" name="form_dokumen_akta_kelahiran" id="form_dokumen_akta_kelahiran" style="width:300px ;">
                                </div>
                            </div>
                        </div>
                        <div id="dokumen_akta_nikah" style="display: none;">
                            <div class="row mb-3">
                                <label for="dokumen_akta_nikah" class="col-sm-4 col-form-label">Foto Akta Nikah</label>
                                <div class="col-sm-8">
                                    <img src="/img/dokumen/<?= $d['dokumen_akta_nikah']; ?>" class="img-thumbnail" name="dokumen_akta_nikah" id="dokumen_akta_nikah" style="width:300px ;">         
                                </div>
                            </div>
                        </div>
                        <div id="dokumen_foto_barang_hilang" style="display: none;">
                            <div class="row mb-3">
                                <label for="form_dokumen_foto_barang_hilang" class="col-sm-4 col-form-label">Foto Barang Yang Hilang</label>
                                <div class="col-sm-8">
                                    <img src="/img/dokumen/<?= $d['dokumen_foto_barang_hilang']; ?>" class="img-thumbnail" name="dokumen_foto_barang_hilang" id="dokumen_foto_barang_hilang" style="width:300px ;">       
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3 border border-danger rounded-1" id="data_kelahiran" style="display: none;">
                        <h3 class="text-danger border-bottom border-danger">Data Ayah</h3>
                            <div class="row mb-3">
                                <label for="nik_ayah" class="col-sm-4 col-form-label">NIK Ayah</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="nik_ayah" name="nik_ayah" value="<?= $d['nik_ayah']; ?>">                                            
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="nama_ayah" class="col-sm-4 col-form-label">Nama Ayah</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" value="<?= $d['nama_ayah']; ?>" >                        
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="tempat_lahir_ayah" class="col-sm-4 col-form-label">Tempat Lahir Ayah</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="tempat_lahir_ayah" name="tempat_lahir_ayah" value="<?= $d['tempat_lahir_ayah']; ?>">    
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="tgl_lahir_ayah" class="col-sm-4 col-form-label">Tanggal Lahir Ayah</label>
                                <div class="col-sm-8">
                                    <input type="date" class="form-control" id="tgl_lahir_ayah" name="tgl_lahir_ayah" value="<?= $d['tgl_lahir_ayah']; ?>" >    
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="alamat_ayah" class="col-sm-4 col-form-label">Alamat Ayah</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="alamat_ayah" name="alamat_ayah" value="<?= $d['alamat_ayah']; ?>" >
                                </div>
                            </div>
                            <h3 class="text-danger border-bottom border-danger">Data Ibu</h3>
                            <div class="row mb-3">
                                <label for="nik_ibu" class="col-sm-4 col-form-label">NIK Ibu</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="nik_ibu" name="nik_ibu" value="<?= $d['nik_ibu']; ?>" >
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="nama_ibu" class="col-sm-4 col-form-label">Nama Ibu</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" value="<?= $d['nama_ibu']; ?>" >
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="tempat_lahir_ibu" class="col-sm-4 col-form-label">Tempat Lahir Ibu</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="tempat_lahir_ibu" name="tempat_lahir_ibu" value="<?= $d['tempat_lahir_ibu']; ?>" >   
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="tgl_lahir_ibu" class="col-sm-4 col-form-label">Tanggal Lahir Ibu</label>
                                <div class="col-sm-8">
                                    <input type="date" class="form-control" id="tgl_lahir_ibu" name="tgl_lahir_ibu" value="<?= $d['tgl_lahir_ibu']; ?>" >   
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="alamat_ibu" class="col-sm-4 col-form-label">Alamat Ibu</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="alamat_ibu" name="alamat_ibu" value="<?= $d['alamat_ibu']; ?>" > 
                                </div>
                            </div>
                            <h3 class="text-danger border-bottom border-danger">Data Anak</h3>
                            <div class="row mb-3">
                                <label for="nama_anak" class="col-sm-4 col-form-label">Nama Anak</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="nama_anak" name="nama_anak" value="<?= $d['nama_anak']; ?>" >                        
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="tempat_lahir_anak" class="col-sm-4 col-form-label">Tempat Lahir Anak</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="tempat_lahir_anak" name="tempat_lahir_anak" value="<?= $d['tempat_lahir_anak']; ?>" >   
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="tgl_lahir_anak" class="col-sm-4 col-form-label">Tanggal Lahir Anak</label>
                                <div class="col-sm-8">
                                    <input type="date" class="form-control" id="tgl_lahir_anak" name="tgl_lahir_anak" value="<?= $d['tgl_lahir_anak']; ?>" >  
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="lokasi_lahir" class="col-sm-4 col-form-label">Lahir Di</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="lokasi_lahir" name="lokasi_lahir" value="<?= $d['lokasi_lahir']; ?>" >
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="alamat_anak" class="col-sm-4 col-form-label">Alamat Anak</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="alamat_anak" name="alamat_anak" value="<?= $d['alamat_anak']; ?>" >   
                                </div>
                            </div>
                        </div>    
                    <?php if(!empty($data_pindah)) : ?>
                        <div id="turut_pindah" class="row mb-3" style="display: none;">
                            <label class="col-sm-4 col-form-label" >Pengikut / Keluarga ikut pindah </label>
                            <div class="col-sm-8">
                                <table class="table table-secondary table-bordered">
                                    <?php $no = "1"; ?>
                                    <tr>
                                        <th class="col-1">No</th>
                                        <th>NIK</th>
                                        <th>Nama</th>
                                    </tr>
                                    <?php foreach ($data_pindah as $p ) : ?>
                                    <tr>
                                        <td class="col-1"><?= $no++; ?></td>
                                        <td><?= $p['nik']; ?></td>
                                        <td><?= $p['nama']; ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="row mb-3">
                        <label for="status" class="col-sm-4 col-form-label">Status</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="status" name="status" value="<?= $d['status']; ?>">
                        </div>
                    </div>
                </fieldset>
                <button type="submit" class="btn btn-primary" name="aksi" >Proses</button>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#tolakmodal<?= $d['id'];?>">Tolak</button>
            </form>
            <?php endforeach; ?>
            <!-- Modal Tolak-->
            <div class="modal fade" id="tolakmodal<?= $d['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Rincian Pengurusan Surat</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="reload()"></button>
                                </div>
                                <div class="modal-body">

                                    <form action="" id="formtolak" novalidate>
                                        <?= csrf_field() ?>
                                        <input type="hidden" name="id" id="inputid" value="<?= $d['id']; ?>">
                                        <div class="row mb-3">
                                            <label for="alasan" class="col-sm-3 col-form-label">Alasan Penolakan</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="alasan" name="alasan" placeholder="Masukan Alasan Ditolak">
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="submit" class="btn btn-danger" id="btn-tolak">Tolak</button>
                                </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
        </div>
    </main>
</div>

<script>
    $(document).ready(function() {
        var jenis = $("#jenis_surat").val();
        var dokumen = $("#dokumen_ktp").val();
        console.log(dokumen);
        if (jenis == "Surat Keterangan Usaha") {
            $('#dokumen_ktp').show();
        };
        if (jenis == 'Surat Keterangan Tidak Mampu') {
            $('#dokumen_ktp').show();
            $('#dokumen_kk').show();
            $('#dokumen_surat_rt').show();
        }; 
        if (jenis == 'Surat Kelahiran') {
            $('#dokumen_ktp').show();
            $('#dokumen_surat_rt').show();
            $('#dokumen_surat_keterangan_dokter').show();
        };
        if (jenis == 'Surat Pengantar Pembuatan KTP') {
            $('#dokumen_kk').show();
            $('#dokumen_akta_kelahiran').show();
            $('#dokumen_surat_rt').show();
            $('#tgl_lahir').show();
        }
        if (jenis == 'Surat Pengantar Pembuatan KK') {
                $('#dokumen_ktp').show();
                $('#dokumen_ktp_pasangan').show();
                $('#dokumen_akta_nikah').show();
                $('#dokumen_surat_rt').show();
        }
        if (jenis == 'Surat Pengantar SKCK') {
            $('#dokumen_ktp').show();
            $('#dokumen_kk').show();
            $('#dokumen_akta_kelahiran').show();
        }
        if (jenis == 'Surat Kehilangan') {
            $('#dokumen_kk').show();
            $('#dokumen_surat_rt').show();
            $('#dokumen_foto_barang_hilang').show();
            $('#form_nama_barang').show();
        }
        if (jenis == 'Surat Keterangan Pindah Tempat') {
            $('#dokumen_ktp').show();
            $('#dokumen_kk').show();
            $('#dokumen_surat_rt').show();
            $('#form_alamat_pindah').show();
            $('#form_alasan_pindah').show();
            $('#turut_pindah').show();
            $('#form_keperluan').hide();
        };
        if (jenis == 'Surat Kematian') {
            $('#dokumen_ktp_yang_meninggal').show();
            $('#dokumen_kk').show();
            $('#dokumen_surat_rt').show();
            $('#dokumen_ktp').show();
            $('#dokumen_kematian_rs').show();
            $('#form_surat_kematian').show();
        }
        if (jenis == 'Surat Kelahiran') {
            $('#dokumen_surat_keterangan_dokter').show();
            $('#dokumen_surat_rt').show();
            $('#dokumen_ktp').show();
            $('#data_kelahiran').show();
        }
        
    })

    $("#formtolak").submit(function(e) {
        e.preventDefault();
        // const formData = new FormData(this);
        if (!this.checkValidity()) {
            e.preventDefault();
            $(this).addClass('was-validated');
            console.log(response.message);
        } else {
            var $id = $('#inputid').val();
            var $alasan = $('#alasan').val();
            $.ajax({
                url: '<?= site_url('admin/menolak') ?>',
                type: 'post',
                data: {
                    id: $id,
                    alasan: $alasan
                },
                dataType: 'json',
                success: function(response) {
                    if (response.error) {
                        $("#alasan").addClass('is-invalid');
                        $("#alasan").next().text(response.message.alasan);

                    } else {
                        $("#tolakmodal").modal('hide');
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: response.message,
                            showConfirmButton: false,
                            timer: 1500
                        });
                        location.href = "<?= site_url('admin/administrasi/DITOLAK') ?>";
                    }
                }
            })
        }
    })
        
</script>

<?= $this->endSection(); ?>