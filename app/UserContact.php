<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserContact extends Model
{
    use HasFactory;
    protected $fillable = [
        'slug','user_id','email', 'password','fname','lname','nick_name','address','phone','mobile','contact','fax', 'profile_image','gender','DOB','country','city','state','zipcode','hashval','status','same_as','module_id',
    ];
}
