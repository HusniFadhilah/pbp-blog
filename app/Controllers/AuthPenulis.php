<?php

namespace App\Controllers;

use App\Models\PenulisModel;

class AuthPenulis extends BaseController
{
    public function __construct()
    {
        $this->penulisModel = new PenulisModel();
    }

    public function index()
    {
        if (session()->has('idpenulis')) {
            return redirect()->to('/penulis');
        }
        $data = [
            'validation' => \Config\Services::validation()
        ];
        return view('penulis/auth/login', $data);
    }

    public function login()
    {
        if (!$this->validate([
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
        ])) {
            return redirect()->to('/authpenulis')->withInput();
        }

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $penulis = $this->penulisModel->where('email', $email)->first();
        if ($penulis) {
            if ($penulis["password"] !== md5($password)) {
                sweetalert('Maaf password Anda salah', 'error', 'Gagal!');
                return redirect()->to('/authpenulis')->withInput();
            } else {
                $sessData = [
                    'emailPenulis' => $penulis["email"],
                    'idpenulis' => $penulis["idpenulis"],
                    'isLoggedInPenulis' => TRUE
                ];

                session()->set($sessData);

                return redirect()->to('/penulis');
            }
        } else {
            sweetalert('Maaf akun Anda tidak terdaftar', 'error', 'Gagal!');
            return redirect()->to('/authpenulis')->withInput();
        }
    }

    public function logout()
    {
        session()->remove('emailPenulis');
        session()->remove('idpenulis');
        session()->remove('isLoggedInPenulis');
        sweetalert('Sesi berakhir. Kamu telah berhasil logout!', 'info', 'Info!');
        return redirect()->to('/authpenulis');
    }
}
