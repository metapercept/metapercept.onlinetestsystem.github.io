<?php /* Template Name: tmp_delete_course_page */ ?>


<?php
include_once("connection.php");
$id = $_GET['course_id'];
$sql = "delete from courses where course_id = '". $id . "';";
mysqli_query($conn,$sql);
header('Location: http://localhost/wordpress_onlinetest/delete-course/');

?>


