<?php

namespace App\Controllers;


class AdminController extends BaseController
{
    public function admin_dashboard()
    {
        return view('admin/admin_dashboard');
    }
}