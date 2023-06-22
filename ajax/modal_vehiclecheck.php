<style>
.ui-autocomplete {
z-index: 100;
}
</style>

<?

		$phxclient_id = $_COOKIE['phxclient_id'];
		$phxclient_type = $_COOKIE['phxclient_type'];
		
		$uid_vehicle = $_REQUEST['uid_vehicle'];
		

		include("../../../php/configiboss.php");
		
				$sqlvehicle = "SELECT * FROM ".$phxclient_id."_vehicles where uid_vehicle =".$uid_vehicle;
			//		echo $sqlvehicle;
					

		$resultvehicle = $conn->query($sqlvehicle);

		if ($resultvehicle->num_rows > 0) {
			// output data of each row
			while($rowvehicle = $resultvehicle->fetch_assoc()) {

				$uid_vehicle 					= $rowvehicle["uid_vehicle"];
				$vehicle_name 					= $rowvehicle["vehicle_name"];
				$vehicle_rego 					= $rowvehicle["vehicle_rego"];
				$vehicle_rego_due 				= strtotime($rowvehicle["vehicle_rego_due"]);
				$vehicle_cofwof_due 			= strtotime($rowvehicle["vehicle_cofwof_due"]);
				$vehicle_nextservice_kms		= $rowvehicle["vehicle_nextservice_kms"];
				$vehicle_nextservice_date		= strtotime($rowvehicle["vehicle_nextservice_date"]);
				$vehicle_latest_speedo 			= $rowvehicle["vehicle_latest_speedo"];
				$vehicle_current_hubo 			= $rowvehicle["vehicle_current_hubo"];
				$vehicle_kms_paid 				= $rowvehicle["vehicle_kms_paid"];
				$vehicle_kms_rem 				= $rowvehicle["vehicle_kms_rem"];
				$vehicle_check_date 			= strtotime($rowvehicle["vehicle_check_date"]);
				$vehicle_check_next_date 			= strtotime($rowvehicle["vehicle_check_next_date"]);
				$vehicle_check_washer 			= $rowvehicle["vehicle_check_washer"];
				$vehicle_check_lights 			= $rowvehicle["vehicle_check_lights"];
				$vehicle_check_tyres 			= $rowvehicle["vehicle_check_tyres"];
				$vehicle_check_firstaid 		= $rowvehicle["vehicle_check_firstaid"];
				$alert_rego_due 				= $rowvehicle["alert_rego_due"];				
				$alert_cofwof_due 				= $rowvehicle["alert_cofwof_due"];				
				$alert_service_due 				= $rowvehicle["alert_service_due"];
				$alert_vehicle_check_due 		= strtotime($rowvehicle["alert_vehicle_check_due"]);
				$vehicle_status 				= $rowvehicle["vehicle_status"];
				$vehicle_alert					= $rowvehicle["vehicle_alert"];				
				

				$vehicle_check_washer_na 			= $rowvehicle["vehicle_check_washer_na"];
				$vehicle_check_lights_na 			= $rowvehicle["vehicle_check_lights_na"];
				$vehicle_check_tyres_na				= $rowvehicle["vehicle_check_tyres_na"];
				$vehicle_check_firstaid_na 			= $rowvehicle["vehicle_check_firstaid_na"];
				$vehicle_check_oil_na		 		= $rowvehicle["vehicle_check_oil_na"];				
				
				
				
				//format dates
				
				$serv_due = "";
				
				 $vehicle_rego_due2 = date("d-m-Y",$vehicle_rego_due);
				 
				 
				 //calculate rego dates
				 
				$now = time();
				
				$vehicle_rego_due22 = strtotime($rowvehicle["vehicle_rego_due"]);	
				
				$difference = $vehicle_rego_due22 - $now;
				
				$rego_days = floor($difference / (60*60*24) );


				$vehicle_cofwof_due22 = strtotime($rowvehicle["vehicle_cofwof_due"]);	
				
				$differencecofwof = $vehicle_cofwof_due22 - $now;
				
				$cofwof_days = floor($differencecofwof / (60*60*24) );
				

				 $vehicle_nextservice_date2 = date("d-m-Y",$vehicle_nextservice_date);
	
				 $vehicle_cofwof_due2 = date("d-m-Y",$vehicle_cofwof_due);
	
				 $vehicle_check_date2 = date("d/m/Y",$vehicle_check_date);			 

				 $vehicle_check_next_date2 = date("d/m/Y",$vehicle_check_next_date);		

	
				 if ($vehicle_nextservice_kms == 0 ){
					 
				 }else{
					 
					$serv_due = $serv_due . $vehicle_nextservice_kms . " kms "; 

				 }
				 
				 if ($vehicle_check_date2 == "01/01/1970"){
					 $vehicle_check_date2 = "";
				 }else{
					 
				 }

				 
				 if ($vehicle_check_next_date2 == "01/01/1970"){
					 $vehicle_check_next_date2 = "";
				 }else{
					 
				 }

				 
 				 if ($vehicle_cofwof_due2 == "01-01-1970"){
					 $vehicle_cofwof_due2 = "";
				 }else{
					 
				 }
				
 				 if ($vehicle_rego_due2 == "01-01-1970"){
					 $vehicle_rego_due2 = "";
				 }else{
					 
				 }

				
				 if ($vehicle_nextservice_date2 == "01-01-1970"){
					  $vehicle_nextservice_date2 = "";
				 }else{
					 
					 	 if ($vehicle_nextservice_kms == 0 ){

					$serv_due = $serv_due . $vehicle_nextservice_date2; 							 
						 }else{

					$serv_due = $serv_due . " or " . $vehicle_nextservice_date2; 
					
						 }


					 
				 }
				
				if ($vehicle_status == "Current"){

						$rowclass = "success";
					
				}else{
						$rowclass = "danger";
				}
				
				$alert_bg_colour = "success";
				
			}
			
		}
					
					?>



	<div class="modal-header"><!-- modal header -->
	<div class="col-md-6">
		<h4 class="modal-title" id="myModalLabel">Record Latest Vehicle Details<br>
		<?php echo $vehicle_rego . " " . $vehicle_name ?>


		</h4>	
			

