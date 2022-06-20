<?php

namespace App\Controllers;

use App\Models\TeacherModel;
use App\Models\PelajaranModel;
use App\Models\UserModel;
use App\Models\PengumumanModel;
use App\Models\NewsModel;
use App\Models\GaleriModel;
use App\Models\PendaftarModel;

class Admin extends BaseController
{
    protected $db;
    protected $teacherModel;
    protected $pelajaranModel;
    protected $userModel;
    protected $pengumumanModel;
    protected $newsModel;
    protected $galeriModel;
    protected $pendaftarModel;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->teacherModel = new TeacherModel();
        $this->pelajaranModel = new PelajaranModel();
        $this->userModel = new UserModel();
        $this->pengumumanModel = new PengumumanModel();
        $this->newsModel = new NewsModel();
        $this->galeriModel = new GaleriModel();
    }
    public function index()
    {
        // AUTHENTICATION
        if (($this->session->get('login') !== true) || ($this->session->get('role') !== 'master')) {
            return redirect()->to('/login/index');
        }
        $builder = $this->db->table('user');
        $user = $builder->getWhere(['nip' => $this->session->get('nip')])->getRowArray();
        $data = [
            "title" => "Dashboard Admin | MTs Al-Hidayah",
            "user" => '',
            "pendaftar" => '',
            "news" => '',
            "pengumuman" => '',
            "galeri" => '',
            "admin" => $user
        ];

        return view("admin/index", $data);
    }
    public function users()
    {
        // AUTHENTICATION
        if (($this->session->get('login') !== true) || ($this->session->get('role') !== 'master')) {
            return redirect()->to('/login/index');
        }

        $keyword = filter_var($this->request->getVar('keyword'), FILTER_SANITIZE_STRING);
        if ($keyword != null) {
            $daftar = $this->userModel->search($keyword);
        } else {
            $daftar = $this->userModel->getUser();
        }
        $data = [
            "title" => "Users | MTs Al-Hidayah",
            "user" => 'active',
            "pendaftar" => '',
            "news" => '',
            "pengumuman" => '',
            "galeri" => '',
            "daftar" => $daftar
        ];

        return view("admin/users", $data);
    }
    public function createUser()
    {
        // AUTHENTICATION
        if (($this->session->get('login') !== true) || ($this->session->get('role') !== 'master')) {
            return redirect()->to('/login/index');
        }

        $builder = $this->db->table('user');
        $user = $builder->getWhere(['nip' => $this->session->get('nip')])->getRowArray();
        $data = [
            "title" => "Tambah User | MTs Al-Hidayah",
            "user" => 'active',
            "pendaftar" => '',
            "news" => '',
            "pengumuman" => '',
            "galeri" => '',
            "admin" => $user,
            "role" => ['guru', 'master'],
            "status" => ['0', '1'],
            "validation" => \Config\Services::validation()
        ];


        return view("admin/createUser", $data);
    }
    public function saveUser()
    {
        // VALIDASI INPUT
        if (!$this->validate([
            'username' => [
                'rules' => 'required|is_unique[user.username]',
                'errors' => [
                    'required' => "{field} tidak boleh kosong",
                    'is_unique' => "{field} sudah ada"
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "{field} tidak boleh kosong"
                ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "{field} tidak boleh kosong"
                ]
            ],
            'nip' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => "{field} tidak boleh kosong",
                    'numeric' => "{field} harus angka"
                ]
            ],

        ])) {
            session()->setFlashdata('pesan', "<div class='alert warning'>Data gagal ditambahkan</div>");
            return redirect()->to('/admin/createUser')->withInput();
        }

        $this->userModel->save([
            "nama" => filter_var($this->request->getVar('nama'), FILTER_SANITIZE_STRING),
            "username" => filter_var($this->request->getVar('username'), FILTER_SANITIZE_STRING),
            "password" => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            "role" => $this->request->getVar('role'),
            "is_activated" =>  $this->request->getVar('status'),
            "nip" => filter_var($this->request->getVar('nip'), FILTER_SANITIZE_NUMBER_INT),
            "created_by" => $this->request->getVar('admin')
        ]);
        session()->setFlashdata('pesan', "<div class='container'><div class='alert success'>Data berhasil ditambahkan</div></div>");
        return redirect()->to('/admin/users');
    }

    public function deleteUser($id)
    {
        session()->setFlashdata('pesan', "<div class='container'><div class='alert success'>Data berhasil dihapus</div></div>");
        $this->userModel->delete($id);
        return redirect()->to("/admin/users");
    }


    public function editUser($id)
    {
        // AUTHENTICATION
        if (($this->session->get('login') !== true) || ($this->session->get('role') !== 'master')) {
            return redirect()->to('/login/index');
        }

        $builder = $this->db->table('user');
        $user = $builder->getWhere(['nip' => $this->session->get('nip')])->getRowArray();
        $data = [
            "title" => "Tambah User | MTs Al-Hidayah",
            "user" => 'active',
            "pendaftar" => '',
            "news" => '',
            "pengumuman" => '',
            "galeri" => '',
            "admin" => $user,
            "role" => ['guru', 'master'],
            "status" => ['0', '1'],
            "pengguna" => $this->userModel->getUser($id),
            "validation" => \Config\Services::validation()
        ];

        return view("admin/editUser", $data);
    }
    public function updateUser()
    {
        // VALIDASI INPUT
        if (!$this->validate([
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "{field} tidak boleh kosong"
                ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "{field} tidak boleh kosong"
                ]
            ],
            'nip' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => "{field} tidak boleh kosong",
                    'numeric' => "{field} harus angka"
                ]
            ],

        ])) {
            session()->setFlashdata('pesan', "<div class='alert warning'>Data gagal ditambahkan</div>");
            return redirect()->to('/admin/editUser/' . $this->request->getVar('id'))->withInput();
        }

        $this->userModel->save([
            "user_id" => $this->request->getVar('id'),
            "nama" => filter_var($this->request->getVar('nama'), FILTER_SANITIZE_STRING),
            "username" => filter_var($this->request->getVar('username'), FILTER_SANITIZE_STRING),
            "role" => $this->request->getVar('role'),
            "is_activated" =>  $this->request->getVar('status'),
            "nip" => filter_var($this->request->getVar('nip'), FILTER_SANITIZE_NUMBER_INT),
            "created_by" => $this->request->getVar('admin')
        ]);

        session()->setFlashdata('pesan', "<div class='container'><div class='alert success'>Data berhasil diubah</div></div>");
        return redirect()->to('/admin/users');
    }

    public function pengumuman()
    {
        // AUTHENTICATION
        if (($this->session->get('login') !== true) || ($this->session->get('role') !== 'master')) {
            return redirect()->to('/login/index');
        }
        $daftar = $this->pengumumanModel->getPengumuman();
        $data = [
            "title" => "Pengumuman | MTs Al-Hidayah",
            "user" => '',
            "pendaftar" => '',
            "news" => '',
            "pengumuman" => 'active',
            "galeri" => '',
            "daftar" => $daftar
        ];

        return view("admin/pengumuman", $data);
    }
    public function createPengumuman()
    {
        // AUTHENTICATION
        if (($this->session->get('login') !== true) || ($this->session->get('role') !== 'master')) {
            return redirect()->to('/login/index');
        }

        $data = [
            "title" => "Buat Pengumuman | MTs Al-Hidayah",
            "user" => '',
            "pendaftar" => '',
            "news" => '',
            "pengumuman" => 'active',
            "galeri" => '',
            "validation" => \Config\Services::validation()
        ];

        return view("admin/createPengumuman", $data);
    }
    public function savePengumuman()
    {
        // VALIDASI INPUT
        if (!$this->validate([
            'judul' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "{field} tidak boleh kosong"
                ]
            ],
            'pembuat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "Sumber informasi tidak boleh kosong",
                ]
            ],
            'isi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "Isi pengumuman tidak boleh kosong",
                ]
            ],

            'file' => [
                'rules' => 'max_size[file,2024]|ext_in[file,doc,docx,ppt,pptx,pdf,xls,xlsx]',
                'errors' => [
                    'max_size' => "Ukuran file terlalu besar",
                    'ext_in' => "Format file tidak sesuai ketentuan"
                ]
            ]
        ])) {
            session()->setFlashdata('pesan', "<div class='alert warning'>Data gagal ditambahkan</div>");
            return redirect()->to('/admin/createPengumuman')->withInput();
        }

        // Ambil file
        $filePengumuman = $this->request->getFile('file');
        // dd($filePengumuman->getError());
        if ($filePengumuman->getError() !== 4) {
            // Generate nama baru
            $namaPengumuman = explode('.', $filePengumuman->getName());
            $namaPengumuman = $namaPengumuman[0] . "-" . $filePengumuman->getRandomName();
            // Pindahkan lokasi file
            $filePengumuman->move('file/materi', $namaPengumuman);
        } else {
            $namaPengumuman = NULL;
        }

        $this->pengumumanModel->save([
            "judul" => filter_var($this->request->getVar('judul'), FILTER_SANITIZE_STRING),
            "pembuat" => filter_var($this->request->getVar('pembuat'), FILTER_SANITIZE_STRING),
            "tanggal" => date("Y-m-d"),
            "isi" => $this->request->getVar('isi'),
            "file" => $namaPengumuman,
        ]);

        session()->setFlashdata('pesan', "<div class='container'><div class='alert success'>Data berhasil ditambahkan</div></div>");
        return redirect()->to('/admin/pengumuman');
    }

    public function deletePengumuman($id)
    {
        // Cari namaFile
        $pengumuman = $this->pengumumanModel->find($id);
        if ($pengumuman["file"]) {
            unlink("file/materi/$pengumuman[file]");
        }

        session()->setFlashdata('pesan', "<div class='container'><div class='alert success'>Data berhasil dihapus</div></div>");
        $this->pengumumanModel->delete($id);
        return redirect()->to('/admin/pengumuman');
    }
    public function editPengumuman($id)
    {
        // AUTHENTICATION
        if (($this->session->get('login') !== true) || ($this->session->get('role') !== 'master')) {
            return redirect()->to('/login/index');
        }
        $data = [
            "title" => "Edit Pengumuman | MTs Al-Hidayah",
            "user" => '',
            "pendaftar" => '',
            "news" => '',
            "pengumuman" => 'active',
            "galeri" => '',
            "pengumumanData" => $this->pengumumanModel->getPengumuman($id),
            "validation" => \Config\Services::validation()
        ];

        return view("admin/editPengumuman", $data);
    }
    public function updatePengumuman()
    {
        // VALIDASI INPUT
        if (!$this->validate([
            'judul' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "{field} tidak boleh kosong"
                ]
            ],
            'pembuat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "Sumber informasi tidak boleh kosong",
                ]
            ],
            'isi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "Isi pengumuman tidak boleh kosong",
                ]
            ],

            'file' => [
                'rules' => 'max_size[file,2024]|ext_in[file,doc,docx,ppt,pptx,pdf,xls,xlsx]',
                'errors' => [
                    'max_size' => "Ukuran file terlalu besar",
                    'ext_in' => "Format file tidak sesuai ketentuan"
                ]
            ]
        ])) {
            session()->setFlashdata('pesan', "<div class='alert warning'>Data gagal diubah</div>");
            return redirect()->to('/admin/editPengumuman/' . $this->request->getVar('id'))->withInput();
        }

        // Ambil file
        $filePengumuman = $this->request->getFile('file');
        // Cek perubahan pada gambar
        if ($filePengumuman->getError() === 4) {
            $namaPengumuman = $this->request->getVar('fileLama');
        } else {
            // Generate nama baru
            $namaPengumuman = explode('.', $filePengumuman->getName());
            $namaPengumuman = $namaPengumuman[0] . "-" . $filePengumuman->getRandomName();
            // Pindahkan lokasi file
            $filePengumuman->move('file/materi', $namaPengumuman);
            // hapus sampul lama
            if ($this->request->getVar('fileLama') != NULL) {
                unlink("file/materi/" . $this->request->getVar('fileLama'));
            }
        }

        $this->pengumumanModel->save([
            "id" => $this->request->getVar('id'),
            "judul" => filter_var($this->request->getVar('judul'), FILTER_SANITIZE_STRING),
            "pembuat" => filter_var($this->request->getVar('pembuat'), FILTER_SANITIZE_STRING),
            "tanggal" => date("Y-m-d"),
            "isi" => $this->request->getVar('isi'),
            "file" => $namaPengumuman,
        ]);

        session()->setFlashdata('pesan', "<div class='container'><div class='alert success'>Data berhasil diubah</div></div>");
        return redirect()->to('/admin/pengumuman');
    }
    public function news()
    {
        // AUTHENTICATION
        if (($this->session->get('login') !== true) || ($this->session->get('role') !== 'master')) {
            return redirect()->to('/login/index');
        }
        $daftar = $this->newsModel->getNews();
        $data = [
            "title" => "News | MTs Al-Hidayah",
            "user" => '',
            "pendaftar" => '',
            "news" => 'active',
            "pengumuman" => '',
            "galeri" => '',
            "daftar" => $daftar
        ];

        return view("admin/news", $data);
    }
    public function createNews()
    {
        // AUTHENTICATION
        if (($this->session->get('login') !== true) || ($this->session->get('role') !== 'master')) {
            return redirect()->to('/login/index');
        }

        $data = [
            "title" => "Tambahkan Berita | MTs Al-Hidayah",
            "user" => '',
            "pendaftar" => '',
            "news" => 'active',
            "pengumuman" => '',
            "galeri" => '',
            "validation" => \Config\Services::validation()
        ];

        return view("admin/createNews", $data);
    }
    public function saveNews()
    {
        // VALIDASI INPUT
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "{field} tidak boleh kosong"
                ]
            ],
            'tanggal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "{field} tidak boleh kosong",
                ]
            ],
            'review' => [
                'rules' => 'required|max_length[150]',
                'errors' => [
                    'max_length' => "Maksimal mengandung 150 karakter termasuk spasi",
                    'required' => "{field} tidak boleh kosong",
                ]
            ],
            'keterangan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "Isi berita tidak boleh kosong",
                ]
            ],

            'gambar' => [
                'rules' => 'uploaded[gambar]|max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => "Harus ada gambar yang di upload",
                    'max_size' => "Ukuran terlalu besar",
                    'is_image' => "Yang anda pilih bukan gambar",
                    'mime_in' => "Yang anda pilih bukan gambar"
                ]
            ]
        ])) {
            session()->setFlashdata('pesan', "<div class='alert warning'>Data gagal ditambahkan</div>");
            return redirect()->to('/admin/createNews')->withInput();
        }

        // Ambil file
        $fileNews = $this->request->getFile('gambar');
        // Generate nama baru
        $namaNews = explode('.', $fileNews->getName());
        $namaNews = $namaNews[0] . "-" . $fileNews->getRandomName();
        // Pindahkan lokasi file
        $fileNews->move('img/news/', $namaNews);

        $this->newsModel->save([
            "nama" => filter_var($this->request->getVar('nama'), FILTER_SANITIZE_STRING),
            "tanggal" => $this->request->getVar('tanggal'),
            "review" => filter_var($this->request->getVar('review'), FILTER_SANITIZE_STRING),
            "keterangan" => $this->request->getVar('keterangan'),
            "gambar" => $namaNews,
        ]);

        session()->setFlashdata('pesan', "<div class='container'><div class='alert success'>Data berhasil ditambahkan</div></div>");
        return redirect()->to('/admin/news');
    }

    public function deleteNews($id)
    {
        // Cari namaFile
        $news = $this->newsModel->find($id);
        unlink("img/$news[gambar]");
        session()->setFlashdata('pesan', "<div class='container'><div class='alert success'>Data berhasil dihapus</div></div>");
        $this->newsModel->delete($id);
        return redirect()->to('/admin/news');
    }
    public function editNews($id)
    {
        // AUTHENTICATION
        if (($this->session->get('login') !== true) || ($this->session->get('role') !== 'master')) {
            return redirect()->to('/login/index');
        }
        $data = [
            "title" => "Edit News | MTs Al-Hidayah",
            "user" => '',
            "pendaftar" => '',
            "news" => 'active',
            "pengumuman" => '',
            "galeri" => '',
            "newsData" => $this->newsModel->getNews($id),
            "validation" => \Config\Services::validation()
        ];

        return view("admin/editNews", $data);
    }
    public function updateNews()
    {
        // VALIDASI INPUT
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "{field} tidak boleh kosong"
                ]
            ],
            'tanggal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "{field} tidak boleh kosong",
                ]
            ],
            'review' => [
                'rules' => 'required|max_length[150]',
                'errors' => [
                    'max_length' => "Maksimal mengandung 150 karakter termasuk spasi",
                    'required' => "{field} tidak boleh kosong",
                ]
            ],
            'keterangan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "Isi berita tidak boleh kosong",
                ]
            ],

            'gambar' => [
                'rules' => 'max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => "Ukuran terlalu besar",
                    'is_image' => "Yang anda pilih bukan gambar",
                    'mime_in' => "Yang anda pilih bukan gambar"
                ]
            ]
        ])) {
            session()->setFlashdata('pesan', "<div class='alert warning'>Data gagal diubah</div>");
            return redirect()->to('/admin/editNews/' . $this->request->getVar('id'))->withInput();
        }

        // Ambil file
        $fileNews = $this->request->getFile('gambar');
        // Cek perubahan pada gambar
        if ($fileNews->getError() === 4) {
            $namaNews = $this->request->getVar('fileLama');
        } else {
            // Generate nama baru
            $namaNews = explode('.', $fileNews->getName());
            $namaNews = $namaNews[0] . "-" . $fileNews->getRandomName();
            // Pindahkan lokasi file
            $fileNews->move('img/news/', $namaNews);
            // hapus sampul lama
            if ($this->request->getVar('fileLama') != NULL) {
                unlink("img/news/" . $this->request->getVar('fileLama'));
            }
        }

        $this->newsModel->save([
            "id" => $this->request->getVar('id'),
            "nama" => filter_var($this->request->getVar('nama'), FILTER_SANITIZE_STRING),
            "tanggal" => $this->request->getVar('tanggal'),
            "review" => filter_var($this->request->getVar('review'), FILTER_SANITIZE_STRING),
            "keterangan" => $this->request->getVar('keterangan'),
            "gambar" => $namaNews,
        ]);

        session()->setFlashdata('pesan', "<div class='container'><div class='alert success'>Data berhasil diubah</div></div>");
        return redirect()->to('/admin/news');
    }
    public function galeri()
    {
        // AUTHENTICATION
        if (($this->session->get('login') !== true) || ($this->session->get('role') !== 'master')) {
            return redirect()->to('/login/index');
        }
        $keyword = filter_var($this->request->getVar('keyword'), FILTER_SANITIZE_STRING);
        if ($keyword != null) {
            $daftar = $this->galeriModel->search($keyword);
        } else {
            $daftar = $this->galeriModel->getGaleri();
        }

        $data = [
            "title" => "News | MTs Al-Hidayah",
            "user" => '',
            "pendaftar" => '',
            "news" => '',
            "pengumuman" => '',
            "galeri" => 'active',
            "daftar" => $daftar
        ];

        return view("admin/galeri", $data);
    }
    public function createGaleri()
    {
        // AUTHENTICATION
        if (($this->session->get('login') !== true) || ($this->session->get('role') !== 'master')) {
            return redirect()->to('/login/index');
        }

        $data = [
            "title" => "Tambahkan Album | MTs Al-Hidayah",
            "user" => '',
            "pendaftar" => '',
            "news" => '',
            "pengumuman" => '',
            "galeri" => 'active',
            "validation" => \Config\Services::validation()
        ];

        return view("admin/createGaleri", $data);
    }
    public function saveGaleri()
    {
        // VALIDASI INPUT
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "{field} tidak boleh kosong"
                ]
            ],
            'link' => [
                'rules' => 'required|valid_url',
                'errors' => [
                    'required' => "{field} tidak boleh kosong",
                    'valid_url' => '{field} harus mengandung URL valid'
                ]
            ],
            'gambar' => [
                'rules' => 'uploaded[gambar]|max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => "Harus ada gambar yang di upload",
                    'max_size' => "Ukuran terlalu besar",
                    'is_image' => "Yang anda pilih bukan gambar",
                    'mime_in' => "Yang anda pilih bukan gambar"
                ]
            ]
        ])) {
            session()->setFlashdata('pesan', "<div class='alert warning'>Data gagal ditambahkan</div>");
            return redirect()->to('/admin/createGaleri')->withInput();
        }

        // Ambil file
        $fileGaleri = $this->request->getFile('gambar');
        // Generate nama baru
        $namaGaleri = explode('.', $fileGaleri->getName());
        $namaGaleri = $namaGaleri[0] . "-" . $fileGaleri->getRandomName();
        // Pindahkan lokasi file
        $fileGaleri->move('img/galeri/', $namaGaleri);

        $this->galeriModel->save([
            "nama" => filter_var($this->request->getVar('nama'), FILTER_SANITIZE_STRING),
            "link" => filter_var($this->request->getVar('link'), FILTER_SANITIZE_STRING),
            "gambar" => $namaGaleri,
        ]);

        session()->setFlashdata('pesan', "<div class='container'><div class='alert success'>Data berhasil ditambahkan</div></div>");
        return redirect()->to('/admin/galeri');
    }

    public function deleteGaleri($id)
    {
        // Cari namaFile
        $galeri = $this->galeriModel->find($id);
        unlink("img/galeri/$galeri[gambar]");
        session()->setFlashdata('pesan', "<div class='container'><div class='alert success'>Data berhasil dihapus</div></div>");
        $this->galeriModel->delete($id);
        return redirect()->to('/admin/galeri');
    }
    public function editGaleri($id)
    {
        // AUTHENTICATION
        if (($this->session->get('login') !== true) || ($this->session->get('role') !== 'master')) {
            return redirect()->to('/login/index');
        }
        $data = [
            "title" => "Edit Album | MTs Al-Hidayah",
            "user" => '',
            "pendaftar" => '',
            "news" => '',
            "pengumuman" => '',
            "galeri" => 'active',
            "album" => $this->galeriModel->getGaleri($id),
            "validation" => \Config\Services::validation()
        ];

        return view("admin/editGaleri", $data);
    }
    public function updateGaleri()
    {
        // VALIDASI INPUT
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "{field} tidak boleh kosong"
                ]
            ],
            'link' => [
                'rules' => 'required|valid_url',
                'errors' => [
                    'required' => "{field} tidak boleh kosong",
                    'valid_url' => '{field} harus mengandung URL valid'
                ]
            ],
            'gambar' => [
                'rules' => 'max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => "Ukuran terlalu besar",
                    'is_image' => "Yang anda pilih bukan gambar",
                    'mime_in' => "Yang anda pilih bukan gambar"
                ]
            ]
        ])) {
            session()->setFlashdata('pesan', "<div class='alert warning'>Data gagal diubah</div>");
            return redirect()->to('/admin/editGaleri/' . $this->request->getVar('id'))->withInput();
        }

        // Ambil file
        $fileGaleri = $this->request->getFile('gambar');
        // Cek perubahan pada gambar
        if ($fileGaleri->getError() === 4) {
            $namaGaleri = $this->request->getVar('fileLama');
        } else {
            // Generate nama baru
            $namaGaleri = explode('.', $fileGaleri->getName());
            $namaGaleri = $namaGaleri[0] . "-" . $fileGaleri->getRandomName();
            // Pindahkan lokasi file
            $fileGaleri->move('img/galeri/', $namaGaleri);
            // hapus sampul lama
            if ($this->request->getVar('fileLama') != NULL) {
                unlink("img/galeri/" . $this->request->getVar('fileLama'));
            }
        }

        $this->galeriModel->save([
            "id" => $this->request->getVar('id'),
            "nama" => filter_var($this->request->getVar('nama'), FILTER_SANITIZE_STRING),
            "link" => filter_var($this->request->getVar('link'), FILTER_SANITIZE_STRING),
            "gambar" => $namaGaleri
        ]);

        session()->setFlashdata('pesan', "<div class='container'><div class='alert success'>Data berhasil diubah</div></div>");
        return redirect()->to('/admin/galeri');
    }
    public function ppdb()
    {
        $this->pendaftarModel = new PendaftarModel();
        $keyword = filter_var($this->request->getVar('keyword'), FILTER_SANITIZE_STRING);
        if ($keyword != null) {
            $daftar = $this->pendaftarModel->search($keyword);
        } else {
            $daftar = $this->pendaftarModel->getPendaftar();
        }
        $data = [
            "title" => "PPDB Center | MTs Al-Hidayah",
            "user" => '',
            "pendaftar" => 'active',
            "news" => '',
            "pengumuman" => '',
            "galeri" => '',
            "daftar" => $daftar
        ];

        return view("admin/ppdb", $data);
    }
    public function deletePendaftar($id)
    {
        // Cari namaFile
        $this->pendaftarModel = new PendaftarModel();
        session()->setFlashdata('pesan', "<div class='container'><div class='alert success'>Data berhasil dihapus</div></div>");
        $this->pendaftarModel->delete($id);
        return redirect()->to('/admin/ppdb');
    }

    public function editPendaftar($id)
    {
        $this->pendaftarModel = new PendaftarModel();
        // AUTHENTICATION
        if (($this->session->get('login') !== true) || ($this->session->get('role') !== 'master')) {
            return redirect()->to('/login/index');
        }
        $data = [
            "title" => "Edit Pendaftar | MTs Al-Hidayah",
            "user" => '',
            "pendaftar" => 'active',
            "news" => '',
            "pengumuman" => '',
            "galeri" => '',
            "kelulusan" => ["BELUM DIPUTUSKAN", "LULUS", "TIDAK LULUS"],
            "siswa" => $this->pendaftarModel->getPendaftar($id),
            "validation" => \Config\Services::validation()
        ];

        return view("admin/editPendaftar", $data);
    }
    public function updatePendaftar()
    {
        $this->pendaftarModel = new PendaftarModel();
        // VALIDASI INPUT
        if (!$this->validate([
            'kelulusan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "{field} tidak boleh kosong"
                ]
            ]
        ])) {
            session()->setFlashdata('pesan', "<div class='alert warning'>Data gagal diubah</div>");
            return redirect()->to('/admin/editPendaftar/' . $this->request->getVar('id'))->withInput();
        }

        $this->pendaftarModel->save([
            "id" => $this->request->getVar('id'),
            "kelulusan" => $this->request->getVar('kelulusan')
        ]);

        session()->setFlashdata('pesan', "<div class='container'><div class='alert success'>Data berhasil diubah</div></div>");
        return redirect()->to('/admin/ppdb');
    }
}