<?php

namespace App\Http\Controllers;

use App\Models\MaintenanceRequest;
use Illuminate\Http\Request;

class MaintenanceRequestController extends Controller
{
    // Get all requests
    public function index()
    {
        return MaintenanceRequest::all();
    }

    // Create new request
    public function store(Request $request)
    {
        return MaintenanceRequest::create($request->all());
    }

    // Show one request
    public function show($id)
    {
        return MaintenanceRequest::findOrFail($id);
    }

    // Update request
    public function update(Request $request, $id)
    {
        $data = MaintenanceRequest::findOrFail($id);
        $data->update($request->all());

        return $data;
    }

    // Delete request
    public function destroy($id)
    {
        MaintenanceRequest::destroy($id);

        return response()->json(['message' => 'Deleted successfully']);
    }
}
