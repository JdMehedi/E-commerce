

@extends('layouts.user')

@section('custom_css')
    <link href="{{asset('assets/global/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/global/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
@stop

@section('content')

    <!-- BEGIN PAGE BAR -->
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{ URL::to('adminUser') }}">Dashboard</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="#">Change Password</a>
                <i class="fa fa-circle"></i>
            </li>
        </ul>
    </div>
    <!-- END PAGE BAR -->
    <!-- BEGIN PAGE TITLE-->

    <div class="content">
        <div class="col-md-6">
            <h3 class="page-title">Password Change Form</h3>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="portlet-body form">



                    {!! Form::open(array('url' => url('passwordSave'), 'files' => true, 'class'=>'form-horizontal') )  !!}

                    {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}


                    <div class="form-body">




                        <div class="form-group">
                            <label class="col-md-5 control-label"> Current Password <span class="red">*</span> : </label>
                            <div class="col-md-7">
                                <input type="password"  name="current_password"   placeholder="Enter Current password" required class="form-control input-inline input-medium" >
                                <div class="red">{{ $errors->first('current_password') }}</div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-5 control-label"> New Password <span class="red">*</span> : </label>
                            <div class="col-md-7">
                                <input type="password"  name="new_password"   pattern=".{8,}"   placeholder="Enter new minimum 8 password" required class="form-control input-inline input-medium" >
                                <div class="red">{{ $errors->first('new_password') }}</div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-5 control-label">New Confirm Password <span class="red">*</span> : </label>
                            <div class="col-md-7">
                                <input type="password"  name="new_confirm_password" pattern=".{8,}"   placeholder="Confirm new minimum 8 password" required class="form-control input-inline input-medium" >
                                <div class="red">{{ $errors->first('new_confirm_password') }}</div>
                            </div>
                        </div>




                        <div class="col-md-12">
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-5 col-md-6">
                                        <button type="submit" class="btn green">Save</button>
                                        <button type="reset" class="btn default reset">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <!-- END PAGE TITLE-->


@stop

@section('custom_js')
    <script src="{{asset('/phq/assets/global/plugins/select2/js/select2.full.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/phq/assets/pages/scripts/components-select2.min.js')}}" type="text/javascript"></script>

    <script>

        $(function() {
            $( "#date" ).datepicker({dateFormat: 'yy'});
        });

    </script>

@stop

