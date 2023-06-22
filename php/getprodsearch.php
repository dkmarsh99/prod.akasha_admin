	<?php
	
	if (isset($_COOKIE['wh_cartid'])){

	}else{
		echo '<br><span>Please  <a style="font-size: 16px" href="login.php">Login/Register</a> to see our range of Organic products</span>';
		
		exit;
		
	}
	
	$wh_cartid = $_COOKIE['wh_cartid'];
	
	$result = '';
	
	
	 include 'configiboss.php';

		$queryprod="SELECT 94_web_dept.dept_id, 94_web_cat.cat_id, 94_web_cat.cat_name, 94_prodserv.uid, 94_prodserv.prod_title, 94_prodserv.prod_retail FROM ((94_prod_category INNER JOIN 94_web_cat ON 94_prod_category.cat_id = 94_web_cat.cat_id) INNER JOIN 94_prodserv ON 94_prod_category.prod_uid = 94_prodserv.uid) INNER JOIN 94_web_dept ON 94_web_cat.dept_id = 94_web_dept.dept_id where 94_prodserv.prod_status = 'Active';";
	//	echo $queryprod;
		$resultprod=mysqli_query($conn, $queryprod);

		while($rowprod=mysqli_fetch_array($resultprod)) { 

			$uid			 				= $rowprod['uid'];
			$prod_title		 				= $rowprod['prod_title'];
			$prod_retail	 				= $rowprod['prod_retail'];
				


$result = $result . '
		        <div class="section full">
            <div class="wide-block pt-2 pb-2 product-detail-header">
            <div  class="item">
			<center>
                <img  src="images/products/'.$uid.'_1.png" alt="alt" class="imaged w-50 square">
            </center>
			</div>
			<center>
                <h1 class="title">'.htmlspecialchars($prod_title).'</h1>
</center>            
			<div class="text"><center>1 kg - Packed</center></div>
                <div class="detail-footer">
                    <!-- price -->
                    <div class="price">

                        <div class="current-price">$ '.htmlspecialchars($prod_retail).'</div>
                    </div>
                    <!-- * price -->
                    <!-- amount -->
                    <div class="amount">
                        <div class="stepper stepper-secondary">
                            <a href="#" class="stepper-button stepper-down">-</a>
                            <input id="qty_'.$uid.'" type="text" class="form-control" value="1" disabled/>
                            <a href="#" class="stepper-button stepper-up">+</a>
                        </div>
                    </div>
                    <!-- * amount -->
                </div>
                <button class="btn btn-success btn-lg btn-block" onclick="javascript: add_cart('.$uid.','.$wh_cartid.',3)">
                    <ion-icon name="cart-outline"></ion-icon>
                    Add to Cart
                </button>
            </div>

        </div>
		';
		
	

		}
		

echo $result;


			
			?>