<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Emmanuel',
            'email' => 'momo@gmail.com',
            'password' => Hash::make('papa'),
            'role_id' => 2, // Admin role
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
