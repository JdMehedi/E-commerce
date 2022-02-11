




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
                <a href="#">Add Primary SList</a>
                <i class="fa fa-circle"></i>
            </li>
        </ul>
    </div>
    <!-- END PAGE BAR -->
    <!-- BEGIN PAGE TITLE-->

    <div class="content">
        <div class="col-md-6">
            <h3 class="page-title"> Add Primary Student Form </h3>
        </div>
        <div class="btn-group right" style="float:right;padding-top:25px">
            <a href="{{ URL::to('uDetails') }}" class="btn btn-sm blue"> <i class="fa fa-list"> </i>Primary Student List</a>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="portlet-body form">



                    {!! Form::open(array('url' => url('userDetails/save'), 'files' => true, 'class'=>'form-horizontal') )  !!}

                    {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}


                    <div class="form-body">






                        @if(!empty($userDetails))
                            <input type="hidden" name="id" value="{{$userDetails->id}}">
                        @endif

                        <div class="form-group">
                            <label class="col-md-5 control-label"> Student Id <span class="red">*</span> : </label>
                            <div class="col-md-7">
                                <input type="text" name="login_id" value="@if(!empty($userDetails)) {{$userDetails->login_id}} @endif" class="form-control input-inline input-medium" placeholder="Please, Enter Unique Student Id" required>
                                <div class="red">{{ $errors->first('login_id') }}</div>
                            </div>
                        </div>
                            <div class="form-group">
                                <label class="col-md-5 control-label">Contact Number <span class="red">*</span> : </label>
                                <div class="col-md-7">
                                    <input type="text" name="ctactnumber" value="@if(!empty($userDetails)) {{$userDetails->ctactnumber}} @endif" placeholder="Enter contact number" class="form-control input-inline input-medium" required>
                                    <div class="red">{{ $errors->first('ctactnumber') }}</div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-5 control-label">Guardian Contact Number <span class="red">*</span> : </label>
                                <div class="col-md-7">
                                    <input type="text" name="guarnumber" value="@if(!empty($userDetails)) {{$userDetails->guarnumber}} @endif" placeholder="Enter guardian contact number" class="form-control input-inline input-medium" required>
                                    <div class="red">{{ $errors->first('guarnumber') }}</div>
                                </div>
                            </div>



                        {{--<div class="form-group">--}}
                            {{--<label class="col-md-5 control-label"> Name <span class="red">*</span> : </label>--}}
                            {{--<div class="col-md-7">--}}
                                {{--<input type="text" name="name" value="@if(!empty($userDetails)) {{$userDetails->name}} @endif" placeholder="Enter name" class="form-control input-inline input-medium" >--}}
                                {{--<div class="red">{{ $errors->first('name') }}</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                            {{--<div class="form-group">--}}
                                {{--<label class="col-md-5 control-label">Father Name <span class="red">*</span> : </label>--}}
                                {{--<div class="col-md-7">--}}
                                    {{--<input type="text" name="fname" value="@if(!empty($userDetails)) {{$userDetails->fname}} @endif" placeholder="Enter father name" class="form-control input-inline input-medium" >--}}
                                    {{--<div class="red">{{ $errors->first('fname') }}</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                                {{--<label class="col-md-5 control-label">Mother Name <span class="red">*</span> : </label>--}}
                                {{--<div class="col-md-7">--}}
                                    {{--<input type="text" name="mname" value="@if(!empty($userDetails)) {{$userDetails->mname}} @endif" placeholder="Enter mother name" class="form-control input-inline input-medium" >--}}
                                    {{--<div class="red">{{ $errors->first('mname') }}</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                                {{--<label class="col-md-5 control-label"> Address <span class="red">*</span> : </label>--}}
                                {{--<div class="col-md-7">--}}
                                    {{--<input type="text" name="address" value="@if(!empty($userDetails)) {{$userDetails->address}} @endif" placeholder="Enter address" class="form-control input-inline input-medium" >--}}
                                    {{--<div class="red">{{ $errors->first('address') }}</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                                {{--<label class="col-md-5 control-label"> Department <span class="red">*</span> : </label>--}}
                                {{--<div class="col-md-7">--}}
                                    {{--<input type="text" name="department" value="@if(!empty($userDetails)) {{$userDetails->department}} @endif" placeholder="Enter department" class="form-control input-inline input-medium" >--}}
                                    {{--<div class="red">{{ $errors->first('department') }}</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                                {{--<label class="col-md-5 control-label"> Degree <span class="red">*</span> : </label>--}}
                                {{--<div class="col-md-7">--}}
                                    {{--<input type="text" name="degree" value="@if(!empty($userDetails)) {{$userDetails->degree}} @endif" placeholder="Enter degree" class="form-control input-inline input-medium" >--}}
                                    {{--<div class="red">{{ $errors->first('degree') }}</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                                {{--<label class="col-md-5 control-label">Contact Number <span class="red">*</span> : </label>--}}
                                {{--<div class="col-md-7">--}}
                                    {{--<input type="text" name="cnumber" value="@if(!empty($userDetails)) {{$userDetails->cnumber}} @endif" placeholder="Enter contact number" class="form-control input-inline input-medium" >--}}
                                    {{--<div class="red">{{ $errors->first('cnumber') }}</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                                {{--<label class="col-md-5 control-label">Room No <span class="red">*</span> : </label>--}}
                                {{--<div class="col-md-7">--}}
                                    {{--<input type="text" name="roomno" value="@if(!empty($userDetails)) {{$userDetails->roomno}} @endif" placeholder="Enter room no" class="form-control input-inline input-medium" >--}}
                                    {{--<div class="red">{{ $errors->first('roomno') }}</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                                {{--<label class="col-md-5 control-label"> Block <span class="red">*</span> : </label>--}}
                                {{--<div class="col-md-7">--}}
                                    {{--<input type="text" name="block" value="@if(!empty($userDetails)) {{$userDetails->block}} @endif" placeholder="Enter block" class="form-control input-inline input-medium" >--}}
                                    {{--<div class="red">{{ $errors->first('block') }}</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                                {{--<label class="col-md-5 control-label">Boader Type <span class="red">*</span> : </label>--}}
                                {{--<div class="col-md-7">--}}
                                    {{--<input type="text" name="btype" value="@if(!empty($userDetails)) {{$userDetails->btype}} @endif" placeholder="Enter boarder type" class="form-control input-inline input-medium" >--}}
                                    {{--<div class="red">{{ $errors->first('btype') }}</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                                {{--<label class="col-md-5 control-label">Birth Date <span class="red">*</span> : </label>--}}
                                {{--<div class="col-md-7">--}}
                                    {{--<input type="text" data-date-format="dd-mm-yyyy" name="birth_date" value="@if(!empty($userDetails)) {{$userDetails->birth_date}} @endif" placeholder="Enter birth date" class="form-control date-picker input-medium" >--}}
                                    {{--<div class="red">{{ $errors->first('birth_date') }}</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                                {{--<label class="col-md-5 control-label"> Gender <span class="red">*</span> : </label>--}}
                                {{--<div class="col-md-7">--}}
                                    {{--<input type="text" name="gender" value="@if(!empty($userDetails)) {{$userDetails->gender}} @endif" placeholder="Enter gender" class="form-control input-inline input-medium" >--}}
                                    {{--<div class="red">{{ $errors->first('gender') }}</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                                {{--<label class="col-md-5 control-label"> Religion <span class="red">*</span> : </label>--}}
                                {{--<div class="col-md-7">--}}
                                    {{--<input type="text" name="religion" value="@if(!empty($userDetails)) {{$userDetails->religion}} @endif" placeholder="Enter religion" class="form-control input-inline input-medium" >--}}
                                    {{--<div class="red">{{ $errors->first('religion') }}</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                                {{--<label class="col-md-5 control-label">District <span class="red">*</span> : </label>--}}
                                {{--<div class="col-md-7">--}}
                                    {{--<input type="text" name="districts" value="@if(!empty($userDetails)) {{$userDetails->districts}} @endif" placeholder="Enter districts" class="form-control input-inline input-medium" >--}}
                                    {{--<div class="red">{{ $errors->first('districts') }}</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                                {{--<label class="col-md-5 control-label">Blood Group <span class="red">*</span> : </label>--}}
                                {{--<div class="col-md-7">--}}
                                    {{--<input type="text" name="blood_group" value="@if(!empty($userDetails)) {{$userDetails->blood_group}} @endif" placeholder="Enter blood group" class="form-control input-inline input-medium" >--}}
                                    {{--<div class="red">{{ $errors->first('blood_group') }}</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                                {{--<label class="col-md-5 control-label">Photo <span class="red">*</span> : </label>--}}
                                {{--<div class="col-md-7">--}}
                                    {{--<input type="file" name="photo"  placeholder="Enter photo" class="form-control input-inline input-medium" >--}}
                                    {{--@if(!empty($userDetails->photo))--}}
                                        {{--<img width="80" src="{{asset('/uploads/personalPhotos/'.$userDetails->photo)}}"  alt="">--}}
                                    {{--@endif--}}

                                    {{--<div class="red">{{ $errors->first('photo') }}</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}


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

        /*$(document).ready(function(){

           $(document).on('select2:select', '#member_id', function (evt) {
               var member_id = $('#member_id option:selected').attr('data-member-id');


               var url_op = base_url+"/reports/lpc-form";
               $.ajax({
                  type: "POST",
                  url: url_op,
                  dataType: 'json',
                  data: {member_id: member_id, _token: csrf_token},
                  success : function(data){
                       if(data.status){
                           if(true){
                               window.location.href = url;
                           }else{
                               location.reload();
                           }
                     }
                   }

               });
           });

       });*/


        $(function() {
            $( "#date" ).datepicker({dateFormat: 'yy'});
        });

    </script>

@stop

