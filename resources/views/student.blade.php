
{{--@include('layouts.user')--}}

@extends('layouts.userWelcome')
@section('custom_css')
    <link href="{{asset('/phq/assets/global/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/phq/assets/global/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
@stop
@section('content')
    <script src="{{asset('phq/assets/js/tableToExcel.js')}}" type="text/javascript"></script>

    <style type="text/css">
        #sample_12 th{
            text-align: center;
        }

    </style>

    <div class="portlet light bordered">
        <div class="portlet-title">
            <div style="float: left; margin-left: 36%; margin-top: 3%;" class="tools">


                <label style="background-color: lightcoral"  class="panel-heading control-label"> Please Provide your Student Id and Password <span class="red">*</span>  </label>

            </div>
        </div>
    </div>



    <div class="row">

        <!-- BEGIN EXAMPLE TABLE PORTLET-->

        <div class="portlet-body">



            <div   class="col-md-8 col-md-offset-2">
                <div style="margin-top: 0%; min-height: 500px" class="panel panel-default">
                    <div style="background-color: purple" class="panel-heading">Student Registeration/1st Step</div>

                    <div style="margin-top: 10%" class="panel-body">
                        {!! Form::open(array('url' => url('studentLogin'), 'files' => true, 'class'=>'form-horizontal') )  !!}

                        {{--<form class="form-horizontal" method="POST" action="{{ route('studentLogin') }}">--}}
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('student_id') ? ' has-error' : '' }}">
                            <label for="student_id" class="col-md-4 control-label">Student Id</label>

                            <div class="col-md-6">
                                <input id="student_id" type="text" class="form-control" name="student_id" value="{{ old('student_id') }}" required autofocus>

                                @if ($errors->has('student_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('student_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>


                            </div>
                        </div>
                        {{--</form>--}}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

        </div>

    </div>









@stop


@section('custom_js')
    <script src="{{asset('/phq/assets/global/plugins/select2/js/select2.full.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/phq/assets/pages/scripts/components-select2.min.js')}}" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            //console.log('value');
            $(document).on('change', '.password_change', function (evt) {
                var value = $(this).val();
                // document.write(value);
                console.log(value);
                if(value == 1){

                    $('.pass').removeClass('hide');
                    $('.log').addClass('hidden');


                }

                if(value==0){

                    $('.pass').addClass('hide');
                    $('.log').removeClass('hidden');
                }

            });
        });
    </script>



@stop
