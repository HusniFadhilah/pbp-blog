<?php

namespace App\Controllers;

use App\Models\KategoriModel;

class About extends BaseController
{
    public function __construct()
    {
        $this->kategoriModel = new KategoriModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Tentang Kami',
            'allkategori' => $this->kategoriModel->findAll()
        ];
        return view('public/about/about', $data);
    }
}
