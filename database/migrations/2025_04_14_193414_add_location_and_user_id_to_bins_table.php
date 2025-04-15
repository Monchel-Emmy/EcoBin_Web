<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Step 1: Add new columns without constraints
        Schema::table('bins', function (Blueprint $table) {
            $table->unsignedBigInteger('location_id')->nullable()->after('bin_id');
            $table->unsignedBigInteger('user_id')->nullable()->after('location_id');
        });
        
        // Step 2: Update data to match new structure
        // Get all locations
        $locations = DB::table('locations')->get();
        
        // For each bin, try to find a matching location by name
        $bins = DB::table('bins')->get();
        foreach ($bins as $bin) {
            // Find a location with a name that matches the bin's location
            $location = $locations->first(function($loc) use ($bin) {
                return strtolower($loc->name) === strtolower($bin->location);
            });
            
            if ($location) {
                // Update the bin with the correct location_id
                DB::table('bins')
                    ->where('id', $bin->id)
                    ->update(['location_id' => $location->id]);
            } else {
                // If no match found, use the first location as default
                DB::table('bins')
                    ->where('id', $bin->id)
                    ->update(['location_id' => $locations->first()->id]);
            }
            
            // Update user_id from assigned_to if it exists
            if ($bin->assigned_to) {
                DB::table('bins')
                    ->where('id', $bin->id)
                    ->update(['user_id' => $bin->assigned_to]);
            }
        }
        
        // Step 3: Make location_id required and add foreign key constraints
        Schema::table('bins', function (Blueprint $table) {
            $table->unsignedBigInteger('location_id')->nullable(false)->change();
            
            // Add foreign key constraints
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            
            // Drop old columns
            $table->dropColumn('location');
            $table->dropColumn('assigned_to');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bins', function (Blueprint $table) {
            // Drop foreign key constraints
            $table->dropForeign(['location_id']);
            $table->dropForeign(['user_id']);
            
            // Drop new columns
            $table->dropColumn('location_id');
            $table->dropColumn('user_id');
            
            // Add back old columns
            $table->string('location')->after('bin_id');
            $table->integer('assigned_to')->nullable()->after('location');
        });
    }
};
