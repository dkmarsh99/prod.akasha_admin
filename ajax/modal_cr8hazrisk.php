<?

$action = $_GET['action'];

$phxclient_id = $_COOKIE['phxclient_id'];

$ce_staff_create = 1;
$ce_who = 1;
$ce_uid_client = 1;

$initial_action = $action;



?>


	<div class="modal-header"><!-- modal header -->

		<h4 class="modal-title" id="myModalLabel">Hazard or Risk Details


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
															<label>Hazard/Risk Name *</label>
															<input tabindex="0" type="text" id="new_hazrisk_name"   value="" class="form-control required">
														</div>

													</div>
												</div>
												<div class="row">
													<div class="form-group">
														<div class="col-md-6 col-sm-6">
														
															<button type="button" onclick="javascript: create_hazrisk()" class="btn btn-primary">Create</button>

														</div>

													</div>
												</div>
												
												
												
												</div>
												
												<?php
												
												$action = $_GET['action'];

$phxclient_id = $_COOKIE['phxclient_id'];

	
	include_once("configiboss.php");

	
	$hr_uid = $_REQUEST['hr_uid'];
	
	$risk_b4_severity 			= "None";
	$risk_b4_likelihood 		= "None";
	$risk_afta_severity 		= "None";
	$risk_afta_likelihood 		= "None";
	$risk_control1 				= "";	
	$risk_name	 				= "";	
	$risk_manager_ack_id	 	= 0;		
	$risk_manager_ack_name	 	= "Unassigned";		
	$risk_manager_ack_date	 	= "";
	$risk_status				= "New";
	
//$hr_uid = 1;

		$queryhr="SELECT * from " . $_COOKIE['phxclient_id'] . "_company_hazrisk where hr_uid = " . $hr_uid;
	//	echo $queryhr;
		$resulthr=mysqli_query($conn, $queryhr);

		while($rowhr=mysqli_fetch_array($resulthr)) { 

			$hr_uid		 					= $rowhr['hr_uid'];
			$risk_name	 					= $rowhr['risk_name'];
			$risk_descr		 				= $rowhr['risk_descr'];
			$risk_b4_severity		 		= $rowhr['risk_b4_severity'];
			$risk_b4_likelihood		 		= $rowhr['risk_b4_likelihood'];
			$risk_afta_severity		 		= $rowhr['risk_afta_severity'];
			$risk_afta_likelihood			= $rowhr['risk_afta_likelihood'];			
			$risk_control1		 			= $rowhr['risk_control1'];
			$risk_control2		 			= $rowhr['risk_control2'];
			$risk_control3		 			= $rowhr['risk_control3'];
			$risk_control4		 			= $rowhr['risk_control4'];
			$risk_control5		 			= $rowhr['risk_control5'];		
			$risk_status		 			= $rowhr['risk_status'];	
			
			$risk_manager_ack_id		 	= $rowhr['risk_manager_ack_id'];		
			$risk_manager_ack_name		 	= $rowhr['risk_manager_ack_name'];		
			$risk_manager_ack_date		 	= strtotime($rowhr['risk_manager_ack_date']);

		}			
			
			?>
			
			
												
												<div id="divmodaledit" style="<?php echo $edit_disp;?>">
																		<div id ="errmsgedit"></div>

										<form class="validate" action="" method="post" enctype="multipart/form-data">
											<fieldset>
												<!-- required [php action request] -->
												<input type="hidden" name="action" value="contact_send" />
												<input type="hidden" id="current_state" name="current_state" value="<?php echo $action ?>" />
												<input type="hidden" id="hr_uid222" name="hr_uid222" value="<?php echo $hr_uid ?>" />
																								<div class="row">
													<div class="form-group">
													
														<div class="col-md-8 col-sm-8">
															<label>Hazard/Risk Name *</label>
															<input id="risk_name" style="width: 100%"  class="form-control" type="text" value="<?php echo htmlspecialchars($risk_name);?>"   onchange="javascript: upd_haz_risk('risk_name', this.value, <?php echo $hr_uid ?> )" >
															
														</div>
														<div class="col-md-8 col-sm-8">
															<label>Control/Mitigation </label>
												<textarea id="risk_control1" class="form-control" style="width: 100%" ><?php echo htmlspecialchars($risk_control1);?></textarea>
															
														</div>
