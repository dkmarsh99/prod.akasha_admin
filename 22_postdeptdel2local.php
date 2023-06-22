<?php
 header("Access-Control-Allow-Origin: *");
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($conn, $theValue, $theType,   $theDefinedValue = "", $theNotDefinedValue = "")   
    {  
      $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) :   $theValue;  

      $theValue = function_exists("mysqli_real_escape_string") ?   mysqli_real_escape_string($conn, $theValue) :  
mysqli_escape_string($conn_vote, $theValue);

      switch ($theType) {  
        case "text":  
          $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";  
          break;      
        case "long":  
        case "int":  
          $theValue = ($theValue != "") ? intval($theValue) : "NULL";    
          break;    
        case "double":    
          $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";  
          break;  
        case "date":  
          $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
          break;  
        case "defined":  
          $theValue = ($theValue != "") ? $theDefinedValue :
$theNotDefinedValue;
break;
}
return $theValue;
}
}


	include("configi.php");

$dept_id = $_REQUEST['dept_id'];

$new_data_version = 0;


if ($new_data_version == 0) {
	
	$cmdSQL = "delete from web_dept where dept_id = ".$dept_id;

}else{
	
	//$cmdSQL = "update 22_deptcode set lu_dept=" . $new_dept_name . ", lu_display_status = " . $new_display_status . " where lu_dept_id =" . $new_dept_id;

}

$result = mysqli_query($conn, $cmdSQL);

if($result){ 
    $result_message = ""; 
} else { 
    $result_message = "Delete failed" . mysqli_error();
} 

echo $result_message;



?>