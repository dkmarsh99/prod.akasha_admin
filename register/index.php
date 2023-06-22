<?php
session_start();
    ob_start(); // Initiate the output buffer
	date_default_timezone_set("Pacific/Auckland");
function redirect($url)
{
    if (!headers_sent())
    {    
        header('Location: '.$url);
        exit;
        }
    else
        {  
        echo '<script type="text/javascript">';
        echo 'window.location.href="'.$url.'";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
        echo '</noscript>'; exit;
    }
}
	if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }
  
  	include("../../php/configiboss.php");


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

function getUserIpAddr(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        //ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        //ip pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
function send_email($username){

	$username = $username;
	
	$hostname = "ZZ".$_SERVER['HTTP_HOST'];
	
//	echo $hostname;
//	exit;
	

	if ($hostname == "ZZwealthhealth.co.nz"){
		
		

		//main host website

		echo "main host website";
		
		require 'PHPMailer-master/PHPMailerAutoload.php';
		$subject = "Wealthhealth portal login from " . $username;
		$messagebody = "Successful login from user";

		$mail = new PHPMailer;
		//Tell PHPMailer to use SMTP	
		$mail->isSMTP();
		
		$mail->Host="gsydm1007.siteground.biz";

		$mail->Port=465;

		$mail->SMTPAuth = true;	
		$mail->Username="david@phoenixsoftware.co.nz";
		$mail->Password="Master101@102";
		$mail->SMTPSecure = 'ssl';		
		//Enable SMTP debugging
		// 0 = off (for production use)
		// 1 = client messages
		// 2 = client and server messages
		$mail->SMTPDebug=0;
		//Ask for HTML-friendly debug output
		$mail->Debugoutput='html';
		//Set the hostname of the mail server
		//Set the hostname of the mail server

		$mail->setFrom("david@phoenixsoftware.co.nz", "contact");
		//Set an alternative reply-to address
		$mail->addReplyTo("david@phoenixsoftware.co.nz", "david");
		//Set who the message is to be sent to
		$mail->addAddress("david@phoenixsoftware.co.nz");
		//$mail->AddCC($staff_email_address);
		//Set the subject line
		$mail->Subject = $subject;
		//Read an HTML message body from an external file, convert referenced images to embedded,
		//convert HTML into a basic plain-text alternative body
		$mail->msgHTML($messagebody);
		$mail ->isHTML(true);
		

				
		//Replace the plain text body with one created manually
		//Attach an image file
		//$mail->addAttachment($filename);

		//send the message, check for errors
		
		if (!$mail->send()) {
			  echo "Mailer Error: " . $mail->ErrorInfo;
		} else {
			 echo "Message Sent";
		}


	}else{
		
		echo "NOT".$hostname;
//		exit;

		//somehwere else - probably local - no need to send email

	}
}


?>

<!DOCTYPE html>
<?php
	include("../../php/configiboss.php");
	
	function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


$error = 0;

$compnameErr = "";
$emailaddrErr = "";
$passwdErr = "";
$passwdErr2 = "";
$ypasswdErr = "";
$passwd2Err = "";
$firstnameErr = "";
$tandcErr = "";
$tpasswdErr = "";


	$comp_name = "";
	$email_address = "";
	$password = "";
	$tpassword = "";
	$password2 = "";
	$first_name = "";
	$last_name = "";
	$tandc = "";
	
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
  
   if (empty($_POST["email_address"])) {
		$emailaddrErr = "Email Address is required";
		$error = $error + 1;
  } else {
    $email_address = test_input($_POST["email_address"]);
	if (!filter_var($email_address, FILTER_VALIDATE_EMAIL)) {
	//	$emailaddrErr = "Invalid email format";
	//	$error = $error + 1;
	}
  }

  if (empty($_POST["password"])) {
    $passwdErr = "Password is required";
	$error = $error + 1;
  } else {
    $password = test_input($_POST["password"]);
  }

  if (empty($_POST["password2"])) {
    $passwdErr2 = "Password is required again";
	$error = $error + 1;
  } else {
    $password2 = test_input($_POST["password2"]);
  }
  
  if (empty($_POST["tpassword"])) {
    $tpasswdErr = "Temporary Password is required";
	$error = $error + 1;
  } else {
    $tpassword = test_input($_POST["tpassword"]);
  }
  
    
  if ($_POST["password"] == $_POST["password2"]){
	  
	  
  }else{

    $passwdErr2 = "Passwords do not match";
	$error = $error + 1;	 
	 
  }
  
  if (preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$#", $_POST["password"])){
//echo "Your password is good.";
} else {
    $passwdErr2 = "Please enter a stronger password for your new password";
	$error = $error + 1;	
}




  if (empty($_POST["tandc"])) {
    $tandcErr = "Terms and conditions must be accepted";
	$error = $error + 1;
  } else {
    $tandc = test_input($_POST["tandc"]);
  }
}
   ?>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>WealthHealth | Mortgages, Insurances and Kiwisaver in Tauranga </title>
		<meta name="description" content="WealthHealth | Mortgages, Insurances and Kiwisaver in Tauranga" />
		<meta name="Author" content="Phoenix Software" />

		<!-- mobile settings -->
		<meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />
		<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->

		<!-- WEB FONTS : use %7C instead of | (pipe) -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600%7CRaleway:300,400,500,600,700%7CLato:300,400,400italic,600,700" rel="stylesheet" type="text/css" />
