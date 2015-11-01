<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    protected $table='emails';

    protected $fillable=['id','police_station','sender_name','sender_email','receiver_name','receiver_email','subject','message'];
}
