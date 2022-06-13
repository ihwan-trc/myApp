<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GheptechController extends Controller
{
    public function home()
    {
        return view('gheptech.home');
    }
}
