<?php

namespace App\Models;

use CodeIgniter\Model;

class ArtikelModel extends Model
{
    protected $table      = 'tb_artikel';
    protected $useTimestamps = true;
    protected $allowedFields = ['judul', 'keterangan', 'gambar', 'created_at', 'updated_at'];

    public function search($keyword)
    {
        return $this->like('judul', $keyword)->find();
    }
}
