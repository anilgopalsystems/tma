@extends('layouts.dashboard')

@section('pagestylesheets')
{{ HTML::style("assets/plugins/select2/select2_metro.css") }}
{{ HTML::style("assets/plugins/bootstrap-fileupload/bootstrap-fileupload.css") }}
{{ HTML::style("assets/plugins/gritter/css/jquery.gritter.css") }}
{{ HTML::style("assets/plugins/select2/select2_metro.css") }}
{{ HTML::style("assets/plugins/clockface/css/clockface.css") }}
{{ HTML::style("assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css") }}
{{ HTML::style("assets/plugins/bootstrap-datepicker/css/datepicker.css") }}
{{ HTML::style("assets/plugins/bootstrap-timepicker/compiled/timepicker.css") }}
{{ HTML::style("assets/plugins/bootstrap-colorpicker/css/colorpicker.css") }}
{{ HTML::style("assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css") }}
{{ HTML::style("assets/plugins/bootstrap-datetimepicker/css/datetimepicker.css") }}
{{ HTML::style("assets/plugins/jquery-multi-select/css/multi-select.css") }}
{{ HTML::style("assets/plugins/bootstrap-switch/static/stylesheets/bootstrap-switch-metro.css") }}
{{ HTML::style("assets/plugins/jquery-tags-input/jquery.tagsinput.css") }}
{{ HTML::style("assets/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css") }}

@stop

@section('content')


	<!-- BEGIN CONTENT -->
	<div class="menuvalue" style="display:none">{{ $common_name }}</div>
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					{{ ucfirst($common_name) }} <small>create {{ $common_name }}</small>
					</h3>
					<ul class="page-breadcrumb breadcrumb">
						<li class="btn-group">
							<button type="button" class="btn blue dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
							<span>
								Actions
							</span>
							<i class="fa fa-angle-down"></i>
							</button>
							<ul class="dropdown-menu pull-right" role="menu">
								<li>
									<a href="#">Action</a>
								</li>
								<li>
									<a href="#">Another action</a>
								</li>
								<li>
									<a href="#">Something else here</a>
								</li>
								<li class="divider">
								</li>
								<li>
									<a href="#">Separated link</a>
								</li>
							</ul>
						</li>
						<li>
							<i class="fa fa-home"></i>
							<a href="index-2.html">Home</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="{{ URL::to(ucfirst($common_name)) }}">{{ ucfirst($common_name) }}</a>							
						</li>
					</ul>
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
								<div class="portlet box blue">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-reorder"></i>{{ ucfirst($common_name) }} Form
										</div>
										<div class="tools">
											<a href="javascript:;" class="collapse"></a>
											<!-- <a href="#portlet-config" data-toggle="modal" class="config"></a> -->
											<a href="javascript:;" class="reload"></a>
											<a href="javascript:;" class="remove"></a>
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										{{ Form::open(array('url' => $common_name, 'class' => 'form-horizontal')) }}
										<!-- <form action="#" class="form-horizontal"> -->
											<div class="form-body">
												<h3 class="form-section">{{ ucfirst($common_name) }} Info</h3>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">First Name</label>
															<div class="col-md-9">
																{{ Form::text('firstname','',array('class' => 'form-control','required'=>'required')) }}
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Last Name</label>
															<div class="col-md-9">
																{{ Form::text('lastname','',array('class' => 'form-control')) }}
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Gender</label>
															<div class="col-md-9">
																<div class="make-switch gender" data-on="info" data-off="success" data-on-label="&nbsp;Male&nbsp;" data-off-label="&nbsp;Female&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;">
																	<input type="checkbox" checked class="toggle"/>
																	<input type="hidden" name="gender" value="male"/>
																</div>	
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">DOB</label>
															<div class="col-md-9">
																<div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" id='purchased_on'>
																	{{ Form::text('dob', date('d-m-Y'), array('class' => 'form-control','readonly'=>'readonly')) }}
																	<span class="input-group-btn">
																		<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
																	</span>
																</div>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Email</label>
															<div class="col-md-9">
																{{ Form::text('email','',array('class' => 'form-control','required'=>'required')) }}
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Mobile No</label>
															<div class="col-md-9">
																{{ Form::text('mobile','',array('class' => 'form-control')) }}
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Address 1</label>
															<div class="col-md-9">
																{{ Form::text('address1','',array('class' => 'form-control')) }}
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Address 2</label>
															<div class="col-md-9">
																{{ Form::text('address2','',array('class' => 'form-control')) }}
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">City</label>
															<div class="col-md-9">
																{{ Form::text('city','',array('class' => 'form-control')) }}
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Pin Code</label>
															<div class="col-md-9">
																{{ Form::text('pincode','',array('class' => 'form-control')) }}
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">State</label>
															<div class="col-md-9">
																{{ Form::text('state','',array('class' => 'form-control')) }}
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">PAN</label>
															<div class="col-md-9">
																{{ Form::text('pan','',array('class' => 'form-control')) }}
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Father's Name</label>
															<div class="col-md-9">
																{{ Form::text('fathersname','',array('class' => 'form-control')) }}
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Aadhaar</label>
															<div class="col-md-9">
																{{ Form::text('aadhaar','',array('class' => 'form-control')) }}
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Hire Date</label>
															<div class="col-md-9">
																<div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" id='purchased_on'>
																	{{ Form::text('hiredate', date('d-m-Y'), array('class' => 'form-control','readonly'=>'readonly')) }}
																	<span class="input-group-btn">
																		<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
																	</span>
																</div>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Position</label>
															<div class="col-md-9">
																{{ Form::text('position','',array('class' => 'form-control')) }}
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Report to</label>
															<div class="col-md-9">
																<select name="report_to" class="form-control input-medium select2me" data-placeholder="Select...">
																	<?php foreach ($userslist as $key => $value) {?>
																		<option value="{{ $value->id }}">{{ $value->firstname }}</option>
																	<?php }?>
																</select>
																
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Type</label>
															<div class="col-md-9">
																<select name="type" class="form-control input-medium select2me" data-placeholder="Select...">
																	<?php foreach ($usergrouplist as $key => $value) {?>
																		<option value="{{ $value->id }}">{{ $value->name }}</option>
																	<?php }?>
																</select>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Password</label>
															<div class="col-md-9">
																{{ Form::text('password','',array('class' => 'form-control','required'=>'required')) }}
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
											</div>
											<div class="form-actions fluid">
												<div class="row">
													<div class="col-md-6">
														<div class="col-md-offset-10 col-md-9">
															<button type="submit" class="btn blue">Submit</button>
															<button type="button" class="btn default">Cancel</button>
														</div>
													</div>
													<!-- <div class="col-md-6">
													</div> -->
												</div>
											</div>
										<!-- </form> -->
										{{ Form::close() }}
										<!-- END FORM-->
									</div>
								</div>
					</div>
				</div>
			</div>
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->







