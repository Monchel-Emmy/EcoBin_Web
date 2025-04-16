<?php

namespace App\Http\Controllers;

use App\Models\Bin;
use App\Models\User;
use App\Models\Location;
use App\Models\Message;
use App\Models\Activity;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Get counts for stats cards
        $totalBins = Bin::count();
        $totalUsers = User::count();
        $totalLocations = Location::count();
        $totalMessages = Message::count();

        // Get recent activities
        try {
            $recentActivities = Activity::with(['user', 'bin', 'location'])
                ->latest()
                ->take(5)
                ->get();
        } catch (\Exception $e) {
            // If there's an error (like table doesn't exist), return empty collection
            $recentActivities = collect([]);
        }

        return view('dashboard', compact(
            'totalBins',
            'totalUsers',
            'totalLocations',
            'totalMessages',
            'recentActivities'
        ));
    }
} 