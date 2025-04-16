<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Activity;
use App\Models\User;
use App\Models\Bin;
use App\Models\Location;
use Carbon\Carbon;

class ActivitySeeder extends Seeder
{
    public function run()
    {
        // Get some users, bins, and locations to reference
        $users = User::all();
        $bins = Bin::all();
        $locations = Location::all();

        if ($users->isEmpty() || $bins->isEmpty() || $locations->isEmpty()) {
            $this->command->info('Skipping activity seeding because required models are empty.');
            return;
        }

        // Create some sample activities
        $activities = [
            [
                'user_id' => $users->random()->id,
                'bin_id' => $bins->random()->id,
                'location_id' => $locations->random()->id,
                'type' => 'bin_added',
                'description' => 'New bin added',
                'created_at' => Carbon::now()->subHours(2),
                'updated_at' => Carbon::now()->subHours(2),
            ],
            [
                'user_id' => $users->random()->id,
                'bin_id' => null,
                'location_id' => null,
                'type' => 'user_registered',
                'description' => 'New user registered',
                'created_at' => Carbon::now()->subHours(5),
                'updated_at' => Carbon::now()->subHours(5),
            ],
            [
                'user_id' => $users->random()->id,
                'bin_id' => $bins->random()->id,
                'location_id' => $locations->random()->id,
                'type' => 'bin_alert',
                'description' => 'Bin is 90% full',
                'created_at' => Carbon::now()->subDay(),
                'updated_at' => Carbon::now()->subDay(),
            ],
            [
                'user_id' => $users->random()->id,
                'bin_id' => null,
                'location_id' => $locations->random()->id,
                'type' => 'location_added',
                'description' => 'New location added',
                'created_at' => Carbon::now()->subDays(2),
                'updated_at' => Carbon::now()->subDays(2),
            ],
            [
                'user_id' => $users->random()->id,
                'bin_id' => null,
                'location_id' => null,
                'type' => 'message_sent',
                'description' => 'New message sent',
                'created_at' => Carbon::now()->subDays(3),
                'updated_at' => Carbon::now()->subDays(3),
            ],
        ];

        foreach ($activities as $activity) {
            Activity::create($activity);
        }
    }
} 