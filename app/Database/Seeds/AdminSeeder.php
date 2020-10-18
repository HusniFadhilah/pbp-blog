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

        // Simple Queries
        $this->db->query(
            "INSERT INTO admin (nama, email, password, tgl_insert, tgl_update) VALUES(:nama:, :email:, :password:, :tgl_insert:, :tgl_update:)",
            $data
        );

        // Using Query Builder
        $this->db->table('admin')->insert($data);
    }
}
