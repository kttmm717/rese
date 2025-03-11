<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ReservationRequest;

class StoreController extends Controller
{
    public function index() {
        $stores = Store::all();
        $areas = Area::all();
        $genres = Genre::all();
        return view('index', compact('stores', 'areas', 'genres'));
    }
    public function detail($store_id) {
        $store = Store::find($store_id);
        return view('detail', compact('store'));
    }
    public function reservation(ReservationRequest $request) {
        Reservation::create([
            'user_id' => Auth::id(),
            'store_id' => $request->id,
            'reservation_date' => $request->reservation_date,
            'reservation_time' => $request->reservation_time,
            'number_of_people' => $request->number_of_people,
        ]);
        return view('done');
    }
    public function search(Request $request) {
        $area = $request->area;
        $genre = $request->genre;
        $keyword = $request->keyword;

        $areas = Area::all();
        $genres = Genre::all();

        $stores = Store::query()->areaSearch($area)
                                ->genreSearch($genre)
                                ->keywordSearch($keyword)
                                ->get();

        return view('index', compact('stores', 'areas', 'genres'));
    }
}
