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
    public function getDataPost($id = false, $idpenulis = false)
    {
        if ($id === false) {
            return $this->join('penulis', 'post.idpenulis = penulis.idpenulis')
                ->join('kategori', 'post.idkategori = kategori.idkategori')
                ->findAll();
        }

        return $this->postModel->where(['idpost' => $id])->first();
    }

    public function getDataPostBySlug($slug)
    {
        return $this->join('penulis', 'post.idpenulis = penulis.idpenulis')
            ->join('kategori', 'post.idkategori = kategori.idkategori')
            ->where(['slug' => $slug])
            ->first();
    }

    public function getDataPostByPenulis($idpenulis)
    {
        return $this->join('kategori', 'post.idkategori = kategori.idkategori')
            ->where(['idpenulis' => $idpenulis])->find();
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

    public function groupPost($id)
    {
        return $this->join('kategori', 'post.idkategori = kategori.idkategori')
            ->where(['kategori.idkategori' => $id])
            ->orderBy('post.tgl_insert', 'DESC');
    }

    public function groupPostBySimilarCategory($idkategori, $idpost, $limit)
    {
        return $this->join('kategori', 'post.idkategori = kategori.idkategori')
            ->where(['kategori.idkategori' => $idkategori])
            ->where('post.idpost !=', $idpost)
            ->limit($limit)
            ->orderBy('post.tgl_insert', 'DESC')
            ->find();
    }

    public function postSortByKomentar($limit)
    {
        return $this->join('komentar', 'komentar.idpost = post.idpost')
            ->orderBy('post.tgl_insert', 'DESC')
            ->find();
    }

    public function sumPostByKategori($idkategori)
    {
        return count($this->groupPost($idkategori)->find());
    }
}
