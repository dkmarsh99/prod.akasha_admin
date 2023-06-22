<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#000000">
    <title>Akasha Admin</title>
    <meta name="description" content="Wealthhealth Customer Portal">
    <meta name="keywords" content="bootstrap 4, mobile template, cordova, phonegap, mobile, html" />
    <link rel="icon" type="image/png" href="assets/img/favicon.png" sizes="32x32">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/icon/192x192.png">
			<link href="assets/css/essentials.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body class="" onload="javascript: load_page()">

    <!-- loader -->

    <!-- * loader -->
	    <div class="login-form mt-1">
    <!-- App Header -->
    <div class="appHeader bg-primary scrolled">
        <div class="left">
            <a href="#" class="headerButton" data-toggle="modal" data-target="#sidebarPanel">
                <ion-icon name="menu-outline"></ion-icon>
            </a>
        </div>

        <div>
		<center>
<h1>Akasha Admin & Maintenance</h1> 
        </center>
		</div>
    </div>
    <!-- * App Header -->

    <!-- Search Component -->




    <!-- * Search Component -->

    <!-- App Capsule -->
	

    <div class="extraHeader p-0" >
        <div class="form-wizard-section">
            <a href="index.php" class="button-item active">
                <strong>1</strong>
                <p>Maintain Existing Dept/Cat</p>
            </a>
			            <a href="indexold.php" class="button-item">
                <strong>2</strong>
                <p>Create New Dept/Cat</p>
            </a>
            <a  href="index2.php?type=qty" class="button-item">
                <strong>3</strong>
                <p>Department Graphs</p>
            </a>
			            <a  href="indexcat.php?type=qty&dept_id=3" class="button-item">
                <strong>4</strong>
                <p>Category Graphs</p>
            </a>
						<a  href="indexsupp.php?type=qty&dept_id=3" class="button-item">
                <strong>5</strong>
                <p>Supplier Graphs</p>
            </a>
			<a  href="indexprod.php?type=qty&dept_id=3&num_recs=200" class="button-item">
                <strong>6</strong>
                <p>Product Graphs</p>
            </a>
        </div>
    </div>
    <!-- * Extra Header -->
 	
	

    <!-- App Capsule -->
    <div id="appCapsule" class="extra-header-active">

        <div class="section mb-8 mt-8 full">
            <div class="wide-block pt-8 pb-8">
<div style="display: none" class="table-responsive nomargin" id="divdiscofiles">

</div>


				<!--		<button type="button" style="font-size: 12px;  height: 38px; width: 135px;" onclick="javascript: get_dept()"     class="btn-default"><i class="fa fa-edit white"></i>Get Departments</button>
					 -->	
		        <div style="background-color: #4CAF50; color: white;" class="listview-title mt-8">
		<h2 style="color: white">Department & category Maint</h2><br>


		</div>
		
						<div class="side-nav side-nav-custom float-left">
						
						


							<ul class="list-group list-unstyled mb-0">
								<?php include 'cattree21new.php'; ?> 
							</ul>

						</div>


		

		</div>

		</div>


            </div>
        </div>



    </div>
    <!-- * App Capsule -->


    <!-- App Bottom Menu -->
    <div class="appBottomMenu">
        <a href="index.php" class="item active">
            <div class="col">
                <ion-icon name="home-outline"></ion-icon>
            </div>
        </a>



        <a href="javascript:;" class="item" data-toggle="modal" data-target="#sidebarPanel">
            <div class="col">
                <ion-icon name="menu-outline"></ion-icon>
            </div>
        </a>
    </div>
	   </div>
    <!-- * App Bottom Menu -->

    <!-- App Sidebar -->
	<?php include ('sidebar.php'); ?>
    <!-- * App Sidebar -->

    <!-- welcome notification  -->
    <div id="notification-welcome" class="notification-box">
        <div class="notification-dialog android-style">
            <div class="notification-header">
                <div class="in">
                    <img src="assets/img/icon/72x72.png" alt="image" class="imaged w24">
                    <strong>Wealthhealth Customer Portal</strong>
                    <span>just now</span>
                </div>
                <a href="#" class="close-button">
                    <ion-icon name="close"></ion-icon>
                </a>
            </div>
            <div class="notification-content">
                <div class="in">
                    <h3 class="subtitle">Welcome to Wealthhealth Customer Portal</h3>
                    <div class="text">
                        Wealthhealth Customer Portal is a PWA ready Mobile UI Kit Template.
                        Great way to start your mobile websites and pwa projects.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- * welcome notification -->

    <!-- ///////////// Js Files ////////////////////  -->
    <!-- Jquery -->
    <script src="assets/js/lib/jquery-3.4.1.min.js"></script>
	

    <!-- Bootstrap-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="assets/js/lib/popper.min.js"></script>
    <script src="assets/js/lib/bootstrap.min.js"></script>
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.2.3/dist/ionicons/ionicons.js"></script>
    <!-- Owl Carousel -->
   <script src="assets/js/plugins/owl-carousel/owl.carousel.min.js"></script>
    <!-- jQuery Circle Progress -->
    <script src="assets/js/plugins/jquery-circle-progress/circle-progress.min.js"></script>
    <!-- Base Js File 
    <script src="assets/js/base.js"></script>-->


