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
	
	$cart_id 	=  $_REQUEST['cart_id'];
	$uid			=  $_REQUEST['uid'];
	$qty			=  $_REQUEST['qty'];
	
	
	
	//get details of product from product table
	
		$queryprod="SELECT * FROM 94_prodserv where uid = ".$uid;
	//	echo $queryprod;
		$resultprod=mysqli_query($conn, $queryprod);

		while($rowprod=mysqli_fetch_array($resultprod)) { 

			$prod_title		 				= $rowprod['prod_title'];
			$prod_retail	 				= $rowprod['prod_retail'];
				
		}
		
		include 'configiboss.php';	
		
		$line_amount = $prod_retail * $qty;
		
		$prod_title = GetSQLValueString($prod_title, "text");
		$item_amount = GetSQLValueString($prod_retail, "double");
		
		

	 include 'configiboss.php';


	$queryinsert="insert into 94_stl(st_id, prodserv_uid, item_amount, line_amount, stl_title, qty) values (".$cart_id.",".$uid.",".$item_amount.",".$line_amount.",".$prod_title.",".$qty.")";
	
	//	echo $queryinsert;
	$resultinsert=mysqli_query($conn, $queryinsert);

		
	echo "successful";
		

	exit;
	
			
			?>