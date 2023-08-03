<?php

namespace App\Controllers;

use App\Models\LoginModel;
use App\Models\BumdesModel;

class bumdes extends BaseController
{

    public function __construct()
    {
        $this->DataUser = new LoginModel();
        $this->BumdesModel = new BumdesModel();
        $this->input = \Config\Services::request();
    }
    public function index()
    {

        // $data_penduduk = $this->DataPendudukModel->findAll();
        $username = session('username');
        $data = [
            'username' => $username,
        ];
        return view('layanan/bumdes/index', $data);
    }
    public function bumdes()
    {
        $username = session('username');
        $id_kelola = session('id_kelola');
        session();
        $bumdes = $this->BumdesModel->where('id_kelola',$id_kelola)->findAll();
        $data = [
            'username' => $username,
            'bumdes' => $bumdes,
            'validation' => \config\Services::validation(),
            
        ];
        return view('layanan/bumdes/beranda_bumdes', $data);
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
        return view('layanan/bumdes/ubah_bumdes', $data);
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
        $id_kelola = session('id_kelola');
        $data = [
            'username' => $username,
            'id_kelola' => $id_kelola,
            'validation' => \config\Services::validation(),
            
        ];
        return view('layanan/bumdes/tambah_bumdes',$data);
    }

    public function proses_tambah_bumdes()
    {
        $file_gambar = $this->request->getFile('gambar');
        $file_nama_gambar = $file_gambar->getRandomName();
        $data = [
            'id_kelola' => $this->request->getPost('id_kelola'),
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
            return redirect()->to('/bumdes/bumdes');
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

}
