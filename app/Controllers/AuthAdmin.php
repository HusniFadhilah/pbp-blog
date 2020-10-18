<?php

namespace App\Controllers;

class AuthAdmin extends BaseController
{
    public function login()
    {
        return view('admin/auth/login');
    }

    //--------------------------------------------------------------------

}
