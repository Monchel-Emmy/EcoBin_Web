<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Check if the columns exist
        $hasLocationId = Schema::hasColumn('bins', 'location_id');
        $hasUserId = Schema::hasColumn('bins', 'user_id');
        $hasLocation = Schema::hasColumn('bins', 'location');
        $hasAssignedTo = Schema::hasColumn('bins', 'assigned_to');

        // Add location_id if it doesn't exist
        if (!$hasLocationId) {
            Schema::table('bins', function (Blueprint $table) {
                $table->unsignedBigInteger('location_id')->nullable()->after('bin_id');
            });
        }

        // Add user_id if it doesn't exist
        if (!$hasUserId) {
            Schema::table('bins', function (Blueprint $table) {
                $table->unsignedBigInteger('user_id')->nullable()->after('location_id');
            });
        }

        // Update data to match new structure
        if ($hasLocation && $hasLocationId) {
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
                } else if ($locations->count() > 0) {
                    // If no match found, use the first location as default
                    DB::table('bins')
                        ->where('id', $bin->id)
                        ->update(['location_id' => $locations->first()->id]);
                }
            }
        }

        if ($hasAssignedTo && $hasUserId) {
            // Update user_id from assigned_to if it exists
            $bins = DB::table('bins')->whereNotNull('assigned_to')->get();
            foreach ($bins as $bin) {
                DB::table('bins')
                    ->where('id', $bin->id)
                    ->update(['user_id' => $bin->assigned_to]);
            }
        }

        // Make location_id required and add foreign key constraints
        if ($hasLocationId) {
            Schema::table('bins', function (Blueprint $table) {
                $table->unsignedBigInteger('location_id')->nullable(false)->change();
                
                // Add foreign key constraints if they don't exist
                if (!$this->hasForeignKey('bins', 'location_id')) {
                    $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');
                }
            });
        }

        if ($hasUserId) {
            Schema::table('bins', function (Blueprint $table) {
                // Add foreign key constraints if they don't exist
                if (!$this->hasForeignKey('bins', 'user_id')) {
                    $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
                }
            });
        }

        // Drop old columns if they exist
        if ($hasLocation) {
            Schema::table('bins', function (Blueprint $table) {
                $table->dropColumn('location');
            });
        }

        if ($hasAssignedTo) {
            Schema::table('bins', function (Blueprint $table) {
                $table->dropColumn('assigned_to');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Add back old columns
        Schema::table('bins', function (Blueprint $table) {
            if (!Schema::hasColumn('bins', 'location')) {
                $table->string('location')->after('bin_id');
            }
            if (!Schema::hasColumn('bins', 'assigned_to')) {
                $table->integer('assigned_to')->nullable()->after('location');
            }
        });

        // Drop foreign key constraints
        Schema::table('bins', function (Blueprint $table) {
            if ($this->hasForeignKey('bins', 'location_id')) {
                $table->dropForeign(['location_id']);
            }
            if ($this->hasForeignKey('bins', 'user_id')) {
                $table->dropForeign(['user_id']);
            }
        });

        // Drop new columns
        Schema::table('bins', function (Blueprint $table) {
            if (Schema::hasColumn('bins', 'location_id')) {
                $table->dropColumn('location_id');
            }
            if (Schema::hasColumn('bins', 'user_id')) {
                $table->dropColumn('user_id');
            }
        });
    }

    /**
     * Check if a foreign key exists
     */
    private function hasForeignKey($table, $column)
    {
        $conn = Schema::getConnection();
        $dbName = $conn->getDatabaseName();
        $foreignKeys = $conn->getDoctrineSchemaManager()->listTableForeignKeys($table);
        
        foreach ($foreignKeys as $foreignKey) {
            if (in_array($column, $foreignKey->getLocalColumns())) {
                return true;
            }
        }
        
        return false;
    }
};
