@extends('layouts.user')
@section('custom_css')
    <link href="{{asset('phq/assets/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('phq/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')}}" rel="stylesheet" type="text/css" />
@stop
@section('content')

    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="">Dashboard</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="#">Contact List</a>
            </li>
        </ul>
    </div>
    <!-- END PAGE BAR -->
    <!-- BEGIN PAGE TITLE-->
    <div class="content">
        <div class="col-md-6">
            <h3 class="page-title"> Contact List </h3>
        </div>
    </div>
    <!-- END PAGE TITLE-->
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="tools ">
                        <div class="btn btn-sm">
                            <a href="{{route('user.contact.create',$slug)}}" class="btn btn-sm red"><i class="fa fa-plus"></i>  Add Contact</a>
                        </div>

                    </div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover" id="sample_1"><!-- table2 -->
                        <thead>
                        <tr>
                            <th>Contact</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Mobile</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($lists as $list)
                            <tr>
                                <td>{{$list->contact}}</td>
                                <td>{{$list->email}}</td>
                                <td>{{$list->phone}}</td>
                                <td>{{$list->mobile}}</td>
                                <td>{{$list->address}}</td>
                                <td>
                                    <a href="" class="btn btn-xs blue"> <i class="fa fa-edit"></i>Edit</a>
                                    <a href="" class="btn btn-xs red" onclick="return confirm('Do You want to confirm the shipper delete?')"><i class="fa fa-trash" title="delete"></i>Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
    <!-- END CONTENT BODY -->
    <!-- END CONTENT -->
@stop
@section('custom_js')
    <script src="{{asset('phq/assets/global/scripts/datatable.js')}}" type="text/javascript"></script>
    <script src="{{asset('phq/assets/global/plugins/datatables/datatables.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('phq/assets/global/plugins/datatables/datatables.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('phq/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')}}" type="text/javascript"></script>
    <script>
        $('#sample_1').DataTable({
            "iDisplayLength": 10,
            "aLengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "all"]
            ]
        });

        $(document).ready(function(){
            $('.delete-user').on('click', function(e){
                e.preventDefault();
                var user_id = $(this).attr("data-user_id");
                var csrf_token = "{{ csrf_token() }}";
                if(user_id)
                {
                    var url_op = base_url+"/userDetails/delete";
                    $.ajax({
                        type: "POST",
                        url: url_op,
                        dataType: 'json',
                        data: {user_id: user_id, _token: csrf_token},
                        success: function(msg) {
                            if(msg['output'] == 'ture')
                            {
                                alert('Successfully Deleted.');
                                location.reload();
                            }
                            else{
                                alert(msg['output']);
                            }
                        }
                    });
                }
            });
        });

    </script>
@stop




















