<?php

namespace App\Models;

use CodeIgniter\Model;

class TanggapanModel extends Model
{
    protected $table = 'tb_tanggapan';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_aduan', 'tanggapan', 'created_at', 'updated_at'];

    // public function data_seluruh_pengaduan($id = false)
    // {
    //     if ($id == false) {
    //         return $this->findAll();
    //     }
    //     return $this->where([
    //         'id' => $id
    //     ])->first();
    // }
}
