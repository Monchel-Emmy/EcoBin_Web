<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insert sample data
        DB::table('locations')->insert([
            [
                'name' => 'Main Street',
                'address' => '123 Main Street, City',
                'description' => 'Located in the city center',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Park Avenue',
                'address' => '456 Park Avenue, City',
                'description' => 'Near the central park',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Shopping Mall',
                'address' => '789 Mall Road, City',
                'description' => 'Inside the shopping mall',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
} 