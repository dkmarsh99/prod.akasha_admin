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
            <a href="index.php" class="button-item active">
                <strong>1</strong>
                <p>Check</p>
            </a>
            <a href="" onclick="javascript: gotabs('bs'); return false;" class="button-item">
                <strong>2</strong>
                <p>Bank Statements</p>
            </a>
            <a href=""  onclick="javascript: gotabs('uf'); return false;"  class="button-item">
                <strong>3</strong>
                <p>Upload Files</p>
            </a>
            <a href=""  onclick="javascript: gotabs('comp'); return false;"  class="button-item">
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
	
//	echo $sqluser;
	
		$resultuser = $conn->query($sqluser);

		if ($resultuser->num_rows > 0) {
			// output data of each row
			while($rowuser = $resultuser->fetch_assoc()) {

					$first_name = $rowuser["first_name"];
					$middle_name = $rowuser["middle_name"];
					$last_name = $rowuser["last_name"];	

					$portal_confirm_me = $rowuser["portal_confirm_me"];					
					
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
                <form action="app-components.html">
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="label" for="name1">Full Name</label>
                            <input style="background-color: #DCDCDC" readonly  type="text" class="form-control" id="name1" placeholder="Enter your name" value ="<?php echo htmlspecialchars($full_name)?>">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="label" for="email1">Date of birth</label>
                            <input style="background-color: #DCDCDC" readonly  type="email" class="form-control" id="email1" placeholder="E-mail address" value ="<?php echo htmlspecialchars($dob2)?>">
                 
                        </div>
                    </div>

                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="label" for="email1">Please confirm this is you</label>

               <div class="custom-control custom-switch">
                    <input id="change_confirm_me" <?php if ($portal_confirm_me == "1"){ echo " checked ";}?> onchange="javascript: change_confirm_me_func(<?php echo $whcon_uid; ?>)"  type="checkbox" class="custom-control-input" id="change_confirm_me">
                    <label class="custom-control-label" for="change_confirm_me"></label>
                </div>
<br>				
				         <label class="label" for="email1">Please contact your adviser if this is incorrect.<br> Your adviser is <?php echo htmlspecialchars($staff_name) ?><br>
											Email: <a href="mailto:<?php echo htmlspecialchars($staff_email_address) ?>"><?php echo htmlspecialchars($staff_email_address) ?></a><br></label>
											
											<?php
											$imagefile = "https://bosscrm.co.nz/broker/images/staff/242_staff_".$c_sales_manager_id.".jpg";
?>				

				<img style="width: 120px" src="<?php echo $imagefile; ?>"><br><br>
											                   <label class="label" for="email1">
											Mobile: <?php echo htmlspecialchars($staff_mobile) ?><br></label>

                        </div>
                    </div>





                </form>
            </div>
        </div>
				        <div id="toast-1" class="toast-box toast-bottom bg-danger">
            <div class="in">
                <div class="text">
Please confirm it is you.
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
function gotabs(tab){
	
//	alert ("bs");
//	window.locaton.assign="bs.php";

var change_confirm_me = document.getElementById("change_confirm_me").checked;
	
	if (change_confirm_me === true){
		
	}else{
			toastbox('toast-1', 3000);	
		//	alert ("Please confirm its you");
			return false;
			
	}
	
	
	if (tab == "bs"){
		
		window.location.href = "bs.php";
	
		return false;
	}else if (tab == "uf"){
		
		window.location.href = "bs.php";
	
		return false;		
	}else if (tab == "comp"){
		
		window.location.href = "comp.php";
	
		return false;		
	}

//	window.location.replace("bs.php");
	
	
}

function change_confirm_me_func(whcon_uid){
	
	// alert ("1");
	
	var change_confirm_me = document.getElementById("change_confirm_me").checked;
	
	if (change_confirm_me === true){
		
		change_confirm_value = 1;
	
	}else{

		change_confirm_value = 0;
		
	}
	
	//update the portal_confirm_me info for the client
	
				var whcon_uid = whcon_uid;
				var change_confirm_value = change_confirm_value;

				
				$.ajax({
					url: '../php/updclient.php',
					type: 'post',
					data: {"whcon_uid" : whcon_uid, "change_confirm_value" : change_confirm_value},
					success: function(data) {

						//	alert (data);
					//
					obj = JSON.parse(data);
					
										
					if (obj.phx_result == ""){
					//	location.reload();
					}else{
						alert ("Update Customer failed"+obj.phx_result);
					}

				}
			});	
			
			
	
	//alert (change_confirm_value);

}


</script>


</body>

</html>