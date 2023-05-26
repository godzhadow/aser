<?php

namespace App\Http\Controllers\fullpaper;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Message;

class MessageController extends Controller
{
    public function index() {
        $user = user::where('id',Auth::id())->first();

        return view('fullpaper.message',['user'=>$user]);
    }
}
