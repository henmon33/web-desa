<?php

namespace App\Controllers;

use App\Models\PendapatanModel;
use App\Models\DetailPendapatanModel;
use App\Models\BelanjaModel;

class anggaran extends BaseController
{

    public function __construct()
    {
        $this->PendapatanModel = new PendapatanModel();
        $this->DetailPendapatanModel = new DetailPendapatanModel();
        $this->BelanjaModel = new BelanjaModel();
    }
    public function index()
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
            return view('layanan/anggaran/index', $data);
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
            return view('layanan/anggaran/index', $data);
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
        return view('layanan/anggaran/tambah_anggaran', $data);
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
        return view('layanan/anggaran/ubah_anggaran', $data);
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
            return redirect()->to('/anggaran/index');
        } else {
            session()->setFlashdata('pesan', 'Laporan Anggaran Gagal Diubah');
            return redirect()->to('/anggaran/ubah_anggaran/'.$tahun_data);
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

}
