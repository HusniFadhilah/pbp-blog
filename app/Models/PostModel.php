<?php

namespace App\Models;

use CodeIgniter\Model;

class PostModel extends Model
{
    protected $table      = 'post';
    protected $primaryKey = 'idpost';

    protected $returnType     = 'array';

    protected $allowedFields = ['idkategori', 'idpenulis', 'judul', 'slug', 'isi_post', 'file_gambar'];

    protected $useTimestamps = true;
    protected $createdField  = 'tgl_insert';
    protected $updatedField  = 'tgl_update';

    // FUNCTION & METHOD //
    public function getDataPost($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        }

        return $this->postModel->where(['idpost' => $id])->first();
    }

    public function getDataPostByPenulis($idpenulis)
    {
        return $this->postModel->where(['idpost' => $idpenulis])->first();
    }

    public function getOnePostByPenulis($idpost, $idpenulis)
    {
        return $this->postModel->where(['idpenulis' => $idpenulis, 'idpost' => $idpost]);
    }

    public function postTerbaru($limit = null)
    {
        if ($limit === false) {
            return $this->join('penulis', 'post.idpenulis = penulis.idpenulis')
                ->join('kategori', 'post.idkategori = kategori.idkategori')
                ->orderBy('post.tgl_insert', 'DESC')
                ->find();
        } else {
            return $this->join('penulis', 'post.idpenulis = penulis.idpenulis')
                ->join('kategori', 'post.idkategori = kategori.idkategori')
                ->limit($limit)
                ->orderBy('post.tgl_insert', 'DESC')
                ->find();
        }
    }

    public function pencarianPost($keyword)
    {
        return $this->join('penulis', 'post.idpenulis = penulis.idpenulis')
            ->join('kategori', 'post.idkategori = kategori.idkategori')
            ->like('isi_post', $keyword)
            ->orLike('judul', $keyword);
    }
}
