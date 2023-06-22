<?

	if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }
  
  	include("configiboss.php");


  $theValue = function_exists("mysqli_real_escape_string") ? mysqli_real_escape_string($conn, $theValue) : mysqli_escape_string($conn, $theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$get_ce_uid = $_GET['uid'];
$action = $_GET['action'];

$phxclient_id = $_COOKIE['phxclient_id'];

$ce_who_name = GetSQLValueString($_COOKIE['current_username'], "text");

$ce_staff_create = 1;
$ce_who = 1;
$ce_uid_client = 1;

if ($action == "new"){

	$pid = $_GET['pid'];


// create record and set uid

	$servername = "localhost";
	$username = "unvbpq9c3pfeh";
	$password = "m3992qn7j6sj";
	$dbname = "dbqzu8x56grjwv";


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO ".$phxclient_id."_client_events (ce_project_id, ce_uid_client, ce_status, ce_event_descr, ce_follow_notes, ce_type, ce_staff_create, ce_event_date, ce_event_time, ce_follow_date, ce_who, ce_who_name, ce_cat_id, ce_cat_name) VALUES (".$pid.",1,'Open', '','','Client',".$ce_staff_create.",Now(), Now(), DATE_ADD(NOW(), INTERVAL 7 DAY),".$ce_who.",".$ce_who_name.",0,'Select Category')";
    // use exec() because no results are returned
    $conn->exec($sql);
 //   echo "New record created successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$get_ce_uid = $conn->lastInsertId();

$conn = null;

$action = "edit";

}



		include("../../../php/configiboss.php");
											
		$sqluser = "SELECT * FROM ".$phxclient_id."_client_events where ce_uid = ".$get_ce_uid;

//		echo $sqluser;
		
		$resultuser = $conn->query($sqluser);


			// output data of each row
			while($rowcal = $resultuser->fetch_assoc()) {

				$ce_uid		  			= $rowcal["ce_uid"];
				$ce_type		  		= $rowcal["ce_type"];
				$ce_uid_client	  		= $rowcal["ce_uid_client"];
				$ce_staff_create  		= $rowcal["ce_staff_create"];
				$ce_event_date  		= $rowcal["ce_event_date"];
				
				$ce_st_id 				= $rowcal["ce_st_id"];			
				
				$ce_event_time  		= $rowcal["ce_event_time"];
				
				$ce_event_name			= $rowcal["ce_event_name"];
								
				$ce_event_descr			= $rowcal["ce_event_descr"];
				$ce_st_id		 	 	= $rowcal["ce_st_id"];
				$ce_follow_date	  		= $rowcal["ce_follow_date"];
				
				
				$ce_follow_date2 = date("d/m/Y", strtotime($ce_follow_date));			
				
				$ce_status		 	 	= $rowcal["ce_status"];
				$ce_who			 	 	= $rowcal["ce_who"];
				$ce_follow_notes 	 	= $rowcal["ce_follow_notes"];


				$ce_contact				= $rowcal["ce_contact"];
				$ce_who_name	  		= $rowcal["ce_who_name"];
				$ce_staff_create_name	= $rowcal["ce_staff_create_name"];

				$ce_last_update_by	 	= $rowcal["ce_last_update_by"];
				$ce_last_update_date 	= $rowcal["ce_last_update_date"];

				$ce_cat_id			 	= $rowcal["ce_cat_id"];
				$ce_cat_name		 	= $rowcal["ce_cat_name"];

				$ce_project_id		 	= $rowcal["ce_project_id"];

				$ce_staff_id		 	= $rowcal["ce_staff_id"];
				
				$ce_vehicle_id		 	= $rowcal["ce_vehicle_id"];

			}


?>


	<div class="modal-header"><!-- modal header -->

		<h4 class="modal-title" id="myModalLabel">Task / Alert Details


		</h4>	
			
		<ol class="breadcrumb">
		
	
						<div id="caleditbutton"
						
																		<?php
												
												
												if ($action == "view"){
														
												}else{
													echo " style='display: none' ";
												}
												
												?>
						>

						<li><a onclick="javascript: change_cal_mode('edit')">Edit</a></li>

</div>
						
				
						<div id="calviewbutton"
																		<?php
												
												
												if ($action == "view"){
																echo " style='display: none' ";
														
												}else{

												}
												
												?>
						>
						<li class="active"><a href="#"  onclick="javascript: change_cal_mode('view')">View</a></li>

						</div>
				
					

					</ol>

	</div><!-- /modal header -->

	<!-- modal body -->
	<div class="modal-body">

				<div id="content" class="padding-0">

					<div class="row">

						<div class="col-md-12">
						
							<!-- ------ -->
							<div class="panel panel-default">


								<div class="panel-body">

										<form class="validate" action="" method="post" enctype="multipart/form-data" data-success="Sent! Thank you!" data-toastr-position="top-right">
											<fieldset>
												<!-- required [php action request] -->
												<input type="hidden" name="action" value="contact_send" />
												<input type="hidden" id="current_state" name="current_state" value="view" />
																																				<div class="row">
													<div class="form-group">
																		
		<div class="col-md-6 col-sm-6">
		
	<label>Task Type *</label>
<select  <?php if ($action == "view"){ echo " disabled readonly ";}?> id="cal_type" name="cal_type" class="form-control" onchange="javascript: change_cal(<?php echo $get_ce_uid;?>,'ce_type', this.options[this.selectedIndex].value,'')" >


		<option <?php if ($ce_type == "General"){echo " selected ";} ?> value='General'>General</option> 	
		<option <?php if ($ce_type == "Staff"){echo " selected ";} ?>   value='Staff'>Staff</option> 	
		<option <?php if ($ce_type == "Vehicle"){echo " selected ";} ?>   value='Vehicle'>Vehicle</option> 	
		<option  <?php if ($ce_type == "Company"){echo " selected ";} ?>  value='Company'>Company</option> 	
		<option  <?php if ($ce_type == "Contact"){echo " selected ";} ?>  value='Contact'>Contact</option> 	
		<option  <?php if ($ce_type == "Job"){echo " selected ";} ?>  value='Job'>Job</option> 	

</select>
</div>
		<div class="col-md-6 col-sm-6">
		
		<?php
		if ($ce_type == "Staff") {
			
			$staffdisp = "display: inline";
		}else{
			$staffdisp = "display: none";
		}

			
		?>
		<div id="divselstaff" style="<?php echo $staffdisp;?>">
			<label>Staff Name</label>
															<?php
include_once("configiboss.php");

$querycodest="SELECT * from " . $_COOKIE['phxclient_id'] . "_staff order by staff_order, staff_name";
//echo $querycodest;
$resultcodest=mysqli_query($conn, $querycodest);
	?>	
<select id = "ce_staff_id" <?php if ($action == "view"){ echo " disabled readonly ";}?> name="ce_staff_id" style="width: 100%"  class="form-control"  onchange="javascript: change_cal(<?php echo $get_ce_uid;?>,'ce_staff_id', this.options[this.selectedIndex].value, this.options[this.selectedIndex].text)" >

<?



while($rowcodest=mysqli_fetch_array($resultcodest)) { 


		?>

		<option <?php if ($rowcodest['uid_staff'] == $ce_staff_id){echo " selected ";} ?>
		value='<?php echo $rowcodest['uid_staff']?>'><?php echo $rowcodest['staff_name']; ?></option> 	

<?php

}


	 
?>
</select>
</div>


		<?php
		if ($ce_type == "Vehicle") {
			$vehicledisp = "display: inline";
		}else{
			$vehicledisp = "display: none";

		}
			
		?>
		<div id="divselvehicle" style="<?php echo $vehicledisp;?>">
				<label>Vehicle</label>
															<?php
include_once("configiboss.php");

$querycodest="SELECT * from " . $_COOKIE['phxclient_id'] . "_vehicles order by vehicle_rego";
//echo $querycodest;
$resultcodest=mysqli_query($conn, $querycodest);
	?>	
<select readonly disabled id = "ce_vehicle_id" name="ce_vehicle_id" style="width: 100%"  class="form-control"  onchange="javascript: change_cal(<?php echo $get_ce_uid;?>,'ce_vehicle_id', this.options[this.selectedIndex].value, this.options[this.selectedIndex].text)" >

<?



while($rowcodest=mysqli_fetch_array($resultcodest)) { 


		?>

		<option <?php if ($rowcodest['uid_vehicle'] == $ce_vehicle_id){echo " selected ";} ?>
		value='<?php echo $rowcodest['uid_vehicle']?>'><?php echo $rowcodest['vehicle_rego'] . " " . $rowcodest['vehicle_name']; ?></option> 	

<?php

}


	 
?>
</select>
</div>

		<?php
		if ($ce_type == "Company") {
			
				$companydisp = "display: inline";
		}else{
			$companydisp = "display: none";
		}

			
		?>
		<div id="divselcompany" style="<?php echo $companydisp;?>">
				<label>My Company</label>
															<?php
include_once("configiboss.php");

$querycodest="SELECT * from " . $_COOKIE['phxclient_id'] . "_company_details order by company_name";
//echo $querycodest;
$resultcodest=mysqli_query($conn, $querycodest);
	?>	
<select readonly disabled id = "ce_comp_id" name="ce_comp_id" style="width: 100%"  class="form-control"  onchange="javascript: change_cal(<?php echo $get_ce_uid;?>,'ce_comp_id', this.options[this.selectedIndex].value, this.options[this.selectedIndex].text)" >

<?



while($rowcodest=mysqli_fetch_array($resultcodest)) { 


		?>

		<option <?php if ($rowcodest['uid_company'] == $ce_vehicle_id){echo " selected ";} ?>
		value='<?php echo $rowcodest['uid_company']?>'><?php echo $rowcodest['company_name'] ?></option> 	

<?php

}


	 
?>
</select>
</div>

		<?php
		if ($ce_type == "Contact") {
			$contactdisp = "display: inline";
		}else{
			$contactdisp = "display: none";
		}
			
		?>

		<div id="divselcontact" style="<?php echo $contactdisp;?>">
				<label>Contact</label>
															<?php
include_once("configiboss.php");

$querycodest="SELECT * from " . $_COOKIE['phxclient_id'] . "_client order by comp_name";
//echo $querycodest;
$resultcodest=mysqli_query($conn, $querycodest);
	?>	
<select readonly disabled id = "ce_uid_client" name="ce_uid_client" style="width: 100%"  class="form-control"    onchange="javascript: change_cal(<?php echo $get_ce_uid;?>,'ce_uid_client', this.options[this.selectedIndex].value, this.options[this.selectedIndex].text)"  >

<?



while($rowcodest=mysqli_fetch_array($resultcodest)) { 


		?>

		<option <?php if ($rowcodest['uid_client'] == $ce_uid_client){echo " selected ";} ?>
		value='<?php echo $rowcodest['uid_client']?>'><?php echo $rowcodest['comp_name'] ?></option> 	

<?php

}


	 
?>
</select>
</div>


		<?php
		if ($ce_type == "Job") {
			$jobdisp = "display: inline";
		}else{
			$jobdisp = "display: none";
		}
			
		?>
		<div id="divseljob" style="<?php echo $jobdisp;?>">
				<label>Job</label>
															<?php
include_once("configiboss.php");

$querycodest="SELECT st_id from " . $_COOKIE['phxclient_id'] . "_st order by st_id";
//echo $querycodest;
$resultcodest=mysqli_query($conn, $querycodest);
	?>	
<select readonly disabled id = "ce_uid_job" name="ce_uid_job" style="width: 100%"  class="form-control"    onchange="javascript: change_cal(<?php echo $get_ce_uid;?>,'ce_uid_job', this.options[this.selectedIndex].value)"  >

<?



while($rowcodest=mysqli_fetch_array($resultcodest)) { 


		?>

		<option <?php if ($rowcodest['st_id'] == $ce_uid_client){echo " selected ";} ?>
		value='<?php echo $rowcodest['st_id']?>'><?php echo $rowcodest['st_id'] ?></option> 	

<?php

}


	 
?>
</select>
</div>

</div>
</div>
		</div>
				<div class="row">

												
												</div>
												
																								<div class="row">
													<div class="form-group">
														<div class="col-md-12 col-sm-12">
															<label>Task Title *</label>
															<input type="text" <?php if ($action == "view"){echo " readonly ";}?>
															id="ce_event_descr" name="contact[first_name]" onchange="javascript: change_cal(<?php echo $get_ce_uid;?>,'ce_event_descr',this.value)" value="<?php echo htmlspecialchars($ce_event_descr)?>" class="form-control required">
														</div>
													</div>
												</div>
												<div class="row">

							


												</div>



												<div class="row">
													<div class="form-group">
													
													<?php
													if ($action == "view"){
														
														$statusstyle = " readonly disabled ";
													
													}else{

														$statusstyle = " ";
														
														}
														
														?>

													<div id="diveventstatus" class="col-md-4 col-sm-4">
															<label>Event Status:</label>
															<select id="eventstatus" <?php echo $statusstyle?> name="contact[position]" class="form-control pointer required"   onchange="javascript: change_cal(<?php echo $get_ce_uid;?>,'ce_status',this.options[this.selectedIndex].value)">
																<?php
																?>
																<option	<?php if ($ce_status == 'Open') { echo " selected ";} ?> value="Open">Open</option>
																<option	<?php if ($ce_status == 'Closed') { echo " selected ";} ?> value="Closed">Closed</option>

															</select>
														</div>
													
													<div class="col-md-4 col-sm-4">
													<label>Follow up date *</label>
													<input type="text" readonly id="ce_follow_date" name="contact[start_date]" value="<?php echo $ce_follow_date2;?>" class="form-control datepicker required" data-format="dd-mm-yyyy" data-lang="en" data-RTL="false"  onchange="javascript: change_cal(<?php echo $get_ce_uid;?>,'ce_follow_date',this.value)">
													</div>
													
																										<?php
													if ($action == "view"){
														
														$whostyle = " readonly disabled ";
													
													}else{

														$whostyle = " ";
														
														}
														
														?>

															
														<div   id="eventwhoedit" class="col-md-4 col-sm-4">
															<label>Follow Up Who:</label>
															<select id="calfollowwho" <?php echo $whostyle?> name="contact[position]" class="form-control pointer required"  onchange="javascript: change_cal(<?php echo $get_ce_uid;?>,'ce_who',this.options[this.selectedIndex].value,this.options[this.selectedIndex].text)">
																<option selected value="0">--- Select ---</option>
																<?php
													
		$phxclient_id = $_COOKIE['phxclient_id'];

		include("../../../php/configiboss.php");
											
		$sqlstaff = "SELECT * FROM ".$phxclient_id."_staff order by staff_name";

//		echo $sqluser;
		
		$resultstaff = $conn->query($sqlstaff);


			// output data of each row
			while($rowstaff = $resultstaff->fetch_assoc()) {

				$uid_staff		  	= $rowstaff["uid_staff"];
				$staff_name 		= $rowstaff["staff_name"];



			if ($uid_staff == $ce_who){

?>
		<option selected value='<?php echo $uid_staff;?>'><?php echo htmlspecialchars($staff_name) ?></option>;

<?php
			}else{
				?>
		<option value='<?php echo $uid_staff;?>'><?php echo htmlspecialchars($staff_name) ?></option>;

<?php		
		}


			}

			?>
															</select>
														</div>

													</div>
												</div>
														<div class="row">
													<div class="form-group">
													
																				<?php
													if ($action == "view") {
														
														$cat_disp = " disabled readonly ";
													}else{
													
														$cat_disp = " ";
													}
?>

														<div id="eventcategoryedit" class="col-md-4 col-sm-4">
																												
															<label>Category:</label>
															<select id="calcat" <?php echo $cat_disp?> name="contact[position]" class="form-control pointer required"  onchange="javascript: change_cal(<?php echo $get_ce_uid;?>,'ce_cat_id',this.options[this.selectedIndex].value,this.options[this.selectedIndex].text)">
																<option selected value="0">--- Select ---</option>
																<?php

		$phxclient_id = $_COOKIE['phxclient_id'];

		include("../../../php/configiboss.php");
											
		$sqlecode = "SELECT * FROM ".$phxclient_id."_catcode_events order by lu_code_descr";

		echo $sqluser;
		
		$resultecode = $conn->query($sqlecode);


			// output data of each row
			while($rowecode = $resultecode->fetch_assoc()) {

				$lu_prodcat_id		  	= $rowecode["lu_prodcat_id"];
				$lu_code_descr 			= $rowecode["lu_code_descr"];

			if ($lu_prodcat_id == $ce_cat_id){

?>
		<option selected value='<?php echo $lu_prodcat_id;?>'><?php echo htmlspecialchars($lu_code_descr) ?></option>;


<?php
			}else{
				?>
		<option value='<?php echo $lu_prodcat_id;?>'><?php echo htmlspecialchars($lu_code_descr) ?></option>;


<?php		
		}



			}

			?>
															</select>
														</div>

										

	
													</div>
												</div>

		<div class="row">
			<div class="form-group">
				<div class="col-md-12 col-sm-12">
					<label>Event Details</label>
					<textarea onchange="javascript: change_cal(<?php echo $get_ce_uid;?>,'ce_follow_notes',this.value,)"  
					<?php
															if ($action == "view"){echo " readonly ";}
															?>
					id="ce_follow_notes" name="contact[experience]" rows="6" class="form-control required"><?php echo htmlspecialchars(trim($ce_follow_notes))?></textarea>
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
