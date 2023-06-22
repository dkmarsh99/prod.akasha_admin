<?php


//work out fy from selected year

$cat_id = $_REQUEST['cat_id'];
$value	 = $_REQUEST['value'];


include_once("configi.php");

		$sqlupdate1 = "update web_cat set graph_sel = ".$value." where cat_id=".$dept_id;
		
	//	echo "<br>".$sqlupdate1."<br>";
		
	
		$resultinsert1=mysqli_query($conn, $sqlupdate1);


echo "successful";
	
	
exit;
	