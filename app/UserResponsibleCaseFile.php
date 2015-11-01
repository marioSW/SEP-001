<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserResponsibleCaseFile extends Model
{
    protected $table='user_responsible_case_files';

    protected $fillable=['person_id','police_station','case_file_no'];

    protected $protected=['urcs_id'];
}
