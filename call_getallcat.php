<?php

$output = shell_exec('getallcat.py');

//new item to add
    	echo '<li>';
        echo '<a href="#" class="item">';
        echo '<div class="in">';
        echo '<div><input type="text" id="new_item" name="new_item"></div>';
        echo '<span class="text-muted"><button type="button" >Add</button></span>';
        echo '</div>';
        echo '</a>';
        echo '</li>';

//print ($output);

$output = stripslashes($output);

$alldept = json_decode(stripslashes($output));

$last_key = "";
$dept_count = 0;
$keys = array_keys($alldept);
for($i = 0; $i < count($alldept); $i++) {
 //   echo $keys[$i] . "{<br>";
 $cat_name = "";
    foreach($alldept[$keys[$i]] as $key => $value) {
		
		if ($key == "cat_name"){
			
			$cat_name = $value;
			
		}
		
		if ($key == "cat_count"){
			
			$cat_count = $value;
			
		}
		//

		
		//
		
		
    //    echo $key . " : " . $value . "<br>";
    }
	
	if ($cat_name == $last_key){
		
	}else{
    	echo '<li>';
        echo '<a href="#" class="item">';
        echo '<div class="in">';
        echo '<div>'.$cat_name.' <button href="url" style="textDecoration: underline" class="btn btn-link"><u>Del</u></button></div>';
        echo '<span class="text-muted">'.$cat_count.'</span>';
        echo '</div>';
        echo '</a>';
        echo '</li>';
		
		
		$last_key = $cat_name;
		
	}

}

//echo var_dump($alldept[0]["dept_id"]);
//print_r($alldept);


?>