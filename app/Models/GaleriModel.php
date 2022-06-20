<?php

namespace App\Models;

use CodeIgniter\Model;

class GaleriModel extends Model
{
    protected $table = "galeri";
    protected $useTimestamps = true;
    protected $allowedFields = ["nama", "link", "gambar"];


    public function getGaleri($id = false)
    {
        if ($id != false) {
            return $this->where(['id' => $id])->first();
        }
        return $this->orderBy('updated_at', 'DESC')->findAll();
    }
    public function search($keyword)
    {
        return $this->like('nama', $keyword)->orderBy('updated_at', 'DESC')->findAll();
    }
}