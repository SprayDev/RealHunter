<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index()
    {
        return view('pages.index');
    }

    public function permissions()
    {
        return view('pages.permissions');
    }

    public function permission()
    {
        return view('pages.permission');
    }
}
