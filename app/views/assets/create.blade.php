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
	<div class="menuvalue" style="display:none">assets</div>
	<div class="page-content-wrapper">
		<div class="page-content">
			@include('includes.createassetgroup')
			@include('includes.createlocation')
			@include('includes.createstore')
			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Form Layouts <small>form layouts</small>
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
							<a href="{{ URL::to('myassets') }}">Assets</a>							
						</li>
					</ul>
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
					{{ Form::open( array('url' => 'myassets', 'class'=>'form-horizontal')) }}
					<div class="tabbable tabbable-custom boxless">
						<ul class="nav nav-tabs">
							<!-- <li class="active">
								<a href="#tab_0" data-toggle="tab">Form Actions</a>
							</li>
							<li>
								<a href="#tab_1" data-toggle="tab">2 Columns</a>
							</li> -->
							<li class="active">
								<a href="#tab_2" data-toggle="tab">Asset</a>
							</li>
							<li>
								<a href="#tab_3" data-toggle="tab">Sub Components</a>
							</li>
							<!-- <li>
								<a href="#tab_4" data-toggle="tab">Row Seperated</a>
							</li>
							<li>
								<a href="#tab_5" data-toggle="tab">Bordered</a>
							</li>
							<li>
								<a href="#tab_6" data-toggle="tab">Row Stripped</a>
							</li>
							<li>
								<a href="#tab_7" data-toggle="tab">Label Stripped</a>
							</li> -->
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="tab_2">
								<div class="portlet box blue">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-reorder"></i>Asset Form
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
										
										<!-- <form action="#" class="form-horizontal"> -->
											<div class="form-body">
												<h3 class="form-section">Asset Info</h3>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Asset Name</label>
															<div class="col-md-9">
																{{ Form::text('asset_name', '', array('class' => 'form-control','required'=>'required')) }}
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Asset Group</label>
															<div class="col-md-9">
																{{ Form::select('category', $assetgrouplist , '',array('class'=>'form-control input-medium select2me','data-placeholder'=>'Select...')) }}
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Description</label>
															<div class="col-md-9">
																{{ Form::text('description', '', array('class' => 'form-control')) }}
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Assign to</label>
															<div class="col-md-9">
																{{ Form::select('assign_to', $userslist , '',array('class'=>'form-control input-medium select2me','data-placeholder'=>'Select...')) }}
															</div>
														</div>
													</div>
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Quantity</label>
															<div class="col-md-9">
																{{ Form::text('quantity', '', array('class' => 'form-control')) }}
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Location</label>
															<div class="col-md-9">
																{{ Form::select('location', $locationlist , '',array('class'=>'form-control input-medium select2me','data-placeholder'=>'Select...')) }}
															<span class="help-block">
																<a href="#createlocation" data-toggle="modal" class="btn blue btn-xs config">Create Location</a>
															</span>
															</div>
														</div>
													</div>
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Model No.</label>
															<div class="col-md-9">
																{{ Form::text('modelnumber', '', array('class' => 'form-control')) }}
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Store</label>
															<div class="col-md-9">
																<select name="store_id" class="form-control input-medium select2me" data-placeholder="Select...">
																</select>
															<span class="help-block">
																<a href="#createstore" data-toggle="modal" class="btn blue btn-xs config">Create Store</a>
															</span>
															</div>
														</div>
													</div>
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Serial No.</label>
															<div class="col-md-9">
																{{ Form::text('asset_serial', '', array('class' => 'form-control')) }}
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Value</label>
															<div class="col-md-9">
																{{ Form::text('asset_value', '', array('class' => 'form-control')) }}
															</div>
														</div>
													</div>
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Manufacturer</label>
															<div class="col-md-9">
																{{ Form::text('manufacturer', '', array('class' => 'form-control')) }}
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Asset key</label>
															<div class="col-md-9">
																{{ Form::text('asset_key', $asset_key, array('class' => 'form-control','readonly'=>'readonly')) }}
															</div>
														</div>
													</div>
												</div>
												<!--/row-->												
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Date</label>
															<div class="col-md-3">
																<div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" id='purchased_on'>
																	<!-- <input type="text" class="form-control" readonly> -->
																	{{ Form::text('purchased_on', date('d-m-Y'), array('class' => 'form-control','readonly'=>'readonly')) }}
																	<span class="input-group-btn">
																		<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
																	</span>
																</div>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
											<!--Extra feilds -->
											<div class="extrafeilds" style="display:none">
												<h3 class="form-section">Extra Feilds</h3>
												<div class="row addfeilds">
												</div>
											</div>
											<!-- Extra feilds -->
											
											</div>
											<!--warranty accordian -->
							<div class="panel-group accordion" id="accordion1">
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title">
										<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_1">
										Warranty Details</a>
										</h4>
									</div>
									<div id="collapse_1" class="panel-collapse in">
										<div class="panel-body">											
										<!-- BEGIN FORM-->
											<div class="form-body">
												<h3 class="form-section">Warranty Info
												<div class="make-switch  warrantyonoff" data-on-label="<i class='fa fa-check icon-white'>
													</i>" data-off-label="<i class='fa fa-times'></i>"> <input type="checkbox" checked class="toggle"/>
												</div></h3>
											<div class="warrantybox">
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Service Provider</label>
															<div class="col-md-9">
																<input type="text" name="warranty_service_provider" value="" class="form-control">
																
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Description</label>
															<div class="col-md-9">
																<input type="text" name="warranty_description" value="" class="form-control">
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Start Date</label>
															<div class="col-md-9">																
																<div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" id='warranty_start_date'>
																	<!-- <input type="text" class="form-control" readonly> -->
																	{{ Form::text('warranty_start_date', date('d-m-Y'), array('class' => 'form-control','readonly'=>'readonly')) }}
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
															<label class="control-label col-md-3">End Date</label>
															<div class="col-md-9">																																
																<div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" id='warranty_end_date'>
																	<!-- <input type="text" class="form-control" readonly> -->
																	{{ Form::text('warranty_end_date', date('d-m-Y'), array('class' => 'form-control','readonly'=>'readonly')) }}
																	<span class="input-group-btn">
																		<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
																	</span>
																</div>
															</div>
														</div>
													</div>
												<!--/row-->	
												</div>
												</div>	
											</div>
										</div>
									</div>
								</div>
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title">
										<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_2">
										Insurance Details</a>
										</h4>
									</div>
									<div id="collapse_2" class="panel-collapse collapse">
										<div class="panel-body" style="height:200px; overflow-y:auto;">								
										<!-- BEGIN FORM-->
											<div class="form-body">
												<h3 class="form-section">Insurance Info
												<div class="make-switch  insuranceoff" data-on-label="<i class='fa fa-check icon-white'>
													</i>" data-off-label="<i class='fa fa-times'></i>"> <input type="checkbox" checked class="toggle"/>
												</div></h3>
												<div class="insurancebox">
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Service Provider</label>
															<div class="col-md-9">
																<input type="text" name="insurance_service_provider" value="" class="form-control">
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Description</label>
															<div class="col-md-9">
																<input type="text" name="insurance_description" value="" class="form-control">
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Start Date</label>
															<div class="col-md-9">																
																<div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" id='insurance_start_date'>
																	<!-- <input type="text" class="form-control" readonly> -->
																	{{ Form::text('insurance_start_date', date('d-m-Y'), array('class' => 'form-control','readonly'=>'readonly')) }}
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
															<label class="control-label col-md-3">End Date</label>
															<div class="col-md-9">																																
																<div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" id='insurance_end_date'>
																	<!-- <input type="text" class="form-control" readonly> -->
																	{{ Form::text('insurance_end_date', date('d-m-Y'), array('class' => 'form-control','readonly'=>'readonly')) }}
																	<span class="input-group-btn">
																		<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
																	</span>
																</div>
															</div>
														</div>
													</div>
												<!--/row-->	
												</div>	
											</div>
											</div>
										</div>
									</div>
								</div>
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title">
										<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_3">
										SLA Details</a>
										</h4>
									</div>
									<div id="collapse_3" class="panel-collapse collapse">
										<div class="panel-body">
																						
										<!-- BEGIN FORM-->
											<div class="form-body">
												<h3 class="form-section">SLA Info
												<div class="make-switch  slaonoff" data-on-label="<i class='fa fa-check icon-white'>
													</i>" data-off-label="<i class='fa fa-times'></i>"> <input type="checkbox" checked class="toggle"/>
												</div></h3>
												<div class="slabox">
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Service Provider</label>
															<div class="col-md-9">
																<input type="text" name="sla_service_provider" value="" class="form-control">
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Description</label>
															<div class="col-md-9">
																<input type="text" name="sla_description" value="" class="form-control">
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Start Date</label>
															<div class="col-md-9">																
																<div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" id='sla_start_date'>
																	<!-- <input type="text" class="form-control" readonly> -->
																	{{ Form::text('sla_start_date', date('d-m-Y'), array('class' => 'form-control','readonly'=>'readonly')) }}
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
															<label class="control-label col-md-3">End Date</label>
															<div class="col-md-9">																																
																<div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" id='sla_end_date'>
																	<!-- <input type="text" class="form-control" readonly> -->
																	{{ Form::text('sla_end_date', date('d-m-Y'), array('class' => 'form-control','readonly'=>'readonly')) }}
																	<span class="input-group-btn">
																		<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
																	</span>
																</div>
															</div>
														</div>
													</div>
												<!--/row-->	
												</div>	
											</div>
										</div>
										</div>
									</div>
								</div>								
							</div>

											<div class="form-actions fluid">
												<div class="row">
													<div class="col-md-6">
														<div class="col-md-offset-10 col-md-9">
															<button type="submit" class="btn blue">Submit</button>
															<!-- <button type="button" class="btn default">Cancel</button> -->
														</div>
													</div>
													<!-- <div class="col-md-6">
													</div> -->
												</div>
											</div>
										<!-- </form> -->
										<input type="hidden" name="iswarranty">
										<input type="hidden" name="isinsurance">
										<input type="hidden" name="issla">
										<!-- END FORM-->
									</div>
								</div>
							</div>
							<div class="tab-pane " id="tab_3">
								
					<!-- BEGIN BORDERED TABLE PORTLET-->
					<div class="portlet box yellow">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-coffee"></i>Bordered Table
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse"></a>
								<a href="#portlet-config" data-toggle="modal" class="config"></a>
								<a href="javascript:;" class="reload"></a>
								<a href="javascript:;" class="remove"></a>
							</div>
						</div>
						<div class="portlet-body">
							<div class="table-responsive">
								<table class="table table-bordered table-hover">
								<thead>
								<tr>
									<th>
										Asset Name
									</th>
									<th>
										Description
									</th>
									<th>
										Asset Serial
									</th>
									<th>
										Manufacturer
									</th>
									<th>
										Asset key
									</th>
									<th>
										Quantity
									</th>
									<th>
										<i class="fa fa-plus-circle" style="font-size: 23px;color: #4D90FE;cursor:pointer" onclick="addfeild()"></i>
									</th>
								</tr>
								</thead>
								<tbody class="addfeildhere">
								<?php if(isset($subassetdata)){ ?>							
								<tr>
									<td>
										<input type="text" name="sub_asset_name[]" value="" class="form-control">
										<input type="hidden" name="sub_asset_id[]" value="" class="form-control">
									</td>
									<td>
										<input type="text" name="sub_description[]" value="" class="form-control">
									</td>
									<td>
										<input type="text" name="sub_asset_serial[]" value="" class="form-control">
									</td>
									<td>
										<input type="text" name="sub_manufacturer[]" value="" class="form-control">
									</td>
									<td>
										<input type="text" name="sub_asset_key[]" value="" class="form-control sub_asset_key">
									</td>
									<td>
										<input type="text" name="sub_quantity[]" value="" class="form-control">
									</td>
									<td>
										<i class="fa fa-minus-circle" style="font-size: 23px;color: #4D90FE;cursor:pointer;margin-top:8px" onclick="deletefeild(this)"></i>
									</td>
								</tr>
								<?php } ?>
								</tbody>
								</table>
							</div>
						</div>
					</div>
					<!-- END BORDERED TABLE PORTLET-->
							</div>
						</div>
						</div>
					</div>
					{{ Form::close() }}
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

	var sub_asset_key = '';
	var sub_key = '';
	var sub_key_num=0;

	jQuery(document).ready(function() {       
	   App.init();
	   FormSamples.init();
	   FormComponents.init();

	   	$('.warrantyonoff').bootstrapSwitch('setState', false);
		$('.insuranceoff').bootstrapSwitch('setState', false);
		$('.slaonoff').bootstrapSwitch('setState', false);

	   	$('.warrantyonoff').on('switch-change', function (e, data) {
      		value = data.value;
      		if(value){
      		  $(".warrantybox").css("opacity","1");
      		  $("input[name='iswarranty']").val('1');
      		}else{
      		  $(".warrantybox").css("opacity","0.4");
      		  $("input[name='iswarranty']").val('0');
      		}
		});

		$('.insuranceoff').on('switch-change', function (e, data) {
      		value = data.value;
      		if(value){
      		  $(".insurancebox").css("opacity","1");
      		  $("input[name='isinsurance']").val('1');
      		}else{
      		  $(".insurancebox").css("opacity","0.4");
      		  $("input[name='isinsurance']").val('0');
      		}
		});

		$('.slaonoff').on('switch-change', function (e, data) {
      		value = data.value;
      		if(value){
      		  $(".slabox").css("opacity","1");
      		  $("input[name='issla']").val('1');
      		}else{
      		  $(".slabox").css("opacity","0.4");
      		  $("input[name='issla']").val('0');
      		}
		});

		if($('.warrantyonoff').bootstrapSwitch('status')){
      		  $(".warrantybox").css("opacity","1");
      		  $("input[name='iswarranty']").val('1');
      		}else{
      		  $(".warrantybox").css("opacity","0.4");
      		  $("input[name='iswarranty']").val('0');
      		}

      	if($('.insuranceoff').bootstrapSwitch('status')){
      		  $(".insurancebox").css("opacity","1");
      		  $("input[name='isinsurance']").val('1');
      		}else{
      		  $(".insurancebox").css("opacity","0.4");
      		  $("input[name='isinsurance']").val('0');
      	}

      	if($('.insuranceoff').bootstrapSwitch('status')){
      		  $(".slabox").css("opacity","1");
      		  $("input[name='issla']").val('1');
      		}else{
      		  $(".slabox").css("opacity","0.4");
      		  $("input[name='issla']").val('0');
      	}


      	$("select[name='category']").on("change", function(e){
      	$(".extrafeilds").slideUp( "slow" );
      		 $.ajax({
			  type: "POST",
			  url: "{{ URL::action('AssetsController@udf') }}",
			  data: {assetgroupid:e.val}
			})
			  .done(function( msg ) {			  	
			  	var temp = JSON.parse(msg);
			  	if(temp['udf1']!=null){
			  		var tempdom = '';     						
			  		for (var i = 1; i <= 20; i++) {
			  			if(temp['udf'+i]!=null&&temp['udf'+i]!=''){
			  				tempdom = tempdom+'<div class="col-md-6"><div class="form-group"><label class="control-label col-md-3">'+temp['udf'+i]+'</label><div class="col-md-9"><input value="" type="text" name="udfvalue[]" class="form-control"></div></div></div>';
												}
			  		}
			  		$(".addfeilds").html(tempdom);
			  		$(".extrafeilds").slideDown( "slow" );
			  	}
			  });
      	});

      	//Asset group feilds set
      	$.ajax({
			  type: "POST",
			  url: "{{ URL::action('AssetsController@udf') }}",
			  data: {assetgroupid:$("select[name='category']").select2("val")}
			})
			  .done(function( msg ) {	
			  	var temp = JSON.parse(msg);
			  	if(temp['udf1']!=null){
			  		var tempdom = '';
			  		for (var i = 1; i <= 20; i++) {
			  			if(temp['udf'+i]!=null&&temp['udf'+i]!=''){
			  			tempdom = tempdom+'<div class="col-md-6"><div class="form-group"><label class="control-label col-md-3">'+temp['udf'+i]+'</label><div class="col-md-9"><input value="" type="text" name="udfvalue[]" class="form-control"></div></div></div>';
													}
			  		}
			  		$(".addfeilds").html(tempdom);
			  		$(".extrafeilds").slideDown( "slow" );
			  	}
			  });

			$("tbody.addfeildhere .sub_asset_key").val($("input[name='asset_key']").val()+"-1");


			$.ajax({
			  type: "POST",
			  url: "{{ URL::action('AssetsController@getstorelist') }}",
			  data: {location_id:$("select[name='location']").select2("val")}
			})
			  .done(function( msg ) {	
			  	var temp = JSON.parse(msg);
			  	//console.log(temp[1]['name']);
			  	for (var i = 0; i < temp.length; i++) {
			  		$("select[name='store_id']").append("<option value='"+temp[i]['id']+"'>"+temp[i]['name']+"</option>");
			  	}
			  	$("select[name='store_id']").select2("val", temp[0]['id']);
			  });


			$("select[name='location']").on("change", function(e){
				$.ajax({
			  type: "POST",
			  url: "{{ URL::action('AssetsController@getstorelist') }}",
			  data: {location_id:e.val}
			})
			  .done(function( msg ) {	
			  	var temp = JSON.parse(msg);
			  	$("select[name='store_id']").html('');
			  	for (var i = 0; i < temp.length; i++) {
			  		$("select[name='store_id']").append("<option value='"+temp[i]['id']+"'>"+temp[i]['name']+"</option>");
			  	}
			  	$("select[name='store_id']").select2("val",temp[0]['id']);
			  });
			});  

			if(typeof($("input.sub_asset_key:last").val())=='undefined'){
				sub_key = $("input[name='asset_key']").val();
			}else{
				sub_asset_key =  $("input.sub_asset_key:last").val();
				sub_key = sub_asset_key.substr(0,10);
				sub_key_num = sub_asset_key.substr(11);				
			}
	});// ready function close

      	function createlocation(){
      		if($('input[name="location_name"]').val()==''){
      			alert('Enter location name');
      			return false;
      		}

      		if($('input[name="store_name"]').val()==''){
      			alert('Enter store name');
      			return false;
      		}
      		
      	  $.ajax({
			  type: "POST",
			  url: "{{ URL::action('LocationController@createlocation') }}",
			  data: { location_name:$('input[name="location_name"]').val(),location_description:$('input[name="location_description"]').val(),store_name:$('input[name="store_name"]').val(),store_description:$('input[name="store_description"]').val() }
			})
			  .done(function( msg ) {
			  	$("select[name='location']").append("<option value="+msg['location_id']+">"+$('input[name="location_name"]').val()+"</option>");
			  	$("select[name='location']").select2("val", msg['location_id']);
			  	$("select[name='store_id']").html("<option value="+msg['store_id']+">"+$('input[name="store_name"]').val()+"</option>");
			  	$("select[name='store_id']").select2("val", msg['store_id']);
			  	$('#createlocation button.close').click();
			  });
		}


		function addfeild(){
			sub_key_num++;
			$("tbody.addfeildhere").append('<tr><td><input type="text" name="new_sub_asset_name[]" value="" class="form-control new_sub_asset"><input type="hidden" name="new_sub_asset_id[]" value="" class="form-control"></td><td><input type="text" name="new_sub_description[]" value="" class="form-control"></td><td><input type="text" name="new_sub_asset_serial[]" value="" class="form-control"></td><td><input type="text" name="new_sub_manufacturer[]" value="" class="form-control"></td><td><input type="text" name="new_sub_asset_key[]" value="'+sub_key+'-'+sub_key_num+'" class="form-control"></td><td><input type="text" name="new_sub_quantity[]" value="" class="form-control"></td><td><i class="fa fa-minus-circle" style="font-size: 23px;color: #4D90FE;cursor:pointer;margin-top:8px;" onclick="deletefeild(this)"></i></td></tr>');
		}

		
		/*function onblurassetkey(obj){
			var sub_asset_key =  $("input[name='sub_asset_key']:last").val();
			var sub_key = sub_asset_key.substr(0,10);
			sub_key_num = sub_asset_key.substr(11);
			sub_key_num++;
			$(obj).parent().parent().find('.sub_asset_key').val(sub_key+sub_key_num);
		}*/

		function deletefeild(obj){
			$(obj).parent().parent().remove();
			sub_key_num--;
		}
	</script>
@stop