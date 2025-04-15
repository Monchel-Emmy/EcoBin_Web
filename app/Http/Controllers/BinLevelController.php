<?php

namespace App\Http\Controllers;

use App\Models\Bin;
use App\Models\BinLevel;
use Illuminate\Http\Request;

class BinLevelController extends Controller
{
    public function index()
    {
        $binLevels = BinLevel::with('bin')->latest()->get();
        return view('bin-levels.index', compact('binLevels'));
    }

    public function create()
    {
        $bins = Bin::all();
        return view('bin-levels.create', compact('bins'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'bin_id' => 'required|exists:bins,id',
            'plastic_level' => 'required|integer|min:0|max:100',
            'paper_level' => 'required|integer|min:0|max:100',
            'metal_level' => 'required|integer|min:0|max:100',
        ]);

        $binLevel = BinLevel::create($validated);

        // Update the bin's current levels
        $bin = Bin::find($request->bin_id);
        $bin->update([
            'plastic_level' => $request->plastic_level,
            'paper_level' => $request->paper_level,
            'metal_level' => $request->metal_level,
            'last_updated' => now(),
        ]);

        return redirect()->route('bin-levels.index')
            ->with('success', 'Bin level recorded successfully.');
    }

    public function show(BinLevel $binLevel)
    {
        return view('bin-levels.show', compact('binLevel'));
    }

    public function edit(BinLevel $binLevel)
    {
        $bins = Bin::all();
        return view('bin-levels.edit', compact('binLevel', 'bins'));
    }

    public function update(Request $request, BinLevel $binLevel)
    {
        $validated = $request->validate([
            'bin_id' => 'required|exists:bins,id',
            'plastic_level' => 'required|integer|min:0|max:100',
            'paper_level' => 'required|integer|min:0|max:100',
            'metal_level' => 'required|integer|min:0|max:100',
        ]);

        $binLevel->update($validated);

        // Update the bin's current levels
        $bin = Bin::find($request->bin_id);
        $bin->update([
            'plastic_level' => $request->plastic_level,
            'paper_level' => $request->paper_level,
            'metal_level' => $request->metal_level,
            'last_updated' => now(),
        ]);

        return redirect()->route('bin-levels.index')
            ->with('success', 'Bin level updated successfully.');
    }

    public function destroy(BinLevel $binLevel)
    {
        $binLevel->delete();
        return redirect()->route('bin-levels.index')
            ->with('success', 'Bin level deleted successfully.');
    }
} 