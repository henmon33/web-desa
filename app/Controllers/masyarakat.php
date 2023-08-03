<?php

namespace App\Controllers;


use App\Models\LoginModel;
use App\Models\DataPendudukModel;
use App\Models\UsahaPendudukModel;
use App\Models\PengaduanModel;
use App\Models\TanggapanModel;
use App\Models\AdministrasiModel;
use App\Models\PindahModel;
use App\Models\SaranModel;
use CodeIgniter\HTTP\Message;
use DateTime;

class masyarakat extends BaseController
{
    public function __construct()
    {
        $this->DataUser = new LoginModel();
        $this->DataPendudukModel = new DataPendudukModel();
        $this->UsahaPendudukModel = new UsahaPendudukModel();
        $this->PengaduanModel = new PengaduanModel();
        $this->TanggapanModel = new TanggapanModel();
        $this->AdministrasiModel = new AdministrasiModel();
        $this->PindahModel = new PindahModel();
        $this->SaranModel = new SaranModel();
    }
    public function index()
    {
        $username = session('username');
        $data_diri = $this->DataPendudukModel->profile($username);
        $data = [
            'username' => $data_diri
        ];
        return view('layanan/masyarakat/profil', $data);
    }
    public function pengaduan_saran()
    {
        $username = session('username');
        session();
        $data_diri = $this->DataPendudukModel->profile($username);
        $data_aduan =  $this->PengaduanModel->data_pengaduan_masyarakat($data_diri['nik'])->getResult();
        $saran =  $this->SaranModel->data_saran_masyarakat($data_diri['nik'])->getResult();
        $data = [
            'username' => $data_diri,
            'datadb' => $data_aduan,
            'saran' => $saran,
            'validation' => \config\Services::validation()
        ];
        return view('layanan/masyarakat/pengaduan_saran', $data);
    }
    public function buat_aduan()
    {
        $file = $this->request->getFile('gambar');
        $fileName = $file->getRandomName();

        $data = [
            'nik' => $this->request->getPost('nik'),
            'aduan' => $this->request->getPost('input_aduan'),
            'gambar' => $fileName,
            'role_id' => "1",
            "status" => "DIPROSES"
        ];

        $validation = \config\Services::validation();
        $validation->setRules([
            'input_aduan' => [
                'label'  => 'layanan/masyarakat/pengaduan_saran.input_aduan',
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Aduan Tidak Boleh Kosong',
                ],
            ],
            'gambar' => [
                'label'  => 'layanan/masyarakat/pengaduan_saran.gambar',
                'rules'  => 'uploaded[gambar]',
                'errors' => [
                    'uploaded' => 'Harus Menyertakan Bukti',
                ],
            ]
        ]);
        if (!$validation->withRequest($this->request)->run()) {
            return $this->response->setJSON([
                'error' => true,
                'message' => $validation->getErrors()
            ]);
        } else {

            $file->move('img/aduan', $fileName);
            $this->PengaduanModel->save($data);
            $this->NotifikasiModel->save([
                'tipe' => 'aduan',
            ]);
            return $this->response->setJSON([
                'error' => false,
                'message' => 'Membuat Pengaduan'
            ]);
        }
    }

    public function buat_saran()
    {
        $data = [
            'nik' => $this->request->getPost('nik'),
            'saran' => $this->request->getPost('input_saran'),
        ];

        $validation = \config\Services::validation();
        $validation->setRules([
            'input_saran' => [
                'label'  => 'layanan/masyarakat/pengaduan_saran.iinput_saran',
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Saran Tidak Boleh Kosong',
                ],
            ],
        ]);
        if (!$validation->withRequest($this->request)->run()) {
            return $this->response->setJSON([
                'error' => true,
                'message' => $validation->getErrors()
            ]);
        } else {
            $this->SaranModel->save($data);
            $this->NotifikasiModel->save([
                'tipe' => 'saran',
            ]);
            return $this->response->setJSON([
                'error' => false,
                'message' => 'Membuat Saran'
            ]);
        }
    }

    public function administrasi()
    {
        $username = session('username');
        $data_diri = $this->DataPendudukModel->profile($username);
        $riwayat_surat = $this->AdministrasiModel->data_pengurusan_surat($data_diri['nik']);
        $data = [
            'username' => $data_diri,
            'riwayat' => $riwayat_surat,
            'validation' => \config\Services::validation()
        ];
        return view('/layanan/masyarakat/administrasi', $data);
    }
    public function proses_surat()
    {
        $file_ktp = $this->request->getFile('form_dokumen_ktp');
        $file_kk = $this->request->getFile('form_dokumen_kk');
        $file_surat_rt = $this->request->getFile('form_dokumen_surat_rt');
        $surat_keterangan_dokter = $this->request->getFile('form_dokumen_surat_keterangan_dokter');
        $file_ktp_yang_meninggal = $this->request->getFile('form_dokumen_ktp_yang_meninggal');
        $file_dokumen_kematian_rs = $this->request->getFile('form_dokumen_kematian_rs');
        $file_dokumen_ktp_pasangan = $this->request->getFile('form_dokumen_ktp_pasangan');
        $file_dokumen_foto_barang_hilang = $this->request->getFile('form_dokumen_foto_barang_hilang');
        $file_dokumen_akta_kelahiran = $this->request->getFile('form_dokumen_akta_kelahiran');
        $file_dokumen_akta_nikah = $this->request->getFile('form_dokumen_akta_nikah');

        $file_nama_ktp = $file_ktp->getRandomName();
        $file_nama_ktp_pasangan = $file_dokumen_ktp_pasangan->getRandomName();
        $file_nama_kk = $file_kk->getRandomName();
        $file_nama_surat_rt = $file_surat_rt->getRandomName();
        $file_nama_keterangan_dokter = $surat_keterangan_dokter->getRandomName();
        $file_nama_ktp_meninggal = $file_ktp_yang_meninggal->getRandomName();
        $file_nama_dokumen_kematian_rs = $file_dokumen_kematian_rs->getRandomName();
        $file_nama_dokumen_ktp_pasangan = $file_dokumen_ktp_pasangan->getRandomName();
        $file_nama_foto_barang_hilang = $file_dokumen_foto_barang_hilang->getRandomName();
        $file_nama_akta_kelahiran = $file_dokumen_akta_kelahiran->getRandomName();
        $file_nama_akta_nikah = $file_dokumen_akta_nikah->getRandomName();

        // $data = [
        //     'nik' => $this->request->getPost('nik'),
        //     'jenis_surat' => $this->request->getPost('jenis_surat'),
        //     'keperluan' => $this->request->getPost('keperluan'),
        //     'dokumen_ktp' => $file_nama_ktp,
        //     'dokumen_kk' => $file_nama_kk,
        //     'dokumen_surat_rt' => $file_nama_surat_rt,
        //     'dokumen_surat_keterangan_dokter' => $file_nama_surat_keterangan_dokter,
        //     'dokumen_ktp_yang_meninggal' => $file_ktp_yang_meninggal,
        //     'dokumen_kematian_rs' => $file_dokumen_kematian_rs,
        //     'dokumen_ktp_pasangan' => $file_dokumen_ktp_pasangan,
        //     'dokumen_foto_barang_hilang' => $file_dokumen_foto_barang_hilang,
        //     'dokumen_akta_kelahiran' => $file_nama_akta_kelahiran,
        //     "status" => "DIPROSES"
        // ];
        
        if ($this->request->getVar('jenis_surat') == "Surat Keterangan Usaha") {
            $data = [
                'nik' => $this->request->getPost('nik'),
                'jenis_surat' => $this->request->getPost('jenis_surat'),
                'keperluan' => $this->request->getPost('keperluan'),
                'dokumen_ktp' => $file_nama_ktp,
                "status" => "DIAJUKAN"
            ];
            $validation = \config\Services::validation();
            $validation->setRules([
                'nik' => [
                    'label'  => 'layanan/masyarakat/administrasi.nik',
                    'rules'  => 'is_not_unique[tb_usaha.nik]',
                    'errors' => [
                        'is_not_unique' => 'Usaha Anda Tidak Terdaftar'
                    ]
                ],
                'dokumen_ktp' => [
                    'label'  => 'layanan/masyarakat/administrasi.dokumen_ktp',
                    'rules'  => 'uploaded[form_dokumen_ktp]',
                    'errors' => [
                        'uploaded' => 'Harus Menyertakan Foto KTP'
                    ]
                ],
                
                'keperluan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Harus Menyertakan Tujuan Pembuatan Surat'
                    ]
                ],
            ]);
            if (!$validation->withRequest($this->request)->run()) {
                return $this->response->setJSON([
                    'error' => true,
                    'message' => $validation->getErrors()
                ]);
            } else {
    
                $file_ktp->move('img/dokumen', $file_nama_ktp);
                $this->AdministrasiModel->save($data);
                $this->NotifikasiModel->save([
                    'tipe' => 'surat',
                ]);
                return $this->response->setJSON([
                    'error' => false,
                    'message' => 'Mengajukan Permohonan'
                ]);
            }
            
        }
        if ($this->request->getVar('jenis_surat') == "Surat Keterangan Tidak Mampu") {
            $data = [
                'nik' => $this->request->getPost('nik'),
                'jenis_surat' => $this->request->getPost('jenis_surat'),
                'keperluan' => $this->request->getPost('keperluan'),
                'dokumen_ktp' => $file_nama_ktp,
                'dokumen_kk' => $file_nama_kk,
                'dokumen_surat_rt' => $file_nama_surat_rt,
                "status" => "DIAJUKAN"
            ];
            $validation = \config\Services::validation();
            $validation->setRules([
                'dokumen_ktp' => [
                    'label'  => 'layanan/masyarakat/administrasi.dokumen_ktp',
                    'rules'  => 'uploaded[form_dokumen_ktp]',
                    'errors' => [
                        'uploaded' => 'Harus Menyertakan Foto KTP'
                    ]
                ],
                'dokumen_kk' => [
                    'label'  => 'layanan/masyarakat/administrasi.dokumen_kk',
                    'rules'  => 'uploaded[form_dokumen_kk]',
                    'errors' => [
                        'uploaded' => 'Harus Menyertakan Foto Kartu Keluarga'
                    ]
                ],
                'dokumen_surat_rt' => [
                    'label'  => 'layanan/masyarakat/administrasi.dokumen_surat_rt',
                    'rules'  => 'uploaded[form_dokumen_surat_rt]',
                    'errors' => [
                        'uploaded' => 'Harus Menyertakan Foto Surat Keterangan RT'
                    ]
                ],
                'keperluan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Harus Menyertakan Tujuan Pembuatan Surat'
                    ]
                ],
            ]);
            if (!$validation->withRequest($this->request)->run()) {
                return $this->response->setJSON([
                    'error' => true,
                    'message' => $validation->getErrors()
                ]);
            } else {
    
                $file_ktp->move('img/dokumen', $file_nama_ktp);
                $file_kk->move('img/dokumen', $file_nama_kk);
                $file_surat_rt->move('img/dokumen', $file_nama_surat_rt);
                $this->AdministrasiModel->save($data);
                $this->NotifikasiModel->save([
                    'tipe' => 'surat',
                ]);
                return $this->response->setJSON([
                    'error' => false,
                    'message' => 'Mengajukan Permohonan'
                ]);
            }
            
        }
        if ($this->request->getVar('jenis_surat') == "Surat Pengantar Pembuatan KTP") {
                $data = [
                    'nik' => $this->request->getPost('nik'),
                    'jenis_surat' => $this->request->getPost('jenis_surat'),
                    'keperluan' => $this->request->getPost('keperluan'),
                    'dokumen_kk' => $file_nama_kk,
                    'dokumen_surat_rt' => $file_nama_surat_rt,
                    'dokumen_akta_kelahiran' => $file_nama_akta_kelahiran,
                    "status" => "DIAJUKAN"
                ];
                $validation = \config\Services::validation();
                $validation->setRules([
    
                    'dokumen_kk' => [
                        'label'  => 'layanan/masyarakat/administrasi.dokumen_kk',
                        'rules'  => 'uploaded[form_dokumen_kk]',
                        'errors' => [
                            'uploaded' => 'Harus Menyertakan Foto Kartu Keluarga'
                        ]
                    ],
                    'tgl_lahir' => [
                        'label'  => 'layanan/masyarakat/administrasi.tgl_lahir',
                        'rules'  => 'greater_than_equal_to[17]',
                        'errors' => [
                            'greater_than_equal_to' => 'Umur Anda Belum Cukup'
                        ]
                    ],
                    'dokumen_akta_kelahiran' => [
                        'dokumen_akta_kelahiran'  => 'layanan/masyarakat/administrasi.dokumen_akta_kelahiran',
                        'rules' => 'uploaded[form_dokumen_akta_kelahiran]',
                        'errors' => [
                            'uploaded' => 'Harus Menyertakan Foto Akta Kelahiran'
                        ]
                    ],
                    'dokumen_surat_rt' => [
                        'label'  => 'layanan/masyarakat/administrasi.dokumen_surat_rt',
                        'rules'  => 'uploaded[form_dokumen_surat_rt]',
                        'errors' => [
                            'uploaded' => 'Harus Menyertakan Foto Surat Keterangan RT'
                        ]
                    ],
                    'keperluan' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Harus Menyertakan Tujuan Pembuatan Surat'
                        ]
                    ],
                ]);
                if (!$validation->withRequest($this->request)->run()) {
                    return $this->response->setJSON([
                        'error' => true,
                        'message' => $validation->getErrors()
                    ]);
                } else {
        
                    $file_kk->move('img/dokumen', $file_nama_kk);
                    $file_dokumen_akta_kelahiran->move('img/dokumen', $file_nama_akta_kelahiran);
                    $file_surat_rt->move('img/dokumen', $file_nama_surat_rt);
                    $this->AdministrasiModel->save($data);
                    $this->NotifikasiModel->save([
                        'tipe' => 'surat',
                    ]);
                    return $this->response->setJSON([
                        'error' => false,
                        'message' => 'Mengajukan Permohonan'
                    ]);
                }
            
            
        
        }
        if ($this->request->getVar('jenis_surat') == "Surat Kelahiran") {
            $data = [
                'nik' => $this->request->getPost('nik'),
                'jenis_surat' => $this->request->getPost('jenis_surat'),
                'nik_ayah' => $this->request->getPost('nik_ayah'),
                'nama_ayah' => $this->request->getPost('nama_ayah'),
                'tempat_lahir_ayah' => $this->request->getPost('tempat_lahir_ayah'),
                'tgl_lahir_ayah' => $this->request->getPost('tgl_lahir_ayah'),
                'alamat_ayah' => $this->request->getPost('alamat_ayah'),
                'nik_ibu' => $this->request->getPost('nik_ibu'),
                'nama_ibu' => $this->request->getPost('nama_ibu'),
                'tempat_lahir_ibu' => $this->request->getPost('tempat_lahir_ibu'),
                'tgl_lahir_ibu' => $this->request->getPost('tgl_lahir_ibu'),
                'alamat_ibu' => $this->request->getPost('alamat_ibu'),
                'nama_anak' => $this->request->getPost('nama_anak'),
                'tempat_lahir_anak' => $this->request->getPost('tempat_lahir_anak'),
                'tgl_lahir_anak' => $this->request->getPost('tgl_lahir_anak'),
                'lokasi_lahir' => $this->request->getPost('lokasi_lahir'),
                'alamat_anak' => $this->request->getPost('alamat_anak'),
                'tenaga_kesehatan' => $this->request->getPost('tenaga_kesehatan'),
                'keperluan' => $this->request->getPost('keperluan'),
                'dokumen_ktp' => $file_nama_ktp,
                'dokumen_surat_rt' => $file_nama_surat_rt,
                'dokumen_surat_keterangan_dokter' => $file_nama_keterangan_dokter,
                "status" => "DIAJUKAN"
            ];
            $validation = \config\Services::validation();
            $validation->setRules([

                'dokumen_ktp' => [
                    'label'  => 'layanan/masyarakat/administrasi.dokumen_ktp',
                    'rules'  => 'uploaded[form_dokumen_ktp]',
                    'errors' => [
                        'uploaded' => 'Harus Menyertakan Foto KTP'
                    ]
                ],
                'dokumen_surat_keterangan_dokter' => [
                    'label'  => 'layanan/masyarakat/administrasi.dokumen_surat_keterangan_dokter',
                    'rules' => 'uploaded[form_dokumen_surat_keterangan_dokter]',
                    'errors' => [
                        'uploaded' => 'Harus Menyertakan Foto Surat Keterangan Dokter'
                    ]
                ],
                'dokumen_surat_rt' => [
                    'label'  => 'layanan/masyarakat/administrasi.dokumen_surat_rt',
                    'rules'  => 'uploaded[form_dokumen_surat_rt]',
                    'errors' => [
                        'uploaded' => 'Harus Menyertakan Foto Surat Keterangan RT'
                    ]
                ],
                'nik_ayah' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Harus Menyertakan NIK Ayah'
                    ]
                ],
                'nama_ayah' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Harus Menyertakan Nama Ayah'
                    ]
                ],
                'tempat_lahir_ayah' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Harus Menyertakan Tempat Ayah'
                    ]
                ],
                'tgl_lahir_ayah' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Harus Menyertakan Tanggal Lahir Ayah'
                    ]
                ],
                'alamat_ayah' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Harus Menyertakan Alamat Ayah'
                    ]
                ],
                'nik_ibu' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Harus Menyertakan NIK Ibu'
                    ]
                ],
                'nama_ibu' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Harus Menyertakan Nama Ibu'
                    ]
                ],
                'tempat_lahir_ibu' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Harus Menyertakan Tempat Ibu'
                    ]
                ],
                'tgl_lahir_ibu' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Harus Menyertakan Tanggal Lahir Ibu'
                    ]
                ],
                'alamat_ibu' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Harus Menyertakan Alamat Ibu'
                    ]
                ],
                'nama_anak' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Harus Menyertakan Nama Anak'
                    ]
                ],
                'tempat_lahir_anak' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Harus Menyertakan Tempat Anak'
                    ]
                ],
                'tgl_lahir_anak' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Harus Menyertakan Tanggal Lahir Anak'
                    ]
                ],
                'lokasi_lahir' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Harus Menyertakan Lokasi Kelahiran'
                    ]
                ],
                'alamat_anak' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Harus Menyertakan Alamat Anak'
                    ]
                ],
                'keperluan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Harus Menyertakan Tujuan Pembuatan Surat'
                    ]
                ],
                'tenaga_kesehatan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Harus Menyertakan Nama Tenaga Kesehatan'
                    ]
                ],
            ]);
            if (!$validation->withRequest($this->request)->run()) {
                return $this->response->setJSON([
                    'error' => true,
                    'message' => $validation->getErrors()
                ]);
            } else {
    
                $file_ktp->move('img/dokumen', $file_nama_ktp);
                $surat_keterangan_dokter->move('img/dokumen', $file_nama_keterangan_dokter);
                $file_surat_rt->move('img/dokumen', $file_nama_surat_rt);
                $this->AdministrasiModel->save($data);
                $this->NotifikasiModel->save([
                    'tipe' => 'surat',
                ]);
                return $this->response->setJSON([
                    'error' => false,
                    'message' => 'Mengajukan Permohonan'
                ]);
            }
        
        }
        if ($this->request->getVar('jenis_surat') == "Surat Pengantar Pembuatan KK") {
            $data = [
                'nik' => $this->request->getPost('nik'),
                'jenis_surat' => $this->request->getPost('jenis_surat'),
                'keperluan' => $this->request->getPost('keperluan'),
                'dokumen_ktp' => $file_nama_ktp,
                'dokumen_ktp_pasangan' => $file_nama_ktp_pasangan,
                'dokumen_surat_rt' => $file_nama_surat_rt,
                'dokumen_akta_nikah' => $file_nama_akta_nikah,
                "status" => "DIAJUKAN"
            ];
            $validation = \config\Services::validation();
            $validation->setRules([

                'dokumen_ktp' => [
                    'label'  => 'layanan/masyarakat/administrasi.dokumen_ktp',
                    'rules'  => 'uploaded[form_dokumen_ktp]',
                    'errors' => [
                        'uploaded' => 'Harus Menyertakan Foto KTP'
                    ]
                ],
                'dokumen_ktp_pasangan' => [
                    'label'  => 'layanan/masyarakat/administrasi.dokumen_ktp_pasangan',
                    'rules'  => 'uploaded[form_dokumen_ktp_pasangan]',
                    'errors' => [
                        'uploaded' => 'Harus Menyertakan Foto KTP Pasangan'
                    ]
                ],
                'dokumen_akta_nikah' => [
                    'label'  => 'layanan/masyarakat/administrasi.dokumen_akta_nikah',
                    'rules'  => 'uploaded[form_dokumen_akta_nikah]',
                    'errors' => [
                        'uploaded' => 'Harus Menyertakan Foto Akta Nikah'
                    ]
                ],
                'dokumen_surat_rt' => [
                    'label'  => 'layanan/masyarakat/administrasi.dokumen_surat_rt',
                    'rules'  => 'uploaded[form_dokumen_surat_rt]',
                    'errors' => [
                        'uploaded' => 'Harus Menyertakan Foto Surat Keterangan RT'
                    ]
                ],
                'keperluan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Harus Menyertakan Tujuan Pembuatan Surat'
                    ]
                ],
            ]);
            if (!$validation->withRequest($this->request)->run()) {
                return $this->response->setJSON([
                    'error' => true,
                    'message' => $validation->getErrors()
                ]);
            } else {
    
                $file_ktp->move('img/dokumen', $file_nama_ktp);
                $file_surat_rt->move('img/dokumen', $file_nama_surat_rt);
                $file_dokumen_ktp_pasangan->move('img/dokumen', $file_nama_ktp_pasangan);
                $file_dokumen_akta_nikah->move('img/dokumen', $file_nama_akta_nikah);
                $this->AdministrasiModel->save($data);
                $this->NotifikasiModel->save([
                    'tipe' => 'surat',
                ]);
                return $this->response->setJSON([
                    'error' => false,
                    'message' => 'Mengajukan Permohonan'
                ]);
            }
        
        }
        if ($this->request->getVar('jenis_surat') == "Surat Pengantar SKCK") {
            $data = [
                'nik' => $this->request->getPost('nik'),
                'jenis_surat' => $this->request->getPost('jenis_surat'),
                'keperluan' => $this->request->getPost('keperluan'),
                'dokumen_ktp' => $file_nama_ktp,
                'dokumen_kk' => $file_nama_kk,
                'dokumen_akta_kelahiran' => $file_nama_akta_kelahiran,
                "status" => "DIAJUKAN"
            ];
            $validation = \config\Services::validation();
            $validation->setRules([

                'dokumen_ktp' => [
                    'label'  => 'layanan/masyarakat/administrasi.dokumen_ktp',
                    'rules'  => 'uploaded[form_dokumen_ktp]',
                    'errors' => [
                        'uploaded' => 'Harus Menyertakan Foto KTP'
                    ]
                ],
                'dokumen_kk' => [
                    'label'  => 'layanan/masyarakat/administrasi.dokumen_kk',
                    'rules'  => 'uploaded[form_dokumen_kk]',
                    'errors' => [
                        'uploaded' => 'Harus Menyertakan Foto KTP Pasangan'
                    ]
                ],
                'dokumen_akta_kelahiran' => [
                    'label'  => 'layanan/masyarakat/administrasi.dokumen_akta_kelahiran',
                    'rules'  => 'uploaded[form_dokumen_akta_kelahiran]',
                    'errors' => [
                        'uploaded' => 'Harus Menyertakan Foto Akta Nikah'
                    ]
                ],
                'keperluan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Harus Menyertakan Tujuan Pembuatan Surat'
                    ]
                ],
            ]);
            if (!$validation->withRequest($this->request)->run()) {
                return $this->response->setJSON([
                    'error' => true,
                    'message' => $validation->getErrors()
                ]);
            } else {
    
                $file_ktp->move('img/dokumen', $file_nama_ktp);
                $file_kk->move('img/dokumen', $file_nama_kk);
                $file_dokumen_akta_kelahiran->move('img/dokumen', $file_nama_akta_kelahiran);
                $this->AdministrasiModel->save($data);
                $this->NotifikasiModel->save([
                    'tipe' => 'surat',
                ]);
                return $this->response->setJSON([
                    'error' => false,
                    'message' => 'Mengajukan Permohonan'
                ]);
            }
        
        }
        if ($this->request->getVar('jenis_surat') == "Surat Kehilangan") {
            $data = [
                'nik' => $this->request->getPost('nik'),
                'jenis_surat' => $this->request->getPost('jenis_surat'),
                'keperluan' => $this->request->getPost('keperluan'),
                'nama_barang' => $this->request->getPost('nama_barang'),
                'dokumen_kk' => $file_nama_kk,
                'dokumen_surat_rt' => $file_nama_surat_rt,
                'dokumen_foto_barang_hilang' => $file_nama_foto_barang_hilang,
                "status" => "DIAJUKAN"
            ];
            $validation = \config\Services::validation();
            $validation->setRules([

                'dokumen_foto_barang_hilang' => [
                    'label'  => 'layanan/masyarakat/administrasi.dokumen_foto_barang_hilang',
                    'rules'  => 'uploaded[form_dokumen_foto_barang_hilang]',
                    'errors' => [
                        'uploaded' => 'Harus Menyertakan Foto Barang Yang Hilang'
                    ]
                ],
                'dokumen_kk' => [
                    'label'  => 'layanan/masyarakat/administrasi.dokumen_kk',
                    'rules'  => 'uploaded[form_dokumen_kk]',
                    'errors' => [
                        'uploaded' => 'Harus Menyertakan Foto Kartu Keluarga'
                    ]
                ],
                'dokumen_surat_rt' => [
                    'label'  => 'layanan/masyarakat/administrasi.dokumen_surat_rt',
                    'rules'  => 'uploaded[form_dokumen_surat_rt]',
                    'errors' => [
                        'uploaded' => 'Harus Menyertakan Foto Surat Keterangan RT'
                    ]
                ],
                'keperluan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Harus Menyertakan Tujuan Pembuatan Surat'
                    ]
                ],
                'nama_barang' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Harus Menyertakan Nama Barang Yang Hilang'
                    ]
                ],
            ]);
            if (!$validation->withRequest($this->request)->run()) {
                return $this->response->setJSON([
                    'error' => true,
                    'message' => $validation->getErrors()
                ]);
            } else {
                $file_kk->move('img/dokumen', $file_nama_kk);
                $file_dokumen_foto_barang_hilang->move('img/dokumen', $file_nama_foto_barang_hilang);
                $file_surat_rt->move('img/dokumen', $file_nama_surat_rt);
                $this->AdministrasiModel->save($data);
                $this->NotifikasiModel->save([
                    'tipe' => 'surat',
                ]);
                return $this->response->setJSON([
                    'error' => false,
                    'message' => 'Mengajukan Permohonan'
                ]);
            }
        
        }
        if ($this->request->getVar('jenis_surat') == "Surat Keterangan Pindah Tempat") {
            $data = [
                'nik' => $this->request->getPost('nik'),
                'jenis_surat' => $this->request->getPost('jenis_surat'),
                'alamat_pindah' => $this->request->getPost('alamat_pindah'),
                'alasan_pindah' => $this->request->getPost('alasan_pindah'),
                'dokumen_ktp' => $file_nama_ktp,
                'dokumen_kk' => $file_nama_kk,
                'dokumen_surat_rt' => $file_nama_surat_rt,
                "status" => "DIAJUKAN"
            ];
            $validation = \config\Services::validation();
            $validation->setRules([

                'dokumen_ktp' => [
                    'label'  => 'layanan/masyarakat/administrasi.dokumen_ktp',
                    'rules'  => 'uploaded[form_dokumen_ktp]',
                    'errors' => [
                        'uploaded' => 'Harus Menyertakan Foto KTP'
                    ]
                ],
                'dokumen_kk' => [
                    'label'  => 'layanan/masyarakat/administrasi.dokumen_kk',
                    'rules'  => 'uploaded[form_dokumen_kk]',
                    'errors' => [
                        'uploaded' => 'Harus Menyertakan Foto Kartu Keluarga'
                    ]
                ],
                'dokumen_surat_rt' => [
                    'label'  => 'layanan/masyarakat/administrasi.dokumen_surat_rt',
                    'rules'  => 'uploaded[form_dokumen_surat_rt]',
                    'errors' => [
                        'uploaded' => 'Harus Menyertakan Foto Surat Keterangan RT/RW'
                    ]
                ],
                'alamat_pindah' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Harus Menyertakan Kemana Tujuan Pindah'
                    ]
                ],
                'alasan_pindah' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Harus Menyertakan Alasan Pindah'
                    ]
                ],
            ]);
            if (!$validation->withRequest($this->request)->run()) {
                return $this->response->setJSON([
                    'error' => true,
                    'message' => $validation->getErrors()
                ]);
            } else {
                $file_ktp->move('img/dokumen', $file_nama_ktp);
                $file_kk->move('img/dokumen', $file_nama_kk);
                $file_surat_rt->move('img/dokumen', $file_nama_surat_rt);

                $this->AdministrasiModel->save($data);
                $this->NotifikasiModel->save([
                    'tipe' => 'surat',
                ]);
                $id_surat = $this->AdministrasiModel->insertID();

                 // Simpan data detail orang
                $detail_orang = [];
                $nik_orang = $this->request->getPost('nik_orang');
                $nama_orang = $this->request->getPost('nama_orang');
                if ($nik_orang != '') {
                    
                    for ($i = 0; $i < count($nik_orang); $i++) {
                        $data_detail = [
                            'id_surat' => $id_surat,
                            'nik' => $nik_orang[$i],
                            'nama' => $nama_orang[$i],
                        ];
                        $this->PindahModel->save($data_detail);
                    }
                    return $this->response->setJSON([
                        'error' => false,
                        'message' => 'Mengajukan Permohonan'
                    ]);
                } else {
                    return $this->response->setJSON([
                        'error' => false,
                        'message' => 'Mengajukan Permohonan'
                    ]);

                }
            
            }
        
        }
        if ($this->request->getVar('jenis_surat') == "Surat Kematian") {
            $data = [
                'nik' => $this->request->getPost('nik'),
                'jenis_surat' => $this->request->getPost('jenis_surat'),
                'keperluan' => $this->request->getPost('keperluan'),
                'nik_meninggal' => $this->request->getPost('nik_meninggal'),
                'tgl_meninggal' => $this->request->getPost('tgl_meninggal'),
                'jam_meninggal' => $this->request->getPost('jam_meninggal'),
                'tempat_meninggal' => $this->request->getPost('tempat_meninggal'),
                'sebab_meninggal' => $this->request->getPost('sebab_meninggal'),
                'nama_nakes' => $this->request->getPost('nama_nakes'),
                'nik_nakes' => $this->request->getPost('nik_nakes'),
                'data_lahir_nakes' => $this->request->getPost('data_lahir_nakes'),
                'pekerjaan_nakes' => $this->request->getPost('pekerjaan_nakes'),
                'alamat_nakes' => $this->request->getPost('alamat_nakes'),
                'dokumen_ktp' => $file_nama_ktp,
                'dokumen_kk' => $file_nama_kk,
                'dokumen_surat_rt' => $file_nama_surat_rt,
                'dokumen_ktp_yang_meninggal' => $file_nama_ktp_meninggal,
                'dokumen_kematian_rs' => $file_nama_dokumen_kematian_rs,
                "status" => "DIAJUKAN"
            ];
            $validation = \config\Services::validation();
            $validation->setRules([

                'dokumen_ktp' => [
                    'label'  => 'layanan/masyarakat/administrasi.dokumen_ktp',
                    'rules'  => 'uploaded[form_dokumen_ktp]',
                    'errors' => [
                        'uploaded' => 'Harus Menyertakan Foto KTP'
                    ]
                ],
                'dokumen_kk' => [
                    'label'  => 'layanan/masyarakat/administrasi.dokumen_kk',
                    'rules'  => 'uploaded[form_dokumen_kk]',
                    'errors' => [
                        'uploaded' => 'Harus Menyertakan Foto Kartu Keluarga'
                    ]
                ],
                'dokumen_surat_rt' => [
                    'label'  => 'layanan/masyarakat/administrasi.dokumen_surat_rt',
                    'rules'  => 'uploaded[form_dokumen_surat_rt]',
                    'errors' => [
                        'uploaded' => 'Harus Menyertakan Foto Surat Keterangan RT/RW'
                    ]
                ],
                'dokumen_ktp_yang_meninggal' => [
                    'label'  => 'layanan/masyarakat/administrasi.dokumen_ktp_yang_meninggal',
                    'rules'  => 'uploaded[form_dokumen_ktp_yang_meninggal]',
                    'errors' => [
                        'uploaded' => 'Harus Menyertakan Foto KTP Yang Meninggal'
                    ]
                ],
                'dokumen_kematian_rs' => [
                    'label'  => 'layanan/masyarakat/administrasi.dokumen_kematian_rs',
                    'rules'  => 'uploaded[form_dokumen_kematian_rs]',
                    'errors' => [
                        'uploaded' => 'Harus Menyertakan Foto Surat Keterangan Kematian Dari Rumah Sakit'
                    ]
                ],
                'keperluan' => [
                    'label'  => 'layanan/masyarakat/administrasi.keperluan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Harus Menyertakan Tujuan Pembuatan Surat'
                    ]
                ],
                'nik_meninggal' => [
                    'label'  => 'layanan/masyarakat/administrasi.nik_meninggal',
                    'rules' => 'required|is_not_unique[tb_penduduk.nik]',
                    'errors' => [
                        'required' => 'Harus Menyertakan NIK Dari Yang Meninggal',
                        'is_not_unique' => 'NIK Masyarakat Yang Meninggal Tidak Terdaftar'
                    ]
                ],
                'tgl_meninggal' => [
                    'label'  => 'layanan/masyarakat/administrasi.tgl_meninggal',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Harus Menyertakan Tanggal Kematian',
                    ]
                ],
                'jam_meninggal' => [
                    'label'  => 'layanan/masyarakat/administrasi.jam_meninggal',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Harus Menyertakan Waktu Kematian',
                    ]
                ],
                'tempat_meninggal' => [
                    'label'  => 'layanan/masyarakat/administrasi.tempat_meninggal',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Harus Menyertakan Tempat Kematian',
                    ]
                ],
                'sebab_meninggal' => [
                    'label'  => 'layanan/masyarakat/administrasi.sebab_meninggal',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Harus Menyertakan Penyebab Kematian',
                    ]
                ],
                'nama_nakes' => [
                    'label'  => 'layanan/masyarakat/administrasi.nama_nakes',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Harus Menyertakan Nama Tenaga Kesehatan',
                    ]
                ],
                'nik_nakes' => [
                    'label'  => 'layanan/masyarakat/administrasi.nik_nakes',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Harus Menyertakan NIK Tenaga Kesehatan',
                    ]
                ],
                'data_lahir_nakes' => [
                    'label'  => 'layanan/masyarakat/administrasi.data_lahir_nakes',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Harus Menyertakan Tempat dan Tanggal Lahir Tenaga Kesehatan',
                    ]
                ],
                'pekerjaan_nakes' => [
                    'label'  => 'layanan/masyarakat/administrasi.pekerjaan_nakes',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Harus Menyertakan Jenis Pekerjaan Tenaga Kesehatan',
                    ]
                ],
                'alamat_nakes' => [
                    'label'  => 'layanan/masyarakat/administrasi.alamat_nakes',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Harus Menyertakan Alamat Tenaga Kesehatan',
                    ]
                ],
            ]);
            if (!$validation->withRequest($this->request)->run()) {
                return $this->response->setJSON([
                    'error' => true,
                    'message' => $validation->getErrors()
                ]);
            } else {
                $file_ktp->move('img/dokumen', $file_nama_ktp);
                $file_kk->move('img/dokumen', $file_nama_kk);
                $file_surat_rt->move('img/dokumen', $file_nama_surat_rt);
                $file_ktp_yang_meninggal->move('img/dokumen', $file_nama_ktp_meninggal);
                $file_dokumen_kematian_rs->move('img/dokumen', $file_nama_dokumen_kematian_rs);
                $this->AdministrasiModel->save($data);
                $this->NotifikasiModel->save([
                    'tipe' => 'surat',
                ]);
                return $this->response->setJSON([
                    'error' => false,
                    'message' => 'Mengajukan Permohonan'
                ]);
            }
        
        }
    }
}
