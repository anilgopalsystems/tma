@extends('layouts.dashboard')

@section('pagestylesheets')
{{ HTML::style("assets/plugins/select2/select2_metro.css") }}
{{ HTML::style("assets/plugins/data-tables/DT_bootstrap.css") }}
@stop

@section('content')
	<!-- BEGIN CONTENT -->
	<div class="menuvalue" style="display:none">{{ $common_name }}</div>
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 class="modal-title">Modal title</h4>
						</div>
						<div class="modal-body">
							 Widget settings form goes here
						</div>
						<div class="modal-footer">
							<button type="button" class="btn blue">Save changes</button>
							<button type="button" class="btn default" data-dismiss="modal">Close</button>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			@include('includes.themesettings')
			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					{{ ucfirst($common_name) }} <small>Manage {{ $common_name }}</small>
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
				<div class="col-sm-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-th-large"></i>{{ ucfirst($common_name) }} Table
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse"></a>
								<a href="#portlet-config" data-toggle="modal" class="config"></a>
								<a href="javascript:;" class="reload"></a>
								<a href="javascript:;" class="remove"></a>
							</div>
						</div>
						<div class="portlet-body">
							<?php if(json_decode(Session::get('usergroupdata')->assetgroups)->add=='true'){ ?>
							<div class="table-toolbar">
								<div class="btn-group">
									<a href="{{ URL::route(''.$common_name.'.create') }}" id="sample_editable_1_new" class="btn green">
									Add New <i class="fa fa-plus"></i>
									</a>
								</div>
							</div>
							<?php } ?>
							<table class="table table-striped table-bordered table-hover" id="sample_2">
							<thead>
							<tr>
								<th style="display:none;">
									<input type="checkbox" class="group-checkable" data-set="#sample_2 .checkboxes"/>
								</th>
								<th>
									Name
								</th>
								<th>
									Description
								</th>								
								<th>
									Actions
								</th>
							</tr>
							</thead>
							<tbody>
							<?php foreach ($data as $key => $value): ?>							
							<tr class="odd gradeX">
								<td style="display:none">
									<input type="checkbox" class="checkboxes" value="1"/>
								</td>
								<td>
									{{ $value->name }}
								</td>
								<td>
									{{ $value->description }}
								</td>
								<td align="center">
									<!-- <span class="label label-sm label-success">
										Active
									</span> -->
									<?php if(json_decode(Session::get('usergroupdata')->assetgroups)->edit=='true'){ ?>
									<a href="{{ URL::route(''.$common_name.'.edit', $value->id) }}"><i class="fa fa-pencil"></i></a> | 
									<?php } ?>

									<?php if(json_decode(Session::get('usergroupdata')->assetgroups)->delete=='true'){ ?>
									<a href="{{ URL::to(''.$common_name.'/delete/'.$value->id.'' ) }}"><i class="fa fa-minus-circle"></i></a>
									<?php } ?>
								</td>
							</tr>							
							<?php endforeach ?>
							</tbody>
							</table>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
			</div>

			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->
@stop

@section('pageplugins')
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	{{ HTML::script('assets/plugins/select2/select2.min.js') }}
	{{ HTML::script('assets/plugins/data-tables/jquery.dataTables.js') }}
	{{ HTML::script('assets/plugins/data-tables/DT_bootstrap.js') }}
	<!-- END PAGE LEVEL PLUGINS -->
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	{{ HTML::script('assets/scripts/app.js') }}
	{{ HTML::script('assets/scripts/table-managed.js') }}
	
	<script>
	jQuery(document).ready(function() {       
	   App.init();
	   TableManaged.init();
	});
	</script>
@stop