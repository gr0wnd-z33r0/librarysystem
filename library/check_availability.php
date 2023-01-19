<?php 
require_once("includes/config.php");
// code user email availablity
if(!empty($_POST["emailid"])) {
	$text= $_POST["emailid"];
	if (filter_var($text, FILTER_VALIDATE_TEXT)===false) {

		echo "error : You did not enter a valid username.";
	}
	else {
		$sql ="SELECT EmailId FROM tblstudents WHERE EmailId=:username";
$query= $dbh -> prepare($sql);
$query-> bindParam(':username', $text, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query -> rowCount() > 0)
{
echo "<span style='color:red'> Username already exists .</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	
	echo "<span style='color:green'> Username available for Registration .</span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}
}


?>
