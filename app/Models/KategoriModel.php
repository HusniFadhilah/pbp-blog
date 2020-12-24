<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table = 'kategori';
    protected $primaryKey = 'idkategori';

    protected $allowedFields = ['nama', 'icon'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules    = [
        'nama'     => 'required',
        'icon'     => 'required'
    ];
    protected $validationMessages = [
        'nama'        => [
            'required' => 'Nama kategori harus diisi'
        ],
        'icon'        => [
            'required' => 'Icon kategori harus diisi'
        ]
    ];

    public function getKategoriByPost($idkategori)
    {
        return $this->where(['idkategori' => $idkategori])->find();
    }

    public function getPostByCategory($nama)
    {
        return $this->where(['nama' => $nama])->find();
    }
}
