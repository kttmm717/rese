<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Store;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ReservationRequest;
use App\Models\Course;

class MypageController extends Controller
{
    public function mypage() {
        $futureReservations = Reservation::where('user_id', Auth::id())
                                        ->Where('reservation_date', '>=', now()->startOfDay())
                                        ->orderBy('reservation_date')
                                        ->get();

        $pastReservations = Reservation::where('user_id', Auth::id())
                                        ->Where('reservation_date', '<', now()->startOfDay())
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

        return view('mypage', compact('futureReservations', 'pastReservations', 'user', 'stores'));
    }
    public function delete($reservation_id) {
        $reservation = Reservation::find($reservation_id);
        $reservation->delete();
        return redirect('/mypage')->with('flashSuccess', '予約を削除しました');
    }
    public function reviewDelete($reservation_id) {
        $reservation = Reservation::find($reservation_id);
        $reservation->delete();
        return back();
    }
    public function changeView($reservation_id) {
        $reservation = Reservation::find($reservation_id);
        $store = Store::find($reservation->store_id);
        $courses = Course::where('store_id', $store->id)->get();
        $course = Course::find($reservation->course_id);
        return view('detail', compact('reservation', 'store', 'courses'));
    }
    public function reservationChange($reservation_id, ReservationRequest $request) {
        $reservation = Reservation::find($reservation_id);
        $reservation->update([
            'reservation_date' => $request->reservation_date,
            'reservation_time' => $request->reservation_time,
            'number_of_people' => $request->number_of_people,
            'course_id' => $request->course_id,
        ]);
        return redirect('/mypage')->with('flashSuccess', '予約を変更しました！');
    }
    public function qrView($reservation_id) {
        $reservation = Reservation::find($reservation_id);
        return view('qrcode', compact('reservation'));
    }
    public function qrRead($id) {
        $reservation = Reservation::findOrFail($id);
        return view('qrcode-used', compact('reservation'));
    }
    public function qrVisited($reservation_id) {
        $reservation = Reservation::findOrFail($reservation_id);
        
        $reservation->update([
            'is_visited' => 1,
        ]);
        $reservation = Reservation::find($reservation_id);
        return view('qrcode-used', compact('reservation'));
    }
}
