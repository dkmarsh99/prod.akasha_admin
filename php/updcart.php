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
	
	$cart_id 				=  $_REQUEST['cart_id'];
	$cart_function			=  $_REQUEST['cart_function'];
	$cart_uid				=  $_REQUEST['cart_uid'];
	
	if ($cart_function == "delallitems"){



		$querydelall="delete from 94_stl where st_id = " . $cart_id;
	
		//	echo $queryinsert;
		$resultdelall=mysqli_query($conn, $querydelall);

		
		echo "successful";
	
	}else if ($cart_function == "delitem"){



		$querydelitem="delete from 94_stl where id_stl = " . $cart_uid;
	
		//	echo $queryinsert;
		$resultdelitem=mysqli_query($conn, $querydelitem);

		
		echo "successful";		
	}

	exit;
	
			
			?>