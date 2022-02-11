


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
                <a href="#">Add Report</a>
                <i class="fa fa-circle"></i>
            </li>
        </ul>
    </div>
    <!-- END PAGE BAR -->
    <!-- BEGIN PAGE TITLE-->

    <div class="content">
        <div class="col-md-6">
            <h3 class="page-title"> Add Report Form </h3>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="portlet-body form">



                    {!! Form::open(array('url' => url('reports/save'), 'files' => true, 'class'=>'form-horizontal') )  !!}

                    {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}


                    <div class="form-body">






                        @if(!empty($rts))
                            <input type="hidden" name="id" value="{{$rts->id}}">
                        @endif
                            <div class="form-group">
                                <label class="col-md-5 control-label"> Title <span class="red">*</span> : </label>
                                <div class="col-md-7">
                                    <input type="text"  name="rtitle"  value="@if(!empty($rts)) {{$rts->rtitle}} @endif"   placeholder="Enter Title" class="form-control input-inline input-medium" >
                                    <div class="red">{{ $errors->first('rtitle') }}</div>
                                </div>
                            </div>




                        <div class="form-group">
                            <label class="col-md-5 control-label"> Content <span class="red">*</span> : </label>
                            <div class="col-md-7">
                                <textarea type="text" style="min-height: 200px; min-width: 60%"  name="rcontent"     placeholder="Enter Report" class="form-control input-inline input-medium" placeholder="Please, Enter Unique Student Id">
                                @if(!empty($rts)) {{$rts->rcontent}} @endif
                                </textarea>
                                <div class="red">{{ $errors->first('rcontent') }}</div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-5 control-label">Upload File <span class="red">*</span> : </label>
                            <div class="col-md-7">
                                <input type="file"  name="rfile"  value="@if(!empty($rts)) {{$rts->rfile}} @endif"    placeholder="Enter Files " class="form-control input-inline input-medium" >
                                <div class="red">{{ $errors->first('rfile') }}</div>
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

