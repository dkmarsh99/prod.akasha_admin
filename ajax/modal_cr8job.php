<style>
.ui-autocomplete {
z-index: 100;
}
</style>

<?

$action = $_GET['action'];

if (isset($_GET['uid_client'])){

	$uid_client =  $_GET['uid_client'];

}else{
	
	$uid_client = 1;
	
}


include("configiboss.php");
$query="select * from " . $_COOKIE['phxclient_id'] . "_client WHERE uid_client=" . $uid_client;
				
//echo $query;

					//		echo $sqlstaff;
					

					$resultstaff = $conn->query($query);

					if ($resultstaff->num_rows > 0) {
						// output data of each row
						while($rowstaff = $resultstaff->fetch_assoc()) {
							
							$comp_name 					= $rowstaff["comp_name"];
							
						}
						
					}

if ($uid_client == ""){
		
	$uid_client = 1;

}
$phxclient_id = $_COOKIE['phxclient_id'];

$ce_staff_create = 1;
$ce_who = 1;
$ce_uid_client = 1;


?>


	<div class="modal-header"><!-- modal header -->

		<h4 class="modal-title" id="myModalLabel">Confirm Create New Job


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
												<div  class="form-group" id="diverrmsgcr8cust" style="display: none; color: red"></div>
													<div class="form-group">
														<div class="col-md-12 col-sm-12">
															<label>Customer *</label>
															<table style="width: 100%">
															<tr>
															<td style="width: 65%">
																<input id="tagsfindcustjobedit" value="<?echo $comp_name?>" placeholder="Contact Details:" class="form-control typeahead"  value="" style="width: 100%;">
															</td>
															<td  style="width: 35%">
																<button style="width: 100%"  type="button" onclick="javascript: create_contact()" class="btn btn-primary">Create New Customer</button>
															</td>
														</tr>
														</table>														
														
														
														
														</div>
														
														<?php
																									$phxclient_type = $_COOKIE['phxclient_type'];
											
											if ($phxclient_type == "rental"){
												
												?>
													<div class="col-md-12 col-sm-12">
															<label>Venue</label>
															<table style="width: 100%">
															<tr>
															<td style="width: 65%">
																<input id="tagsfindvenuejobedit" value="" placeholder="Venue Name:" class="form-control typeahead"  value="" style="width: 100%;">
															</td>
															<td  style="width: 35%">
																<button style="width: 100%" type="button" onclick="javascript: create_venue()" class="btn btn-primary">Create New Venue</button>
															</td>
														</tr>
														</table>														
														
														
														
														</div>
														<div class="col-md-8 col-sm-8">
															<label>Event Name *</label>
															<input type="text" id="event_name"  value="" class="form-control required">
														</div>


												
												<?php
											}else{
												?>
																						
															<input type="hidden" id="event_name"  value="" class="form-control required">
												<input  type="hidden" id="tagsfindvenuejobedit" value="<?echo $comp_name?>" placeholder="Contact Details:" class="form-control typeahead"  value="" style="width: 100%;">
												
												<?php
												?>

												
												<?php
												
											}
											?>

													<div class="col-md-12 col-sm-12">
															<label>Job Description *</label>
															<textarea id="j_job_descr_edit"  data-height="50" data-lang="en-US"></textarea>
														</div>
																												<div class="col-md-8 col-sm-8">
															<label>Cust Order No</label>
															<input type="text" id="cust_order_no" value="" class="form-control required">
														</div>
													</div>
												</div>						
												<div class="row">

														<div class="col-md-8 col-sm-8">
															<label>Start Date *</label><br>
<input id="job_date_start" class="form-control datepicker" style="width: 130px; display: inline;"  type="text" data-format="dd-mm-yyyy" data-lang="en" data-RTL="false"  value="<?php echo htmlspecialchars(date("d-m-Y"))?>">
									<select id="job_time_start" style="width: 85px; display: inline;" class="form-control">
												
															<?php

$selectedTime = "0:00";

$job_time_start = "09:00";

//									echo date('h:i', $endTime);

