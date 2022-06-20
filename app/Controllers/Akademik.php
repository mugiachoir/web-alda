<?php

namespace App\Controllers;

use App\Models\PelajaranModel;
use App\Models\MateriModel;

class Akademik extends BaseController
{
    protected $pelajaranModel;
    protected $materiModel;
    protected $db;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->pelajaranModel = new PelajaranModel();
        $this->materiModel = new MateriModel();
    }
    public function index()
    {
        $keyword = filter_var($this->request->getVar('keyword'), FILTER_SANITIZE_STRING);
        if ($keyword != null) {
            $daftar = $this->pelajaranModel->search($keyword);
        } else {
            $daftar = $this->pelajaranModel->getPelajaran();
        }
        $x = 0;
        foreach ($daftar as $pelajaran) {
            $banyak[$x] = $this->db->table('materi')->where(['slug' => $pelajaran['slug']])->countAllResults();
            $x++;
        }

        if (count($daftar) === 0) {
            $banyak = 0;
        }

        $data = [
            "title" => "Daftar Pelajaran | MTs Al-Hidayah",
            "ppdb" => "",
            "akademik" => "active",
            "galeri" => "",
            "about" => "",
            "kontak" => "",
            "daftar" => $daftar,
            "banyak" => $banyak,
            "login" => ""
        ];

        return view("akademik/index", $data);
    }

    public function detail($slug)
    {
        $keyword = filter_var($this->request->getVar('keyword'), FILTER_SANITIZE_STRING);
        if ($keyword != null) {
            $daftar = $this->materiModel->search($keyword, $slug);
        } else {
            $daftar = $this->materiModel->getMateri($slug);
        }
        $data = [
            "title" => "Daftar Materi | MTs Al-Hidayah",
            "ppdb" => "",
            "akademik" => "active",
            "galeri" => "",
            "about" => "",
            "kontak" => "",
            "daftar" => $daftar,
            "login" => ""
        ];

        return view("akademik/detail", $data);
    }
}