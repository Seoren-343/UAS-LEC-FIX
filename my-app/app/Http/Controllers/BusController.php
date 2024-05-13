<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bus;

class BusController extends Controller
{
    public function categoryBus()
    {
        // Fetch bus data from the "busfleet" table using the Bus model
        $buses = Bus::all();

        // Pass the data to the view
        return view('busFol.bus', ['buses' => $buses]);
    }

    public function edit($id)
    {
        // Fetch bus data for the specified ID using the Bus model
        $bus = Bus::find($id);

        // Pass the data to the edit view
        return view('busFol.busedit', ['bus' => $bus]);
    }

    public function update(Request $request, $id)
    {
        // Validate the update request
        $validatedData = $request->validate([
            'bus_picture' => 'required|string',
            'bus_type' => 'required|string',
            'specs' => 'required|string',
        ]);

        // Update the bus data in the database using the Bus model
        $bus = Bus::find($id);
        $bus->bus_picture = $validatedData['bus_picture'];
        $bus->bus_type = $validatedData['bus_type'];
        $bus->specs = $validatedData['specs'];
        $bus->save();

        // Redirect back with success message
        return redirect()->route('busFol.bus')->with('success', 'Bus data updated successfully.');
    }

    public function create()
    {
        // Return the create view with bus type options
        return view('busFol.buscreate', ['busTypes' => ['big bus', 'medium bus', 'small bus']]);
    }

    public function store(Request $request)
    {
        // Validate the store request
        $validatedData = $request->validate([
            'bus_picture' => 'required|string',
            'bus_type' => 'required|string',
            'specs' => 'required|string',
        ]);

        // Create a new bus instance using the Bus model
        $bus = new Bus();
        $bus->bus_picture = $validatedData['bus_picture'];
        $bus->bus_type = $validatedData['bus_type'];
        $bus->specs = $validatedData['specs'];
        $bus->save();

        // Redirect back with success message
        return redirect()->route('busFol.bus')->with('success', 'Bus data added successfully.');
    }

    public function destroy($id)
    {
        // Delete the bus data from the database using the Bus model
        Bus::destroy($id);

        // Redirect back with success message
        return redirect()->route('busFol.bus')->with('success', 'Bus data deleted successfully.');
    }
}
