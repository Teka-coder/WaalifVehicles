<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::paginate(10);
        return view('vehicles.index', compact('vehicles'));
    }
    
    public function create()
    {
        // This method is accessible only by admin, handle access control in routes
        return view('vehicles.form');
    }
    
    public function store(Request $request)
    {
        // Handle admin access control in routes
        $validatedData = $request->validate([
            'make' => 'required|string',
            'model' => 'required|string',
            'year' => 'required|integer|min:1900',
            'license_plate' => 'required|string|unique:vehicles',
        ]);
    
        Vehicle::create($validatedData);
        return redirect()->route('vehicles.index')->with('success', 'Vehicle added successfully');
    }
    
    public function show($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        return view('vehicles.show', compact('vehicle'));
    }
    
    public function edit($id)
    {
        // This method is accessible only by admin, handle access control in routes
        $vehicle = Vehicle::findOrFail($id);
        return view('vehicles.form', compact('vehicle'));
    }
    
    public function update(Request $request, $id)
    {
        // Handle admin access control in routes
        $vehicle = Vehicle::findOrFail($id);
        $validatedData = $request->validate([
            'make' => 'required|string',
            'model' => 'required|string',
            'year' => 'required|integer|min:1900',
            'license_plate' => 'required|string|unique:vehicles,license_plate,' . $vehicle->id,
        ]);
    
        $vehicle->update($validatedData);
        return redirect()->route('vehicles.index')->with('success', 'Vehicle updated successfully');
    }
    
    public function destroy($id)
    {
        // Handle admin access control in routes
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->delete();
        return redirect()->route('vehicles.index')->with('success', 'Vehicle deleted successfully');
    }
}
