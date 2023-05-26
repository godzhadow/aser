<?php

namespace App\Http\Controllers\admin;

use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use File;
use App\mail\PaperStatusEmail;
use App\mail\AbstractStatusEmail;
use App\mail\PaymentStatusEmail;
use App\User;
use App\paper;
use App\message;
use App\webinar;

class AdminController extends Controller
{

    public function index() {
        return view('admin.dashboard');
        // return redirect ('/admin/dashboard/user');
    }
    public function index2() {


        $tab = Session::get('tab');
        $searchUser = $request->searchUser;
        $user = User::query();
        if($request->has('searchUser')){
            $user->where('name','like',"%".$searchUser."%")
            ->orWhere('id','like',"%".$searchUser."%")
            ->orWhere('email','like',"%".$searchUser."%");
            // ->paginate(10)->setPath('');
        }
        $user =  $user->paginate(10);

        $paperuser = User::where('jenis_user','full paper')->get();

        // $paper = User::where('jenis_user','=','full paper')
        //             ->join('paper', 'users.id', '=','paper.users_id')
        //             ->join('team', 'users.id','=', 'team.users_id')
        //             ->select('users.name as username','paper.*', 'team.*')
        //             ->get();

        $paper =  User::where('jenis_user','=','full paper')
        ->whereHas('paper', function($q){
            $q->whereColumn('users_id','=','users.id');
        })->whereHas('team', function($t){
            $t->whereColumn('users_id','=','users.id');
        })->get();
        // $webinar = webinar::all();

        return view('admin.index', ['user'=> $user, 'searchUser'=> $searchUser, 'paper'=> $paper,'paperuser'=>$paperuser,'tab'=>$tab]);
    }

    public function search(Request $request)
	{
        $tab = 0;
		// menangkap data pencarian
		$search = $request->search;

        // mengambil data dari table user sesuai pencarian data
        if($search != '') {
            $user = User::where('name','like',"%".$search."%")
                        ->orWhere('id','like',"%".$search."%")
                        ->orWhere('email','like',"%".$search."%")
                        ->paginate(10)->setPath('');
            $pagination = $user->appends (array(
                'search'=>$search
                )
            );
            if(count ($user)>0)
                // mengirim data user ke view index
                return view('admin.index',['user' => $user,'search'=>$search])->with(['tab'=>$tab]);
        }
        return redirect('/admin/dashboard')->with(['tab'=>$tab]);

	}

    public function store(Request $request) {
        $tab = 0;
        $password = Hash::make('12345678');

        // if with phooto profile
        if ($request->file('photo_profile') != null) {

            $this->validate($request, [
                'photo_profile' => 'required|file|mimes:jpeg,png,jpg,pdf|max:10240'
            ]);

            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('photo_profile');


            // $file_name = $user->name.'-'.$file->getClientOriginalName();
            // $file_name = '4THASER00'.$paper->paper_attribute.'.'.$file->getClientOriginalExtension();
            $file_name = time()."_".$file->getClientOriginalName();


            // isi dengan nama folder tempat kemana file diupload
            $directory = 'uploads/photo_profile/';
            $file->move($directory,$file_name);

            $photo_profile = $directory.$file_name;
        }else{
            $photo_profile = NULL;
        }
        // insert data ke table user
        user::insert([
            'name' => $request->name,
            'picture' => $photo_profile,
            'email' => $request->email,
            'password' => $password,
            'jenis_user' => $request->role,
            'email_verified_at' => now(),
            'created_at' => now(),
        ]);
        // alihkan halaman ke halaman user
        return redirect('/admin/dashboard')->with(['tab'=>$tab]);

    }

