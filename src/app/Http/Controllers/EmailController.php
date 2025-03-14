<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotifyUserMail;

class EmailController extends Controller
{
    public function sendEmailView() {
        $users = User::where('role', 'user')->get();
        return view('owner.notify', compact('users'));
    }
    public function sendEmail(Request $request) {
        $user = User::findOrFail($request->user_id);
        $messageContent = $request->message;

        Mail::to($user->email)->send(new NotifyUserMail($messageContent));

        return back()->with('flashSuccess', 'お知らせメールを送信しました！');
    }
}
