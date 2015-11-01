<?php

namespace App\Http\Controllers;

use App\PersonalInfo;
use Illuminate\Http\Request;
use App\Crime;
use App\Case_file;
use DB;
use App\complainer;
use App\Complaint;
use App\PersonCaseSuspect;
use App\PersonCaseVictim;
use App\PersonCaseAccused;
use App\PersonCaseVitnesse;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;

class gcrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        $crimes=Crime::all();
        return view('OIC.CrimesSummary',compact('crimes'));
    }


    public function view()
    {
        $id=Input::get('sel_id');


        $pcs=PersonCaseSuspect::where('file_no',$id)->first();
        $suspect=PersonalInfo::where('person_id',$pcs['person_id'])->first();

        $pcv=PersonCaseVictim::where('file_no',$id)->first();
        $victim=PersonalInfo::where('person_id',$pcv['person_id'])->first();

        $pcvt=PersonCaseVitnesse::where('file_no',$id)->first();
        $vitnesse=PersonalInfo::where('person_id',$pcvt['person_id'])->first();

        $pca=PersonCaseAccused::where('file_no',$id)->first();
        $accused=PersonalInfo::where('person_id',$pca['person_id'])->first();

        $casefile=Case_file::where('file_no',$id)->first();

        $user= Crime::where('case_file_no',$id)->first();

        //$complain=Complaint::where('file_no',$id)->first();

       // $suspect=PersonCaseSuspect::where('file_no',$id)->first();
        //$victim=PersonCaseVictim::where('file_no',$id)->first();
        //$vitnesse=PersonCaseVitnesse::where('file_no',$id)->first();
        //$accused=PersonCaseAccused::where('file_no',$id)->first();


        $crimes=Crime::all();
        return view('OIC.ViewFullCase',compact('crimes','user','complain','casefile','suspect','victim','vitnesse','accused'));
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
