<?php

namespace App\Database\Seeds;

use \CodeIgniter\I18n\Time;

class PostSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data = [
            'idkategori' => 1,
            'idpenulis' => 1,
            'judul' => 'Contoh Artikel',
            'slug' => 'contoh-artikel',
            'isi_post' => '<p>Hello World</p>',
            'file_gambar' => 'default.jpg',
            'tgl_insert' => Time::now(),
            'tgl_update' => Time::now(),
        ];

        // Using Query Builder
        $this->db->table('post')->insert($data);
    }
}
