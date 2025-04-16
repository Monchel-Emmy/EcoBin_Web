<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class SettingsController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('settings.index', compact('user'));
    }

    public function create()
    {
        return view('settings.create');
    }

    public function store(Request $request)
    {
        // TODO: Implement settings creation logic
        return redirect()->route('settings.index')->with('success', 'Settings created successfully');
    }

    public function show($id)
    {
        return view('settings.show', compact('id'));
    }

    public function edit($id)
    {
        return view('settings.edit', compact('id'));
    }

    public function update(Request $request, $id)
    {
        $user = Auth::user();
        
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'bio' => ['nullable', 'string', 'max:255'],
            'location' => ['nullable', 'string', 'max:255'],
            'current_password' => ['nullable', 'required_with:new_password', 'current_password'],
            'new_password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);
        
        $user->name = $request->name;
        $user->email = $request->email;
        $user->bio = $request->bio;
        $user->location = $request->location;
        
        if ($request->filled('new_password')) {
            $user->password = Hash::make($request->new_password);
        }
        
        $user->save();
        
        return redirect()->route('settings.index')->with('success', 'Profile updated successfully');
    }

    public function destroy($id)
    {
        // TODO: Implement settings deletion logic
        return redirect()->route('settings.index')->with('success', 'Settings deleted successfully');
    }
} 