@stop

@section('pageplugins')
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	{{ HTML::script('assets/plugins/fuelux/js/spinner.min.js') }}
	{{ HTML::script('assets/plugins/ckeditor/ckeditor.js') }}
	{{ HTML::script('assets/plugins/bootstrap-fileupload/bootstrap-fileupload.js') }}	
	{{ HTML::script('assets/plugins/select2/select2.min.js') }}
	{{ HTML::script('assets/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js') }}
	{{ HTML::script('assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js') }}
	{{ HTML::script('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}
	{{ HTML::script('assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js') }}
	{{ HTML::script('assets/plugins/clockface/js/clockface.js') }}
	{{ HTML::script('assets/plugins/bootstrap-daterangepicker/moment.min.js') }}
	{{ HTML::script('assets/plugins/bootstrap-daterangepicker/daterangepicker.js') }}
	{{ HTML::script('assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js') }}
	{{ HTML::script('assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.js') }}
	{{ HTML::script('assets/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js') }}
	{{ HTML::script('assets/plugins/jquery.input-ip-address-control-1.0.min.js') }}
	{{ HTML::script('assets/plugins/jquery-multi-select/js/jquery.multi-select.js') }}
	{{ HTML::script('assets/plugins/jquery-multi-select/js/jquery.quicksearch.js') }}
	{{ HTML::script('assets/plugins/jquery.pwstrength.bootstrap/src/pwstrength.js') }}
	{{ HTML::script('assets/plugins/bootstrap-switch/static/js/bootstrap-switch.min.js') }}
	{{ HTML::script('assets/plugins/jquery-tags-input/jquery.tagsinput.min.js') }}
	{{ HTML::script('assets/plugins/bootstrap-markdown/js/bootstrap-markdown.js') }}
	{{ HTML::script('assets/plugins/bootstrap-markdown/lib/markdown.js') }}
	{{ HTML::script('assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}
	{{ HTML::script('assets/plugins/bootstrap-touchspin/bootstrap.touchspin.js') }}
	<!-- END PAGE LEVEL PLUGINS -->
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	{{ HTML::script('assets/scripts/app.js') }}
	{{ HTML::script('assets/scripts/form-samples.js') }}
	{{ HTML::script('assets/scripts/form-components.js') }}
	
	<script>
	jQuery(document).ready(function() {       
	   App.init();
	   FormSamples.init();
	   FormComponents.init();


	   $('.gender').on('switch-change', function (e, data) {
      		value = data.value;
      		if(value){
      		  $("input[name='gender']").val('male');
      		}else{
      		  $("input[name='gender']").val('female');
      		}
		});


	});
	</script>
@stop