<div class="col-md-8 col-sm-8">
															<label>Status</label>
																												

<select  id = "risk_status" name="risk_status" style="width: 100%"  class="form-control"   onchange="javascript: upd_haz_risk('risk_status', this.options[this.selectedIndex].text, <?php echo $hr_uid ?> )" >



		<option <?php if ("New" == $risk_status){echo " selected ";} ?> value='New'>New</option> 	
		<option <?php if ("Open" == $risk_status){echo " selected ";} ?> value='Open'>Open</option> 	
		<option <?php if ("Closed" == $risk_status){echo " selected ";} ?> value='Closed'>Closed</option> 	


</select>


		
								
															
														</div>
																												<div class="col-md-8 col-sm-8">
															<label>Likelihood before Mitigation</label>
															
																														<?php
include_once("configiboss.php");

$querycodest="SELECT * from " . $_COOKIE['phxclient_id'] . "_code_lookup where code_type = 'risklikelihood' order by  code_additional";
//echo $querycodest;
$resultcodest=mysqli_query($conn, $querycodest);
	?>	
<select  id = "risk_b4_likelihood" name="risk_b4_likelihood" style="width: 100%"  class="form-control"   onchange="javascript: upd_haz_risk('risk_b4_likelihood', this.options[this.selectedIndex].text, <?php echo $hr_uid ?> )" >

<?

$hssigned_id = 0;



while($rowcodest=mysqli_fetch_array($resultcodest)) { 


		?>

		<option <?php if ($rowcodest['code_value'] == $risk_b4_likelihood){echo " selected ";} ?>
		value='<?php echo $rowcodest['code_value']?>'><?php echo $rowcodest['code_value']; ?></option> 	

<?php

}


	 
?>
</select>

															
														</div>
														
																													<div class="col-md-8 col-sm-8">
															<label>Risk level before Mitigation </label>
															
																							<?php
include_once("configiboss.php");

$querycodest="SELECT * from " . $_COOKIE['phxclient_id'] . "_code_lookup where code_type = 'riskseverity' order by  code_additional";
//echo $querycodest;
$resultcodest=mysqli_query($conn, $querycodest);
	?>	
<select  id = "risk_b4_severity" name="risk_b4_severity" style="width: 100%"  class="form-control"   onchange="javascript: upd_haz_risk('risk_b4_severity', this.options[this.selectedIndex].text, <?php echo $hr_uid ?> )" >

<?

$hssigned_id = 0;



while($rowcodest=mysqli_fetch_array($resultcodest)) { 


		?>

		<option <?php if ($rowcodest['code_value'] == $risk_b4_severity){echo " selected ";} ?>
		value='<?php echo $rowcodest['code_value']?>'><?php echo $rowcodest['code_value']; ?></option> 	

<?php

}


	 
?>
</select>


				



															
														</div>													
																														<div class="col-md-8 col-sm-8">
															<label>Likelihood after Mitigation  </label>
															
																			<?php
include_once("configiboss.php");

$querycodest="SELECT * from " . $_COOKIE['phxclient_id'] . "_code_lookup where code_type = 'risklikelihood' order by  code_additional";
//echo $querycodest;
$resultcodest=mysqli_query($conn, $querycodest);
	?>	
<select  id = "risk_afta_likelihood" name="risk_afta_likelihood" style="width: 100%"  class="form-control"  onchange="javascript: upd_haz_risk('risk_afta_likelihood', this.options[this.selectedIndex].text, <?php echo $hr_uid ?> )" >

<?

$hssigned_id = 0;



while($rowcodest=mysqli_fetch_array($resultcodest)) { 


		?>

		<option <?php if ($rowcodest['code_value'] == $risk_afta_likelihood){echo " selected ";} ?>
		value='<?php echo $rowcodest['code_value']?>'><?php echo $rowcodest['code_value']; ?></option> 	

<?php

}


	 
?>
</select>


															
														</div>		

																														<div class="col-md-8 col-sm-8">
															<label>Risk level after Mitigation</label>
																							<?php
include_once("configiboss.php");

