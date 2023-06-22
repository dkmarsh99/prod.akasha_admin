<style>
.ui-autocomplete {
z-index: 100;
}
</style>

<?

	$action = $_GET['action'];
	
	$edit_mode = 0;
	
	
	$phxusersec = $_COOKIE['phxusersec'];
	
	$phxclient_casual = $_COOKIE['phxclient_casual'];

	
	if ($phxusersec == "Superuser" && $phxclient_casual == "0"){
		$edit_mode = 1;
	}


	if ($action == "new"){
		
		$new_date = $_GET['newdate'];

			$sched_date_start = $_REQUEST['newdate'];
			$sched_date_end = $_REQUEST['newdate'];			
			
		
		include("configiboss.php");
		$queryinsert="insert into  ".$_COOKIE['phxclient_id'] . "_schedule_events(ev_name, ev_start_date, ev_start_time, ev_end_date, ev_end_time) values ('','".$new_date."','09:00','".$new_date."','17:00')";

		$resultinsert = $conn->query($queryinsert);
		
	//	echo $queryinsert;
		
		$ev_uid = mysqli_insert_id($conn);
	}else if ($action == "edit"){	

		$ev_uid = $_COOKIE['sel_ev_id'];
		

	}	
					
					



include("configiboss.php");
$query="select * from " . $_COOKIE['phxclient_id'] . "_schedule_events WHERE ev_uid=" . $ev_uid;
				
//echo $query;

					//		echo $sqlstaff;
					

					$resultstaff = $conn->query($query);

					if ($resultstaff->num_rows > 0) {
						// output data of each row
						while($rowstaff = $resultstaff->fetch_assoc()) {
							
							$ev_name 					= $rowstaff["ev_name"];
							$ev_start_date				= strtotime($rowstaff["ev_start_date"]);
							$ev_start_time				= $rowstaff["ev_start_time"];
							$ev_end_date				= strtotime($rowstaff["ev_end_date"]);
							$ev_end_time				= $rowstaff["ev_end_time"];							

							$ev_icon					= $rowstaff["ev_icon"];							
							$ev_link					= $rowstaff["ev_link"];							
							$ev_colour					= $rowstaff["ev_colour"];							
							$ev_notes					= $rowstaff["ev_notes"];

						}
						
					}

$phxclient_id = $_COOKIE['phxclient_id'];

$ce_staff_create = 1;
$ce_who = 1;
$ce_uid_client = 1;


?>




	<div class="modal-header"><!-- modal header -->
	
		<?php 
			if ($edit_mode == 1){
		?>

			<h4 class="modal-title" id="myModalLabel">Edit Schedule Item</h4>	
			
		<?php
			}else{
		?>
		
			<h4 class="modal-title" id="myModalLabel">View Schedule Item</h4>	
		
		<?php
		}
		?>


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
												<input type="hidden" id="ev_id" name="ev_id" value="<?php echo $ev_uid ?>" />
												<div class="row">
												<div  class="form-group" id="diverrmsgcr8cust" style="display: none; color: red"></div>
													<div class="form-group">
														<div class="col-md-8 col-sm-8">
															<label>Schedule Item name *</label>
															<input type="text" <?php if ($edit_mode == 0){echo " readonly ";}?> id="event_name"  value="<?php echo htmlspecialchars($ev_name);?>" class="form-control required"  onchange="javascript: upd_attendance('event_name', this.value,<?php echo $ev_uid ?>)" >
														</div>

													</div>
												</div>						
												<div class="row">

														<div class="col-md-8 col-sm-8">
														<table>
														<tr>
														<td style="width: 150px">
															<label>Start Date *</label><br>
												
<input id="ev_start_date" <?php if ($edit_mode == 0){echo " readonly disabled ";}?>  class="form-control datepicker" style="width: 100%;"  type="text" data-format="dd-mm-yyyy" data-lang="en" data-RTL="false"  value="<?php echo htmlspecialchars(date("d-m-Y",$ev_start_date));?>"  onchange="javascript: upd_attendance('ev_start_date', this.value,'<?php echo $ev_uid ?>')">
</td>
														<td style="width: 150px">

