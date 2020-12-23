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
        $data = [
            'komentar' => $this->komentarModel->getKomentarByPost($idpost),
        ];
        return $this->respond($data, 200);
    }
}
