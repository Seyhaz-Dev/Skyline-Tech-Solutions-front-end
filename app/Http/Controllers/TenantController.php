<?php
// app/Http/Controllers/TenantController.php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    public function index()
    {
        $tenants = Tenant::latest()->paginate(10);
        return view('tenants.index', compact('tenants'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        Tenant::create($request->all());

        return redirect()->route('tenants.index')
            ->with('success', 'Tenant created successfully');
    }

    public function update(Request $request, Tenant $tenant)
    {
        $tenant->update($request->all());

        return redirect()->route('tenants.index')
            ->with('success', 'Tenant updated successfully');
    }

    public function destroy(Tenant $tenant)
    {
        $tenant->delete();

        return redirect()->route('tenants.index')
            ->with('success', 'Tenant deleted');
    }
}