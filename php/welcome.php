<?php session_start();




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


		include("configiboss.php");
		
			
if (isset($_POST["jobfields"])) {


	   $jobfields = json_decode(stripslashes($_POST['jobfields']));
	   
	
}else{
	echo "data did not come through";
}



		$field1		=	$jobfields->field1;
		$field2		=	$jobfields->field2;




		
		$phx_result = 0;
		$phx_message = "";
		
		$login_davetest = GetSQLValueString($field1, "text");
		$login_password = GetSQLValueString($field2, "text");
		$password = $field2;
		
		//$rememberme = $_POST['rememberme'];


		setcookie("wh_userid", "", time() + (20 * 365 * 24 * 60 * 60),'/');


echo $field1.$field2;


echo "hello2";
exit;
			
			
		$sqluser = "SELECT * FROM 94_client where davetest = ".$login_davetest;
		
		echo $sqluser;
		
		

		
		$resultuser = $conn->query($sqluser);

		if ($resultuser->num_rows > 0) {
			// output data of each row
			while($rowuser = $resultuser->fetch_assoc()) {

				$passworddb = $rowuser["login_password"];

				
				if (password_verify($password, $passworddb)) {


		//		if ("1"=="1") {
					$wh_userid 				= 	$rowuser['uid_client'];

					$phx_result = 1;
			

					setcookie("wh_userid", $wh_userid, time() + (20 * 365 * 24 * 60 * 60),'/');



			//		redirect("fthome/home");
			
					send_davetest($davetest_address);
					
	//				exit;

//					redirect("stafflogin.php");
					

//					echo 'Password is valid!';
				} else {
					$phx_result = 0;
					$phx_message = "Invalid User or password.";

				}
			}
		} else {
			$phx_result = 0;
			$phx_message = "user or password not valid";

		}



	
	$outputarray = array('phx_result' => $phx_result,'phx_message' => $phx_message

);

$output2 = json_encode($outputarray);

echo $output2;
	
	exit;
	