<?

$action = $_GET['action'];

$phxclient_id = $_COOKIE['phxclient_id'];

$ce_staff_create = 1;
$ce_who = 1;
$ce_uid_client = 1;


?>


	<div class="modal-header"><!-- modal header -->

		<h4 class="modal-title" id="myModalLabel">Confirm Create New Project


		</h4>	
			


	</div><!-- /modal header -->

	<!-- modal body -->
	<div class="modal-body">

				<div id="content" class="padding-0">

					<div class="row">

						<div class="col-md-12">
						
							<!-- ------ -->
							<div class="panel panel-default">


								<div class="panel-body">
								<div id ="errmsg"></div>

										<form class="validate" action="" method="post" enctype="multipart/form-data" data-success="Sent! Thank you!" data-toastr-position="top-right">
											<fieldset>
												<!-- required [php action request] -->
												<input type="hidden" name="action" value="contact_send" />
												<input type="hidden" id="current_state" name="current_state" value="<?php echo $action ?>" />
												
																								<div class="row">
													<div class="form-group">
														<div class="col-md-4 col-sm-4">
															<label>Project Code *</label>
															<input type="text" <?php if ($action == "view"){echo " readonly ";}?>
															id="new_project_code" name="contact[first_name]"  value="" class="form-control required">
														</div>
																												<div class="col-md-8 col-sm-8">
															<label>Project Title *</label>
															<input type="text" <?php if ($action == "view"){echo " readonly ";}?>
															id="new_project_title" name="contact[first_name]" value="" class="form-control required">
														</div>
													</div>
												</div>
																																			<div class="row">
													<div class="form-group">
														<div class="col-md-4 col-sm-4">
														
														<?php
														
														$phxclient_comp_status = $_COOKIE['phxclient_comp_status'];
														
														if ($phxclient_comp_status == "Demo"){
															
															echo "Creating new Projects is disabled in demo mode";
															
														}else{
														?>
														
												<button type="button" onclick="javascript: create_project()" class="btn btn-primary">Create Project</button>
														<?php
														}
?>														

													</div>

													</div>
												</div>





	



												</div>


											</fieldset>



										</form>

								</div>

							</div>
							<!-- /----- -->

						</div>


					</div>

				</div>
			
			<!-- /MIDDLE -->

	



								</div>
		<!-- JAVASCRIPT FILES -->
		<script type="text/javascript">var plugin_path = '../assets/plugins/';</script>
		<script type="text/javascript" src="../assets/plugins/jquery/jquery-2.2.3.min.js"></script>
		<script type="text/javascript" src="../assets/js/app.js"></script>

	<!-- /modal body -->

	<div class="modal-footer"><!-- modal footer -->
		<button class="btn btn-default" data-dismiss="modal" onclick="javascript:window.location.reload()" >Close</button> 
	</div><!-- /modal footer -->
