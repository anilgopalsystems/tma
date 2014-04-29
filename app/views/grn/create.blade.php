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

{{ HTML::style("assets/css/jquery-ui-1.10.4.custom.css") }}
<style type="text/css">
	.modal-dialog {
        //max-width: 1100px;
    }
</style>

@stop

@section('content')


	<!-- BEGIN CONTENT -->
	<div class="menuvalue" style="display:none">{{ $common_name }}</div>
	<div class="page-content-wrapper">
		<div class="page-content">
			{{ Form::open(array('url' => 'grn/store', 'class'=>'form-horizontal')) }}
			<!-- BEGIN PAGE HEADER-->


			<div class="modal fade" id="assettracking" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 class="modal-title">Assets</h4>
						</div>
						<div class="modal-body">
							 
				<div class="row">
					<div class="col-md-12">
								<div class="portlet box blue">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-reorder"></i>Asset Form
										</div>
										<div class="tools">
											<a href="javascript:;" class="collapse"></a>
											<!-- <a href="#portlet-config" data-toggle="modal" class="config"></a> -->
											<a href="javascript:;" class="reload"></a>
											<!-- <a href="javascript:;" class="remove"></a> -->
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<!-- <form action="#" class="form-horizontal"> -->
											<div class="form-body">
												<h3 class="form-section" style="display:flex">Asset Details &nbsp;&nbsp;
													<div class="spinner" style="margin-top: -3px; display:none">
														<img src={{ asset("assets/img/loading-spinner-grey.gif") }} alt=""/>
													</div></h3>
													<div class="table-responsive">
														<table class="table table-bordered table-hover">
														<thead>
														<tr>
															<th>
																S.No
															</th>
															<th>
																Asset Name
															</th>
															<th>
																Asset key
															</th>
															<th>
																Serial
															</th>
															<th>
																Print
															</th>
														</tr>
														</thead>
														<tbody class="assetfeilds">						
														<!-- <tr>
															<td>
																<div class="sno"></div>
															</td>
															<td>
																<input type="text" name="asset_name[]" value="" id="item_name" class="form-control" readonly="readonly">																
															</td>
															<td>
																<input type="text" name="asset_key[]" id="" value="" id="mfg_code" class="form-control" readonly="readonly">
															</td>
															<td>
																<input type="text" name="asset_serial[]" value="" id="manufacturer" class="form-control">
															</td>
														</tr> -->
														</tbody>
														</table>
													</div>


												<div class="form-actions fluid">
													<div class="row">
														<div class="col-md-6">
															<div class="col-md-offset-10 col-md-9">
																<button type="button" onclick="storeassetinfo(this)" class="btn blue">Submit</button>
																<!-- <button type="button" class="btn default">Cancel</button> -->
															</div>
														</div>
														<!-- <div class="col-md-6">
														</div> -->
													</div>
												</div>

											</div>
										<!-- </form> -->
										
										<!-- END FORM-->
									</div>
								</div>
					</div>
				</div>



						</div>
						<div class="modal-footer"><!-- 
							<button type="button" class="btn blue">Save changes</button>
							<button type="button" class="btn default" data-dismiss="modal">Close</button> -->
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>



			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					{{ strtoupper($common_name) }} <small>create {{ $common_name }}</small>
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
							<a href="{{ URL::to(strtoupper($common_name)) }}">{{ strtoupper($common_name) }}</a>							
						</li>
					</ul>
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			
			<div class="row">
				<div class="col-md-6">
								<div class="portlet box blue">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-reorder"></i>{{ strtoupper($common_name) }} Form
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
												<h3 class="form-section">Select Vendor</h3>
												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label col-md-3">Vendor Name</label>
															<div class="col-md-9">
																<div class="ui-widget">
  																	<input name="vendor_name" class="form-control" id="vendor_name">
																</div>
																<span class="input-group-btn vnexists" style="display:none;color: crimson;">
																		Vendor doesn't exists 
																</span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<div class="createvendor" style="display:none">


												<h3 class="form-section">Create New Vendor</h3>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<div class="col-md-12">
																{{ Form::text('new_vendor_name','',array('class' => 'form-control','placeholder'=>'Vendor Name')) }}
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<div class="col-md-12">
																{{ Form::text('address1','',array('class' => 'form-control','placeholder'=>'address1')) }}
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<div class="col-md-12">
																{{ Form::text('address2','',array('class' => 'form-control','placeholder'=>'address2')) }}
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<div class="col-md-12">
																{{ Form::text('city','',array('class' => 'form-control','placeholder'=>'city')) }}
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<div class="col-md-12">
																{{ Form::text('pincode','',array('class' => 'form-control','placeholder'=>'pincode')) }}
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<div class="col-md-12">
																{{ Form::text('state','',array('class' => 'form-control','placeholder'=>'state')) }}
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<div class="col-md-12">
																{{ Form::text('contact_person_name','',array('class' => 'form-control','placeholder'=>'Contact Person Name')) }}
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<div class="col-md-12">
																{{ Form::text('contact_person_number','',array('class' => 'form-control','placeholder'=>'Contact Person Number')) }}
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<div class="col-md-12">
																{{ Form::text('contact_person_email','',array('class' => 'form-control','placeholder'=>'Contact Person Email')) }}
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<div class="col-md-12">
																{{ Form::text('office_number','',array('class' => 'form-control','placeholder'=>'Office Number')) }}
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<div class="col-md-12">																
															Warranty provider &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																<div class="make-switch switch-small iswarrantyprovider" data-on-label="Yes" data-off-label="No"> 
																	<input type="checkbox" checked class="toggle"/>
																</div>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<div class="col-md-12">
															Insurance provider &nbsp;&nbsp;&nbsp;&nbsp;
																<div class="make-switch switch-small isinsuranceprovider" data-on-label="Yes" data-off-label="No"> 
																	<input type="checkbox" checked class="toggle"/>
																</div>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<div class="col-md-12">																
															SLA provider &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																<div class="make-switch switch-small isslaprovider" data-on-label="Yes" data-off-label="No"> 
																	<input type="checkbox" checked class="toggle"/>
																</div>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<div class="col-md-12">
															Supplier &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																<div class="make-switch switch-small issupplier" data-on-label="Yes" data-off-label="No"> 
																	<input type="checkbox" checked class="toggle"/>
																</div>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<div class="form-actions fluid">
													<div class="row">
														<div class="col-md-6">
															<div class="col-md-offset-7 col-md-9">
																<button type="button" class="btn blue" onclick="return createnewvendor()">Create New Vendor</button>
																<!-- <button type="button" class="btn default">Cancel</button> -->
															</div>
														</div>
														<!-- <div class="col-md-6">
														</div> -->
													</div>
												</div>


												</div>
												
									</div>
										<!-- </form> -->
										
										<!-- END FORM-->
									</div>
								</div>
				</div>
				<!-- column two -->
				<div class="col-md-6">
								<div class="portlet box blue">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-reorder"></i>{{ strtoupper($common_name) }} Form
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
												<h3 class="form-section">GRN Header</h3>
												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label col-md-4">Invoice Number</label>
															<div class="col-md-8">
																{{ Form::text('invoice_number','',array('class' => 'form-control')) }}
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label col-md-4">Invoice Date</label>
															<div class="col-md-8">
																<div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" id='invoice_date'>
																	<!-- <input type="text" class="form-control" readonly> -->
																	{{ Form::text('invoice_date', date('d-m-Y'), array('class' => 'form-control','readonly'=>'readonly')) }}
																	<span class="input-group-btn">
																		<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
																	</span>
																</div>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label col-md-4">Invoice Amount</label>
															<div class="col-md-8">
																{{ Form::text('invoice_amount','',array('class' => 'form-control')) }}
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
											</div>
										<!-- </form> -->
										
										<!-- END FORM-->
									</div>
								</div>
					</div>
				</div><!-- row ends -->
				
				<!-- row two -->
				<div class="row">
					<div class="col-md-12">
								<div class="portlet box blue">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-reorder"></i>{{ strtoupper($common_name) }} Form
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
												<h3 class="form-section">GRN Details</h3>
													<div class="table-responsive">
														<table class="table table-bordered table-hover">
														<thead>
														<tr>
															<th>
																Item Name
															</th>
															<th>
																MFG code
															</th>
															<th>
																Manufacturer
															</th>
															<th>
																Item Cost
															</th>
															<th>
																Quantity
															</th>
															<th width="130px">
																Trackable
															</th>
															<th>
																<i class="fa fa-plus-circle" style="font-size: 23px;color: #4D90FE;cursor:pointer" onclick="addfeild()"></i>
															</th>
														</tr>
														</thead>
														<tbody class="addfeildhere">						
														<tr>
															<td>
																<input type="text" name="item_name[]" value="" id="item_name" class="form-control">
																<input type="hidden" name="istrackable" value="false"><input type="hidden"  name="fc" value="fc0">
															</td>
															<td>
																<input type="text" name="mfg_code[]" id="" value="" id="mfg_code" class="form-control">
															</td>
															<td>
																<input type="text" name="manufacturer[]" value="" id="manufacturer" class="form-control">
															</td>
															<td>
																<input type="text" name="item_cost[]" value="" id="item_cost" class="form-control">
															</td>
															<td>
																<input type="text" name="quantity[]" value="" id="quantity" class="form-control">
															</td>
															<td>
																<div class="make-switch switch-small trackable" id="trackable" data-on-label="Yes" data-off-label="No"> 
																	<input type="checkbox" class="toggle"/>
																</div>
															</td>
															<td>
																<i class="fa fa-minus-circle" style="font-size: 23px;color: #4D90FE;cursor:pointer;margin-top:8px" ></i>
															</td>
														</tr>
														</tbody>
														</table>
													</div>


												<div class="form-actions fluid">
													<div class="row">
														<div class="col-md-6">
															<div class="col-md-offset-10 col-md-9">
																<button type="submit" class="btn blue">submit</button>
																<!-- <button type="button" class="btn default">Cancel</button> -->
															</div>
														</div>
														<!-- <div class="col-md-6">
														</div> -->
													</div>
												</div>

											</div>
										<!-- </form> -->
										
										<!-- END FORM-->
									</div>
								</div>
					</div>
				</div>

