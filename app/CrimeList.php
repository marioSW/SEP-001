<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CrimeList extends Model
{
    protected $table='crime_lists';

    protected $fillable=['list_no','crime_type','crime_description','crime_category'];
}
