<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = "user";
    protected $primaryKey = "user_id";
    protected $useTimestamps = true;
    protected $allowedFields = ["nama", "username", "password", "role", "is_activated", "nip", "created_by"];


    public function getUser($id = false)
    {
        if ($id != false) {
            return $this->where(['user_id' => $id])->first();
        }
        return $this->orderBy('role', 'DESC')->findAll();
    }
    public function search($keyword)
    {
        return $this->like('nama', $keyword)->orLike('nip', $keyword)->orderBy('role', 'DESC')->findAll();
    }
    public function getFirst()
    {
        return $this->orderBy('user_id', 'DESC')->first();
    }
}