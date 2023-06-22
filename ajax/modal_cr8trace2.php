<?

$action = $_GET['action'];

$phxclient_id = $_COOKIE['phxclient_id'];

$ce_staff_create = 1;
$ce_who = 1;
$ce_uid_client = 1;

$initial_action = $action;



?>


	<div class="modal-header"><!-- modal header -->

		<h4 class="modal-title" id="myModalLabel">Contact Tracing Details


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
																																																																	<div class="col-md-8 col-sm-8">
																																									<br>
															<label>Type *</label><br>
															<?php
include_once("configiboss.php");

$querycode="SELECT * FROM " . $_COOKIE['phxclient_id'] . "_code_lookup where code_type = 'tracetype' order by code_value;";
//echo $querycode;
$resultcode=mysqli_query($conn, $querycode);
	?>																
<select id = "accident_incident" name="accident_incident" style="width: 100%"  class="form-control" >

<?

while($rowcode=mysqli_fetch_array($resultcode)) { 

		?>

		<option <?php if ($rowcode['code_value'] == "Office Visit"){echo " selected ";} ?>
		value='<?php echo $rowcode['code_pk']?>'><?php echo $rowcode['code_value']; ?></option> 	

<?php

}


	 
?>
</select>

															
														</div>
													<div class="form-group">
														<div class="col-md-8 col-sm-8">
															<label>Location *</label>
															<input tabindex="0" type="text" id="new_ia_title"   value="Main Office" class="form-control required">
														</div>

													</div>

												</div>
												<div class="row">
												
														<div class="col-md-6 col-sm-6">
														<br>
														<br>
															<button type="button" onClick="javascript: create_trace('test')" class="btn btn-primary">Create Record</button>

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
			$ia_status				 		= "Completed";

		$queryhr="SELECT * from " . $_COOKIE['phxclient_id'] . "_company_tracing where ia_uid = " . $ia_uid;
	//	echo $queryhr;
		$resulthr=mysqli_query($conn, $queryhr);

		while($rowhr=mysqli_fetch_array($resulthr)) { 

			$ia_uid		 					= $rowhr['ia_uid'];
			$ia_type	 					= $rowhr['ia_type'];
			$ia_title		 				= $rowhr['ia_title'];
			$ia_datetime		 			= strtotime($rowhr['ia_datetime']);
			$ia_time				 		= $rowhr['ia_time'];
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
																																								
															<label>Type</label><br>
															
																																													
															<?php
															
					//										echo "dave".$ia_type;
include_once("configiboss.php");

$querycode="SELECT * FROM " . $_COOKIE['phxclient_id'] . "_code_lookup where code_type = 'tracetype' order by code_value;";
//echo $querycode;
$resultcode=mysqli_query($conn, $querycode);
	?>	
<select id = "accident_incident222" name="accident_incident222" style="width: 100%"  class="form-control"   onchange="javascript: upd_incident('ia_type', this.options[this.selectedIndex].text, <?php echo $ia_uid ?> )" >

<?



//mysql_close();

$i = 0;

while($rowcode=mysqli_fetch_array($resultcode)) { 

		?>

		<option <?php if ($rowcode['code_value'] == $ia_type){echo " selected ";} ?>
		value='<?php echo $rowcode['code_pk']?>'><?php echo $rowcode['code_value']; ?></option> 	

<?php

}


	 
?>
</select>
															


															
														</div>
													
															<div class="col-md-8 col-sm-8">
															<label>Location</label>
															<input id="ia_location" style="width: 100%"  class="form-control" type="text" value="<?php echo htmlspecialchars($ia_location);?>"   onchange="javascript: upd_incident('ia_location', this.value, <?php echo $ia_uid ?> )" >
															
														</div>

														<div class="col-md-8 col-sm-8">
															<label>Date/Time Occurred </label><br>
										<input id="ia_datetime" class="form-control datepicker" style="width: 125px; display: inline;"  type="text" data-format="dd-mm-yyyy" data-lang="en" data-RTL="false"  value="<?php echo htmlspecialchars(date("d-m-Y"))?>" onchange="javascript: upd_incident('ia_datetime', this.value, <?php echo $ia_uid ?>)">

										<input id="ia_time" class="form-control" style="width: 125px; display: inline;"  type="text"   value="<?php echo htmlspecialchars($ia_time)?>" onchange="javascript: upd_incident('ia_time', this.value, <?php echo $ia_uid ?>)">
					


														</div>

	<div  class="col-md-8 col-sm-8" id="divgetattendanceedit">
<? include ('../../tracelist/gettraceedit.php'); ?>
</div>
														
																																										<div class="col-md-8 col-sm-8">
															<label>Status</label>
																												

<select  id = "ia_status" name="ia_status" style="width: 100%"  class="form-control"   onchange="javascript: upd_incident('ia_status', this.options[this.selectedIndex].text, <?php echo $ia_uid ?> )" >



		<option <?php if ("Completed" == $ia_status){echo " selected ";} ?> value='New'>Completed</option> 	
		<option <?php if ("In Progress" == $ia_status){echo " selected ";} ?> value='Open'>In Progress</option> 	


</select>


		
								
															
														</div>	
	
										
														<div class="col-md-8 col-sm-8">
															<label>Notes/Details </label>
												<textarea id="ia_what" class="form-control" style="width: 100%" ><?php echo $ia_what;?></textarea>
															
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
		<script type="text/javascript">var plugin_path = '../../assets/plugins/';</script>
		<script type="text/javascript" src="../assets/plugins/jquery/jquery-2.2.3.min.js"></script>
							<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
		<script type="text/javascript" src="../assets/js/app.js"></script>


	<!-- /modal body -->

	<div class="modal-footer"><!-- modal footer -->
		<button id="mod2close" onclick="javascript: close_form()" class="btn btn-default" data-dismiss="modal" >Close</button> 
	</div><!-- /modal footer -->
	
	<script>
	
	if (CKEDITOR.instances['ia_what']){
		
		CKEDITOR.remove(CKEDITOR.instances['ia_what']);	
	//		 alert ("removed");
	 
	}else{
		
//	alert ("not set");	
	};

	
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
	
			function create_trace(test) {
			
	//		alert ("start create");
			
	//		var j1								=  document.getElementById('Outlet_ID');
	//		var outlet_id						=  j1.options[j1.selectedIndex].value;
	//		var outlet_name						=  j1.options[j1.selectedIndex].text;
			
		//	alert (outlet_id+outlet_name);
			

			var new_ia_title				= document.getElementById("new_ia_title").value;
			
			if (new_ia_title == ""){
				
				alert ("Please enter a location");

				return false;
			
				
			}


			var ai								=  document.getElementById('accident_incident');
			var accident_incident				=  ai.options[ai.selectedIndex].text;


	//		var type_accident								=  document.getElementById('type_accident').checked;

			
			
		//	alert (accident_incident);
			
//return false;
		//	alert ("cr8trace");
			


			var jobfields = {};
			
			jobfields.new_ia_title				 	= new_ia_title;	
			jobfields.accident_incident				 	= accident_incident;	
			
				$.ajax({
					url: '../php/cr8trace.php',
					type: 'post',
					data: {"jobfields" : JSON.stringify(jobfields)},
					success: function(data) {

				//		alert (data);
						

						obj = JSON.parse(data);
										
						if (obj.phx_result == ""){
							
							
							document.getElementById("ia_uid222").value = obj.new_id;
							document.getElementById("divmodalcr8").style.display="none";

							document.getElementById("divmodaledit").style.display="block";	
							
					//		document.getElementById("ia_title").value = obj.ia_title;

							document.getElementById("ia_reported_by_name").value = obj.ia_reported_by_name;							

							document.getElementById("ia_reported_date").value = obj.ia_reported_date;		
							
				//			CKEDITOR.instances["ia_what"].setData(obj.ia_what)
				//			document.getElementById("ia_what").innerHTML = obj.ia_what;	
													
				//			alert (obj.risk_b4_likelihood);

							document.getElementById("ia_time").value = obj.ia_time;
							
				//			document.getElementById("ia_seriousness").value = 		obj.ia_seriousness;
							
						//	document.getElementById("accident_incident222").value = obj.ia_type;
							
							var davecat2 = document.getElementById("accident_incident222");
							davecat2.options[davecat2.selectedIndex].text = obj.ia_type;	

					//		alert (obj.ia_type);

							document.getElementById("ia_location").value = obj.ia_location;
							document.getElementById("ia_location").focus();
						}else{
							alert ("Create Hazard Risk Failed " + data);
						}

				}
			});	

		
		}
		
			 	 function add_trace(uid) {

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
				url: 'jobadddeltrace.php',
				type: 'post',
				async: 'false',
				data: {"jobfields" : JSON.stringify(jobfields)},
				success: function(data) {

			//		alert (data);

					
						$.ajax({
							url: '../tracelist/gettraceedit.php',
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
		 
		 
 	 function del_trace(uid) {

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
				url: 'jobadddeltrace.php',
				type: 'post',
				async: 'false',
				data: {"jobfields" : JSON.stringify(jobfields)},
				success: function(data) {

				//	alert (data);

					
						$.ajax({
							url: '../tracelist/gettraceedit.php',
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
				url: '../php/adddeltracecomp.php',
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
				url: 'jobadddeltrace.php',
				type: 'post',
				async: 'false',
				data: {"jobfields" : JSON.stringify(jobfields)},
				success: function(data) {

	//		alert (data);
			

					var obj = JSON.parse( data );
					var phx_result = obj.phx_result;

					if (phx_result == "successful"){
						
						$.ajax({
							url: 'gettraceedit.php',
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
		 


</script>

	<script>
	
	
		function close_form() {
				 
				 
//				 document.getElementById("ia_title").focus();
			
				 
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
	</script>
	

