<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class staticController extends Controller
{
    public function __invoke($page)
    {
        return view('pages.'.$page);
    }
}
