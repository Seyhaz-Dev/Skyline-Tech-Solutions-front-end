<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Lease;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    // Show all payments
    public function index()
    {
        $payments = Payment::with('lease')->latest()->get();

        return view('payments.index', compact('payments'));
    }

    // Show create form
    public function create()
    {
        $leases = Lease::all();

        return view('payments.create', compact('leases'));
    }

    // Store payment
    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'lease_id' => 'required|exists:leases,id',
            'amount' => 'required|numeric|min:0',
            'payment_date' => 'required|date',
            'payment_method' => 'required|string|max:255',
            'status' => 'required|string|max:50',
        ]);

        // Save payment
        Payment::create([
            'lease_id' => $request->lease,
            'amount' => $request->amount,
            'payment_date' => $request->payment_date,
            'payment_method' => $request->payment_method,
            'status' => $request->status,
        ]);

        return redirect()->route('payments.index')
            ->with('success', 'Payment created successfully!');
    }

    // Show single payment
    public function show($id)
    {
        $payment = Payment::with('lease')->findOrFail($id);

        return view('payments.show', compact('payment'));
    }

    // Delete payment
    public function destroy($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->delete();

        return redirect()->back()
            ->with('success', 'Payment deleted successfully!');
    }
}