<link rel='stylesheet' id='et-builder-googlefonts-cached-css'  href='https://fonts.googleapis.com/css?family=Raleway:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic&#038;subset=latin,latin-ext&#038;display=swap' type='text/css' media='all' />
		<!-- CORE CSS -->
		<link href="../../assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />

		<!-- THEME CSS -->
		<link href="../../assets/css/essentials.css" rel="stylesheet" type="text/css" />
		<link href="../../assets/css/layout.css" rel="stylesheet" type="text/css" />

		<!-- PAGE LEVEL SCRIPTS -->
		<link href="../../assets/css/header-1.css" rel="stylesheet" type="text/css" />
		<link href="../../assets/css/color_scheme/orange.css" rel="stylesheet" type="text/css" id="color_scheme" />
	</head>
<style>
.solution5 {
  background: url('footer.png');
  background-size: cover;
}

</style>
	<!--
		AVAILABLE BODY CLASSES:
		
		smoothscroll 			= create a browser smooth scroll
		enable-animation		= enable WOW animations

		bg-grey					= grey background
		grain-grey				= grey grain background
		grain-blue				= blue grain background
		grain-green				= green grain background
		grain-blue				= blue grain background
		grain-orange			= orange grain background
		grain-yellow			= yellow grain background
		
		boxed 					= boxed layout
		pattern1 ... patern11	= pattern background
		menu-vertical-hide		= hidden, open on click
		
		BACKGROUND IMAGE [together with .boxed class]
		data-background="../../assets/images/_smarty/boxed_background/1.jpg"
		
		
		
	-->

<style>
.mortgageimage {
  display: block;
  width: 100%;
  height: auto;
}


.containermort {
  position: relative;
 width: 250px; -moz-border-radius: 50%;-webkit-border-radius: 50%;border-radius: 50%;
}

.imagemort {
  display: block;
  height: auto;
  width: 250px; -moz-border-radius: 50%;-webkit-border-radius: 50%;border-radius: 50%;
}

.overlaymort {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  height: 100%;
  width: 100%;
  opacity: 0;
  transition: .5s ease;
  background-color:rgb(251, 177, 105);
   -moz-border-radius: 50%;-webkit-border-radius: 50%;border-radius: 50%;
}

.containermort:hover .overlaymort {
  opacity: 1;
}

.text {
  color: white;
  font-size: 20px;
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  text-align: center;
}
</style>

	<body class="smoothscroll enable-animation" style="font-family: Raleway, Helvetica, Arial, Lucida, sans-serif">

		<!-- SLIDE TOP -->

		<!-- /SLIDE TOP -->


		<!-- wrapper -->
		<div id="wrapper">


			<!-- 
				AVAILABLE HEADER CLASSES

				Default nav height: 96px
				.header-md 		= 70px nav height
				.header-sm 		= 60px nav height

				.b-0 		= remove bottom border (only with transparent use)
				.transparent	= transparent header
				.translucent	= translucent header
				.sticky			= sticky header
				.static			= static header
				.dark			= dark header
				.bottom			= header on bottom
				
				shadow-before-1 = shadow 1 header top
				shadow-after-1 	= shadow 1 header bottom
				shadow-before-2 = shadow 2 header top
				shadow-after-2 	= shadow 2 header bottom
				shadow-before-3 = shadow 3 header top
				shadow-after-3 	= shadow 3 header bottom

				.clearfix		= required for mobile menu, do not remove!

				Example Usage:  class="clearfix sticky header-sm transparent b-0"

			-->
			
			
				<div id="topBar">
