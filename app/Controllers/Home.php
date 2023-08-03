<?php

namespace App\Controllers;

use App\Models\ArtikelModel;
use App\Models\SejarahModel;
use App\Models\StatistikModel;
use App\Models\StrukturModel;
use App\Models\BumdesModel;
use App\Models\PendapatanModel;
use App\Models\DetailPendapatanModel;
use App\Models\BelanjaModel;
use App\Models\PotensiModel;
use App\Models\WajibLapor;

class Home extends BaseController
{
    protected $artikelmodel;
    public function __construct()
    {
        helper('text');
    }
    public function index()
    {
        session()->set('active_menu', 'menu_index');
        $artikelmodel = new ArtikelModel();
        $keyword = $this->request->getVar('keyword');
        $session = session();

        // Periksa apakah ID pengunjung sudah ada dalam session
        if (!$session->has('pengunjungId')) {
            // Jika tidak ada, buat ID pengunjung baru
            $pengunjungId = bin2hex(random_bytes(4));
            // Simpan ID pengunjung dalam session
            $session->set('pengunjungId', $pengunjungId);
        } else {
            // Jika sudah ada, ambil ID pengunjung dari session
            $pengunjungId = $session->get('pengunjungId');
        }
        if ($keyword) {
            # code...
            $artikel = $artikelmodel->search($keyword);
            if ($artikel) {
                # code...
                foreach ($artikel as $a) {
                    $waktuPerubahan = $a['updated_at'];
                    $selisihWaktu = $this->hitungSelisihWaktu($waktuPerubahan);
        
                    $data[] = [
                        'id' => $a['id'],
                        'judul' => $a['judul'],
                        'gambar' => $a['gambar'],
                        'keterangan' => $a['keterangan'],
                        'selisihWaktu' => $selisihWaktu
                    ];
                }
            } else {
                # code...
                $data = [];
            }
        } else {
            # code...
            $artikel = $artikelmodel->findAll();
            $data = [];
    
            foreach ($artikel as $a) {
                $waktuPerubahan = $a['updated_at'];
                $selisihWaktu = $this->hitungSelisihWaktu($waktuPerubahan);
    
                $data[] = [
                    'id' => $a['id'],
                    'judul' => $a['judul'],
                    'gambar' => $a['gambar'],
                    'keterangan' => $a['keterangan'],
                    'selisihWaktu' => $selisihWaktu,
                    
                ];
            }
            $validation = \config\Services::validation();
        }

        return view('index', ['data' => $data, 'validation' => $validation, 'pengunjungId' => $pengunjungId]);
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

    public function sejarah()
    {
        if (isset($_POST['keyword'])) {
            # code...
            $keyword = $_POST['keyword'];
            dd($keyword);
        }
        session()->set('active_menu', 'menu_profil');
        $sejarahmodel = new SejarahModel();
        $sejarah = $sejarahmodel->findAll();
        $data = [
            'sejarah' => $sejarah
        ];
        return view('sejarah', $data);
    }
    public function struktur()
    {
        session()->set('active_menu', 'menu_profil');
        $strukturmodel = new StrukturModel();
        $struktur = $strukturmodel->findAll();
        $data = [
            'struktur' => $struktur
        ];
        return view('struktur', $data);
    }
    public function potensi()
    {
        session()->set('active_menu', 'menu_potensi');
        $potensimodel = new PotensiModel();
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            # code...
            $potensi = $potensimodel->search($keyword);
        } else {
            # code...
            $potensi = $potensimodel->findAll();
        }
        $data = [
            'potensi' => $potensi,
            
        ];
        return view('potensi', $data);
    }

