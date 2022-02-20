<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function shipper_info(){
        return $this->belongsTo(User::class, 'shipper_id','id');
    }

    public function consignee_info(){
        return $this->belongsTo(User::class, 'consignee_id','id');
    }
}
