<?

//$action = $_GET['action'];

$phxclient_id = $_COOKIE['phxclient_id'];

$ce_staff_create = 1;
$ce_who = 1;
$ce_uid_client = 1;
$client_id = $_REQUEST['client_id'];

		include("../../php/configiboss.php");

		$sqlclient = "SELECT * FROM ".$phxclient_id."_client where uid_client = ". $client_id;
		
	//	echo $sqlclient;
		
		$resultclient = $conn->query($sqlclient);


			// output data of each row
			while($rowclient = $resultclient->fetch_assoc()) {

				$comp_name		 = $rowclient["comp_name"];
				$email_accounts	 = $rowclient["email_accounts"];
				$email			 = $rowclient["email"];
				
			}
			
			$email_len = strlen($email_accounts);
	
			if ($email_len > 1){
		
				$email_accounts = $email_accounts;
			
			}else{

				$email_accounts = $email;
	
			}
			
				
			$staff_id = $_COOKIE['phxuserid'];

//	echo "staff id is " . $staff_id;
	

	$query1 = "SELECT *  FROM " . $_COOKIE['phxclient_id'] . "_staff where uid_staff = " . $staff_id;

//echo "d2".$query1;
$result1=mysqli_query($conn, $query1);

$count = 0;

while($row1=mysqli_fetch_array($result1)) { 

	$staff_email_signature = $row1['staff_email_signature'];
	
	$body = str_replace("*hi_replace*", "Please find attached your current statement, if you are unable to open the attached file please contact the sender.<br><br> <b>Thank you for choosing</b> <span style='color: red'>Hot Copy</span><b> your business is very much appreciated.</b><br><br><br>",$staff_email_signature);

}


?>


	<div class="modal-header"><!-- modal header -->

		<h4 class="modal-title" id="myModalLabel">Email Statement


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
												<input type="hidden" id="uid_client"  value="<?php echo $client_id; ?>" class="form-control required">
		
	
																								<div class="row">
													<div class="form-group">
														<div class="row">
														<div class="col-md-10 col-sm-10">
															<label>Email To *</label>
															<input type="text" 
															id="email_to"  value="<?php echo $email_accounts;?>" class="form-control required">
															<a onclick="javascript: setemailstmtself();">Email Self</a>
														</div>
														</div>
															<div class="row">
													<div class="col-md-10 col-sm-10">
															<label>Subject *</label>
															<input type="text" id="email_subject" value="Statement for <?php echo $comp_name; ?>" class="form-control required">
														</div>
														</div>
															<div class="row">
																	<div class="col-md-10 col-sm-10">		
															<label>Message *</label>
													<textarea id="emailbody" data-height="200" data-lang="en-US"><?php echo $body;?></textarea>
										
														</div>
																		<div class="col-md-10 col-sm-10">		
															<label>Reply Receipt</label>
														<input checked="" id="replyreceiptstmt" type="checkbox">
										
														</div>													
														
														

														</div>
													</div>
												</div>
																																			<div class="row">
													<div class="form-group">
														<div class="col-md-6 col-sm-6">
														
														<?php
														
														$phxclient_comp_status = $_COOKIE['phxclient_comp_status'];
														
														if ($phxclient_comp_status == "Demo"){
															
															echo "Creating new Projects is disabled in demo mode";
															
														}else{
														?>
														
												<button type="button" onclick="javascript: emailstmt()" class="btn btn-primary">Send Email</button>
									<div id="divsendemailloading" style="display: none">

						<img style="width: 120px" src="../images/ajax-loading.gif" alt="Loading ...">

</div>
<br>
									<div id="divsendemailmessage" style="display: none">

						

</div>
														<?php
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
				<script type="text/javascript" src="../assets/plugins/jquery/jquery-ui.min.js"></script>
		<link rel="stylesheet" type="text/css" href="jquery-ui.css">
					<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>


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
CKEDITOR.replace('emailbody', {
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
