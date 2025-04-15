<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BinLevel extends Model
{
    use HasFactory;

    protected $fillable = [
        'bin_id',
        'date',
        'plastic_level',
        'paper_level',
        'metal_level'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'date' => 'date'
    ];

    public function bin()
    {
        return $this->belongsTo(Bin::class);
    }
} 