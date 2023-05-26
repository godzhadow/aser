<?php

namespace App\Http\Controllers;

use File;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Team;
use App\Paper;
use App\Message;

class PaperController extends Controller
{
    public function index() {
        return redirect('/fullpaper/dashboard/team');
    }
    public function index2() {
        $tab = Session::get('tab');
        $user = user::where('id',Auth::id())->first();
        $team = team::where('users_id', Auth::id())->get();

        $paper = paper::where('users_id', Auth::id())->get();
        return view('fullpaper.index',['user'=>$user, 'team'=>$team, 'paper'=>$paper, 'tab'=>$tab]);
    }

    public function update_profile(Request $request) {
        $tab = 0;
        user::where('id',Auth::id())->update([
            'university' => $request->university,
            'country' => $request->country,
            'address' => $request->address,
            'city' => $request->city,
        ]);

        return redirect ('/fullpaper/dashboard')->with(['tab'=>$tab]);
    }

    public function addteam(Request $request) {
        $tab = 0;
        team::insert([
            'users_id'=>Auth::id(),
            'name' => $request->name,
            'university' => $request->university,
            'country' => $request->country,
            'address' => $request->address,
            'city' => $request->city,
            'created_at'=> now(),
        ]);

        return redirect('/fullpaper/dashboard')->with(['tab'=>$tab]);
    }

    public function updateteam(Request $request) {
        $tab = 0;
        team::where('id',$request->id)->update([
            'name' => $request->name,
            'university' => $request->university,
            'country' => $request->country,
            'address' => $request->address,
            'city' => $request->city,
        ]);
        // alihkan halaman ke halaman user
        return redirect('/fullpaper/dashboard')->with(['tab'=>$tab]);
    }

    public function deleteteam($id)
    {
        $tab = 0;
        // menghapus data team berdasarkan id yang dipilih
        team::where('id',$id)->delete();

        // alihkan halaman ke halaman user
        return redirect('/fullpaper/dashboard')->with(['tab'=>$tab]);
    }

    // all about abstract
    public function add_abstract(Request $request){

        $tab = 1;
        $user = User::where('id',Auth::id())->first();

        if ($request->file('abstract') != null) {
            $this->validate($request, [
                'title' => 'required',
                'tags' => 'required',
                'abstract' => 'required|file|mimes:jpeg,png,pdf,jpg|max:10240',
            ]);

            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('abstract');

            $file_name = $user->name."_".$file->getClientOriginalName();

                // isi dengan nama folder tempat kemana file diupload
            $directory = 'uploads/abstract/';
            $file->move($directory,$file_name);



            $year = now()->year;
            if(strpos(Auth::user()->university , 'mahardhika')) {
                $country = 'indonesia';
            }

            $input = $request->all();
            $tags = explode(",", $request->tags);

            $paper = Paper::create([
                    'users_id' => Auth::id(),
                    'title'=>strtoupper($request->title),
                    'abstract' => $directory.$file_name,
                    'abstract_status' => 'submitted',
                    'payment_status' =>'unpaid',
                    'year' => $year,
                    'country' => $country,
                    ]);
            $paper->tag($tags);


            return redirect('/fullpaper/dashboard')->with(['tab'=>$tab,'success','Abstract created successfully']);
        }else{
            Session::flash('error_title', 'Error');
        	Session::flash('error_message', 'No file uploaded!');
            return redirect('/fullpaper/dashboard')->with(['tab'=>$tab]);
        }
    }

    public function edit_abstract(Request $request) {
        $tab = 1;
        $user = User::where('id',Auth::id())->first();
        $paper = paper::where('id', $request->id)
                ->first();
        if ($request->file('abstract') != null) {

            $this->validate($request, [
                'abstract' => 'required|file|mimes:jpeg,png,jpg,pdf|max:10240'
            ]);

            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('abstract');


            $file_name = $user->name.'-'.$file->getClientOriginalName();


            // isi dengan nama folder tempat kemana file diupload
            $directory = 'uploads/abstract/';
            $file->move($directory,$file_name);

            if ($paper->abstract != null) {
                File::delete($paper->abstract);
            }

            // to rename file
            // Storage::move('hodor/oldfile-name.jpg', 'hodor/newfile-name.jpg'); // keep the same folder to just rename

            $paper->abstract = $directory.$file_name;

            $paper->save();

            return redirect('/fullpaper/dashboard')->with(['tab'=>$tab]);
        }else{
            Session::flash('error_title', 'Error');
        	Session::flash('error_message', 'No file uploaded!');
            return redirect('/fullpaper/dashboard')->with(['tab'=>$tab]);
        }



    }