<label>Start Time *</label><br>
<?php 
$job_time_start = $ev_start_time;
$job_time_end = $ev_end_time;

 //echo "dave".date('H:i', strtotime($job_time_start))."dave";
 
 ?>
									<select <?php if ($edit_mode == 0){echo " readonly disabled ";}?>   class="form-control" id="ev_start_time" style="width: 100%;" class="form-control"  onchange="javascript: upd_attendance('ev_start_time', this.value,<?php echo $ev_uid ?>)">
	
	
															<?php

$selectedTime = "0:00";



//									echo date('h:i', $endTime);

for( $i = 0; $i<95; $i++ ) {

	$endTime = strtotime("+15 minutes", strtotime($selectedTime));

//														echo date('h:i', $endTime) . "<br>";
	if( date('H:i', $endTime) == date('H:i', strtotime($job_time_start))){
	?>

		<option selected value="<?php echo date('H:i', $endTime)?>"><?php echo date('H:i', $endTime)?></option>

	<?php


	}else{

	?>
	
	<option value="<?php echo date('H:i', $endTime)?>"><?php echo date('H:i', $endTime)?></option>

	<?php

	}

	?>

<?php
	$selectedTime = date('H:i', $endTime);

	//									echo $endTime;


	}

?>

															</select>
															
															</td>
															</tr>
															</table>

												
															</div>	
																												<div class="col-md-8 col-sm-8">
																												
																																										<table>
														<tr>
														<td style="width: 150px">
															<label>End Date *</label><br>
<input  <?php if ($edit_mode == 0){echo " readonly disabled ";}?>  id="ev_end_date" class="form-control datepicker" style="width: 100%;"  type="text" data-format="dd-mm-yyyy" data-lang="en" data-RTL="false"  value="<?php echo htmlspecialchars(date("d-m-Y",$ev_end_date));?>"  onchange="javascript: upd_attendance('ev_end_date', this.value,<?php echo $ev_uid ?>)">
</td>
	<td style="width: 150px">
<label>End Time *</label><br>
									<select  <?php if ($edit_mode == 0){echo " readonly disabled ";}?>  id="job_time_end" style="width: 100%; display: inline;" class="form-control"  onchange="javascript: upd_attendance('ev_end_time', this.value,<?php echo $ev_uid ?>)">
												
															<?php

$selectedTime = "0:00";

$job_time_start = "09:00";

//									echo date('h:i', $endTime);

for( $i = 0; $i<95; $i++ ) {

	$endTime = strtotime("+15 minutes", strtotime($selectedTime));

//														echo date('h:i', $endTime) . "<br>";
	if( date('H:i', $endTime) == date('H:i', strtotime($job_time_end))){
	?>

		<option selected value="<?php echo date('H:i', $endTime)?>"><?php echo date('H:i', $endTime)?></option>

	<?php


	}else{

	?>
	
	<option value="<?php echo date('H:i', $endTime)?>"><?php echo date('H:i', $endTime)?></option>

	<?php

	}

	?>

<?php
	$selectedTime = date('H:i', $endTime);

	//									echo $endTime;


	}

