<?php

namespace App\Controllers;

use App\Models\LoginModel;
use App\Models\DataPendudukModel;
use App\Models\UsahaPendudukModel;
use App\Models\DataAnakModel;
use App\Models\PengaduanModel;
use App\Models\TanggapanModel;
use App\Models\TolakSuratModel;
use App\Models\AdministrasiModel;
use App\Models\PindahModel;
use App\Models\UserModel;
use App\Models\SaranModel;
use App\Models\WajibLapor;
use App\Models\StrukturModel;

use App\Libraries\MY_TCPDF as TCPDF;

class administrasi extends BaseController
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
        $this->PindahModel = new PindahModel();
        $this->UserModel = new UserModel();
        $this->SaranModel = new SaranModel();
        $this->DataAnakModel = new DataAnakModel();
        $this->WajibLapor = new WajibLapor();
        $this->StrukturModel = new StrukturModel();
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
    public function index($status)
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
        return view('layanan/administrasi/index', $data);
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
        return view('layanan/administrasi/rincian', $data);
    }
    public function proses_surat($id)
    {
       
        $this->AdministrasiModel->save([
            'id' => $id,
            'status' => "DIPROSES",
        ]);
        session()->setFlashdata('pesan', 'Status Surat Diubah Menjadi Diproses');
        return redirect()->to('/administrasi/index/DIPROSES');
            
    }
    public function surat_selesai($id)
    {
       
        $this->AdministrasiModel->save([
            'id' => $id,
            'status' => "SELESAI",
        ]);
        session()->setFlashdata('pesan', 'Status Surat Diubah Menjadi Selesai');
        return redirect()->to('/administrasi/index/SELESAI');
            
    }
    public function menolak()
    {
        $validation = \config\Services::validation();
            $validation->setRules([
            'alasan' => [
                'label'  => 'layanan/administrasi/index.alasan',
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
        $html = view('layanan/administrasi/cetak', $data);
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
    public function ubah_data()
    {
        $username = session('username');
        session();
        $data = [
            'username' => $username,
            'validation' => \config\Services::validation(),
        ];
        return view('layanan/administrasi/ubah_data', $data);
    }
    public function proses_ubah_data($username)
    {
        $username_lama = $this->request->getPost('username_lama');
        $password_lama = $this->request->getPost('password_lama');
        $password_baru = $this->request->getPost('password_baru');
        if (!$this->validate([
            'username_lama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Username lama tidak boleh kosong',
                ]
            ],
            'password_lama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password lama tidak boleh kosong',
                ]
            ],
            'username_baru' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Username baru tidak boleh kosong',
                ]
            ],
            'password_baru' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password baru tidak boleh kosong',
                ]
            ],
        ])) {
            return redirect()->to('/administrasi/ubah_data/')->withInput();
        } else {
            if ($username_lama == $username) {
                $data_lama = $this->DataUser->Where('username', $username_lama)->first();
                if (password_verify($password_lama, $data_lama['password'])) {
                    $this->DataUser->save([
                        'id' => $data_lama['id'],
                        'username' => $this->request->getPost('username_baru'),
                        'password' => password_hash($password_baru, PASSWORD_BCRYPT),
                    ]);
                    session()->setFlashdata('pesan', 'Data Berhasil Diubah');
                    return redirect()->to('/administrasi/ubah_data/');
                } 
            } else {
                echo "salah";
            }
        }
    }
   

}
