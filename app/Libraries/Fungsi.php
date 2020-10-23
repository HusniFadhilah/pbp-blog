<?php

namespace App\Libraries;

use App\Models\KomentarModel;
use App\Models\PostModel;
use App\Models\KategoriModel;
use App\Models\PenulisModel;

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

    public function getKategoriByPost($idkategori)
    {
        $this->kategoriModel = new KategoriModel();
        return $this->kategoriModel->getKategoriByPost($idkategori);
    }

    public function getPenulis($idpenulis)
    {
        $this->penulisModel = new PenulisModel();
        return $this->penulisModel->find($idpenulis);
    }
}