</div>
	</div><!-- /modal header -->

	<!-- modal body -->
	<div class="modal-body">

				<div id="content"  style="z-index: 100000000000000000000" class="padding-0">

					<div class="row">

						<div class="col-md-6">
						
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
													<input   type="hidden"   id="vehicle_check_washer_na" value="<?php echo htmlspecialchars($vehicle_check_washer_na)?>" >
													<input   type="hidden"   id="vehicle_check_lights_na" value="<?php echo htmlspecialchars($vehicle_check_lights_na)?>" >
													<input   type="hidden"   id="vehicle_check_tyres_na" value="<?php echo htmlspecialchars($vehicle_check_tyres_na)?>" >
													<input   type="hidden"   id="vehicle_check_firstaid_na" value="<?php echo htmlspecialchars($vehicle_check_firstaid_na)?>" >
													<input   type="hidden"   id="vehicle_check_oil_na" value="<?php echo htmlspecialchars($vehicle_check_oil_na)?>" >

													
														<div class="col-md-8 col-sm-8">
															<label>Latest Speedo</label>
															<input   class="form-control"  style="text-align: right" id="vehicle_latest_speedo"     type="text"   value="<?php echo htmlspecialchars($vehicle_latest_speedo)?>" >

														</div>

												</div>						
												<div class="row">	
									
											
														<div class="col-md-8 col-sm-8">
															<label>Latest Hubbo</label><br>
															<input  class="form-control" style="text-align: right"  type="text"   id="vehicle_current_hubo"    value="<?php echo htmlspecialchars($vehicle_current_hubo)?>" >


														</div>

											
												</div>	
																								<div class="row">	
												
											
														<div class="col-md-8 col-sm-8">
															<label>KMS Paid</label><br>
															<input  class="form-control" style="text-align: right"  id="vehicle_kms_paid"    type="text"   value="<?php echo htmlspecialchars($vehicle_kms_paid)?>" >


														</div>

											
												</div>	
																	<div class="row">	
