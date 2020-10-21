<?php

namespace App\Controllers;

use App\Models\KategoriModel;

class Kategori extends BaseController
{
    protected $kategoriModel;

    public function __construct()
    {
        $this->kategoriModel = new KategoriModel();
    }

    public function index()
    {
        $user_session = session()->has('idadmin');
        if (!($user_session)) {
            return redirect()->to('/authadmin');
        }

        $kategori = $this->kategoriModel->findAll();

        $data = [
            'kategori' => $kategori
        ];

        return view('admin/kategori/kategori_data', $data);
    }

    public function create()
    {
        $user_session = session()->has('idadmin');
        if (!($user_session)) {
            return redirect()->to('/authadmin');
        }

        $data = [
            'judul' => 'Form Tambah Kategori',
            'validation' => \Config\Services::validation()
        ];

        return view('admin/kategori/kategori_form_add', $data);
    }

    public function save()
    {
        $user_session = session()->has('idadmin');
        if (!($user_session)) {
            return redirect()->to('/authadmin');
        }

        if (!$this->validate([
            'nama' => [
                'rules' => 'required|is_unique[kategori.nama]',
                'errors' => [
                    'required' => '{field} kategori harus diisi.',
                    'is_unique' => '{field} kategori sudah ada.'
                ]
            ]
        ])){
            $validation = \Config\Services::validation();

            return redirect()->back()->withInput()->with('validation', $validation);
        }

        $this->kategoriModel->save([
            'nama' => $this->request->getVar('nama')
        ]);

        sweetalert('Data berhasil ditambahkan', 'success', 'Berhasil!');
        
        return redirect()->to('/kategori');
    }

    public function delete($id){
        $user_session = session()->has('idadmin');
        if (!($user_session)) {
            return redirect()->to('/authadmin');
        }

        $this->kategoriModel->delete($id);

        sweetalert('Data berhasil dihapus', 'success', 'Berhasil!');

        return redirect()->to('/kategori');
    }

    public function edit($id){
        $user_session = session()->has('idadmin');
        if (!($user_session)) {
            return redirect()->to('/authadmin');
        }

        $data = [
            'judul' => 'Form Ubah Kategori',
            'validation' => \Config\Services::validation(),
            'kategori' => $this->kategoriModel->find($id)
        ];

        return view('admin/kategori/kategori_form_edit', $data);
    }

    public function update($id){
        $user_session = session()->has('idadmin');
        if (!($user_session)) {
            return redirect()->to('/authadmin');
        }

        if (!$this->validate([
            'nama' => [
                'rules' => 'required|is_unique[kategori.nama]',
                'errors' => [
                    'required' => '{field} kategori harus diisi.',
                    'is_unique' => '{field} kateori sudah ada.'
                ]
            ]
        ]))
        {
            $validation = \Config\Services::validation();

            return redirect()->back()->withInput()->with('validation', $validation);
        }

        $this->kategoriModel->save([
            'idkategori' => $id,
            'nama' => $this->request->getVar('nama')
        ]);

        sweetalert('Data berhasil diubah', 'success', 'Berhasil!');

        return redirect()->to('/kategori');
    }
}
