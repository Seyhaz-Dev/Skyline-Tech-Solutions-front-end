<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    // Get all payments
    public function index()
    {
        return view('payments.index');
    }
    
    public function store(Request $request)
    {
        $name = $request->input('name');
        dd($request);
    }
        
}