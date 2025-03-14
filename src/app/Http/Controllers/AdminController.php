<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actions\Fortify\CreateNewUser;

class AdminController extends Controller
{
    public function index() {
        return view('admin.index');
    }
    public function ownerCreate(Request $request, CreateNewUser $creator) {
        $data = $request->all();
        $data['role'] = 'owner';

        $creator->create($data);

        return redirect('/admin')->with('flashSuccess', '店舗代表者を作成しました！');
    }
}
