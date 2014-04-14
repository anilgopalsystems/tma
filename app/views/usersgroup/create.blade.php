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
										{{ Form::open(array('url' => $common_name, 'class'=>'form-horizontal', 'id'=>'assetgroupform')) }}
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

												<h3 class="form-section">UserGroup Privileges</h3>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Assets</label>
															<div class="col-md-9">
																<div class="make-switch assets" data-on-label="&nbsp;Enabled&nbsp;" data-off-label="&nbsp;Disabled&nbsp;">
																	<input type="checkbox" checked class="toggle"/>
																	<input type="hidden" name="assets"/>
																</div>
																<span class="help-block assetscheckboxes">
																	<div class="checkbox-list">
																		<input type="checkbox" id="add"> Add 
																		|
																		<input type="checkbox" id="edit"> Edit 
																		|
																		<input type="checkbox" id="delete"> Delete 
																	</div>
																</span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Asset Groups</label>
															<div class="col-md-9">
																<div class="make-switch assetgroups" data-on-label="&nbsp;Enabled&nbsp;" data-off-label="&nbsp;Disabled&nbsp;">
																	<input type="checkbox" checked class="toggle"/>
																	<input type="hidden" name="assetgroups"/>
																</div>
																<span class="help-block assetgroupscheckboxes">
																	<div class="checkbox-list">
																		<input type="checkbox" id="add"> Add 
																		|
																		<input type="checkbox" id="edit"> Edit 
																		|
																		<input type="checkbox" id="delete"> Delete 
																	</div>
																</span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Users</label>
															<div class="col-md-9">
																<div class="make-switch users" data-on-label="&nbsp;Enabled&nbsp;" data-off-label="&nbsp;Disabled&nbsp;">
																	<input type="checkbox" checked class="toggle"/>
																	<input type="hidden" name="users"/>
																</div>
																<span class="help-block userscheckboxes">
																	<div class="checkbox-list">
																		<input type="checkbox" id="add"> Add 
																		|
																		<input type="checkbox" id="edit"> Edit 
																		|
																		<input type="checkbox" id="delete"> Delete 
																	</div>
																</span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">User Groups</label>
															<div class="col-md-9">
																<div class="make-switch usersgroup" data-on-label="&nbsp;Enabled&nbsp;" data-off-label="&nbsp;Disabled&nbsp;">
																	<input type="checkbox" checked class="toggle"/>
																	<input type="hidden" name="usersgroup"/>
																</div>
																<span class="help-block usersgroupcheckboxes">
																	<div class="checkbox-list">
																		<input type="checkbox" id="add"> Add 
																		|
																		<input type="checkbox" id="edit"> Edit 
																		|
																		<input type="checkbox" id="delete"> Delete 
																	</div>
																</span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Locations</label>
															<div class="col-md-9">
																<div class="make-switch locations" data-on-label="&nbsp;Enabled&nbsp;" data-off-label="&nbsp;Disabled&nbsp;">
																	<input type="checkbox" checked class="toggle"/>
																	<input type="hidden" name="locations"/>
																</div>
																<span class="help-block locationscheckboxes">
																	<div class="checkbox-list">
																		<input type="checkbox" id="add"> Add 
																		|
																		<input type="checkbox" id="edit"> Edit 
																		|
																		<input type="checkbox" id="delete"> Delete 
																	</div>
																</span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Stores</label>
															<div class="col-md-9">
																<div class="make-switch stores" data-on-label="&nbsp;Enabled&nbsp;" data-off-label="&nbsp;Disabled&nbsp;">
																	<input type="checkbox" checked class="toggle"/>
																	<input type="hidden" name="stores"/>
																</div>
																<span class="help-block storescheckboxes">
																	<div class="checkbox-list">
																		<input type="checkbox" id="add"> Add 
																		|
																		<input type="checkbox" id="edit"> Edit 
																		|
																		<input type="checkbox" id="delete"> Delete 
																	</div>
																</span>
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

	   // assets menu
	   $('.assets').on('switch-change', function (e, data) {
      		value = data.value;
      		if(value){
      		  $(".assetscheckboxes").slideDown("slow");
      		}else{
      			$(".assetscheckboxes").slideUp("slow");      			
	   			$(".assetscheckboxes input#add").prop('checked',false);
	   			$(".assetscheckboxes input#edit").prop('checked',false);
	   			$(".assetscheckboxes input#delete").prop('checked',false);
	   			$.uniform.update();
      		}
		});

	   // asset groups menu
	   $('.assetgroups').on('switch-change', function (e, data) {
      		value = data.value;
      		if(value){
      		  $(".assetgroupscheckboxes").slideDown("slow");
      		}else{
      			$(".assetgroupscheckboxes").slideUp("slow");      			
	   			$(".assetgroupscheckboxes input#add").prop('checked',false);
	   			$(".assetgroupscheckboxes input#edit").prop('checked',false);
	   			$(".assetgroupscheckboxes input#delete").prop('checked',false);
	   			$.uniform.update();
      		}
		});


	   // users menu
	   $('.users').on('switch-change', function (e, data) {
      		value = data.value;
      		if(value){
      		  $(".userscheckboxes").slideDown("slow");
      		}else{
      			$(".userscheckboxes").slideUp("slow");      			
	   			$(".userscheckboxes input#add").prop('checked',false);
	   			$(".userscheckboxes input#edit").prop('checked',false);
	   			$(".userscheckboxes input#delete").prop('checked',false);
	   			$.uniform.update();
      		}
		});


	   // usersgroup menu
	   $('.usersgroup').on('switch-change', function (e, data) {
      		value = data.value;
      		if(value){
      		  $(".usersgroupcheckboxes").slideDown("slow");
      		}else{
      			$(".usersgroupcheckboxes").slideUp("slow");      			
	   			$(".usersgroupcheckboxes input#add").prop('checked',false);
	   			$(".usersgroupcheckboxes input#edit").prop('checked',false);
	   			$(".usersgroupcheckboxes input#delete").prop('checked',false);
	   			$.uniform.update();
      		}
		});


	   // locations menu
	   $('.locations').on('switch-change', function (e, data) {
      		value = data.value;
      		if(value){
      		  $(".locationscheckboxes").slideDown("slow");
      		}else{
      			$(".locationscheckboxes").slideUp("slow");      			
	   			$(".locationscheckboxes input#add").prop('checked',false);
	   			$(".locationscheckboxes input#edit").prop('checked',false);
	   			$(".locationscheckboxes input#delete").prop('checked',false);
	   			$.uniform.update();
      		}
		});


	   // stores menu
	   $('.stores').on('switch-change', function (e, data) {
      		value = data.value;
      		if(value){
      		  $(".storescheckboxes").slideDown("slow");
      		}else{
      			$(".storescheckboxes").slideUp("slow");      			
	   			$(".storescheckboxes input#add").prop('checked',false);
	   			$(".storescheckboxes input#edit").prop('checked',false);
	   			$(".storescheckboxes input#delete").prop('checked',false);
	   			$.uniform.update();
      		}
		});


		$( "#assetgroupform" ).submit(function( event ) {
		  $("input[name='assets']").val('{"all":"'+$('.assets').bootstrapSwitch('status')+'","add":"'+$(".assetscheckboxes input#add").prop('checked')+'","edit":"'+$(".assetscheckboxes input#edit").prop("checked")+'","delete":"'+$(".assetscheckboxes input#delete").prop('checked')+'"}');
		  $("input[name='assetgroups']").val('{"all":"'+$('.assetgroups').bootstrapSwitch('status')+'","add":"'+$(".assetgroupscheckboxes input#add").prop('checked')+'","edit":"'+$(".assetgroupscheckboxes input#edit").prop("checked")+'","delete":"'+$(".assetgroupscheckboxes input#delete").prop('checked')+'"}');
		  $("input[name='users']").val('{"all":"'+$('.users').bootstrapSwitch('status')+'","add":"'+$(".userscheckboxes input#add").prop('checked')+'","edit":"'+$(".userscheckboxes input#edit").prop("checked")+'","delete":"'+$(".userscheckboxes input#delete").prop('checked')+'"}');
		  $("input[name='usersgroup']").val('{"all":"'+$('.usersgroup').bootstrapSwitch('status')+'","add":"'+$(".usersgroupcheckboxes input#add").prop('checked')+'","edit":"'+$(".usersgroupcheckboxes input#edit").prop("checked")+'","delete":"'+$(".usersgroupcheckboxes input#delete").prop('checked')+'"}');
		  $("input[name='locations']").val('{"all":"'+$('.locations').bootstrapSwitch('status')+'","add":"'+$(".locationscheckboxes input#add").prop('checked')+'","edit":"'+$(".locationscheckboxes input#edit").prop("checked")+'","delete":"'+$(".locationscheckboxes input#delete").prop('checked')+'"}');
		  $("input[name='stores']").val('{"all":"'+$('.stores').bootstrapSwitch('status')+'","add":"'+$(".storescheckboxes input#add").prop('checked')+'","edit":"'+$(".storescheckboxes input#edit").prop("checked")+'","delete":"'+$(".storescheckboxes input#delete").prop('checked')+'"}');
		});

	   $.uniform.update();


	});
	</script>
@stop