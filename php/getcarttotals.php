	<?php

	$result = '';
	
	$cart_id = $_REQUEST['cart_id'];
	
	
	 include 'configiboss.php';

		$querystl="SELECT * from 94_stl where st_id = " . $cart_id;
	//	echo $queryprod;
		$resultstl=mysqli_query($conn, $querystl);
	
		$ttl_lines = 0;
		
		$shipping = 9;
		

		while($rowstl=mysqli_fetch_array($resultstl)) { 

			$id_stl			 				= $rowstl['id_stl'];
			$prodserv_uid		 			= $rowstl['prodserv_uid'];
			$qty	 						= $rowstl['qty'];
			$stl_title 						= $rowstl['stl_title'];
			$line_amount 					= $rowstl['line_amount'];
			$item_amount 					= $rowstl['item_amount'];
			
			$ttl_lines 						= $ttl_lines + $line_amount;

		}
		
		
		$total_overall = $shipping + $ttl_lines;
		
		
		$result = $result . '
		     	        <div class="card">
                <ul class="listview flush transparent simple-listview">
                    <li>Items <span class="text-muted">$ '.number_format($ttl_lines,2).'  </span></li>
                    <li>Shipping <span class="text-muted">$ '.number_format($shipping,2).'</span></li>
                    <li>Total<span class="text-primary font-weight-bold">$ '.number_format($total_overall,2).'</span></li>
                </ul>
            </div>';
		

echo $result;


			
			?>