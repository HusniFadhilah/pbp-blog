<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table = 'kategori';
    protected $primaryKey = 'idkategori';

    protected $allowedFields = ['nama'];
    protected $useTimestamps = true;
    protected $createdField  = 'tgl_insert';
    protected $updatedField  = 'tgl_update';

    protected $validationRules    = [
        'nama'     => 'required'
    ];
    protected $validationMessages = [
        'nama'        => [
            'required' => 'Nama kategori harus diisi'
        ]
    ];
}