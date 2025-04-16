<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\TracksActivity;

class Location extends Model
{
    use HasFactory, TracksActivity;

    protected $fillable = [
        'name',
        'address',
        'description',
        'status'
    ];

    protected $casts = [
        'status' => 'boolean'
    ];

    public function bins()
    {
        return $this->hasMany(Bin::class);
    }
} 