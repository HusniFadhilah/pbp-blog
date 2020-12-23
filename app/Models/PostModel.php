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

    public function groupPost($nama)
    {
        return $this->join('kategori', 'post.idkategori = kategori.idkategori')
            ->where(['kategori.nama' => $nama])
            ->orderBy('post.tgl_insert', 'DESC');
    }

    public function groupPostById($idkategori)
    {
        return $this->join('kategori', 'post.idkategori = kategori.idkategori')
            ->where(['kategori.idkategori' => $idkategori])
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
        return count($this->groupPostById($idkategori)->find());
    }


    //// ADDITION FOR API ////
    public function all($keyword = null)
    {
        if ($keyword != null) {
            return $this->db->query("SELECT post.idpost, post.judul, post.slug, post.isi_post, post.file_gambar, post.tgl_insert, post.tgl_update, kategori.idkategori as idkategori, penulis.idpenulis as idpenulis, kategori.nama as namakategori, penulis.nama as namapenulis FROM post JOIN kategori ON kategori.idkategori = post.idkategori JOIN penulis ON penulis.idpenulis = post.idpenulis WHERE post.judul LIKE '%" . $keyword . "%' ORDER BY post.tgl_insert DESC")->getResult();
        } else {
            return $this->db->query("SELECT post.idpost, post.judul, post.slug, post.isi_post, post.file_gambar, post.tgl_insert, post.tgl_update, kategori.idkategori as idkategori, penulis.idpenulis as idpenulis,kategori.nama as namakategori, penulis.nama as namapenulis FROM post JOIN kategori ON kategori.idkategori = post.idkategori JOIN penulis ON penulis.idpenulis = post.idpenulis ORDER BY post.tgl_insert DESC")->getResult();
        }
    }
}
