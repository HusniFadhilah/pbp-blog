<?php

namespace App\Libraries;

use App\Models\KomentarModel;

class Fungsi
{
    protected $komentar;

    public function sumKomentarInOnePost($idpost)
    {
        $this->komentarModel = new KomentarModel();
        return $this->komentarModel->sumKomentarInOnePost($idpost);
    }
}
