<?php

namespace App\Http\Controllers\fullpaper;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Paper;

class PaperController extends Controller
{
    public function index() {

        $papers = paper::where('users_id', Auth::id())->get();

        return view('fullpaper.paper',['papers'=>$papers]);
    }
}
