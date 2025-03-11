<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Store;
use Illuminate\Support\Facades\Auth;

class MypageController extends Controller
{
    public function mypage() {
        $reservations = Reservation::where('user_id', Auth::id())
                                   ->orderBy('reservation_date')
                                   ->get();
                                   
        $user = Auth::user();

        $query = Store::query();
        $query->whereIn('id', function($query) {
            $query->select('store_id')
                  ->from('likes')
                  ->where('user_id', auth()->id());
        });
        $stores = $query->get();

        return view('mypage', compact('reservations', 'user', 'stores'));
    }
    public function delete($reservation_id) {
        $reservation = Reservation::find($reservation_id);
        $reservation->delete();
        return back();
    }
    public function change() {
        
    }
}
