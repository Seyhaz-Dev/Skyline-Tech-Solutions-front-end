<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TenantController extends Controller
{
    /**
     * Display a listing of tenants.
     */
    public function index()
    {
        $tenants = Tenant::orderBy('created_at', 'desc')->paginate(10);
        return view('tenants.index', compact('tenants'));
    }

    /**
     * Show the form for creating a new tenant.
     */
    public function create()
    {
        return view('tenants.create');
    }

    /**
     * Store a newly created tenant in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|unique:tenants,email|max:255',
            'phone' => 'nullable|string|max:20|unique:tenants,phone',
            'property' => 'required|string|max:255',
            'lease_start' => 'nullable|date',
            'lease_end' => 'nullable|date|after_or_equal:lease_start',
            'monthly_rent' => 'required|numeric|min:0',
            'status' => 'required|in:active,pending,inactive'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Create the tenant
        $tenant = Tenant::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'property' => $request->property,
            'lease_start' => $request->lease_start,
            'lease_end' => $request->lease_end,
            'monthly_rent' => $request->monthly_rent,
            'status' => $request->status
        ]);

        // Redirect with success message
        return redirect()->route('tenants.index')
            ->with('success', 'Tenant added successfully!')
            ->with('tenant', $tenant);
    }

    /**
     * Display the specified tenant.
     */
    public function show(Tenant $tenant)
    {
        return view('tenants.show', compact('tenant'));
    }

    /**
     * Show the form for editing the specified tenant.
     */
    public function edit(Tenant $tenant)
    {
        return view('tenants.edit', compact('tenant'));
    }

    /**
     * Update the specified tenant in storage.
     */
    public function update(Request $request, Tenant $tenant)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255|unique:tenants,email,' . $tenant->id,
            'phone' => 'nullable|string|max:20|unique:tenants,phone,' . $tenant->id,
            'property' => 'required|string|max:255',
            'lease_start' => 'nullable|date',
            'lease_end' => 'nullable|date|after_or_equal:lease_start',
            'monthly_rent' => 'required|numeric|min:0',
            'status' => 'required|in:active,pending,inactive'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Update the tenant
        $tenant->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'property' => $request->property,
            'lease_start' => $request->lease_start,
            'lease_end' => $request->lease_end,
            'monthly_rent' => $request->monthly_rent,
            'status' => $request->status
        ]);

        return redirect()->route('tenants.index')
            ->with('success', 'Tenant updated successfully!');
    }

    /**
     * Remove the specified tenant from storage.
     */
    public function destroy(Tenant $tenant)
    {
        $tenant->delete();

        return redirect()->route('tenants.index')
            ->with('success', 'Tenant deleted successfully!');
    }

    /**
     * Search for tenants.
     */
    public function search(Request $request)
    {
        $search = $request->get('search');
        
        $tenants = Tenant::where('name', 'like', "%{$search}%")
            ->orWhere('email', 'like', "%{$search}%")
            ->orWhere('phone', 'like', "%{$search}%")
            ->orWhere('property', 'like', "%{$search}%")
            ->orderBy('name')
            ->paginate(10);

        if ($request->ajax()) {
            return response()->json([
                'tenants' => $tenants,
                'html' => view('tenants.partials.tenant_rows', compact('tenants'))->render()
            ]);
        }

        return view('tenants.index', compact('tenants'));
    }

    /**
     * Get tenant details for API/JSON response.
     */
    public function getTenant(Tenant $tenant)
    {
        return response()->json([
            'success' => true,
            'data' => $tenant
        ]);
    }

    /**
     * Update tenant status.
     */
    public function updateStatus(Request $request, Tenant $tenant)
    {
        $request->validate([
            'status' => 'required|in:active,pending,inactive'
        ]);

        $tenant->update(['status' => $request->status]);

        return response()->json([
            'success' => true,
            'message' => 'Status updated successfully',
            'status' => $tenant->status
        ]);
    }
}