<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_number',
        'PO_No',
        'POL',
        'POD',
        'ramp_via',
        'size',
        'carrier',
        'vessel_voyage',
        'container',
        'seal',
        'cargo_weight',
        'quantity',
        'MBL',
        'HBL',
        'Commodity',
        'cut_of_date',
        'on_board_date',
        'eta_port_date',
        'eta_ramp_date',
        'freight_quote',
        'exw_local',
        'wharfage',
        'delivery_address',
        'note',
        'is_deleted',
        'created',
        'consignee_id',
        'consignee_contact_id',
        'shipper_id',
        'shipper_contact_id', 
        'party_id',
        'party_contact_id',
    ];
}
