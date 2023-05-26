<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Message;

class MessageController extends Controller
{
    public function index(){
        $paperuser = User::where('jenis_user','full paper')->get();

        return view('admin.message',['paperuser'=>$paperuser]);
    }

    // send message
    public function send_message(Request $request) {
        $message = message::create([
            'users_id' => $request->id,
            'message' => $request->message,
            'sender' => 'admin',
        ]);

        return redirect('/admin/dashboard/message');
    }
}
