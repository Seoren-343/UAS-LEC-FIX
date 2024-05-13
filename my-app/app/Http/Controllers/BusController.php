<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bus;

class BusController extends Controller
{
    public function categoryBus()
    {
        $buses = Bus::all();
        return view('busFol.bus', ['buses' => $buses]);
    }

    public function edit($id)
{
    // Fetch bus data for the specified ID using the Bus model
    $bus = Bus::find($id);

    // Pass the data to the edit view
    return view('busFol.busedit', ['bus' => $bus]);
}

    public function update(Request $request, Bus $bus)
    {
        $request->validate([
            'bus_picture' => 'required|image|mimes:jpeg,png,jpg,gif',
            'bus_type' => 'required|string',
            'specs' => 'required|string',
        ]);

        $bus->update($request->all());
        return redirect()->route('busFol.bus')->with('success', 'Bus updated successfully');
    }

    public function create()
    {
        return view('busFol.buscreate', ['busTypes' => ['big bus', 'medium bus', 'small bus']]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'bus_picture' => 'required|image|mimes:jpeg,png,jpg,gif',
            'bus_type' => 'required|string',
            'specs' => 'required|string',
        ]);

        Bus::create($request->all());
        return redirect()->route('busFol.bus')->with('success', 'Bus created successfully');
    }

    public function destroy(Bus $bus)
    {
        $bus->delete();
        return redirect()->route('busFol.bus')->with('success', 'Bus deleted successfully');
    }
}

