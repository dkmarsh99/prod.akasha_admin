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

$dept_name = $_REQUEST['dept_name'];

$dept_name =  GetSQLValueString($conn, $_REQUEST['dept_name'], "text");

$new_data_version = 0;


if ($new_data_version == 0) {
	
	$cmdSQL = "insert into web_dept(dept_name, display_status) values (".$dept_name.",'Active')";

}else{
	
	//$cmdSQL = "update 22_deptcode set lu_dept=" . $new_dept_name . ", lu_display_status = " . $new_display_status . " where lu_dept_id =" . $new_dept_id;

}

//echo $cmdSQL;


$result = mysqli_query($conn, $cmdSQL);

if($result){ 
    $result_message = "successful"; 
} else { 
    $result_message = "Delete failed" . mysqli_error();
} 


$new_id = mysqli_insert_id($conn);

$resultc = mysqli_query($conn, "COMMIT;"); 

$outputarray = array('phx_result' => $result_message, 'new_id' => $new_id);
$output2 = json_encode($outputarray);
echo $output2;

?>