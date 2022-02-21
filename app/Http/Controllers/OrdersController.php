<?php

namespace App\Http\Controllers;

use App\Order;
use App\User;
use App\UserContact;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    public function create()
    {
        $data['consignees'] = DB::table('users')
        ->leftJoin('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')->where('role_id',1)
        ->get(); 
         $data['shippers'] = DB::table('users')
        ->leftJoin('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')->where('role_id',2)
        ->get();
        return view ('admin.orders.create',$data);
    }

    public function store(Request $request){
        $request->validate([
            'order_number' => 'required|max:255',
            'PO_No' => 'required|max:100',
            'POL' => 'required|max:100',
            'POD' => 'required|max:100',
            'ramp_via' => 'required|max:100',
            'size' => 'required|max:100',
            'carrier' => 'required|max:100',
            'vessel_voyage' => 'required|max:100',
            'container' => 'required|max:100',
            'seal' => 'required|max:100',
            'cargo_weight' => 'required|max:100',
            'quantity' => 'required|max:100',
            'MBL' => 'required|max:100',
            'HBL' => 'required|max:100',
            'Commodity' => 'required|max:100',
            'cut_of_date' => 'required|max:100',
            'on_board_date' => 'required|max:100',
            'eta_port_date' => 'required|max:100',
            'eta_ramp_date' => 'required|max:100',
            'freight_quote' => 'required|max:100',
            'exw_local' => 'required|max:100',
            'wharfage' => 'required|max:100',
            'delivery_address' => 'required|max:100',
        ]);
        $data = new Order();
        $data->order_number=$request->order_number;
        $data->PO_No=$request->PO_No;
        $data->note=$request->note;
        $data->delivery_address=$request->delivery_address;
        $data->wharfage=$request->wharfage;
        $data->exw_local=$request->exw_local;
        $data->freight_quote=$request->freight_quote;
        $data->eta_ramp_date= date('Y-m-d',strtotime($request->eta_ramp_date));
        $data->on_board_date= date('Y-m-d',strtotime($request->on_board_date));
        $data->eta_port_date= date('Y-m-d',strtotime($request->eta_port_date));
        $data->cut_of_date= date('Y-m-d',strtotime($request->cut_of_date));;
        $data->Commodity=$request->Commodity;
        $data->HBL=$request->HBL;
        $data->MBL=$request->MBL;
        $data->quantity=$request->quantity;
        $data->cargo_weight=$request->cargo_weight;
        $data->seal=$request->seal;
        $data->container=$request->container;
        $data->vessel_voyage=$request->vessel_voyage;
        $data->carrier=$request->carrier;
        $data->size=$request->size;
        $data->ramp_via=$request->ramp_via;
        $data->POD=$request->POD;
        $data->shipper_id=$request->shipper;
        $data->consignee_id=$request->consignee;
        $data->party_id=$request->party;
        $data->shipper_contact_id=$request->shipper_contact_id;
        $data->consignee_contact_id=$request->consignee_contact_id;
        $data->party_contact_id=$request->party_contact_id;
        $data->POL=$request->POL;
      
        $user = $data->save();

        if(empty($user)){
            return redirect()->back()
                ->withInput()
                ->with("err_message", __('Failed to insert'));
        }
        return redirect()->route("orderLog")
            ->with("success_message", __("Data inserted successfully"));
    }

    public function shipper_info_order_form(Request $request){
        $shipper = $request->shipper;
        $scontacts = UserContact::where('user_id',$shipper)->get();
        $shipper_info_order_form = '<option value="">select shipper contact</option>';
        if(!empty($scontacts)){
            foreach ($scontacts as $scontact) {
                $shipper_info_order_form = $shipper_info_order_form . "<option value='" .$scontact['id']  . "'>" . $scontact['contact'] . "</option>";
            }
        }
        return response()->json(['shipper_info_order_form' => $shipper_info_order_form]);
    } 
    
    public function shipper_contact_info_order_form(Request $request){
        $shipper_contact_id = $request->shipper_contact_id;
        $scontacts = UserContact::where('id',$shipper_contact_id)->first();
        $shipper_contact_info_order_form = '';
        if(!empty($scontacts)){
            $shipper_contact_info_order_form = $scontacts;
        }
        return response()->json(['shipper_contact_info_order_form' => $shipper_contact_info_order_form]);
    }

    public function consignee_info_order_form(Request $request){
        $consignee = $request->consignee;
        $ccontacts = UserContact::where('user_id',$consignee)->get();
        $consignee_info_order_form = '<option value="">select consignee contact</option>';
        if(!empty($ccontacts)){
            foreach ($ccontacts as $ccontact) {
                $consignee_info_order_form = $consignee_info_order_form . "<option value='" .$ccontact['id']  . "'>" . $ccontact['contact'] . "</option>";
            }
        }
        return response()->json(['consignee_info_order_form' => $consignee_info_order_form]);
    }

    public function consignee_contact_info_order_form(Request $request){
        $consignee_contact_id = $request->consignee_contact_id;
        $ccontacts = UserContact::where('id',$consignee_contact_id)->first();
        $consignee_contact_info_order_form = '';
        if(!empty($ccontacts)){
            $consignee_contact_info_order_form = $ccontacts;
        }
        return response()->json(['consignee_contact_info_order_form' => $consignee_contact_info_order_form]);
    }

    public function party_info_order_form(Request $request){
        $party = $request->party;
        $parties = UserContact::where('user_id',$party)->get();
        $party_info_order_form = '<option value="">select party contact</option>';
        if(!empty($parties)){
            foreach ($parties as $party) {
                $party_info_order_form = $party_info_order_form . "<option value='" .$party['id']  . "'>" . $party['contact'] . "</option>";
            }
        }
        return response()->json(['party_info_order_form' => $party_info_order_form]);
    }

    public function party_contact_info_order_form(Request $request){
        $party_contact_id = $request->party_contact_id;
        $pcontacts = UserContact::where('id',$party_contact_id)->first();
        $party_contact_info_order_form = '';
        if(!empty($pcontacts)){
            $party_contact_info_order_form = $pcontacts;
        }
        return response()->json(['party_contact_info_order_form' => $party_contact_info_order_form]);
    }

}
