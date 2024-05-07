<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BusController extends Controller
{
    public function categoryBus()
    {
        // Fetch bus data from the "busfleet" table
        $buses = DB::table('busfleet')->get();

        // Pass the data to the view
        return view('category.bus', ['buses' => $buses]);
    }
}
