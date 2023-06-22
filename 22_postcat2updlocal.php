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

//$new_cat_id = $_REQUEST['cat_id'];
$cat_id = $_REQUEST['cat_id'];
$dept_id = $_REQUEST['dept_id'];

$new_data_version = 0;

if ($new_data_version == 0) {
$cmdSQL = "update web_cat set dept_id = ".$dept_id. " where cat_id = " . $ cat_id;

}else{
}
$result = mysqli_query($conn, $cmdSQL);
if($result){ 
    $result_message = ""; 
} else { 
    $result_message = "Update failed" . mysqli_error($conn);
} 

$new_id = mysqli_insert_id($conn);

$resultc = mysqli_query($conn, "COMMIT;"); 

$outputarray = array('phx_result' => $result_message);
$output2 = json_encode($outputarray);
echo $output2;

?>