<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    protected $table="complaints";

    protected $fillable=['complaint_id','person_complainer_id','complained_date','complained_time'];
}
