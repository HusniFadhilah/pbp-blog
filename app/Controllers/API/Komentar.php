<?php

namespace App\Controllers\API;

use CodeIgniter\RESTful\ResourceController;
use App\Models\KomentarModel;

class Komentar extends ResourceController
{
    public function __construct()
    {
        $this->komentarModel = new KomentarModel();
    }

    public function index()
    {
        $idpost = $this->request->getVar('idpost');
        return $this->respond($this->komentarModel->getKomentarByPost($idpost), 200);
    }
}
