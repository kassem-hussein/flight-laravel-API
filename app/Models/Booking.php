<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function flight()
    {
        return $this->belongsTo(Flight::class);
    }

    public function passengers()
    {
        return $this->belongsToMany(Passenger::class, 'booking_passenger', 'booking_id', 'passenger_id');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
