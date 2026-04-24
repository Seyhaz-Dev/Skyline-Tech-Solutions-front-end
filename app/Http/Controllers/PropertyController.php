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

        $modern = 'Modern Downtown Loft';
        $location = 'China';
        $room = '3 Beds';
        $tworoom = '2 Baths';
        $number = '1,850 sqft';
        $total = '$1,250,000';
        $image = 'images/property.jpg';

        return view('properties.index', compact('properties'),compact('modern','location','room','tworoom','number','total','image'));
    }
    public function create()
    {
        return view('properties.create');
    }

    public function store(Request $request)
    {
        // Fetch data from form
        $name = $request->input('name');
        $address = $request->input('address');
        $description = $request->input('description');

        // Save to database
        Property::create([
            'name' => $name,
            'address' => $address,
            'description' => $description,
        ]);

        return redirect()->route('properties.index');
    }
}