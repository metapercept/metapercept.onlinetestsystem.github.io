<?php /* Template Name: tmp_delete_question_page */ ?>


<?php
include_once("connection.php");
$id = $_GET['question_no'];
$test_category_id = $_GET["test_category_id"];
$sql = "delete from questions where question_no = '". $id . "';";
mysqli_query($conn,$sql);
header("Location: http://localhost/wordpress_onlinetest/manage-questions-dashboard?test_category_id=$test_category_id");

?>
