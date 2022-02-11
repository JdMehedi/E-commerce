
@extends('layouts.user')

@section('custom_css')
	<!-- CSS Just for demo purpose, don't include it in your project -->

	<link href="{{asset('/particular_profile/assets/css/material-dashboard.css?v=2.1.1')}}" rel="stylesheet" />

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




			@if(isset($particularPro))
				<div style="margin-top: 5%"  class="panel-body">

				<div class="userProfile" style="flex: 0 0 66.666667%; min-height: 200px; width: 70%;  ">
				<div style="margin-left: 25%;" class="card">

					<div class="card-header card-header-primary">
						<h4 style="text-align: center;" class="card-title">{{$particularPro->fname}}'s Profile</h4>
					</div>
					<div style="margin-top: 16px;" class="card-body">
						<div  style="margin-left: 12%;"  class="row">



							<div class="col-md-12">
								<div class="form-group">
									<label style="font-size: 14px; " class="bmd-label-floating">First Name</label>
									<h2  style="margin-left: 5%;margin-top: 1px; font-size: 200%;" >{{$particularPro->fname}}</h2>
								</div>
							</div>

						</div>
						<div  style="margin-left: 12%;"  class="row">



							<div class="col-md-12">
								<div class="form-group">
									<label style="font-size: 14px; " class="bmd-label-floating">Last Name</label>
									<h2  style="margin-left: 5%;margin-top: 1px; font-size: 200%;" >{{$particularPro->lname}}</h2>
								</div>
							</div>

						</div>




						<div  style="margin-left: 12%;"  class="row">



							<div class="col-md-12">
								<div class="form-group">
									<label style="font-size: 14px; " class="bmd-label-floating">Email</label>
									<h2  style="margin-left: 5%;margin-top: 1px; font-size: 200%;" >{{$particularPro->email}}</h2>
								</div>
							</div>

						</div>
						<div  style="margin-left: 12%;"  class="row">



							<div class="col-md-12">
								<div class="form-group">
									<label style="font-size: 14px; " class="bmd-label-floating">Nick Name</label>
									<h2  style="margin-left: 5%;margin-top: 1px; font-size: 200%;" >{{$particularPro->nick_name}}</h2>
								</div>
							</div>

						</div>


						<div  style="margin-left: 12%;"  class="row">



							<div class="col-md-12">
								<div class="form-group">
									<label style="font-size: 14px; " class="bmd-label-floating">Address</label>
									<h2  style="margin-left: 5%;margin-top: 1px; font-size: 200%;" >{{$particularPro->address}}</h2>
								</div>
							</div>

						</div>
						<div  style="margin-left: 12%;"  class="row">



							<div class="col-md-12">
								<div class="form-group">
									<label style="font-size: 14px; " class="bmd-label-floating">Phone</label>
									<h2  style="margin-left: 5%;margin-top: 1px; font-size: 200%;" >{{$particularPro->phone}}</h2>
								</div>
							</div>

						</div>
						<div  style="margin-left: 12%;"  class="row">



							<div class="col-md-12">
								<div class="form-group">
									<label style="font-size: 14px; " class="bmd-label-floating">Mobile</label>
									<h2  style="margin-left: 5%;margin-top: 1px; font-size: 200%;" >{{$particularPro->mobile}}</h2>
								</div>
							</div>

						</div>
						<div  style="margin-left: 12%;"  class="row">



							<div class="col-md-12">
								<div class="form-group">
									<label style="font-size: 14px; " class="bmd-label-floating">Contact</label>
									<h2  style="margin-left: 5%;margin-top: 1px; font-size: 200%;" >{{$particularPro->contact}}</h2>
								</div>
							</div>

						</div>
						<div  style="margin-left: 12%;"  class="row">



							<div class="col-md-12">
								<div class="form-group">
									<label style="font-size: 14px; " class="bmd-label-floating">Fax</label>
									<h2  style="margin-left: 5%;margin-top: 1px; font-size: 200%;" >{{$particularPro->fax}}</h2>
								</div>
							</div>

						</div>


						<div  style="margin-left: 12%;"  class="row">



							<div class="col-md-12">
								<div class="form-group">
									<label style="font-size: 14px; " class="bmd-label-floating">Profile_Image</label>
									<h2  style="margin-left: 5%;margin-top: 1px; font-size: 200%;" >{{$particularPro->profile_image}}</h2>
								</div>
							</div>

						</div>
						<div  style="margin-left: 12%;"  class="row">



							<div class="col-md-12">
								<div class="form-group">
									<label style="font-size: 14px; " class="bmd-label-floating">Gender</label>
									<h2  style="margin-left: 5%;margin-top: 1px; font-size: 200%;" >{{$particularPro->gender}}</h2>
								</div>
							</div>

						</div>
						<div  style="margin-left: 12%;"  class="row">



							<div class="col-md-12">
								<div class="form-group">
									<label style="font-size: 14px; " class="bmd-label-floating">DOB</label>
									<h2  style="margin-left: 5%;margin-top: 1px; font-size: 200%;" >{{$particularPro->DOB}}</h2>
								</div>
							</div>

						</div>
						<div  style="margin-left: 12%;"  class="row">



							<div class="col-md-12">
								<div class="form-group">
									<label style="font-size: 14px; " class="bmd-label-floating">Country</label>
									<h2  style="margin-left: 5%;margin-top: 1px; font-size: 200%;" >{{$particularPro->country}}</h2>
								</div>
							</div>

						</div>
						<div  style="margin-left: 12%;"  class="row">



							<div class="col-md-12">
								<div class="form-group">
									<label style="font-size: 14px; " class="bmd-label-floating">City</label>
									<h2  style="margin-left: 5%;margin-top: 1px; font-size: 200%;" >{{$particularPro->city}}</h2>
								</div>
							</div>

						</div>

					</div>
				</div>
			</div>
			</div>




			@endif



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

