<?php /* Template Name: tmp_delete_test_page */ ?>


<?php
include_once("connection.php");
$test_category_id = $_GET['test_category_id'];
$sql = "delete from test_category where test_category_id = '". $test_category_id . "';";
mysqli_query($conn,$sql);
header('Location: http://localhost/wordpress_onlinetest/delete-test/');

?>


