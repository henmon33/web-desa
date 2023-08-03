<?= $this->extend('layanan/layout/navbar_pegawai'); ?>
<?= $this->section('content'); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="card mb-4 mt-3">
                <div class="card-header">
                   <h4><i class="fas fa-table me-1"></i>Data Seluruh Penduduk</h4> 
                </div>

                <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('pesan'); ?>
                    </div>
                <?php endif; ?>
                <div class="card-body">
                    <a href="/Admin/tambah_data_penduduk">
                        <button type="submit" class="btn btn-primary my-2">
                        <i class="fa-solid fa-plus fa-lg"></i>
                            Tambah Data Penduduk
                        </button>
                    </a>
                    <div class="table-responsive">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>NIK</th>
                                <th>Jenis Kelamin</th>
                                <th>Tanggal Lahir</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($datapenduduk as $d) : ?>
                                <tr>
                                    <td><?= $d['nama']; ?></td>
                                    <td><?= $d['nik']; ?></td>
                                    <td><?= $d['jenis_kelamin']; ?></td>
                                    <td><?= date("d-m-Y", strtotime($d['tgl_lahir'])); ?></td>
                                    <td>
                                        <div class="container text-center">
                                            <div class="row">
                                                <div class="col">
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#rincianmodal<?= $d['nik'] ?>">
                                                        Detail
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="rincianmodal<?= $d['nik'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="staticBackdropLabel">Detail Data Penduduk</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form>
                                                                        <fieldset disabled>
                                                                            <div class="row mb-3">
                                                                                <label for="nik" class="col-sm-3 col-form-label">NIK</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" class="form-control" id="nik" name="nik" placeholder="<?= $d['nik']; ?>">
                                                                                </div>
                                                                            </div>
                                                                            <div class="row mb-3">
                                                                                <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="<?= $d['nama']; ?>">
                                                                                </div>
                                                                            </div>
                                                                            <div class="row mb-3">
                                                                                <label for="jenis_kelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" placeholder="<?= $d['jenis_kelamin']; ?>">
                                                                                </div>
                                                                            </div>

                                                                            <div class="row mb-3">
                                                                                <label for="tempat_lahir" class="col-sm-3 col-form-label">Tempat Lahir</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="<?= $d['tempat_lahir']; ?>">
                                                                                </div>
                                                                            </div>
                                                                            <div class="row mb-3">
                                                                                <label for="tgl_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" class="form-control" id="tgl_lahir" name="tgl_lahir" placeholder="<?= $d['tgl_lahir']; ?>">
                                                                                </div>
                                                                            </div>
                                                                            <div class="row mb-3">
                                                                                <label for="agama" class="col-sm-3 col-form-label">Agama</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" class="form-control" id="agama" name="agama" placeholder="<?= $d['agama']; ?>">
                                                                                </div>
                                                                            </div>

                                                                            <div class="row mb-3">
                                                                                <label for="pendidikan" class="col-sm-3 col-form-label">Pendidikan Terakhir</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" class="form-control" id="pendidikan" name="pendidikan" placeholder="<?= $d['pendidikan']; ?>">
                                                                                </div>
                                                                            </div>
                                                                            <div class="row mb-3">
                                                                                <label for="jenis_pekerjaan" class="col-sm-3 col-form-label">Pekerjaan</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" class="form-control" id="jenis_pekerjaan" name="jenis_pekerjaan" placeholder="<?= $d['jenis_pekerjaan']; ?>">
                                                                                </div>
                                                                            </div>
                                                                            <div class="row mb-3">
                                                                                <label for="status_perkawinan" class="col-sm-3 col-form-label">Status Perkawinan</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" class="form-control" id="status_perkawinan" name="status_perkawinan" placeholder="<?= $d['status_perkawinan']; ?>">
                                                                                </div>
                                                                            </div>
                                                                            <div class="row mb-3">
                                                                                <label for="status_dalam_keluarga" class="col-sm-3 col-form-label">Status Dalam Keluarga</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" class="form-control" id="status_dalam_keluarga" name="status_dalam_keluarga" placeholder="<?= $d['status_dalam_keluarga']; ?>">
                                                                                </div>
                                                                            </div>
                                                                            <div class="row mb-3">
                                                                                <label for="kewarganegaraan" class="col-sm-3 col-form-label">Kewarganegaraan</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" class="form-control" id="kewarganegaraan" name="kewarganegaraan" placeholder="<?= $d['kewarganegaraan']; ?>">
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
                                                                                    <input type="text" class="form-control" id="no_kitas" name="no_kitas" placeholder="<?= $d['no_kitas']; ?>">
                                                                                </div>
                                                                            </div>
                                                                            <div class="row mb-3">
                                                                                <label for="nama_ayah" class="col-sm-3 col-form-label">Nama Ayah</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" placeholder="<?= $d['nama_ayah']; ?>">
                                                                                </div>
                                                                            </div>
                                                                            <div class="row mb-3">
                                                                                <label for="nama_ibu" class="col-sm-3 col-form-label">Nama Ibu</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" placeholder="<?= $d['nama_ibu']; ?>">
                                                                                </div>
                                                                            </div>
                                                                            <div class="row mb-3">
                                                                                <label for="rt" class="col-sm-3 col-form-label">RT</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" class="form-control" id="rt" name="rt" placeholder="<?= $d['rt']; ?>">
                                                                                </div>
                                                                            </div>
                                                                            <div class="row mb-3">
                                                                                <label for="rw" class="col-sm-3 col-form-label">RW</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" class="form-control" id="rw" name="rw" placeholder="<?= $d['rw']; ?>">
                                                                                </div>
                                                                            </div>
                                                                            <div class="row mb-3">
                                                                                <label for="desa" class="col-sm-3 col-form-label">Desa</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" class="form-control" id="desa" name="desa" placeholder="<?= $d['desa']; ?>">
                                                                                </div>
                                                                            </div>
                                                                            <div class="row mb-3">
                                                                                <label for="kecamatan" class="col-sm-3 col-form-label">Kecamatan</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" class="form-control" id="kecamatan" name="kecamatan" placeholder="<?= $d['kecamatan']; ?>">
                                                                                </div>
                                                                            </div>
                                                                            <div class="row mb-3">
                                                                                <label for="kabupaten" class="col-sm-3 col-form-label">Kabupaten</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" class="form-control" id="kabupaten" name="kabupaten" placeholder="<?= $d['kabupaten']; ?>">
                                                                                </div>
                                                                            </div>
                                                                            <div class="row mb-3">
                                                                                <label for="provinsi" class="col-sm-3 col-form-label">Provinsi</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" class="form-control" id="provinsi" name="provinsi" placeholder="<?= $d['provinsi']; ?>">
                                                                                </div>
                                                                            </div>
                                                                            <div class="row mb-3">
                                                                                <label for="kode_pos" class="col-sm-3 col-form-label">Kode POS</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" class="form-control" id="kode_pos" name="kode_pos" placeholder="<?= $d['kode_pos']; ?>">
                                                                                </div>
                                                                            </div>
                                                                        </fieldset>
                                                                    </form>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col">
                                                    <a href="/Admin/ubah_data_penduduk/<?= $d['id']; ?>">
                                                        <button type="button" class="btn btn-success">
                                                            Ubah
                                                        </button>
                                                    </a>

                                                </div>
                                                <div class="col">
                                                    <a href="/Admin/hapus_data_penduduk/<?= $d['id']; ?>">
                                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ?')">Hapus </button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
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