    public function update_user(Request $request) {

        $tab = 0;

        $user = user::where('id',$request->id)->first();

        $user->name = strtoupper($request->name);
        $user->email = $request->email;
        $user->jenis_user = $request->role;

        // if with phooto profile
        if ($request->file('photo_profile') !== null) {

            $this->validate($request, [
                'photo_profile' => 'required|file|mimes:jpeg,png,jpg,pdf|max:10240'
            ]);

            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('photo_profile');


            // $file_name = $user->name.'-'.$file->getClientOriginalName();
            // $file_name = '4THASER00'.$paper->paper_attribute.'.'.$file->getClientOriginalExtension();
            $file_name = time()."_".$file->getClientOriginalName();


            // isi dengan nama folder tempat kemana file diupload
            $directory = 'uploads/profile/';
            $file->move($directory,$file_name);

            if ($user->picture != null) {
                File::delete($user->picture);
            }

            $profile =  $directory.$file_name;
        } else {
            $profile = $user->picture;
        }
        $user->picture = $profile;
        $user->save();
        // update data user
        // user::where('id',$request->id)->update([
        //     'name' => strtoupper($request->name),
        //     'email' => $request->email,
        //     'jenis_user' => $request->role,
        // ]);
        // alihkan halaman ke halaman user
        return redirect('/admin/dashboard')->with(['tab'=>$tab]);
    }

    public function delete_user($id)
    {
        $tab = 0;
        // menghapus data user berdasarkan id yang dipilih
        user::where('id',$id)->delete();

        // alihkan halaman ke halaman user
        return redirect('/admin/dashboard')->with(['tab'=>$tab]);
    }

    public function validation(Request $request){
        $tab = 1;
        // update data user
        $paper = paper::where('id',$request->id)->first();
        $user = user::where('id',$paper->users_id)->first();

        $attribute = paper::max('paper_attribute');

        $tempPayment = $paper->payment_status;
        $tempAbstract = $paper->abstract_status;
        $tempPaper = $paper->paper_status;

        $paper->payment_status = $request->payment_status;
        $paper->abstract_status = $request->abstract_status;
        $paper->paper_status = $request->paper_status;
        if($request->abstract_status === 'accepted') {
            if($tempAbstract != $request->abstract_status){
            $paper->paper_attribute = $attribute+1;
            // rename file abstract
            // menyimpan data file yang diupload ke variabel $file
            $fileAbstractOld = $paper->abstract;
            $abstractExt = explode('.',$fileAbstractOld);
            $fileAbstractOldExt = end($abstractExt);

            $fileAbstractNew = 'uploads/abstract/4THASER00'.($attribute+1).'.'.$fileAbstractOldExt;

            // to rename file
            File::move($fileAbstractOld,$fileAbstractNew); // keep the same folder to just rename

            $paper->abstract = $fileAbstractNew;
            }
        }
        $paper->save();


        // // kirim email & message tiap perubahan status
        if($paper->save()){
            if($tempAbstract != $request->abstract_status){
                Mail::to($user->email)->send(new AbstractStatusEmail($user));
                $message = message::create([
                    'users_id' => $user->id,
                    'message'=>'your abstract status change to '.$request->abstract_status,
                    'sender' => 'system',
                ]);
            }
            if($tempPayment != $request->payment_status){
                Mail::to($user->email)->send(new PaymentStatusEmail($user));
                $message = message::create([
                    'users_id' => $user->id,
                    'message'=>'your payment status change to '.$request->payment_status,
                    'sender' => 'system',
                ]);
            }
            if($tempPaper != $request->paper_status){
                Mail::to($user->email)->send(new PaperStatusEmail($user));
                $message = message::create([
                    'users_id' => $user->id,
                    'message'=>'your paper status change to '.$request->paper_status,
                    'sender' => 'system',
                ]);
                if ($request->paper_status === 'accepted') {
                    webinar::insert([
                        'type' => 'conference',
                        'title' => $paper->title,
                        'image' => $user->picture,
                        'speaker_id' => $user->id,
                        'start_date' => now(),
                        'price' => null,
                        'link' => 'https://forms.gle/c1ctMVAHzzFAocgu7',
                        'created_at' => now(),
                    ]);
                }
            }
        }

        // Mail::to
        // alihkan halaman ke halaman user
        return redirect('/admin/dashboard')->with(['tab'=>$tab]);
    }

    // send message
    public function send_message(Request $request) {
        $tab = 2;
        $message = message::create([
            'users_id' => $request->id,
            'message' => $request->message,
            'sender' => 'admin',
        ]);

        return redirect('/admin/dashboard')->with(['tab'=>$tab]);
    }
}


