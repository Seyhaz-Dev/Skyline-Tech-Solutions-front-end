<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    // Show all properties
    public function index()
    {
        $properties = Property::all();

        return view('properties.index', compact('properties'));
    }

    // Show create form
    public function create()
    {
        return view('properties.create');
    }

    // Store property
    public function store(Request $request)
    {
        // Optional validation (recommended)
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'description' => 'nullable',
            'room' => 'nullable',
            'room2' => 'nullable',
            'size' => 'nullable',
            'total' => 'nullable',
        ]);

        // Save to database
        Property::create([
            'name' => $request->name,
            'address' => $request->address,
            'description' => $request->description,
            'room' => $request->room,
            'room2' => $request->room2,
            'size' => $request->size,
            'total' => $request->total,
        ]);

        return redirect()->back();
    }
    public function show($id)
    {
        $property = Property::findOrFail($id);

        return view('properties.show', compact('property'));
    }
    public function destroy($id)
{
    $property = Property::findOrFail($id);
    $property->delete();

    return redirect()->back();
}
}