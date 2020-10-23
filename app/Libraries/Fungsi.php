<?php

use CodeIgniter\Database\ConnectionInterface;
use App\Models\KomentarModel;

class Fungsi
{
    protected $db;

    public function __construct(ConnectionInterface &$db)
    {
        $this->db = &$db;
        $this->komentar = new KomentarModel();
    }

    public function test()
    {
    }
}
