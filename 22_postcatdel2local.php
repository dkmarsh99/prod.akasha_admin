<?php
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

$cat_id = $_REQUEST['cat_id'];

$new_data_version = 0;


if ($new_data_version == 0) {
	
	$cmdSQL = "delete from web_cat where cat_id = ".$cat_id;

}else{
	
	//$cmdSQL = "update 22_deptcode set lu_dept=" . $new_dept_name . ", lu_display_status = " . $new_display_status . " where lu_cat_id =" . $new_cat_id;

}

$result = mysqli_query($conn, $cmdSQL);

if($result){ 
    $result_message = ""; 
} else { 
    $result_message = "Delete failed" . mysqli_error();
} 

echo $result_message;

?>