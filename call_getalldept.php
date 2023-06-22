<?php

//echo "calling";
$output = shell_exec('getalldept.py');
//echo $output;
//echo "called";


//new item to add
    	echo '<li>';
        echo '<a href="#" class="item">';
        echo '<img src="assets/img/sample/photo/2.jpg" alt="image" class="image">';
        echo '<div class="in">';
        echo '<div><input type="text" id="new_item" name="new_item"></div>';
        echo '<span class="text-muted"><button type="button">Add</button></span>';
        echo '</div>';
        echo '</a>';
        echo '</li>';


$output = stripslashes($output);

$alldept = json_decode(stripslashes($output));

$last_key = "";
$dept_count = 0;
$keys = array_keys($alldept);
for($i = 0; $i < count($alldept); $i++) {
 //   echo $keys[$i] . "{<br>";
 $dept_name = "";
    foreach($alldept[$keys[$i]] as $key => $value) {
		
		if ($key == "dept_name"){
			
			$dept_name = $value;
			
		}
		
		if ($key == "dept_count"){
			
			$dept_count = $value;
			
		}
		//

		
		//
		
		
    //    echo $key . " : " . $value . "<br>";
    }
	
	if ($dept_name == $last_key){
		
	}else{
    	echo '<li>';
        echo '<a href="#" class="item">';
        echo '<img src="assets/img/sample/photo/2.jpg" alt="image" class="image">';
        echo '<div class="in">';
        echo '<div>'.$dept_name.' <button href="url">Del</button></div>';
        echo '<span class="text-muted">'.$dept_count.'</span>';
        echo '</div>';
        echo '</a>';
        echo '</li>';
		
		
		$last_key = $dept_name;
		
	}

}

//echo var_dump($alldept[0]["dept_id"]);
//print_r($alldept);


?>