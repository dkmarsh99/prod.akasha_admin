<?php


//work out fy from selected year

$uid = $_REQUEST['uid'];
$value	 = $_REQUEST['value'];


include_once("configi.php");

		$sqlupdate1 = "update 94_prodserv set graph_sel = ".$value." where uid=".$uid;
		
	//	echo "<br>".$sqlupdate1."<br>";
		
	
		$resultinsert1=mysqli_query($conn, $sqlupdate1);


echo "successful";
	
	
exit;
	