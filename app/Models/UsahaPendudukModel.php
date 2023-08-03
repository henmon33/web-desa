<?php

namespace App\Models;

use CodeIgniter\Model;

class UsahaPendudukModel extends Model
{
    protected $table      = 'tb_usaha';
    protected $allowedFields = ['id', 'nik', 'nama', 'jenis_usaha'];
    public function data_usaha($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where([
            'id' => $id
        ])->first();
    }
    public function cetak_usaha($id)
    {

        return $this->where([
            'nik' => $id
        ])->first();
    }
}
