<?

//$action = $_GET['action'];

$phxclient_id = $_COOKIE['phxclient_id'];

$ce_staff_create = 1;
$ce_who = 1;
$ce_uid_client = 1;
$st_id 			= $_REQUEST['st_id'];
$uid_client 	= $_REQUEST['uid_client'];

		include("../../php/configiboss.php");

		$sqlst = "SELECT * FROM ".$phxclient_id."_jobs_view where st_id = ". $st_id;
		
	//	echo $sqluser;
		
		$resultst = $conn->query($sqlst);


			// output data of each row
			while($rowst = $resultst->fetch_assoc()) {

				$comp_name 			= $rowst["comp_name"];
				$uid_client 		= $rowst["uid_client"];
				$job_uid_contact	 = $rowst["job_uid_contact"];
				$job_status			 = $rowst["status"];				
			}


			
				
	$staff_id = $_COOKIE['phxuserid'];
	
	$staff_email_signature = "";


?>


	<div class="modal-header"><!-- modal header -->

		<h4 class="modal-title" id="myModalLabel">Create new contact for - <?php echo $comp_name ?>


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
								<div id ="diverr"></div>
								<input id="uid_client" class="form-control"  style="width: 100%;"  type="hidden"  value="<?php echo $uid_client;?>" >
								
								  														<div class="row"   style="background-color: rgb(245, 245, 245)">
  														<div class="col-md-8 col-sm-8">
															<label>Contact Name</label><br>

															<input id="new_cont_name" class="form-control"  style="width: 100%;"  type="text"  value="" >

														</div>
  														<div class="col-md-8 col-sm-8">
															<label>Mobile Phone</label><br>
															<input id="new_cont_mobile" class="form-control"  style="width: 100%;"  type="text"  value="" >

														</div>
														  														<div class="col-md-8 col-sm-8">
															<label>Email</label><br>
															<input id="new_cont_email" class="form-control"  style="width: 100%;"  type="text"  value="" >

														</div>
														  														<div class="col-md-8 col-sm-8">
															<label>Job Title</label><br>
															<input id="new_cont_jobtitle" class="form-control"  style="width: 100%;"  type="text"  value="" >

														</div>
													
														

									
	</div>

<br>
<br>
												<!-- required [php action request] -->

												<button type="button" onclick="javascript: create_contact(<?php echo $st_id;?>)" class="btn btn-primary">Create Contact</button>
													

													</div>

													</div>
												</div>

														<div class="row">
													<div class="form-group">
	<div style="display: none" id="div_phx_message"></div>
</div>
</div>


	



												</div>


				

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



<script>

function check_changestatus(status){
	
location.reload(true);

	
	
}


function create_contact(st_id){
	
			var st_id				= st_id;
			var new_uid_client	 	= document.getElementById('uid_client').value;
			var new_cont_name 		= document.getElementById('new_cont_name').value;
			var new_cont_mobile 	= document.getElementById('new_cont_mobile').value;
			var new_cont_email 		= document.getElementById('new_cont_email').value;
			var new_cont_jobtitle 	= document.getElementById('new_cont_jobtitle').value;
			var new_cont_attn 		= "";
						

					//		alert (new_cont_name);
							

			if (new_cont_name == ""){

				document.getElementById('diverr').innerHTML = "<span style='color: red;'>You must enter a contact name</span>";

				return false;
				
			
			}else{
				
				
			}



			var outlet_id 			= 1;			
			
			var field_type			= "input";
			
				
			var sales_id = 0;
			
		
			var jobfields = {};

			jobfields.st_id	 				= st_id;
			jobfields.new_uid_client		= new_uid_client;			
			jobfields.new_cont_name 		= new_cont_name;
			jobfields.new_cont_mobile 		= new_cont_mobile;
			jobfields.new_cont_email 		= new_cont_email;
			jobfields.new_cont_jobtitle 	= new_cont_jobtitle;
			jobfields.new_cont_attn 		= new_cont_attn;
		

			
			$.ajax({
				url: 'jobaddcontact.php',
				type: 'post',
				async: 'false',
				data: {"jobfields" : JSON.stringify(jobfields)},
				success: function(data) {
		//			alert ("returned"+data);
				//
		
					var obj = JSON.parse( data );
					var phx_result = obj.phx_result;

				if (phx_result == ""){
					
					$("#butclose").click();
					
				//	 $('#datatablequal').DataTable().ajax.reload();

				
				}else{
					alert ("Update failed error details are"+data);
				}
//				alert (data);

//					alert (field_name+data);
					// Do something with data that came back. 
				}
			});			
			
		//	alert (	jobfields.sales_id+jobfields.field_name+jobfields.field_type+jobfields.field_name1_db+jobfields.field_name2_db+jobfields.field_value1+jobfields.field_value2);

			
		
	
	
}


    
		function myTrim(x) {
    return x.replace(/^\s+|\s+$/gm,'');
}

function setemailquoteself(){
	
	var current_email_address=getCookie("current_email_address"); 
	
	document.getElementById("email_to").value = current_email_address;
	
	
}
</script>

	<!-- /modal body -->

	<div class="modal-footer"><!-- modal footer -->
		<button id="butclose" class="btn btn-default" data-dismiss="modal" onclick="javascript:check_changestatus()" >Close</button> 
	</div><!-- /modal footer -->
