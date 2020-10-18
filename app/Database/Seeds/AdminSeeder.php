<?php

namespace App\Database\Seeds;

use \CodeIgniter\I18n\Time;

class AdminSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data = [
            'nama' => 'admin',
            'email'    => 'admin@gmail.com',
            'password'    => md5('admin@gmail.com'),
            'tgl_insert' => Time::now(),
            'tgl_update' => Time::now(),
        ];

        // Using Query Builder
        $this->db->table('admin')->insert($data);
    }
}
