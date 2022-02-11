


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
                <a href="#">Student List</a>
            </li>
        </ul>
    </div>
    <!-- END PAGE BAR -->
    <!-- BEGIN PAGE TITLE-->
    <div class="content">
        <div class="col-md-6">
            <h3 class="page-title"> Primary SList </h3>
        </div>
        <div class="btn-group right" style="float:right;padding-top:25px">
            <a href="{{ URL::to('userDetails/add') }}" class="btn btn-sm red"><i class="fa fa-plus"></i>  Add Student</a>
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
                            <th>Student ID</th>
                            <th>Contact Number</th>
                            <th>Guardian Contact Number</th>
                            {{--<th>Name</th>--}}
                            {{--<th>Father Name</th>--}}
                            {{--<th>Mother Name</th>--}}
                            {{--<th>Address</th>--}}
                            {{--<th>Department</th>--}}
                            {{--<th>Degree</th>--}}
                            {{--<th>Contact Number</th>--}}
                            {{--<th>Room No.</th>--}}
                            {{--<th>Block</th>--}}
                            {{--<th>Boarder Type</th>--}}
                            {{--<th>Birth Date</th>--}}
                            {{--<th>Gender</th>--}}
                            {{--<th>Religion</th>--}}
                            {{--<th>District</th>--}}
                            {{--<th>Blood Group</th>--}}
                            {{--<th>Photo</th>--}}
                            <th>ACTION</th>
                        </tr>
                        </thead>
                        <tbody>

                        @if(isset($userDetails[0]))
                            @foreach($userDetails as $user)

                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->login_id}}</td>
                                    <td>{{$user->ctactnumber}}</td>
                                    <td>{{$user->guarnumber}}</td>
                                    {{--<td>{{$user->name}}</td>--}}
                                    {{--<td>{{$user->fname}}</td>--}}
                                    {{--<td>{{$user->mname}}</td>--}}
                                    {{--<td>{{$user->address}}</td>--}}
                                    {{--<td>{{$user->department}}</td>--}}
                                    {{--<td>{{$user->degree}}</td>--}}
                                    {{--<td>{{$user->cnumber}}</td>--}}
                                    {{--<td>{{$user->roomno}}</td>--}}
                                    {{--<td>{{$user->block}}</td>--}}
                                    {{--<td>{{$user->btype}}</td>--}}
                                    {{--<td>{{$user->birth_date}}</td>--}}
                                    {{--<td>{{$user->gender}}</td>--}}
                                    {{--<td>{{$user->religion}}</td>--}}
                                    {{--<td>{{$user->districts}}</td>--}}
                                    {{--<td>{{$user->blood_group}}</td>--}}
                                    {{--<td>--}}
                                        {{--@if(!empty($user->photo))--}}
                                            {{--<img width="80%" src="{{asset('/uploads/personalPhotos/'.$user->photo)}}"  alt="">--}}
                                        {{--@endif--}}

                                    {{--</td>--}}

                                    <td>
                                        <a href="{{url('userDetails/edit').'?id='.$user->id}}" class="btn btn-xs blue"> <i class="fa fa-edit"></i>Edit /</a>
                                        <a href="{{url('userDetails/delete').'?id='.$user->id}}" class="btn btn-xs red" onclick="return confirm('Do You want to confirm the deletion?')"><i class="fa fa-trash" title="delete"></i>Delete</a>
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




















