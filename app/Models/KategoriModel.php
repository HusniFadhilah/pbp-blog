<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table = 'kategori';
    protected $primaryKey = 'idkategori';

    protected $allowedFields = ['nama'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules    = [
        'nama'     => 'required'
    ];
    protected $validationMessages = [
        'nama'        => [
            'required' => 'Nama kategori harus diisi'
        ]
    ];
}