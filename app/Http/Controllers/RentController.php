<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RentController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
    return view ('components.rent');
    }
    
}
