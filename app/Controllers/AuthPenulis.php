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
        if (session()->get('idpenulis')) {
            return redirect()->to('/penulis');
        }
        $data = [
            'validation' => \Config\Services::validation()
        ];
        return view('penulis/auth/login', $data);
    }

    public function login()
    {
        $agent = $this->request->getUserAgent();
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

                // if ($agent->isReferral()) {
                //     dd($agent->getReferrer());
                //     // return redirect()->to($agent->getReferrer());
                // } else {
                //     dd($agent->getReferrer());
                // }
                return redirect()->to('/penulis');
            }
        } else {
            sweetalert('Maaf akun Anda tidak terdaftar', 'error', 'Gagal!');
            return redirect()->to('/authpenulis')->withInput();
        }
    }

    public function register()
    {
        if (session()->has('idpenulis')) {
            return redirect()->to('/penulis');
        }
        $data = [
            'validation' => \Config\Services::validation()
        ];
        return view('penulis/auth/register', $data);
    }

    public function processRegister()
    {
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[5]',
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'min_length' => 'panjang password minimal 5 karakter'
                ]
            ],
            'konfpassword' => [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => 'konfirmasi password harus diisi.',
                    'matches' => 'konfirmasi password harus sama dengan password'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'valid_email' => 'harus diisi dengan email valid'
                ]
            ],
            'no_telp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'no. hp harus diisi.'
                ]
            ],
            'kota' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
        ])) {
            return redirect()->to('/authpenulis/register')->withInput();
        }
        $this->penulisModel->save([
            'nama' => $this->request->getVar('nama'),
            'password' => md5($this->request->getVar('password')),
            'email' => $this->request->getVar('email'),
            'no_telp' => $this->request->getVar('no_telp'),
            'kota' => $this->request->getVar('kota'),
            'alamat' => $this->request->getVar('alamat')
        ]);

        sweetalert('Pendaftaran berhasil, silahkan login untuk melanjutkan', 'success', 'Berhasil!', '/authpenulis');

        return redirect()->to('/authpenulis/register');
    }

    public function logout()
    {
        session()->remove('emailPenulis');
        session()->remove('idpenulis');
        session()->remove('isLoggedInPenulis');
        sweetalert('Sesi berakhir. Kamu telah berhasil logout!', 'info', 'Info!');
        return redirect()->to('/authpenulis');
    }

    public function loginkomentar()
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
            return redirect()->to('/post')->withInput();
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
                $agent = $this->request->getUserAgent();
                if ($agent->isReferral()) {
                    return redirect()->to('/authpenulis');
                } else {
                    return redirect()->to($agent->getReferrer());
                }
            }
        } else {
            sweetalert('Maaf akun Anda tidak terdaftar', 'error', 'Gagal!');
            return redirect()->to('/authpenulis')->withInput();
        }
    }
}
