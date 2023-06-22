<?php

$type = $_REQUEST['type'];

//print_r($_REQUEST);


//work out fy from selected year

$phxclient_id = 100;


if (isset($_COOKIE['sel_dept2'])){
	
	$sel_dept = $_COOKIE['sel_dept2'];
}else{
	
	$sel_dept = 6;
		
}
//$dave = $selfy;
	include_once("configi.php");

echo "{";
echo "labels: ['Feb 22', 'Mar 22', 'Apr 22', 'May 22', 'Jun 22', 'Jul 22', 'Aug 22','Sep 22', 'Oct 22','Nov 22', 'Dec22', 'Jan 23', 'Feb 23'],";
			echo "datasets: [{";
			
				$querydept="select * from web_cat where dept_id = ".$sel_dept." and graph_sel = 1";
				
			//	$querydept="select * from web_cat where dept_id = 6 and graph_sel = 1";
			
//	$querydept="select * from web_cat where dept_id = 6";
							
			//	echo $querydept;
		
				
			$resultdept=mysqli_query($conn, $querydept);
			
			$rowcount=mysqli_num_rows($resultdept);
			
		//	echo "number of rows is".$rowcount;

			$i2 = 0;
				
		while($rowdept=mysqli_fetch_array($resultdept)) { 

			$cat_id	 =  $rowdept['cat_id'];
			$cat_name =  $rowdept['cat_name'];
			$graph_qty =  $rowdept['graph_qty'];
			$graph_total =  $rowdept['graph_total'];
			$graph_colour =  $rowdept['graph_colour'];
			
				echo "type: 'line',";
				echo "label: '".$cat_name."',";
				echo "lineTension: 0,";
				echo "backgroundColor: '".$graph_colour."',";
				echo "borderColor: '".$graph_colour."',";
				echo "pointStyle: 'circle',";
				echo "pointRadius: 5,";
				echo "fill: false,";
				
				
				
				echo "data: [";
				
				$querytarget="select * from 94_total_bycat where cat_id = ".$cat_id." order by yy, mm";
				
			//	echo $querytarget;
		
				
				$resulttarget=mysqli_query($conn, $querytarget);

				$i = 1;
				
				while($rowtarget=mysqli_fetch_array($resulttarget)) { 
				
					if ($type == "qty"){

						$total =  $rowtarget['qty'];
					
					}else if ($type == "total"){

						$total =  $rowtarget['total'];

						
					}
					
					if ($i == 13){
						
						echo $total;
						
					}else{

						echo $total . ",";
						
					}
					

			
					$i = $i + 1;
				}
				
				echo "]";
				
				
				//if another one then put joinert
				
				$i2 = $i2 + 1;
				
				if ($i2 == $rowcount){
				
			echo "}";
			
			}else{
				echo "},{";

				
			}
			
			
			}


			echo "]";
echo "}";


?>