<script>
function gotobs(){
	
//	alert ("bs");
	window.location.replace("bs.php");
	
	
}


function load_page(){
	
//	get_dept();
	
//	alert ("done");
	
}

function get_dept(){
	
//		alert ("get_dept");
		
					var url = "call_getdept.php";
					
					var st_id = 1;
					
			
			$.ajax({
				url: url,
				type: 'get',
				error: function(data) {
					console.log(data);
					alert ("call getdept failed"+data);
				},
				success: function(data) {
					
					alert (data);
					
				}
				
				
			});


}

function addcat(){

	cat_name = document.getElementById("new_item_cat").value;
	
	var e = document.getElementById("new_item_cat_dept");
	var cat_dept = e.options[e.selectedIndex].value;

	if (cat_name == ""){
		
			alert ("Please enter a valid category name")
			return false;
	}
	
//	alert (cat_name+"dept"+cat_dept);

//	return false;
	
	
	dept_id = cat_dept;
	display_status = "active";
	cat_name = cat_name;
	data_version = 0;
	
			$.ajax({
				url: '22_postcat2local.php',
				type: 'post',
				async: 'true',
				data: {"dept_id" : dept_id, "display_status" : display_status, "cat_name" : cat_name, "data_version" : data_version},
				success: function(data) {
				//	alert (data);
					var obj = JSON.parse( data );
					var phx_result = obj.phx_result;
					var new_id = obj.new_id;
					
					if (phx_result == ""){
						
						
						//add to websites
						$.ajax({
							url: 'https://phoenixsoftware.co/classic/akasha22/22_postcat2.php',
							type: 'post',
							async: 'true',
							data: {"cat_id" : new_id, "dept_id" : dept_id, "display_status" : "active", "cat_name" : cat_name, "data_version" : data_version},
							success: function(data) {
							//	alert ("postcat2"+data);
								var phx_result = data;

								if (phx_result == "Update Successful"){
									
									$.ajax({
										url: 'call_addcat.php',
										type: 'post',
										async: 'true',
										data: {"cat_id" : new_id, "dept_id" : dept_id, "display_status" : "active", "cat_name" : cat_name, "data_version" : data_version},
										success: function(data) {
									//		alert (data);

											var phx_result = data.trim();

											if (phx_result == "completed"){

												alert ("Category added successfully");
												location.reload(true);
					
												}else{
													alert ("delete failed"+data+"not successful");
						
												}
					

										}
									});
									
					
									}else{
										alert ("update failed"+data);
						
								}
					

				}
			});

						
					
					}else{
						alert ("update failed local"+data);
						
					}
					

				}
			});
			
}





