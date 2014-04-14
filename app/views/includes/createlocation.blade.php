			<!-- BEGIN location FORM-->
			<div class="modal fade" id="createlocation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 class="modal-title">Create location</h4>
						</div>
						<div class="modal-body">
							 
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
								<div class="portlet box blue">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-reorder"></i>Location Form
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
										{{ Form::open() }}
										<!-- <form action="#" class="form-horizontal"> -->
											<div class="form-body">
												<h3 class="form-section">Location Info</h3>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Name</label>
															<div class="col-md-9">
																{{ Form::text('location_name','',array('class' => 'form-control','required'=>'required')) }}
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Description</label>
															<div class="col-md-9">
																{{ Form::text('location_description','',array('class' => 'form-control','required'=>'required')) }}
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<h3 class="form-section">Store Info</h3><!-- <small>For Every location one store is required</small> -->
												<div class="row">												
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Name</label>
															<div class="col-md-9">
																{{ Form::text('store_name','',array('class' => 'form-control','required'=>'required')) }}
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Description</label>
															<div class="col-md-9">
																{{ Form::text('store_description','',array('class' => 'form-control','required'=>'required')) }}
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
															<button type="button" onclick="return createlocation()" class="btn blue">Submit</button>
															<!-- <button type="button" class="btn default">Cancel</button> -->
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
						</div><!-- 
						<div class="modal-footer">
							<button type="button" class="btn blue">Save changes</button>
							<button type="button" class="btn default" data-dismiss="modal">Close</button>
						</div> -->
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->
			<!-- END ASSET GROUP FORM-->
