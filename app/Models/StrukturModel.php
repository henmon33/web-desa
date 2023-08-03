<?php

namespace App\Models;

use CodeIgniter\Model;

class StrukturModel extends Model
{
    protected $table      = 'tb_struktur';
    protected $allowedFields = ['nama', 'jabatan', 'gambar'];

    public function nama($jabatan)
    {
        return $this->select('nama')->where([
            'jabatan' => $jabatan
        ])->first();
    }
}
