<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PropertiesController extends Controller
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
            'layouts.properties.properties',
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