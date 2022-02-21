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
				<a href="#">Profile</a>
				<i class="fa fa-circle"></i>
			</li>
		</ul>
	</div>
	<!-- END PAGE BAR -->
	<!-- BEGIN PAGE TITLE-->

	<div class="content">
		<div class="col-md-6">
			<h3 class="page-title"> Profile </h3>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="portlet-body form">
					<form class="form-horizontal" method="post" action="{{url('profileUpdate')}}" autocomplete="off" enctype="multipart/form-data">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="form-body">

							@if(!empty($particularPro))
								<input type="hidden" name="id" value="{{$particularPro->id}}">
							@endif
							<div class="row">
								<div class="col-md-12">
									<div class="col-md-6">
										<div class="form-group">
											<label class=""> First Name <span class="red">*</span> : </label>
											<div class="">
												<input type="text" name="fname" value="@if(!empty($particularPro->fname)){{$particularPro->fname}}@else{{old('fname')}}@endif" class="form-control input-inline input-large" placeholder="Enter First Name">
												<div class="red">{{ $errors->first('fname') }}</div>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class=""> Last Name <span class="red">*</span> : </label>
											<div class="">
												<input type="text" name="lname"   value="@if(!empty($particularPro->lname)){{$particularPro->lname}}@else{{old('lname')}}@endif" placeholder="Enter Last Name" class="form-control input-inline input-large" >
												<div class="red">{{ $errors->first('lname') }}</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="col-md-6">
										<div class="form-group">
											<label class=""> Email <span class="red">*</span> : </label>
											<div class="">
												<input type="email" name="email"  value="@if(!empty($particularPro->email)){{$particularPro->email}}@else{{old('email')}}@endif" placeholder="Enter Unique email" class="form-control input-inline input-large" >
												<div class="red">{{ $errors->first('email') }}</div>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class=""> Nick Name <span class="red">*</span> : </label>
											<div class="">
												<input type="text"  name="nick_name"   value="@if(!empty($particularPro->nick_name)){{$particularPro->nick_name}}@else{{old('nick_name')}}@endif" placeholder="Nick Name" class="form-control input-inline input-large" >
												<div class="red">{{ $errors->first('nick_name') }}</div>
											</div>
										</div>
									</div>
								</div>

								<div class="col-md-12">
									<div class="col-md-6">
										<div class="form-group">
											<label class="">Mobile <span class="red">*</span> : </label>
											<div class="">
												<input type="text" name="mobile" value="@if(!empty($particularPro->mobile)){{$particularPro->mobile}}@else{{old('mobile')}}@endif" placeholder="Enter Mobile" class="form-control input-inline input-large" >
												<div class="red">{{ $errors->first('mobile') }}</div>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class=""> Phone <span class="red">*</span> : </label>
											<div class="">
												<input type="text" name="phone" value="@if(!empty($particularPro->phone)){{$particularPro->phone}}@else{{old('phone')}}@endif" placeholder="Enter Phone" class="form-control input-inline input-large" >
												<div class="red">{{ $errors->first('phone') }}</div>
											</div>
										</div>
									</div>

								</div>

								<div class="col-md-12">
									<div class="col-md-6">
										<div class="form-group">
											<label class="">Profile Image <span class="red">*</span> : </label>
											<div class="">
												<input type="file" name="profile_image"  placeholder="Enter photo" class="form-control input-inline input-large" >
												@if(!empty($particularPro->profile_image))
													<img width="80" src="{{asset('/uploads/personalPhotos/'.$particularPro->profile_image)}}"  alt="">
												@endif

												<div class="red">{{ $errors->first('profile_image') }}</div>
											</div>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label class=""> Address <span class="red">*</span> : </label>
											<div class="">
												<input type="text" name="address" value="@if(!empty($particularPro->address)){{$particularPro->address}}@else{{old('address')}}@endif" placeholder="Enter address" class="form-control input-inline input-large" >
												<div class="red">{{ $errors->first('address') }}</div>
											</div>
										</div>
									</div>

								</div>

								<div class="col-md-10">
									<div class="form-actions">
										<div class="row">
											<div class="col-md-offset-5 col-md-6">
												<button type="submit" class="btn green">Update</button>
												<button type="reset" class="btn default reset">Cancel</button>
											</div>
										</div>
									</div>
								</div>
							</div>


						</div>
					</form>
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

