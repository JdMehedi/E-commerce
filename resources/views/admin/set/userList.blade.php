
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
                <a href="{{ URL::to('users') }}">UserList</a>
            </li>
        </ul>
    </div>
    <!-- END PAGE BAR -->
    <!-- BEGIN PAGE TITLE-->
    <div class="content">
        <div class="col-md-6">
            <h3 class="page-title">User List </h3>
        </div>
        <div class="btn-group right" style="float:right;padding-top:25px">
            <a href="{{ URL::to('users/add') }}" class="btn btn-sm red"><i class="fa fa-plus"></i>  Add User </a>
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
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>EMAIL</th>
                            <th>Nick Name</th>
                            <th> Roles </th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Mobile</th>
                            <th>Contact</th>
                            <th>Fax</th>
                            <th>Profile Image</th>
                            <th>Date Of Birth</th>
                            <th>Status</th>
                            <th>ACTION</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($users[0]))
                            @foreach($users as $user)

                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->fname}}</td>
                                    <td>{{$user->lname}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->nick_name}}</td>
                                    @php
                                        $html = '';
                                        $roles = App\User::find($user->id)->getRoleNames();
                                        foreach ($roles as $role) {
                                            $html .=  $role;
                                        }
                                    @endphp
                                    <td> <span class="badge badge-info">{{$html}}</span></td>
                                    <td>{{$user->address}}</td>
                                    <td>{{$user->phone}}</td>
                                    <td>{{$user->mobile}}</td>
                                    <td>{{$user->contact}}</td>
                                    <td>{{$user->fax}}</td>
                                    <td>
                                        @if(!empty($user->profile_image))
                                            <img width="80%" src="{{asset('/uploads/personalPhotos/'.$user->profile_image)}}"  alt="">
                                        @endif

                                    </td>
                                    <td>{{$user->DOB}}</td>
                                    @if($user->status==1)
                                        <td>Active</td>
                                    @else
                                        <td>Inactive</td>
                                    @endif
                                    <td>
                                        <a href="{{url('users/edit').'?id='.$user->id}}" class="btn btn-xs blue"> <i class="fa fa-edit"></i> Edit /</a>
                                        <a href="{{url('users/delete').'?id='.$user->id}}" class="btn btn-xs red" onclick="return confirm('Do You confirm?')"><i class="fa fa-trash" title="delete"></i>Delete</a>
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
                    var url_op = base_url+"/users/delete";
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




















