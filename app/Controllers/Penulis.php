<?php

namespace App\Controllers;

use App\Models\PenulisModel;
use App\Models\PostModel;
use App\Models\KomentarModel;

class Penulis extends BaseController
{
    public function __construct()
    {
        $this->penulisModel = new PenulisModel();
        $this->komentarModel = new KomentarModel();
        $this->postModel = new PostModel();
    }

    public function index()
    {
        $user_session = session()->get('idpenulis');
        if (!($user_session)) {
            return redirect()->to('/authpenulis');
        }

        $data = [
            'title' => 'Dashboard Penulis',
            'validation' => \Config\Services::validation(),
            'jmlkomentar' => count($this->komentarModel->getKomentarInPostBelongsToPenulis($user_session)),
            'jmlpost' => count($this->postModel->getDataPostByPenulis($user_session)),
            'post' => $this->postModel->getDataPostByPenulis($user_session)
        ];

        return view('penulis/dashboard/dashboard', $data);
    }

    public function edit($id)
    {
        $user_session = session()->has('idpenulis');
        if (!($user_session)) {
            return redirect()->to('/authpenulis');
        }

        //mencegah penulis mengedit profile milik penulis lain
        if ($user_session != $id) {
            return redirect()->to('/penulis');
        }

        $data = [
            'title' => 'Form Ubah Profile Penulis',
            'validation' => \Config\Services::validation(),
            'penulis' => $this->penulisModel->find($id)
        ];

        return view('penulis/profile/edit_profile', $data);
    }

    public function update($id)
    {
        $user_session = session()->has('idpenulis');
        if (!($user_session)) {
            return redirect()->to('/authpenulis');
        }

        //mencegah penulis mengedit profile milik penulis lain
        if ($user_session != $id) {
            return redirect()->to('/penulis');
        }

        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama harus diisi'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Email harus diisi',
                    'valid_email' => 'Silahkan tulis {field} dengan benar'
                ],
            ],
            'no_telp' => [
                'rules' => 'required|is_natural',
                'errors' => [
                    'required' => 'No telepon harus diisi',
                    'is_natural' => 'Silahkan tulis nomor telepon dengan benar'
                ]
            ],
            'kota' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kota harus diisi'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat harus diisi'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Password harus diisi',
                    'min_length' => 'Password minimal 8 karakter'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();

            return redirect()->back()->withInput()->with('validation', $validation);
        }

        $penulis = $this->penulisModel->find($id);
        $npassword = md5($this->request->getVar('password'));
        $oldpassword = $penulis['password'];

        if ($npassword == $oldpassword) {
            $this->penulisModel->save([
                'idpenulis' => $id,
                'nama' => $this->request->getVar('nama'),
                'email' => $this->request->getVar('email'),
                'no_telp' => $this->request->getVar('no_telp'),
                'kota' => $this->request->getVar('kota'),
                'alamat' => $this->request->getVar('alamat')
            ]);

            sweetalert('Data berhasil diubah', 'success', 'Berhasil!');

            return redirect()->back();
        } else {
            sweetalert('Masukkan password dengan benar', 'error', 'Password salah!');

            return redirect()->back()->withInput();
        }
    }

    public function ubahPassword($id)
    {
        $user_session = session()->has('idpenulis');
        if (!($user_session)) {
            return redirect()->to('/authpenulis');
        }

        //mencegah penulis mengubah password milik penulis lain
        if ($user_session != $id) {
            return redirect()->to('/penulis');
        }

        $data = [
            'title' => 'Form Ubah Password Penulis',
            'validation' => \Config\Services::validation(),
            'penulis' => $this->penulisModel->find($id)
        ];

        return view('penulis/profile/change_password', $data);
    }

    public function updatePassword($id)
    {
        $user_session = session()->has('idpenulis');
        if (!($user_session)) {
            return redirect()->to('/authpenulis');
        }

        //mencegah penulis mengubah password milik penulis lain
        if ($user_session != $id) {
            return redirect()->to('/penulis');
        }

        if (!$this->validate([
            'password' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Password harus diisi',
                    'min_length' => 'Password minimal 8 karakter'
                ]
            ],
            'newpassword' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Password baru harus diisi',
                    'min_length' => 'Password baru minimal 8 karakter'
                ]
            ],
            'confirmpassword' => [
                'rules' => 'required|min_length[8]|matches[newpassword]',
                'errors' => [
                    'required' => 'Konfirmasi password baru harus diisi',
                    'min_length' => 'Konfirmasi password baru minimal 8 karakter',
                    'matches' => 'Konfirmasi password salah, silahkan ulangi'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();

            return redirect()->back()->withInput()->with('validation', $validation);
        }

        $penulis = $this->penulisModel->find($id);
        $npassword = md5($this->request->getVar('password'));
        $oldpassword = $penulis['password'];

        if ($npassword == $oldpassword) {
            $this->penulisModel->save([
                'idpenulis' => $id,
                'password' => md5($this->request->getVar('newpassword'))
            ]);

            sweetalert('Password berhasil diubah', 'success', 'Berhasil!');

            return redirect()->back();
        } else {
            sweetalert('Masukkan password dengan benar', 'error', 'Password salah!');

            return redirect()->back()->withInput();
        }
    }
}
