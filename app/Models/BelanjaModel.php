<?php

namespace App\Models;

use CodeIgniter\Model;

class BelanjaModel extends Model
{
    protected $table      = 'tb_belanja_desa';
    // protected $useTimestamps = true;
    protected $allowedFields = ['anggaran', 'realisasi', 'selisih', 'tahun', 'tujuan'];

    public function belanja($tahun = false)
    {
        //$data = $this->db->query("SELECT sumber FROM tb_pendapatan");
        if ($tahun == false) {
            $t = date('Y');
            $data = $this->db->table('tb_belanja_desa')
                ->where('tahun',$t)
                ->get();
            return $data;
        } else {
            $data = $this->db->table('tb_belanja_desa')
            ->where('tahun',$tahun)
            ->get();
            return $data;
        }
        
    }
}
