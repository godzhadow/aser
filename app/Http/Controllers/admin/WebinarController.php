<?php

namespace App\Http\Controllers\admin;

use Session;
use File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Webinar;

class WebinarController extends Controller
{
    public function index(Request $request) {
        $year = $request->year;
        $type = $request->type;
        $searchWebinar = $request->searchWebinar;
        $webinar = Webinar::query();
        if($year != ""){
            $webinar->where('start_date','like','%'.$year.'%');
        }
        if($type != ""){
            $webinar->where('type',$type);
        }
        if($searchWebinar != ""){
            $webinar->where('title','like','%'.$request->searchWebinar.'%');
        }
        $webinar = $webinar->paginate(10);
        $speaker = user::where('jenis_user','=','speaker workshop')->get();

        // print_r($webinar);

        return view('admin.webinar',['webinar'=>$webinar,'speaker'=>$speaker,'year'=>$year,'type'=>$type,'searchWebinar'=>$searchWebinar]);
    }

    public function store(Request $request) {

       // if with phooto profile
       if ($request->file('photo_webinar_add') != null) {

            $this->validate($request, [
                'photo_webinar_add' => 'required|file|mimes:jpeg,png,jpg|max:10240'
            ]);

            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('photo_webinar_add');


            // $file_name = $webinar->name.'-'.$file->getClientOriginalName();
            // $file_name = '4THASER00'.$paper->paper_attribute.'.'.$file->getClientOriginalExtension();
            $file_name = time()."_".$file->getClientOriginalName();


            // isi dengan nama folder tempat kemana file diupload
            $directory = 'uploads/image_webinar/';
            $file->move($directory,$file_name);

            $photo_webinar = $directory.$file_name;
        }else{
            $photo_webinar = NULL;
        }
        // insert data ke table webinar
        $webinar = webinar::insert([
            'type' => 'webinar',
            'title' => strtoupper($request->title),
            'image' => $photo_webinar,
            'users_id' => $request->speaker,
            'start_date' => $request->datetime,
            'price' => $request->price,
            'link' => $request->link,
            'created_at' => now(),
            ]);
        if (!$webinar) {
            Session::flash('message', 'Create webinar Failed!');
            Session::flash('alert-class', 'alert-danger');
            return redirect('/admin/dashboard/webinar');
        }else{
            // alihkan halaman ke halaman webinar
            Session::flash('message', 'Create webinar success!');
            Session::flash('alert-class', 'alert-success');
            return redirect('/admin/dashboard/webinar');
        }
    }
    public function update_webinar(Request $request) {
        $webinar = webinar::where('id',$request->id)->first();
        // $webinar->title = $request->title;
        // $webinar->users_id = $request->id;
        $webinar->start_date = $request->datetime;
        $webinar->price = $request->price;
        $webinar->link = $request->link;

        // if with phooto profile
        if ($request->file('photo_webinar') !== null) {

            $this->validate($request, [
                'photo_webinar' => 'required|file|mimes:jpeg,png,jpg|max:10240'
            ]);

            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('photo_webinar');


            // $file_name = $webinar->name.'-'.$file->getClientOriginalName();
            // $file_name = '4THASER00'.$paper->paper_attribute.'.'.$file->getClientOriginalExtension();
            $file_name = time()."_".$file->getClientOriginalName();


            // isi dengan nama folder tempat kemana file diupload
            $directory = 'uploads/image_webinar/';
            $file->move($directory,$file_name);

            if ($webinar->image != null) {
                File::delete($webinar->image);
            }

            $image =  $directory.$file_name;
        } else {
            // $image = $webinar->image;
            if ($webinar->image != null) {
                File::delete($webinar->image);
            }
            $image = NULL;
        }
        $webinar->image = $image;
        $webinar = $webinar->save();

        if (!$webinar) {
            Session::flash('message', 'Update webinar or conference Failed!');
            Session::flash('alert-class', 'alert-danger');
            return redirect('/admin/dashboard/webinar');
        }else{
            // alihkan halaman ke halaman webinar
            Session::flash('message', 'Update webinar or conference success!');
            Session::flash('alert-class', 'alert-success');
            return redirect('/admin/dashboard/webinar');
        }
    }
    public function delete_webinar($id) {
        // menghapus data webinar berdasarkan id yang dipilih
        $webinar = webinar::where('id',$id)->delete();

        // alihkan halaman ke halaman webinar
        if (!$webinar) {
            Session::flash('message', 'Delete webinar or conference Failed!');
            Session::flash('alert-class', 'alert-danger');
            return redirect('/admin/dashboard/webinar');
        }else{
            // alihkan halaman ke halaman webinar
            Session::flash('message', 'Delete webinar or conference success!');
            Session::flash('alert-class', 'alert-success');
            return redirect('/admin/dashboard/webinar');
        }
    }
}