$querycodest="SELECT * from " . $_COOKIE['phxclient_id'] . "_code_lookup where code_type = 'riskseverity' order by  code_additional";
//echo $querycodest;
$resultcodest=mysqli_query($conn, $querycodest);
	?>	
<select  id = "risk_afta_severity" name="risk_afta_severity" style="width: 100%"  class="form-control"   onchange="javascript: upd_haz_risk('risk_afta_severity', this.options[this.selectedIndex].text, <?php echo $hr_uid ?> )" >

<?

$hssigned_id = 0;



while($rowcodest=mysqli_fetch_array($resultcodest)) { 


		?>

		<option <?php if ($rowcodest['code_value'] == $risk_afta_severity){echo " selected ";} ?>
		value='<?php echo $rowcodest['code_value']?>'><?php echo $rowcodest['code_value']; ?></option> 	

<?php

}


	 
?>
</select>


			


															
														</div>	
																												<div class="col-md-8 col-sm-8">
															<label>Acknowledged by (Manager)</label>
																												
															<?php
include_once("configiboss.php");
$querycodest="SELECT * from " . $_COOKIE['phxclient_id'] . "_staff order by staff_order, staff_name";
//echo $querycodest;

$resultcodest1=mysqli_query($conn, $querycodest);
	?>	
<select id = "risk_manager_ack_id" name="risk_manager_ack_id" style="width: 100%"  class="form-control"   onchange="javascript: upd_haz_risk('risk_manager_ack_id', this.options[this.selectedIndex].value, <?php echo $hr_uid ?>)" >

<?



while($rowcodest1=mysqli_fetch_array($resultcodest1)) { 

		?>

		<option <?php if ($rowcodest1['uid_staff'] == $risk_manager_ack_id){echo " selected ";} ?>
		value='<?php echo $rowcodest1['uid_staff']?>'><?php echo $rowcodest1['staff_name']; ?></option> 	

<?php

}


	 
?>
</select>

<?php
if ($risk_manager_ack_date == ""){
	
//	echo "no date";
	
	
}else{

?>

<label>Reported date / time </label><br>																			
																			<input id="risk_reported_date" readonly disabled style="width: 125px; display: inline;"  type="text" data-format="dd-mm-yyyy" data-lang="en" data-RTL="false"  value="<?php echo htmlspecialchars(date("d/m/Y H:i",$risk_manager_ack_date))?>">
<?php

}

?>	


		<?php
		
			


		
		?>
								
															
														</div>															
														
													</div>
																																									<div class="col-md-8 col-sm-8">
														
<?php

							$hazard_pic1 = "../images/noimage.jpg?".rand();
							$hazard_pic2 = "../images/noimage.jpg?".rand();
							$hazard_pic3 = "../images/noimage.jpg?".rand();

							if ($_COOKIE['phxclient_comp_status'] == "Demo"){
								$hazard_pic1 = "https://Wealthhealth Customer Portal/trades/images/hazard/204_hazard_".$hr_uid."_1.jpg?".rand();	
								$hazard_pic2 = "https://Wealthhealth Customer Portal/trades/images/hazard/204_hazard_".$hr_uid."_2.jpg?".rand();
								$hazard_pic3 = "https://Wealthhealth Customer Portal/trades/images/hazard/204_hazard_".$hr_uid."_3.jpg?".rand();
							}else{
								$hazard_pic1 = "https://Wealthhealth Customer Portal/trades/images/hazard/".$_COOKIE['phxclient_id']."_hazard_".$hr_uid."_1.jpg?".rand();
								$hazard_pic2 = "https://Wealthhealth Customer Portal/trades/images/hazard/".$_COOKIE['phxclient_id']."_hazard_".$hr_uid."_2.jpg?".rand();
								$hazard_pic3 = "https://Wealthhealth Customer Portal/trades/images/hazard/".$_COOKIE['phxclient_id']."_hazard_".$hr_uid."_3.jpg?".rand();

							}

?>

<h4>Hazard Pictures</h4>
	
					New File to upload
					<select id="filetype_sel">
  <option selected value="Image1">Image1</option>
  <option value="Image2">Image2</option>
  <option value="Image3">Image3</option>
