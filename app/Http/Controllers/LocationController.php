<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Bin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::all();
        return view('locations.index', compact('locations'));
    }

    public function create()
    {
        return view('locations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'nullable|string',
            'description' => 'nullable|string',
            'status' => 'boolean'
        ]);

        Location::create([
            'name' => $request->name,
            'address' => $request->address,
            'description' => $request->description,
            'status' => $request->status ?? true
        ]);

        return redirect()->route('locations.index')->with('success', 'Location created successfully');
    }

    public function show(Location $location)
    {
        return view('locations.show', compact('location'));
    }

    public function edit(Location $location)
    {
        return view('locations.edit', compact('location'));
    }

    public function update(Request $request, Location $location)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'nullable|string',
            'description' => 'nullable|string',
            'status' => 'boolean'
        ]);

        $location->update([
            'name' => $request->name,
            'address' => $request->address,
            'description' => $request->description,
            'status' => $request->status ?? true
        ]);

        return redirect()->route('locations.index')->with('success', 'Location updated successfully');
    }

    public function destroy(Location $location)
    {
        try {
            // Start a transaction
            DB::beginTransaction();
            
            // Delete all bins assigned to this location
            Bin::where('location_id', $location->id)->delete();
            
            // Delete the location
            $location->delete();
            
            // Commit the transaction
            DB::commit();
            
            return redirect()->route('locations.index')->with('success', 'Location and all associated bins deleted successfully.');
        } catch (\Exception $e) {
            // Rollback the transaction if there's an error
            DB::rollBack();
            
            return redirect()->route('locations.index')
                ->with('error', 'Error deleting location: ' . $e->getMessage());
        }
    }
} 