<?php include 'topbar.php'; ?>
			</div>
			
			
			<div  id="header" class="navbar-toggleable-md sticky shadow-after-3 clearfix">

				<!-- TOP NAV -->
				<header id="topNav">
					<div class="container">

						<!-- Mobile Menu Button -->
						<button class="btn btn-mobile" data-toggle="collapse" data-target=".nav-main-collapse">
							<i class="fa fa-bars"></i>
						</button>

						<!-- BUTTONS -->

						<!-- /BUTTONS -->


						<!-- Logo -->
						<a  class="logo float-left" href="index.php">
							<img style="width: 100%" class="img-fluid" src="../../images/wealthhealthlogo.jpg" alt="" />
						</a>

						<!-- 
							Top Nav 
							
							AVAILABLE CLASSES:
							submenu-dark = dark sub menu
						-->
<? include 'topnav.php'; ?>

					</div>
				</header>
				<!-- /Top Nav -->

			</div>



			<!-- 
				SLIDER 
				
				.h-300
				.h-350
				.h-400
				.h-450
				.h-500
				.h-550
				.h-600
				.h-650
				.h-700
				.h-750
				.h-800
			-->

			<!-- /SLIDER -->



			<!-- -->

			<!-- / -->
			<section style="border-bottom-style: none; padding-bottom: 0px;">
				<div class="container">
<div class="row">
					<!-- -->
					
						<div class="col-md-6">

							<h3 style="font-size: 40px; font-weight: 700; color: rgb(251, 177, 105);font-family: Raleway, Helvetica, Arial, Lucida, sans-serif;; margin-bottom: 0px">CUSTOMER PORTAL REGISTRATION</h3>
		
					<!-- / -->

			


					<!-- -->
        <div class="login-form mt-1">
        <div class="section mt-3 mb-3">

			

        </div>
            <div class="section mt-1">
        
                <h4>Fill the form to register</h4>
            </div>
         
                <form  method="post"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <input type="email" class="form-control" id="email_address" name="email_address" placeholder="Email address"  value="<?php echo htmlspecialchars($email_address);?>">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
							
								<? if ($emailaddrErr == ""){
											}else{
												?>
										<span style="color: red" class="error">* <?php echo $emailaddrErr;?></span>
											<?
											}
											?>
                        </div>
                    </div>

                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <input type="password" class="form-control" id="tpassword" name="tpassword" placeholder="Initial Temp Password in SMS"  value="<?php echo htmlspecialchars($tpassword);?>"  autocomplete="new-password">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
							
																									<? if ($tpasswdErr == ""){
											}else{
												?>
										<span style="color: red" class="error">* <?php echo htmlspecialchars($tpasswdErr);?></span>
											<?
											}
											?>
                        </div>
                    </div>
					                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <input type="password" class="form-control" id="password" name="password" placeholder="New Password"  value="<?php echo htmlspecialchars($password);?>"  autocomplete="new-password">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
							
																									<? if ($passwdErr == ""){
											}else{
												?>
										<span style="color: red" class="error">* <?php echo htmlspecialchars($passwdErr);?></span>
											<?
											}
											?>
                        </div>
                    </div>
					
										                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <input type="password" class="form-control" id="password2" name="password2" placeholder="New Password again"  value="<?php echo htmlspecialchars($password2);?>"  autocomplete="new-password">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
							
																									<? if ($passwdErr2 == ""){
											}else{
												?>
										<span style="color: red" class="error">* <?php echo htmlspecialchars($passwdErr2);?></span>
											<?
											}
											?>
                        </div>
                    </div>
					                    <div class="form-group boxed">
                        <div class="">

                            <input type="checkbox" name="tandc"  id="tandc"> &nbsp;&nbsp;
                            <label class="custom-control-label text-muted" for="tandc">I Agree <a
                                     target="_blank"  href="../../pdf/Terms_of_Service_Master.pdf">Terms & Conditions</a></label>
							
									<? if ($tandcErr == ""){
										}else{
												?>
												<br>
										<span style="color: red" class="error">* <?php echo $tandcErr;?></span>
											<?
											}
											?>	
                        </div>

                    </div>
                   <div class="form-group boxed">
                        <button type="submit" class="btn btn-primary">Register for Portal</button><br>
						
						<?
						
					//	echo $_SERVER['HTTP_HOST'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

