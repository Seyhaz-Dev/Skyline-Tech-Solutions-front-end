<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    // Get all properties
    public function index()
    {
        return Property::all();
    }

    // Store new property
    public function store(Request $request)
    {
        return Property::create($request->all());
    }

    // Get single property
    public function show($id)
    {
        return Property::findOrFail($id);
    }

    // Update property
    public function update(Request $request, $id)
    {
        $property = Property::findOrFail($id);
        $property->update($request->all());

        return $property;
    }

    // Delete property
    public function destroy($id)
    {
        Property::destroy($id);
        return response()->json(['message' => 'Deleted successfully']);
    }
}