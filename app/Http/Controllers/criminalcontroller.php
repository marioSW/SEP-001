<?php

namespace App\Http\Controllers;
use App\PersonCaseCriminal;
use App\CriminalAppearence;
use App\Http\Requests\AddCriminalAppearanceRequest;
use App\Http\Requests\MakeCriminalRequest;

use DB;
use Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class criminalcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
       // $suspects = DB::select("SELECT person_id FROM person_case_suspects");

       // foreach($suspects as $suspect)
       // {
          //  $suspects=DB::table('person_case_suspects')->join('personal_infos','person_case_suspects.person_id','=','personal_infos.person_id')->select('person_case_suspects.*','personal_infos.full_name')->get();
      //  }

        $suspects=DB::table('person_case_suspects')
            ->join('personal_infos','person_case_suspects.person_id','=','personal_infos.person_id')
            ->join('crimes','person_case_suspects.file_no','=','crimes.case_file_no')
            ->select('person_case_suspects.person_id','person_case_suspects.file_no','personal_infos.full_name','personal_infos.sex','personal_infos.date_of_birth','crimes.description','crimes.crime_date','crimes.crime_place_name')->get();
        return view('OIC.suspect_to_criminal',compact('suspects'));


    }

    public function setCriminal()
    {
        $id=Input::get('sel_id');
        $file=Input::get('sel_file_no');

        $success=PersonCaseCriminal::create(['person_id'=>$id,'file_no'=>$file]);

        $suspects=DB::table('person_case_suspects')
            ->join('personal_infos','person_case_suspects.person_id','=','personal_infos.person_id')
            ->join('crimes','person_case_suspects.file_no','=','crimes.case_file_no')
            ->select('person_case_suspects.person_id','person_case_suspects.file_no','personal_infos.full_name','personal_infos.sex','personal_infos.date_of_birth','crimes.description','crimes.crime_date','crimes.crime_place_name')
            ->get();



        if($success != null) {

            session()->flash('success',"Successfully updated the data base");
            return view('OIC.suspect_to_criminal',compact('suspects'));
        }
        else{
            session()->flash('fail',"Failed to update the data base please try again");
            return view('OIC.suspect_to_criminal',compact('suspects'));
        }



    }

    public function setCriminalLook()
    {
        $criminals=DB::table('person_case_criminals')
            ->join('personal_infos','person_case_criminals.person_id','=','personal_infos.person_id')
            ->join('crimes','person_case_criminals.file_no','=','crimes.case_file_no')
            ->select('person_case_criminals.person_id','personal_infos.full_name','personal_infos.date_of_birth','crimes.description','crimes.crime_date','crimes.crime_place_name')
            ->get();

        return view('deo.add_criminal_look',compact('criminals'));
    }

    public function addCriminalLook(AddCriminalAppearanceRequest $request)
    {
        $criminal=Request::all();
        $success=CriminalAppearence::create($criminal);

        $criminals=DB::table('person_case_criminals')
            ->join('personal_infos','person_case_criminals.person_id','=','personal_infos.person_id')
            ->join('crimes','person_case_criminals.file_no','=','crimes.case_file_no')
            ->select('person_case_criminals.person_id','personal_infos.full_name','personal_infos.date_of_birth','crimes.description','crimes.crime_date','crimes.crime_place_name')
            ->get();

        if($success != null) {

            session()->flash('success',"Successfully updated the data base");
            return view('deo.add_criminal_look',compact('criminals'));
        }
        else{
            session()->flash('fail',"Failed to update the data base please try again");
            return view('deo.add_criminal_look',compact('criminals'));
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {


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
