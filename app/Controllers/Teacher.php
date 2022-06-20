<?php

namespace App\Controllers;

use App\Models\TeacherModel;
use App\Models\PelajaranModel;

class Teacher extends BaseController
{
    protected $db;
    protected $teacherModel;
    protected $pelajaranModel;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->teacherModel = new TeacherModel();
        $this->pelajaranModel = new PelajaranModel();
    }
    public function index()
    {
        // AUTHENTICATION
        if (($this->session->get('login') !== true) || ($this->session->get('role') !== 'guru')) {
            return redirect()->to('/login/index');
        }

        $builder = $this->db->table('user');
        $user = $builder->getWhere(['nip' => $this->session->get('nip')])->getRowArray();
        $keyword = filter_var($this->request->getVar('keyword'), FILTER_SANITIZE_STRING);
        if ($keyword != null) {
            $daftar = $this->teacherModel->search($keyword, $user['user_id']);
        } else {
            $daftar = $this->teacherModel->getMateri($user['user_id']);
        }
        $data = [
            "title" => "Dashboard Guru | MTs Al-Hidayah",
            "daftar" => $daftar,
            "user" => $user
        ];
        return view("teacher/index", $data);
    }

    public function create()
    {
        // AUTHENTICATION
        if (($this->session->get('login') !== true) || ($this->session->get('role') !== 'guru')) {
            return redirect()->to('/login/index');
        }

        $builder = $this->db->table('user');
        $user = $builder->getWhere(['nip' => $this->session->get('nip')])->getRowArray();
        $kelas = ['VII', 'VIII', 'IX'];
        $data = [
            "title" => "Upload Materi | MTs Al-Hidayah",
            "user" => $user,
            "kelas" => $kelas,
            "pelajaran" => $this->pelajaranModel->getPelajaran(),
            "validation" => \Config\Services::validation()
        ];


        return view("teacher/create", $data);
    }
    public function save()
    {
        // VALIDASI INPUT
        if (!$this->validate([
            'judul' => [
                'rules' => 'required|is_unique[materi.judul]',
                'errors' => [
                    'required' => "{field} materi tidak boleh kosong",
                    'is_unique' => "{field} materi sudah ada"
                ]
            ],
            'keterangan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "{field} tidak boleh kosong",
                ]
            ],

            'materi' => [
                'rules' => 'uploaded[materi]|max_size[materi,2024]|ext_in[materi,doc,docx,ppt,pptx,pdf,xls,xlsx]',
                'errors' => [
                    'uploaded' => "Harus ada {field} yang di upload",
                    'max_size' => "Ukuran file terlalu besar",
                    'ext_in' => "Format file tidak sesuai ketentuan"
                ]
            ]
        ])) {
            session()->setFlashdata('pesan', "<div class='alert warning'>Data gagal ditambahkan</div>");
            return redirect()->to('/teacher/create')->withInput();
        }

        // Ambil file
        $fileMateri = $this->request->getFile('materi');

        // Generate nama baru
        $namaMateri = explode('.', $fileMateri->getName());
        $namaMateri = $namaMateri[0] . "-" . $fileMateri->getRandomName();
        // Pindahkan lokasi file
        $fileMateri->move('file/materi/', $namaMateri);

        $judul = filter_var($this->request->getVar('judul'), FILTER_SANITIZE_STRING);

        $slug = url_title($this->request->getVar('pelajaran'), '-', true);
        $guru = $this->request->getVar('guru');

        $this->teacherModel->save([
            "judul" => $judul,
            "kelas" => $this->request->getVar('kelas'),
            "keterangan" => $this->request->getVar('keterangan'),
            "link" => $namaMateri,
            "user_id" => $guru,
            "slug" => $slug,
        ]);

        session()->setFlashdata('pesan', "<div class='alert success container'>Data berhasil ditambahkan</div>");
        return redirect()->to('/teacher');
    }

    public function delete($id)
    {
        // Cari namaFile
        $materi = $this->teacherModel->find($id);
        unlink("file/materi/$materi[link]");

        session()->setFlashdata('pesan', "<div class='alert success container'>Data berhasil dihapus</div>");
        $this->teacherModel->delete($id);
        return redirect()->to("/teacher");
    }
    public function edit($id)
    {

        // AUTHENTICATION
        if (($this->session->get('login') !== true) || ($this->session->get('role') !== 'guru')) {
            return redirect()->to('/login/index');
        }

        $builder = $this->db->table('user');
        $user = $builder->getWhere(['nip' => $this->session->get('nip')])->getRowArray();
        $kelas = ['VII', 'VIII', 'IX'];
        $data = [
            "title" => "Upload Materi | MTs Al-Hidayah",
            "user" => $user,
            "kelas" => $kelas,
            "pelajaran" => $this->pelajaranModel->getPelajaran(),
            "validation" => \Config\Services::validation(),
            "materi" => $this->teacherModel->getDetail($id, $user['user_id'])
        ];


        return view("teacher/edit", $data);
    }
    public function update()
    {
        $materiLama = $this->teacherModel->getDetail($this->request->getVar('id'), $this->request->getVar('guru'));
        if ($materiLama["judul"] === $this->request->getVar('judul')) {
            $rulesJudul = "required";
        } else {
            $rulesJudul = "required|is_unique[materi.judul]";
        }

        // VALIDASI INPUT
        if (!$this->validate([
            'judul' => [
                'rules' => $rulesJudul,
                'errors' => [
                    'required' => "{field} materi tidak boleh kosong",
                    'is_unique' => "{field} materi sudah ada"
                ]
            ],
            'keterangan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "{field} tidak boleh kosong",
                ]
            ],

            'materi' => [
                'rules' => 'max_size[materi,2024]|ext_in[materi,doc,docx,ppt,pptx,pdf,xls,xlsx]',
                'errors' => [
                    'max_size' => "Ukuran file terlalu besar",
                    'ext_in' => "Format file tidak sesuai ketentuan"
                ]
            ]
        ])) {
            session()->setFlashdata('pesan', "<div class='alert warning'>Data gagal ditambahkan</div>");
            return redirect()->to('/teacher/edit/' . $this->request->getVar('id'))->withInput();
        }

        // Ambil file
        $fileMateri = $this->request->getFile('materi');
        // Cek perubahan pada gambar
        if ($fileMateri->getError() === 4) {
            $namaMateri = $this->request->getVar('fileLama');
        } else {
            // Generate nama baru
            $namaMateri = explode('.', $fileMateri->getName());
            $namaMateri = $namaMateri[0] . "-" . $fileMateri->getRandomName();
            // Pindahkan lokasi file
            $fileMateri->move('file/materi/', $namaMateri);
            // hapus sampul lama
            unlink("file/materi/" . $this->request->getVar('fileLama'));
        }

        $judul = filter_var($this->request->getVar('judul'), FILTER_SANITIZE_STRING);
        $slug = url_title($this->request->getVar('pelajaran'), '-', true);
        $guru = $this->request->getVar('guru');
        $this->teacherModel->save([
            "materi_id" => $this->request->getVar('id'),
            "judul" => $judul,
            "kelas" => $this->request->getVar('kelas'),
            "keterangan" => $this->request->getVar('keterangan'),
            "link" => $namaMateri,
            "user_id" => $guru,
            "slug" => $slug,
        ]);

        session()->setFlashdata('pesan', "<div class='alert success container'>Data berhasil diubah</div>");
        return redirect()->to('/teacher');
    }
}