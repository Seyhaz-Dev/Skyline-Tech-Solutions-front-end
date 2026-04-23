<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tenant;
use Faker\Guesser\Name;

class rentsController extends Controller
{
    public function index()
    {
        // $name = "Phanha";
        // $role = "Admin";
        // $number = "59";
        // $show = "xioe yan";
        // return view('layouts.rents', compact('name','role','number','show'));
        return view('layouts.rents');
    }
    public function store(Request $request){
        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $id_card = $request->input('id_card');
        $address = $request->input('address');

        Tenant::created([
        'name' => $name,
        'email' => $email,
        'phone' => $phone,
        'id_card' => $id_card,
        'address' => $address,
        ]);

        return redirect()->back();
    }
}
