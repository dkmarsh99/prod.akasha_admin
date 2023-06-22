<?

$action = $_GET['action'];

$phxclient_id = $_COOKIE['phxclient_id'];

$ce_staff_create = 1;
$ce_who = 1;
$ce_uid_client = 1;


?>


	<div class="modal-header"><!-- modal header -->

		<h4 class="modal-title" id="myModalLabel">Confirm Create New Staff


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
														<div class="col-md-8 col-sm-8">
															<label>Full Name (First and Last Name) *</label>
															<input tabindex="0" type="text" id="new_staff_name"   value="" class="form-control required">
														</div>

													</div>
												</div>
												<div class="row">
													<div class="form-group">
														<div class="col-md-6 col-sm-6">
														
															<button type="button" onclick="javascript: create_staff()" class="btn btn-primary">Create Staff</button>

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
	
	</script>
	

