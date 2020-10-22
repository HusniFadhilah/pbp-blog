<?php

namespace App\Controllers;

use App\Models\KomentarModel;

class Komentar extends BaseController
{

    public function __construct()
    {
        $this->komentarModel = new KomentarModel();
    }


    public function index()
    {
        // return view('penulis/komentar/komentar_data');
    }

    public function save()
    {
        $user_session = session()->has('idpenulis');
        if (!($user_session)) {
            return redirect()->to('/authpenulis');
        }

        if (!$this->validate([
            'isi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} komentar harus diisi.'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();

            return redirect()->back()->withInput()->with('validation', $validation);
        }


        // dd($this->request->getVar());
        $this->komentarModel->save([
            'idpost' => $this->request->getVar('idpost'),
            'idpenulis' => $this->request->getVar('idpenulis'),
            'isi' => $this->request->getVar('isi'),
        ]);

        sweetalert('Komentar berhasil ditambahkan', 'success', 'Berhasil!');
        session()->remove('emailPenulis');
        session()->remove('idpenulis');
        session()->remove('isLoggedInPenulis');
        return redirect()->back();
    }

    //--------------------------------------------------------------------
    public function data()
    {
        return view('penulis/komentar/komentar_data');
    }
}