?>

															</select>
															</td>
															</tr>
															</table>

														</div>
		
														
												</div>	
												
												<?php
												if ($edit_mode == 1) {
													
													?>
																						<div class="sky-form">

											<div class="block inline-group">
												<label class="fsize11 block margin-top-20">Event Color</label>
												<label   class="radio"><input type="radio" name="calendar_event_color" value="primary"
												<?if ($ev_colour == "primary"){echo 'checked="checked"'; } ?>  onchange="javascript: upd_attendance('ev_colour', this.value,<?php echo $ev_uid ?>)"/><i></i> 
												<span     class="text-primary">Default</span></label>
												<label     class="radio"><input type="radio" name="calendar_event_color" value="danger"
												<?if ($ev_colour == "danger"){echo 'checked="checked"'; } ?>  onchange="javascript: upd_attendance('ev_colour', this.value,<?php echo $ev_uid ?>)"/><i></i> 
												<span    class="text-danger">Red</span></label>
												<label    class="radio"><input type="radio" name="calendar_event_color" value="warning"
												<?if ($ev_colour == "warning"){echo 'checked="checked"'; } ?>  onchange="javascript: upd_attendance('ev_colour', this.value,<?php echo $ev_uid ?>)"/><i></i> 
												<span    class="text-warning">Yellow</span></label>
												<label    class="radio"><input type="radio" name="calendar_event_color" value="success"
												<?if ($ev_colour == "success"){echo 'checked="checked"'; } ?>  onchange="javascript: upd_attendance('ev_colour', this.value,<?php echo $ev_uid ?>)"/><i></i> 
												<span    class="text-success">Green</span></label>
												<label    class="radio"><input type="radio" name="calendar_event_color" value="info"
											<?if ($ev_colour == "info"){echo 'checked="checked"'; } ?>  onchange="javascript: upd_attendance('ev_colour', this.value,<?php echo $ev_uid ?>)"/><i></i> 
												<span    class="text-info">Blue</span></label>
												<label    class="radio"><input type="radio" name="calendar_event_color" value="navy"
											<?if ($ev_colour == "navy"){echo 'checked="checked"'; } ?>  onchange="javascript: upd_attendance('ev_colour', this.value,<?php echo $ev_uid ?>)"/><i></i> 
												<span    style="color: #000080"  class="text-secondary">Navy</span></label>
											<label    class="radio"><input type="radio" name="calendar_event_color" value="maroon"
											<?if ($ev_colour == "maroon"){echo 'checked="checked"'; } ?>  onchange="javascript: upd_attendance('ev_colour', this.value,<?php echo $ev_uid ?>)"/><i></i> 
												<span    style="color: #800000" class="text-secondary">Maroon</span></label>
												
											<label    class="radio"><input type="radio" name="calendar_event_color" value="purple"
											<?if ($ev_colour == "purple"){echo 'checked="checked"'; } ?>  onchange="javascript: upd_attendance('ev_colour', this.value,<?php echo $ev_uid ?>)"/><i></i> 
												<span    style="color: #800080" class="text-secondary">Purple</span></label>


											<label    class="radio"><input type="radio" name="calendar_event_color" value="olive"
											<?if ($ev_colour == "olive"){echo 'checked="checked"'; } ?>  onchange="javascript: upd_attendance('ev_colour', this.value,<?php echo $ev_uid ?>)"/><i></i> 
												<span    style="color: #808000" class="text-secondary">Olive</span></label>										

											<label    class="radio"><input type="radio" name="calendar_event_color" value="teal"
											<?if ($ev_colour == "teal"){echo 'checked="checked"'; } ?>  onchange="javascript: upd_attendance('ev_colour', this.value,<?php echo $ev_uid ?>)"/><i></i> 
												<span    style="color: #008080" class="text-secondary">Teal</span></label>

											</div>
											</div>
											
											<?php
												}else{
													
													
													?>
													
																						<div class="sky-form">

											<div class="block inline-group">
												<label class="fsize11 block margin-top-20">Event Color</label>
												<label   class="radio"><input readonly disabled type="radio" name="calendar_event_color" value="primary"
												<?if ($ev_colour == "primary"){echo 'checked="checked"'; } ?>  onchange="javascript: upd_attendance('ev_colour', this.value,<?php echo $ev_uid ?>)"/><i></i> 
												<span     class="text-primary">Default</span></label>
												<label     class="radio"><input readonly disabled  type="radio" name="calendar_event_color" value="danger"
												<?if ($ev_colour == "danger"){echo 'checked="checked"'; } ?>  onchange="javascript: upd_attendance('ev_colour', this.value,<?php echo $ev_uid ?>)"/><i></i> 
												<span    class="text-danger">Red</span></label>
												<label    class="radio"><input readonly disabled  type="radio" name="calendar_event_color" value="warning"
												<?if ($ev_colour == "warning"){echo 'checked="checked"'; } ?>  onchange="javascript: upd_attendance('ev_colour', this.value,<?php echo $ev_uid ?>)"/><i></i> 
												<span    class="text-warning">Yellow</span></label>
												<label    class="radio"><input readonly disabled  type="radio" name="calendar_event_color" value="success"
												<?if ($ev_colour == "success"){echo 'checked="checked"'; } ?>  onchange="javascript: upd_attendance('ev_colour', this.value,<?php echo $ev_uid ?>)"/><i></i> 
												<span    class="text-success">Green</span></label>
												<label    class="radio"><input readonly disabled  type="radio" name="calendar_event_color" value="info"
											<?if ($ev_colour == "info"){echo 'checked="checked"'; } ?>  onchange="javascript: upd_attendance('ev_colour', this.value,<?php echo $ev_uid ?>)"/><i></i> 
												<span    class="text-info">Blue</span></label>
												<label    class="radio"><input readonly disabled  type="radio" name="calendar_event_color" value="navy"
											<?if ($ev_colour == "navy"){echo 'checked="checked"'; } ?>  onchange="javascript: upd_attendance('ev_colour', this.value,<?php echo $ev_uid ?>)"/><i></i> 
												<span    style="color: #000080"  class="text-secondary">Navy</span></label>
											<label    class="radio"><input readonly disabled  type="radio" name="calendar_event_color" value="maroon"
											<?if ($ev_colour == "maroon"){echo 'checked="checked"'; } ?>  onchange="javascript: upd_attendance('ev_colour', this.value,<?php echo $ev_uid ?>)"/><i></i> 
												<span    style="color: #800000" class="text-secondary">Maroon</span></label>
												
											<label    class="radio"><input readonly disabled  type="radio" name="calendar_event_color" value="purple"
											<?if ($ev_colour == "purple"){echo 'checked="checked"'; } ?>  onchange="javascript: upd_attendance('ev_colour', this.value,<?php echo $ev_uid ?>)"/><i></i> 
												<span    style="color: #800080" class="text-secondary">Purple</span></label>


											<label    class="radio"><input readonly disabled  type="radio" name="calendar_event_color" value="olive"
											<?if ($ev_colour == "olive"){echo 'checked="checked"'; } ?>  onchange="javascript: upd_attendance('ev_colour', this.value,<?php echo $ev_uid ?>)"/><i></i> 
												<span    style="color: #808000" class="text-secondary">Olive</span></label>										

											<label    class="radio"><input readonly disabled  type="radio" name="calendar_event_color" value="teal"
											<?if ($ev_colour == "teal"){echo 'checked="checked"'; } ?>  onchange="javascript: upd_attendance('ev_colour', this.value,<?php echo $ev_uid ?>)"/><i></i> 
												<span    style="color: #008080" class="text-secondary">Teal</span></label>

											</div>
											</div>
													
												
												
												
												
												<?php
												}
												?>
										

		<div id="divgetattendanceedit">
