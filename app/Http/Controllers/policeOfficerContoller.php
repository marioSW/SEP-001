<?php

namespace App\Http\Controllers;

use App\Crime;
use App\User;
use App\UserResponsibleCaseFile;
use App\Http\Controllers\Controller;
use DB;
use Request;
use Illuminate\Support\Facades\Input;

class policeOfficerContoller extends Controller
{




    public function assignCasesIndex()
    {
        $crimes=Crime::all();
        $officers=User::all();

        return view('OIC.assign_policecases',compact('crimes','officers'));
    }

    public function assignCasesCreate(Request $request)
    {
        //$name=$request->input('person_id');
        //$policeStation=Input::get('police_station');
        //$case=$request->input('case_file_no');

        // $station=Input::get('police_station');
        // $Officer=Input::get('person_id');
        //$case=Input::get('case_file_no');

        //$success=UserResponsibleCaseFile::create(['person_id'=>$name,'police_station'=>$policeStation,'case_file_no'=>$case]);

        $person =Request::all();
        $success=UserResponsibleCaseFile::create($person);



        $crimes=Crime::all();
        $officers=User::all();

        if($success != null) {

            session()->flash('success',"Successfully updated the data base");
            return view('OIC.assign_policecases',compact('crimes','officers'));
        }
        else{
            session()->flash('fail',"Failed to update the data base please try again");
            return view('OIC.assign_policecases',compact('crimes','officers'));
        }
        // return view('OIC.assign_policecases',compact('crimes','officers'));
    }
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
