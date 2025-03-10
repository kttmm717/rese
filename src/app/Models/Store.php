<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Store extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'area_id',
        'genre_id',
        'description',
        'owner_id',
    ];

    public function store_images() {
        return $this->hasMany(StoreImage::class);
    }
    public function area() {
        return $this->belongsTo(Area::class);
    }
    public function reservations() {
        return $this->hasMany(Reservation::class);
    }
    public function user() {
        return $this->belongsTo(User::class, 'owner_id');
    }
    public function reviews() {
        return $this->hasMany(Review::class);
    }
    public function likes() {
        return $this->hasMany(Like::class);
    }
    public function genre() {
        return $this->belongsTo(Genre::class);
    }
    public function qr_code() {
        return $this->hasOne(QrCode::class);
    }

    public function liked() {
        return Like::where([
            'store_id' => $this->id,
            'user_id' => Auth::id()
        ])->exists();
    }
}
