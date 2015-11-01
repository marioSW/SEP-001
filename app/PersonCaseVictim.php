<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonCaseVictim extends Model
{
    protected $table="person_case_victims";

    protected $fillable=['person_id','file_no'];
}
