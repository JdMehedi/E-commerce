











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
						<h4 style="text-align: center;" class="card-title">{{$particularPro->username}}'s Profile</h4>
					</div>
					<div style="margin-top: 16px;" class="card-body">



						<div style="margin-left: 9%;"  style="margin-left: 9%;"  class="row">



							<div class="col-md-12">
								<div class="form-group">
									<label style="font-size: 14px; " class="bmd-label-floating">Student Id</label>
									<h2  style="margin-left: 5%;margin-top: 1px; font-size: 200%;" >{{$particularPro->student_id}}</h2>
								</div>
							</div>

						</div>
						<div  style="margin-left: 9%;"  class="row">



							<div class="col-md-12">
								<div class="form-group">
									<label style="font-size: 14px; " class="bmd-label-floating">Email</label>
									<h2  style="margin-left: 5%;margin-top: 1px; font-size: 200%;" >{{$particularPro->email}}</h2>
								</div>
							</div>

						</div>
						<div  style="margin-left: 9%;"  class="row">



							<div class="col-md-12">
								<div class="form-group">
									<label style="font-size: 14px; " class="bmd-label-floating">Amount</label>
									<h2  style="margin-left: 5%;margin-top: 1px; font-size: 200%;" >{{$particularPro->amount}}</h2>
								</div>
							</div>

						</div>
						<div  style="margin-left: 9%;"  class="row">



							<div class="col-md-12">
								<div class="form-group">
									<label style="font-size: 14px; " class="bmd-label-floating">Name</label>
									<h2  style="margin-left: 5%;margin-top: 1px; font-size: 200%;" >{{$particularPro->name}}</h2>
								</div>
							</div>

						</div>
						<div  style="margin-left: 9%;"  class="row">



							<div class="col-md-12">
								<div class="form-group">
									<label style="font-size: 14px; " class="bmd-label-floating">Room No</label>
									<h2  style="margin-left: 5%;margin-top: 1px; font-size: 200%;" >{{$particularPro->roomno}}</h2>
								</div>
							</div>

						</div>
						<div  style="margin-left: 9%;"  class="row">



							<div class="col-md-12">
								<div class="form-group">
									<label style="font-size: 14px; " class="bmd-label-floating">Bed No</label>
									<h2  style="margin-left: 5%;margin-top: 1px; font-size: 200%;" >{{$particularPro->bedno}}</h2>
								</div>
							</div>

						</div>
						<div  style="margin-left: 9%;"  class="row">



							<div class="col-md-12">
								<div class="form-group">
									<label style="font-size: 14px; " class="bmd-label-floating">Department</label>
									<h2  style="margin-left: 5%;margin-top: 1px; font-size: 200%;" >{{$particularPro->department}}</h2>
								</div>
							</div>

						</div>
						<div  style="margin-left: 9%;"  class="row">



							<div class="col-md-12">
								<div class="form-group">
									<label style="font-size: 14px; " class="bmd-label-floating">Session</label>
									<h2  style="margin-left: 5%;margin-top: 1px; font-size: 200%;" >{{$particularPro->ses}}</h2>
								</div>
							</div>

						</div>
						<div  style="margin-left: 9%;"  class="row">



							<div class="col-md-12">
								<div class="form-group">
									<label style="font-size: 14px; " class="bmd-label-floating">Year/Semester</label>
									<h2  style="margin-left: 5%;margin-top: 1px; font-size: 200%;" >{{$particularPro->yearSem}}</h2>
								</div>
							</div>

						</div>
						<div  style="margin-left: 9%;"  class="row">



							<div class="col-md-12">
								<div class="form-group">
									<label style="font-size: 14px; " class="bmd-label-floating">Father Name</label>
									<h2  style="margin-left: 5%;margin-top: 1px; font-size: 200%;" >{{$particularPro->fname}}</h2>
								</div>
							</div>

						</div>


						<div  style="margin-left: 9%;"  class="row">



							<div class="col-md-12">
								<div class="form-group">
									<label style="font-size: 14px; " class="bmd-label-floating">Mother Name</label>
									<h2  style="margin-left: 5%;margin-top: 1px; font-size: 200%;" >{{$particularPro->mname}}</h2>
								</div>
							</div>

						</div>
						<div  style="margin-left: 9%;"  class="row">



							<div class="col-md-12">
								<div class="form-group">
									<label style="font-size: 14px; " class="bmd-label-floating">Address</label>
									<h2  style="margin-left: 5%;margin-top: 1px; font-size: 200%;" >{{$particularPro->address}}</h2>
								</div>
							</div>

						</div>
						<div  style="margin-left: 9%;"  class="row">



							<div class="col-md-12">
								<div class="form-group">
									<label style="font-size: 14px; " class="bmd-label-floating">Birth Date</label>
									<h2  style="margin-left: 5%;margin-top: 1px; font-size: 200%;" >{{$particularPro->birth_date}}</h2>
								</div>
							</div>

						</div>
						<div  style="margin-left: 9%;"  class="row">



							<div class="col-md-12">
								<div class="form-group">
									<label style="font-size: 14px; " class="bmd-label-floating">Contact Number</label>
									<h2  style="margin-left: 5%;margin-top: 1px; font-size: 200%;" >{{$particularPro->cnumber}}</h2>
								</div>
							</div>

						</div>
						<div  style="margin-left: 9%;"  class="row">



							<div class="col-md-12">
								<div class="form-group">
									<label style="font-size: 14px; " class="bmd-label-floating">Guardian Contact Number</label>
									<h2  style="margin-left: 5%;margin-top: 1px; font-size: 200%;" >{{$particularPro->guarcontact}}</h2>
								</div>
							</div>

						</div>
						<div  style="margin-left: 9%;"  class="row">



							<div class="col-md-12">
								<div class="form-group">
									<label style="font-size: 14px; " class="bmd-label-floating">Blood Group</label>
									<h2  style="margin-left: 5%;margin-top: 1px; font-size: 200%;" >{{$particularPro->blood_group}}</h2>
								</div>
							</div>

						</div>
						<div  style="margin-left: 9%;"  class="row">



							<div class="col-md-12">
								<div class="form-group">
									<label style="font-size: 14px; " class="bmd-label-floating">Photo</label>
									<h2  style="margin-left: 5%;margin-top: 1px; font-size: 200%;" ><img style="width: 100px" class="img" src="{{asset('/uploads/personalPhotos/'.$particularPro->photo)}}" /></h2>
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

