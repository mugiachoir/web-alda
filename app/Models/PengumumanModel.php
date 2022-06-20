<?php

namespace App\Models;

use CodeIgniter\Model;

class PengumumanModel extends Model
{
    protected $table = "pengumuman";
    protected $useTimestamps = true;
    protected $allowedFields = ["tanggal", "isi", "pembuat", "judul", "file"];


    public function getPengumuman($id = false)
    {
        if ($id != false) {
            return $this->where(['id' => $id])->first();
        }
        return $this->orderBy('updated_at', 'DESC')->findAll();
    }
}
