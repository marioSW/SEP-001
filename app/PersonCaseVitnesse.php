<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PersonCaseVitnesse extends Model
{
    protected $table='person_case_vitnesses';

    protected $fillable=['person_id','file_no'];

    public function getWitness($fileNo){

        $Accused_list=DB::table('person_case_vitnesses')->where('file_no',$fileNo)->lists('person_id');
        if(array_filter($Accused_list)) {
            return $Accused_list;
        }
        else{
            return $Accused_list=array("no Witnesses added");
        }
    }
}
