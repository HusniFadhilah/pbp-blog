<?php

namespace App\Models;

use CodeIgniter\Model;

class KomentarModel extends Model
{
    protected $table = 'komentar';
    protected $primaryKey = 'idkomentar';

    protected $returnType     = 'array';

    protected $allowedFields = ['idpost', 'idpenulis', 'isi'];
    protected $useTimestamps = true;
    protected $createdField  = 'tgl_insert';
    protected $updatedField  = 'tgl_update';

    // FUNCTION & METHOD //
    public function getDataKomentar($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        }

        return $this->komentarModel->where(['idkomentar' => $id])->first();
    }

    public function getKomentarByPost($idpost)
    {
        return $this->join('penulis', 'komentar.idpenulis = penulis.idpenulis')
            ->where(['idpost' => $idpost])->find();
    }

    public function getKomentarByPenulis($idpenulis)
    {
        return $this->join('penulis', 'komentar.idpenulis = penulis.idpenulis')
            ->where(['idpenulis' => $idpenulis])->find();
    }

    public function getKomentarInPostBelongsToPenulis($idpenulis)
    {
        return $this->join('post', 'komentar.idpost = post.idpost')
            ->where(['post.idpenulis' => $idpenulis])->find();
    }

    public function getOneKomentarInPostBelongsToPenulis($idkomentar, $idpenulis)
    {
        return $this->join('post', 'komentar.idpost = post.idpost')
            ->where(['post.idpenulis' => $idpenulis])->find($idkomentar);
    }

    public function sumKomentarInOnePost($idpost)
    {
        return count($this->where(['idpost' => $idpost])->find());
    }
}
