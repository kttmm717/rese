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
        'image_path',
        'owner_id',
    ];

    public function courses() {
        return $this->hasMany(Course::class);
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

    public function scopeKeywordSearch($query, $keyword) {
        if(!empty($keyword)) {
            $query->where('name', 'like', "%{$keyword}%");
        }
    }
    public function scopeAreaSearch($query, $area) {
        if(!empty($area)) {
            $query->where('area_id', $area);
        }
    }
    public function scopeGenreSearch($query, $genre) {
        if(!empty($genre)) {
            $query->where('genre_id', $genre);
        }
    }

    public function liked() {
        return Like::where([
            'store_id' => $this->id,
            'user_id' => Auth::id()
        ])->exists();
    }
}