//echo "init".$error.$email_address.$password;


	if ($error == 0){
		
		setcookie("whcon_uid", 0, time() - (20 * 365 * 24 * 60 * 60),'/');
		setcookie("whuid_client", 0, time() - (20 * 365 * 24 * 60 * 60),'/');

		
		include("../../php/configiboss.php");
		
		$email_address=$email_address;

		$email_address2=GetSQLValueString($email_address, "text");
		$tpassword2=GetSQLValueString($tpassword, "text");
			
			
		$sqluser = "SELECT * FROM 242_client_contacts where email = ".$email_address2 . " and portal_password_raw = ".$tpassword2;
	//		echo $sqluser;
		$resultuser = $conn->query($sqluser);
		
	

		if ($resultuser->num_rows > 0) {
			// output data of each row
			while($rowuser = $resultuser->fetch_assoc()) {


					$uid_client 				= 	$rowuser['uid_client'];
					$con_uid	 				= 	$rowuser['con_uid'];
					
					
					$password =  password_hash($password, PASSWORD_DEFAULT);
					$password_input=GetSQLValueString($password, "text");
					
					$current_datetime = date('Y-m-d H:i:s');
					
					$sqlupdphx1 = "update 242_client_contacts set tandcsigned = 1, tandcsigned_date = '".$current_datetime."', portal_password = ".$password_input.", portal_password_raw = '' where con_uid = " .$con_uid; 
			
					echo $sqlupdphx1;
					
					$resultupdphx1 = $conn->query($sqlupdphx1);

					setcookie("whcon_uid", $con_uid, time() + (20 * 365 * 24 * 60 * 60),'/');
					setcookie("whuid_client", $uid_client, time() + (20 * 365 * 24 * 60 * 60),'/');
					
					redirect("../home/index.php");
		
			
				//encrypt new password
				
				// update portal_password to new password
				
				// set terms anbd conditions approval signed =1 and date/time
				
				//login
				
				
				



		//		if ("1"=="1") {
					
				
			//		redirect("fthome/home");
			
			exit;
			
			
			
			
				//	send_email($email_address);
					
	//				exit;
				//	redirect("index.php");
					

					echo 'Temporary password is valid!';

			}
		} else {
			echo '<span style="color: red">email and / or temporary password not found, try again.</span>';
		}



	}else{

	//	echo "errors found".$error.$_POST["tandc"];
		
	}
}

?>
                    </div> 
                    <div class="form-group boxed">
         
                


				 </div>
	

                </form>
           
        </div>



					</div>
					<!-- / -->

			</section>
			
				</div>

					</div>


	</div>



			<!-- -->

			<!-- / -->
					<div class="solution5" style="height: 180px; background-color: white;  background: url('images/footer.png'); background-size: cover;">
<div class="container">
<div class="row">
<div class="col-md-6" style="margin-top: 60px">
<img src="images/logo_small.jpg" alt="" />
<span style="color: white">0800 672 537</span> <br>
<span style="color: white">goodpeople@wealthhealth.co.nz</span>
</div>
<div class="col-md-6" style="margin-top: 70px">
							<div >
								<a href="https://www.facebook.com/wealthhealthnz" class="social-icon social-icon-border social-facebook float-left" data-toggle="tooltip" data-placement="top" title="Facebook">

									<i class="icon-facebook"></i>
									<i class="icon-facebook"></i>
								</a>



								<a href="#" class="social-icon social-icon-border social-linkedin float-left" data-toggle="tooltip" data-placement="top" title="Linkedin">
									<i class="icon-linkedin"></i>
									<i class="icon-linkedin"></i>
								</a>

					
							</div>

</div>

