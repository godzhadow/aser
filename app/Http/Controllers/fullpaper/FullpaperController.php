<?php

namespace App\Http\Controllers\fullpaper;

use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Calendar;
use App\Event;
use App\Webinar;

class FullpaperController extends Controller
{
    public function index() {
        $colors = ['#007bff','#6c757d','#28a745','#dc3545','#ffc107','#17a2b8!'];
        $events = [];
        $data = Event::all();
        if($data->count()) {
            foreach ($data as $key => $value) {
                $events[] = Calendar::event(
                    $value->title,
                    true,
                    new \DateTime($value->start_date),
                    new \DateTime($value->end_date.' +1 day'),
                    null,
                    // Add color and link on event
                    [
                        // 'color' => '#f05050',
                        'color'=> $colors[$key],
                        'url' => 'pass here url and any route',
                    ]
                );
            }
        }

        $webinar = webinar::where('users_id', Auth::id())->get();
        if($webinar->count()) {
            foreach ($webinar as $key => $value) {
                $events[] = Calendar::event(
                    'My Confe',
                    true,
                    new \DateTime($value->start_date),
                    new \DateTime($value->start_date),
                    null,
                    [
                        'color'=>'#ffc107',
                    ]
                );
            }
        }

        $calendar = Calendar::addEvents($events);
        return view('fullpaper.dashboard', compact('calendar'));

        // return redirect('/fullpaper/dashboard/team');
    }

    public function update_profile(Request $request) {
        $user = user::where('id',Auth::id())->first();
        if($request->university != "") {
            $user->university = $request->university;
        }
        if($request->country != "") {
            $user->country = $request->country;
        }
        if($request->address != "") {
            $user->address = $request->address;
        }
        if($request->address != "") {
            $user->city = $request->city;
        }
        $user->save;

        return redirect ('/fullpaper/dashboard');
    }
}
