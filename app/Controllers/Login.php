<?php

namespace App\Controllers;

class Login extends BaseController
{
    protected $db;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }
    public function index()
    {
        if ($this->session->get('login')) {
            if ($this->session->get('role') == 'master') {
                return redirect()->to('/admin');
            } else  if ($this->session->get('role') == 'guru') {
                return redirect()->to('/teacher');
            }
        }
        $data = [
            "title" => "Login | MTs Al-Hidayah",
            "ppdb" => "",
            "akademik" => "",
            "galeri" => "",
            "about" => "",
            "kontak" => "",
            "validation" => \Config\Services::validation(),
            "login" => "active"
        ];

        return view('login/index', $data);
    }

    public function validasi()
    {
        // VALIDASI INPUT
        if (!$this->validate([
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "{field} tidak boleh kosong"
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "{field} tidak boleh kosong"
                ]
            ]
        ])) {
            return redirect()->to('/login/index')->withInput();
        } else {
            $login = $this->_login();
            if ($login === false) {
                return redirect()->to('/login/index')->withInput();
            } else {
                if ($this->session->get('role') == 'master') {
                    return redirect()->to('/admin');
                } else {
                    return redirect()->to('/teacher');
                }
            }
        }
    }

    private function _login()
    {
        $username = filter_var($this->request->getVar('username'), FILTER_SANITIZE_STRING);
        $password = filter_var($this->request->getVar('password'), FILTER_SANITIZE_STRING);
        $builder = $this->db->table('user');
        $user = $builder->getWhere(['username' => $username])->getRowArray();
        if ($user != null) {
            if (password_verify($password, $user['password'])) {
                if ($user['is_activated'] == 1) {
                    $data = [
                        "nip" => $user['nip'],
                        "role" => $user['role'],
                        "login" => true
                    ];
                    $this->session->set($data);
                    $this->session->markAsTempdata('login', 1800);
                    return true;
                } else {
                    session()->setFlashdata('pesan', "<div class='alert warning'>Akun anda tidak aktif</div>");
                    return false;
                }
            } else {
                session()->setFlashdata('pesan', "<div class='alert warning'>Username atau Password salah</div>");
                return false;
            }
        } else {
            // Jika user tidak ada
            session()->setFlashdata('pesan', "<div class='alert warning'>Username tidak terdaftar</div>");
            return false;
        }
    }

    public function logout()
    {
        $this->session->remove('nama');
        $this->session->remove('role');
        $this->session->remove('login');
        session()->setFlashdata('pesan', "<div class='alert success'>Anda berhasil logout</div>");
        return redirect()->to('/login');
    }

    public function error()
    {
        return view('errors/html/error_404');
    }
    //--------------------------------------------------------------------

}