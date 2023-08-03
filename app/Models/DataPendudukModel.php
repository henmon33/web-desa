<?php

namespace App\Models;

use CodeIgniter\Model;

class DataPendudukModel extends Model
{
    protected $table      = 'tb_penduduk';
    protected $allowedFields = ['nik','nkk', 'nama', 'jenis_kelamin', 'tempat_lahir', 'tgl_lahir', 'agama', 'pendidikan', 'jenis_pekerjaan', 'status_perkawinan', 'status_dalam_keluarga', 'kewarganegaraan', 'no_paspor', 'no_kitas', 'nama_ayah', 'nama_ibu', 'rt', 'rw', 'desa', 'kecamatan', 'kabupaten', 'provinsi', 'kode_pos'];
    public function data_penduduk($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where([
            'id' => $id
        ])->first();
    }
    public function profile($username)
    {
        return $this->where([
            'nik' => $username
        ])->first();
    }
}
