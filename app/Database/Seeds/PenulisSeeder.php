<?php

namespace App\Database\Seeds;

use \CodeIgniter\I18n\Time;

class PenulisSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data = [
            [
                'nama' => 'penulis',
                'password'    => md5('penulis@gmail.com'),
                'alamat' => 'Jl. Prof. Soedarto',
                'kota' => 'Semarang',
                'email'    => 'penulis@gmail.com',
                'no_telp' => '0888888888',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'nama' => 'penulis1',
                'password'    => md5('penulis1@gmail.com'),
                'alamat' => 'Jl. Banjarsari',
                'kota' => 'Semarang',
                'email'    => 'penulis1@gmail.com',
                'no_telp' => '0877777777',
                'created_at' => Time::parse('May 1, 2020 09:25:30', 'Asia/Jakarta'),
                'updated_at' => Time::parse('May 1, 2020 09:35:30', 'Asia/Jakarta'),
            ],
        ];

        // Using Query Builder
        $this->db->table('penulis')->insertBatch($data);
    }
}
