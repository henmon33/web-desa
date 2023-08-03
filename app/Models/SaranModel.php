<?php

namespace App\Models;

use CodeIgniter\Model;

class SaranModel extends Model
{
    protected $table = 'tb_saran';
    protected $useTimestamps = true;
    protected $allowedFields = ['id', 'nik', 'saran', 'created_at'];


    public function data_saran_masyarakat($nik)
    {
        $query = $this->db->table('tb_saran')
            ->where('tb_saran.nik', $nik)
            ->get();
        return $query;
    }
}