    public function statistik_jenis()
    {
        session()->set('active_menu', 'menu_statistik');
        $statistikmodel = new StatistikModel();
        $jumlahpenduduk = $statistikmodel->countAllResults();
        $query_jenis = $statistikmodel->select('jenis_kelamin, COUNT(*) AS jumlah_jenis ');
        $query_jenis->groupby('jenis_kelamin');
        $jeniskelamin = $query_jenis->get();

        return view('statistik', [
            'jumlah_user' => $jumlahpenduduk,
            'jeniskelamin' => $jeniskelamin,

        ]);
    }
    public function statistik_agama()
    {
        session()->set('active_menu', 'menu_statistik');
        $statistikmodel = new StatistikModel();
        $jumlahpenduduk = $statistikmodel->countAllResults();
        $query_agama = $statistikmodel->select('agama, COUNT(*) AS jumlah_agama ');
        $query_agama->groupby('agama');
        $agama = $query_agama->get();
        return view('statistik', [
            'jumlah_user' => $jumlahpenduduk,
            'agama' => $agama,

        ]);
    }
    public function statistik_pendidikan()
    {
        session()->set('active_menu', 'menu_statistik');
        $statistikmodel = new StatistikModel();
        $jumlahpenduduk = $statistikmodel->countAllResults();
        $query_pendidikan = $statistikmodel->select('pendidikan, COUNT(*) AS jumlah_pendidikan ');
        $query_pendidikan->groupby('pendidikan');
        $pendidikan = $query_pendidikan->get();
        return view('statistik', [
            'jumlah_user' => $jumlahpenduduk,
            'pendidikan' => $pendidikan,

        ]);
    }
    public function statistik_pekerjaan()
    {
        session()->set('active_menu', 'menu_statistik');
        $statistikmodel = new StatistikModel();
        $jumlahpenduduk = $statistikmodel->countAllResults();
        $query_pekerjaan = $statistikmodel->select('jenis_pekerjaan, COUNT(*) AS jumlah_pekerjaan ');
        $query_pekerjaan->groupby('jenis_pekerjaan');
        $pekerjaan = $query_pekerjaan->get();
        return view('statistik', [
            'jumlah_user' => $jumlahpenduduk,
            'pekerjaan' => $pekerjaan

        ]);
    }
    public function anggaran()
    {
        session()->set('active_menu', 'menu_anggaran');
        $PendapatanModel = new PendapatanModel();
        $BelanjaModel = new BelanjaModel();
        $DetailPendapatanModel = new DetailPendapatanModel();

        if (isset($_GET['tahun'])) {
            $tahun = $_GET['tahun'];
            $username = session('username');
            $data['sumber'] = $PendapatanModel->anggaran($tahun)->getResult();
            $data['belanja'] = $BelanjaModel->belanja($tahun)->getResultArray();
            $data['tahun'] = $PendapatanModel->tahun()->getResult();
            $data['tahun_data'] = $tahun;
            foreach ($data['sumber'] as $d) {
                $data['detail'][$d->sumber] = $DetailPendapatanModel->getDetailPendapatan($d->sumber, $tahun);
            }
            $data['username'] = $username;
            // return $this->response->setJSON($data);
            return view('anggaran', $data);
        } else {
            $username = session('username');
            $data['sumber'] = $PendapatanModel->anggaran()->getResult();
            $data['belanja'] = $BelanjaModel->belanja()->getResultArray();
            $data['tahun'] = $PendapatanModel->tahun()->getResult();
            $data['tahun_data'] = date('Y');
            foreach ($data['sumber'] as $d) {
                $data['detail'][$d->sumber] = $DetailPendapatanModel->getDetailPendapatan($d->sumber);
            }
            $data['username'] = $username;
            return view('anggaran', $data);
        }
    }

    public function bumdes()
    {
        session()->set('active_menu', 'menu_bumdes');
        $bumdes = new BumdesModel();
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            # code...
            $data = $bumdes->search($keyword);
        } else {
            # code...
            $data = $bumdes->findAll();
        }
        $data = [
            'data' => $data
        ];
        return view('bumdes', $data);
    }

    public function wajib_lapor()
    {
        session()->set('active_menu', 'menu_index');
        $WajibLapor = new WajibLapor();
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Harus Diisi',
                ]
            ],
            'no_hp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nomor Handphone Harus Diisi',
                ]
            ],
            'jenis_kelamin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis Kelamin Harus Diisi',
                ]
            ],
            'usia' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Usia Harus Diisi',
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat Harus Diisi',
                ]
            ],
            'tgl_datang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Kedatangan Harus Diisi',
                ]
            ],
            'tujuan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tujuan Kedatangan Harus Diisi',
                ]
            ],
            'ktp' => [
                'rules' => 'uploaded[ktp]|is_image[ktp]',
                'errors' => [
                    'uploaded' => 'Harus Melampirkan Foto KTP',
                    'is_image' => 'Yang Anda Pilih Bukan Foto',
                ]
            ],
        ])) {
            
            return redirect()->to('/')->withInput();
        } else {
            //ambil file ktp
            $ktp = $this->request->getFile('ktp');
            //generate nama file random
            $namafile = $ktp->getRandomName();
            //pindahkan file
            $ktp->move('img/wajiblapor', $namafile);

            $WajibLapor->save([
                'nama' => $this->request->getPost('nama'),
                'no_hp' => $this->request->getPost('no_hp'),
                'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                'usia' => $this->request->getPost('usia'),
                'alamat' => $this->request->getPost('alamat'),
                'tgl_datang' => $this->request->getPost('tgl_datang'),
                'tujuan' => $this->request->getPost('tujuan'),
                'ktp' => $namafile,
            ]);
            session()->setFlashdata('pesan','Berhasil Disimpan');
            return redirect()->to('/');
            
        }
    }
}
