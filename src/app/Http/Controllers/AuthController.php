<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;


class AuthController extends Controller
{
    public function ownerLoginView() {
        return view('auth.owner-login');
    }
    public function adminLoginView() {
        return view('auth.admin-login');
    }
    
    public function ownerLogin(LoginRequest $request) {
        if(!Auth::attempt($request->only('email', 'password'))) {
            throw ValidationException::withMessages([
                'email' => 'ログイン情報が登録されていません'
            ]);
        }
        return redirect('/owner/home');
    }
    public function adminLogin(LoginRequest $request) {
        if(!Auth::attempt($request->only('email', 'password'))) {
            throw ValidationException::withMessages([
                'email' => 'ログイン情報が登録されていません'
            ]);
        }
        return redirect('/admin');
    }
}
