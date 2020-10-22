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

    public function groupPost($id)
    {
        return $this->join('kategori', 'post.idkategori = kategori.idkategori')
            ->where(['kategori.idkategori' => $id])
            ->orderBy('post.tgl_insert', 'DESC');
    }

    // public function prevPost($id)
    // {
    //     // return $this->db->query("SELECT * FROM divisi WHERE id_divisi = (SELECT max(id_divisi) FROM divisi WHERE id_divisi < $id)");
    //     // return $this->where(['idpost' => $this->selectMax('idpost')->where('idpost' < $id)])->find();
    // }

    // public function nextPost($id)
    // {
    //     // return $this->db->query("SELECT * FROM divisi WHERE id_divisi = (SELECT max(id_divisi) FROM divisi WHERE id_divisi < $id)");
    //     // return $this->where('idpost', $this->selectMax('idpost')->where('idpost' > $id))->find();
    // }
}
