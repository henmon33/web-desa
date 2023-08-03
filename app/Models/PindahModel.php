<?php

namespace App\Models;

use CodeIgniter\Model;

class PindahModel extends Model
{
    protected $table      = 'tb_pindah_tempat';
    protected $allowedFields = ['id_surat','nik','nama'];
    
    public function getdatadetail($id)
    {
        return $this->where(['id_surat' => $id])->find();
    }
    
}