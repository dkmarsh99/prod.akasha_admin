<?

$action = $_GET['action'];

$phxclient_id = $_COOKIE['phxclient_id'];

$ce_staff_create = 1;
$ce_who = 1;
$ce_uid_client = 1;

$initial_action = $action;



?>


	<div class="modal-header"><!-- modal header -->

		<h4 class="modal-title" id="myModalLabel">Incident or Accident Details


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
								
								<?php
									if ($initial_action == "new"){
									
										$new_disp = "display: block;";
										$edit_disp = "display: none;";
									}else{
										
										$new_disp = "display: none;";
										$edit_disp = "display: block;";
										
									}

								?>
									<div id="divmodalcr8" style="<?php echo $new_disp;?>">
							
								<div id ="errmsg"></div>

												<!-- required [php action request] -->
												<input type="hidden" name="action" value="contact_send" />
												<input type="hidden" id="current_state" name="current_state" value="<?php echo $action ?>" />
												
																								<div class="row">
													<div class="form-group">
														<div class="col-md-8 col-sm-8">
															<label>Incident/Accident Short Title *</label>
															<input tabindex="0" type="text" id="new_ia_title"   value="" class="form-control required">
														</div>

													</div>
																																									<div class="col-md-8 col-sm-8">
																																									<br>
															<label>Incident or Accident</label><br>
															
<select  id = "accident_incident" name="accident_incident" style="width: 100%"  class="form-control"   onchange="" >


<option selected value='Incident'>Incident</option> 	
<option value='Accident'>Accident</option> 


</select>

															
														</div>
												</div>
												<div class="row">
													<div class="form-group">
														<div class="col-md-6 col-sm-6">
														<br>
														<br>
															<button type="button" onclick="javascript: create_incident()" class="btn btn-primary">Create</button>

														</div>

													</div>
												</div>
												
												
												
												</div>
												
												<?php
												
												$action = $_GET['action'];

$phxclient_id = $_COOKIE['phxclient_id'];

	
	include_once("configiboss.php");

	
	$ia_uid = $_REQUEST['ia_uid'];
	
	$risk_b4_severity 		= "None";
	$risk_b4_likelihood 	= "None";
	$risk_afta_severity 	= "None";
	$risk_afta_likelihood 	= "None";
	$ia_what 			= "";	
	$ia_title	 			= "";	
	
//$ia_uid = 1;

			$ia_uid		 					= $ia_uid;
			$ia_type	 					= "";
			$ia_title		 				= "";
			$ia_datetime		 			= "";
			$ia_time				 		= "";
			$ia_location		 			= "";
			$ia_seriousness					= "";			
			$ia_what		 				= "";
			$ia_reported_by_id		 		= 0;
			$ia_reported_by_name			= "Unassigned";
			$ia_reported_date		 		= "";
			$ia_manager_ack_id		 		= 0;		
			$ia_manager_ack_name		 	= "Unassigned";		
			$ia_manager_ack_date		 	= "";

			$ia_manager_notes		 		= "";		
			$ia_worksafe		 			= 0;		
			$ia_worksafe_note		 		= "";		
			$ia_status				 		= "New";

		$queryhr="SELECT * from " . $_COOKIE['phxclient_id'] . "_company_incidents where ia_uid = " . $ia_uid;
	//	echo $queryhr;
		$resulthr=mysqli_query($conn, $queryhr);

		while($rowhr=mysqli_fetch_array($resulthr)) { 

			$ia_uid		 					= $rowhr['ia_uid'];
			$ia_type	 					= $rowhr['ia_type'];
			$ia_title		 				= $rowhr['ia_title'];
			$ia_datetime		 			= strtotime($rowhr['ia_datetime']);
			$ia_time				 		= strtotime($rowhr['ia_time']);
			$ia_location		 			= $rowhr['ia_location'];
			$ia_seriousness					= $rowhr['ia_seriousness'];			
			$ia_what		 				= $rowhr['ia_what'];
			$ia_reported_by_id		 		= $rowhr['ia_reported_by_id'];
			$ia_reported_by_name			= $rowhr['ia_reported_by_name'];
			$ia_reported_date		 		= strtotime($rowhr['ia_reported_date']);
			$ia_manager_ack_id		 		= $rowhr['ia_manager_ack_id'];		
			$ia_manager_ack_name		 	= $rowhr['ia_manager_ack_name'];		
			$ia_manager_ack_date		 	= strtotime($rowhr['ia_manager_ack_date']);

			$ia_manager_notes		 		= $rowhr['ia_manager_notes'];		
			$ia_worksafe		 			= $rowhr['ia_worksafe'];		
			$ia_worksafe_note		 		= $rowhr['ia_worksafe_note'];		
			$ia_status				 		= $rowhr['ia_status'];


		}			
			
			?>
								
												<div id="divmodaledit" style="<?php echo $edit_disp;?>">
																		<div id ="errmsgedit"></div>

										<form class="validate" action="" method="post" enctype="multipart/form-data">
											<fieldset>
												<!-- required [php action request] -->
												<input type="hidden" name="action" value="contact_send" />
												<input type="hidden" id="current_state" name="current_state" value="<?php echo $action ?>" />
												<input type="hidden" id="ia_uid222" name="ia_uid222" value="<?php echo $ia_uid ?>" />
																								<div class="row">
													<div class="form-group">
													
														<div class="col-md-8 col-sm-8">
															<label>Incident/Accident Short Title *</label>
															<input id="ia_title" style="width: 100%"  class="form-control" type="text" value="<?php echo htmlspecialchars($ia_title);?>"   onchange="javascript: upd_incident('ia_title', this.value, <?php echo $ia_uid ?> )" >
															
														</div>
											<div class="col-md-8 col-sm-8">
																																									<br>
															<label>Incident or Accident</label><br>
															
