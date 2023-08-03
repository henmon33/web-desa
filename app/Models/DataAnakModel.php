<?php

namespace App\Models;

use CodeIgniter\Model;

class DataAnakModel extends Model
{
    protected $table      = 'tb_anak';
    protected $allowedFields = ['nama','tgl_lahir','jenis_kelamin','nik_ayah','nik_ibu'];
    
    public function data_anak()
    {
       
        $builder= $this->db->table('tb_anak')
                ->select('tb_anak.id,tb_anak.nama,tb_anak.jenis_kelamin,tb_anak.tgl_lahir, ayah.nama as nama_ayah,ayah.tempat_lahir as tempat_lahir_ayah,ayah.tgl_lahir as tgl_lahir_ayah, ibu.nama as nama_ibu,ibu.tempat_lahir as tempat_lahir_ibu,ibu.tgl_lahir as tgl_lahir_ibu,tb_anak.nik_ayah,tb_anak.nik_ibu')
                ->join('tb_penduduk as ayah', 'tb_anak.nik_ayah = ayah.nik', 'inner')
                ->join('tb_penduduk as ibu', 'tb_anak.nik_ibu = ibu.nik', 'inner');
        $query = $builder->get();
        return $query->getResult();
    }
}