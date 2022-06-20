<?php

namespace App\Models;

use CodeIgniter\Model;

class NewsModel extends Model
{
    protected $table = "kegiatan";
    protected $useTimestamps = true;
    protected $allowedFields = ["tanggal", "nama", "gambar", "keterangan", "review"];


    public function getNews($id = false)
    {
        if ($id != false) {
            return $this->where(['id' => $id])->first();
        }
        return $this->orderBy('tanggal', 'DESC')->findAll();
    }
}
