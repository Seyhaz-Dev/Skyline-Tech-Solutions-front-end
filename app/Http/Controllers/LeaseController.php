<?php
namespace App\Http\Controllers;

use App\Models\Lease;
use App\Models\Tenant;
use App\Models\Property;
use Illuminate\Http\Request;

class LeaseController extends Controller
{
    public function index()
    {
        $leases = Lease::with(['tenant','property'])->latest()->get();
        $tenants = Tenant::all();
        $properties = Property::all();

        return view('leases.index', compact('leases','tenants','properties'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tenant_id' => 'required',
            'property_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'rent' => 'required',
        ]);

        Lease::create($request->all());

        return redirect()->back()->with('success', 'Lease created!');
    }
}