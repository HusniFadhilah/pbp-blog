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
        return $this->respond($this->kategoriModel->findAll(), 200);
    }
}
