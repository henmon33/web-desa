<?php

namespace App\Models;

use CodeIgniter\Model;

class PotensiModel extends Model
{
    protected $table = 'tb_potensi';
    protected $allowedFields = ['judul', 'deskripsi', 'gambar'];
    
    public function search($keyword)
    {
        return $this->like('judul', $keyword)->find();
    }
}