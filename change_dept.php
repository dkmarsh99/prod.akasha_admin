<?php


//work out fy from selected year

$dept_id = $_REQUEST['dept_id'];
$value	 = $_REQUEST['value'];


include_once("configi.php");

		$sqlupdate1 = "update web_dept set graph_sel = ".$value." where dept_id=".$dept_id;
		
	//	echo "<br>".$sqlupdate1."<br>";
		
	
		$resultinsert1=mysqli_query($conn, $sqlupdate1);


echo "successful";
	
	
exit;
	