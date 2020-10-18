<?php

namespace App\Database\Seeds;

use \CodeIgniter\I18n\Time;

class PenulisSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data = [
            'nama' => 'penulis',
            'password'    => md5('penulis@gmail.com'),
            'alamat' => 'Jl. Prof. Soedarto',
            'kota' => 'Semarang',
            'email'    => 'penulis@gmail.com',
            'no_telp' => '0888888888',
            'tgl_insert' => Time::now(),
            'tgl_update' => Time::now(),
        ];

        // Using Query Builder
        $this->db->table('penulis')->insert($data);
    }
}
