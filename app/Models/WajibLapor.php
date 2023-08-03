<?php

namespace App\Models;

use CodeIgniter\Model;

class WajibLapor extends Model
{
    protected $table      = 'tb_wajib_lapor';
    protected $useTimestamps = false;
    protected $allowedFields = ['nama', 'no_hp', 'jenis_kelamin', 'usia','alamat','tgl_datang','tujuan','ktp','status'];

}