<? include ('getschedulestaff.php'); ?>
</div>									
								<div class="row">	

<?php

if ($edit_mode == 1){
//superuseer

	$div_notes_edit = "display: block;";
	$div_notes_view = "display: none;";

}else{

	$div_notes_edit = "display: none;";
	$div_notes_view = "display: block;";
	
}
?>								
											
												<div style="<?php echo $div_notes_edit; ?>" class="col-md-12 col-sm-12">
												
													<label>Notes </label>
													<textarea id="ev_notes" class="form-control" style="width: 100%" ><?php echo htmlspecialchars($ev_notes);?></textarea>
															
												</div>
														
												<div style="<?php echo $div_notes_view; ?>" class="col-md-12 col-sm-12">
													<label>Notes </label>

													<div readonly class="form-control"  style="overflow-y: scroll; height:120px;">
														<?php echo $ev_notes; ?>
													</div>

															
												</div>														
														
								</div>
								<div class="row">
													<div class="form-group">
														<div class="col-md-4 col-sm-4">
		
														<br>
														<br>
					<?php if ($edit_mode == 1){
						?>
														
						<button     class="btn btn-default" data-dismiss="modal" onclick="javascript:cancel_item(<?php echo $ev_uid;?>)" >Cancel this item</button> 
											<?php
					}
					?>

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
								
										<link href="../assets/css/essentials.min.css" rel="stylesheet" type="text/css" />
		<link href="../assets/css/layout.css" rel="stylesheet" type="text/css" />
		<link href="../assets/css/color_scheme/green.css" rel="stylesheet" type="text/css" id="color_scheme" />
		<!-- JAVASCRIPT FILES -->
		<script type="text/javascript">var plugin_path = '../assets/plugins/';</script>
				<script type="text/javascript" src="../assets/plugins/jquery/jquery-2.2.3.min.js"></script>

		<script type="text/javascript" src="../assets/plugins/jquery/jquery-ui.min.js"></script>
		<link rel="stylesheet" type="text/css" href="jquery-ui.css">

		<script type="text/javascript" src="../assets/js/app.js"></script>
		 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>  
		 <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
		 
		 

	<!-- /modal body -->

	<div class="modal-footer"><!-- modal footer -->
		<button id="butclose" class="btn btn-default" data-dismiss="modal"  >Close</button> 
	</div><!-- /modal footer -->
	

