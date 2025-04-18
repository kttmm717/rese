<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected  $fillable = [
        'store_id',
        'name',
        'price',
        'description',
        'image_path',
    ];

    public function store() {
        return $this->belongsTo(Store::class);
    }
    public function reservation() {
        return $this->hasOne(Reservation::class);
    }
}
