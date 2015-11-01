<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Case_file extends Model
{
    protected $table="case_files";

    protected $fillable=['file_no','designated_file_no','status','police_station','created_date','resolved_date','file_created_date'];

    protected $guarded=['created_at','updated_at'];

    public function getDesignatedFileValue($fileNo,$columnName){
        $designatedColumnValue=DB::table('case_files')->where('file_no',$fileNo)->value($columnName);
        return $designatedColumnValue;
    }
}
