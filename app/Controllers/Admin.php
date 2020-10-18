<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index()
    {
        $user_session = session()->has('idadmin');
        if (!($user_session)) {
            return redirect()->to('/authadmin');
        }
        return view('admin/dashboard/dashboard');
    }

    //--------------------------------------------------------------------

}
