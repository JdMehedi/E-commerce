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
                <a href="#">Shipper List</a>
            </li>
        </ul>
    </div>
    <!-- END PAGE BAR -->
    <!-- BEGIN PAGE TITLE-->
    <div class="content">
        <div class="col-md-6">
            <h3 class="page-title"> Shipper List </h3>
        </div>

            <div class="btn-group right" style="float:right;padding-top:25px">
                <a href="{{route('shipper.create')}}" class="btn btn-sm red"><i class="fa fa-plus"></i>  Add Shipper</a>
            </div>

    </div>
    <!-- END PAGE TITLE-->
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="tools"> </div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover" id="sample_1"><!-- table2 -->
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Shipper</th>
                            <th>Nick Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php $index = 1?>
                    @if(!empty($lists))
                        @foreach($lists as $list)
                        <tr>
                            <td>{{$index ++}}</td>
                            <td>{{$list->fname}}</td>
                            <td>{{$list->nick_name}}</td>
                            <td>
                                <a href="{{route('shipper.edit',$list->slug)}}" class="btn btn-xs blue"> <i class="fa fa-edit"></i>Edit</a>
                                <a href="{{route('shipper.destroy',$list->slug)}}" class="btn btn-xs red" onclick="return confirm('Do You want to confirm the shipper delete?')"><i class="fa fa-trash" title="delete"></i>Delete</a>
                                <a href="{{route('shipper.show',$list->slug)}}" class="btn btn-xs yellow"> <i class="fa fa-edit"></i>Contact Detail</a>
                            </td>
                        </tr>
                        @endforeach
                    @endif
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




















