<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function gallery()
    {
        $buses = Bus::all();
        return view('homepage.gallery', compact('buses'));
    }
}
