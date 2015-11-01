<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonCaseSuspect extends Model
{
    protected $table="person_case_suspects";

    protected $fillable=['person_id','file_no'];

    /**
     * @param $fileNo
     * @return string
     *
     * gets Suspect list from the File number provided
     */
    public function getSuspect($fileNo){
        $suspect_list=DB::table($this->table)->where('file_no',$fileNo)->value('person_id');
        if(!is_null($suspect_list)) {
            return $suspect_list;
        }
        else{
            return "no complainer added";
        }
    }
}
