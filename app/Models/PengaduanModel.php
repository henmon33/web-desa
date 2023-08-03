<?php

namespace App\Models;

use CodeIgniter\Model;

class PengaduanModel extends Model
{
    protected $table = 'tb_aduan';
    protected $useTimestamps = true;
    protected $allowedFields = ['id', 'nik', 'aduan', 'tanggapan', 'gambar', 'role_id', 'status'];

    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    public function data_pengaduan_masuk($id = false)
    {
        if ($id == false) {
            $query = $this->db->table('tb_aduan')
                ->where('status', "diproses")
                ->get();
        } else {
            $query = $this->db->table('tb_aduan')
                ->where('status', "diproses")
                ->where('id', $id)
                ->get();
        }
        return $query;
    }
    public function data_pengaduan_selesai()
    {
        $query =  $this->db->table('tb_aduan')
            ->where('tb_aduan.status', 'selesai')
            ->get();
        return $query;
    }
    public function data_pengaduan_masyarakat($nik)
    {
        $query = $this->db->table('tb_aduan')
            ->where('tb_aduan.nik', $nik)
            ->get();
        return $query;
    }
    //     return $this->where([
    //         'id' => $id
    //     ])->first();
    // }


}
