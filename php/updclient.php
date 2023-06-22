	<?php
	
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

	 include 'configiboss.php';	
	
	$whcon_uid 				=  $_REQUEST['whcon_uid'];
	$change_confirm_value	=  $_REQUEST['change_confirm_value'];
	$phx_result = "";


	 include 'configiboss.php';
	 
 	$current_datetime = date('Y-m-d H:i:s');


	$queryupdate="update 242_client_contacts set portal_confirm_me = ".$change_confirm_value.", portal_confirm_me_date = '".$current_datetime."' where con_uid = " . $whcon_uid;
	
	$resultupdate=mysqli_query($conn, $queryupdate);
	
	if(!$resultupdate){
		$phx_result = $phx_result."error has occurred  details are " . mysqli_error() . $queryadd;
	}else{
		$phx_result = "";
	}
	
	$phx_result = trim($phx_result);

	$outputarray = array('phx_result' => $phx_result);
	$output2 = json_encode($outputarray);
	echo $output2;

		

	exit;
	
			
			?>