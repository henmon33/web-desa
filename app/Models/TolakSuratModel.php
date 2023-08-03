<?php

namespace App\Models;

use CodeIgniter\Model;

class TolakSuratModel extends Model
{
    protected $table = 'tb_tolak_surat';
    protected $useTimestamps = true;
    protected $allowedFields = ['id', 'nik', 'alasan', 'created_at', 'updated_at'];
}
