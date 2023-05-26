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
use App\Paper;
use App\Message;
use App\Webinar;

class PaperController extends Controller
{
    public function index(Request $request) {

        $year = $request->year;
        $abstract_status = $request->abstract_status;
        $paper_status = $request->paper_status;
        $searchPaper = $request->searchPaper;

        $paper = paper::query();
        if ($request->year != ""){
                    $paper->where('year',$request->year);
        }
        if($request->abstract_status != ""){
            $paper->where('abstract_status',$request->abstract_status);
        }
        if($request->paper_status != ""){
            $paper->where('paper_status',$request->paper_status);
        }
        if($request->has('searchPaper')){
            $paper->where('title','like','%'.$request->searchPaper.'%');
        }
        $paper = $paper->paginate(10);

        return view('admin.paper')->with(['paper'=> $paper,'year'=>$year,'abstract_status'=>$abstract_status,'paper_status'=>$paper_status,'searchPaper'=>$searchPaper]);
    }

    public function validation(Request $request){
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
                        'users_id' => $user->id,
                        'start_date' => now(),
                        'price' => null,
                        'link' => 'https://forms.gle/c1ctMVAHzzFAocgu7',
                        'created_at' => now(),
                    ]);
                }
            }
            // Mail::to
            // alihkan halaman ke halaman paper
            Session::flash('message', 'Update data success!');
            Session::flash('alert-class', 'alert-success');
            return redirect('/admin/dashboard/paper');
        }else {
            Session::flash('message', 'Update data Failed!');
            Session::flash('alert-class', 'alert-danger');
            return redirect('/admin/dashboard/paper');
        }


    }


}
