<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index()
    {
        $modern = 'Modern Downtown Loft';
        $location = 'China';
        $room = '3 Beds';
        $tworoom = '2 Baths';
        $number = '1,850 sqft';
        $total = '$1,250,000';
        $image = 'images/property.jpg';

        return view(
            'properties.index',
            compact(
                'modern',
                'location',
                'room',
                'tworoom',
                'number',
                'total',
                'image'
            )
        );
    }
}
