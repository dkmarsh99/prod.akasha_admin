<?

//$action = $_GET['action'];

$phxclient_id = $_COOKIE['phxclient_id'];

$ce_staff_create = 1;
$ce_who = 1;
$ce_uid_client = 1;
$st_id = $_REQUEST['sales_id'];

		include("../../php/configiboss.php");

		$sqluser = "SELECT * FROM ".$phxclient_id."_jobs_view where st_id = ". $st_id;
		
	//	echo $sqluser;
		
		$resultuser = $conn->query($sqluser);


			// output data of each row
			while($rowst = $resultuser->fetch_assoc()) {

				$comp_name = $rowst["comp_name"];
				
			}


?>


	<div class="modal-header"><!-- modal header -->

		<h4 class="modal-title" id="myModalLabel">Send Email with Jobsheet


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
												
																								<div class="row">
													<div class="form-group">
														<div class="row">
														<div class="col-md-10 col-sm-10">
															<label>Email To *</label>
															<input type="text" 
															id="email_to" name="contact[first_name]"  value="<?php echo $_REQUEST['email'];?>" class="form-control required">
														</div>
														</div>
															<div class="row">
													<div class="col-md-10 col-sm-10">
															<label>Subject *</label>
															<input type="text" 
															id="new_project_title" name="contact[first_name]" value="Jobsheet - <?php echo $comp_name; ?> Job ID: <?php echo $_REQUEST['sales_id']; ?>" class="form-control required">
														</div>
														</div>
															<div class="row">
																	<div class="col-md-10 col-sm-10">		
															<label>Message *</label>
													<textarea class="summernote form-control" data-height="200" data-lang="en-US"> Please find attached a jobsheet</textarea>
										
														</div>
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
														
												<button type="button" onclick="javascript: send_email()" class="btn btn-primary">Send Email</button>
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
