<?php
 header("Access-Control-Allow-Origin: *");

	if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }
  
  	include("configi.php");


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


	include("configi.php");

$cat_id 	= $_REQUEST['cat_id'];
$dept_id	= $_REQUEST['dept_id'];


$new_data_version = 0;


if ($new_data_version == 0) {
	
	$cmdSQL = "update web_cat set dept_id =".$dept_id." where cat_id = ".$cat_id;

}else{
	
	//$cmdSQL = "update 22_deptcode set lu_dept=" . $new_dept_name . ", lu_display_status = " . $new_display_status . " where lu_cat_id =" . $new_cat_id;

}

//echo $cmdSQL;

$result = mysqli_query($conn, $cmdSQL);

if($result){ 
    $result_message = ""; 
} else { 
    $result_message = "Update failed" . mysqli_error().$cmdSQL;
} 

echo $result_message;



?>