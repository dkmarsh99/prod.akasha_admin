<?php


//work out fy from selected year

$s_id = $_REQUEST['s_id'];
$value	 = $_REQUEST['value'];


include_once("configi.php");

		$sqlupdate1 = "update 94_supplier set graph_sel = ".$value." where s_id=".$s_id;
		
	//	echo "<br>".$sqlupdate1."<br>";
		
	
		$resultinsert1=mysqli_query($conn, $sqlupdate1);


echo "successful";
	
	
exit;
	