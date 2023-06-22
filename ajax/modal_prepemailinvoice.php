<?

//$action = $_GET['action'];

$phxclient_id = $_COOKIE['phxclient_id'];

$ce_staff_create = 1;
$ce_who = 1;
$ce_uid_client = 1;
$st_id = $_REQUEST['sales_id'];
$inv_id = $_REQUEST['inv_id'];


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

	
		if ($job_uid_contact == 0 ){

		$sqlclient = "SELECT * FROM ".$phxclient_id."_client where uid_client = ". $uid_client;
		
	//	echo $sqluser;
		
		$resultclient = $conn->query($sqlclient);


			// output data of each row
			while($rowclient = $resultclient->fetch_assoc()) {

				$email = $rowclient["email"];
				
				//dave
					$cont_name		 = $rowclient['cont_name'];
					$email_accounts	 = $rowclient['email_accounts'];
					$email			 = $rowclient['email'];
	
					$email_len = strlen($email_accounts);
	
					if ($email_len > 1){
		
						$email_accounts = $email_accounts;
			
					}else{

						$email_accounts = $email;
	
					}
	
					$arr = explode(' ',trim($cont_name));
				//	echo $arr[0]; // will print Test

					$cont_name = $arr[0];
				
				//dave
				

			}
			
		}else{
			
			
		$sqlclientc = "SELECT * FROM ".$phxclient_id."_client_contacts where uid_client = ". $uid_client . " and con_uid = ". $job_uid_contact;
		
	//	echo $sqluser;
		
		$resultclientc = $conn->query($sqlclientc);


			// output data of each row
			while($rowclientc = $resultclientc->fetch_assoc()) {

				$email = $rowclientc["contact_email"];
				
				//dave

					$cont_name		 = $rowclientc['contact_name'];
					$email_accounts	 = $rowclientc['contact_email_acct'];
					$email			 = $rowclientc['contact_email'];
	
					$email_len = strlen($email_accounts);
	
					if ($email_len > 1){
		
						$email_accounts = $email_accounts;
			
					}else{

						$email_accounts = $email;
	
					}
	
					$arr = explode(' ',trim($cont_name));
				//	echo $arr[0]; // will print Test

					$cont_name = $arr[0];
				
				//dave
				

			}
			
			
			
		}
			
				
	$staff_id = $_COOKIE['phxuserid'];
	
	$staff_email_signature = "";

//	echo "staff id is " . $staff_id;
	

	$query1 = "SELECT *  FROM " . $_COOKIE['phxclient_id'] . "_staff where uid_staff = " . $staff_id;

//echo "d2".$query1;
$result1=mysqli_query($conn, $query1);

$count = 0;

while($row1=mysqli_fetch_array($result1)) { 

	$staff_email_signature = $row1['staff_email_signature_new'];
}


//$cont_name = "david";

if ($_COOKIE["phxclient_id"] == "91"){

$quote_message2 = "Hi, ".$cont_name. "<br><br>Please find attached your invoice for the recent copy job we did for you. If you are unable to open the attached file please contact the sender.<br><br><b>Thank you for choosing </b> <span style='color: red'><b>Hot Copy</b></span><b> your business is very much appreciated.</b><br><br>";

}else{

$quote_message2 = "Hi, ".$cont_name. "<br><br>Please find attached your invoice for the recent copy job we did for you. If you are unable to open the attached file please contact the sender.<br><br><b>Thank you your business is very much appreciated.</b><br><br>";
	
}

$quote_full_message = $quote_message2 . $staff_email_signature;

?>


	<div class="modal-header"><!-- modal header -->

		<h4 class="modal-title" id="myModalLabel">Send Invoice Email - <?php echo $comp_name ?>


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
												
																								<div class="row">
													<div class="form-group">
														<div class="row">
														<div class="col-md-10 col-sm-10">
															<label>Email To *</label>
															<input type="text" 
															id="email_to" name="contact[first_name]"  value="<?php echo $email;?>" class="form-control required"><a style='text-align:left; visibility: visible; text-decoration: underline;' id='emailquoteshow' onclick='javascript: setemailquoteself();'>Self</a>
														</div>
														</div>
															<div class="row">
													<div class="col-md-10 col-sm-10">
															<label>Subject *</label>
															<input type="text" 
															id="email_subject" name="contact[first_name]" value="Invoice" class="form-control required">
														</div>
														</div>
															<div class="row">
																	<div class="col-md-10 col-sm-10">		
															<label>Message *</label>
													<textarea id="email_body" data-height="200" data-lang="en-US"> <?php echo $quote_full_message; ?></textarea>
										
														</div>
														</div>
														
															<div class="row">
																	<div class="col-md-10 col-sm-10">		

																Auto Print: <input checked id="autoprintquote" type="checkbox">   Reply Receipt: <input checked id="replyreceipt" type="checkbox">
														</div>
														</div>														
														
								
														
														
													</div>
												</div>
																																			<div class="row">
													<div class="form-group">
														<div class="col-md-4 col-sm-4">
														
														<?php
														
														$phxclient_comp_status = $_COOKIE['phxclient_comp_status'];
														
														if ($phxclient_comp_status == "Demo"){
															
															echo "Sending Emails is disabled in demo mode <br>";
															
															?>

												<button  disabled readonly type="button" onclick="javascript: emailinvoice(<?php echo $st_id?>,<?php echo $inv_id?>)" class="btn btn-primary">Send Email</button>
														<?php
															
														}else{
														?>
														
												<button type="button" onclick="javascript: emailinvoice(<?php echo $st_id?>,<?php echo $inv_id?>)" class="btn btn-primary">Send Email</button>
											
												

														<?php
														}