</div>
</div>
</div>
			<!-- FOOTER -->

			<!-- /FOOTER -->

		</div>
		<!-- /wrapper -->


		<!-- SCROLL TO TOP -->
		<a href="#" id="toTop"></a>





		<!-- JAVASCRIPT FILES -->
		<script type="text/javascript">var plugin_path = 'assets/plugins/';</script>
		<script type="text/javascript" src="../../assets/plugins/jquery/jquery-3.2.1.min.js"></script>

		<script type="text/javascript" src="../../assets/js/scripts.js"></script>
		
		<script>
		
				 
		 function removeCommas(str) {
    while (str.search(",") >= 0) {
        str = (str + "").replace(',', '');
    }
    return str;
};


		 function update_field_loan(field_name, field_value, field_value2) {
			
			
			if (field_name == "loan_amount"){
				
				field_value = removeCommas(field_value);
				
				if (field_value == ""){
					
						field_value = 0;
						
				}
				
				var loan_amount = field_value;
				var loan_int_rate =  document.getElementById('loan_int_rate').value;
				
				var e = document.getElementById("loan_int_component");
				var loan_int_component = e.options[e.selectedIndex].text;
				
				var loan_term =  document.getElementById('loan_term').value;			
				
			}else if (field_name == "loan_int_rate"){
				

				var loan_amount = document.getElementById('loan_amount').value;				

				loan_amount = removeCommas(loan_amount);
				
				if (loan_amount == ""){
					
						loan_amount = 0;
						
				}
				

				var loan_int_rate =  	document.getElementById('loan_int_rate').value;
				
				var e = document.getElementById("loan_int_component");
				var loan_int_component = e.options[e.selectedIndex].text;
				
				var loan_term =  document.getElementById('loan_term').value;
				
			}else if (field_name == "loan_int_component"){
				

				var loan_amount = document.getElementById('loan_amount').value;				

				loan_amount = removeCommas(loan_amount);
				
				if (loan_amount == ""){
					
						loan_amount = 0;
						
				}
				

				var loan_int_rate =  	document.getElementById('loan_int_rate').value;
				
				var e = document.getElementById("loan_int_component");
				var loan_int_component = e.options[e.selectedIndex].text;
				
				var loan_term =  document.getElementById('loan_term').value;	
				
			}else if (field_name == "loan_term"){
				

				var loan_amount = document.getElementById('loan_amount').value;				

				loan_amount = removeCommas(loan_amount);
				
				if (loan_amount == ""){
					
						loan_amount = 0;
						
				}
				

				var loan_int_rate =  	document.getElementById('loan_int_rate').value;
				
				var e = document.getElementById("loan_int_component");
				var loan_int_component = e.options[e.selectedIndex].text;
				
				var loan_term =  document.getElementById('loan_term').value;	

			}				

			
	
			

			var field_name			= field_name;
			var loan_amount			= loan_amount;
			var loan_int_rate		= loan_int_rate;
			var loan_term			= loan_term;
			var loan_int_component	= loan_int_component;
	
		
			var jobfields = {};

			jobfields.sales_id	 = 0;			
			jobfields.field_name = field_name;
			jobfields.loan_amount = loan_amount;
			jobfields.loan_int_rate = loan_int_rate;
			jobfields.loan_term = loan_term;
			jobfields.loan_int_component = loan_int_component;

			
	//		alert (JSON.stringify(jobfields));
			
//			alert (c_favcmts);
			
			var web_retailer_cmts = "";
			var c_favcmts = "";
			
	//		alert (JSON.stringify(jobfields));
		
//return false;

			
			
			$.ajax({
				url: 'calcloan.php',
				type: 'post',
				data: {"jobfields" : JSON.stringify(jobfields), "c_favcmts" : c_favcmts, "web_retailer_cmts" : web_retailer_cmts},
				success: function(data) {
					
				//	alert (data);
										
					obj = JSON.parse(data);

				//
				
				phx_result = obj.phx_result;
				
			//	alert (field_name);
				
				
				if (phx_result == ""){
					
					if (field_name == "loan_amount"){
						
						document.getElementById('loan_amount').value = obj.loan_amount;
						document.getElementById('loan_est_repay').value = "$"+obj.loan_est_repay;
						
					}else if (field_name == "loan_int_rate"){
						
						document.getElementById('loan_int_rate').value = obj.loan_int_rate;
						document.getElementById('loan_est_repay').value = "$"+obj.loan_est_repay;
						
					}else if (field_name == "loan_int_component"){
						
						document.getElementById('loan_est_repay').value = "$"+obj.loan_est_repay;

					}else if (field_name == "loan_term"){
						
						document.getElementById('loan_est_repay').value = "$"+obj.loan_est_repay;		
					}
					
					
					
					
					

				}else{
					alert ("Update failed error details are"+data);
				}

				}
			});			

			
		 }
		 	
		</script>
		
		
		<!-- STYLESWITCHER - REMOVE -->

	</body>
</html>