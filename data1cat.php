<?php

$type = $_REQUEST['type'];
$dept_id = $_REQUEST['dept_id'];

//work out fy from selected year

$current_fy = 2021;
$previous_fy = $current_fy - 1;

$phxclient_id = 100;

//$dave = $selfy;
	include_once("configi.php");
	

	

echo "{";
echo "labels: ['Sep 20', 'Oct 20', 'Nov 20', 'Dec 20', 'Jan 21', 'Feb 21', 'Mar 21', 'Apr 21', 'May 21', 'Jun 21', 'Jul 21', 'Aug 21', 'Sep 21'],";
			echo "datasets: [{";
			
				$querydept="select * from web_cat where dept_id = ".$dept_id;
				
			//	echo $querytarget;
		
				
			$resultdept=mysqli_query($conn, $querydept);
			
			$rowcount=mysqli_num_rows($resultdept);
			
		//	echo "number of rows is".$rowcount;

			$i2 = 0;
				
		while($rowdept=mysqli_fetch_array($resultdept)) { 

			$cat_id	 =  $rowdept['cat_id'];
			$cat_name =  $rowdept['cat_name'];
		//	$graph_qty =  $rowdept['qty'];
		//	$graph_total =  $rowdept['total'];
			//$graph_colour =  $rowdept['graph_colour'];
			
				echo "type: 'line',";
				echo "label: '".$cat_name."',";
				echo "lineTension: 0,";
				echo "backgroundColor: 'red',";
				echo "borderColor: 'red',";
				echo "pointStyle: 'circle',";
				echo "pointRadius: 5,";
				echo "fill: false,";
				
				
				
				echo "data: [";
				
				$querytarget="select * from catstats where cat_id = ".$cat_id." order by yy, mm";
				
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