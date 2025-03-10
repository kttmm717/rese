<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function create($store_id) {
        Like::create([
            'store_id' => $store_id,
            'user_id' => Auth::id(),
        ]);
        return back();
    }
    public function delete($store_id) {
        Like::where([
            'store_id' => $store_id,
            'user_id' => Auth::id(),
        ])->delete();
        return back();
    }  
}
