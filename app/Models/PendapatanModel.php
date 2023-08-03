<?php

namespace App\Models;

use CodeIgniter\Model;

class PendapatanModel extends Model
{
    protected $table = 'tb_pendapatan';
    protected $allowedFields = ['tahun','sumber', 'jenis'];

    public function anggaran($tahun = false)
    {
        //$data = $this->db->query("SELECT sumber FROM tb_pendapatan");
        if ($tahun == false) {
            $t = date('Y');
            $data = $this->db->table('tb_pendapatan')
                ->where('tahun',$t)
                ->get();
            return $data;
        } else {
            $data = $this->db->table('tb_pendapatan')
            ->where('tahun',$tahun)
            ->get();
            return $data;
        }
        
    }
    public function tahun()
    {
        $query1 = $this->db->table('tb_pendapatan')
                ->select('DISTINCT (tahun)');
        $query2 = $this->db->table('tb_belanja_desa')
                ->select('DISTINCT (tahun)');
        $gabung = $query1->union($query2);
                
        // Gabungkan hasil query dengan pengurutan
        $subquery = $this->db->table('(' . $gabung->getCompiledSelect() . ') AS union_result');
        $query = $subquery->orderBy('tahun', 'asc')->get();
        return $query;
    }
}
