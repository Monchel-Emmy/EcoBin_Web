<?php

namespace App\Http\Controllers;

use App\Models\Bin;
use App\Models\BinLevel;
use App\Models\Location;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BinController extends Controller
{
    public function index()
    {
        $bins = Bin::with(['levels', 'location'])->get();
        return view('bins.index', compact('bins'));
    }

    public function create()
    {
        $users = User::all();
        $locations = Location::where('status', true)->get();
        return view('bins.create', compact('users', 'locations'));
    }

    public function store(Request $request)
    {
        // Log the incoming request data
        Log::info('Bin creation request data:', $request->all());

        try {
            $validated = $request->validate([
                'bin_id' => 'required|string|max:255|unique:bins',
                'location_id' => 'required|exists:locations,id',
                'user_id' => 'nullable|exists:users,id',
                'plastic_level' => 'required|integer|min:0|max:100',
                'paper_level' => 'required|integer|min:0|max:100',
                'metal_level' => 'required|integer|min:0|max:100',
                'status' => 'required|in:Empty,Full,Maintenance',
            ]);

            Log::info('Validation passed. Validated data:', $validated);

            DB::beginTransaction();

            // Create the bin
            $bin = Bin::create([
                'bin_id' => $validated['bin_id'],
                'location_id' => $validated['location_id'],
                'user_id' => $validated['user_id'],
                'status' => $validated['status'],
            ]);

            Log::info('Bin created:', $bin->toArray());

            // Create the initial bin level record
            $binLevel = BinLevel::create([
                'bin_id' => $bin->id,
                'date' => now()->toDateString(),
                'plastic_level' => $validated['plastic_level'],
                'paper_level' => $validated['paper_level'],
                'metal_level' => $validated['metal_level'],
            ]);

            Log::info('Bin level created:', $binLevel->toArray());

            DB::commit();
            return redirect()->route('bins.show', $bin)->with('success', 'Bin created successfully.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation error:', [
                'errors' => $e->errors(),
                'request_data' => $request->all()
            ]);
            throw $e;
        } catch (\Exception $e) {
            Log::error('Error creating bin:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'request_data' => $request->all()
            ]);
            DB::rollBack();
            return back()->with('error', 'Error creating bin: ' . $e->getMessage())->withInput();
        }
    }

    public function show(Bin $bin)
    {
        $bin->load(['levels', 'location', 'user']);
        return view('bins.show', compact('bin'));
    }

    public function edit(Bin $bin)
    {
        $locations = Location::all();
        $users = User::all();
        $currentLevels = DB::table('bin_levels')
            ->where('bin_id', $bin->id)
            ->latest()
            ->first();

        return view('bins.edit', compact('bin', 'locations', 'users', 'currentLevels'));
    }

    public function update(Request $request, Bin $bin)
    {
        $validated = $request->validate([
            'bin_id' => 'required|string|max:255',
            'location_id' => 'required|exists:locations,id',
            'user_id' => 'nullable|exists:users,id',
            'status' => 'required|in:Empty,Full,Maintenance',
            'plastic_level' => 'required|integer|min:0|max:100',
            'paper_level' => 'required|integer|min:0|max:100',
            'metal_level' => 'required|integer|min:0|max:100',
        ]);

        $bin->update([
            'bin_id' => $validated['bin_id'],
            'location_id' => $validated['location_id'],
            'user_id' => $validated['user_id'],
            'status' => $validated['status'],
        ]);

        // Create new bin level record
        BinLevel::create([
            'bin_id' => $bin->id,
            'date' => now()->toDateString(),
            'plastic_level' => $validated['plastic_level'],
            'paper_level' => $validated['paper_level'],
            'metal_level' => $validated['metal_level'],
        ]);

        return redirect()->route('bins.show', $bin)
            ->with('success', 'Bin updated successfully.');
    }

    public function destroy(Bin $bin)
    {
        try {
            $bin->delete();
            return redirect()->route('bins.index')->with('success', 'Bin deleted successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error deleting bin: ' . $e->getMessage());
        }
    }
} 