<div class="col-md-8 col-sm-8">																	
															<label>Rego Due</label><br>

															<input  id="vehicle_rego_due"  type="text"  class="form-control datepicker"  data-format="dd-mm-yyyy" data-lang="en" data-RTL="false"  value="<?php echo $vehicle_rego_due2;?>">
													
													
														</div>
														</div>
														<div class="row">	
																											<div class="col-md-8 col-sm-8">		
															<label>COF/WOF Due</label><br>

															<input  id="vehicle_cofwof_due"   type="text"  class="form-control datepicker"  data-format="dd-mm-yyyy" data-lang="en" data-RTL="false"  value="<?php echo $vehicle_cofwof_due2;?>">
													

													</div>
													</div>
													<div class="row">
																									<div class="col-md-8 col-sm-8">
															<label>Next Service KMS</label><br>
															<input class="form-control" style="text-align: right" id="vehicle_nextservice_kms"   type="text"   value="<?php echo htmlspecialchars($vehicle_nextservice_kms)?>">
													

													</div>
													</div>
													<div class="row">
																											<div class="col-md-8 col-sm-8">
															<label>Next Service Date</label><br>
															<input  id="vehicle_nextservice_date"  type="text"  class="form-control datepicker"  data-format="dd-mm-yyyy" data-lang="en" data-RTL="false"  value="<?php echo $vehicle_nextservice_date2;?>">

														</div>

													</div>

												<table>
												<tr>
												<td>
																											<div class="col-md-2 col-sm-2">
															<label>Washer</label><br>
															
															<?php if ($vehicle_check_washer_na == "1"){
															
															?>
															N/A <input id="checkwasher" type="hidden">
															<?php															
															}else{
																?>
																						<label readonly class="switch switch switch-round">
	


	<input id="checkwasher" type="checkbox">
		
	
	<span class="switch-label" data-on="YES" data-off="NO"></span>

</label>
																<?php
																	}
															?>	

															
													

													</div>
