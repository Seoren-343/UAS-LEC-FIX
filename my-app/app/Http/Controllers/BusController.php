<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bus;
use Illuminate\Support\Facades\Storage;

class BusController extends Controller
{
    public function categoryBus()
    {
        $buses = Bus::all();
        return view('busFol.bus', ['buses' => $buses]);
    }


    public function edit($id)
    {
        $bus = Bus::find($id);
        
        return view('busFol.busedit', ['bus' => $bus]);
    }
    
    public function update(Request $request, $id)
    {
        $bus = Bus::findOrFail($id);

        $request->validate([
            'bus_type' => 'required|string',
            'specs' => 'required|string',
            'new_bus_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'additional_images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('new_bus_picture')) {
            if ($bus->bus_picture) {
                Storage::disk('public')->delete($bus->bus_picture);
            }
            $path = $request->file('new_bus_picture')->store('bus_pictures', 'public');
            $bus->bus_picture = $path;
        }

        if ($request->hasFile('additional_images')) {
            foreach ($request->file('additional_images') as $additionalImage) {
                $path = $additionalImage->store('bus_pictures', 'public');
                $bus->additional_images()->create(['image_path' => $path]);
            }
        }

        $bus->bus_type = $request->input('bus_type');
        $bus->specs = $request->input('specs');
        $bus->save();

        return redirect()->route('busFol.bus')->with('success', 'Bus updated successfully');
    }


    public function create()
    {
        return view('busFol.buscreate', ['busTypes' => ['big bus', 'medium bus', 'small bus']]);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'bus_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'bus_type' => 'required|string',
            'specs' => 'required|string',
        ]);

        if ($request->hasFile('bus_picture')) {
            $file = $request->file('bus_picture');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/photos', $fileName);
            $bus_picture = 'storage/photos/' . $fileName;
        }

        Bus::create([
            'bus_picture' => $bus_picture,
            'bus_type' => $request->bus_type,
            'specs' => $request->specs,
        ]);

        return redirect()->route('busFol.bus')->with('success', 'Bus created successfully');
    }
    
    public function destroy($id)
    {
        $bus = Bus::findOrFail($id);
        $bus->delete();
        return redirect()->route('busFol.bus')->with('success', 'Bus deleted successfully');
    }
    public function show($id)
{
    $bus = Bus::findOrFail($id);
    
    return view('busFol.busshow', ['bus' => $bus]);
}


}


