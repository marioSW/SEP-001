<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PersonalInfo extends Model
{
    protected $table="personal_infos";
    protected $fillable=['person_id','NIC','file_no','passport_id','full_name','surname','date_of_birth','sex','religion','nationality','marital_status','current_address','telephone','current_mobile_no','title'];
    protected $hidden=['driving_licence_id'];

    public function getUserId($value,$column){

        $success=DB::table('personal_infos')->where($column,'=',$value)->value('person_id');

        return $success;

    }

    /**
     * Get the Users Name from the Id provided
     * @param $id
     */
    public function getUserName($id){
        $success=DB::table('personal_infos')->where('person_id',$id)->value('full_name');
        return $success;
    }


}