<select  id = "accident_incident222" name="accident_incident222" style="width: 100%"  class="form-control"    onchange="javascript: upd_incident('ia_type', this.options[this.selectedIndex].text, <?php echo $ia_uid ?> )" >


<option <?php if ($ia_type == "Incident"){ echo " selected "; } ?> value='Incident'>Incident</option> 	
<option  <?php if ($ia_type == "Accident"){ echo " selected "; } ?>value='Accident'>Accident</option> 


</select>

															
														</div>
														<div class="col-md-8 col-sm-8">
															<label>Date/Time Occurred </label><br>
										<input id="ia_datetime" class="form-control datepicker" style="width: 125px; display: inline;"  type="text" data-format="dd-mm-yyyy" data-lang="en" data-RTL="false"  value="<?php echo htmlspecialchars(date("d-m-Y"))?>" onchange="javascript: upd_incident('ia_datetime', this.value, <?php echo $ia_uid ?>)">
					
									<select id="ia_time" style="width: 105px; display: inline;" class="form-control" onchange="javascript: upd_incident('ia_time', this.options[this.selectedIndex].value, <?php echo $ia_uid ?>)">
												
															<?php

$selectedTime = "0:00";

//									echo date('h:i', $endTime);

for( $i = 0; $i<95; $i++ ) {

	$endTime = strtotime("+15 minutes", strtotime($selectedTime));

//														echo date('h:i', $endTime) . "<br>";
	if( date('H:i', $endTime) == date("H:i", $ia_time)){
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

														</div>
																												<div class="col-md-8 col-sm-8">
															<label>Location</label>
															<input id="ia_location" style="width: 100%"  class="form-control" type="text" value="<?php echo htmlspecialchars($ia_location);?>"   onchange="javascript: upd_incident('ia_location', this.value, <?php echo $ia_uid ?> )" >
															
														</div>
														
																																										<div class="col-md-8 col-sm-8">
															<label>Status</label>
																												

<select  id = "ia_status" name="ia_status" style="width: 100%"  class="form-control"   onchange="javascript: upd_incident('ia_status', this.options[this.selectedIndex].text, <?php echo $ia_uid ?> )" >



		<option <?php if ("New" == $ia_status){echo " selected ";} ?> value='New'>New</option> 	
		<option <?php if ("Open" == $ia_status){echo " selected ";} ?> value='Open'>Open</option> 	
		<option <?php if ("Closed" == $ia_status){echo " selected ";} ?> value='Closed'>Closed</option> 	


</select>


		
								
															
														</div>	
																												<div class="col-md-8 col-sm-8">
															<label>Seriousness</label>
																												
																																					<?php
include_once("configiboss.php");

$querycodest="SELECT * from " . $_COOKIE['phxclient_id'] . "_code_lookup where code_type = 'riskseverity' and code_value <> 'None' order by  code_additional";
//echo $querycodest;
$resultcodest=mysqli_query($conn, $querycodest);
	?>	
<select  id = "ia_seriousness" name="ia_seriousness" style="width: 100%"  class="form-control"   onchange="javascript: upd_incident('ia_seriousness', this.options[this.selectedIndex].text, <?php echo $ia_uid ?> )" >

<?

$hssigned_id = 0;



while($rowcodest=mysqli_fetch_array($resultcodest)) { 


		?>

		<option <?php if ($rowcodest['code_value'] == $ia_seriousness){echo " selected ";} ?>
		value='<?php echo $rowcodest['code_value']?>'><?php echo $rowcodest['code_value']; ?></option> 	

<?php

}


	 
?>
</select>


		
								
															
														</div>		
																																										<div class="col-md-8 col-sm-8">
															<label>Worksafe Informed</label><br>
																												
																																				
							<label readonly class="switch switch switch-round">
		<?php if ($ia_worksafe == 1){ 
		
		?>

	<input id="ia_worksafe" type="checkbox" checked=""  onchange="javascript: upd_incident('ia_worksafe', this.checked, <?php echo $ia_uid ?> )" >
			<?php			
	
		}else{
			
			?>
			
			<input id="ia_worksafe"  type="checkbox"  onchange="javascript: upd_incident('ia_worksafe', this.checked, <?php echo $ia_uid ?> )" >
<?php

		}
		
		?>
	
	<span class="switch-label" data-on="YES" data-off="NO"></span>
	</label>


		
								
															
														</div>	

																												<div class="col-md-8 col-sm-8">
															<label>Acknowledged by (on behalf of Company)</label>
																												
															<?php
include_once("configiboss.php");
$querycodest="SELECT * from " . $_COOKIE['phxclient_id'] . "_staff order by staff_order, staff_name";
//echo $querycodest;

$resultcodest1=mysqli_query($conn, $querycodest);
	?>	
<select id = "ia_manager_ack_id" name="ia_manager_ack_id" style="width: 100%"  class="form-control"   onchange="javascript: upd_incident('ia_manager_ack_id', this.options[this.selectedIndex].value, <?php echo $ia_uid ?>)" >

<?



while($rowcodest1=mysqli_fetch_array($resultcodest1)) { 

		?>

		<option <?php if ($rowcodest1['uid_staff'] == $ia_manager_ack_id){echo " selected ";} ?>
		value='<?php echo $rowcodest1['uid_staff']?>'><?php echo $rowcodest1['staff_name']; ?></option> 	

<?php

}


	 
?>
</select>

<?php
if ($ia_manager_ack_date == ""){
	
//	echo "no date";
	
	
}else{

?>

<?php

}

?>	


		<?php
		
			


		
		?>
								
															
														</div>															
														
														
							
														
														
														
														
														
														
														<div class="col-md-8 col-sm-8">
															<label>Details </label>
												<textarea id="ia_what" class="form-control" style="width: 100%" ><?php echo $ia_what;?></textarea>
															
														</div>
														
																<div  class="col-md-8 col-sm-8" id="divgetattendanceedit">
<? include ('../../incidentlist/getattendanceedit.php'); ?>
</div>
														
																												<div class="col-md-8 col-sm-8">
															<label>Reported by  </label><br>
																		<input id="ia_reported_by_name" readonly disabled  style="width: 100%"  class="form-control" type="text" value="<?php echo htmlspecialchars($ia_reported_by_name);?>"   onchange="javascript: upd_incident('ia_reported_by_name', this.value, <?php echo $ia_uid ?> )" ><br>
<label>Reported date / time </label><br>		

<?php

if ($ia_reported_date == ""){

?>																	
																			<input id="ia_reported_date" readonly disabled style="display: inline;"  type="text" data-format="dd-mm-yyyy" data-lang="en" data-RTL="false"  value="" onchange="javascript: update_field_job('job_date_start', 'inputdate', this.value)">
	
	<?
}else{
?>		
			
																			<input id="ia_reported_date" readonly disabled style="display: inline;"  type="text" data-format="dd-mm-yyyy" data-lang="en" data-RTL="false"  value="<?php echo htmlspecialchars(date("d/m/Y H:i",$ia_reported_date))?>" onchange="javascript: update_field_job('job_date_start', 'inputdate', this.value)">



<?

}

?>

														</div>
																												<div class="col-md-8 col-sm-8">
														
<?php

							$incident_pic1 = "../images/noimage.jpg?".rand();
							$incident_pic2 = "../images/noimage.jpg?".rand();
							$incident_pic3 = "../images/noimage.jpg?".rand();

							if ($_COOKIE['phxclient_comp_status'] == "Demo"){
								$incident_pic1 = "https://Wealthhealth Customer Portal/trades/images/incident/204_incident_".$ia_uid."_1.jpg?".rand();	
								$incident_pic2 = "https://Wealthhealth Customer Portal/trades/images/incident/204_incident_".$ia_uid."_2.jpg?".rand();
								$incident_pic3 = "https://Wealthhealth Customer Portal/trades/images/incident/204_incident_".$ia_uid."_3.jpg?".rand();
							}else{
								$incident_pic1 = "https://Wealthhealth Customer Portal/trades/images/incident/".$_COOKIE['phxclient_id']."_incident_".$ia_uid."_1.jpg?".rand();
								$incident_pic2 = "https://Wealthhealth Customer Portal/trades/images/incident/".$_COOKIE['phxclient_id']."_incident_".$ia_uid."_2.jpg?".rand();
								$incident_pic3 = "https://Wealthhealth Customer Portal/trades/images/incident/".$_COOKIE['phxclient_id']."_incident_".$ia_uid."_3.jpg?".rand();

							}

?>

<h4>Incident Pictures</h4>
					<br>
					<br>
					New File to upload
					<select id="filetype_sel">
  <option selected value="Image1">Image1</option>
  <option value="Image2">Image2</option>
  <option value="Image3">Image3</option>
</select>
                    <form method='post' action='' enctype="multipart/form-data">
                        Select file : <input type='file' accept="image/*" name='file' id='file' class='form-control' ><br>
                        <input type='button' onclick="javascript: load_image_incident()" class='btn btn-info' value='Upload' id='btn_profile_pic_upload'>
                    </form>

                    <!-- Preview-->
<input id="ia_uid_sel"  type="hidden" readonly  value="<?php echo htmlspecialchars($ia_uid);?>">

   <div id='previewincident_pic1'><img src='<?php echo $incident_pic1;?>' height='200' style='display: inline-block;'></div>
   <a onclick="del_image_incident(<?php echo $ia_uid; ?>, 'Image1')">Delete Image 1</a>
   <br>
   
   <div id='previewincident_pic2'><img src='<?php echo $incident_pic2;?>' height='200' style='display: inline-block;'></div>
   <a onclick="del_image_incident(<?php echo $ia_uid; ?>, 'Image2')">Delete Image 2</a>
      <br>
   <div id='previewincident_pic3'><img src='<?php echo $incident_pic3;?>' height='200' style='display: inline-block;'></div>
    <a onclick="del_image_incident(<?php echo $ia_uid; ?>, 'Image3')">Delete Image 3</a>
      <br> 
 </div>
                    <!-- Form -->
		

                 






		


														</div>														
												
												
												

														
														
													</div>
												</div>
		





	



												</div>


											</fieldset>



										</form>
												
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
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
		<script type="text/javascript" src="../assets/js/app.js"></script>


	<!-- /modal body -->

	<div class="modal-footer"><!-- modal footer -->
		<button id="mod2close" onclick="javascript: close_form()" class="btn btn-default" data-dismiss="modal" >Close</button> 
	</div><!-- /modal footer -->
	
	
		<script>
/**
 * CKEditor 4 Configuration Documentation 
 * (http://docs.ckeditor.com/#!/guide/dev_configuration)
 *
 */

// Default CKEditor 4 Full Toolbar
//CKEDITOR.replace('fulleditor');

// In-page customized CKEditor 4 Toolbar



	if (CKEDITOR.instances['ia_what']){
		
		CKEDITOR.remove(CKEDITOR.instances['ia_what']);	
	//		 alert ("removed");
	 
	}else{
		
//	alert ("not set");	
	};

for(name in CKEDITOR.instances)
{
    CKEDITOR.instances[name].destroy(true);
}
	
CKEDITOR.replace('ia_what', {
	   height: 100,
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


				CKEDITOR.instances['ia_what'].on('blur', function(e) {
				    if (e.editor.checkDirty()) {

				//	alert("editjd1");
						
						 upd_incident('ia_what', 'ckeditor', <?php echo $ia_uid ?>);
      
	  
				//	alert("editjd2");
				}
				});

</script>

	<script>
	
	
		function close_form() {
				 
				 
				 document.getElementById("ia_title").focus();
			
				 
		}
	 	 function upd_incident(field_name, field_value, stl_id) {

	//		var sales_id =	document.getElementById("j_st_id").value;	
			
			var sales_id = 0;
			var stl_id				= document.getElementById("ia_uid222").value;
			
//			alert ("dave"+stl_id);
				
			var current_function	= "updstl";
			
			var ia_what 		= "";
			
			if (field_name == "ia_what"){
				
				var ia_what		 				= CKEDITOR.instances.ia_what.getData();
				

			
			}else if (field_name == "ia_manager_ack_id"){
				var current_function	= "updstl2";
			
			}else if (field_name == "ia_datetime"){
				var current_function	= "updstl2date";

			
			}else if (field_name == "ia_worksafe"){
			var current_function	= "updstlnum";

				var checked = document.getElementById("ia_worksafe").checked;
				
				
				if (checked == true){
					
					var field_value = 1;
				}else{
					var field_value = 0;					
				}
				
			//	alert (field_value);
				
			}
			
			
			
	//	alert (field_value);
		
			var jobfields = {};

			jobfields.sales_id	 			= sales_id;
			jobfields.stl_id	 			= stl_id;	

			jobfields.field_value	 		= field_value;	
			jobfields.field_name	 		= field_name;	
			
			jobfields.current_function 		= current_function;

//alert ("1");
			
	//		alert (JSON.stringify(jobfields));

			
			$.ajax({
				url: '../php/adddelissuecomp.php',
				type: 'post',
				async: 'false',
				data: {"jobfields" : JSON.stringify(jobfields), "ia_what" : ia_what},
				success: function(data) {

//alert (data);

					var obj = JSON.parse( data );
					var phx_result = obj.phx_result;

					if (phx_result == "successful"){
						
						if (field_name == "ia_manager_ack_id"){
									
					//				alert (obj.new_status);
									
							var e = document.getElementById("ia_status").value = obj.new_status;
//							e.options[e.selectedIndex].value = obj.new_status;
						//	var current_function	= "updstlackid";
				
						}
						
					}else{
						alert ("update failed"+data);
						
					}
	


				}
			});			
			
		//	alert (	jobfields.sales_id+jobfields.field_name+jobfields.field_type+jobfields.field_name1_db+jobfields.field_name2_db+jobfields.field_value1+jobfields.field_value2);

			
		 }
		 
			function create_incident() {
			
			var j1								=  document.getElementById('Outlet_ID');
			var outlet_id						=  j1.options[j1.selectedIndex].value;
			var outlet_name						=  j1.options[j1.selectedIndex].text;
			
		//	alert (outlet_id+outlet_name);
			

			var new_ia_title				= document.getElementById("new_ia_title").value;
			
			if (new_ia_title == ""){
				
				alert ("Please enter an Incident / Accident short title");

				return false;
			
				
			}


			var ai								=  document.getElementById('accident_incident');
			var accident_incident				=  ai.options[ai.selectedIndex].text;


	//		var type_accident								=  document.getElementById('type_accident').checked;

			
			
		//	alert (accident_incident);
			
//return false;
			


			var jobfields = {};
			
			jobfields.new_ia_title				 	= new_ia_title;	
			jobfields.accident_incident				 	= accident_incident;	
			
				$.ajax({
					url: '../php/cr8incident.php',
					type: 'post',
					data: {"jobfields" : JSON.stringify(jobfields)},
					success: function(data) {

				//		alert (data);
						

						obj = JSON.parse(data);
										
						if (obj.phx_result == ""){
							
							
							document.getElementById("ia_uid222").value = obj.new_id;
							document.getElementById("divmodalcr8").style.display="none";

							document.getElementById("divmodaledit").style.display="block";	
							
							document.getElementById("ia_title").value = obj.ia_title;

							document.getElementById("ia_reported_by_name").value = obj.ia_reported_by_name;							

							document.getElementById("ia_reported_date").value = obj.ia_reported_date;		
							
							CKEDITOR.instances["ia_what"].setData(obj.ia_what)
				//			document.getElementById("ia_what").innerHTML = obj.ia_what;	
													
				//			alert (obj.risk_b4_likelihood);

							document.getElementById("ia_time").value = obj.ia_time;
							
							document.getElementById("ia_seriousness").value = 		obj.ia_seriousness;
							
							document.getElementById("accident_incident222").value = obj.ia_type;

					//		alert (obj.ia_type);
					
							document.getElementById("ia_uid_sel").value = obj.new_id;
		
							document.getElementById("ia_what").focus();
						}else{
							alert ("Create Hazard Risk Failed " + data);
						}

				}
			});	

		
		}
		
		
		
		 	 function add_attendance(uid) {

			var sales_id =	document.getElementById("ia_uid222").value;			
			var uid					= uid;
			var current_function	= "addstl";
			
		
			var jobfields = {};

			jobfields.sales_id	 			= sales_id;
			jobfields.stl_id	 			= 0;		
			jobfields.field_name 			= "";	
			jobfields.field_value	 		= "";	
			jobfields.field_text	 		= "";				
			jobfields.current_function 		= current_function;
			jobfields.sel_uid		 		= uid;

			
	//		alert (JSON.stringify(jobfields));

			
			$.ajax({
				url: 'jobadddelattendance.php',
				type: 'post',
				async: 'false',
				data: {"jobfields" : JSON.stringify(jobfields)},
				success: function(data) {

			//		alert (data);

					
						$.ajax({
							url: '../incidentlist/getattendanceedit.php',
							type: 'post',
							async: 'false',
							data: {"st_id" : sales_id, "ia_uid2" : sales_id},	
							success: function(data) {
							
								document.getElementById('divgetattendanceedit').innerHTML = data;
					
							}
						});	
								


				}
			});			
			
		//	alert (	jobfields.sales_id+jobfields.field_name+jobfields.field_type+jobfields.field_name1_db+jobfields.field_name2_db+jobfields.field_value1+jobfields.field_value2);

			
		 }
		 
		 
 	 function del_attendance(uid) {

			var sales_id =	document.getElementById("ia_uid222").value;	
				
			var uid					= uid;
			var current_function	= "delstl";
			
		
			var jobfields = {};

			jobfields.sales_id	 			= sales_id;
			jobfields.stl_id	 			= uid;		
			jobfields.field_name 			= "";	
			jobfields.field_value	 		= "";	
			jobfields.field_text	 		= "";				
			jobfields.current_function 		= current_function;
			jobfields.sel_uid		 		= uid;

			
	//		alert (JSON.stringify(jobfields));

			
			$.ajax({
				url: 'jobadddelattendance.php',
				type: 'post',
				async: 'false',
				data: {"jobfields" : JSON.stringify(jobfields)},
				success: function(data) {

				//	alert (data);

					
						$.ajax({
							url: '../incidentlist/getattendanceedit.php',
							type: 'post',
							async: 'false',
							data: {"st_id" : uid, "ia_uid2" : sales_id},	
							success: function(data) {
							
								document.getElementById('divgetattendanceedit').innerHTML = data;
					
							}
						});	
								


				}
			});			
			
		//	alert (	jobfields.sales_id+jobfields.field_name+jobfields.field_type+jobfields.field_name1_db+jobfields.field_name2_db+jobfields.field_value1+jobfields.field_value2);

			
		 }
		 
		 
		 
 	 function upd_attendance(field_name, field_value, stl_id, field_text) {
		 
	//	 alert ("upda"+field_name+field_value+stl_id);

			var sales_id =	document.getElementById("ia_uid222").value;	
			
			var stl_id				= stl_id;
			var current_function	= "updstl";
			
			if (field_name == "ia_staff_id"){
				
				var current_function	= "updstlwho";
			
			}

			
		
			var jobfields = {};

			jobfields.sales_id	 			= sales_id;
			jobfields.stl_id	 			= stl_id;	
			jobfields.sel_uid	 			= 0;	
			
			jobfields.field_value	 		= field_value;	
			jobfields.field_name	 		= field_name;	
			jobfields.field_text	 		= field_text;	
			
			jobfields.current_function 		= current_function;

//alert ("1");
			
	//		alert (JSON.stringify(jobfields));

			
			$.ajax({
				url: 'jobadddelattendance.php',
				type: 'post',
				async: 'false',
				data: {"jobfields" : JSON.stringify(jobfields)},
				success: function(data) {

	//		alert (data);
			

					var obj = JSON.parse( data );
					var phx_result = obj.phx_result;

					if (phx_result == "successful"){
						
						$.ajax({
							url: 'getattendanceedit.php',
							type: 'post',
							async: 'false',
							data: {"st_id" : sales_id, "ia_uid2" : sales_id},	
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
		 
		 
		 				
			function load_image_incident() {		

//alert ("in load image");


				var e = document.getElementById("filetype_sel");
				var sel_file_type = e.options[e.selectedIndex].text;
			
				
				
				if (sel_file_type == "Image1"){
				document.getElementById("previewincident_pic1").innerHTML = "<span>Loading ...</span>";
				}else if (sel_file_type == "Image2"){
 					document.getElementById("previewincident_pic2").innerHTML = "<span>Loading ...</span>";
				}else if (sel_file_type == "Image3"){
 					document.getElementById("previewincident_pic3").innerHTML = "<span>Loading ...</span>";
				}
                
				var fd = new FormData();
                var files = $('#file')[0].files[0];
                fd.append('file',files);
				 
				var ia_uid = document.getElementById("ia_uid_sel").value;

				var urlpost = 'uploadincidentpic.php?ia_uid='+ia_uid+"&sel_file_type="+sel_file_type;
				
                // AJAX request
                $.ajax({
                    url: urlpost,
                    type: 'post',
                    data: fd,
                    contentType: false,
                    processData: false,
                    success: function(response){
					
				//	alert (response);
					
                        if(response != 0){
                            // Show image preview
							if (sel_file_type == "Image1"){
								document.getElementById("previewincident_pic1").innerHTML = "<img src='"+response+"'  height='200' style='display: inline-block;'>";
							}else if (sel_file_type == "Image2"){
								document.getElementById("previewincident_pic2").innerHTML = "<img src='"+response+"'  height='200' style='display: inline-block;'>";
							}else if (sel_file_type == "Image3"){
								document.getElementById("previewincident_pic3").innerHTML = "<img src='"+response+"'  height='200' style='display: inline-block;'>";
							}
						}else{
                            alert('file not uploaded'+response);
                        }
                    }
                });
				
						}
						
								
		function getQueryVariable(variable)
{
       var query = window.location.search.substring(1);
       var vars = query.split("&");
       for (var i=0;i<vars.length;i++) {
               var pair = vars[i].split("=");
               if(pair[0] == variable){return pair[1];}
       }
       return(false);
}
				
	

		
		
	function getRadioVal(form, name) {
    var val;
    // get list of radio buttons with specified name
    var radios = form.elements[name];
    
    // loop through list of radio buttons
    for (var i=0, len=radios.length; i<len; i++) {
        if ( radios[i].checked ) { // radio checked?
            val = radios[i].value; // if so, hold its value in val
            break; // and break out of for loop
        }
    }
    return val; // return value of checked radio or undefined if none checked
}


 function del_image_incident(ia_uid, image_id) {

			var ia_uid				= ia_uid;				
			var image_id			= image_id;			
			
	
			var jobfields = {};

			jobfields.ia_uid		= ia_uid;		
			jobfields.sel_file_type		= image_id;				
		//	jobfields.type	 			= type;	
			
	//		alert (JSON.stringify(jobfields));

			
			$.ajax({
				url: '../php/delimageincident.php',
				type: 'post',
				async: 'false',
				data: {"jobfields" : JSON.stringify(jobfields)},
				success: function(data) {
			//		alert ("returned"+data);
			
							if (image_id == "Image1"){
								document.getElementById("previewincident_pic1").innerHTML = "<img src='"+data+"'  height='200' style='display: inline-block;'>";
							}else if (image_id == "Image2"){
								document.getElementById("previewincident_pic2").innerHTML = "<img src='"+data+"'  height='200' style='display: inline-block;'>";
							}else if (image_id == "Image3"){
								document.getElementById("previewincident_pic3").innerHTML = "<img src='"+data+"'  height='200' style='display: inline-block;'>";
							}
					
				//	location.reload(true);
					
				//
		
				//	var obj = JSON.parse( data );
				//	var phx_result = obj.phx_result;

			//	if (phx_result == "successful"){
					
				

				
			//	}else{
			//		alert ("Update failed error details are"+data);
			//	}

				}
			});			
			

			
		 }
	</script>
	

