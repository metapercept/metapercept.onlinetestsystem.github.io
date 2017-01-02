
<?php
alert("dfd");
include_once("connection.php");


$q = $_GET['q'];
//$type_post = (filter_input(INPUT_POST, 'course_name'));
$sql="SELECT course_start_date from courses where course_name = '" . $q ."'";
$result = mysqli_query($conn,$sql);

while($row = mysqli_fetch_array($result)) {
  
    echo  $row['course_start_date'];
   
}

mysqli_close($con);
?>

   