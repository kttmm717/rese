<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Store;
use Illuminate\Support\Facades\Auth;
use App\Models\Review;
use App\Http\Requests\ReviewRequest;

class ReviewController extends Controller
{
    public function review($reservation_id) {
        $reservation = Reservation::findOrFail($reservation_id);
        $store = Store::find($reservation->store_id);
        $user = Auth::user();
        return view('review', compact('reservation', 'store', 'user'));
    }
    public function reviewCreate($store_id, ReviewRequest $request) {
        Review::create([
            'user_id' => Auth::id(),
            'store_id' => $store_id,
            'rating' => $request->rating,
            'comment' => $request->comment
        ]);
        $reservation = Reservation::find($request->reservation_id);
        $reservation->delete();

        return redirect('/mypage')->with('flashSuccess', 'レビューを投稿しました！');
    }
    public function reviewStore($store_id) {
        $store = Store::find($store_id);
        $reviews = Review::where('store_id', $store->id)->get();
        return view('review-store', compact('store', 'reviews'));
    }
}
