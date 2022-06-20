<?php

namespace App\Models;

use CodeIgniter\Model;

class PendaftarModel extends Model
{
    protected $table = "pendaftar";
    protected $useTimestamps = true;
    protected $allowedFields = ["nisn", "nik", "nama_siswa", "tempat_lahir", "tanggal_lahir", "kelamin", "sekolah_asal", "jenis_asal", "status_asal", "kabupaten_asal", "nomor_ujian", "alamat", "provinsi", "kabupaten", "kecamatan", "desa", "pos", "nama_wali", "alamat_wali", "hp_wali", "pilihan_2", "nama_guru", "wa_guru", "email", "kelulusan"];


    public function getPendaftar($id = false)
    {
        if ($id != false) {
            return $this->where(['id' => $id])->first();
        }
        return $this->orderBy('id', 'ASC')->findAll();
    }
    public function search($keyword)
    {
        return $this->like('nama_siswa', $keyword)->orLike('sekolah_asal', $keyword)->orderBy('id', 'ASC')->findAll();
    }
    public function getFirst()
    {
        return $this->orderBy('id', 'DESC')->first();
    }
}
