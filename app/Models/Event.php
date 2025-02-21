<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;

    public function inscriptions()
    {
        return $this->hasMany(EventParticipation::class);
    }

    public function participants()
    {
        return $this->hasMany(EventParticipation::class);
    }


    protected $fillable = [
        'title',
        'description',
        'start_at',
        'end_at',
        'location',
        'capacity',
        'status',
    ];

    protected $casts = [
        'start_at' => 'datetime',
        'end_at' => 'datetime',
    ];
}