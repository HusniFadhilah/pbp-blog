<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\PenulisModel;
use App\Models\KomentarModel;
use App\Models\PostModel;
use App\Models\KategoriModel;

class Admin extends BaseController
{

    public function __construct()
    {
        $this->adminModel = new AdminModel();
        $this->penulisModel = new PenulisModel();
        $this->postModel = new PostModel();
        $this->komentarModel = new KomentarModel();
        $this->kategoriModel = new KategoriModel();
    }

    public function index()
    {
        $user_session = session()->get('idadmin');
        if (!($user_session)) {
            return redirect()->to('/authadmin');
        }
        $data = [
            'title' => 'Dashboard Admin',
            'validation' => \Config\Services::validation(),
            'jmlpenulis' => count($this->penulisModel->findAll()),
            'jmlkomentar' => count($this->komentarModel->findAll()),
            'jmlpost' => count($this->postModel->findAll()),
            'jmlkategori' => count($this->kategoriModel->findAll()),
            'jmladmin' => count($this->adminModel->findAll()),
            'kategori' => $this->kategoriModel->findAll(),
            'post' => $this->postModel->findAll()
        ];
        return view('admin/dashboard/dashboard', $data);
    }

    public function edit($id)
    {
        $user_session = session()->get('idadmin');
        if (!($user_session)) {
            return redirect()->to('/authadmin');
        }

        //mencegah admin mengubah password milik admin lain
        if ($user_session != $id) {
            return redirect()->to('/admin');
        }

        $data = [
            'title' => 'Form Ubah Profile Admin',
            'validation' => \Config\Services::validation(),
            'admin' => $this->adminModel->find($id)
        ];

        return view('admin/profile/edit_profile', $data);
    }

    public function update($id)
    {
        $user_session = session()->get('idadmin');
        if (!($user_session)) {
            return redirect()->to('/authadmin');
        }

        //mencegah admin mengubah password milik admin lain
        if ($user_session != $id) {
            return redirect()->to('/admin');
        }

        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama harus diisi'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email|is_unique[admin.email,idadmin,' . $id . ']',
                'errors' => [
                    'required' => 'Email harus diisi',
                    'valid_email' => 'Silahkan isi {field} dengan benar',
                    'is_unique' => 'Email sudah pernah digunakan'
                ],
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

        $admin = $this->adminModel->find($id);
        $npassword = md5($this->request->getVar('password'));
        $oldpassword = $admin['password'];

        if ($npassword == $oldpassword) {
            $this->adminModel->save([
                'idadmin' => $id,
                'nama' => $this->request->getVar('nama'),
                'email' => $this->request->getVar('email')
            ]);

            sweetalert('Data berhasil diubah', 'success', 'Berhasil!');

            return redirect()->back();
        } else {
            sweetalert('Masukkan password dengan benar', 'error', 'Password salah!');

            return redirect()->back()->withInput();
        }
    }

    public function reset_penulis()
    {
        $user_session = session()->get('idadmin');
        if (!($user_session)) {
            return redirect()->to('/authadmin');
        }

        $data = [
            'title' => 'Password Penulis',
            'validation' => \Config\Services::validation(),
            'penulis' => $this->penulisModel->getDataPenulis(),
            'user' => $this->adminModel->where(['idadmin' => $user_session])->first()
        ];
        return view('admin/reset_penulis/penulis_data', $data);
    }

    public function process_reset($id)
    {
        $user_session = session()->get('idadmin');
        if (!($user_session)) {
            return redirect()->to('/authadmin');
        }

        $this->penulisModel->save([
            'idpenulis' => $id,
            'password' => md5($this->penulisModel->find($id)["email"])
        ]);
        sweetalert('Password penulis berhasil direset', 'success', 'Berhasil!');
        return redirect()->to('/admin/reset_penulis')->withInput();
    }

    public function ubahPassword($id)
    {
        $user_session = session()->get('idadmin');
        if (!($user_session)) {
            return redirect()->to('/authadmin');
        }

        //mencegah admin mengubah password milik admin lain
        if ($user_session != $id) {
            return redirect()->to('/admin');
        }

        $data = [
            'title' => 'Form Ubah Password Admin',
            'validation' => \Config\Services::validation(),
            'admin' => $this->adminModel->find($id)
        ];

        return view('admin/profile/change_password', $data);
    }

    public function updatePassword($id)
    {
        $user_session = session()->get('idadmin');
        if (!($user_session)) {
            return redirect()->to('/authadmin');
        }

        //mencegah admin mengubah password milik admin lain
        if ($user_session != $id) {
            return redirect()->to('/admin');
        }

        if (!$this->validate([
            'password' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Password harus diisi.',
                    'min_length' => 'Password minimal 8 karakter'
                ]
            ],
            'newpassword' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Password baru harus diisi.',
                    'min_length' => 'Password baru minimal 8 karakter'
                ]
            ],
            'confirmpassword' => [
                'rules' => 'required|min_length[8]|matches[newpassword]',
                'errors' => [
                    'required' => 'Konfirmasi password baru harus diisi.',
                    'min_length' => 'Konfirmasi password baru minimal 8 karakter',
                    'matches' => 'Konfirmasi password salah, silahkan ulangi.'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();

            return redirect()->back()->withInput()->with('validation', $validation);
        }

        $admin = $this->adminModel->find($id);
        $npassword = md5($this->request->getVar('password'));
        $oldpassword = $admin['password'];

        if ($npassword == $oldpassword) {
            $this->adminModel->save([
                'idadmin' => $id,
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
