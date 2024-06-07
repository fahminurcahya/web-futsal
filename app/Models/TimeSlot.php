<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TimeSlot extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'field_id',
        'start_time',
        'end_time',
        'is_active',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
