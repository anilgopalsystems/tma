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
							<a href="{{ URL::to('dashboard') }}">Home</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="{{ URL::to($common_name) }}">{{ ucfirst($common_name) }}</a>							
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
										{{ Form::open(array('url' => $common_name)) }}
										<!-- <form action="#" class="form-horizontal"> -->
											<div class="form-body">
												<h3 class="form-section">{{ ucfirst($common_name) }} Info</h3>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Name</label>
															<div class="col-md-9">
																{{ Form::text('name','',array('class' => 'form-control')) }}
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Description</label>
															<div class="col-md-9">
																{{ Form::text('description','',array('class' => 'form-control')) }}
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
	});
	</script>
@stop