<?php

namespace App\Http\Controllers;

use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class OrderLogController extends Controller
{
    public $user;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });
    }

    public function orderLog(Request $request){
        if (is_null($this->user) ||  !$this->user->can('orderLog')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        if (request()->ajax()) {

            $order_logs = Order::query()->with('shipper_info','consignee_info');

            if(!empty($request->order_number_start_filter)){
                $order_logs->where('order_number','>=', $request->get('order_number_start_filter'));
            }
            if(!empty($request->order_number_end_filter)){
                $order_logs->where('order_number','<=', $request->get('order_number_end_filter'));
            }
            if(!empty($request->start_date_filter)){
                $order_logs->whereDate('created_at', '>=',$request->get('start_date_filter'));
            }
            if(!empty($request->end_date_filter)){
                $order_logs->whereDate('created_at', '<=',$request->get('end_date_filter'));
            }
            if(!empty($request->PO_No_filter)){
                $order_logs->where('PO_No','LIKE', "%{$request->get('PO_No_filter')}%");
            }
            if(!empty($request->shipper_filter)){
                $order_logs->where('shipper_id','=', $request->get('shipper_filter'));
            }
            if(!empty($request->consignee_filter)){
                $order_logs->where('consignee_id','=', $request->get('consignee_filter'));
            }
            if(!empty($request->MBL_filter)){
                $order_logs->where('MBL','LIKE', "%{$request->get('MBL_filter')}%");
            }
            if(!empty($request->HBL_filter)){
                $order_logs->where('HBL','LIKE', "%{$request->get('HBL_filter')}%");
            }
            if(!empty($request->container_filter)){
                $order_logs->where('container','LIKE', "%{$request->get('container_filter')}%");
            }
            if(!empty($request->eta_port_date_filter)){
                $order_logs->whereDate('eta_port_date', '>=',$request->get('eta_port_date_filter'));
            }
            if(!empty($request->eta_ramp_date_filter)){
                $order_logs->whereDate('eta_ramp_date', '<=',$request->get('eta_ramp_date_filter'));
            }

            $datatable = DataTables::of($order_logs)
                ->editColumn('order_number', function ($row) {
                    return $row->order_number;
                })
                ->editColumn('PO_No', function ($row) {
                    return $row->PO_No;
                })
                ->editColumn('MBL', function ($row) {
                    return $row->MBL;
                })
                ->editColumn('HBL', function ($row) {
                    return $row->HBL;
                })
                ->editColumn('shipper_id', function ($row) {
                    $html ='';
                    if(!empty($row->shipper_info->nick_name)){
                        $html.= $row->shipper_info->nick_name;
                    }
                    return $html;
                })
                ->editColumn('consignee_id', function ($row) {
                    $html ='';
                    if(!empty($row->consignee_info->nick_name)) {
                        $html .= $row->consignee_info->nick_name;
                    }
                    return $html;
                })
                ->editColumn('container', function ($row) {
                    return $row->container;
                })
                ->editColumn('delivery_address', function ($row) {
                    return $row->delivery_address;
                })
                ->editColumn('created_at', function ($row) {
                    $html = "";
                    if(!empty($row->created_at)){
                        $html = date_format(date_create($row->created_at),'Y-m-d');
                    }
                    return $html;
                })
                ->editColumn('eta_ramp_date', function ($row) {
                    $html = "";
                    if(!empty($row->eta_ramp_date)){
                        $html = date_format(date_create($row->eta_ramp_date),'Y-m-d');
                    }
                    return $html;
                })
                ->addColumn(
                    'orderLogUpdate',
                    function ($row) {
                        $html = '<a class="btn btn-default btn-xs btn-primary"   title="Update OrderLog" href="'.url('orders/edit', Crypt::encrypt($row->id)).'"><i class="fa fa-edit"></i></a>';
                        return $html;
                    }
                )
                ->addColumn(
                    'deleteOrderLog',
                    function ($row) {
                        $html = '<a class="btn btn-default btn-xs btn-danger ml-1 text-white" title="Delete OrderLog" href="'.url('orders/delete', Crypt::encrypt($row->id)).'"><i class="fa fa-trash"></i></a>';
                        return $html;
                    }
                )

            ;

            $rawColumns = [
                'order_number',
                'created_at',
                'shipper_id',
                'consignee_id',
                'PO_No',
                'eta_ramp_date',
                'MBL',
                'HBL',
                'container',
                'delivery_address',
                'orderLogUpdate',
                'deleteOrderLog',
            ];
            return $datatable->rawColumns($rawColumns)->make(true);
        }

        $data['shippers'] = User::whereHas('roles' , function($q){
            $q->where('name', 'shipper');
        })->get();

        $data['consignees'] = User::whereHas('roles' , function($q){
            $q->where('name', 'consignee');
        })->get();

        return view('orderLog.orderLogList', $data);
    }
}
