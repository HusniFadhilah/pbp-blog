<?php

namespace App\Database\Seeds;

use \CodeIgniter\I18n\Time;

class AdminSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data = [
            [
                'nama' => 'admin',
                'email'    => 'admin@gmail.com',
                'password'    => md5('admin@gmail.com'),
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'nama' => 'admin1',
                'email'    => 'admin1@gmail.com',
                'password'    => md5('admin1@gmail.com'),
                'created_at' => Time::parse('March 21, 2020 11:45:30', 'Asia/Jakarta'),
                'updated_at' => Time::parse('March 21, 2020 11:55:30', 'Asia/Jakarta'),
            ],
            [
                'nama' => 'admin2',
                'email'    => 'admin2@gmail.com',
                'password'    => md5('admin2@gmail.com'),
                'created_at' => Time::parse('January 27, 2020 10:21:30', 'Asia/Jakarta'),
                'updated_at' => Time::parse('January 27, 2020 10:39:30', 'Asia/Jakarta'),
            ]
        ];

        // Using Query Builder
        $this->db->table('admin')->insertBatch($data);
    }
}