</select>
                    <form method='post' action='' enctype="multipart/form-data">
                        Select file : <input type='file' accept="image/*" name='file' id='file' class='form-control' ><br>
                        <input type='button' onclick="javascript: load_image_hazard()" class='btn btn-info' value='Upload' id='btn_profile_pic_upload'>
                    </form>

                    <!-- Preview-->
<input id="hr_uid_sel"  type="hidden" readonly  value="<?php echo htmlspecialchars($hr_uid);?>">

   <div id='previewhazard_pic1'><img src='<?php echo $hazard_pic1;?>' height='200' style='display: inline-block;'></div>
   <a onclick="del_image_hazard(<?php echo $hr_uid; ?>, 'Image1')">Delete Image 1</a>
   <br>
   
   <div id='previewhazard_pic2'><img src='<?php echo $hazard_pic2;?>' height='200' style='display: inline-block;'></div>
   <a onclick="del_image_hazard(<?php echo $hr_uid; ?>, 'Image2')">Delete Image 2</a>
      <br>
   <div id='previewhazard_pic3'><img src='<?php echo $hazard_pic3;?>' height='200' style='display: inline-block;'></div>
    <a onclick="del_image_hazard(<?php echo $hr_uid; ?>, 'Image3')">Delete Image 3</a>
      <br> 
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
		<script type="text/javascript" src="../assets/js/app.js"></script>
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

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


	if (CKEDITOR.instances['risk_control1']){
		
		CKEDITOR.remove(CKEDITOR.instances['risk_control1']);	
			// alert ("removed");
	 
	};




