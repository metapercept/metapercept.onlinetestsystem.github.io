<?php /* Template Name: tmp_delete_student_page */ ?>


<?php
include_once("connection.php");
$id = $_GET['student_id'];
$sql = "delete from student where student_id = '". $id . "';";
mysqli_query($conn,$sql);
header('Location:http://localhost/wordpress_onlinetest/delete-student/');

?>