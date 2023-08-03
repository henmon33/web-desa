<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailPendapatanModel extends Model
{
    protected $table = 'tb_detail_pendapatan';
    protected $allowedFields = ['detail_sumber','sumber', 'detail_anggaran', 'detail_realisasi', 'detail_selisih', 'tahun'];
    public function getDetailPendapatan($sumber, $tahun = false)
    {
        if ($tahun == false) {
            $t = date('Y');
            return $this->where('sumber', $sumber)
                        ->where('tahun', $t)
                        ->findAll();
        } else {
            return $this->where('sumber', $sumber)
                        ->where('tahun', $tahun)
                        ->findAll();
        }
    }
    public function getDetail($tahun)
    {
            return $this->where('tahun', $tahun)
                        ->findAll();
        
    }
}