function updcatdept(cat_id, dept_id){


	var cat_id = cat_id;
	var cat_dept = dept_id;

	data_version = 0;
	
			$.ajax({
				url: '22_postcat2updlocal.php',
				type: 'post',
				async: 'true',
				data: {"cat_id" : cat_id, "dept_id" : cat_dept,},
				success: function(data) {
					alert (data);
					var obj = JSON.parse( data );
					var phx_result = obj.phx_result;
					var new_id = obj.new_id;
					
					if (phx_result == ""){
						
						
						//add to websites
						$.ajax({
							url: 'https://phoenixsoftware.co/classic/akasha22/22_postupdcat2.php',
							type: 'post',
							async: 'true',
							data: {"cat_id" : cat_id, "dept_id" : dept_id},
							success: function(data) {
								alert ("postcat2"+data);
								var phx_result = data;

								if (phx_result == "Update Successful"){
									
									alert ("Category updated successfully");

									location.reload(true);
					
									}else{
										alert ("update failed"+data);
						
								}
					

				}
			});

						
					
					}else{
						alert ("update failed local"+data);
						
					}
					

				}
			});
			
}

function adddept(){

	dept_name = document.getElementById("new_item_dept").value;
	
	if (dept_name == ""){
		
			alert ("Please enter a valid department name")
			return false;
	}
	
	

	dept_name = dept_name;
	data_version = 0;
	
			$.ajax({
				url: '22_postdeptadd2local.php',
				type: 'post',
				async: 'true',
				data: {"dept_name" : dept_name},
				success: function(data) {
				//	alert (data);
					var obj = JSON.parse( data );
					var phx_result = obj.phx_result;
					var new_id = obj.new_id;
					if (phx_result == "successful"){
						
					//	alert (dept_name);
						//add to websites
						$.ajax({
							url: 'https://phoenixsoftware.co/akasha22/22_postdeptadd2.php',
							type: 'post',
							async: 'true',
							data: {"dept_name" : dept_name, "dept_id" : new_id},
							success: function(data) {
								
							//	alert (data);

								var phx_result = data;

								if (phx_result == "successful"){
									
									//
									$.ajax({
										url: 'call_adddept.php',
										type: 'post',
										async: 'true',
										data: {"dept_name" : dept_name, "dept_id" : new_id},
										success: function(data) {
										//	alert ("zz"+data.trim()+"zz");

											var phx_result = data.trim();

											if (phx_result == "completed"){

												alert ("Department added successfully");
												location.reload(true);
					
												}else{
													alert ("update failed"+data);
						
												}
					

										}
									});
									
									//
									
					
									}else{
										alert ("update failed"+data);
						
								}
					

							}
						});

						
					
					}else{
						alert ("update failed"+data);
						
					}
					

				}
			});
			
}






function changedept(dept_id){
	
	
//	alert (dept_id)

	var field_name = "deptname_"+dept_id;

	dept_name = document.getElementById(field_name).value;
	
	
	dept_id = dept_id;
	data_version = 0;
	
			$.ajax({
				url: 'http://localhost/akasha_admin/22_changedeptlocal.php',
				type: 'post',
				async: 'true',
				data: {"dept_id" : dept_id, "dept_name" : dept_name},
				success: function(data) {
				//	alert (data);
					var phx_result = data;

					if (phx_result == ""){
						
						
						//add to websites
						$.ajax({
							url: 'https://phoenixsoftware.co/classic/akasha22/22_changedept.php',
							type: 'post',
							async: 'true',
							data: {"dept_id" : dept_id, "dept_name" : dept_name},
							success: function(data) {
								
						//		alert (data);

								var phx_result = data;

								if (phx_result == "successful"){
									
									
									//
									
									$.ajax({
										url: 'call_changedept.php',
										type: 'post',
										async: 'true',
										data: {"dept_id" : dept_id, "dept_name" : dept_name},
										success: function(data) {
									//		alert (data);

											var phx_result = data.trim();

											if (phx_result == "successful"){

												alert ("Department changed successfully");
												location.reload(true);
					
												}else{
													alert ("delete failed"+data+"not successful");
						
												}
					

										}
									});
									

					
									}else{
										alert ("update failed"+data);
						
									}
					

							}
						});

						
					
					}else{
						alert ("update failed"+data);
						
					}
					

				}
			});
			
}




