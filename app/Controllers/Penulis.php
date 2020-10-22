<?php

namespace App\Controllers;

use App\Models\PenulisModel;

class Penulis extends BaseController
{
    public function __construct()
    {
        $this->penulisModel = new PenulisModel();
    }

    public function index()
    {
        $user_session = session()->has('idpenulis');
        if (!($user_session)) {
            return redirect()->to('/authpenulis');
        }

        return view('penulis/dashboard/dashboard');
    }

    public function edit($id){
        $user_session = session()->has('idpenulis');
        if (!($user_session)) {
            return redirect()->to('/authpenulis');
        }

        $data = [
            'judul' => 'Form Ubah Profile Admin',
            'validation' => \Config\Services::validation(),
            'penulis' => $this->penulisModel->find($id)
        ];

        return view('penulis/profile/edit_profile', $data);
    }

    public function update($id){
        $user_session = session()->has('idpenulis');
        if (!($user_session)) {
            return redirect()->to('/authpenulis');
        }

        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'valid_email' => 'silahkan tulis {field} dengan benar'
                ],
            ],
            'no_telp' => [
                'rules' => 'required|is_natural',
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'is_natural' => 'silahkan tulis nomor telepon dengan benar'
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
            'password' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'min_length' => '{field} minimal 8 karakter'
                ]
            ]
        ]))
        {
            $validation = \Config\Services::validation();

            return redirect()->back()->withInput()->with('validation', $validation);
        }

        $admin = $this->penulisModel->find($id);
        $npassword = md5($this->request->getVar('password'));
        $oldpassword = $admin['password'];

        if ($npassword == $oldpassword){
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
        } else{
            sweetalert('Masukkan password dengan benar', 'error', 'Password salah!');

            return redirect()->back()->withInput();
        }
    }

}
