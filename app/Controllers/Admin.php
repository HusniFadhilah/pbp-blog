<?php

namespace App\Controllers;

use App\Models\AdminModel;

class Admin extends BaseController
{
    protected $adminModel;

    public function __construct()
    {
        $this->adminModel = new AdminModel();
    }

    public function index()
    {
        $user_session = session()->has('idadmin');
        if (!($user_session)) {
            return redirect()->to('/authadmin');
        }
        return view('admin/dashboard/dashboard');
    }

    public function edit($id){
        $data = [
            'judul' => 'Form Ubah Profile Admin',
            'validation' => \Config\Services::validation(),
            'admin' => $this->adminModel->find($id)
        ];

        return view('admin/profile/edit_profile', $data);
    }

    public function update($id){
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

        $admin = $this->adminModel->find($id);
        $npassword = md5($this->request->getVar('password'));
        $oldpassword = $admin['password'];

        if ($npassword == $oldpassword){
            $this->adminModel->save([
                'idadmin' => $id,
                'nama' => $this->request->getVar('nama'),
                'email' => $this->request->getVar('email')
            ]);

            sweetalert('Data berhasil diubah', 'success', 'Berhasil!');

            return redirect()->back();
        } else{
            sweetalert('Masukkan password dengan benar', 'error', 'Password salah!');

            return redirect()->back()->withInput();
        }
    }

}