<script>





		function create_job() {
			
			var j1								=  document.getElementById('Outlet_ID');
			var outlet_id						=  j1.options[j1.selectedIndex].value;
			var outlet_name						=  j1.options[j1.selectedIndex].text;
			
		//	alert (outlet_id+outlet_name);
			
			var job_descr		 				= "";
			var tagsfindcustjobedit				= document.getElementById("tagsfindcustjobedit").value;
			var tagsfindvenuejobedit				= document.getElementById("tagsfindvenuejobedit").value;

			var cust_order_no					= document.getElementById("cust_order_no").value;
			var job_date_start					= document.getElementById("job_date_start").value;
			var job_time_start					= document.getElementById("job_time_start").value;	
			var job_date_end					= document.getElementById("job_date_end").value;
			var job_time_end					= document.getElementById("job_time_end").value;	
			var event_name						= document.getElementById("event_name").value;
		//	alert ("1");

			
	//		alert ("create job"+reportemailmessage+tagsfindcustjobedit+cust_order_no+job_date_start);
			
//alert (job_descr+"hello");

			var jobfields = {};
			
			jobfields.job_descr				 	= job_descr;	
			jobfields.tagsfindcustjobedit	 	= tagsfindcustjobedit;	
			jobfields.tagsfindvenuejobedit		= tagsfindvenuejobedit;
			jobfields.cust_order_no	 			= cust_order_no;	
			jobfields.job_date_start	 		= job_date_start;	
			jobfields.job_time_start	 		= job_time_start;	
			jobfields.job_date_end	 			= job_date_end;	
			jobfields.job_time_end	 			= job_time_end;	
			jobfields.event_name	 			= event_name;	
			jobfields.outlet_id	 				= outlet_id;			
			jobfields.outlet_name	 			= outlet_name;
			
	//		alert (JSON.stringify(jobfields));
			
				$.ajax({
					url: '../php/cr8job.php',
					type: 'post',
					data: {"jobfields" : JSON.stringify(jobfields)},
					success: function(data) {

		//				alert (data);
						

						obj = JSON.parse(data);
										
						if (obj.phx_result == ""){
							
							window.location.replace("../jobdetaile/?st_id="+obj.new_id);
							
			//				location.reload();
						}else{
							alert ("Create Job Failed "+data);
						}

				}
			});	

		
		}
		
		
		function create_contact() {
			
		document.getElementById("diverrmsgcr8cust").style.display = "none";
			
			
	//		alert ("cr8");
			
		//	return false;
			
			var j1								=  document.getElementById('Outlet_ID');
			var outlet_id						=  j1.options[j1.selectedIndex].value;
			var outlet_name						=  j1.options[j1.selectedIndex].text;
			
		//	alert (outlet_id+outlet_name);
			

			var tagsfindcustnew				= document.getElementById("tagsfindcustjobedit").value;
			
			if (tagsfindcustnew.trim() == ""){
							
				document.getElementById("diverrmsgcr8cust").innerHTML = "Please enter a contact name";
				document.getElementById("diverrmsgcr8cust").style.display = "block";
				return false;
							
			}


			var jobfields = {};
			
			jobfields.tagsfindcustnew				 	= tagsfindcustnew;	
	
			jobfields.outlet_id	 				= outlet_id;			
			jobfields.outlet_name	 			= outlet_name;
			jobfields.comp_name		 			= tagsfindcustnew;			
				$.ajax({
					url: '../php/cr8contact.php',
					type: 'post',
					data: {"jobfields" : JSON.stringify(jobfields)},
					success: function(data) {

				//		alert (data);
						

						obj = JSON.parse(data);
										
						if (obj.phx_result == "This client already exists"){
							
							document.getElementById("diverrmsgcr8cust").innerHTML = obj.phx_result;
							document.getElementById("diverrmsgcr8cust").style.display = "block";
							return false;
							
						}else if (obj.phx_result == ""){
							
					//		window.location.replace("../contactdetaile/?uid_client="+obj.new_id);
						}else{
							alert ("Create Contact Failed "+data);
						}

				}
			});	

		
		}
		

				
		function create_venue() {
			
		document.getElementById("diverrmsgcr8cust").style.display = "none";
			
			
	//		alert ("cr8");
			
		//	return false;
			
			var j1								=  document.getElementById('Outlet_ID');
			var outlet_id						=  j1.options[j1.selectedIndex].value;
			var outlet_name						=  j1.options[j1.selectedIndex].text;
			
		//	alert (outlet_id+outlet_name);
			

			var tagsfindcustnew				= document.getElementById("tagsfindvenuejobedit").value;
			
			if (tagsfindcustnew.trim() == ""){
							
				document.getElementById("diverrmsgcr8cust").innerHTML = "Please enter a Venue Name";
				document.getElementById("diverrmsgcr8cust").style.display = "block";
				return false;
							
			}


			var jobfields = {};
			
			jobfields.tagsfindcustnew				 	= tagsfindcustnew;	
	
			jobfields.outlet_id	 				= outlet_id;			
			jobfields.outlet_name	 			= outlet_name;
			jobfields.comp_name		 			= tagsfindcustnew;			
				$.ajax({
					url: '../php/cr8venue.php',
					type: 'post',
					data: {"jobfields" : JSON.stringify(jobfields)},
					success: function(data) {

			//			alert (data);
						

						obj = JSON.parse(data);
										
						if (obj.phx_result == "This client already exists"){
							
							document.getElementById("diverrmsgcr8cust").innerHTML = "This Venue already exists";
							document.getElementById("diverrmsgcr8cust").style.display = "block";
							return false;
							
						}else if (obj.phx_result == ""){
							
					//		window.location.replace("../contactdetaile/?uid_client="+obj.new_id);
						}else{
							alert ("Create Contact Failed "+data);
						}

				}
			});	

		
		}
		
		 	 function add_attendance(uid) {

			var ev_id =	document.getElementById("ev_id").value;	
			var sales_id =	document.getElementById("ev_id").value;		
			
			var uid					= uid;
			var current_function	= "addstl";
			
		
			var jobfields = {};

			jobfields.sales_id	 			= ev_id;
			jobfields.stl_id	 			= 0;		
			jobfields.staff_id	 			= uid;					
			jobfields.field_name 			= "";	
			jobfields.field_value	 		= "";	
			jobfields.field_text	 		= "";				
			jobfields.current_function 		= current_function;
			jobfields.ev_uid		 		= 0;

			
	//		alert (JSON.stringify(jobfields));

			
			$.ajax({
				url: 'schedadddelattendance.php',
				type: 'post',
				async: 'false',
				data: {"jobfields" : JSON.stringify(jobfields)},
				success: function(data) {

		//			alert (data);

//alert (ev_id);

					
						$.ajax({
							url: 'getschedulestaff2.php',
							type: 'post',
							async: 'false',
							data: {"ev_id" : ev_id},	
							success: function(data) {
							
								document.getElementById('divgetattendanceedit').innerHTML = data;
					
							}
						});	
								


				}
			});			
			
		//	alert (	jobfields.sales_id+jobfields.field_name+jobfields.field_type+jobfields.field_name1_db+jobfields.field_name2_db+jobfields.field_value1+jobfields.field_value2);

			
		 }
		 
		 
 	 function upd_attendance(field_name, field_value, stl_id, field_text) {
		 
	//	 alert ("upd_attendance");

			var ev_id =	document.getElementById("ev_id").value;	
			var sales_id =	document.getElementById("ev_id").value;	
			
			var stl_id				= stl_id;
			var current_function	= "updstl";
			
			var ev_notes 		= "";
			
			if (field_name == "ev_notes"){
				
				var ev_notes		 				= CKEDITOR.instances.ev_notes.getData();
				var current_function	= "updnotes";
				
			}
			
			if (field_name == "sta_staff_id"){
				
				var current_function	= "updstlwho";
			
			}
			
			if (field_name == "event_name"){
				
				var current_function	= "updeventname";
			
			}
			
			if (field_name == "ev_start_date"){
				
				var current_function	= "updstartdate";
			
			}
			
			if (field_name == "ev_start_time"){
				
				var current_function	= "updstarttime";
			
			}
			
			if (field_name == "ev_end_date"){
				
				var current_function	= "updenddate";
			
			}	
			
			if (field_name == "ev_end_time"){
				
				var current_function	= "updendtime";
			
			}

			if (field_name == "ev_colour"){
				
				var current_function	= "updeventcolour";
			
			}
			
			
			
			
			var jobfields = {};

			jobfields.sales_id	 			= sales_id;
			jobfields.stl_id	 			= stl_id;	
			jobfields.sel_uid	 			= 0;	
			jobfields.staff_id	 			= 0;	
			jobfields.ev_uid	 			= 0;
			jobfields.field_value	 		= field_value;	
			jobfields.field_name	 		= field_name;	
			jobfields.field_text	 		= field_text;	
			
			jobfields.current_function 		= current_function;

//alert ("1");
			
	//		alert (JSON.stringify(jobfields));

			
			$.ajax({
				url: 'schedadddelattendance.php',
				type: 'post',
				async: 'false',
				data: {"jobfields" : JSON.stringify(jobfields), "ev_notes" : ev_notes},
				success: function(data) {

	//		alert (data);
			

					var obj = JSON.parse( data );
					var phx_result = obj.phx_result;

					if (phx_result == "successful"){
						
						$.ajax({
							url: 'getschedulestaff2.php',
							type: 'post',
							async: 'false',
							data: {"ev_id" : ev_id},	
							success: function(data) {
								
								
							
								document.getElementById('divgetattendanceedit').innerHTML = data;
					
							}
						});	
						
					}else{
						alert ("update failed"+data);
						
					}
	


				}
			});			
			
		//	alert (	jobfields.sales_id+jobfields.field_name+jobfields.field_type+jobfields.field_name1_db+jobfields.field_name2_db+jobfields.field_value1+jobfields.field_value2);

			
		 }
		 
		 
 	 function del_attendance(uid) {
		 
		 	var ev_id =	document.getElementById("ev_id").value;	
			var sales_id =	document.getElementById("ev_id").value;	

			var sales_id =	document.getElementById("ev_id").value;			
			var current_function	= "delstl";
			
		
			var jobfields = {};

			jobfields.sales_id	 			= ev_id;
			jobfields.stl_id	 			= 0;		
			jobfields.field_name 			= "";	
			jobfields.field_value	 		= "";	
			jobfields.field_text	 		= "";				
			jobfields.current_function 		= current_function;
			jobfields.ev_uid		 		= uid;
			jobfields.staff_id	 			= 0;	
			
	//		alert (JSON.stringify(jobfields));

			
			$.ajax({
				url: 'schedadddelattendance.php',
				type: 'post',
				async: 'false',
				data: {"jobfields" : JSON.stringify(jobfields)},
				success: function(data) {

			//		alert (data);

					
						$.ajax({
							url: 'getschedulestaff2.php',
							type: 'post',
							async: 'false',
							data: {"ev_id" : ev_id},	
							success: function(data) {
							
								document.getElementById('divgetattendanceedit').innerHTML = data;
					
							}
						});	
								


				}
			});			
			
		//	alert (	jobfields.sales_id+jobfields.field_name+jobfields.field_type+jobfields.field_name1_db+jobfields.field_name2_db+jobfields.field_value1+jobfields.field_value2);

			
		 }


		 
 	 function cancel_item() {
		 
		 	var ev_id =	document.getElementById("ev_id").value;	
			var sales_id =	document.getElementById("ev_id").value;	

			var sales_id =	document.getElementById("ev_id").value;			
			var current_function	= "cancelitem";
			
		
			var jobfields = {};

			jobfields.sales_id	 			= ev_id;
			jobfields.stl_id	 			= 0;		
			jobfields.field_name 			= "";	
			jobfields.field_value	 		= "";	
			jobfields.field_text	 		= "";				
			jobfields.current_function 		= current_function;
			jobfields.ev_uid		 		= ev_id;
			jobfields.staff_id	 			= 0;	
			
	//		alert (JSON.stringify(jobfields));

			
			$.ajax({
				url: 'schedadddelattendance.php',
				type: 'post',
				async: 'false',
				data: {"jobfields" : JSON.stringify(jobfields)},
				success: function(data) {
					
				//	alert (data);
					
					
					document.getElementById("butclose").click();

			//		alert (data);

					


				}
			});			
			
		//	alert (	jobfields.sales_id+jobfields.field_name+jobfields.field_type+jobfields.field_name1_db+jobfields.field_name2_db+jobfields.field_value1+jobfields.field_value2);

			
		 }


