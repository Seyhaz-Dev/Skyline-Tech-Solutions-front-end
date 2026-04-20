<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class rentsController extends Controller
{
    public function index()
    {
        $name = "Phanha";
        $role = "Admin";
        $number = "59";
        $show = "xioe yan";
        return view('layouts.rents', compact('name','role','number','show'));
        // [
        //     'name' => $name,
        //     'role' => $role,
        //     'number' => $number,
        //     'show' => $show,
        // ];

    }
}
