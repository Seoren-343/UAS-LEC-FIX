<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FounderController extends Controller
{
    public function founder()
    {
        return view('homepage.founder');
    }
}
