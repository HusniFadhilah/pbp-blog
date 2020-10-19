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
        $kategori = $this->kategoriModel->findAll();

        $data = [
            'kategori' => $kategori
        ];

        return view('admin/kategori/kategori_data', $data);
    }

    public function create()
    {
//        session();
        $data = [
            'judul' => 'Form Tambah Kategori',
            'validation' => \Config\Services::validation()
        ];

        return view('admin/kategori/kategori_form_add', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'nama' => [
                'rules' => 'required|is_unique[kategori.nama]',
                'errors' => [
                    'required' => '{field} kategori harus diisi.',
                    'is_unique' => '{field} kateori sudah ada.'
                ]
            ]
        ])){
            $validation = \Config\Services::validation();

            return redirect()->to('create')->withInput()->with('validation', $validation);
        }

        $this->kategoriModel->save([
            'nama' => $this->request->getVar('nama')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        
        return redirect()->to('/kategori');
    }

    public function delete($id){
        $this->kategoriModel->delete($id);

        session()->setFlashdata('pesan', 'Data berhasil dihapus');

        return redirect()->to('/kategori');
    }

    public function edit($id){
        $data = [
            'judul' => 'Form Ubah Kategori',
            'validation' => \Config\Services::validation(),
            'kategori' => $this->kategoriModel->find($id)
        ];

        return view('admin/kategori/kategori_form_edit', $data);
    }

    public function update($id){
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

            return redirect()->to('/kategori/edit/'.$id)->withInput()->with('validation', $validation);
        }

        $this->kategoriModel->save([
            'idkategori' => $id,
            'nama' => $this->request->getVar('nama')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah.');

        return redirect()->to('/kategori');
    }
}
