<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->jenis_user === 'admin') {
            // an admin
                return redirect('/admin/dashboard');
            }
            elseif (Auth::user()->jenis_user === 'full paper'){
                return redirect('/fullpaper/dashboard');
            }
            else {
                return view('home');
            }

    }

}
