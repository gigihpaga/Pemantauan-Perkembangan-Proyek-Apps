<?php

namespace App\Controllers;

use CodeIgniter\Config\ForeignCharacters;
use App\Models\m_login;

class Login extends BaseController
{
    protected $tb_login;

    public function __construct()
    {
        $this->tb_login = new m_login();
    }

    public function cek_login()
    {
        global $session;

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $cek = $this->tb_login->getDataLogin($username, $password);
        // dd($cek); die();
        if ($cek) {
            $newdata = array(
                    'username'  => $cek['username'],
                    'role'     => $cek['jabatan'],
                    'namauser'     => $cek['namauser'],
                    'iduser'     => $cek['iduser'],
            );
            // dd($newdata); die();
            session()->set($newdata);
            session()->setFlashdata('pesan_login', 'Login Berhasil');
            return redirect()->to(base_url('home'));
        } else {
            session()->setFlashdata('pesan_login', 'Login Gagal');
            return redirect()->to(base_url());
        }

    }

    public function logout()
    {
        session()->remove('username');
        session()->remove('role');
        session()->setFlashdata('pesan_login', 'Logout Berhasil');
        return redirect()->to(base_url());
    }


}
