<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfileModel extends Model
{
    protected $fillable = [
        'login_id','ctactnumber', 'guarnumber',
    ];
}

//'pstudent_id', 'name', 'fname','mname','address','department','degree','cnumber','roomno','block','btype','birth_date','gender','religion','districts','blood_group','photo',
