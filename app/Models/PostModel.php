<?php

namespace App\Models;

use CodeIgniter\Model;

class PostModel extends Model
{
    protected $table      = 'post';
    protected $primaryKey = 'idpost';

    protected $returnType     = 'array';

    protected $allowedFields = ['idkategori', 'idpenulis', 'judul', 'isi_post', 'file_gambar'];

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
}
