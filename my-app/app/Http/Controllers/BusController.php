<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bus;
use Illuminate\Support\Facades\Storage;
use App\Models\BusImage;

class BusController extends Controller
{
    public function categoryBus()
    {
        $buses = Bus::with('additionalImages')->get();
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

        if ($request->has('delete_bus_picture') && $request->delete_bus_picture == 1) {
            Storage::delete($bus->bus_picture);
            $bus->bus_picture = null;
        }

        if ($request->has('delete_additional_images')) {
            foreach ($request->delete_additional_images as $imageId) {
                $image = BusImage::findOrFail($imageId);
                Storage::delete($image->image_path);
                $image->delete();
            }
        }

        $bus->bus_type = $request->input('bus_type');
        $bus->specs = $request->input('specs');

        if ($request->hasFile('bus_picture')) {
            $busPicturePath = $request->file('bus_picture')->store('photos');
            $bus->bus_picture = $busPicturePath;
        }

        if ($request->hasFile('new_additional_images')) {
            foreach ($request->file('new_additional_images') as $image) {
                $fileName = time() . '_' . $image->getClientOriginalName();
                $image->storeAs('public/photos', $fileName); // Save in the same path as bus_picture
                $imagePath = 'storage/photos/' . $fileName;
                $busImage = new BusImage(['image_path' => $imagePath]);
                $bus->additionalImages()->save($busImage);
            }
        }

        $bus->save();

        return redirect()->route('busFol.bus', $bus->id)->with('success', 'Bus updated successfully.');
    }

    public function creation()
    {
        return view('busFol.buscreation', ['busTypes' => ['big bus', 'medium bus', 'small bus']]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'bus_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'bus_type' => 'required|string',
            'specs' => 'required|string',
            'additional_images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $bus_picture = null;

        if ($request->hasFile('bus_picture')) {
            $file = $request->file('bus_picture');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/photos', $fileName);
            $bus_picture = 'storage/photos/' . $fileName;
        }

        $bus = Bus::create([
            'bus_picture' => $bus_picture,
            'bus_type' => $request->bus_type,
            'specs' => $request->specs,
        ]);

        if ($request->hasFile('additional_images')) {
            foreach ($request->file('additional_images') as $additionalImage) {
                $fileName = time() . '_' . $additionalImage->getClientOriginalName();
                $additionalImage->storeAs('public/photos', $fileName);
                $imagePath = 'storage/photos/' . $fileName;

                $bus->additionalimages()->create(['image_path' => $imagePath]);
            }
        }

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
