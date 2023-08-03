<?php

namespace App\Controllers;

use App\Models\LoginModel;
use App\Models\DataPendudukModel;
use App\Models\UsahaPendudukModel;
use App\Models\PengaduanModel;
use App\Models\TanggapanModel;
use App\Models\TolakSuratModel;
use App\Models\AdministrasiModel;
use App\Models\StrukturModel;
use App\Models\DataAnakModel;
use App\Models\PindahModel;
use App\Models\ArtikelModel;
use App\Models\SejarahModel;
use App\Models\PotensiModel;
use App\Models\BumdesModel;
use App\Models\PendapatanModel;
use App\Models\DetailPendapatanModel;
use App\Models\BelanjaModel;
use App\Models\UserModel;
use App\Models\SaranModel;
use App\Models\WajibLapor;
use App\Libraries\MY_TCPDF as TCPDF;

class admin extends BaseController
{

    public function __construct()
    {
        $this->DataUser = new LoginModel();
        $this->DataPendudukModel = new DataPendudukModel();
        $this->UsahaPendudukModel = new UsahaPendudukModel();
        $this->PengaduanModel = new PengaduanModel();
        $this->TanggapanModel = new TanggapanModel();
        $this->AdministrasiModel = new AdministrasiModel();
        $this->TolakSuratModel = new TolakSuratModel();
        $this->StrukturModel = new StrukturModel();
        $this->DataAnakModel = new DataAnakModel();
        $this->PindahModel = new PindahModel();
        $this->ArtikelModel = new ArtikelModel();
        $this->SejarahModel = new SejarahModel();
        $this->PotensiModel = new PotensiModel();
        $this->BumdesModel = new BumdesModel();
        $this->PendapatanModel = new PendapatanModel();
        $this->DetailPendapatanModel = new DetailPendapatanModel();
        $this->BelanjaModel = new BelanjaModel();
        $this->UserModel = new UserModel();
        $this->SaranModel = new SaranModel();
        $this->WajibLapor = new WajibLapor();
        $this->input = \Config\Services::request();
    }
    public function updateNotifikasi()
    {
        $jumlah_surat_diajukan = $this->AdministrasiModel->where('status', 'DIAJUKAN')->countAllResults();
        $jumlah_surat_diproses = $this->AdministrasiModel->where('status', 'DIPROSES')->countAllResults();
        $jumlah_surat_dicetak = $this->AdministrasiModel->where('status', 'DICETAK')->countAllResults();
        $jumlah_surat_selesai = $this->AdministrasiModel->where('status', 'SELESAI')->countAllResults();
        $jumlah_aduan = $this->PengaduanModel->where('status', 'DIPROSES')->countAllResults();
        $jumlah_wajib_lapor = $this->WajibLapor->where('status', 'DILAPORKAN')->countAllResults();

        $data = [
            'jumlah_surat_diajukan' => $jumlah_surat_diajukan,
            'jumlah_surat_diproses' => $jumlah_surat_diproses,
            'jumlah_surat_dicetak' => $jumlah_surat_dicetak,
            'jumlah_surat_selesai' => $jumlah_surat_selesai,
            'jumlah_wajib_lapor' => $jumlah_wajib_lapor,
            'jumlah_aduan' => $jumlah_aduan,
        ];
        return $this->response->setJSON($data);
    }
    public function index()
    {

        // $data_penduduk = $this->DataPendudukModel->findAll();
        $username = session('username');
        $data = [
            'username' => $username,
            'datapenduduk' => $this->DataPendudukModel->data_penduduk()
        ];
        return view('layanan/admin/data_seluruh_penduduk', $data);
    }
    public function hapus_data_penduduk($id)
    {
        $this->DataPendudukModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to('/admin');
    }
    public function tambah_data_penduduk()
    {
        $username = session('username');
        session();
        $data = [
            'username' => $username,
            'validation' => \config\Services::validation()
        ];
        return view('layanan/admin/tambah_data_penduduk', $data);
    }
    public function proses_tambah_data_penduduk()
    {
        if (!$this->validate([
            'nik' => [
                'rules' => 'required|is_unique[tb_penduduk.nik]',
                'errors' => [
                    'required' => 'NIK tidak boleh kosong',
                    'is_unique' => 'NIK Sudah Terdaftar'
                ]
            ],
            'nkk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nomor Kartu Keluarga tidak boleh kosong',
                ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama tidak boleh kosong',
                ]
            ],
            'jenis_kelamin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'jenis kelamin tidak boleh kosong',
                ]
            ],
            'tempat_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tempat lahir tidak boleh kosong',
                ]
            ],
            'tgl_lahir' => [
                'rules' => 'required|valid_date',
                'errors' => [
                    'required' => 'Tempat lahir tidak boleh kosong',
                    'valid_date' => 'Tempat lahir tidak boleh kosong',
                ]
            ],
            'agama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Agama tidak boleh kosong',
                ]
            ],
            'status_perkawinan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Status Perkawinan tidak boleh kosong',
                ]
            ],
            'pendidikan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pendidikan terakhir tidak boleh kosong',
                ]
            ],
            'jenis_pekerjaan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pekerjaan tidak boleh kosong',
                ]
            ],
            'status_perkawinan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Status perkawinan tidak boleh kosong',
                ]
            ],
            'kewarganegaraan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kewarganegaraan tidak boleh kosong',
                ]
            ],
            'rt' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'RT tidak boleh kosong',
                ]
            ],
            'rw' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'RW tidak boleh kosong',
                ]
            ],
        ])) {
            
            return redirect()->to('/admin/tambah_data_penduduk')->withInput();
        }
        $this->DataPendudukModel->save([
            'nik' => $this->request->getVar('nik'),
            'nkk' => $this->request->getVar('nkk'),
            'nama' => $this->request->getVar('nama'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'tempat_lahir' => $this->request->getVar('tempat_lahir'),
            'tgl_lahir' => $this->request->getVar('tgl_lahir'),
            'agama' => $this->request->getVar('agama'),
            'pendidikan' => $this->request->getVar('pendidikan'),
            'jenis_pekerjaan' => $this->request->getVar('jenis_pekerjaan'),
            'status_perkawinan' => $this->request->getVar('status_perkawinan'),
            'status_dalam_keluarga' => $this->request->getVar('status_dalam_keluarga'),
            'kewarganegaraan' => $this->request->getVar('kewarganegaraan'),
            'no_paspor' => $this->request->getVar('no_paspor'),
            'no_kitas' => $this->request->getVar('no_kitas'),
            'nama_ayah' => $this->request->getVar('nama_ayah'),
            'nama_ibu' => $this->request->getVar('nama_ibu'),
            'rt' => $this->request->getVar('rt'),
            'rw' => $this->request->getVar('rw'),
            'desa' => 'Desa Kembuan',
            'kecamatan' => 'Tondano Utara',
            'kabupaten' => 'Minahasa',
            'provinsi' => 'Sulawesi Utara',
            'kode_pos' => '95615'
        ]);
        $this->UserModel->save([
            'username' => $this->request->getVar('nik'),
            'password' => password_hash($this->request->getVar('nik'), PASSWORD_BCRYPT),
            'role_id' => '3'
        ]);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        return redirect()->to('/admin/tambah_data_penduduk');
    }
    public function ubah_data_penduduk($id)
    {
        $username = session('username');
        $data = [
            'username' => $username,
            'validation' => \config\Services::validation(),
            'masyarakat' => $this->DataPendudukModel->data_penduduk($id),
        ];
        return view('layanan/admin/ubah_data_penduduk', $data);
    }
    public function proses_ubah_data_penduduk($id)
    {
        if (!$this->validate([
            'nik' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'NIK tidak boleh kosong',
                ]
            ],
            'nkk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nomor Kartu Keluarga tidak boleh kosong',
                ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama tidak boleh kosong',
                ]
            ],
            'jenis_kelamin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'jenis kelamin tidak boleh kosong',
                ]
            ],
            'tempat_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tempat lahir tidak boleh kosong',
                ]
            ],
            'tgl_lahir' => [
                'rules' => 'required|valid_date',
                'errors' => [
                    'required' => 'Tanggal lahir tidak boleh kosong',
                    'valid_date' => 'Tanggal lahir tidak boleh kosong',
                ]
            ],
            'agama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Agama tidak boleh kosong',
                ]
            ],
            'pendidikan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pendidikan terakhir tidak boleh kosong',
                ]
            ],
            'jenis_pekerjaan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pekerjaan tidak boleh kosong',
                ]
            ],
            'status_perkawinan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Status perkawinan tidak boleh kosong',
                ]
            ],
            'rt' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'RT tidak boleh kosong',
                ]
            ],
            'rw' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'RW tidak boleh kosong',
                ]
            ],
        ])) {
            
            return redirect()->to('/admin/ubah_data_penduduk/' . $id)->withInput();
        } else {

        }
        $this->DataPendudukModel->save([
            'id' => $id,
            'nik' => $this->request->getVar('nik'),
            'nkk' => $this->request->getVar('nkk'),
            'nama' => $this->request->getVar('nama'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'tempat_lahir' => $this->request->getVar('tempat_lahir'),
            'tgl_lahir' => $this->request->getVar('tgl_lahir'),
            'agama' => $this->request->getVar('agama'),
            'pendidikan' => $this->request->getVar('pendidikan'),
            'jenis_pekerjaan' => $this->request->getVar('jenis_pekerjaan'),
            'status_perkawinan' => $this->request->getVar('status_perkawinan'),
            'status_dalam_keluarga' => $this->request->getVar('status_dalam_keluarga'),
            'kewarganegaraan' => $this->request->getVar('kewarganegaraan'),
            'no_paspor' => $this->request->getVar('no_paspor'),
            'no_kitas' => $this->request->getVar('no_kitas'),
            'nama_ayah' => $this->request->getVar('nama_ayah'),
            'nama_ibu' => $this->request->getVar('nama_ibu'),
            'rt' => $this->request->getVar('rt'),
            'rw' => $this->request->getVar('rw'),
            'desa' => $this->request->getVar('desa'),
            'kecamatan' => $this->request->getVar('kecamatan'),
            'kabupaten' => $this->request->getVar('kabupaten'),
            'provinsi' => $this->request->getVar('provinsi'),
            'kode_pos' => $this->request->getVar('kode_pos')
        ]);
        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        return redirect()->to('/admin');

    }
    public function data_anak()
    {

        $data_anak = $this->DataAnakModel->data_anak();
        $username = session('username');
        $data = [
            'username' => $username,
            'dataanak' =>$data_anak
        ];
        return view('layanan/admin/data_anak', $data);
    }
    public function hapus_data_anak($id)
    {
        $this->DataAnakModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to('/admin/data_anak');
    }
    public function ubah_data_anak($id)
    {
        $data = [
            'id' => $id,
            'nama' => $this->request->getPost('nama'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'tgl_lahir' => $this->request->getPost('tgl_lahir'),
            'nik_ayah' => $this->request->getPost('nik_ayah'),
            'nik_ibu' => $this->request->getPost('nik_ibu'),
        ];
        $validation = \config\Services::validation();
        $validation->setRules([
            'nama' => [
                'label'  => 'layanan/admin/data_anak.nama',
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Nama Anak Tidak Boleh Kosong'
                ]
            ],
            'jenis_kelamin' => [
                'label'  => 'layanan/admin/data_anak.jenis_kelamin',
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Jenis Kelamin Tidak Boleh Kosong'
                ]
            ],
            'tgl_lahir' => [
                'label'  => 'layanan/admin/data_anak.tgl_lahir',
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Tanggal Lahir Tidak Boleh Kosong'
                ]
            ],
            'nik_ayah' => [
                'label'  => 'layanan/admin/data_anak.nik_ayah',
                'rules'  => 'required|is_not_unique[tb_penduduk.nik]',
                'errors' => [
                    'required' => 'Nik Ayah Tidak Boleh Kosong',
                    'is_not_unique' => 'Nik Ayah Tidak Terdaftar'
                ]
            ],
            'nik_ibu' => [
                'label'  => 'layanan/admin/data_anak.nik_ibu',
                'rules'  => 'required|is_not_unique[tb_penduduk.nik]',
                'errors' => [
                    'required' => 'Nik Ibu Tidak Boleh Kosong',
                    'is_not_unique' => 'Nik Ibu Tidak Terdaftar'
                ]
            ],
        ]);
        if (!$validation->withRequest($this->request)->run()) {
            return $this->response->setJSON([
                'error' => true,
                'message' => $validation->getErrors()
            ]);
        } else {
            $this->DataAnakModel->save($data);
            return $this->response->setJSON([
                'error' => false,
                'message' => 'Data Berhasil Diubah'
            ]);
        }
    }
    public function tambah_data_anak()
    {
        $data = [
            'nama' => $this->request->getPost('nama'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'tgl_lahir' => $this->request->getPost('tgl_lahir'),
            'nik_ayah' => $this->request->getPost('nik_ayah'),
            'nik_ibu' => $this->request->getPost('nik_ibu'),
        ];
        $validation = \config\Services::validation();
        $validation->setRules([
            'nama' => [
                'label'  => 'layanan/admin/data_anak.nama',
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Nama Anak Tidak Boleh Kosong'
                ]
            ],
            'jenis_kelamin' => [
                'label'  => 'layanan/admin/data_anak.jenis_kelamin',
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Jenis Kelamin Tidak Boleh Kosong'
                ]
            ],
            'tgl_lahir' => [
                'label'  => 'layanan/admin/data_anak.tgl_lahir',
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Tanggal Lahir Tidak Boleh Kosong'
                ]
            ],
            'nik_ayah' => [
                'label'  => 'layanan/admin/data_anak.nik_ayah',
                'rules'  => 'required|is_not_unique[tb_penduduk.nik]',
                'errors' => [
                    'required' => 'Nik Ayah Tidak Boleh Kosong',
                    'is_not_unique' => 'Nik Ayah Tidak Terdaftar'
                ]
            ],
            'nik_ibu' => [
                'label'  => 'layanan/admin/data_anak.nik_ibu',
                'rules'  => 'required|is_not_unique[tb_penduduk.nik]',
                'errors' => [
                    'required' => 'Nik Ibu Tidak Boleh Kosong',
                    'is_not_unique' => 'Nik Ibu Tidak Terdaftar'
                ]
            ],
        ]);
        if (!$validation->withRequest($this->request)->run()) {
            return $this->response->setJSON([
                'error' => true,
                'message' => $validation->getErrors()
            ]);
        } else {
            $this->DataAnakModel->save($data);
            return $this->response->setJSON([
                'error' => false,
                'message' => 'Data Berhasil Ditambah'
            ]);
        }
    }
    public function tambah_usaha_penduduk()
    {
        $username = session('username');
        session();
        $data = [
            'username' => $username,
            'validation' => \config\Services::validation()
        ];
        return view('layanan/admin/tambah_usaha_penduduk', $data);
    }
    public function proses_tambah_usaha_penduduk()
    {
        if (!$this->validate([
            'nik' => [
                'rules' => 'required|is_not_unique[tb_penduduk.nik]',
                'errors' => [
                    'required' => 'NIK tidak boleh kosong',
                    'is_not_unique' => 'NIK tidak terdaftar'
                ]
            ],
            'nama' => [
                'rules' => 'required|is_not_unique[tb_penduduk.nama]',
                'errors' => [
                    'required' => 'Nama tidak boleh kosong',
                    'is_not_unique' => 'Nama tidak terdaftar',
                ]
            ],
            'jenis_usaha' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis Usaha tidak boleh kosong',
                ]
            ],
        ])) {
            
            return redirect()->to('/admin/tambah_usaha_penduduk')->withInput();
        }
        $this->UsahaPendudukModel->save([
            'nik' => $this->request->getVar('nik'),
            'nama' => $this->request->getVar('nama'),
            'jenis_usaha' => $this->request->getVar('jenis_usaha'),
        ]);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        return redirect()->to('/admin/data_usaha_penduduk');
    }
    public function data_usaha_penduduk()
    {

        // $data_penduduk = $this->DataPendudukModel->findAll();
        $username = session('username');
        $data = [
            'username' => $username,
            'datausaha' => $this->UsahaPendudukModel->data_usaha()
        ];
        return view('layanan/admin/data_usaha_penduduk', $data);
    }
    public function ubah_usaha_penduduk($id)
    {
        $username = session('username');
        session();
        $data = [
            'username' => $username,
            'usaha' => $this->UsahaPendudukModel->data_usaha($id),
            'validation' => \config\Services::validation()
        ];
        return view('layanan/admin/ubah_usaha_penduduk', $data);
    }
    public function proses_ubah_usaha_penduduk($id)
    {
        if (!$this->validate([
            'nik' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'NIK Tidak Boleh Kosong',
                    'is_not_unique' => 'NIK Tidak Terdaftar'
                ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Tidak Boleh Kosong',
                    'is_not_unique' => 'Nama Tidak Terdaftar'
                ]
            ],
            'jenis_usaha' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis Usaha Tidak Boleh Kosong'
                ]
            ]
        ])) {
            $validation = \config\Services::validation();
            return redirect()->to('/admin/ubah_usaha_penduduk/' . $this->request->getVar('id'))->withInput();
        }
        $this->UsahaPendudukModel->save([
            'id' => $id,
            'nik' => $this->request->getVar('nik'),
            'nama' => $this->request->getVar('nama'),
            'jenis_usaha' => $this->request->getVar('jenis_usaha'),
        ]);
        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        return redirect()->to('/admin/data_usaha_penduduk');
    }
    public function hapus_usaha_penduduk($id)
    {
        $this->UsahaPendudukModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to('/admin/data_usaha_penduduk');
    }
    public function pengaduan_saran($id)
    {
        // $saran =  $this->SaranModel->findAll();
        if ($id == "0") {
            $username = session('username');
            $data_aduan =  $this->PengaduanModel->data_pengaduan_masuk()->getResult();

            $data_saran = $this->SaranModel->findAll();
            $saran = [];
    
            foreach ($data_saran as $d) {
                $waktuBuat = $d['created_at'];
                $selisihWaktu = $this->hitungSelisihWaktu($waktuBuat);
    
                $saran[] = [
                    'id' => $d['id'],
                    'nik' => $d['nik'],
                    'saran' => $d['saran'],
                    'selisihWaktu' => $selisihWaktu
                ];
            }
            $data = [
                'username' => $username,
                'datadb' => $data_aduan,
                'saran' => $saran,
                'id_halaman' => $id
            ];
            return view('layanan/admin/pengaduan_saran', $data);
        }
        if ($id == "1") {
            $username = session('username');
            $data_aduan =  $this->PengaduanModel->data_pengaduan_selesai()->getResult();

            $data_saran = $this->SaranModel->findAll();
            $saran = [];
    
            foreach ($data_saran as $d) {
                $waktuBuat = $d['created_at'];
                $selisihWaktu = $this->hitungSelisihWaktu($waktuBuat);
    
                $saran[] = [
                    'id' => $d['id'],
                    'nik' => $d['nik'],
                    'saran' => $d['saran'],
                    'selisihWaktu' => $selisihWaktu
                ];
            }

            $data = [
                'username' => $username,
                'datadb' => $data_aduan,
                'saran' => $saran,
                'id_halaman' => $id
            ];
            return view('layanan/admin/pengaduan_saran', $data);
        }
    }

    private function hitungSelisihWaktu($waktu)
    {
        $waktuPerubahan = new \DateTime($waktu);
        $waktuSekarang = new \DateTime();
        $selisih = $waktuPerubahan->diff($waktuSekarang);

        if ($selisih->days > 0) {
            return $selisih->format('%a hari yang lalu');
        } elseif ($selisih->h > 0) {
            return $selisih->format('%h jam yang lalu');
        } else {
            return 'Baru saja diubah';
        }
    }
    public function respon_aduan($id)
    {
        $username = session('username');
        $data_aduan =  $this->PengaduanModel->data_pengaduan_masuk($id)->getResult();
        $data = [
            'username' => $username,
            'datadb' => $data_aduan,
            'validation' => \config\Services::validation()
        ];
        return view('layanan/admin/respon_aduan', $data);
    }
    public function proses_respon_aduan($id)
    {
        if (!$this->validate([
            'tanggapan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggapan tidak boleh kosong',
                ]
            ],
        ])) {
            
            return redirect()->to('/admin/respon_aduan/'.$id)->withInput();
        } else {
            # code...
            $this->PengaduanModel->save([
                'id' => $id,
                'tanggapan' => $this->request->getVar('tanggapan'),
                'status' => "SELESAI"
            ]);
            session()->setFlashdata('pesan', 'Tanggapan Berhasil Dikirim');
            return redirect()->to('/admin/pengaduan_saran/1');
        }
    }
    public function administrasi($status)
    {
        $username = session('username');
        session();
            $data_surat = $this->AdministrasiModel->data_surat_diajukan($status);
        $data = [
            'username' => $username,
            'data_surat' => $data_surat,
            'status' => $status,
            'validation' => \config\Services::validation(),
        ];
        return view('layanan/admin/administrasi', $data);
    }

    public function rincian_surat($id)
    {
        $username = session('username');
        session();
        $data_rincian = $this->AdministrasiModel->rincian_surat($id);
        $data_kematian = $this->DataPendudukModel->profile($data_rincian[0]['nik_meninggal']);
        $data_pindah = $this->PindahModel->getdatadetail($id);
        $data = [
            'username' => $username,
            'data_rincian' => $data_rincian,
            'data_pindah' => $data_pindah,
            'data_kematian' => $data_kematian,
        ];
        return view('layanan/admin/rincian', $data);
    }
    public function proses_surat($id)
    {
       
        $this->AdministrasiModel->save([
            'id' => $id,
            'status' => "DIPROSES",
        ]);
        session()->setFlashdata('pesan', 'Status Surat Diubah Menjadi Diproses');
        return redirect()->to('/admin/administrasi/DIPROSES');
            
    }
    public function surat_selesai($id)
    {
       
        $this->AdministrasiModel->save([
            'id' => $id,
            'status' => "SELESAI",
        ]);
        session()->setFlashdata('pesan', 'Status Surat Diubah Menjadi Selesai');
        return redirect()->to('/admin/administrasi/SELESAI');
            
    }
    public function menolak()
    {
        $validation = \config\Services::validation();
            $validation->setRules([
            'alasan' => [
                'label'  => 'layanan/admin/administrasi.alasan',
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Harus Menyertakan Alasan Penolakan',
                ],
                ],

            ]);

        if (!$validation->withRequest($this->request)->run()) {
            return $this->response->setJSON([
                'error' => true,
                'message' => $validation->getErrors()
            ]);
        } else {
            $this->TolakSuratModel->save([
                'id' => $this->request->getPost('id'),
                'alasan' => $this->request->getPost('alasan')
            ]);
            $this->AdministrasiModel->save([
                'id' => $this->request->getPost('id'),
                'status' => "DITOLAK"
            ]);
            return $this->response->setJSON([
                'error' => false,
                'message' => "Ditolak"
            ]);
        
        }
    }
    public function cetak($id, $nik, $jenis_surat)
    {
        $surat = $this->AdministrasiModel->data_join($id, $jenis_surat);
        $jenis = $this->UsahaPendudukModel->cetak_usaha($nik);
        $data_kematian = $this->DataPendudukModel->profile($surat['nik_meninggal']);
        $jabatan = "Hukum Tua";
        $nama = $this->StrukturModel->nama($jabatan);
        $data_pindah = $this->PindahModel->getdatadetail($id);
        $username = session('username');
        session();
        $data = [
            'data_surat' => $surat,
            'username' => $username,
            'jenis' => $jenis,
            'nama' => $nama,
            'data_pindah' => $data_pindah,
            'data_kematian' => $data_kematian
        ];
        $this->AdministrasiModel->save([
            'id' => $id,
            'status' => "DICETAK",
        ]);
        $html = view('layanan/admin/cetak', $data);
        $pdf = new TCPDF('Portrait', PDF_UNIT, 'F4', true, 'UTF-8', false);
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' 001', PDF_HEADER_STRING);
        $pdf->setPrintFooter(false);

        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFont('times', '', '12', '', 'default', true);
        $pdf->AddPage();
        $pdf->writeHTMLCell('', '', '', '', $html,0, 0, false, true, '', true);
        $this->response->setContentType('application/pdf');
        $pdf->Output('Surat.pdf', 'I');
    }
    public function berita_desa()
    {
        $username = session('username');
        session();
        $artikel = $this->ArtikelModel->findAll();
        $data = [
            'username' => $username,
            'artikel' => $artikel,
            
        ];
        //$artikelmodel = new ArtikelModel();
        return view('layanan/admin/berita_desa', $data);
    }
    public function tambah_data_berita()
    {
        $username = session('username');
        session();
        $data= [
            'username' => $username,
            'validation' => \config\Services::validation()
        ];
        return view('layanan/admin/tambah_berita', $data);
    }
    public function proses_tambah_data_berita()
    {
        $file_gambar = $this->request->getFile('gambar');
        $file_nama_gambar = $file_gambar->getRandomName();
        $data = [
            'judul' => $this->request->getPost('judul'),
            'keterangan' => $this->request->getPost('keterangan'),
            'gambar' => $file_nama_gambar,
        ];
        if (!$this->validate([
            'judul' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Harus Memasukkan Judul'
                ]
            ],
            'keterangan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Harus Memasukkan keterangan'
                ]
            ],
            'gambar' => [
                'rules' => 'uploaded[gambar]',
                'errors' => [
                    'uploaded' => 'Harus Memasukkan Foto Berita'
                ]
            ],
        ])) {
            return redirect()->to('/admin/tambah_data_berita')->withInput();
        } else {

            $file_gambar->move('img/berita', $file_nama_gambar);
            $this->ArtikelModel->save($data);
            session()->setFlashdata('pesan', 'Menambahkan Data Berita');
            return redirect()->to('/admin/berita_desa');
        }
    }
    public function hapus_berita($id)
    {
        $delete = $this->ArtikelModel->delete($id);

        // Kembalikan response berhasil
        return $this->response->setJSON([
            'message' => 'Berita berhasil dihapus!'
        ]);
    }
    public function rincian_berita($id)
    {
        $username = session('username');
        session();
        $berita = $this->ArtikelModel->find($id);
        $data= [
            'username' => $username,
            'validation' => \config\Services::validation(),
            'berita' => $berita
        ];
        return view('layanan/admin/rincian_berita', $data);
    }
    public function ubah_berita($id)
    {
        $username = session('username');
        session();
        $berita = $this->ArtikelModel->find($id);
        $data= [
            'username' => $username,
            'validation' => \config\Services::validation(),
            'berita' => $berita
        ];
        return view('layanan/admin/ubah_berita', $data);
    }
    public function proses_ubah_data_berita($id)
    {
        $data = $this->ArtikelModel->find($id);

        $gambar_lama = $data['gambar'];

        $gambar = $this->request->getFile('gambar');
        if ($gambar->isValid() && ! $gambar->hasMoved()) {
            $nama_gambar_baru = $gambar->getRandomName();
            $gambar->move(ROOTPATH . 'public/img/berita', $nama_gambar_baru);
            $data['gambar'] = $nama_gambar_baru;
        }

        $data['judul'] = $this->request->getPost('judul');
        $data['keterangan'] = $this->request->getPost('keterangan');

        if ($this->ArtikelModel->save($data)) {
            if ($gambar_lama != $data['gambar']) {
                unlink(ROOTPATH . 'public/img/berita/' . $gambar_lama);
            }
            session()->setFlashdata('pesan', 'berhasil');
            return redirect()->to('/admin/berita_desa');
        } else {
            session()->setFlashdata('error', 'menambahkan data');
            return redirect()->to('/admin/ubah_berita' . $id);
        }
    }
    public function sejarah_desa()
    {
        $username = session('username');
        session();
        $sejarah = $this->SejarahModel->first();
        $data = [
            'username' => $username,
            'sejarah' => $sejarah,
            'validation' => \config\Services::validation(),
            
        ];
        return view('layanan/admin/sejarah_desa', $data);
    }
    public function proses_ubah_sejarah($id)
    {
        $data = [
            'id' => $id,
            'deskripsi' => $this->request->getPost('deskripsi'),
        ];
        if (!$this->validate([
           
            'deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Harus Memasukkan Keterangan Sejarah'
                ]
            ],
        ])) {
            return redirect()->to('/admin/sejarah_desa')->withInput();
        } else {
            $this->SejarahModel->save($data);
            session()->setFlashdata('pesan', 'Mengubah Data Sejarah');
            return redirect()->to('/admin/sejarah_desa');
        }
    }

    public function struktur_desa()
    {
        $username = session('username');
        session();
        $struktur = $this->StrukturModel->findAll();
        $data = [
            'username' => $username,
            'struktur' => $struktur,
            'validation' => \config\Services::validation(),
            
        ];
        return view('layanan/admin/struktur_desa', $data);
    }

    public function tambah_struktur()
    {
        $validation = \config\Services::validation();
        $validation->setRules([
            'tambah_nama' => [
                'label'  => 'layanan/admin/struktur_desa.tambah_nama',
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Nama Tidak Boleh Kosong'
                ]
            ],
            'tambah_jabatan' => [
                'label'  => 'layanan/admin/struktur_desa.tambah_jabatan',
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Jabatan Tidak Boleh Kosong'
                ]
            ],
            'tambah_gambar' => [
                'label'  => 'layanan/admin/struktur_desa.tambah_gambar',
                'rules'  => 'uploaded[tambah_gambar]|is_image[tambah_gambar]',
                'errors' => [
                    'uploaded' => 'Foto Pegawai Tidak Boleh Kosong',
                    'is_image' => 'Yang Anda Unggah Bukan Sebuah Gambar'
                ]
            ],
        ]);
        if (!$validation->withRequest($this->request)->run()) {
            return $this->response->setJSON([
                'error' => true,
                'message' => $validation->getErrors()
            ]);
        } else {
            $gambar = $this->request->getFile('tambah_gambar');
            $nama_gambar = $gambar->getRandomName();
            $gambar->move(ROOTPATH . 'public/img/struktur', $nama_gambar);
            $data = [
            'nama' => $this->request->getPost('tambah_nama'),
            'jabatan' => $this->request->getPost('tambah_jabatan'),
            'gambar' => $nama_gambar,
            ];
            $this->StrukturModel->save($data);
            return $this->response->setJSON([
                'error' => false,
                'message' => 'Data Berhasil Ditambahkan'
            ]);
        }
    }
    public function ubah_struktur($id)
    {
        $data_lama = $this->StrukturModel->find($id);

        $gambar_baru = $this->request->getFile('gambar');

        if ($_FILES['gambar']['error'] === UPLOAD_ERR_NO_FILE) {
            // pengguna tidak memilih gambar baru, gunakan gambar lama
            $gambar = $data_lama['gambar']; // $gambarLama berisi path gambar lama yang tersimpan di server
        } 
        if ($gambar_baru->isValid() && ! $gambar_baru->hasMoved()) {
            $nama_gambar_baru = $gambar_baru->getRandomName();
            $gambar_baru->move(ROOTPATH . 'public/img/struktur', $nama_gambar_baru);
            $gambar = $nama_gambar_baru;
        }
        $data = [
            'id' => $id,
            'nama' => $this->request->getPost('nama'),
            'jabatan' => $this->request->getPost('jabatan'),
            'gambar' => $gambar,
        ];
        $validation = \config\Services::validation();
        $validation->setRules([
            'nama' => [
                'label'  => 'layanan/admin/struktur_desa.nama',
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Nama Tidak Boleh Kosong'
                ]
            ],
            'jabatan' => [
                'label'  => 'layanan/admin/struktur_desa.jabatan',
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Jabatan Tidak Boleh Kosong'
                ]
            ],
        ]);
        if (!$validation->withRequest($this->request)->run()) {
            return $this->response->setJSON([
                'error' => true,
                'message' => $validation->getErrors()
            ]);
        } else {
            $this->StrukturModel->save($data);
            if ($data_lama['gambar'] != $data['gambar']) {
                unlink(ROOTPATH . 'public/img/stuktur/' . $data_lama['gambar']);
            }
            return $this->response->setJSON([
                'error' => false,
                'message' => 'Data Berhasil Diubah'
            ]);
        }
    }

    public function hapus_struktur($id)
    {
        $delete = $this->StrukturModel->delete($id);

        // Kembalikan response berhasil
        return $this->response->setJSON([
            'message' => 'Data berhasil dihapus!'
        ]);
    }

    public function potensi_desa()
    {
        $username = session('username');
        session();
        $potensi = $this->PotensiModel->findAll();
        $data = [
            'username' => $username,
            'potensi' => $potensi,
            'validation' => \config\Services::validation(),
            
        ];
        return view('layanan/admin/informasi_website/potensi_desa', $data);
    }

    public function tambah_potensi()
    {
        $username = session('username');
        $data = [
            'username' => $username,
            'validation' => \config\Services::validation(),
            
        ];
        return view('layanan/admin/informasi_website/tambah_potensi',$data);
    }
    public function proses_tambah_potensi()
    {
        $file_gambar = $this->request->getFile('gambar');
        $file_nama_gambar = $file_gambar->getRandomName();
        $data = [
            'judul' => $this->request->getPost('judul'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'gambar' => $file_nama_gambar,
        ];
        if (!$this->validate([
            'judul' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Harus Memasukkan Judul'
                ]
            ],
            'deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Harus Memasukkan deskripsi'
                ]
            ],
            'gambar' => [
                'rules' => 'uploaded[gambar]',
                'errors' => [
                    'uploaded' => 'Harus Memasukkan Foto Potensi'
                ]
            ],
        ])) {
            return redirect()->to('/admin/tambah_potensi')->withInput();
        } else {

            $file_gambar->move('img/potensi', $file_nama_gambar);
            $this->PotensiModel->save($data);
            session()->setFlashdata('pesan', 'Menambahkan Data Berita');
            return redirect()->to('/admin/tambah_potensi');
        }
    }

    public function hapus_potensi($id)
    {
        $delete = $this->PotensiModel->delete($id);

        // Kembalikan response berhasil
        return $this->response->setJSON([
            'message' => 'Data berhasil dihapus!'
        ]);
    }

    public function ubah_potensi($id)
    {
        $username = session('username');
        session();
        $potensi = $this->PotensiModel->find($id);
        $data= [
            'username' => $username,
            'validation' => \config\Services::validation(),
            'potensi' => $potensi
        ];
        return view('layanan/admin/informasi_website/ubah_potensi', $data);
    }

    public function proses_ubah_potensi($id)
    {
        $data_lama = $this->PotensiModel->find($id);

        $gambar_baru = $this->request->getFile('gambar');
        
        if ($gambar_baru->isValid() && !$gambar_baru->hasMoved()) {
            $nama_gambar_baru = $gambar_baru->getRandomName();
            $gambar_baru->move(ROOTPATH . 'public/img/potensi', $nama_gambar_baru);
            $gambar = $nama_gambar_baru;
        } else {
            $gambar = $data_lama['gambar'];
        }
        
        $validation = \config\Services::validation();
        
        if (!$this->validate([
            'judul' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Judul Tidak Boleh Kosong'
                ]
            ],
            'deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Deskripsi Tidak Boleh Kosong'
                ]
            ],
        ])) {
            return redirect()->to('/admin/ubah_potensi/'. $id)->withInput();
        } else {
            if ($data_lama['gambar'] != $gambar) {
                unlink(ROOTPATH . 'public/img/potensi/' . $data_lama['gambar']);
            }
        
            $data = [
                'id' => $id,
                'judul' => $this->request->getPost('judul'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'gambar' => $gambar,
            ];
    
            $this->PotensiModel->save($data);
            
            session()->setFlashdata('pesan', 'Data Potensi berhasil diubah');
            return redirect()->to('/admin/potensi_desa');
        }
        
    }
    
    public function bumdes()
    {
        $username = session('username');
        session();
        $bumdes = $this->BumdesModel->data_bumdes();
        $pengelola = $this->DataUser->where('role_id', '4')->findAll();
        $kelola_usaha = [];

        foreach ($pengelola as $p) {
            $usaha = $this->BumdesModel->where('id_kelola', $p['id'])->findAll();
            $kelola_usaha[] = [
                'id' => $p['id'],
                'nama' => $p['username'],
                'usaha' => $usaha
            ];
        }

        $data = [
            'username' => $username,
            'bumdes' => $bumdes,
            'pengelola' => $pengelola,
            'kelola_usaha' => $kelola_usaha,
            'validation' => \config\Services::validation(),
            
        ];
        return view('layanan/admin/informasi_website/bumdes/bumdes', $data);
    }

    public function ubah_bumdes($id)
    {
        $username = session('username');
        session();
        $bumdes = $this->BumdesModel->find($id);
        $data= [
            'username' => $username,
            'validation' => \config\Services::validation(),
            'bumdes' => $bumdes
        ];
        return view('layanan/admin/informasi_website/bumdes/ubah_bumdes', $data);
    }

    public function proses_ubah_bumdes($id)
    {
        $data_lama = $this->BumdesModel->find($id);

        $gambar_baru = $this->request->getFile('gambar');
        
        if ($gambar_baru->isValid() && !$gambar_baru->hasMoved()) {
            $nama_gambar_baru = $gambar_baru->getRandomName();
            $gambar_baru->move(ROOTPATH . 'public/img/bumdes', $nama_gambar_baru);
            $gambar = $nama_gambar_baru;
        } else {
            $gambar = $data_lama['gambar'];
        }
        
        $validation = \config\Services::validation();
        
        if (!$this->validate([
            'nama_usaha' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Usaha Tidak Boleh Kosong'
                ]
            ],
            'deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Deskripsi Tidak Boleh Kosong'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat Tidak Boleh Kosong'
                ]
            ],
            'kontak' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kontak Tidak Boleh Kosong'
                ]
            ],
        ])) {
            return redirect()->to('/admin/ubah_bumdes/'. $id)->withInput();
        } else {
            if ($data_lama['gambar'] != $gambar) {
                unlink(ROOTPATH . 'public/img/bumdes/' . $data_lama['gambar']);
            }
        
            $data = [
                'id' => $id,
                'nama_usaha' => $this->request->getPost('nama_usaha'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'alamat' => $this->request->getPost('alamat'),
                'kontak' => $this->request->getPost('kontak'),
                'gambar' => $gambar,
            ];
            $this->BumdesModel->save($data);
            
            session()->setFlashdata('pesan', 'Data Potensi berhasil diubah');
            return redirect()->to('/admin/bumdes');
        }
        
    }

    public function tambah_bumdes()
    {
        $username = session('username');
        $data = [
            'username' => $username,
            'validation' => \config\Services::validation(),
            
        ];
        return view('layanan/admin/informasi_website/bumdes/tambah_bumdes',$data);
    }

    public function proses_tambah_bumdes()
    {
        $file_gambar = $this->request->getFile('gambar');
        $file_nama_gambar = $file_gambar->getRandomName();
        $data = [
            'nama_usaha' => $this->request->getPost('nama_usaha'),
            'gambar' => $file_nama_gambar,
            'alamat' => $this->request->getPost('alamat'),
            'kontak' => $this->request->getPost('kontak'),
            'deskripsi' => $this->request->getPost('deskripsi'),
        ];
        if (!$this->validate([
            'nama_usaha' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Harus Memasukkan Nama Usaha'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Harus Memasukkan Alamat'
                ]
            ],
            'kontak' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Harus Memasukkan Kontak'
                ]
            ],
            'deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Harus Memasukkan deskripsi'
                ]
            ],
            'gambar' => [
                'rules' => 'uploaded[gambar]',
                'errors' => [
                    'uploaded' => 'Harus Memasukkan Foto Usaha'
                ]
            ],
        ])) {
            return redirect()->to('/admin/tambah_bumdes')->withInput();
        } else {

            $file_gambar->move('img/bumdes', $file_nama_gambar);
            $this->BumdesModel->save($data);
            session()->setFlashdata('pesan', 'Menambahkan Data BUMDes');
            return redirect()->to('/admin/tambah_bumdes');
        }
    }
    public function hapus_bumdes($id)
    {
        $delete = $this->BumdesModel->delete($id);

        // Kembalikan response berhasil
        return $this->response->setJSON([
            'message' => 'Data berhasil dihapus!'
        ]);
    }
    public function tambah_pengelola_bumdes()
    {
        $validation = \config\Services::validation();
            $validation->setRules([
            'username' => [
                'label'  => 'layanan/admin/informasi_website/bumdes/bumdes.username',
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Username Tidak Boleh Kosong',
                ],
            ],
            'password' => [
                'label'  => 'layanan/admin/informasi_website/bumdes/bumdes.password',
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Password Tidak Boleh Kosong',
                ],
            ],

            ]);

        if (!$validation->withRequest($this->request)->run()) {
            return $this->response->setJSON([
                'error' => true,
                'message' => $validation->getErrors()
            ]);
        } else {
            $this->UserModel->save([
                'username' => $this->request->getVar('username'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
                'role_id' => '4'
            ]);
            return $this->response->setJSON([
                'error' => false,
                'message' => "Berhasil Menambahkan"
            ]);
        
        }
    }

    public function hapus_pengelola_bumdes($id)
    {
        $data_usaha = $this->BumdesModel->where('id_kelola', $id)->findAll();

        // Hapus file gambar terkait
        foreach ($data_usaha as $data) {
                unlink('img/bumdes/' . $data['gambar']); // Menghapus file gambar
        }

        $delete = $this->UserModel->delete($id);
        $delete_usaha = $this->BumdesModel->hapus_usaha($id);

        // Kembalikan response berhasil
        return $this->response->setJSON([
            'message' => 'Data berhasil dihapus!'
        ]);
    }
    public function anggaran()
    {
        if (isset($_GET['tahun'])) {
            $tahun = $_GET['tahun'];
            $username = session('username');
            $data['sumber'] = $this->PendapatanModel->anggaran($tahun)->getResult();
            $data['belanja'] = $this->BelanjaModel->belanja($tahun)->getResultArray();
            $data['tahun'] = $this->PendapatanModel->tahun()->getResult();
            $data['tahun_data'] = $tahun;
            foreach ($data['sumber'] as $d) {
                $data['detail'][$d->sumber] = $this->DetailPendapatanModel->getDetailPendapatan($d->sumber, $tahun);
            }
            $data['username'] = $username;
            // return $this->response->setJSON($data);
            return view('layanan/admin/informasi_website/anggaran/anggaran', $data);
        } else {
            $username = session('username');
            $data['sumber'] = $this->PendapatanModel->anggaran()->getResult();
            $data['belanja'] = $this->BelanjaModel->belanja()->getResultArray();
            $data['tahun'] = $this->PendapatanModel->tahun()->getResult();
            $data['tahun_data'] = date('Y');
            foreach ($data['sumber'] as $d) {
                $data['detail'][$d->sumber] = $this->DetailPendapatanModel->getDetailPendapatan($d->sumber);
            }
            $data['username'] = $username;
            return view('layanan/admin/informasi_website/anggaran/anggaran', $data);
        }
    }

    public function tambah_anggaran()
    {
        $username = session('username');
        session();
        $data = [
            'username' => $username,
            'validation' => \config\Services::validation(),
            
        ];
        return view('layanan/admin/informasi_website/anggaran/tambah_anggaran', $data);
    }
    public function proses_tambah_anggaran()
    {   
        $isError = false;
        //pendapatan
        $sumber = $this->request->getPost('sumber');
        $tahun_pendapatan = $this->request->getPost('tahun_pendapatan');
        $detail_sumber = $this->request->getPost('detail_sumber');
        $detail_anggaran = $this->request->getPost('detail_anggaran');
        $detail_realisasi = $this->request->getPost('detail_realisasi');
        $detail_selisih = $this->request->getPost('detail_selisih');

        //belanja
        $sumber_belanja = $this->request->getPost('sumber_belanja');
        $tahun_belanja = $this->request->getPost('tahun_belanja');
        $belanja_anggaran = $this->request->getPost('belanja_anggaran');
        $belanja_realisasi = $this->request->getPost('belanja_realisasi');
        $belanja_selisih = $this->request->getPost('belanja_selisih');

        $data_unik = []; // Array untuk menyimpan data unik
        $data_sama = []; // Array untuk menyimpan data yang terduplikasi
        
        if ($sumber) {
            foreach ($sumber as $data) {
                if (in_array($data, $data_unik)) {
                    
                    // Data sudah ada dalam array, masukkan ke array duplicatedData
                    $data_sama[] = $data;
                    
                } else {
                    // Data belum ada dalam array, masukkan ke array uniqueData
                    $data_unik[] = $data;
                     
                }
            }
            foreach ($data_unik as $data) {
                // Simpan data ke database menggunakan model atau metode yang sesuai
                $simpan = $this->PendapatanModel->save([
                    'tahun' => $tahun_pendapatan,
                    'sumber' => $data
                ]);
            }
            if(!$simpan){
                $isError = true;
            }
        }
        if ($detail_sumber) {
            foreach ($sumber as $key => $item) {
                $data = [
                    'sumber' => $item,
                    'detail_sumber' => $detail_sumber[$key],
                    'detail_anggaran' => str_replace(".", "", $detail_anggaran[$key]),
                    'detail_realisasi' => str_replace(".", "", $detail_realisasi[$key]),
                    'detail_selisih' => str_replace(".", "", $detail_selisih[$key]),
                    'tahun' => $tahun_pendapatan
                ];
        
                // Simpan data ke database menggunakan model atau metode yang sesuai
                $simpan = $this->DetailPendapatanModel->save($data);
            }
            if(!$simpan){
                $isError = true;
            }
        }
        if ($sumber_belanja) {
            foreach ($sumber_belanja as $key => $item) {
                $data = [
                    'tujuan' => $item,
                    'anggaran' => str_replace(".", "", $belanja_anggaran[$key]),
                    'realisasi' => str_replace(".", "", $belanja_realisasi[$key]),
                    'selisih' => str_replace(".", "", $belanja_selisih[$key]),
                    'tahun' =>$tahun_belanja
                ];
        
                // Simpan data ke database menggunakan model atau metode yang sesuai
                $simpan = $this->BelanjaModel->save($data);
            }
            if(!$simpan){
                $isError = true;
            }
        }
        if ($isError) {
            return $this->response->setJSON([
                'error' => true,
                'message' => 'Data Gagal Disimpan'
            ]);
        } else {
            return $this->response->setJSON([
                'error' => false,
                'message' => 'Berhasil menyimpan semua data.'
            ]);
        }

    }

    public function ubah_anggaran($tahun)
    {
        $tahun = $tahun;
        $username = session('username');
        $data['sumber'] = $this->PendapatanModel->anggaran($tahun)->getResult();
        $data['belanja'] = $this->BelanjaModel->belanja($tahun)->getResultArray();
        $data['tahun'] = $this->PendapatanModel->tahun()->getResult();
        $data['tahun_data'] = $tahun;
        // foreach ($data['sumber'] as $d) {
        //     $data['detail'][$d->sumber] = $this->DetailPendapatanModel->getDetailPendapatan($d->sumber, $tahun);
        // }
        $data['detail'] = $this->DetailPendapatanModel->getDetail($tahun);
        $data['username'] = $username;
        // return $this->response->setJSON($data);
        return view('layanan/admin/informasi_website/anggaran/ubah_anggaran', $data);
    }

    public function proses_ubah_anggaran()
    {
        // Ambil data dari form
        $detailSumberData  = $this->request->getPost('detail_sumber_data');
        $belanjaData  = $this->request->getPost('belanja_data');
        $tahun_data = $this->request->getPost('tahun_data');

        foreach ($detailSumberData as $detail) {
            $simpan_detail = $this->DetailPendapatanModel->update($detail['id'], str_replace(".", "", $detail));
        }
        foreach ($belanjaData as $belanja) {
           $simpan_belanja = $this->BelanjaModel->update($belanja['id'], str_replace(".", "", $belanja));
        }
        if($simpan_detail && $simpan_belanja ){
            session()->setFlashdata('pesan', 'Laporan Anggaran Berhasil Diubah');
            return redirect()->to('/admin/anggaran');
        } else {
            session()->setFlashdata('pesan', 'Laporan Anggaran Gagal Diubah');
            return redirect()->to('/admin/ubah_anggaran/'.$tahun_data);
        }
        
    }
    public function hapus_anggaran($tahun)
    {
        $this->PendapatanModel->where('tahun', $tahun)->delete();
        $this->DetailPendapatanModel->where('tahun', $tahun)->delete();
        $this->BelanjaModel->where('tahun', $tahun)->delete();

        // Kembalikan response berhasil
        return $this->response->setJSON([
            'message' => 'Data berhasil dihapus!'
        ]);
    }

    public function pengunjung()
    {
        $username = session('username');
        $data = $this->WajibLapor->orderBy('status', 'ASC')->findAll();
        $data = [
            'username' => $username,
            'data' => $data
        ];
        return view('layanan/admin/informasi_website/wajiblapor', $data);
    }

    public function respon_wajib_lapor($id)
    {
        $username = session('username');
        $data = [
            'id' => $id,
            'status' => 'DITINJAU'
        ];
        $this->WajibLapor->save($data);
        return redirect()->to('/admin/pengunjung');
    }
}
