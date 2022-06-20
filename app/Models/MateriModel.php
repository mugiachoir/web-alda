<?php

namespace App\Models;

use CodeIgniter\Model;

class MateriModel extends Model
{
    protected $table = "materi";
    protected $useTimestamps = true;
    protected $allowedFields = ["judul", "user_id", "kelas", "keterangan", "link", "slug"];


    public function getMateri($slug)
    {
        return $this->where(['slug' => $slug])->join('user', 'user.user_id=materi.user_id')->orderBy('materi.updated_at', 'DESC')->findAll();
    }
    public function search($keyword, $slug)
    {
        return $this->like('judul', $keyword)->orLike('guru', $keyword)->orLike('kelas', $keyword)->having('slug', $slug)->orderBy('updated_at', 'DESC')->findAll();
    }
}
// orderBy('updated_at', 'DESC')->findAll();