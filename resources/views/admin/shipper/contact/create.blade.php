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
                <a href="#">Contact</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="#">Add Contact</a>
                <i class="fa fa-circle"></i>
            </li>
        </ul>
    </div>
    <!-- END PAGE BAR -->
    <!-- BEGIN PAGE TITLE-->

    <div class="content">
        <div class="col-md-6">
            <h3 class="page-title"> Add Contact Form </h3>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="portlet-body form">
                        {!! Form::open(array('url' => url('userContact/store',$slug),'method' => 'post', 'files' => true, 'class'=>'form-horizontal') )  !!}
                    <div class="form-body">
                            <input type="hidden"  name="user_id"  value="{{$lists->id}}" class="form-control input-inline input-medium" >
                        <div class="form-group">
                            <label class="col-md-5 control-label"> Email <span class="red">*</span> : </label>
                            <div class="col-md-7">
                                <input type="text"  name="email"  value=""   placeholder="Enter email" class="form-control input-inline input-medium" >
                                <div class="red">{{ $errors->first('contact') }}</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-5 control-label">Phone <span class="red">*</span> : </label>
                            <div class="col-md-7">
                                <input type="tel"  name="phone"  value=""   placeholder="Enter phone number" class="form-control input-inline input-medium" >
                                <div class="red">{{ $errors->first('phone') }}</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-5 control-label">Contact <span class="red">*</span> : </label>
                            <div class="col-md-7">
                                <input type="text"  name="contact"  value=""   placeholder="Enter contact" class="form-control input-inline input-medium" >
                                <div class="red">{{ $errors->first('contact') }}</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-5 control-label">mobile <span class="red">*</span> : </label>
                            <div class="col-md-7">
                                <input type="text"  name="mobile"  value=""   placeholder="Enter phone number" class="form-control input-inline input-medium" >
                                <div class="red">{{ $errors->first('mobile') }}</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-5 control-label">Fax <span class="red">*</span> : </label>
                            <div class="col-md-7">
                                <input type="text"  name="fax"  value=""   placeholder="Enter fax number" class="form-control input-inline input-medium" >
                                <div class="red">{{ $errors->first('fax') }}</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-5 control-label">Address <span class="red">*</span> : </label>
                            <div class="col-md-7">
                                <textarea name="address" id="address" cols="30" rows="10"></textarea>
                                <div class="red">{{ $errors->first('address') }}</div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-5 col-md-6">
                                        <button type="submit" class="btn green">
                                            {{isset($UserContact) ? 'Edit contact' : 'Add contact'}}
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

