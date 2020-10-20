<?php

namespace App\Controllers;

class Penulis extends BaseController
{
    public function index()
    {
        $user_session = session()->has('idpenulis');
        if (!($user_session)) {
            return redirect()->to('/authpenulis');
        }
        return view('penulis/dashboard/dashboard');
    }

    //--------------------------------------------------------------------

}
