<?php

namespace App\Models;

use CodeIgniter\Model;

class KomentarModel extends Model
{
    protected $table = 'komentar';
    protected $primaryKey = 'idkomentar';

    protected $allowedFields = ['idpost', 'idpenulis', 'isi'];
    protected $useTimestamps = true;
    protected $createdField  = 'tgl_insert';
    protected $updatedField  = 'tgl_update';

    protected $validationRules    = [
        'nama'     => 'required',
        'idpenulis'     => 'required',
        'idpost'     => 'required'
    ];
    protected $validationMessages = [
        'nama'        => [
            'required' => 'Nama kategori harus diisi'
        ],
        'idpenulis'        => [
            'required' => 'Penulis harus diisi'
        ],
        'idpost'        => [
            'required' => 'Post harus diisi'
        ]
    ];
}
