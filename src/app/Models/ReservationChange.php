<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationChange extends Model
{
    use HasFactory;

    protected $fillable = [
        'reservation_id',
        'old_reservation_date',
        'new_reservation_date',
        'old_number_of_people',
        'new_number_of_people',
        'changed_at',
    ];

    public function reservation() {
        return $this->belongsTo(Reservation::class);
    }
}
