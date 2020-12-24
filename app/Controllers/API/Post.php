<?php

namespace App\Controllers\API;

use CodeIgniter\RESTful\ResourceController;
use App\Models\PostModel;

class Post extends ResourceController
{
    public function __construct()
    {
        $this->postModel = new PostModel();
    }

    public function index()
    {
        $idkategori = $this->request->getVar('idkategori');
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $post = $this->postModel->all($keyword);
        } else if ($idkategori) {
            $post = $this->postModel->all(null, $idkategori);
        } else {
            // $post = $this->postModel->join('kategori', 'post.idkategori = kategori.idkategori')->join('penulis', 'penulis.idpenulis = penulis.idpenulis')->orderBy('post.tgl_insert', 'DESC');
            $post = $this->postModel->all(null);
        }
        $data = [
            'post' => $post,
        ];

        return $this->respond($data, 200);
    }
}
