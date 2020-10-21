<?php

namespace App\Controllers;

class Komentar extends BaseController
{
    public function index()
    {
        // return view('penulis/komentar/komentar_data');
    }

    //--------------------------------------------------------------------
    public function data()
    {
        return view('penulis/komentar/komentar_data');
    }
}
