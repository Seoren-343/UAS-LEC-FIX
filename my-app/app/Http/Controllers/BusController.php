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
        return view('busFol.bus', ['buses' => $buses]);
    }

    public function edit($id)
    {
        // Fetch bus data for the specified ID
        $bus = DB::table('busfleet')->where('id', $id)->first();

        // Pass the data to the edit view
        return view('busFol.edit', ['bus' => $bus]);
    }

    public function update(Request $request, $id)
    {
        // Validate the update request
        $validatedData = $request->validate([
            'bus_picture' => 'required|string',
            'bus_type' => 'required|string',
            'specs' => 'required|string',
        ]);

        // Update the bus data in the database
        DB::table('busfleet')->where('id', $id)->update([
            'bus_picture' => $validatedData['bus_picture'],
            'bus_type' => $validatedData['bus_type'],
            'specs' => $validatedData['specs'],
        ]);

        // Redirect back with success message
        return redirect()->route('busFol.bus')->with('success', 'Bus data updated successfully.');
    }

    public function create()
    {
        // Return the create view
        return view('busFol.create');
    }

    public function store(Request $request)
    {
        // Validate the store request
        $validatedData = $request->validate([
            'bus_picture' => 'required|string',
            'bus_type' => 'required|string',
            'specs' => 'required|string',
        ]);

        // Insert new bus data into the database
        DB::table('busfleet')->insert([
            'bus_picture' => $validatedData['bus_picture'],
            'bus_type' => $validatedData['bus_type'],
            'specs' => $validatedData['specs'],
        ]);

        // Redirect back with success message
        return redirect()->route('busFol.bus')->with('success', 'Bus data added successfully.');
    }

    public function destroy($id)
    {
        // Delete the bus data from the database
        DB::table('busfleet')->where('id', $id)->delete();

        // Redirect back with success message
        return redirect()->route('busFol.bus')->with('success', 'Bus data deleted successfully.');
    }
}