</td>
<td>													
																											<div class="col-md-2 col-sm-2">
															<label>Lights</label><br>
											
															<?php if ($vehicle_check_lights_na == "1"){
															
															?>
															N/A<input id="checklights" type="hidden">
															<?php															
															}else{
																?>
																						<label readonly class="switch switch switch-round">
	


	<input id="checklights" type="checkbox">
		
	
	<span class="switch-label" data-on="YES" data-off="NO"></span>

</label>
																<?php
																	}
															?>	

															
													

															
													

													</div>		
													</td>
													</tr>
													<tr>
													<td>
																											<div class="col-md-2 col-sm-2">
															<label>Tyres</label><br>
											
															<?php if ($vehicle_check_tyres_na == "1"){
															
															?>
															N/A<input id="checktyres" type="hidden">
															<?php															
															}else{
																?>
																						<label readonly class="switch switch switch-round">
	


	<input id="checktyres" type="checkbox">
		
	
	<span class="switch-label" data-on="YES" data-off="NO"></span>

</label>
																<?php
																	}
															?>	

															
													

															
													

													</div>		
													</td>
													<td>
																											<div class="col-md-2 col-sm-2">
															<label>First Aid</label><br>
											
															<?php if ($vehicle_check_firstaid_na == "1"){
															
															?>
															N/A	<input id="checkfirstaid" type="hidden">
															<?php															
															}else{
																?>
																						<label readonly class="switch switch switch-round">
	


	<input id="checkfirstaid" type="checkbox">
		
	
	<span class="switch-label" data-on="YES" data-off="NO"></span>

</label>
																<?php
																	}
															?>	

															
													

															
													

													</div>	
													</td>
													</tr>
													<tr>
													<td>

																											<div class="col-md-2 col-sm-2">
															<label>Oil</label><br>
											
															<?php if ($vehicle_check_oil_na == "1"){
															
															?>
															N/A	<input id="checkoil" type="hidden">
															<?php															
															}else{
																?>
																						<label readonly class="switch switch switch-round">
	


	<input id="checkoil" type="checkbox">
		
	
	<span class="switch-label" data-on="YES" data-off="NO"></span>

</label>
																<?php
																	}
															?>	

															
													

															
													

													</div>													
											</td>
											</tr>
											</table>
											<br>

																														<div class="row">	
											
											
														<div class="col-md-8 col-sm-8">
															<label>Alert</label><br>
															<input  class="form-control" style="text-align: left"  id="vehicle_alert"    type="text"   value="<?php echo htmlspecialchars($vehicle_alert)?>" >


														</div>

											
												</div>
								<div class="row">
													<div class="form-group">
														<div class="col-md-8 col-sm-8">
													<center>
													<label>
													Checked By</label>
														
														<span>
														<?php echo $_COOKIE['phxusername']; ?><br>
														<b>At: </b><?php echo date("d-m-Y H:i", time()); ?>
														</span>
														<div  class="form-group" id="diverrmsgcr8cust" style="display: none; color: red"></div>
												<button type="button" onclick="javascript: update_vehicle(<?php echo $uid_vehicle?>)" class="btn btn-primary">Save and Confirm</button>
											</center>

													</div>

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
								<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
   <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
   <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
								
										<link href="../assets/css/essentials.css" rel="stylesheet" type="text/css" />
		<link href="../assets/css/layout.css" rel="stylesheet" type="text/css" />
		<link href="../assets/css/color_scheme/green.css" rel="stylesheet" type="text/css" id="color_scheme" />
		<!-- JAVASCRIPT FILES -->
		<script type="text/javascript">var plugin_path = '../assets/plugins/';</script>

		<script type="text/javascript" src="../assets/plugins/jquery/jquery-ui.min.js"></script>
		<link rel="stylesheet" type="text/css" href="jquery-ui.css">

		<script type="text/javascript" src="../assets/js/app.js"></script>
		 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>  
		 
		 
		 

	<!-- /modal body -->

	<div class="modal-footer"><!-- modal footer -->
		<button id="butclose" class="btn btn-default" data-dismiss="modal" onclick="javascript:window.location.reload()" >Close</button> 
	</div><!-- /modal footer -->
	


