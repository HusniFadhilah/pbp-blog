<?php

namespace App\Database\Seeds;

use \CodeIgniter\I18n\Time;

class KategoriSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data = [
            'nama' => 'berita',
            'tgl_insert' => Time::now(),
            'tgl_update' => Time::now(),
        ];

        // Using Query Builder
        $this->db->table('kategori')->insert($data);
    }
}
