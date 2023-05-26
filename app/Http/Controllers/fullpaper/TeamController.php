<?php

namespace App\Http\Controllers\fullpaper;

// use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Team;

class TeamController extends Controller
{
    public function index() {

        $user = user::where('id',Auth::id())->first();

        return view('fullpaper.team',['user'=>$user]);
    }

    public function addteam(Request $request) {
        team::insert([
            'users_id'=>Auth::id(),
            'name' => $request->name,
            'university' => $request->university,
            'country' => $request->country,
            'address' => $request->address,
            'city' => $request->city,
            'created_at'=> now(),
        ]);

        return redirect('/fullpaper/dashboard');
    }

    public function updateteam(Request $request) {
        team::where('id',$request->id)->update([
            'name' => $request->name,
            'university' => $request->university,
            'country' => $request->country,
            'address' => $request->address,
            'city' => $request->city,
        ]);
        // alihkan halaman ke halaman user
        return redirect('/fullpaper/dashboard');
    }

    public function deleteteam($id)
    {
        $tab = 0;
        // menghapus data team berdasarkan id yang dipilih
        team::where('id',$id)->delete();

        // alihkan halaman ke halaman user
        return redirect('/fullpaper/dashboard')->with(['tab'=>$tab]);
    }
}