function changecat(cat_id){
	
	
//	alert (dept_id)

	var field_name = "catname_"+cat_id;

	cat_name = document.getElementById(field_name).value;
	
	
	cat_id = cat_id;
	data_version = 0;
	
			$.ajax({
				url: 'http://localhost/akasha_admin/22_changecatlocal.php',
				type: 'post',
				async: 'true',
				data: {"cat_id" : cat_id, "cat_name" : cat_name},
				success: function(data) {
				//	alert (data);
					var phx_result = data;

					if (phx_result == ""){
						
						
						//add to websites
						$.ajax({
							url: 'https://phoenixsoftware.co/classic/akasha22/22_changecat.php',
							type: 'post',
							async: 'true',
							data: {"cat_id" : cat_id, "cat_name" : cat_name},
							success: function(data) {
								
						//		alert (data);

								var phx_result = data;

								if (phx_result == "successful"){
									
									
									//
									
									$.ajax({
										url: 'call_changecat.php',
										type: 'post',
										async: 'true',
										data: {"cat_id" : cat_id, "cat_name" : cat_name},
										success: function(data) {
									//		alert (data);

											var phx_result = data.trim();

											if (phx_result == "successful"){

												alert ("Category changed successfully");
												location.reload(true);
					
												}else{
													alert ("delete failed"+data+"not successful");
						
												}
					

										}
									});
									

					
									}else{
										alert ("update failed"+data);
						
									}
					

							}
						});

						
					
					}else{
						alert ("update failed"+data);
						
					}
					

				}
			});
			
}

function deldept(dept_id){
	
	
//	alert (dept_id)

	
	dept_id = dept_id;
	data_version = 0;
	
			$.ajax({
				url: 'http://localhost/akasha_admin/22_postdeptdel2local.php',
				type: 'post',
				async: 'true',
				data: {"dept_id" : dept_id},
				success: function(data) {
				//	alert (data);
					var phx_result = data;

					if (phx_result == ""){
						
						
						//add to websites
						$.ajax({
							url: 'https://phoenixsoftware.co/classic/akasha22/22_postdeptdel2.php',
							type: 'post',
							async: 'true',
							data: {"dept_id" : dept_id},
							success: function(data) {
								
						//		alert (data);

								var phx_result = data;

								if (phx_result == "successful"){
									
									
									//
									
									$.ajax({
										url: 'call_deldept.php',
										type: 'post',
										async: 'true',
										data: {"dept_id" : dept_id},
										success: function(data) {
									//		alert (data);

											var phx_result = data.trim();

											if (phx_result == "successful"){

												alert ("Department deleted successfully");
												location.reload(true);
					
												}else{
													alert ("delete failed"+data+"not successful");
						
												}
					

										}
									});
									

					
									}else{
										alert ("update failed"+data);
						
									}
					

							}
						});

						
					
					}else{
						alert ("update failed"+data);
						
					}
					

				}
			});
			
}

			
	function delcat(cat_id){

	
	cat_id = cat_id;
	data_version = 0;
	
			$.ajax({
				url: '22_postcatdel2local.php',
				type: 'post',
				async: 'true',
				data: {"cat_id" : cat_id},
				success: function(data) {
				//	alert (data);
					var phx_result = data;

					if (phx_result == ""){
						
						
						//add to websites
						$.ajax({
							url: 'https://phoenixsoftware.co/classic/akasha22/22_postcatdel2.php',
							type: 'post',
							async: 'true',
							data: {"cat_id" : cat_id},
							success: function(data) {


								var phx_result = data;

								if (phx_result == "successful"){
									
									
									//
									
									$.ajax({
										url: 'call_delcat.php',
										type: 'post',
										async: 'true',
										data: {"cat_id" : cat_id},
										success: function(data) {
									//		alert (data);

											var phx_result = data.trim();

											if (phx_result == "successful"){

												alert ("Category deleted successfully");
												location.reload(true);
					
												}else{
													alert ("delete failed"+data+"not successful");
						
												}
					

										}
									});
									

					
									}else{
										alert ("update failed"+data);
						
									}
					

							}
						});

						
					
					}else{
						alert ("update failed"+data);
						
					}
					

				}
			});
			
}	







</script>


</body>

</html>