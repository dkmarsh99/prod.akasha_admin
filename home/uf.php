<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#000000">
    <title>Wealthhealth Customer Portal</title>
    <meta name="description" content="Wealthhealth Customer Portal">
    <meta name="keywords" content="bootstrap 4, mobile template, cordova, phonegap, mobile, html" />
    <link rel="icon" type="image/png" href="assets/img/favicon.png" sizes="32x32">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/icon/192x192.png">
    <link rel="stylesheet" href="../assets/css/style.css">

</head>

<body class="">

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
	<img src="../images/logo_small.jpg" alt="icon" style="width: 110px">
        </center>
		</div>
    </div>
    <!-- * App Header -->

    <!-- Search Component -->




    <!-- * Search Component -->

    <!-- App Capsule -->
	

    <div class="extraHeader p-0" >
        <div class="form-wizard-section">
            <a href="index.php" class="button-item">
                <strong>1</strong>
                <p>Check</p>
            </a>
            <a  onclick="javascript: gotobs()" class="button-item">
                <strong>2</strong>
                <p>Bank Statements</p>
            </a>
            <a href="uf.php" class="button-item active">
                <strong>3</strong>
                <p>Upload Files</p>
            </a>
            <a href="comp.php" class="button-item">
                <strong>
                    <ion-icon name="checkmark-outline"></ion-icon>
                </strong>
                <p>All Done</p>
            </a>
        </div>
    </div>
    <!-- * Extra Header -->
 	
	<?php
	
	$whcon_uid = $_COOKIE['whcon_uid'];
	
	include("../php/configiboss.php");
			
	
	$sqluser = "SELECT * FROM 242_client_contacts where con_uid = ".$whcon_uid;
	
	//echo $sqluser;
	
		$resultuser = $conn->query($sqluser);

		if ($resultuser->num_rows > 0) {
			// output data of each row
			while($rowuser = $resultuser->fetch_assoc()) {

					$first_name = $rowuser["first_name"];
					$middle_name = $rowuser["middle_name"];
					$last_name = $rowuser["last_name"];			
					
					$uid_client = $rowuser["uid_client"];						
					
					$dob = strtotime($rowuser["dob"]);	
			
					
					$dob2 = date("d/m/Y", $dob);
					
					if ($middle_name == ""){

						$full_name = $first_name . " " .$last_name;
						
					}else{

						$full_name = $first_name . " " . $middle_name . " " .$last_name;
						
					}
					
						$sqlclient = "SELECT * FROM 242_client where uid_client = ".$uid_client;
	
						//echo $sqluser;
	
						$resultclient = $conn->query($sqlclient);

						if ($resultclient->num_rows > 0) {
						// output data of each row
						while($rowclient = $resultclient->fetch_assoc()) {

							$c_sales_manager_id = $rowclient["c_sales_manager_id"];
					
					
					
						}
						
						}
						
						$sqlstaff = "SELECT * FROM 242_staff where uid_staff = ".$c_sales_manager_id;
	
					//	echo $sqlstaff;
	
						$resultstaff = $conn->query($sqlstaff);

						if ($resultstaff->num_rows > 0) {
						// output data of each row
							while($rowstaff = $resultstaff->fetch_assoc()) {

								$staff_name = $rowstaff["staff_name"];
								$staff_email_address = $rowstaff["staff_email_address"];
								$staff_mobile = $rowstaff["staff_mobile"];
							}
		
						}
			}
			
		}
	
	
	?>

    <!-- App Capsule -->
    <div id="appCapsule" class="extra-header-active">

        <div class="section mb-2 mt-2 full">
            <div class="wide-block pt-2 pb-2">
