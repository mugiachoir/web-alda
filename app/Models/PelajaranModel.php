<?php

namespace App\Models;

use CodeIgniter\Model;

class PelajaranModel extends Model
{
    protected $table = "pelajaran";
    protected $allowedFields = ["nama", "link"];


    public function getPelajaran()
    {
        return $this->orderBy('nama', 'ASC')->findAll();
    }
    public function search($keyword)
    {
        return $this->like('nama', $keyword)->orLike('link', $keyword)->findAll();
    }
}
