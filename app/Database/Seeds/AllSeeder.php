<?php

namespace App\Database\Seeds;

class AllSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $this->call('AdminSeeder');
        $this->call('KategoriSeeder');
        $this->call('KomentarSeeder');
        $this->call('PenulisSeeder');
        $this->call('PostSeeder');
    }
}
