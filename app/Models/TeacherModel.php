<?php

namespace App\Models;

use CodeIgniter\Model;

class TeacherModel extends Model
{
    protected $table = "materi";
    protected $primaryKey = "materi_id";
    protected $useTimestamps = true;
    protected $allowedFields = ["judul", "user_id", "kelas", "keterangan", "link", "slug"];


    public function getMateri($guru)
    {
        // return $this->where(['guru' => $guru])->orderBy('updated_at', 'DESC')->findAll();
        return $this->join('user', 'user.user_id=materi.user_id')->where(['user.user_id' => $guru])->orderBy('materi.updated_at', 'DESC')->findAll();
    }
    public function search($keyword, $id)
    {
        return $this->like('judul', $keyword)->orLike('kelas', $keyword)->having('user_id', $id)->orderBy('updated_at', 'DESC')->findAll();
    }
    public function getDetail($id, $idGuru)
    {
        return $this->where(['materi_id' => $id])->having('user_id', $idGuru)->first();
    }
}