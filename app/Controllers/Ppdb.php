<?php

namespace App\Controllers;

use App\Models\PendaftarModel;
use Dompdf\Dompdf;

class Ppdb extends BaseController
{
    protected $pendaftarModel;
    protected $databaru;
    public function __construct()
    {
        $this->pendaftarModel = new PendaftarModel();
    }
    public function updatePendaftar()
    {
        $this->databaru =  $this->pendaftarModel->getFirst();
    }
    public function index()
    {
        $this->session->set(["create" => true]);
        $data = [
            "title" => "PPDB Center | MTs Al-Hidayah",
            "ppdb" => "active",
            "akademik" => "",
            "galeri" => "",
            "about" => "",
            "kontak" => "",
            "login" => ""
        ];
        return view('ppdb/index', $data);
    }

    public function register()
    {
        // AUTHENTICATION
        if ($this->session->get('create') !== true) {
            return redirect()->to('/ppdb/index');
        }
        $data = [
            "title" => "Pendaftaran Siswa Baru | MTs Al-Hidayah",
            "ppdb" => "active",
            "akademik" => "",
            "galeri" => "",
            "about" => "",
            "kontak" => "",
            "login" => "",
            "kelamin" => ["Laki-laki", "Perempuan"],
            "jenis" => ["SD", "MI"],
            "status" => ["Negeri", "Swasta"],
            "validation" => \Config\Services::validation()
        ];
        return view('ppdb/register', $data);
    }
    public function save()
    {

        // VALIDASI INPUT
        if (!$this->validate([
            'nik' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => "NIK tidak boleh kosong",
                    'numeric' => "NIK harus angka"
                ]
            ],
            'nisn' => [
                'rules' => 'required|is_unique[pendaftar.nisn]|numeric',
                'errors' => [
                    'required' => "NISN tidak boleh kosong",
                    'is_unique' => "NISN sudah ada",
                    'numeric' => "NISN harus angka"
                ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "Nama tidak boleh kosong"
                ]
            ],
            'tempat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "Tempat lahir tidak boleh kosong"
                ]
            ],
            'tanggal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "Tanggal lahir tidak boleh kosong"
                ]
            ],
            'asal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "Sekolah asal tidak boleh kosong"
                ]
            ],
            'kabupaten' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "Kabupaten sekolah asal tidak boleh kosong"
                ]
            ],
            'nomor' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "Nomor peserta ujian tidak boleh kosong"
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "Alamat siswa tidak boleh kosong"
                ]
            ],
            'prov' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "Provinsi tidak boleh kosong"
                ]
            ],
            'kab' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "Kabupaten tidak boleh kosong"
                ]
            ],
            'kec' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "Kecamatan tidak boleh kosong"
                ]
            ],
            'des' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "Desa/Kelurahan tidak boleh kosong"
                ]
            ],
            'wali' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "Nama wali tidak boleh kosong"
                ]
            ],
            'alamatWali' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "Alamat wali tidak boleh kosong"
                ]
            ],
            'noWali' => [
                'rules' => 'numeric',
                'errors' => [
                    'numeric' => "Nomor HP hanya boleh angka"
                ]
            ],
            'namaGuru' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "Nama yang mendaftarkan tidak boleh kosong"
                ]
            ],
            'wa' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => "No WA yang mendaftarkan tidak boleh kosong",
                    'numeric' => "Nomor HP hanya boleh angka"
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => "Email yang mendaftarkan tidak boleh kosong",
                    'valid_email' => "Email anda tidak valid"
                ]
            ]

        ])) {
            session()->setFlashdata('pesan', "<div class='alert warning'>Pendaftaran Gagal</div>");
            return redirect()->to('/ppdb/register')->withInput();
        }

        $this->pendaftarModel->save([
            "nik" => filter_var($this->request->getVar('nik'), FILTER_SANITIZE_NUMBER_INT),
            "nisn" => filter_var($this->request->getVar('nisn'), FILTER_SANITIZE_NUMBER_INT),
            "nama_siswa" => filter_var($this->request->getVar('nama'), FILTER_SANITIZE_STRING),
            "tempat_lahir" => filter_var($this->request->getVar('tempat'), FILTER_SANITIZE_STRING),
            "tanggal_lahir" => $this->request->getVar('tanggal'),
            "kelamin" => $this->request->getVar('kelamin'),
            "sekolah_asal" => filter_var($this->request->getVar('asal'), FILTER_SANITIZE_STRING),
            "jenis_asal" => filter_var($this->request->getVar('jenis'), FILTER_SANITIZE_STRING),
            "status_asal" => filter_var($this->request->getVar('status'), FILTER_SANITIZE_STRING),
            "kabupaten_asal" => filter_var($this->request->getVar('kabupaten'), FILTER_SANITIZE_STRING),
            "nomor_ujian" => filter_var($this->request->getVar('nomor'), FILTER_SANITIZE_STRING),
            "pilihan_2" => filter_var($this->request->getVar('pil2'), FILTER_SANITIZE_STRING),
            "alamat" => filter_var($this->request->getVar('alamat'), FILTER_SANITIZE_STRING),
            "provinsi" => filter_var($this->request->getVar('prov'), FILTER_SANITIZE_STRING),
            "kabupaten" => filter_var($this->request->getVar('kab'), FILTER_SANITIZE_STRING),
            "kecamatan" => filter_var($this->request->getVar('kec'), FILTER_SANITIZE_STRING),
            "desa" => filter_var($this->request->getVar('des'), FILTER_SANITIZE_STRING),
            "pos" => filter_var($this->request->getVar('pos'), FILTER_SANITIZE_NUMBER_INT),
            "nama_wali" => filter_var($this->request->getVar('wali'), FILTER_SANITIZE_STRING),
            "alamat_wali" => filter_var($this->request->getVar('alamatWali'), FILTER_SANITIZE_STRING),
            "hp_wali" => filter_var($this->request->getVar('noWali'), FILTER_SANITIZE_NUMBER_INT),
            "nama_guru" => filter_var($this->request->getVar('namaGuru'), FILTER_SANITIZE_STRING),
            "wa_guru" => filter_var($this->request->getVar('wa'), FILTER_SANITIZE_STRING),
            "email" => filter_var($this->request->getVar('email'), FILTER_SANITIZE_STRING),
            "kelulusan" => $this->request->getVar('kelulusan')
        ]);
        $data = [
            "title" => "Pendaftaran Berhasil | MTs Al-Hidayah",
            "ppdb" => "active",
            "akademik" => "",
            "galeri" => "",
            "about" => "",
            "kontak" => "",
            "login" => "",
        ];
        $this->session->remove('create');
        $this->updatePendaftar();

        if ($this->databaru['id'] > 0 && $this->databaru['id'] < 21) {
            $ruang = "A";
        } else  if ($this->databaru['id'] > 20 && $this->databaru['id'] < 41) {
            $ruang = "B";
        } else  if ($this->databaru['id'] > 40 && $this->databaru['id'] < 61) {
            $ruang = "C";
        } else  if ($this->databaru['id'] > 60 && $this->databaru['id'] < 81) {
            $ruang = "D";
        } else  if ($this->databaru['id'] > 80 && $this->databaru['id'] < 101) {
            $ruang = "E";
        } else  if ($this->databaru['id'] > 100 && $this->databaru['id'] < 121) {
            $ruang = "F";
        } else  if ($this->databaru['id'] > 120 && $this->databaru['id'] < 141) {
            $ruang = "G";
        } else {
            $ruang = "H";
        }

        $document = "
        <style>
        table{width:80%;margin:10px auto;}
        td{padding:10px 20px;}
        p,h3,h2{text-align:center;}
        </style>
            <h2>KARTU PESERTA</h2>
            <p>Nomor peserta:</p>
            <h3>" . $this->databaru["id"] . "</h3>
            <table>
            <tr><td>Nama</td><td>" . $this->databaru["nama_siswa"] . "</td></tr>
            <tr><td>NISN</td><td>" . $this->databaru["nisn"] . "</td></tr>
            <tr><td>Sekolah asal</td><td>" . $this->databaru["sekolah_asal"] . "</td></tr>
            <tr><td>Tempat ujian</td><td><b>Ruang $ruang</b></td></tr>
            <tr><td>Waktu ujian</td><td><b>Pukul 08.00 WIB</b></td></tr>
            </table>
        ";
        $dompdf = new Dompdf();
        $dompdf->loadHtml($document);
        $dompdf->setPaper('A5', 'potrait');
        $dompdf->render();
        $output = $dompdf->output();
        $email = \Config\Services::email();
        $email->setFrom('mts.aldasagalaherang@gmail.com');
        $email->setTo($this->databaru['email']);
        $email->setSubject("KARTU PESERTA");
        $email->setMessage($document);
        $email->attach($output, 'attachment', 'Kartu-Peserta.pdf', 'application/pdf');
        if ($email->send()) {
            session()->setFlashdata('pesan', "<div class='alert alert-success'>Backup kartu peserta berhasil dikirim ke email</div>");
        } else {
            session()->setFlashdata('pesan', "<div class='alert alert-danger'>Email gagal dikirim</div>");
        }
        return view("ppdb/usersDownload", $data);
    }
    public function email()
    {
        $data = [
            "title" => "Pendaftaran Berhasil | MTs Al-Hidayah",
            "ppdb" => "active",
            "akademik" => "",
            "galeri" => "",
            "about" => "",
            "kontak" => "",
            "login" => "",
        ];
        $this->updatePendaftar();

        if ($this->databaru['id'] > 0 && $this->databaru['id'] < 21) {
            $ruang = "A";
        } else  if ($this->databaru['id'] > 20 && $this->databaru['id'] < 41) {
            $ruang = "B";
        } else  if ($this->databaru['id'] > 40 && $this->databaru['id'] < 61) {
            $ruang = "C";
        } else  if ($this->databaru['id'] > 60 && $this->databaru['id'] < 81) {
            $ruang = "D";
        } else  if ($this->databaru['id'] > 80 && $this->databaru['id'] < 101) {
            $ruang = "E";
        } else  if ($this->databaru['id'] > 100 && $this->databaru['id'] < 121) {
            $ruang = "F";
        } else  if ($this->databaru['id'] > 120 && $this->databaru['id'] < 141) {
            $ruang = "G";
        } else {
            $ruang = "H";
        }

        $document = "
        <style>
        table{width:80%;margin:10px auto;}
        td{padding:10px 20px;}
        p,h3,h2{text-align:center;}
        </style>
            <h2>KARTU PESERTA</h2>
            <p>Nomor peserta:</p>
            <h3>" . $this->databaru["id"] . "</h3>
            <table>
            <tr><td>Nama</td><td>" . $this->databaru["nama_siswa"] . "</td></tr>
            <tr><td>NISN</td><td>" . $this->databaru["nisn"] . "</td></tr>
            <tr><td>Sekolah asal</td><td>" . $this->databaru["sekolah_asal"] . "</td></tr>
            <tr><td>Tempat ujian</td><td><b>Ruang $ruang</b></td></tr>
            <tr><td>Waktu ujian</td><td><b>Pukul 08.00 WIB</b></td></tr>
            </table>
        ";
        $dompdf = new Dompdf();
        $dompdf->loadHtml($document);
        $dompdf->setPaper('A5', 'potrait');
        $dompdf->render();
        $output = $dompdf->output();
        $email = \Config\Services::email();
        $email->setFrom('mts.aldasagalaherang@gmail.com');
        $email->setTo($this->databaru['email']);
        $email->setSubject("KARTU PESERTA");
        $email->setMessage($document);
        $email->attach($output, 'attachment', 'Kartu-Peserta.pdf', 'application/pdf');
        if ($email->send()) {
            session()->setFlashdata('pesan', "<div class='alert success'>Backup kartu peserta berhasil dikirim ke email</div>");
        } else {
            session()->setFlashdata('pesan', "<div class='alert warning'>Email gagal dikirim</div>");
        }
        return view("ppdb/usersDownload", $data);
    }

    public function download()
    {
        $this->updatePendaftar();
        if ($this->databaru['id'] > 0 && $this->databaru['id'] < 21) {
            $ruang = "A";
        } else  if ($this->databaru['id'] > 20 && $this->databaru['id'] < 41) {
            $ruang = "B";
        } else  if ($this->databaru['id'] > 40 && $this->databaru['id'] < 61) {
            $ruang = "C";
        } else  if ($this->databaru['id'] > 60 && $this->databaru['id'] < 81) {
            $ruang = "D";
        } else  if ($this->databaru['id'] > 80 && $this->databaru['id'] < 101) {
            $ruang = "E";
        } else  if ($this->databaru['id'] > 100 && $this->databaru['id'] < 121) {
            $ruang = "F";
        } else  if ($this->databaru['id'] > 120 && $this->databaru['id'] < 141) {
            $ruang = "G";
        } else {
            $ruang = "H";
        }
        $document = "
        <style>
        table{width:80%;margin:10px auto;}
        td{padding:10px 20px;}
        p,h3,h2{text-align:center;}
        </style>
            <h2>KARTU PESERTA</h2>
            <p>Nomor peserta:</p>
            <h3>" . $this->databaru["id"] . "</h3>
            <table>
            <tr><td>Nama</td><td>" . $this->databaru["nama_siswa"] . "</td></tr>
            <tr><td>NISN</td><td>" . $this->databaru["nisn"] . "</td></tr>
            <tr><td>Sekolah asal</td><td>" . $this->databaru["sekolah_asal"] . "</td></tr>
            <tr><td>Tempat ujian</td><td><b>Ruang $ruang</b></td></tr>
            <tr><td>Waktu ujian</td><td><b>Pukul 08.00 WIB</b></td></tr>
            </table>
        ";
        $dompdf = new Dompdf();
        $dompdf->loadHtml($document);
        $dompdf->setPaper('A5', 'potrait');
        $dompdf->render();
        $dompdf->stream($this->databaru['nama_siswa'] . '-' . $this->databaru['id'] . 'pdf', array('Attachment' => 1));
    }
    public function pengumuman()
    {
        $keyword = filter_var($this->request->getVar('keyword'), FILTER_SANITIZE_STRING);
        if ($keyword != null) {
            $daftar = $this->pendaftarModel->search($keyword);
        } else {
            $daftar = $this->pendaftarModel->getPendaftar();
        }
        $data = [
            "title" => "Pengumuman Kelulusan | MTs Al-Hidayah",
            "ppdb" => "active",
            "akademik" => "",
            "galeri" => "",
            "about" => "",
            "kontak" => "",
            "login" => "",
            "daftar" => $daftar
        ];

        return view("ppdb/pengumuman", $data);
    }
    //--------------------------------------------------------------------

}