<?php

namespace App\Http\Controllers\admin;

use Session;
use File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
// use Carbon\carbon;

use App\User;

class UserController extends Controller
{
    public function index(Request $request) {

        $searchUser = $request->searchUser;
        $user = User::query();
        if($request->has('searchUser')){
            $user->where('name','like',"%".$searchUser."%")
            ->orWhere('id','like',"%".$searchUser."%")
            ->orWhere('email','like',"%".$searchUser."%");
            // ->paginate(10)->setPath('');
        }
        $user =  $user->paginate(10);

        return view('admin.user', ['user'=> $user, 'searchUser'=> $searchUser]);
    }

    public function store(Request $request) {
        $password = Hash::make('12345678');

        // if with phooto profile
        if ($request->file('photo_profile_add') != null) {

            $this->validate($request, [
                'photo_profile_add' => 'required|file|mimes:jpeg,png,jpg|max:10240'
            ]);

            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('photo_profile_add');


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
        $user = user::insert([
            'name' => $request->name,
            'picture' => $photo_profile,
            'email' => $request->email,
            'password' => $password,
            'jenis_user' => $request->role,
            'email_verified_at' => now(),
            'created_at' => now(),
            ]);
        if (!$user) {
            Session::flash('message', 'Create user Failed!');
            Session::flash('alert-class', 'alert-danger');
            return redirect('/admin/dashboard/user');
        }else{
            // alihkan halaman ke halaman user
            Session::flash('message', 'Create user success!');
            Session::flash('alert-class', 'alert-success');
            return redirect('/admin/dashboard/user');
        }

    }

    public function update_user(Request $request) {

        $user = user::where('id',$request->id)->first();

        $user->name = $request->name;
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
        $user = $user->save();

        if (!$user) {
            Session::flash('message', 'Update user Failed!');
            Session::flash('alert-class', 'alert-danger');
            return redirect('/admin/dashboard/user');
        }else{
            // alihkan halaman ke halaman user
            Session::flash('message', 'Update user success!');
            Session::flash('alert-class', 'alert-success');
            return redirect('/admin/dashboard/user');
        }
    }

    public function delete_user($id)
    {
        // menghapus data user berdasarkan id yang dipilih
        $user = user::where('id',$id)->delete();

        // alihkan halaman ke halaman user
        if (!$user) {
            Session::flash('message', 'Delete user Failed!');
            Session::flash('alert-class', 'alert-danger');
            return redirect('/admin/dashboard/user');
        }else{
            // alihkan halaman ke halaman user
            Session::flash('message', 'Delete user success!');
            Session::flash('alert-class', 'alert-success');
            return redirect('/admin/dashboard/user');
        }
    }
}
