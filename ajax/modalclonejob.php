<?

$action = $_GET['action'];

$phxclient_id = $_COOKIE['phxclient_id'];

$ce_staff_create = 1;
$ce_who = 1;
$ce_uid_client = 1;

$st_id 		= $_REQUEST['st_id'];
$uid_client	= $_REQUEST['uid_client'];

$new_status	= $_REQUEST['new_status'];

if ($new_status == "qs"){
		$new_status = "Quote Sent";
}

if ($new_status == "ws"){
		$new_status = "Work Schd";
		
}


?>


	<div class="modal-header"><!-- modal header -->

		<h4 class="modal-title" id="myModalLabel">Clone Job Request - Job Number <?php echo $st_id?><br>
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
															<label>Do you want to clone this Job  ?</label>
															
															
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
		<button class="btn btn-default" data-dismiss="modal"  >No - Cancel</button> 
				<button class="btn btn-default" data-dismiss="modal" onclick="javascript:clonejobaction(<?php echo $st_id ?>, '<?php echo $uid_client ?>')" >Yes</button> 
	</div><!-- /modal footer -->
	
	<script>

		
function clonejobaction(st_id, uid_client){
	
//	alert ("clonejobaction");

	var hr = new XMLHttpRequest();
 
    var url = "../php/jobclonetrades.php";

    var suid = st_id;

//    var uid_client = document.getElementById("j_uid_client").value;
	
//	alert ("clone job " + suid);

	    var vars = "sales_id="+suid+"&uid_client="+uid_client;

//	alert (vars);
	
    hr.open("POST", url, true);
 
    // Set content type header information for sending url encoded variables in the request
 
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 
    // Access the onreadystatechange event for the XMLHttpRequest object
 
    hr.onreadystatechange = function() {
 
	   if(hr.readyState == 4 && hr.status == 200) {
 
		//	alert (hr.responseText);
		
			//		var return_data = hr.responseText;
			
//							alert (hr.responseText);

			obj = JSON.parse(hr.responseText);


		
			if (obj.phx_result == "Insert Successful") {
				
				window.location.replace("../jobdetaile/?st_id="+obj.new_id);
						
			}else{
				alert ("An error occurred while cloning Job. Please try again. If error happens again, please contact support" + hr.responseText);
		}
		
	   }
 
    }
 
    // Send the data to PHP now... and wait for response to update the status div
 
    hr.send(vars); // Actually execute the request
	
}
	
	</script>
	

