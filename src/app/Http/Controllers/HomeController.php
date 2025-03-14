<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home() {
        return view('home');
    }
    public function adminHome() {
        return view('admin.home');
    }
    public function ownerHome() {
        return view('owner.home');
    }
}
