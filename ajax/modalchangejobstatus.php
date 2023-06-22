<?

$action = $_GET['action'];

$phxclient_id = $_COOKIE['phxclient_id'];

$ce_staff_create = 1;
$ce_who = 1;
$ce_uid_client = 1;

$st_id 		= $_REQUEST['st_id'];
$new_status	= $_REQUEST['new_status'];

if ($new_status == "qs"){
		$new_status = "Quote Sent";
}

if ($new_status == "ws"){
		$new_status = "Work Schd";
		
}

if ($new_status == "is"){
		$new_status = "Invoice Sent";
		
}


?>


	<div class="modal-header"><!-- modal header -->

		<h4 class="modal-title" id="myModalLabel">Change Job Status - Job Number <?php echo $st_id?><br>
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
														<div class="col-md-14 col-sm-14">
															<label>Do you want to change the status of this Job to <?php echo $new_status ?> ?</label>
															
															
															</div>

													</div>
												</div>
												<div class="row">
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
		<button class="btn btn-default" data-dismiss="modal" onclick="javascript:window.location.reload()" >No - Cancel</button> 
				<button class="btn btn-default" data-dismiss="modal" onclick="javascript:change_job_status(<?php echo $st_id ?>, '<?php echo $new_status ?>')" >Yes</button> 
	</div><!-- /modal footer -->
	
	<script>
			function create_staff() {
			
			var j1								=  document.getElementById('Outlet_ID');
			var outlet_id						=  j1.options[j1.selectedIndex].value;
			var outlet_name						=  j1.options[j1.selectedIndex].text;
			
		//	alert (outlet_id+outlet_name);
			

			var new_staff_name				= document.getElementById("new_staff_name").value;

		//	alert ("1");

			
	//		alert ("create job"+reportemailmessage+tagsfindcustjobedit+cust_order_no+job_date_start);
			
//alert (job_descr+"hello");

			var jobfields = {};
			
			jobfields.new_staff_name				 	= new_staff_name;	

			
				$.ajax({
					url: '../php/cr8staff.php',
					type: 'post',
					data: {"jobfields" : JSON.stringify(jobfields)},
					success: function(data) {

				//		alert (data);
						

						obj = JSON.parse(data);
										
						if (obj.phx_result == ""){
							
							window.location.replace("../staffdetaile/?uid_staff="+obj.new_id);
							
			//				location.reload();
						}else{
							alert ("Create Staff Failed "+data);
						}

				}
			});	

		
		}
		
		
		function change_job_status(st_id, new_status) {
			
			var j1								=  document.getElementById('Outlet_ID');
			var outlet_id						=  j1.options[j1.selectedIndex].value;
			var outlet_name						=  j1.options[j1.selectedIndex].text;



		//	alert (st_id+new_status);
			
		//	return false;
			
			
		//	alert (outlet_id+outlet_name);
			

			var jobfields = {};
			
			jobfields.st_id				 		= st_id;	
			jobfields.new_status				= new_status;
			
				$.ajax({
					url: '../php/updjobstatus.php',
					type: 'post',
					data: {"jobfields" : JSON.stringify(jobfields)},
					success: function(data) {

					//	alert (data);
						

						obj = JSON.parse(data);
										
						if (obj.phx_result == ""){
									
							location.reload();
						}else{
							alert ("Change Job status failed "+data);
						}

				}
			});	

		
		}
	
	</script>
	

