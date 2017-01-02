<?php /* Template Name: tmp_test_end_page */ ?>
<?php include_once("connection.php");?>
<?php
get_header();?>
<div id="primary" class="content-area boxed">
		
	<form id = "frm_test_end">
		<div id = "main_container" >
			<?php 
			$id = $_GET['student_id'];
			$update_flag = "SELECT percentage from result where student_id = ".$id;
			$result = mysqli_query($conn, $update_flag) or die(mysqli_error($conn));
						
		     while($res=mysqli_fetch_array($result)) {
						$per = $result_stud["percentage"];
			}
			if($per > 35) {
			?>
			<center><h1 class = "blink_me">...Congratulations...</h1>
			<h2>You have completed Test Successfully...!!! </h2></center>
			<?php }	
			else { ?>
			<center><h2>Sorry..! You have not completed test successfully...!!! </h2>
			<br><h2>Please try again later..!!</h2>
			</center>
			<?php } ?>			
		 </div>
        </form>
           
	</div>

 <?php get_footer(); ?>

