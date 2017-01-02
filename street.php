<?php
	include_once("connection.php");
  $course_name = $_POST['course_name'];
  	$sql1="SELECT test_category from test_category where course_name = '".$course_name."'";
	$rs1 = mysqli_query($conn, $sql1) or die(mysqli_error($conn));
	
  $row = mysql_fetch_assoc($rs1);
  return $row['test_category']; // this will return a name of street

?>