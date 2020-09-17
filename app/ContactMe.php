<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactMe extends Model
{
    public $table = 'contactme';
    public $fillable = ['name','email','subject','message'];
}
