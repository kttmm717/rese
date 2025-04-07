<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Course;
use Illuminate\Support\Facades\Log;

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
        $courses = Course::where('store_id', $store_id)->get();
        return view('detail', compact('store', 'courses'));
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