</script>

		<script>
/**
 * CKEditor 4 Configuration Documentation 
 * (http://docs.ckeditor.com/#!/guide/dev_configuration)
 *
 */

// Default CKEditor 4 Full Toolbar
//CKEDITOR.replace('fulleditor');

// In-page customized CKEditor 4 Toolbar


	if (CKEDITOR.instances['ev_notes']){
		
		CKEDITOR.remove(CKEDITOR.instances['ev_notes']);	
			// alert ("removed");
	 
	};




CKEDITOR.replace('ev_notes', {
	   height: 200,
	           on: {
            instanceReady: function (ev) {
                this.dataProcessor.writer.setRules('p', {
                    breakAfterClose: false
                });
            }
			   },
	 toolbar: [
   [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ],
   { name: 'insert', items: [ 'Image', 'Table', 'HorizontalRule', 'SpecialChar' ] },
   { name: 'font', items: ['Font','FontSize'] },
   '/',
   { name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline','-','JustifyLeft','JustifyCenter','JustifyRight','-','NumberedList','BulletedList','-','Link','Unlink','-','Source' ] },
   { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
   { name: 'tools', items: [ 'Maximize' ] }
  ]
}
);


				CKEDITOR.instances['ev_notes'].on('blur', function(e) {
				    if (e.editor.checkDirty()) {

				//	alert("editjd1");
						
						 upd_attendance('ev_notes', 'ckeditor', <?php echo $ev_uid ?>);
      
				//	alert("editjd2");
				}
				});
				
				
				function close_window(){
					
					
					
					window.location.reload();
					
					
					
				}

</script>