<div style="display: none" class="table-responsive nomargin" id="divdiscofiles">
<?php  include 'fileupload/upload.html';?>
</div>

        <div style="background-color: #4CAF50; color: white;" class="listview-title mt-4">
		<h2 style="color: white">Identification for Homer</h2><br>
		<h3>Completed</h3>

		</div>
		<p>
		You uploaded a Passport on 27/07/21. 
		</p>
		<!-- 
        <ul class="listview image-listview">

            <li class="multi-level">
                <a href="#" class="item">
                    <img src="../images/nzpassportsample.jpg" alt="image" class="image">
                    <div class="in">
                        <div>Passport</div>
                    </div>
                </a>
         
                <ul class="listview image-listview">
                    <li>
                        <a href="#" class="item">
                            <img src="assets/img/sample/photo/2.jpg" alt="image" class="image">
                            <div class="in">
                                <div>Image of passport</div>
                                <span class="text-muted">Text</span>
                            </div>
                        </a>
                    </li>


                </ul>
               
            </li>
			            <li class="multi-level">
                <a href="#" class="item">
                    <img src="../images/dlsample.jpg" alt="image" class="image">
                    <div class="in">
                        <div>Drivers License</div>
                    </div>
                </a>
               
                <ul class="listview image-listview">
                    <li>
                        <a href="#" class="item">
                            <img src="assets/img/sample/photo/2.jpg" alt="image" class="image">
                            <div class="in">
                                <div>Item 1</div>
                                <span class="text-muted">Text</span>
                            </div>
                        </a>
                    </li>

                    <li>
                        <a href="#" class="item">
                            <img src="assets/img/sample/photo/4.jpg" alt="image" class="image">
                            <div class="in">
                                <div>Item 3</div>
                            </div>
                        </a>
                    </li>
                </ul>
                
            </li>
        </ul>
		 -->
		        <div style="background-color: #df4759; color: white;" class="listview-title mt-4">
		<h2 style="color: white">Identification for Marge</h2><br>
		<h3>Not uploaded</h3>

		</div>
		<p>
		Please upload a Passport or drivers license. 
		</p>
        <ul class="listview image-listview">

            <li class="multi-level">
                <a href="#" class="item">
                    <img src="../images/nzpassportsample.jpg" alt="image" class="image">
                    <div class="in">
                        <div>Passport</div>
                    </div>
                </a>
                <!-- sub menu -->
                <ul class="listview image-listview">
                    <li>
                        <a href="#" class="item">
                            <img src="assets/img/sample/photo/2.jpg" alt="image" class="image">
                            <div class="in">
                                <div>Image of passport</div>
                                <span class="text-muted">Text</span>
                            </div>
                        </a>
                    </li>


                </ul>
                <!-- * sub menu -->
            </li>
			            <li class="multi-level">
                <a href="#" class="item">
                    <img src="../images/dlsample.jpg" alt="image" class="image">
                    <div class="in">
                        <div>Drivers License</div>
                    </div>
                </a>
                <!-- sub menu -->
                <ul class="listview image-listview">
                    <li>
                        <a href="#" class="item">
                            <img src="assets/img/sample/photo/2.jpg" alt="image" class="image">
                            <div class="in">
                                <div>Item 1</div>
                                <span class="text-muted">Text</span>
                            </div>
                        </a>
                    </li>

                    <li>
                        <a href="#" class="item">
                            <img src="assets/img/sample/photo/4.jpg" alt="image" class="image">
                            <div class="in">
                                <div>Item 3</div>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- * sub menu -->
            </li>
        </ul>
		
			        <div style="background-color: #FFC107; color: white;" class="listview-title mt-4">
		<h2 style="color: white">Signed Declaration</h2><br>
		<h3>Submitted awaiting approval</h3>

		</div>
		<p>
		You submitted this document on 26 July. <br>This is awaiting approval from your adviser.
		</p>
        <ul class="listview image-listview">
<!--
            <li class="multi-level">
                <a href="#" class="item">
                    <img src="../images/signed_decal.png" alt="image" class="image">
                    <div class="in">
                        <div>Declaration</div>
                    </div>
                </a>
               
                <ul class="listview image-listview">
                    <li>
                        <a href="#" class="item">
                            <img src="assets/img/sample/photo/2.jpg" alt="image" class="image">
                            <div class="in">
                                <div>Image of declaration</div>
                                <span class="text-muted">Text</span>
                            </div>
                        </a>
                    </li>


                </ul>
               
            </li>
-->
        </ul>
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
                    <img src="../assets/img/icon/72x72.png" alt="image" class="imaged w24">
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
    <script src="../assets/js/lib/jquery-3.4.1.min.js"></script>
	

    <!-- Bootstrap-->
    <script src="../assets/js/lib/popper.min.js"></script>
    <script src="../assets/js/lib/bootstrap.min.js"></script>
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.2.3/dist/ionicons/ionicons.js"></script>
    <!-- Owl Carousel -->
   <script src="../assets/js/plugins/owl-carousel/owl.carousel.min.js"></script>
    <!-- jQuery Circle Progress -->
    <script src="../assets/js/plugins/jquery-circle-progress/circle-progress.min.js"></script>
    <!-- Base Js File -->
    <script src="../assets/js/base.js"></script>


<script>
function gotobs(){
	
//	alert ("bs");
	window.location.replace("bs.php");
	
	
}
</script>


</body>

</html>