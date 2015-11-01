<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PersonCaseAccused extends Model
{
    public function getCAccused($fileNo){

        $Accused_list=DB::table('person_case_accuseds')->where('file_no',$fileNo)->lists('person_id');

        if( array_filter($Accused_list) )
        {
            return $Accused_list;
        }
        else{
            return $Accused_list=array("no accused added");
        }
    }
}
