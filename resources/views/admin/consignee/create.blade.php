


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
                <a href="#">Consignee</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="#"> {{isset($user) ? 'Edit Consignee' : 'Add Consignee'}}</a>
                <i class="fa fa-circle"></i>
            </li>
        </ul>
    </div>
    <!-- END PAGE BAR -->
    <!-- BEGIN PAGE TITLE-->

    <div class="content">
        <div class="col-md-6">
            <h3 class="page-title">  {{isset($user) ? 'Edit Consignee' : 'Add Consignee'}}</h3>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="portlet-body form">
                    @if(empty($user->id))
                        {!! Form::open(array('url' => url('consignee/store'),'method' => 'post', 'files' => true, 'class'=>'form-horizontal') )  !!}
{{--                    <input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
                    @else
                        {!! Form::open(array('url' => url('consignee/update'),'method' => 'post', 'files' => true, 'class'=>'form-horizontal') )  !!}
                        <input type="hidden" name="id" value="@if(!empty($user->id)) {{$user->id}} @endif">
                    @endif
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-5 control-label"> Consignee <span class="red">*</span> : </label>
                            <div class="col-md-7">
                                <input type="text"  name="shipper"  value="@if(!empty($user->fname)) {{$user->fname}} @endif"   placeholder="Enter Consignee" class="form-control input-inline input-medium" >
                                <div class="red">{{ $errors->first('fname') }}</div>
                            </div>
                        </div>
                            <div class="form-group">
                            <label class="col-md-5 control-label">Consignee Name <span class="red">*</span> : </label>
                            <div class="col-md-7">
                                <input type="text"  name="nickName"  value="@if(!empty($user->nick_name)) {{$user->nick_name}} @endif"   placeholder="Enter Nick Name" class="form-control input-inline input-medium" >
                                <div class="red">{{ $errors->first('nick_name') }}</div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-5 col-md-6">
                                        <button type="submit" class="btn green">
                                            {{isset($user) ? 'Edit consignee' : 'Add consignee'}}
                                           </button>
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

