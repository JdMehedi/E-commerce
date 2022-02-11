


@extends('layouts.user')
@section('custom_css')
    <link href="{{asset('phq/assets/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('phq/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')}}" rel="stylesheet" type="text/css" />
@stop


@section('content')

    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{ URL::to('/adminUser') }}">Dashboard</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="#">Notice List</a>
            </li>
        </ul>
    </div>
    <!-- END PAGE BAR -->
    <!-- BEGIN PAGE TITLE-->
    <div class="content">
        <div class="col-md-6">
            <h3 class="page-title"> Notice List </h3>
        </div>
        @if(($userTable)&&$userTable->userType==1)
        <div class="btn-group right" style="float:right;padding-top:25px">
            <a href="{{ URL::to('notices/add') }}" class="btn btn-sm red"><i class="fa fa-plus"></i>  Add Notice</a>
        </div>
        @endif
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
                            <th>Title</th>
                            <th>Notice File</th>
                            <th>Time</th>
                            @if(($userTable)&&$userTable->userType==1)
                            <th>ACTION</th>
                                @endif
                        </tr>
                        </thead>
                        <tbody>

                        @if(isset($nots[0]))
                            @foreach($nots as $not)

                                <tr>
                                    <td>{{$not->id}}</td>
                                    <td>{{$not->ntitle}}</td>

                                    <td><a target="_blank"  href="{{route('downLoadFile',encrypt($not->nfile))}}">File</a></td>
                                    <td>{{\Carbon\Carbon::parse($not->updated_at)->diffForhumans()}}</td>
                                    @if(($userTable)&&$userTable->userType==1)
                                    <td>
                                        <a href="{{url('notices/edit').'?id='.$not->id}}" class="btn btn-xs blue"> <i class="fa fa-edit"></i>Edit /</a>
                                        <a href="{{url('notices/delete').'?id='.$not->id}}" class="btn btn-xs red" onclick="return confirm('Do You want to confirm the notice delete?')"><i class="fa fa-trash" title="delete"></i>Delete</a>
                                    </td>
                                        @endif
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
    </div>
    <!-- END CONTENT BODY -->
    </div>
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




















