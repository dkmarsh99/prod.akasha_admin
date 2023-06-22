<style>
.ui-autocomplete {
z-index: 100;
}
</style>

<?

$action = $_GET['action'];

$phxclient_id = $_COOKIE['phxclient_id'];

$ce_staff_create = 1;
$ce_who = 1;
$ce_uid_client = 1;


?>


	<div class="modal-header"><!-- modal header -->

		<h4 class="modal-title" id="myModalLabel">Confirm Create New Contact


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
														<div class="col-md-8 col-sm-8">
															<label>Customer *</label>
														<input id="tagsfindcustnew" value="" placeholder="Contact Details:" class="form-control typeahead"  value="" style="width: 100%;">

														</div>

													</div>
												</div>						
													
											
						
								<div class="row">
													<div class="form-group">
														<div class="col-md-4 col-sm-4">
		
														
												<button type="button" onclick="javascript: create_contact()" class="btn btn-primary">Create Contact</button>
											

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
			<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
		<script type="text/javascript" src="../assets/js/app.js"></script>
		 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>  
		 
		 
		 

	<!-- /modal body -->

	<div class="modal-footer"><!-- modal footer -->
		<button class="btn btn-default" data-dismiss="modal" onclick="javascript:window.location.reload()" >Close</button> 
	</div><!-- /modal footer -->
	


<script>


		function create_contact() {
			
		document.getElementById("diverrmsgcr8cust").style.display = "none";
			
			
	//		alert ("cr8");
			
		//	return false;
			
			var j1								=  document.getElementById('Outlet_ID');
			var outlet_id						=  j1.options[j1.selectedIndex].value;
			var outlet_name						=  j1.options[j1.selectedIndex].text;
			
		//	alert (outlet_id+outlet_name);
			

			var tagsfindcustnew				= document.getElementById("tagsfindcustnew").value;
			
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
							
							window.location.replace("../contactdetaile/?uid_client="+obj.new_id);
						}else{
							alert ("Create Contact Failed "+data);
						}

				}
			});	

		
		}

</script>


