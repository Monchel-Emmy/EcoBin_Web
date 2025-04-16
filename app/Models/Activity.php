<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'bin_id',
        'location_id',
        'type',
        'description',
        'data'
    ];

    protected $casts = [
        'data' => 'array'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bin()
    {
        return $this->belongsTo(Bin::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
} 