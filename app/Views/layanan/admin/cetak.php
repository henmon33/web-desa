<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />


    <!-- Set page size here: A5, A4 or A3 -->
    <!-- Set also "landscape" if you need -->
    <style>
        .center {
            text-align: center;

        }

        .justify {
            text-align: justify;
        }

        .left {
            text-align: left;
        }

        .right {
            text-align: right;
        }

        table {
            width: 950px;
        }

        table .judul {
            width: 130px;
        }

        table .tanda {
            width: 10px;
        }

        table td {
            text-transform: capitalize;
        }

        .tabel_ttd table {
            width: 560px;
        }
        .tabel_pindah {
            width: 800px;
        }

        .tabel_pindah th, .tabel_pindah td {
            border: 1px solid black; /* membuat border dengan 1px tebal dan warna hitam */
        }
    </style>
</head>


<body>

    <hr>
    <p class="center"> <u><?= $data_surat['jenis_surat']; ?></u> <br> Nomor : . . . / . . . / . . . / . . . / . . .</p>
    <div class="inti_surat">
        <?php if ($data_surat['jenis_surat'] == "Surat Keterangan Usaha") : ?>

            <p class="justify">Yang bertanda tangan dibawah ini Kepala Desa Kembuan Kecamatan Tondano Utara Kabupaten Minahasa menerangkan bahwa :
            </p>

            <table class="left">
                <tr>
                    <td class="judul">
                        Nama
                    </td>
                    <td class="tanda">:</td>
                    <td><?= $data_surat['nama']; ?>
                    </td>
                </tr>
                <tr>
                    <td class="judul">
                        Tempat/Tanggal Lahir
                    </td>
                    <td class="tanda">:</td>
                    <td><?= $data_surat['tempat_lahir']; ?>, <?= date('d-m-Y', strtotime($data_surat['tgl_lahir'])); ?>
                    </td>
                </tr>
                <tr>
                    <td class="judul">
                        Jenis Kelamin
                    </td>
                    <td class="tanda">:</td>
                    <td><?= $data_surat['jenis_kelamin']; ?>
                    </td>
                </tr>
                <tr>
                    <td class="judul">
                        Agama
                    </td>
                    <td class="tanda">:</td>
                    <td><?= $data_surat['agama']; ?>
                    </td>
                </tr>
                <tr>
                    <td class="judul">
                        Pekerjaan
                    </td>
                    <td class="tanda">:</td>
                    <td><?= $data_surat['jenis_pekerjaan']; ?>
                    </td>
                </tr>
                <tr>
                    <td class="judul">
                        Status Perkawinan
                    </td>
                    <td class="tanda">:</td>
                    <td><?= $data_surat['status_perkawinan']; ?>
                    </td>
                </tr>
                <tr>
                    <td class="judul">
                        Alamat
                    </td>
                    <td class="tanda">:</td>
                    <td>Desa <?= $data_surat['desa']; ?>, Kecamatan <?= $data_surat['kecamatan']; ?>, Kabupaten <?= $data_surat['kabupaten']; ?>
                    </td>
                </tr>
            </table>
            <p class="justify">Adalah benar yang namanya tersebut diatas memiliki usaha <?= $jenis['jenis_usaha']; ?> yang beralamat di Desa <?= $data_surat['desa']; ?> Kecamatan <?= $data_surat['kecamatan']; ?> Kabupaten Minahasa.
            </p>

            <p class="justify">Demikian surat keterangan ini kami perbuat dengan sebenarnya agar dapat dipergunakan sebagai salah satu syarat <?= $data_surat['keperluan']; ?>.
            </p>
        <?php endif; ?>

        <?php if ($data_surat['jenis_surat'] == "Surat Pengantar Pembuatan KTP") : ?>


            <p class="justify">Yang bertanda tangan dibawah ini Kepala Desa Kembuan Kecamatan Tondano Utara Kabupaten Minahasa menerangkan bahwa :
            </p>
            <table class="left">
                <tr>
                    <td class="judul">
                        Nama
                    </td>
                    <td class="tanda">:</td>
                    <td><?= $data_surat['nama']; ?>
                    </td>
                </tr>
                <tr>
                    <td class="judul">
                        NIK
                    </td>
                    <td class="tanda">:</td>
                    <td><?= $data_surat['nik']; ?>
                    </td>
                </tr>
                <tr>
                    <td class="judul">
                        Tempat/Tanggal Lahir
                    </td>
                    <td class="tanda">:</td>
                    <td><?= $data_surat['tempat_lahir']; ?>, <?= date('d-m-Y', strtotime($data_surat['tgl_lahir'])); ?>
                    </td>
                </tr>
                <tr>
                    <td class="judul">
                        Jenis Kelamin
                    </td>
                    <td class="tanda">:</td>
                    <td><?= $data_surat['jenis_kelamin']; ?>
                    </td>
                </tr>
                <tr>
                    <td class="judul">
                        Agama
                    </td>
                    <td class="tanda">:</td>
                    <td><?= $data_surat['agama']; ?>
                    </td>
                </tr>
                <tr>
                    <td class="judul">
                        Alamat
                    </td>
                    <td class="tanda">:</td>
                    <td>Desa <?= $data_surat['desa']; ?>, Kecamatan <?= $data_surat['kecamatan']; ?>, Kabupaten <?= $data_surat['kabupaten']; ?>
                    </td>
                </tr>
            </table>
            <p class="justify">Nama tersebut diatas adalah penduduk Desa Kembuan yang telah memenuhi syarat dan ketentuan untuk melakukan perekaman E-KTP.
            </p>
            <p class="justify">Demikian surat pengantar ini kami perbuat dengan sebenarnya agar dapat dipergunakan sebagaimana mestinya. Atas kerjasamanya diucapkan terima kasih
            </p>


        <?php endif; ?>

        <?php if ($data_surat['jenis_surat'] == "Surat Keterangan Tidak Mampu") : ?>

            <div class="text-start">
                <p class=" pt-5">
                    Yang bertanda tangan dibawah ini Kepala Desa Kembuan Kecamatan Tondano Utara Kabupaten Minahasa menerangkan bahwa :
                </p>
                <table class="left">
                    <tr>
                        <td class="judul">
                            Nama
                        </td>
                        <td class="tanda">:</td>
                        <td><?= $data_surat['nama']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="judul">
                            Tempat/Tanggal Lahir
                        </td>
                        <td class="tanda">:</td>
                        <td><?= $data_surat['tempat_lahir']; ?>, <?= date('d-m-Y', strtotime($data_surat['tgl_lahir'])); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="judul">
                            Jenis Kelamin
                        </td>
                        <td class="tanda">:</td>
                        <td><?= $data_surat['jenis_kelamin']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="judul">
                            Agama
                        </td>
                        <td class="tanda">:</td>
                        <td><?= $data_surat['agama']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="judul">
                            Pekerjaan
                        </td>
                        <td class="tanda">:</td>
                        <td><?= $data_surat['jenis_pekerjaan']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="judul">
                            Status Perkawinan
                        </td>
                        <td class="tanda">:</td>
                        <td><?= $data_surat['status_perkawinan']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="judul">
                            Alamat
                        </td>
                        <td class="tanda">:</td>
                        <td>Desa <?= $data_surat['desa']; ?>, Kecamatan <?= $data_surat['kecamatan']; ?>, Kabupaten <?= $data_surat['kabupaten']; ?>
                        </td>
                    </tr>
                </table>
            </div>
            <p>
                Nama tersebut diatas adalah penduduk Desa Kembuan, Kecamatan Tondano Utara, Kabupaten Minahasa. Berdasarkan keterangan yang ada pada kami benar kahwa yang bersangkutan tergolong keluarga yang kurang mampu
            </p>
            <p>
                Demikian surat pengantar ini kami perbuat dengan sebenarnya agar dapat dipergunakan sebagaimana mestinya. Atas perhatian dan kerjasamanya diucapkan terima kasih
            </p>

        <?php endif; ?>

        <?php if ($data_surat['jenis_surat'] == "Surat Kelahiran") : ?>

                <p class="left">Yang bertanda tangan dibawah ini Kepala Desa Kembuan Kecamatan Tondano Utara Kabupaten Minahasa menerangkan bahwa :</p>
                <table class="left">
                    <tr>
                        <td class="judul">
                            Nama Lengkap Anak
                        </td>
                        <td class="tanda">:</td>
                        <td>
                            <?= $data_surat['nama_anak']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="judul">
                            Jenis Kelamin Anak
                        </td>
                        <td class="tanda">:</td>
                        <td>
                            <?= $data_surat['jenis_kelamin_anak']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="judul">
                            Tempat/Tanggal Lahir Anak
                        </td>
                        <td class="tanda">:</td>
                        <td>
                            <?= $data_surat['tempat_lahir_anak']; ?>, <?= date('d-m-Y', strtotime($data_surat['tgl_lahir_anak'])); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="judul">
                            Alamat Anak
                        </td>
                        <td class="tanda">:</td>
                        <td>
                            <?= $data_surat['alamat_anak']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="judul">
                            Tenaga Kesahatan Yang Membantu
                        </td>
                        <td class="tanda">:</td>
                        <td>
                            <?= $data_surat['tenaga_kesehatan']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="judul">
                            Alamat Kelahiran
                        </td>
                        <td class="tanda">:</td>
                        <td>
                            <?= $data_surat['lokasi_lahir']; ?>
                        </td>
                    </tr>
                </table>
            <p>Adalah  anak kandung dari suami  istri  dibawah ini :</p>
            <table class="left">
                    <tr>
                        <td class="judul">
                            NIK Ayah
                        </td>
                        <td class="tanda">:</td>
                        <td><?= $data_surat['nik_ayah']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="judul">
                            Nama Ayah
                        </td>
                        <td class="tanda">:</td>
                        <td><?= $data_surat['nama_ayah']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="judul">
                            Tempat/Tanggal Lahir Ayah
                        </td>
                        <td class="tanda">:</td>
                        <td><?= $data_surat['tempat_lahir_ayah']; ?>, <?= date('d-m-Y', strtotime($data_surat['tgl_lahir_ayah'])); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="judul">
                            Alamat Ayah
                        </td>
                        <td class="tanda">:</td>
                        <td> <?= $data_surat['alamat_ayah']; ?>
                        </td>
                    </tr>
                    <br>
                    <tr>
                        <td class="judul">
                            NIK Ibu
                        </td>
                        <td class="tanda">:</td>
                        <td><?= $data_surat['nik_ibu']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="judul">
                            Nama Ibu
                        </td>
                        <td class="tanda">:</td>
                        <td><?= $data_surat['nama_ibu']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="judul">
                            Tempat/Tanggal Lahir Ibu
                        </td>
                        <td class="tanda">:</td>
                        <td><?= $data_surat['tempat_lahir_ibu']; ?>, <?= date('d-m-Y', strtotime($data_surat['tgl_lahir_ibu'])); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="judul">
                            Alamat Ibu
                        </td>
                        <td class="tanda">:</td>
                        <td> <?= $data_surat['alamat_ibu']; ?>
                        </td>
                    </tr>
            </table>
            <p class="left">Demikian surat pengantar ini kami perbuat dengan sebenarnya agar dapat dipergunakan sebagaimana mestinya. Atas kerjasamanya diucapkan terima kasih</p>

        <?php endif; ?>

        <?php if ($data_surat['jenis_surat'] == "Surat Pengantar Pembuatan KK") : ?>

            <div class="text-start">
                <p class=" pt-5">
                    Yang bertanda tangan dibawah ini Kepala Desa Kembuan Kecamatan Tondano Utara Kabupaten Minahasa menerangkan bahwa :
                </p>
                <table class="left">
                    <tr>
                        <td class="judul">Nama</td>
                        <td class="tanda">:</td>
                        <td><?= $data_surat['nama']; ?></td>
                    </tr>
                    <tr>
                        <td class="judul">NIK</td>
                        <td class="tanda">:</td>
                        <td><?= $data_surat['nik']; ?></td>
                    </tr>
                    <tr>
                        <td class="judul">Tempat/Tanggal Lahir</td>
                        <td class="tanda">:</td>
                        <td><?= $data_surat['tempat_lahir']; ?>, <?= date('d-m-Y', strtotime($data_surat['tgl_lahir'])); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="judul">Jenis Kelamin</td>
                        <td class="tanda">:</td>
                        <td><?= $data_surat['jenis_kelamin']; ?></td>
                    </tr>
                    <tr>
                        <td class="judul">Agama</td>
                        <td class="tanda">:</td>
                        <td><?= $data_surat['agama']; ?></td>
                    </tr>
                    <tr>
                        <td class="judul">Alamat</td>
                        <td class="tanda">:</td>
                        <td class="justify">Desa <?= $data_surat['desa']; ?>, Kecamatan <?= $data_surat['kecamatan']; ?>, Kabupaten <?= $data_surat['kabupaten']; ?>
                        </td>
                    </tr>
                </table>
            </div>
            <p>Nama tersebut diatas adalah benar penduduk Desa Kembuan Kecamatan Tondano Utara Kabupaten Minahasa. Surat keterangan ini dibuat sebagai kelengkapan pengurusan KK (Kartu Keluarga).
            </p>
            <p>Demikian surat pengantar ini kami perbuat dengan sebenarnya agar dapat dipergunakan sebagaimana mestinya. Atas kerjasamanya diucapkan terima kasih
            </p>

        <?php endif; ?>

        <?php if ($data_surat['jenis_surat'] == "Surat Pengantar SKCK") : ?>

                <p class="justify">Yang bertanda tangan dibawah ini Kepala Desa Kembuan Kecamatan Tondano Utara Kabupaten Minahasa menerangkan bahwa :
                </p>
                <table class="left">
                    <tr>
                        <td class="judul">
                            Nama
                        </td>
                        <td class="tanda">:</td>
                        <td><?= $data_surat['nama']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="judul">
                            NIK
                        </td>
                        <td class="tanda">:</td>
                        <td><?= $data_surat['nik']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="judul">
                            Tempat/Tanggal Lahir
                        </td>
                        <td class="tanda">:</td>
                        <td><?= $data_surat['tempat_lahir']; ?>, <?= date('d-m-Y', strtotime($data_surat['tgl_lahir'])); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="judul">
                            Jenis Kelamin
                        </td>
                        <td class="tanda">:</td>
                        <td><?= $data_surat['jenis_kelamin']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="judul">
                            Status Perkawinan
                        </td>
                        <td class="tanda">:</td>
                        <td><?= $data_surat['status_perkawinan']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="judul">
                            Agama
                        </td>
                        <td class="tanda">:</td>
                        <td><?= $data_surat['agama']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="judul">
                            Alamat
                        </td>
                        <td class="tanda">:</td>
                        <td>Desa <?= $data_surat['desa']; ?>, Kecamatan <?= $data_surat['kecamatan']; ?>, Kabupaten <?= $data_surat['kabupaten']; ?>
                        </td>
                    </tr>
                </table>
            <p class="justify">Benar yang tersebut namanya di atas adalah penduduk Desa Kembuan, Kecamatan Tondano Utara, Kabupaten Minahasa. Berdasarkan catatan yang ada serta sepengetahuan kami dan ianya :
            </p>
            <p class="justify">
                <ol>
                    <li>Berkelakuan Baik, tidak pernah melakukan tindakan/ perbuatan yang menyimpang atau norma sosial yang berlaku.</li>
                    <li>Tidak bersangkut paut Perkara Kriminal.</li>
                    <li>Tidak dalam status tahanan yang berwajib.</li>
                    <li>Tidak terlibat dalam penggunaan Narkoba.</li>
                </ol>
            Surat Keterangan ini diberikan kepada yang bersangkutan untuk Kelengkapan administrasi pengurusan SKCK.
            </p>
            <p class="justify">Demikian surat pengantar ini kami perbuat dengan sebenarnya agar dapat dipergunakan sebagaimana mestinya. Atas kerjasamanya diucapkan terima kasih
            </p>

        <?php endif; ?>

        <?php if ($data_surat['jenis_surat'] == "Surat Kehilangan") : ?>

                <p class="justify">Yang bertanda tangan dibawah ini Kepala Desa Kembuan Kecamatan Tondano Utara Kabupaten Minahasa menerangkan bahwa :
                </p>
                <table class="left">
                    <tr>
                        <td class="judul">
                            Nama
                        </td>
                        <td class="tanda">:</td>
                        <td><?= $data_surat['nama']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="judul">
                            NIK
                        </td>
                        <td class="tanda">:</td>
                        <td><?= $data_surat['nik']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="judul">
                            Tempat/Tanggal Lahir
                        </td>
                        <td class="tanda">:</td>
                        <td><?= $data_surat['tempat_lahir']; ?>, <?= date('d-m-Y', strtotime($data_surat['tgl_lahir'])); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="judul">
                            Jenis Kelamin
                        </td>
                        <td class="tanda">:</td>
                        <td><?= $data_surat['jenis_kelamin']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="judul">
                            Status Perkawinan
                        </td>
                        <td class="tanda">:</td>
                        <td><?= $data_surat['status_perkawinan']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="judul">
                            Agama
                        </td>
                        <td class="tanda">:</td>
                        <td><?= $data_surat['agama']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="judul">
                            Alamat
                        </td>
                        <td class="tanda">:</td>
                        <td>Desa <?= $data_surat['desa']; ?>, Kecamatan <?= $data_surat['kecamatan']; ?>, Kabupaten <?= $data_surat['kabupaten']; ?>
                        </td>
                    </tr>
                </table>
            <p class="justify">Nama tersebut diatas adalah penduduk Desa Kembuan Kecamatan Tondano Utara Kabupaten Minahasa. Dengan ini menerangkan bahwa yang bersangkutan telah kehilangan, berupa :
            </p>
                <ul>
                    <li class="justify" style="text-transform: capitalize">
                    <?= $data_surat['nama_barang']; ?>
                    </li>
                </ul>
            <p class="justify">Demikian surat pengantar ini kami perbuat dengan sebenarnya agar dapat dipergunakan sebagaimana mestinya. Atas kerjasamanya diucapkan terima kasih
            </p>
        <?php endif; ?>

        <?php if ($data_surat['jenis_surat'] == "Surat Keterangan Pindah Tempat") : ?>

            <p class="justify">Yang bertanda tangan dibawah ini Kepala Desa Kembuan Kecamatan Tondano Utara Kabupaten Minahasa menerangkan bahwa :
                </p>
            <table class="left">
                    <tr>
                        <td class="judul">
                            Nama
                        </td>
                        <td class="tanda">:</td>
                        <td><?= $data_surat['nama']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="judul">
                            NIK
                        </td>
                        <td class="tanda">:</td>
                        <td><?= $data_surat['nik']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="judul">
                            Tempat/Tanggal Lahir
                        </td>
                        <td class="tanda">:</td>
                        <td><?= $data_surat['tempat_lahir']; ?>, <?= date('d-m-Y', strtotime($data_surat['tgl_lahir'])); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="judul">
                            Jenis Kelamin
                        </td>
                        <td class="tanda">:</td>
                        <td><?= $data_surat['jenis_kelamin']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="judul">
                            Status Perkawinan
                        </td>
                        <td class="tanda">:</td>
                        <td><?= $data_surat['status_perkawinan']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="judul">
                            Agama
                        </td>
                        <td class="tanda">:</td>
                        <td><?= $data_surat['agama']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="judul">
                            Nomor Kartu Keluarga
                        </td>
                        <td class="tanda">:</td>
                        <td><?= $data_surat['nkk']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="judul">
                            Alamat Asal
                        </td>
                        <td class="tanda">:</td>
                        <td>Desa <?= $data_surat['desa']; ?>, Kecamatan <?= $data_surat['kecamatan']; ?>, Kabupaten <?= $data_surat['kabupaten']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="judul">
                            Alamat Tujuan Pindah
                        </td>
                        <td class="tanda">:</td>
                        <td><?= $data_surat['alamat_pindah']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="judul">
                            Alasan Pindah
                        </td>
                        <td class="tanda">:</td>
                        <td><?= $data_surat['alasan_pindah']; ?>
                        </td>
                    </tr>
                    <?php if(!empty($data_pindah))  : ?>
                        <tr>
                            <td class="judul">
                            Pengikut / Keluarga Yang Pindah
                            </td>
                            <td class="tanda">:</td>
                            <?php $jumlah = count($data_pindah); ?>
                            <td><?= $jumlah; ?> Orang
                            </td>
                        </tr>
                    <?php endif; ?>
            </table>
            
            <?php if(!empty($data_pindah))  : ?>
                <table class="tabel_pindah center" >
                        <thead>
                            <tr>
                                <th style="width: 30px;">No</th>
                                <th>NIK</th>
                                <th>Nama Lengkap</th>
                                <th style="width: 70px;">SHDK</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = "1"; ?>
                            
                            <?php foreach ($data_pindah as $p) : ?>
                            <tr>
                                <td style="width: 30px;"><?= $no++; ?></td>
                                <td><?= $p['nik']; ?></td>
                                <td><?= $p['nama']; ?></td>
                                <td style="width: 70px;"></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                </table>
            <?php endif; ?>
            <p class="justify">Demikian surat pengantar ini kami perbuat dengan sebenarnya agar dapat dipergunakan sebagaimana mestinya. Atas kerjasamanya diucapkan terima kasih
            </p>

        <?php endif; ?>
        
        <?php if ($data_surat['jenis_surat'] == "Surat Kematian") : ?>
                <p class="justify">Yang bertanda tangan dibawah ini Kepala Desa Kembuan Kecamatan Tondano Utara Kabupaten Minahasa menerangkan bahwa :
                </p>
                <table class="left">
                <tr>
                    <td class="judul">
                        Nama
                    </td>
                    <td class="tanda">:</td>
                    <td><?= $data_kematian['nama']; ?>
                    </td>
                </tr>
                <tr>
                    <td class="judul">
                        Tempat/Tanggal Lahir
                    </td>
                    <td class="tanda">:</td>
                    <td><?= $data_kematian['tempat_lahir']; ?>, <?= date('d-m-Y', strtotime($data_kematian['tgl_lahir'])); ?>
                    </td>
                </tr>
                <tr>
                    <td class="judul">
                        Jenis Kelamin
                    </td>
                    <td class="tanda">:</td>
                    <td><?= $data_kematian['jenis_kelamin']; ?>
                    </td>
                </tr>
                <tr>
                    <td class="judul">
                        Agama
                    </td>
                    <td class="tanda">:</td>
                    <td><?= $data_kematian['agama']; ?>
                    </td>
                </tr>
                <tr>
                    <td class="judul">
                        Pekerjaan
                    </td>
                    <td class="tanda">:</td>
                    <td><?= $data_kematian['jenis_pekerjaan']; ?>
                    </td>
                </tr>
                <tr>
                    <td class="judul">
                        Status Perkawinan
                    </td>
                    <td class="tanda">:</td>
                    <td><?= $data_kematian['status_perkawinan']; ?>
                    </td>
                </tr>
                <tr>
                    <td class="judul">
                        Alamat
                    </td>
                    <td class="tanda">:</td>
                    <td>Desa <?= $data_kematian['desa']; ?>, Kecamatan <?= $data_kematian['kecamatan']; ?>, Kabupaten <?= $data_kematian['kabupaten']; ?>
                    </td>
                </tr>
            </table>
            <p class="justify">Telah meninggal dunia pada :</p>
            <table class="left">
                <tr>
                    <td class="judul">
                        Tanggal
                    </td>
                    <td class="tanda">:</td>
                    <td><?= date('d-m-Y', strtotime($data_surat['tgl_meninggal'])); ?>
                    </td>
                </tr>
                <tr>
                    <td class="judul">
                        Jam
                    </td>
                    <td class="tanda">:</td>
                    <td><?= date('H:i', strtotime($data_surat['jam_meninggal'])); ?> WITA
                    </td>
                </tr>
                <tr>
                    <td class="judul">
                        Tempat Meninggal
                    </td>
                    <td class="tanda">:</td>
                    <td><?= $data_surat['tempat_meninggal']; ?>
                    </td>
                </tr>
                <tr>
                    <td class="judul">
                        Sebab Kematian
                    </td>
                    <td class="tanda">:</td>
                    <td><?= $data_surat['sebab_meninggal']; ?>
                    </td>
                </tr>
            </table>
            <p class="justify">Berdasarkan surat pernyataan dari :</p>
            <table class="left">
                <tr>
                    <td class="judul">
                        Nama
                    </td>
                    <td class="tanda">:</td>
                    <td><?= $data_surat['nama_nakes']; ?>
                    </td>
                </tr>
                <tr>
                    <td class="judul">
                        NIK
                    </td>
                    <td class="tanda">:</td>
                    <td><?= $data_surat['nik_nakes']; ?>
                    </td>
                </tr>
                <tr>
                    <td class="judul">
                        Tempat/Tanggal Lahir
                    </td>
                    <td class="tanda">:</td>
                    <td><?= $data_surat['data_lahir_nakes']; ?>
                    </td>
                </tr>
                <tr>
                    <td class="judul">
                        Pekerjaan
                    </td>
                    <td class="tanda">:</td>
                    <td><?= $data_surat['pekerjaan_nakes']; ?>
                    </td>
                </tr>
                <tr>
                    <td class="judul">
                        Alamat
                    </td>
                    <td class="tanda">:</td>
                    <td><?= $data_surat['alamat_nakes']; ?>
                    </td>
                </tr>
            </table>
            <p class="justify">Demikian surat pengantar ini kami perbuat dengan sebenarnya agar dapat dipergunakan sebagaimana mestinya. Atas kerjasamanya diucapkan terima kasih
            </p>
        <?php endif; ?>
    </div>
    <div class="tabel_ttd">
        <table>
            <tr>
                <td></td>
                <td class="center">
                        <p>Desa Kembuan, <?= date("d/m/Y"); ?>
                        </p>
                        <p>Kepala Desa</p>
                    <br>
                    <br>
                    <div>
                        <p><?= $nama['nama']; ?>
                    </div>
                    </p>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>