<?php

namespace App\Database\Seeds;

use \CodeIgniter\I18n\Time;

class KomentarSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data = [
            'idpost' => 1,
            'idpenulis' => 1,
            'isi' => 'Hello World, testing komentar',
            'tgl_insert' => Time::now(),
            'tgl_update' => Time::now(),
        ];

        // Using Query Builder
        $this->db->table('komentar')->insert($data);
    }
}
