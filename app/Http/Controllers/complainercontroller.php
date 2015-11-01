<?php

namespace App\Http\Controllers;

use App\Case_file;
use App\Complaint;
use App\PersonalInfo;
use App\PersonCaseComplain;
use App\PersonCaseSuspect;
use App\PersonCaseVictim;
use App\PersonCaseVitnesse;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\complainerrequest;
use DB;
use Illuminate\Support\Facades;


class complainercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $blood_group1 = ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'];
        $title1 = ['Rev' ,'Dr' ,'Mr', 'Mrs' ,'Miss'];
        $religion1 = ['Buddhist', 'Roman Catholic', 'Christian', 'Hindu', 'Islam', 'Other'];
        $nationality1 = ['Sinhalese', 'Tamil' ,'Muslim', 'Burger', 'Other'];
        $m_status1 = ['Single', 'Married', 'Divorced', 'Widowed'];
        $cur_date=date("Y-m-d");

        return view('DEO.addcomplainer',compact('cur_date','blood_group1', 'title1', 'religion1', 'nationality1', 'm_status1'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
  /*  public function store(complainerrequest $request)
    {

        $blood_group1 = ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'];
        $title1 = ['Rev' ,'Dr' ,'Mr', 'Mrs' ,'Miss'];
        $religion1 = ['Buddhist', 'Roman Catholic', 'Christian', 'Hindu', 'Islam', 'Other'];
        $nationality1 = ['Sinhalese', 'Tamil' ,'Muslim', 'Burger', 'Other'];
        $m_status1 = ['Single', 'Married', 'Divorced', 'Widowed'];
        $cur_date=date("Y-m-d");
        $person =Request::all();
        $success=PersonalInfo::create($person);

        if($success != null) {

            session()->flash('success',"Successfully updated the data base");
            return view('DEO.addcomplainer',compact('cur_date','blood_group1', 'title1', 'religion1', 'nationality1', 'm_status1'));
        }
        else{
            session()->flash('fail',"Failed to update the data base please try again");
            return view('DEO.addcomplainer',compact('cur_date','blood_group1', 'title1', 'religion1', 'nationality1', 'm_status1'));
        }

    } */

    public function complainer_insert(Request $request)
    {

        $d_file_no="";
        $f_no="";

        $file_nos=$this->getMax();
        $year=date("Y");

        if($file_nos==""){
            $d_file_no=$year.'/1';

        }
        else
        {
            $num=1;
            $e_file=$file_nos+$num;
            $d_file_no=$year.'/'.$e_file;
        }

            $f_no=$this->generate_id_with_police_station($d_file_no);

            $this->handle_case_file_details($request,$d_file_no,$f_no);

            $this->handle_complainer_details($request,$f_no);

            $this->handle_victim_details($request,$f_no);

            $this->handle_witness_details($request,$f_no);

            $this->handle_suspect_details($request,$f_no);

//        var_dump($request->All());

        $blood_group1 = ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'];
        $title1 = ['Rev' ,'Dr' ,'Mr', 'Mrs' ,'Miss'];
        $religion1 = ['Buddhist', 'Roman Catholic', 'Christian', 'Hindu', 'Islam', 'Other'];
        $nationality1 = ['Sinhalese', 'Tamil' ,'Muslim', 'Burger', 'Other'];
        $m_status1 = ['Single', 'Married', 'Divorced', 'Widowed'];
        $cur_date=date("Y-m-d");

        return view('DEO.addcomplainer', compact('blood_group1', 'title1', 'religion1', 'nationality1', 'm_status1', 'cur_date'));
    }

    /**
     * This function  creates a new case file
     **/
    private function handle_case_file_details(Request $request,$d_file_no,$f_no)
    {
        $request->all();

        $police_station=Auth::user()->police_station;
        $file_no=$f_no;
        $designated_file_no=$d_file_no;
        $resolved_date='not solved';
        $file_created_date=date("Y-m-d");

        Case_file::create(['file_no'=>$file_no,'designated_file_no'=>$designated_file_no,'police_station'=>$police_station,'resolved_date'=>$resolved_date,'file_created_date'=>$file_created_date]);

    }

    /**
     * This function retrieves maximum value and use it as the index in case files
     **/
    private function getMax(){
        $values=Case_file::lists('designated_file_no');

        if( $values === "")
        {
            return $values;
        }
        else{
            $arr[]="";
            $file_no_array=array();
            $index_count=0;
            foreach($values as $file_nos ) {
                $arr = (explode("/", $file_nos));
                $file_no_array[$index_count] = $arr[1];
                $index_count++;
            }
            $max_value=max($file_no_array);

            return $max_value;
        }
    }

    /**
     * This function handles all the details of complainer
     **/
    private function handle_complainer_details(Request $request,$f_no)
    {
        $request->all();

        $person = PersonalInfo::get()->max('person_id');
        $num = 1;
        $person_id = $person + $num;

        $comp_id = Complaint::get()->max('complaint_id');
        $complaint_id = $comp_id + $num;

        $NIC = $request->NIC;
        $file_no = $f_no;
        $passport_id = $request->passport_id;
        $full_name = $request->full_name;
        $sex = $request->sex;
        $religion = $request->religion;
        $nationality = $request->nationality;
        $marital_status = $request->marital_status;
        $current_address = $request->current_address;
        $telephone = $request->telephone;
        $current_mobile_no = $request->current_mobile_no;
        $title = $request->title;
        $com_date=date("Y-m-d");
        $com_time=date("h:i:sa");

        PersonalInfo::create(['person_id' => $person_id, 'NIC' => $NIC, 'file_no' => $file_no, 'passport_id' => $passport_id, 'full_name' => $full_name, 'sex' => $sex, 'religion' => $religion, 'nationality' => $nationality, 'marital_status' => $marital_status, 'current_address' => $current_address, 'telephone' => $telephone, 'current_mobile_no' => $current_mobile_no, 'title' => $title]);

        PersonCaseComplain::create(['person_id' => $person_id, 'file_no' => $file_no]);

        Complaint::create(['complaint_id'=> $complaint_id, 'person_complainer_id'=> $person_id, 'complained_date'=> $com_date, 'complained_time'=>$com_time]);

    }

    /**
     * This function handles all the details of victim
     **/
    private function handle_victim_details(Request $request,$f_no)
    {
        $request->all();

        $person=PersonalInfo::get()->max('person_id');
        $num=1;
        $person_id=$person+$num;

        $NIC=$request->v_nic;
        $file_no=$f_no;
        $passport_id=$request->v_passport;
        $full_name=$request->v_f_name;
        $surname=$request->v_s_name;
        $date_of_birth=$request->v_dob;
        $sex=$request->v_gender;
        $religion=$request->v_religion;
        $nationality=$request->v_nationality;
        $marital_status=$request->v_m_status;
        $current_address=$request->v_address;
        $telephone=$request->v_t_number;
        $current_mobile_no=$request->v_m_number;
        $title=$request->v_title;


        if(!(($full_name==="") && ($NIC===""))) {

            PersonalInfo::create(['person_id' => $person_id, 'NIC' => $NIC, 'file_no' => $file_no, 'passport_id' => $passport_id, 'full_name' => $full_name, 'surname' => $surname, 'date_of_birth' => $date_of_birth, 'sex' => $sex, 'religion' => $religion, 'nationality' => $nationality, 'marital_status' => $marital_status, 'current_address' => $current_address, 'telephone' => $telephone, 'current_mobile_no' => $current_mobile_no, 'title' => $title]);

            PersonCaseVictim::create(['person_id' => $person_id, 'file_no' => $file_no]);

        }
    }

    /**
     * This function handles all the details of witness
     **/
    private function handle_witness_details(Request $request,$f_no)
    {
        $request->all();

        $person=PersonalInfo::get()->max('person_id');
        $num=1;
        $person_id=$person+$num;

        $NIC=$request->w_nic;
        $file_no=$f_no;
        $passport_id=$request->w_passport;
        $full_name=$request->w_f_name;
        $surname=$request->w_s_name;
        $date_of_birth=$request->w_dob;
        $sex=$request->w_gender;
        $religion=$request->w_religion;
        $nationality=$request->w_nationality;
        $marital_status=$request->w_m_status;
        $current_address=$request->w_address;
        $telephone=$request->w_t_number;
        $current_mobile_no=$request->w_m_number;
        $title=$request->w_title;

        if(!(($full_name==="") && ($NIC===""))) {
            PersonalInfo::create(['person_id' => $person_id, 'NIC' => $NIC, 'file_no' => $file_no, 'passport_id' => $passport_id, 'full_name' => $full_name, 'surname' => $surname, 'date_of_birth' => $date_of_birth, 'sex' => $sex, 'religion' => $religion, 'nationality' => $nationality, 'marital_status' => $marital_status, 'current_address' => $current_address, 'telephone' => $telephone, 'current_mobile_no' => $current_mobile_no, 'title' => $title]);

            PersonCaseVitnesse::create(['person_id' => $person_id, 'file_no' => $file_no]);
        }
    }

    /**
     * This function handles all the details of suspect
     **/
    private function handle_suspect_details(Request $request,$f_no)
    {
        $request->all();
        $person=PersonalInfo::get()->max('person_id');
        $num=1;
        $person_id=$person+$num;

        $NIC=$request->s_nic;
        $file_no=$f_no;
        $passport_id=$request->s_passport;
        $full_name=$request->s_f_name;
        $surname=$request->s_s_name;
        $date_of_birth=$request->s_dob;
        $sex=$request->s_gender;
        $religion=$request->s_religion;
        $nationality=$request->s_nationality;
        $marital_status=$request->s_m_status;
        $current_address=$request->s_address;
        $telephone=$request->s_t_number;
        $current_mobile_no=$request->s_m_number;
        $title=$request->s_title;

        if(!(($full_name==="") && ($NIC===""))) {
            PersonalInfo::create(['person_id' => $person_id, 'NIC' => $NIC, 'file_no' => $file_no, 'passport_id' => $passport_id, 'full_name' => $full_name, 'surname' => $surname, 'date_of_birth' => $date_of_birth, 'sex' => $sex, 'religion' => $religion, 'nationality' => $nationality, 'marital_status' => $marital_status, 'current_address' => $current_address, 'telephone' => $telephone, 'current_mobile_no' => $current_mobile_no, 'title' => $title]);

            PersonCaseSuspect::create(['person_id' => $person_id, 'file_no' => $file_no]);
        }
    }

    /**
     * Generate new File number with the police station
     **/
    private function generate_id_with_police_station($file_no){
        $police_station=Auth::user()->police_station; //getting the police station of user
        $new_file_no=$police_station.'/'.$file_no; //generating case file no
        return $new_file_no;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
