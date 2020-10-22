<?php

namespace App\Controllers;

use App\Models\AdminModel;

class AuthAdmin extends BaseController
{
    public function __construct()
    {
        $this->adminModel = new AdminModel();
    }

    public function index()
    {
        if (session()->get('idadmin')) {
            return redirect()->to('/admin');
        }
        $data = [
            'validation' => \Config\Services::validation()
        ];
        return view('admin/auth/login', $data);
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
            return redirect()->to('/authadmin')->withInput();
        }

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $admin = $this->adminModel->where('email', $email)->first();
        if ($admin) {
            if ($admin["password"] !== md5($password)) {
                sweetalert('Maaf password Anda salah', 'error', 'Gagal!');
                return redirect()->to('/authadmin')->withInput();
            } else {
                $sessData = [
                    'emailAdmin' => $admin["email"],
                    'idadmin' => $admin["idadmin"],
                    'isLoggedInAdmin' => TRUE
                ];

                session()->set($sessData);

                return redirect()->to('/admin');
            }
        } else {
            sweetalert('Maaf akun Anda tidak terdaftar', 'error', 'Gagal!');
            return redirect()->to('/authadmin')->withInput();
        }
    }

    public function logout()
    {
        session()->remove('emailAdmin');
        session()->remove('idadmin');
        session()->remove('isLoggedInAdmin');
        sweetalert('Sesi berakhir. Kamu telah berhasil logout!', 'info', 'Info!');
        return redirect()->to('/authadmin');
    }
}
