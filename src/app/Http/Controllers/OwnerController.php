<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Genre;
use Illuminate\Http\Request;
use App\Models\Store;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;
use Carbon\Carbon;
use App\Http\Requests\StoreRequest;
use App\Models\Course;
use App\Http\Requests\CourseRequest;

class OwnerController extends Controller
{
    public function index() {
        $store = Store::where('owner_id', Auth::id())->first();

        if(!$store) {
            return redirect()->back()->with('flashError', '店舗情報が見つかりません');
        }

        $todayReservations = Reservation::where('store_id', $store->id)
                                        ->where('reservation_date', Carbon::today())
                                        ->orderBy('reservation_time')
                                        ->get();

        $tomorrowReservations = Reservation::where('store_id', $store->id)
                                        ->where('reservation_date', Carbon::tomorrow())
                                        ->orderBy('reservation_time')
                                        ->get();

        
                            
        return view('owner.index', compact('store', 'todayReservations', 'tomorrowReservations'));
    }
    public function search(Request $request) {
        $store = Store::where('owner_id', Auth::id())->first();
        $reservation__date = $request->reservation_date;

        $searchReservations = Reservation::where('store_id', $request->store_id)
                                    ->whereDate('reservation_date', $reservation__date)
                                    ->orderBy('reservation_time')
                                    ->get();
 
        $todayReservations = Reservation::where('store_id', $store->id)
                                    ->where('reservation_date', Carbon::today())
                                    ->orderBy('reservation_time')
                                    ->get();

        $tomorrowReservations = Reservation::where('store_id', $store->id)
                                    ->where('reservation_date', Carbon::tomorrow())
                                    ->orderBy('reservation_time')
                                    ->get();
                                
        return view('owner.index', compact('store', 'searchReservations', 'todayReservations', 'tomorrowReservations'));
    }
    public function storeCreateView() {
        $store = Store::where('owner_id', Auth::id())->first();

        if($store) {
            return redirect()->back()->with('flashError', '店舗情報がすでに登録されています');
        }

        $areas = Area::all();
        $genres = Genre::all();
        return view('owner/create', compact('areas', 'genres'));
    }
    public function storeCreate(StoreRequest $request) {
        $file = $request->file('image');

        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/img', $fileName);

        $image_path =  'img/' . $fileName;

        Store::create([
            'name' => $request->name,
            'area_id' => $request->area_id,
            'genre_id' => $request->genre_id,
            'description' => $request->description,
            'image_path' => $image_path,
            'owner_id' => Auth::id(),
        ]);
        return redirect('/owner/home')->with('flashSuccess', '店舗を登録しました！');
    }
    public function storeUpdateView() {
        $store = Store::where('owner_id', Auth::id())->first();
        $areas = Area::all();
        $genres = Genre::all();

        if(!$store) {
            return redirect()->back()->with('flashError', '店舗情報が見つかりません');
        }

        return view('owner.update', compact('store', 'areas', 'genres'));
    }
    public function storeUpdate(StoreRequest $request) {
        $file = $request->file('image');

        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/img', $fileName);

        $image_path =  'img/' . $fileName;

        $store = Store::where('owner_id', Auth::id())->first();

        $store->update([
            'name' => $request->name,
            'area_id' => $request->area_id,
            'genre_id' => $request->genre_id,
            'description' => $request->description,
            'image_path' => $image_path,
            'owner_id' => Auth::id(),
        ]);
        return redirect('/owner/home')->with('flashSuccess', '店舗情報を更新しました！');
    }
    public function courseCreateView() {
        $store = Store::where('owner_id', Auth::id())->first();
        
        if(!$store) {
            return redirect()->back()->with('flashError', '店舗情報が見つかりません');
        }

        return view('owner.course-create');
    }
    public function courseCreate(CourseRequest $request) {
        $store = Store::where('owner_id', Auth::id())->first();

        Course::create([
            'store_id' => $store->id,
            'name' => $request->name,
            'price' => $request->price,
        ]);
        return redirect('/owner/home')->with('flashSuccess', 'コースを作成しました！');
    }
    public function courseUpdateView() {
        $store = Store::where('owner_id', Auth::id())->first();

        if(!$store) {
            return redirect()->back()->with('flashError', '店舗情報が見つかりません');
        }

        $courses = Course::where('store_id', $store->id)->get();

        return view('owner.course-update', compact('courses'));
    }
    public function courseUpdate($course_id, CourseRequest $request) {
        $course = Course::find($course_id);

        $course->update([
            'name' => $request->name,
            'price' => $request->price,
        ]);
        return redirect()->back()->with('flashSuccess', 'コースを編集しました！');
    }
    public function courseDelete($course_id) {
        Course::find($course_id)->delete();
        return redirect()->back()->with('flashSuccess', 'コースを削除しました！');
    }
}
