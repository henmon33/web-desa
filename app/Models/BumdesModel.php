<?php

namespace App\Models;

use CodeIgniter\Model;

class BumdesModel extends Model
{
    protected $table = 'tb_bumdes';
    protected $allowedFields = ['id_kelola','nama_usaha','gambar', 'alamat', 'kontak','deskripsi','stok'];

    public function search($keyword)
    {
        return $this->like('nama_usaha', $keyword)->find();
    }
    public function kelola_usaha()
    {
        return $this->join('tb_users', 'tb_users.id = tb_bumdes.id_kelola')->where('tb_users.role_id', '4')
        ->get()
        ->getResultArray();
        // $query = $this->join('tb_users', 'tb_users.id = tb_bumdes.id_kelola')->where('tb_users.role_id', '4')->select('tb_users.id')->distinct()->findAll();
        // return $query;
    }
    public function hapus_usaha($id)
    {
        $query = $this->where('id_kelola', $id)->get();
        if (!is_array($query)) {
            $this->where('id_kelola', $id)->delete();
        } else {
            $this->whereIn('id_kelola', $id)->delete();
        }
    }
    public function data_bumdes()
    {
        $query = $this->join('tb_users', 'tb_users.id = tb_bumdes.id_kelola')->get()->getResultArray();
        return $query;
    }
}
