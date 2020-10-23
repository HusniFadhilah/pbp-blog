<?php

namespace App\Database\Seeds;

use \CodeIgniter\I18n\Time;

class KomentarSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data = [
            [
                'idpost' => 1,
                'idpenulis' => 1,
                'isi' => 'Hello World, testing komentar',
                'tgl_insert' => Time::now(),
                'tgl_update' => Time::now(),
            ],
            [
                'idpost' => 2,
                'idpenulis' => 2,
                'isi' => 'Artikelnya sangat menarik',
                'tgl_insert' => Time::parse('October 22, 2020 08:39:30', 'Asia/Jakarta'),
                'tgl_update' => Time::parse('October 22, 2020 08:45:30', 'Asia/Jakarta'),
            ],
            [
                'idpost' => 2,
                'idpenulis' => 1,
                'isi' => 'Terimakasih, semoga bermanfaat',
                'tgl_insert' => Time::parse('October 22, 2020 09:49:10', 'Asia/Jakarta'),
                'tgl_update' => Time::parse('October 22, 2020 09:55:10', 'Asia/Jakarta'),
            ],
            [
                'idpost' => 2,
                'idpenulis' => 2,
                'isi' => 'Mantap',
                'tgl_insert' => Time::parse('October 23, 2020 07:19:18', 'Asia/Jakarta'),
                'tgl_update' => Time::parse('October 23, 2020 07:25:30', 'Asia/Jakarta'),
            ],
            [
                'idpost' => 3,
                'idpenulis' => 1,
                'isi' => 'Ide bagus undip',
                'tgl_insert' => Time::parse('October 21, 2020 19:39:28', 'Asia/Jakarta'),
                'tgl_update' => Time::parse('October 21, 2020 20:35:14', 'Asia/Jakarta'),
            ],
            [
                'idpost' => 4,
                'idpenulis' => 1,
                'isi' => 'Inikah kelakuan mahasiswa sekarang?',
                'tgl_insert' => Time::parse('October 12, 2020 18:08:31', 'Asia/Jakarta'),
                'tgl_update' => Time::parse('October 12, 2020 18:13:36', 'Asia/Jakarta'),
            ],
        ];

        // Using Query Builder
        $this->db->table('komentar')->insertBatch($data);
    }
}
