<?php

namespace App\Models;

use CodeIgniter\Model;

class AdministrasiModel extends Model
{
    protected $table = 'tb_buat_surat';
    protected $useTimestamps = true;
    protected $allowedFields = ['id', 'nik', 'jenis_surat', 'keperluan', 'status','dokumen_ktp','dokumen_kk','dokumen_akta_kelahiran','dokumen_akta_nikah','dokumen_surat_rt','dokumen_surat_keterangan_dokter','dokumen_ktp_yang_meninggal','dokumen_kematian_rs','dokumen_ktp_pasangan','dokumen_foto_barang_hilang','nama_barang','nik_ayah','nama_ayah','tempat_lahir_ayah','tgl_lahir_ayah','alamat_ayah','nik_ibu','nama_ibu','tempat_lahir_ibu','tgl_lahir_ibu','alamat_ibu','nama_anak','tempat_lahir_anak','tgl_lahir_anak','lokasi_lahir','alamat_anak','tenaga_kesehatan','alamat_pindah','alasan_pindah','nik_meninggal','tgl_meninggal','jam_meninggal','tempat_meninggal','sebab_meninggal','nama_nakes','nik_nakes','data_lahir_nakes','pekerjaan_nakes','alamat_nakes' ,'created_at', 'updated_at'];

    public function data_pengurusan_surat($id = false)
    {
        if ($id == false) {
            return $this->orderBy('updated_at', 'ASC')->findAll();
        }
        return $this->where([
            'nik' => $id
        ])->find();
    }
    public function rincian_surat($id)
    {
        return $this->where([
            'id' => $id
        ])->find();
    }
    public function data_surat_diajukan($status)
    {

        return $this->where([
            'status' => $status
        ])->orderBy('updated_at', 'DESC')->find();
    }
    public function data_join($id, $jenis_surat)
    {
        if ($jenis_surat == 'surat kelahiran') {
            $data = $this->where('tb_buat_surat.id', $id)->first();
            return $data;
        } else {
            $data = $this->where('tb_buat_surat.id', $id)
            ->join('tb_penduduk', 'tb_penduduk.nik = tb_buat_surat.nik')->first();
            return $data;
        }
    }
    public function hapus_surat_selesai()
    {
        $waktu_hapus = date('Y-m-d H:i:s', strtotime('-1 minute'));
        $this->where('status', 'selesai')->where('updated_at <', $waktu_hapus)->delete();
    }
}