for( $i = 0; $i<95; $i++ ) {

	$endTime = strtotime("+15 minutes", strtotime($selectedTime));

//														echo date('h:i', $endTime) . "<br>";
	if( date('H:i', $endTime) == "09:00"){
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
															<label>End Date *</label><br>
<input id="job_date_end" class="form-control datepicker" style="width: 130px; display: inline;"  type="text" data-format="dd-mm-yyyy" data-lang="en" data-RTL="false"  value="<?php echo htmlspecialchars(date("d-m-Y"))?>">
									<select id="job_time_end" style="width: 85px; display: inline;" class="form-control">
												
															<?php

$selectedTime = "0:00";

$job_time_start = "09:00";

//									echo date('h:i', $endTime);

for( $i = 0; $i<95; $i++ ) {

	$endTime = strtotime("+15 minutes", strtotime($selectedTime));

//														echo date('h:i', $endTime) . "<br>";
	if( date('H:i', $endTime) == "17:00"){
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
		
														
												</div>														
											
						
								<div class="row">
													<div class="form-group">
														<div class="col-md-4 col-sm-4">
		
														
												<button type="button" onclick="javascript: create_job()" class="btn btn-primary">Create Job</button>
											

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
										<script type="text/javascript" src="../assets/plugins/jquery/jquery-2.2.3.min.js"></script>
		<script type="text/javascript" src="../assets/plugins/jquery/jquery-ui.min.js"></script>
		<link rel="stylesheet" type="text/css" href="jquery-ui.css">
		<script type="text/javascript" src="../assets/js/app.js"></script>
   <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
   <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
								
										<link href="../assets/css/essentials.min.css" rel="stylesheet" type="text/css" />
		<link href="../assets/css/layout.css" rel="stylesheet" type="text/css" />
		<link href="../assets/css/color_scheme/green.css" rel="stylesheet" type="text/css" id="color_scheme" />
				 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /
		<!-- JAVASCRIPT FILES -->
		<script type="text/javascript">var plugin_path = '../assets/plugins/';</script>

		<script type="text/javascript" src="../assets/plugins/jquery/jquery-ui.min.js"></script>
		<link rel="stylesheet" type="text/css" href="jquery-ui.css">
			<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
		<script type="text/javascript" src="../assets/js/app.js"></script>
		 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>  
		 
		 
		 

	<!-- /modal body -->

	<div class="modal-footer"><!-- modal footer -->
		<button class="btn btn-default" data-dismiss="modal" onclick="javascript:window.location.reload()" >Close</button> 
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
CKEDITOR.replace('j_job_descr_edit', {
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


</script>

<script>



$(document).ready(function(){
 
 $('#tagsfindcustjobedit').typeahead({
  source: function(query, result)
  {
   $.ajax({
    url:"../php/ddcontact.php",
    method:"POST",
    data:{query:query},
    dataType:"json",
    success:function(data)
    {
     result($.map(data, function(item){
      return item;
     }));
    }
   })
  },
      afterSelect: function (item) {
        // do what is needed with item
        //and then, for example ,focus on some other control

   ////     var sel_item = item.substr(0,item.indexOf(' ')); // "72"

      //  alert (sel_item);

   ////     window.location.href = "../projectdetail/index.php?pcode="+sel_item;
    }
 });
  
 $('#tagsfindvenuejobedit').typeahead({
  source: function(query, result)
  {
   $.ajax({
    url:"../php/ddvenue.php",
    method:"POST",
    data:{query:query},
    dataType:"json",
    success:function(data)
    {
     result($.map(data, function(item){
      return item;
     }));
    }
   })
  },
      afterSelect: function (item) {
        // do what is needed with item
        //and then, for example ,focus on some other control

   ////     var sel_item = item.substr(0,item.indexOf(' ')); // "72"

      //  alert (sel_item);

   ////     window.location.href = "../projectdetail/index.php?pcode="+sel_item;
    }
 });
 





 
});

		function create_job() {
			
			var j1								=  document.getElementById('Outlet_ID');
			var outlet_id						=  j1.options[j1.selectedIndex].value;
			var outlet_name						=  j1.options[j1.selectedIndex].text;
			
		//	alert (outlet_id+outlet_name);
			
			var job_descr		 				= CKEDITOR.instances.j_job_descr_edit.getData();
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

</script>






