<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participaint extends Model
{
    protected $fillable = [
        'firstname',
        'lastname',
        'birthday',
        'reportSubject',
        'country',
        'phone',
        'email',
        'company',
        'position',
        'aboutMe'
    ];
}
