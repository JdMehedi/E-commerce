<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    public function order_info(){
        return $this->belongsTo(Order::class, 'order_id','id');
    }

    public function document_type_info(){
        return $this->belongsTo(DocumentType::class, 'doc_type_id','id');
    }
}