    public function add_fullpaper(Request $request){

        $tab = 1;
        $user = User::where('id',Auth::id())->first();
        $paper = paper::where('id', $request->id)
                ->first();
        if ($request->file('fullpaper') != null) {

            $this->validate($request, [
                'fullpaper' => 'required|file|mimes:jpeg,png,jpg,pdf|max:10240'
            ]);

            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('fullpaper');


            // $file_name = $user->name.'-'.$file->getClientOriginalName();
            $file_name = '4THASER00'.$paper->paper_attribute.'.'.$file->getClientOriginalExtension();


            // isi dengan nama folder tempat kemana file diupload
            $directory = 'uploads/fullpaper/';
            $file->move($directory,$file_name);

            if ($paper->fullpaper != null) {
                File::delete($paper->fullpaper);
            }

            $paper->fullpaper = $directory.$file_name;
            $paper->paper_status = 'submitted';

            $paper->save();

            return redirect('/fullpaper/dashboard')->with(['tab'=>$tab]);
        }else{
            Session::flash('error_title', 'Error');
        	Session::flash('error_message', 'No file uploaded!');
            return redirect('/fullpaper/dashboard')->with(['tab'=>$tab]);
        }
    }

    public function add_ppt(Request $request){

        $tab = 1;
        $user = User::where('id',Auth::id())->first();
        $paper = paper::where('id', $request->id)
                ->first();
        if ($request->file('ppt') != null) {

            $this->validate($request, [
                'ppt' => 'required|file|mimes:jpeg,png,jpg,pdf,ppt,pptx|max:10240'
            ]);

            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('ppt');


            // $file_name = $user->name.'-'.$file->getClientOriginalName();
            $file_name = '4THASER00'.$paper->paper_attribute.'.'.$file->getClientOriginalExtension();


            // isi dengan nama folder tempat kemana file diupload
            $directory = 'uploads/ppt/';
            $file->move($directory,$file_name);

            if ($paper->powerpoint != null) {
                File::delete($paper->ppt);
            }

            $paper->powerpoint = $directory.$file_name;


            $paper->save();

            return redirect('/fullpaper/dashboard')->with(['tab'=>$tab]);
        }else{
            Session::flash('error_title', 'Error');
        	Session::flash('error_message', 'No file uploaded!');
            return redirect('/fullpaper/dashboard')->with(['tab'=>$tab]);
        }
    }

    public function add_payment(Request $request) {

        $tab = 1;
        $user = User::where('id',Auth::id())->first();
        $paper = paper::where('id', $request->id)
                ->first();
        if ($request->file('bukti_transfer') != null) {

            $this->validate($request, [
                'bukti_transfer' => 'required|file|mimes:jpeg,png,jpg,pdf,ppt,pptx|max:10240'
            ]);

            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('bukti_transfer');


            // $file_name = $user->name.'-'.$file->getClientOriginalName();
            $file_name = '4THASER00'.$paper->paper_attribute.'.'.$file->getClientOriginalExtension();


            // isi dengan nama folder tempat kemana file diupload
            $directory = 'uploads/payment/';
            $file->move($directory,$file_name);

            if ($paper->ppt != null) {
                File::delete($paper->payment);
            }

            $paper->payment = $directory.$file_name;

            $paper->save();

            return redirect('/fullpaper/dashboard')->with(['tab'=>$tab]);
        }else{
            Session::flash('error','No file Uploaded!');
            return redirect('/fullpaper/dashboard')->with(['tab'=>$tab]);
        }

    }
    // end all about abstract
}
