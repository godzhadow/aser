<?php

namespace App\Http\Controllers\fullpaper;

use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Webinar;

class WebinarController extends Controller
{
    public function index() {
        $webinar = webinar::where('users_id', Auth::id())->get();


        return view('fullpaper.webinar',['webinar'=>$webinar]);
    }
}
