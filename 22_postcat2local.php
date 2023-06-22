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
$new_dept_id = $_REQUEST['dept_id'];
$new_display_status =  GetSQLValueString($conn, $_REQUEST['display_status'], "text");
$new_cat_name =  GetSQLValueString($conn, $_REQUEST['cat_name'], "text");
$new_cat_name = str_replace("#*##","&", $new_cat_name);

$new_data_version = $_REQUEST['data_version'];

if ($new_data_version == 0) {
$cmdSQL = "insert into web_cat(cat_name, dept_id, display_status) values(" . $new_cat_name . "," . $new_dept_id . ", display_status = " . $new_display_status . ")";
}else{
$cmdSQL = "update 22_catcode set lu_code_descr = " . $new_cat_name . ", lu_dept_id = " . $new_dept_id . ", display_status = " . $new_display_status . " where lu_prodcat_id =" . $new_cat_id;
}
$result = mysqli_query($conn, $cmdSQL);
if($result){ 
    $result_message = ""; 
} else { 
    $result_message = "Update failed" . mysqli_error($conn);
} 

$new_id = mysqli_insert_id($conn);

$resultc = mysqli_query($conn, "COMMIT;"); 

$outputarray = array('phx_result' => $result_message, 'new_id' => $new_id);
$output2 = json_encode($outputarray);
echo $output2;

?>