CKEDITOR.replace('risk_control1', {
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


				CKEDITOR.instances['risk_control1'].on('blur', function(e) {
				    if (e.editor.checkDirty()) {

				//	alert("editjd1");
						
						 upd_haz_risk('risk_control1', 'ckeditor', <?php echo $hr_uid ?>);
      
				//	alert("editjd2");
				}
				});

</script>

	<script>
	
	
		function close_form() {
				 
				 
				 document.getElementById("risk_name").focus();
			
				 
		}
	 	 function upd_haz_risk(field_name, field_value, stl_id) {

	//		var sales_id =	document.getElementById("j_st_id").value;	
			
			var sales_id = 0;
			var stl_id				= document.getElementById("hr_uid222").value;
			
//			alert ("dave"+stl_id);
				
			var current_function	= "updstl";
			
			var risk_control1 		= "";
			
			if (field_name == "risk_control1"){
				
				var risk_control1		 				= CKEDITOR.instances.risk_control1.getData();
				
			}

			
			if (field_name == "risk_manager_ack_id"){
				
				var current_function	= "updstlackid";
				
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
				url: '../php/adddelhazriskcomp.php',
				type: 'post',
				async: 'false',
				data: {"jobfields" : JSON.stringify(jobfields), "risk_control1" : risk_control1},
				success: function(data) {

//alert (data);

					var obj = JSON.parse( data );
					var phx_result = obj.phx_result;

					if (phx_result == "successful"){
						
									
						if (field_name == "risk_manager_ack_id"){
									
					//				alert (obj.new_status);
									
							var e = document.getElementById("risk_status").value = obj.new_status;
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
		 
			function create_hazrisk() {
			
			var j1								=  document.getElementById('Outlet_ID');
			var outlet_id						=  j1.options[j1.selectedIndex].value;
			var outlet_name						=  j1.options[j1.selectedIndex].text;
			
		//	alert (outlet_id+outlet_name);
			

			var new_hazrisk_name				= document.getElementById("new_hazrisk_name").value;
			
			if (new_hazrisk_name == ""){
				
			alert ("Please enter a Hazard / Risk name");

return false;
			
				
			}

		//	alert ("1");

			
	//		alert ("create job"+reportemailmessage+tagsfindcustjobedit+cust_order_no+job_date_start);
			
//alert (job_descr+"hello");

			var jobfields = {};
			
			jobfields.new_hazrisk_name				 	= new_hazrisk_name;	

			
				$.ajax({
					url: '../php/cr8hazrisk.php',
					type: 'post',
					data: {"jobfields" : JSON.stringify(jobfields)},
					success: function(data) {

				//		alert (data);
						

						obj = JSON.parse(data);
										
						if (obj.phx_result == ""){
							
							
							document.getElementById("hr_uid222").value = obj.new_id;
							document.getElementById("divmodalcr8").style.display="none";

							document.getElementById("divmodaledit").style.display="block";	
							
							document.getElementById("risk_name").value = obj.risk_name;	
							
							CKEDITOR.instances["risk_control1"].setData(obj.risk_control1)
				//			document.getElementById("risk_control1").innerHTML = obj.risk_control1;	
													
				//			alert (obj.risk_b4_likelihood);
							
							var e = document.getElementById("risk_b4_likelihood");
							e.options[e.selectedIndex].value = obj.risk_b4_likelihood;
							
							var e = document.getElementById("risk_b4_severity");
							e.options[e.selectedIndex].value = obj.risk_b4_severity;
							
							var e = document.getElementById("risk_afta_likelihood");
							e.options[e.selectedIndex].value = obj.risk_afta_likelihood;
							
							var e = document.getElementById("risk_afta_severity");
							e.options[e.selectedIndex].value = obj.risk_afta_severity;
							
							var e = document.getElementById("risk_status");
							e.options[e.selectedIndex].value = obj.risk_status;
							
							document.getElementById("hr_uid_sel").value = obj.new_id;
							
							
				//			alert (obj.risk_manager_ack_id);
							
							var e = document.getElementById("risk_manager_ack_id");
							e.options[e.selectedIndex].value = obj.risk_manager_ack_id;
							
				//			alert ("done");
							
							document.getElementById("risk_control1").focus();
						}else{
							alert ("Create Hazard Risk Failed " + data);
						}

				}
			});	

		
		}
		
		
				 				
			function load_image_hazard() {		

//alert ("in load image");


				var e = document.getElementById("filetype_sel");
				var sel_file_type = e.options[e.selectedIndex].text;
			
				
				
				if (sel_file_type == "Image1"){
				document.getElementById("previewhazard_pic1").innerHTML = "<span>Loading ...</span>";
				}else if (sel_file_type == "Image2"){
 					document.getElementById("previewhazard_pic2").innerHTML = "<span>Loading ...</span>";
				}else if (sel_file_type == "Image3"){
 					document.getElementById("previewhazard_pic3").innerHTML = "<span>Loading ...</span>";
				}
                
				var fd = new FormData();
                var files = $('#file')[0].files[0];
                fd.append('file',files);
				 
				var hr_uid = document.getElementById("hr_uid_sel").value;

				var urlpost = 'uploadhazardpic.php?hr_uid='+hr_uid+"&sel_file_type="+sel_file_type;
				
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
								document.getElementById("previewhazard_pic1").innerHTML = "<img src='"+response+"' height='200' style='display: inline-block;'>";
							}else if (sel_file_type == "Image2"){
								document.getElementById("previewhazard_pic2").innerHTML = "<img src='"+response+"' height='200' style='display: inline-block;'>";
							}else if (sel_file_type == "Image3"){
								document.getElementById("previewhazard_pic3").innerHTML = "<img src='"+response+"' height='200' style='display: inline-block;'>";
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
				
	
 function del_image_hazard(hr_uid, image_id) {
	 
	//	alert ("started del");
		

			var hr_uid				= hr_uid;				
			var image_id			= image_id;			
			
	
			var jobfields = {};

			jobfields.hr_uid		= hr_uid;		
			jobfields.sel_file_type		= image_id;				
		//	jobfields.type	 			= type;	
			
	//		alert (JSON.stringify(jobfields));

			
			$.ajax({
				url: '../php/delimagehazard.php',
				type: 'post',
				async: 'false',
				data: {"jobfields" : JSON.stringify(jobfields)},
				success: function(data) {
				//	alert ("returned"+data);
			
							if (image_id == "Image1"){
								document.getElementById("previewhazard_pic1").innerHTML = "<img src='"+data+"'  height='200' style='display: inline-block;'>";
							}else if (image_id == "Image2"){
								document.getElementById("previewhazard_pic2").innerHTML = "<img src='"+data+"'  height='200' style='display: inline-block;'>";
							}else if (image_id == "Image3"){
								document.getElementById("previewhazard_pic3").innerHTML = "<img src='"+data+"'  height='200' style='display: inline-block;'>";
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
	

