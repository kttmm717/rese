<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'store_id',
        'reservation_date',
        'reservation_time',
        'number_of_people',
    ];

    public function store() {
        return $this->belongsTo(Store::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function reservation_changes() {
        return $this->hasMany(ReservationChange::class);
    }
}
