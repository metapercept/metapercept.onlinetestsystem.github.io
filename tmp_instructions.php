<?php /* Template Name: tmp_instructions */ ?>

<?php session_start(); ?>
<?php
get_header();
include_once("connection.php");
 ?>
 <div class = "top_btns" style="margin-bottom:10px;">
			<a href ='http://localhost/wordpress_onlinetest/student-logout/'><i class="fa fa-sign-out" aria-hidden="true" title = "Logout"></i></a>
		</div>
	<div id="primary" class="content-area boxed">
		<form action="" method = "post" id = "frm_instructions">
			<div id = "main_container">
				
					<div id = "sub_container">

						<!-- List all the values in the table -->

						<?php 
						echo '<table id = "display_instructions">
							 <tr><td class = "table_heading" style = "color:blue;">Instructions for Test..
							 <br> Please Read the following Instructions Carefully.. <br>
							 </td></tr>';
							 
							$sql="SELECT instructions from test_category where test_category_id = '". $_GET['test_category_id'] . "';";
							$rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));
							/* $id = $_GET['test_category_id'];
							 $student_id = $_Get['student_id'];
							 $sql="SELECT instructions from test_category where test_category_id = '". $id . "';";
							$rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));*/
							while($result=mysqli_fetch_array($rs))
							{
							echo '<tr class = "table_row">
							<td style = "font-weight:bold; font-size:18px;"> '.$result["instructions"].'</td>
							</tr>';
							}
							echo "<td>
						    <input type = 'button' name = 'save' id = 'save' class = 'save' value = 'Start Test'></td>";
							echo "</table>";
						?>

						
		

					</div>
				</div>
		</form>
</div>
<?php get_footer(); ?>

<!--Function to Start Test-->
		
<script type="text/javascript">

$(document).ready(function(){
	$(".save").click(function() { 
		var id = "<?php echo $_GET['test_category_id']; ?>";
		var student_id  = "<?php echo $_GET['student_id']; ?>";

		//var student_id = "<?php echo $_SESSION['student_id'];?>";
		//var id = "<?php echo $_SESSION['test_category_id'];?>";
    window.location = 'http://localhost/wordpress_onlinetest/display-questions?test_category_id='+id+"&student_id="+student_id;
    });
});
</script>