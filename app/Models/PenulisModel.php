<?php

namespace App\Models;

use CodeIgniter\Model;

class PenulisModel extends Model
{
    protected $table      = 'penulis';
    protected $primaryKey = 'idpenulis';

    protected $returnType     = 'array';

    protected $allowedFields = ['idpenulis', 'nama', 'password', 'alamat', 'kota', 'email', 'no_telp'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // FUNCTION & METHOD //
    public function getDataPenulis($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        }

        return $this->penulisModel->where(['idpenulis' => $id])->first();
    }
}
