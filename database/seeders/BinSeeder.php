<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insert sample data
        DB::table('bins')->insert([
            [
                'bin_id' => 'BIN001',
                'location' => 'Main Street',
                'status' => 'Empty',
                'assigned_to' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'bin_id' => 'BIN002',
                'location' => 'Park Avenue',
                'status' => 'Full',
                'assigned_to' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'bin_id' => 'BIN003',
                'location' => 'Shopping Mall',
                'status' => 'Maintenance',
                'assigned_to' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
} 