?>														

													</div>

													</div>
												</div>
														<div class="row" id="divcustballoading" style="display: none">
													<div class="form-group">
														<div class="col-md-4 col-sm-4">
																				<img style="width: 120px; display: block" src="../../trades/images/ajax-loading.gif" alt="Loading ...">

</div>
</div>
</div>
														<div class="row">
													<div class="form-group">
	<div style="display: none" id="div_phx_message"></div>
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
		<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>


<script>

function check_changestatus(status){
	
	var job_status = status;
		
							if (job_status == "Quote Draft"|| job_status == "Quote Sent" || job_status == "Work Schd" || job_status == "Invoice Draft" || job_status == "Quote Decl" || job_status == "Work Comp"){
				
				$("#butchangejobstatus").click();
				


			}

//		alert (status);
	
	
}


function emailinvoice(st_id, inv_id){
	
//	alert ("emailquote"+st_id);
	
//	return false;

		document.getElementById("divcustballoading").style.display="block";
		document.getElementById("div_phx_message").innerHTML = "";

			var job_status			= document.getElementById("j_job_status1").value;

			var sales_id			= document.getElementById("j_st_id").value;

			var autoprintquote		= document.getElementById("autoprintquote").checked;
			
			var replyreceipt 		= document.getElementById("replyreceipt").checked;
			
		//	alert (auto_print);
		
	//	alert ("2");
		
			
	//		return false;
			
////			if (job_status == "Quote Draft"){
////				myConfirm("Do you want to change this job to status of Quote Sent ?", function () {
////				update_field_job_auto('je_job_status', 'Quote Draft','Quote Sent', sales_id);			

////			}, function () {
 		


 //// },
 //// 'Change Job Status ?'
////);
////			}

//alert ("2");
			
			var st_id			= st_id;
		
	//	alert ("email quote started"+st_id);
		
			var reportemailto 					= document.getElementById('email_to').value;
			var reportemailsubject 				= document.getElementById('email_subject').value;		
			var reportemailmessage 				= CKEDITOR.instances.email_body.getData();
		//	alert (reportemailmessage);
			var reportcompname 					= 'Phoenix Software';	
			
			
//alert ("11");
			
						
			var sreportemailto					= reportemailto;
			var sreportemailsubject				= reportemailsubject;
			var sreportemailmessage				= reportemailmessage;
			var sreportcompname					= reportcompname;

			var sendemail						= true;
			
			var emailfields = {};
			emailfields.sales_id				= st_id;
			emailfields.st_id	 				= st_id;
			emailfields.inv_id	 				= inv_id;

		//	emailfields.sendemail				- sendemail;
			
//			emailfields.reportemailto	 		= sreportemailto;
//			emailfields.reportemailsubject	 	= sreportemailsubject;
	//		emailfields.reportemailmessage	 	= sreportemailmessage;
//			emailfields.reportcompname		 	= sreportcompname;
			
			var reportemailto	 		= sreportemailto;;
			var reportemailsubject	 	= sreportemailsubject;
			var reportemailmessage	 	= sreportemailmessage;
			var reportcompname		 	= sreportcompname;
			var phxclient_id=getCookie("phxclient_id");
			
		//	alert ("reportemailto"+reportemailto);
			

			if (phxclient_id == "91"){
				var emailurl = "../php/tradesinv91email.php"; 
			}else if (phxclient_id == "70"){
				var emailurl = "../php/tradesinv70email.php"; 
			}else if (phxclient_id == "65"){
				var emailurl = "../php/tradesinv65email.php"; 
			}else if (phxclient_id == "102"  || phxclient_id == "103" || phxclient_id == "104"){
				alert ("emails cannot be sent from demo software");
				return false();

				}else{
				var emailurl = "../php/tradesinvoiceemail.php";
			}
			
	//		alert ("5"+phxclient_id);

			
			$.ajax({
				url: emailurl,
				type: 'post',
				data: {"emailfields" : JSON.stringify(emailfields), "reportemailsubject" : reportemailsubject, "reportemailmessage" : reportemailmessage, "reportemailto" : reportemailto, "sendemail" : sendemail, "sales_id" : sales_id,"reportemailmessage" : sreportemailmessage, "reportemailto" : sreportemailto, "reportemailsubject" : sreportemailsubject, "reportcompname" : sreportcompname, "autoprint" : autoprintquote, "replyreceipt" : replyreceipt, "sendemail" : sendemail},
				success: function(data) {
					
					document.getElementById("divcustballoading").style.display="none";
					
					var result = myTrim(data);
					
			//		alert (result);


					obj = JSON.parse(result);
			
					var phx_message = obj.phx_message;
					
					document.getElementById("div_phx_message").innerHTML = phx_message;
					document.getElementById("div_phx_message").style.display="block";

					if (phx_message == "Email send successful"){
					
					}else{				
						
						alert ("email send failed"+data);
				}
				},
				error: function (error) {
                  alert('error; ' + error);
				}
			});	
		
		}


	if (CKEDITOR.instances['email_body']){
		
		CKEDITOR.remove(CKEDITOR.instances['email_body']);	
			// alert ("removed");
	 
	};


CKEDITOR.replace('email_body', {
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
		<button class="btn btn-default" data-dismiss="modal" onclick="javascript:check_changestatus('<?php echo $job_status?>')" >Close</button> 
	</div><!-- /modal footer -->
