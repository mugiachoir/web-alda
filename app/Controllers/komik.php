<?php

namespace App\Controllers;

use App\Models\KomikModel;

class Komik extends BaseController
{
    protected $komikModel;
    public function __construct()
    {
        $this->komikModel = new KomikModel();
    }
    public function index()
    {
        // CARA MANUAL KONEK KE DATABASE (BAD PRACTICE)
        // $db = \Config\Database::connect();
        // $komik = $db->query('SELECT * FROM komik');
        // foreach ($komik->getResultArray() as $row) {
        //     d($row);
        // }

        $data = [
            "title" => "Komik | Mugia's Web",
            "homeLink" => "",
            "aboutLink" => "",
            "contactLink" => "",
            "komikLink" => "active",
            "komik" => $this->komikModel->getKomik()
        ];
        return view("komik/index", $data);
    }

    public function detail($slug)
    {
        $data = [
            "title" => "Detail Komik | Mugia's Web",
            "homeLink" => "",
            "aboutLink" => "",
            "contactLink" => "",
            "komikLink" => "active",
            "komik" => $this->komikModel->getKomik($slug)
        ];
        if (empty($data['komik'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Page tidak ditemukan");
        }
        return view("komik/detail", $data);
    }
    public function create()
    {
        $data = [
            "title" => "Tambah Data Komik | Mugia's Web",
            "homeLink" => "",
            "aboutLink" => "",
            "contactLink" => "",
            "komikLink" => "active",
            "validation" => \Config\Services::validation()
        ];
        return view("komik/create", $data);
    }

    public function save()
    {
        // VALIDASI INPUT
        if (!$this->validate([
            'judul' => [
                'rules' => 'required|is_unique[komik.judul]',
                'errors' => [
                    'required' => "{field} komik tidak boleh kosong",
                    'is_unique' => "{field} komik sudah terdaftar"
                ]
            ],
            'sampul' => [
                'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => "Ukuran terlalu besar",
                    'is_image' => "Yang anda pilih bukan gambar",
                    'mime_in' => "Yang anda pilih bukan gambar"
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            return redirect()->to('/komik/create')->withInput();
        }

        // Ambil file
        $fileSampul = $this->request->getFile('sampul');
        // Cek apakah user mengupload sampul
        if ($fileSampul->getError() == 4) {
            $namaSampul = 'kuro.jpg';
        } else {
            // Generate nama baru
            $namaSampul = $fileSampul->getRandomName();
            // Pindahkan lokasi file
            $fileSampul->move('img', $namaSampul);
        }

        $slug = url_title($this->request->getVar('judul'), '-', true);
        $judul = filter_var($this->request->getVar('judul'), FILTER_SANITIZE_STRING);
        $this->komikModel->save([
            "judul" => $judul,
            "slug" => $slug,
            "penulis" => $this->request->getVar('penulis'),
            "penerbit" => $this->request->getVar('penerbit'),
            "sampul" => $namaSampul
        ]);

        session()->setFlashdata('pesan', "Data berhasil ditambahkan");
        return redirect()->to('/komik');
    }

    public function delete($id)
    {
        // Cari namaFile
        $komik = $this->komikModel->find($id);
        if ($komik['sampul'] !== "kuro.jpg") {
            // Hapus file
            unlink("img/$komik[sampul]");
        }

        session()->setFlashdata('pesan', "Data berhasil dihapus");
        $this->komikModel->delete($id);
        return redirect()->to("/komik");
    }

    public function edit($slug)
    {
        $data = [
            "title" => "Ubah Data Komik | Mugia's Web",
            "homeLink" => "",
            "aboutLink" => "",
            "contactLink" => "",
            "komikLink" => "active",
            "validation" => \Config\Services::validation(),
            "komik" => $this->komikModel->getKomik($slug)
        ];
        return view("komik/edit", $data);
    }

    public function update($id)
    {

        $komikLama = $this->komikModel->getKomik($this->request->getVar('slug'));
        if ($komikLama["judul"] === $this->request->getVar('judul')) {
            $rulesJudul = "required";
        } else {
            $rulesJudul = "required|is_unique[komik.judul]";
        }
        // VALIDASI INPUT
        if (!$this->validate([
            'judul' => [
                'rules' => $rulesJudul,
                'errors' => [
                    'required' => "{field} komik tidak boleh kosong",
                    'is_unique' => "{field} komik sudah terdaftar"
                ]
            ],
            'sampul' => [
                'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => "Ukuran terlalu besar",
                    'is_image' => "Yang anda pilih bukan gambar",
                    'mime_in' => "Yang anda pilih bukan gambar"
                ]
            ]
        ])) {
            return redirect()->to('/komik/edit/' . $this->request->getVar('slug'))->withInput();
        }

        $fileSampul = $this->request->getFile('sampul');
        // Cek perubahan pada gambar
        if ($fileSampul->getError() === 4) {
            $namaSampul = $this->request->getVar('fileLama');
        } else {
            $namaSampul = $fileSampul->getRandomName();
            $fileSampul->move('img', $namaSampul);
            // hapus sampul lama
            unlink("img/" . $this->request->getVar('fileLama'));
        }

        $slug = url_title($this->request->getVar('judul'), '-', true);
        $judul = filter_var($this->request->getVar('judul'), FILTER_SANITIZE_STRING);
        $this->komikModel->save([
            "id" => $id,
            "judul" => $judul,
            "slug" => $slug,
            "penulis" => $this->request->getVar('penulis'),
            "penerbit" => $this->request->getVar('penerbit'),
            "sampul" => $namaSampul
        ]);

        session()->setFlashdata('pesan', "Data berhasil diubah");
        return redirect()->to('/komik');
    }
}