<script>


		function update_vehicle(uid_vehicle) {
		//	alert ("started");
			
			
		document.getElementById("diverrmsgcr8cust").style.display = "none";
//alert ("2");



		var vehicle_check_washer_na 	= document.getElementById("vehicle_check_washer_na").value;
		var vehicle_check_lights_na 	= document.getElementById("vehicle_check_lights_na").value;
		var vehicle_check_tyres_na 		= document.getElementById("vehicle_check_tyres_na").value;
		var vehicle_check_firstaid_na 	= document.getElementById("vehicle_check_firstaid_na").value;
		var vehicle_check_oil_na		= document.getElementById("vehicle_check_oil_na").value;
		
		var vehicle_latest_speedo 		= document.getElementById("vehicle_latest_speedo").value;
		var vehicle_current_hubo 		= document.getElementById("vehicle_current_hubo").value;
		var vehicle_kms_paid			= document.getElementById("vehicle_kms_paid").value;		
		var vehicle_alert		 		= document.getElementById("vehicle_alert").value;			

			
		var vehicle_rego_due		 	= document.getElementById("vehicle_rego_due").value;			
		var vehicle_cofwof_due		 	= document.getElementById("vehicle_cofwof_due").value;		
			
		var vehicle_nextservice_date	= document.getElementById("vehicle_nextservice_date").value;			
		var vehicle_nextservice_kms		= document.getElementById("vehicle_nextservice_kms").value;
		
		
			

//alert (vehicle_rego_due);

//return false;


		
		var checkwasher = document.getElementById("checkwasher").checked;
		var checklights = document.getElementById("checklights").checked;
		var checktyres = document.getElementById("checktyres").checked;
		var checkfirstaid = document.getElementById("checkfirstaid").checked;
		var checkoil = document.getElementById("checkoil").checked;

//alert ("3");
		
		if(isNaN(vehicle_latest_speedo)){
			document.getElementById("diverrmsgcr8cust").innerHTML = "Update Failed. Please enter a number for speedo";	
			document.getElementById("diverrmsgcr8cust").style.display = "block";	
			return false;
		}else{

		}
		
		if(isNaN(vehicle_kms_paid)){
			document.getElementById("diverrmsgcr8cust").innerHTML = "Update Failed. Please enter a number for kms paid";	
			document.getElementById("diverrmsgcr8cust").style.display = "block";	
			return false;
		}else{

		}
		
		if(isNaN(vehicle_current_hubo)){
			document.getElementById("diverrmsgcr8cust").innerHTML = "Update Failed. Please enter a number for hubo";	
			document.getElementById("diverrmsgcr8cust").style.display = "block";	
			return false;
		}else{

		}
	//alert (checkwasher);
	
	
		if (vehicle_check_washer_na == "0"){
			if (checkwasher == true){
				checkwasher = 1;
			}else{
				checkwasher = 0;
				document.getElementById("diverrmsgcr8cust").innerHTML = "Update Failed. Please check the washers";	
				document.getElementById("diverrmsgcr8cust").style.display = "block";	
				return false;			
			}
		}


		if (vehicle_check_lights_na == "0"){
			if (checklights == true){
				checklights = 1;
			}else{
				checklights = 0;		
				document.getElementById("diverrmsgcr8cust").innerHTML = "Update Failed. Please check the lights";	
				document.getElementById("diverrmsgcr8cust").style.display = "block";	
				return false;						
			}
		}


		if (vehicle_check_tyres_na == "0"){
			if (checktyres == true){
				checktyres = 1;
			}else{
				checktyres = 0;			
				document.getElementById("diverrmsgcr8cust").innerHTML = "Update Failed. Please check the tyres";	
				document.getElementById("diverrmsgcr8cust").style.display = "block";	
				return false;
			}
		}
		
		if (vehicle_check_firstaid_na == "0"){		
			if (checkfirstaid == true){
				checkfirstaid = 1;
			}else{
				checkfirstaid = 0;		
				document.getElementById("diverrmsgcr8cust").innerHTML = "Update Failed. Please check the first aid";	
				document.getElementById("diverrmsgcr8cust").style.display = "block";	
				return false;			
			}		
		}

		if (vehicle_check_oil_na == "0"){		
			if (checkoil == true){
				checkfirstaid = 1;
			}else{
				checkfirstaid = 0;		
				document.getElementById("diverrmsgcr8cust").innerHTML = "Update Failed. Please check the Oil";	
				document.getElementById("diverrmsgcr8cust").style.display = "block";	
				return false;			
			}		
		}
		


			var jobfields = {};
			
		//	alert (vehicle_rego_due);
			
			
			jobfields.uid_vehicle				= uid_vehicle;
			jobfields.vehicle_latest_speedo	 	= vehicle_latest_speedo;			
			jobfields.vehicle_current_hubo	 	= vehicle_current_hubo;
			jobfields.checkwasher		 		= checkwasher;
			jobfields.checklights		 		= checklights;			
			jobfields.checktyres		 		= checktyres;	
			jobfields.checkoil			 		= checkoil;			
			jobfields.vehicle_kms_paid			= vehicle_kms_paid;	
			jobfields.vehicle_alert		 		= vehicle_alert;			
			jobfields.checkfirstaid		 		= checkfirstaid;	
			jobfields.vehicle_rego_due			= vehicle_rego_due;
			jobfields.vehicle_cofwof_due		= vehicle_cofwof_due;
			jobfields.vehicle_nextservice_kms	= vehicle_nextservice_kms;
			jobfields.vehicle_nextservice_date	= vehicle_nextservice_date;

			
						$.ajax({
					url: 'updvehicle.php',
					type: 'post',
					data: {"jobfields" : JSON.stringify(jobfields)},
					success: function(data) {

		//				alert (data);
						

						obj = JSON.parse(data);
										
						if (obj.phx_result == "Update Successful"){
							
							$("#butclose").click();
							

						}else{
							alert ("error - details are " + data);	
						}

				}
			});	

		
		}

</script>


