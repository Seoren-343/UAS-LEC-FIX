<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function contacts()
    {
        return view('homepage.index');
    }
}
