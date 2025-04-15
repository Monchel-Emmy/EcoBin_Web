<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

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
        $location->delete();
        return redirect()->route('locations.index')->with('success', 'Location deleted successfully');
    }
} 