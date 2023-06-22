	<?php
	

	
	$result = '';
	
	$cart_id = $_REQUEST['cart_id'];
	
	
	 include 'configiboss.php';

		$querystl="SELECT * from 94_stl where st_id = " . $cart_id;
	//	echo $queryprod;
		$resultstl=mysqli_query($conn, $querystl);

		while($rowstl=mysqli_fetch_array($resultstl)) { 

			$id_stl			 				= $rowstl['id_stl'];
			$prodserv_uid		 			= $rowstl['prodserv_uid'];
			$qty	 						= $rowstl['qty'];
			$stl_title 						= $rowstl['stl_title'];
			$line_amount 					= $rowstl['line_amount'];
			$item_amount 					= $rowstl['item_amount'];
			
$result = $result . '
		     	            <div class="card cart-item mb-2">
                <div class="card-body">
                    <div class="in">
                        <img src="images/products/'.$prodserv_uid.'_1.png" alt="product" class="imaged">
                        <div class="text">
                            <h3 class="title">'.$stl_title.'</h3>
							
							<span>Item $'.$item_amount.'</span> <br><br>
                            Total <strong class="price">$ '.$line_amount.'</strong>
                        </div>
                    </div>
                    <div class="cart-item-footer">
                        <div class="stepper stepper-sm stepper-secondary">
                            <a href="#" class="stepper-button stepper-down">-</a>
                            <input type="text" class="form-control" value="'.$qty.'" disabled />
                            <a href="#" class="stepper-button stepper-up">+</a>
                        </div>
                        <a onclick="javascript: upd_cart('.$cart_id.',\'delitem\','.$id_stl.')" class="btn btn-outline-secondary btn-sm">Delete</a>
            
                    </div>
                </div>
            </div>';
		
		
	

		}
		

echo $result;


			
			?>