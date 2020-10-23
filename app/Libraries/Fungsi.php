<?php

namespace App\Libraries;

use App\Models\KomentarModel;
use App\Models\PostModel;

class Fungsi
{
    protected $komentar;

    public function sumKomentarInOnePost($idpost)
    {
        $this->komentarModel = new KomentarModel();
        return $this->komentarModel->sumKomentarInOnePost($idpost);
    }

    public function sumPostByKategori($idkategori)
    {
        $this->postModel = new PostModel();
        return $this->postModel->sumPostByKategori($idkategori);
    }
}
