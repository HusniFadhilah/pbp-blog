<?php

namespace App\Controllers\API;

use CodeIgniter\RESTful\ResourceController;
use App\Models\KategoriModel;

class Kategori extends ResourceController
{
    public function __construct()
    {
        $this->kategoriModel = new KategoriModel();
    }

    public function index()
    {
        $data = [
            'kategori' => $this->kategoriModel->findAll(),
        ];
        return $this->respond($data, 200);
    }
}
