<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
			
<body>
<form>



<? include 'configi.php'; 



$query = "select * from web_dept order by dept_name;";
$link = "hello";
$linkcat = "hellocat";

$result=mysqli_query($conn, $query);
$i = 0;
?>

<? while($row=mysqli_fetch_array($result)) {
 
	$dept_id = $row['dept_id'];
	$lu_dept = $row['dept_name'];	
	  		echo '<ul class="list-group list-group-bordered list-group-noicon uppercase">';
		echo '<li style="margin-bottom: 15px" class="list-group-item">';

$fp_dept_id = $dept_id;
		
					$link = "redirect.php?imgno=1&bestseller=no&catid=".$fp_dept_id."&catdepttype=dept";
			$linkbest = "redirect.php?imgno=1&bestseller=yes&catid=".$fp_dept_id."&catdepttype=dept";	

		echo '<input type="text" style="font-size: 28px" size="25" id="deptname_'.$dept_id.'" name="deptname" onchange="javascript: changedept('.$dept_id.')" value="'.htmlspecialchars($lu_dept).'"> <a style="color: red" class="btn btn-link"   onclick="javascript: deldept('.$dept_id.')"><u>Del Department</u></a>';

?>
<?

$link = "hello";
	$fp_category = $lu_dept;


	 $query2 = "select * from web_cat where dept_id = ".$dept_id." order by cat_name";


$result2=mysqli_query($conn, $query2);
$i2 = 0;
$totalEmployee = 12;
?>

<? while($row2=mysqli_fetch_array($result2)) {

	$fp_category = $row2['cat_name'];
	$lu_prodcat_id = $row2['cat_id'];
	$cat_id = $row2['cat_id'];

			$catdept_type = "cat";

				//is a cat

			$linkcat = "redirectdept.php?imgno=1&bestseller=yes&catid=".$lu_prodcat_id."&catdepttype=cat";
		$linkcat = "";
		
												echo '<ul style="margin-bottom: 5px;">';
				echo '<li style="padding-bottom: 15px; margin-bottom: 15px; text-transform: none;"><input type="text" size="25" id="catname_'.$cat_id.'" name="fname" value="'.htmlspecialchars($fp_category).'"  onchange="javascript: changecat('.$cat_id.')" value="'.htmlspecialchars($lu_dept).'">
				<a style="display: inline; color: red" onclick="javascript: delcat('.$lu_prodcat_id.')"><u>Del Category</u></a>
				
				</li>';
				echo '</ul>';
			
} 
 ?>
 <?
 


$i = $i + 1;

							echo '</li>';			
				echo '</ul>';
} 
	
?>

	
</body>
</html>