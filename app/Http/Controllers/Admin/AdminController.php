<?php

namespace App\Http\Controllers\Admin;

use App\CrimeList;
use App\Email;

use App\Http\Requests\AddCriminalListRequest;

use App\Http\Requests\SendEmailRequest;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    function getDashboard(){

        return view('admin.admin_dashboard');
    }

    function getUsers(){

        $data= $this->getAllUsers();

        return view('admin.admin_set_user',compact('data'));
    }

    public function setUser(Request $request )
    {
        $name=$request->input('sel_name');
        $policeStation=Input::get('sel_police_station');
        $newRole=$request->input('selectbasic');

        $user= User::where('name',$name)->where('police_Station',$policeStation)->first();

        if($user->role === $newRole)
        {

        }
        else {
            $update = User::where('name', $name)->where('police_Station', $policeStation)->update(['role'=> $newRole]);
        }
        $data= $this->getAllUsers();
        $request->session()->flash('success','you successfully updated '.$name.'\'s Details');
        return view('admin.admin_set_user',compact('data'));
    }

    public function addCrimeList(){
        $data= CrimeList::all();
        return view('admin.admin_add_crimeList',compact('data'));
    }

    public function setCrimeList(AddCriminalListRequest $crimelists){
        $vals=$crimelists->all();

        $success=CrimeList::create($vals);

        $data = CrimeList::all();
        if($success != null) {

            session()->flash('success',"Successfully updated the data base");
            return view('admin.admin_add_crimeList', compact('data'));
        }
        else{
            session()->flash('fail',"Failed to update the data base please try again");
            return view('admin.admin_add_crimeList', compact('data'));
        }
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     *  Get all information in Users table
     */
    private function getAllUsers(){
        return User::all();
    }

    public function get_view_email()
    {

        return view('admin.admin_send_email');
    }



    public function set_view_email(SendEmailRequest $request){

       $vals=$request->all();

        $police = Auth::user()->police_station;
        $sname=$request->input('sender_name');
        $rname=$request->input('receiver_name');
        $semail=$request->input('sender_email');
        $remail=$request->input('receiver_email');

        $sub = $request->input('subject');
        $msg = $request->input('message');

       Mail::send('emails.test', ['name' => $msg] ,function($message) use ($rname,$remail,$sub)
        {
            $message->to($remail,$rname)->from('otheremail@some.com')->subject($sub);
        }

        );

        $datas = ['police_station'=> $police , 'sender_name' => $sname, 'sender_email' => $semail , 'receiver_name' => $rname ,'receiver_email' => $remail,'subject' => $sub,'message' => $msg];
        Email::create($datas);

         $request->session()->flash('success',"Successfully send the data email");
        return view('admin.admin_send_email');



    }


}