<div class="hiddeninputs">
<input type="hidden" name="vendor_id">
<a href="#assettracking" id="assettracking" data-toggle="modal"></a>
<input type="hidden" name="currentboxvalue" value="">
<input type="hidden" name="currentitemname" value="">
<input type="hidden" name="somename[]" value="">
</div>

				{{ Form::close() }}
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
	{{ HTML::script('assets/scripts/jquery.cookie.js') }}

	<script>
	jQuery(document).ready(function() {       
	   App.init();
	   FormSamples.init();
	   FormComponents.init();

	   var vendor_names = new Array();
	   vendor_names = {{ json_encode(DB::table('vendor')->where('org_id','=',Session::get('userdata')->org_id)->where('status','=','1')->lists('vendor_name') ) }};
	   $( "input[name='vendor_name']" ).autocomplete({
     		source: vendor_names
		});

	   $( "input[name='vendor_name']" ).blur(function(){
	   		vendorexistsornot();
	   });

	   
	   	$('.trackable').on('switch-change', function (e, data) {
    		if(data.value){
    			$("input[name='currentboxvalue']").val($(this).attr('id'));
    			var elem = $(this).closest('tr');
    			//$("input[name='currentitemname']").val(elem.find("#item_name").val());
    			if(elem.find("#item_name").val()==''||elem.find("#quantity").val()==''||elem.find("#item_cost").val()==''){
    				alert("Please Enter Item Name, Item cost, Quantity");
    				var curboxval = $("input[name='currentboxvalue']").val();
	   				$("#"+curboxval).bootstrapSwitch('setState', false);
    				}else{
    				$('.spinner').css('display','block');
    				$('tbody.assetfeilds').html('');    			
    				$('a#assettracking').click();
    				var trcount = elem.find('#quantity').val();
    				$.ajax({
		      				type: "POST",
		      				url: "assets/getassetkeys/"+trcount+"",
		   					}).done(function(msg) {
		   						obj = JSON.parse(msg);
    						
    						for (var i = 1; i <= trcount; i++) {
    							$('tbody.assetfeilds').append('<tr><td><div class="sno">'+i+'</div></td><td><input type="text" name="asset_name[]" value="'+elem.find('#item_name').val()+'" id="asset_name" class="form-control" readonly="readonly"></td><td><input type="text" name="asset_key[]" value="'+obj[i]+'" id="asset_key" class="form-control" readonly="readonly"></td><td><input type="text" name="asset_serial[]" value="" id="asset_serial" class="form-control"></td><td><button type="button" onclick="printbarcode(this)" class="btn blue">Print</button></td></tr>').slideDown("slow");	
    						}
    						$('.spinner').css('display','none');
    						});
    				
    			}
    		}
		});

	   	$("button[data-dismiss='modal']").click(function(){
	   		var curboxval = $("input[name='currentboxvalue']").val();
	   		$("#"+curboxval).bootstrapSwitch('setState', false);
	   	});


	   	/*$.ajax({
		      type: "POST",
		      url: "assets/getassetkey",
		   })
		    .done(function(msg) {	
		    $("#asset_name").blur(function(){	    	
		    	var maintrobj = $(this).closest('tr');
	   			maintrobj.find('#asset_key').val(msg);
	   			maintrobj.find('#addsubasset').removeAttr('disabled');
	   			maintrobj.find('#addsubasset').css('opacity','1');
	   			maintrobj.find('#barcodeprint').css('opacity','1').removeAttr('disabled');
	   		});
		});*/
	   

	});


	function vendorexistsornot(){
		var new_vendor = $( "input[name='vendor_name']" ).val();
		    $.ajax({
		      type: "POST",
		      url: "vendor/vendorexists",
		      data: { vendor_name: new_vendor}
		   })
		    .done(function(msg) {
		      if(msg==0){
		        $('.createvendor').slideDown( "slow" );
		        $( "input[name='address1']" ).focus();
		        $( "input[name='new_vendor_name']" ).val(new_vendor);
		        $('.vnexists').slideDown( "slow" );
		      }else{
		        $( "input[name='invoice_number']" ).focus();
		        $.ajax({
		      			type: "POST",
		      			url: "{{ URL::action('VendorController@postVendorid') }}",
		      			data: { vendor_name: new_vendor}
		   			}).done(function(msg) {
		   				obj = JSON.parse(msg);
		   				$("input[name='vendor_id']").val(obj['id']);
		   			});
		      }
		  });
		}

	function createnewvendor(){
		$.ajax({
		      type: "POST",
		      url: "vendor/createnewvendor",
		      data: { vendor_name:$( "input[name='new_vendor_name']" ).val(),address1:$( "input[name='address1']" ).val(),address2:$( "input[name='address2']" ).val(),city:$( "input[name='city']" ).val(),pincode:$( "input[name='pincode']" ).val(),state:$( "input[name='state']" ).val(),contact_person_name:$( "input[name='contact_person_name']" ).val(),contact_person_number:$( "input[name='contact_person_number']" ).val(),contact_person_number:$( "input[name='contact_person_number']" ).val(),office_number:$( "input[name='office_number']" ).val(),iswarrantyprovider:$('.iswarrantyprovider').bootstrapSwitch('status'),isinsuranceprovider:$('.isinsuranceprovider').bootstrapSwitch('status'),isslaprovider:$('.isslaprovider').bootstrapSwitch('status'),issupplier:$('.issupplier').bootstrapSwitch('status')}
		   })
		    .done(function(msg) {
		    	$('.vnexists').slideUp( "slow" );
		    	$('.createvendor').slideUp( "slow" );
		    	$("input[name='vendor_id']").val(msg);
		    	$( "input[name='invoice_number']" ).focus();
		  });
	}

	var feildcount = 0;	
	function addfeild(){
		feildcount++;
		$("tbody.addfeildhere").append('<tr><td><input type="text" name="item_name[]" id="item_name" value="" class="form-control"><input type="hidden" name="istrackable" value="false"><input type="hidden" name="fc" value="fc'+feildcount+'"></td><td><input type="text" name="mfg_code[]" value="" id="mfg_code" class="form-control"></td><td><input type="text" name="manufacturer[]" id="manufacturer" value="" class="form-control"></td><td><input type="text" name="item_cost[]" value="" id="item_cost" class="form-control"></td><td><input type="text" name="quantity[]" value="" id="quantity" class="form-control"></td><td><div class="make-switch switch-small" id="trackable'+feildcount+'" data-on-label="Yes" data-off-label="No"><input type="checkbox" class="toggle"/></div></td><td><i class="fa fa-minus-circle" style="font-size: 23px;color: #4D90FE;cursor:pointer;margin-top:8px" onclick="deletefeild(this)"></i></td></tr>');
		$("#trackable"+feildcount).bootstrapSwitch();

		$('#trackable'+feildcount).on('switch-change', function (e, data) {
    		if(data.value){    			
    			$("input[name='currentboxvalue']").val($(this).attr('id'));
    			var elem = $(this).closest('tr');
    			if(elem.find("#item_name").val()==''||elem.find("#quantity").val()==''||elem.find("#item_cost").val()==''){
    				alert("Please Enter Item Name, Item cost, Quantity");
    				var curboxval = $("input[name='currentboxvalue']").val();
	   				$("#"+curboxval).bootstrapSwitch('setState', false);
    				}else{  
    				$('.spinner').css('display','block');
    				$('tbody.assetfeilds').html('');    			
    				$('a#assettracking').click();
    				var trcount = elem.find('#quantity').val();
    				$.ajax({
		      				type: "POST",
		      				url: "assets/getassetkeys/"+trcount+"",
		   					}).done(function(msg) {
		   						obj = JSON.parse(msg);
    						
    						for (var i = 1; i <= trcount; i++) {
    							$('tbody.assetfeilds').append('<tr><td><div class="sno">'+i+'</div></td><td><input type="text" name="asset_name[]" value="'+elem.find('#item_name').val()+'" id="asset_name" class="form-control" readonly="readonly"></td><td><input type="text" name="asset_key[]" id="" value="'+obj[i]+'" id="asset_key" class="form-control" readonly="readonly"></td><td><input type="text" name="asset_serial[]" value="" id="asset_serial" class="form-control"></td></tr>').slideDown("slow");	
    						}
    						$('.spinner').css('display','none');
    						});
    			}
    		}
		});

	   	/*$.ajax({
		      type: "POST",
		      url: "assets/getassetkey",
		   })
		    .done(function(msg) {

		    $('#asset_name'+feildcount+'').blur(function(){
		    	var maintrobj = $(this).closest('tr');
	   			maintrobj.find('#asset_key').val(msg);
	   			maintrobj.find('#addsubasset').removeAttr('disabled');
	   			maintrobj.find('#addsubasset').css('opacity','1');
	   			maintrobj.find('#barcodeprint').css('opacity','1').removeAttr('disabled');
	   		});
	   	});	*/   	
	}

	/*var subfeildcount = 1;	
	function addsubfeild(obj){
		
		var trobj = $(obj).closest('tr');

		var asset_key = trobj.find('#asset_key').val();
		if(typeof($.cookie(asset_key))=='undefined'){
  		  subfeildcount = 1;
  		}else{
   		  subfeildcount = $.cookie(asset_key);
  		}

  		var subassetkey = asset_key+"-"+subfeildcount;
		trobj.after('<tr><td colspan="12" style="background-color: #3D3D3D;border:0px"><div class="table-responsive col-md-12"><table style="margin-bottom:0px" class="table table-bordered table-hover"><tbody><tr><td><input type="text" name="sub_asset_name[]" placeholder="Sub Asset Name" id="sub_asset_name'+subfeildcount+'" value="" class="form-control"></td><td><input type="text" placeholder="Sub Asset Serial" name="sub_asset_serial[]" value="" class="form-control"></td><td><input type="text" placeholder="Sub Asset key" name="sub_asset_key[]" id="asset_key" value="'+subassetkey+'" class="form-control" readonly="readonly"></td><td><input type="text" placeholder="Quantity" name="sub_quantity[]" value="" class="form-control"></td><td><button type="button" class="btn btn-sm blue" onclick="">Print</button></td><td><i class="fa fa-minus-circle" style="font-size: 23px;color: #4D90FE;cursor:pointer;margin-top:8px" onclick="deletesubfeild(this)"></i></td></tr></tbody></table></div></td></tr>');
		subfeildcount++;
		$.cookie(asset_key, subfeildcount, { expires: 0.5 });
	}*/


	function deletefeild(obj){
    	var assetkey = $(obj).closest('tr').find('#asset_key').val();
    	//$('[id^='+assetkey+']').remove();
    	$(obj).closest('tr').remove();
	}

	/*function deletesubfeild(obj){		
    	$(obj).closest('tr').parent().parent().parent().parent().remove();  
    	var assetkey = $(obj).closest('tr').find('#asset_key').val();
    	$.cookie(assetkey)--;  	
	}*/

	function storeassetinfo(obj){
		var curitemname = $("input[name='currentboxvalue']").val();
		$("#"+curboxval).bootstrapSwitch('setState', true);
		console.log($("#"+curboxval).closest("tr").find("input[name='']"));





		/*var assetdata = {};
		assetdata.curitemname = [];
		var i = 0;
		$("input[name^='asset_serial']").each(function() {
			assetdata.curitemname[0] = 'some';
			i++;
		});
		console.log(assetdata);*/
	}

	/*function getBaseURL() {
	   return location.protocol + "//" + location.hostname + (location.port && ":" + location.port) + "/";
	}*/

	function printbarcode(obj){
	    var tmpdata = $(obj).closest('tr');
	    var asset_key = tmpdata.find('#asset_key').val();
	    var asset_name = tmpdata.find('#asset_name').val();
	    //var baseurl = getBaseURL();
	    $.ajax({
	      type: "POST",
	      url: "http://localhost/l4/public/barcodeprint/index.php",
	      data: { asset_name: asset_name, asset_key: asset_key }
	    }).done(function(){
	      
	      $.ajax({
	        type: "POST",
	        url: "http://127.0.0.1:88/index.php",
	      })/*.fail(function(){
	          //alert("failed <a href='/barcodeprint/download.php'>Please download</a>");
	          $.pnotify({
	              title: 'Barcode Print',
	              text: 'Download and Install <a style="color:rgb(224, 34, 34);" href="/barcodeprint/download.php">TMAprint</a> plugin',
	              type: 'info',
	              hide: false
	          });

	        });*/

	    });
		//console.log(asset_name)
	}
	</script>
@stop