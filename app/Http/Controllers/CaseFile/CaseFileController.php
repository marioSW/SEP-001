<?php

namespace App\Http\Controllers\CaseFile;

use App\Case_file;
use App\Complaint;
use App\PersonalInfo;
use App\PersonCaseSuspect;
use App\PersonCaseVictim;
use App\PersonCaseVitnesse;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CaseFileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function complainer_insert_combo()
    {
        $blood_group1 = ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'];
        $title1 = ['Rev' ,'Dr' ,'Mr', 'Mrs' ,'Miss'];
        $religion1 = ['Buddhist', 'Roman Catholic', 'Christian', 'Hindu', 'Islam', 'Other'];
        $nationality1 = ['Sinhalese', 'Tamil' ,'Muslim', 'Burger', 'Other'];
        $m_status1 = ['Single', 'Married', 'Divorced', 'Widowed'];
        return view('deo.deo_complainer', compact('blood_group1', 'title1', 'religion1', 'nationality1', 'm_status1'));
    }
    public function complainer_insert(Request $request)
    {
        var_dump($request->all());

        $blood_group1 = ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'];
        $title1 = ['Rev' ,'Dr' ,'Mr', 'Mrs' ,'Miss'];
        $religion1 = ['Buddhist', 'Roman Catholic', 'Christian', 'Hindu', 'Islam', 'Other'];
        $nationality1 = ['Sinhalese', 'Tamil' ,'Muslim', 'Burger', 'Other'];
        $m_status1 = ['Single', 'Married', 'Divorced', 'Widowed'];

        return view('deo.deo_complainer', compact('blood_group1', 'title1', 'religion1', 'nationality1', 'm_status1'));
    }
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
  /*  private function handle_complain_details(Request $request,$f_no)
    {
        $request->all();

        $person=PersonalInfo::get()->max('person_id');
        $i=1;
        $person_id=$person+$i;
        $complained_date=$request->com_date;
        $complained_time=$request->com_time;
        $complaint_id=$person_id.'/'.$complained_date;

        Complaint::create(['complaint_id'=>$complaint_id,'person_complainer_id'=>$person_id,'complained_date'=>$complained_date,'$complained_time'=>$complained_time]);
    } */
    private function handle_victim_details(Request $request,$f_no)
    {
        $request->all();

        $person=PersonalInfo::get()->max('person_id');
        $i=1;
        $person_id=$person+$i;

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

        PersonalInfo::create(['person_id'=>$person_id,'NIC'=>$NIC,'file_no'=>$file_no,'passport_id'=>$passport_id,'full_name'=>$full_name,'surname'=>$surname,'date_of_birth'=>$date_of_birth,'sex'=>$sex,'religion'=>$religion,'nationality'=>$nationality,'marital_status'=>$marital_status,'current_address'=>$current_address,'telephone'=>$telephone,'current_mobile_no'=>$current_mobile_no,'title'=>$title]);

        PersonCaseVictim::create(['person_id'=>$person_id,'file_no'=>$file_no]);
    }
   /* private function handle_witness_details(Request $request,$f_no)
    {
        $request->all();

        $person=PersonalInfo::get()->max('person_id');
        $i=1;
        $person_id=$person+$i;

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

        PersonalInfo::create(['person_id'=>$person_id,'NIC'=>$NIC,'file_no'=>$file_no,'passport_id'=>$passport_id,'full_name'=>$full_name,'surname'=>$surname,'date_of_birth'=>$date_of_birth,'sex'=>$sex,'religion'=>$religion,'nationality'=>$nationality,'marital_status'=>$marital_status,'current_address'=>$current_address,'telephone'=>$telephone,'current_mobile_no'=>$current_mobile_no,'title'=>$title]);

        PersonCaseVitnesse::create(['person_id'=>$person_id,'file_no'=>$file_no]);
    } */
   /* private function handle_suspect_details(Request $request,$f_no)
    {
        $request->all();
-
        $person=PersonalInfo::get()->max('person_id');
        $i=1;
        $person_id=$person+$i;

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

        PersonalInfo::create(['person_id'=>$person_id,'NIC'=>$NIC,'file_no'=>$file_no,'passport_id'=>$passport_id,'full_name'=>$full_name,'surname'=>$surname,'date_of_birth'=>$date_of_birth,'sex'=>$sex,'religion'=>$religion,'nationality'=>$nationality,'marital_status'=>$marital_status,'current_address'=>$current_address,'telephone'=>$telephone,'current_mobile_no'=>$current_mobile_no,'title'=>$title]);

        PersonCaseSuspect::create(['person_id'=>$person_id,'file_no'=>$file_no]);
    } */
    public function insert_modal()
    {

    }
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
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
