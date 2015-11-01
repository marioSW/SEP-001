<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CriminalAppearence extends Model
{
    //
    protected $fillable=['person_id',
        'height',
        'weight',
        'hair_colour',
        'eye_colour',
        'birth_mark_description1',
        'birth_mark_description2',
        'birth_mark_description3',
        'birth_mark_description4',
        'other_description'];
}
