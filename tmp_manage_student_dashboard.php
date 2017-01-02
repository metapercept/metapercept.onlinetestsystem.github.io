<?php /* Template Name: tmp_manage_student_dashboard */ ?>

<?php
get_header();
include_once("connection.php");
 ?>
	<div id="primary" class="content-area boxed">
		<form action="" method = "post" id = "frm_manage_student_dashboard">
			<div id = "main_container">
				
				<!--input type = "button" name = "delete_test" value = "Delete" class = "top_btns1"-->
			
					<div id = "sub_container">

						<div class = "top_btns">
								<a href ='http://localhost/wordpress_onlinetest/student-registration/'><input type = "button" name = "add" id= "add" title = "Add Question" style = "background:url(http://localhost/wordpress_onlinetest/wp-content/uploads/2016/11/Add-e1478255417718.png) no-repeat; width:50px;"></a>
								<input type = "submit" value = "" name = "delete" id= "delete" title = "Delete Question" onclick="return confirm('Are you sure to delete this item?');" style = "background:url(http://localhost/wordpress_onlinetest/wp-content/uploads/2016/11/Remove-1-e1478255324396.png) no-repeat; width:40px;"></a>	
						</div>
							
						<!-- List all the values in the table -->

						<?php 
						echo '<table id = "display_student_data">
							 <tr><th class = "table_heading" colspan = "7">Student Management</th></tr>
							 <tr>
							 <th>&nbsp;</th>
							 <th> Student Name </th>
							 <th> Email-ID </th>
							 <th> Contact Number </th>
							 <th> Course </th>
							 <th> Test Category </th>
							 <th> Assigned Test</th>
							 <th> Edit </th>
							 </tr>';
							
							//$sql="SELECT student_id, CONCAT(fname,' ',lname) AS Name, email_id, phone_no, course_name, test_category_id from student";
							 $sql="SELECT student_id, fname, email_id, phone_no, course_name, test_category, assign_test from student";
							$rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));
							while($result=mysqli_fetch_array($rs))
							{
							echo '<tr class = "table_row">
							<td><input type = "checkbox" name = "checkbox[]" value = "'.$result["student_id"].'",id="student_id[]"></td>
							<td> '.$result["fname"].'</td>
							<td> '.$result["email_id"].'</td>
							<td> '.$result["phone_no"].'</td>
							<td> '.$result["course_name"].'</td>
							<td> '.$result["test_category"].'</td>
							<td> '.$result["assign_test"].'</td>
							<td><a href= "http://localhost/wordpress_onlinetest/student-registration/"><input type = "button" name = "edit_questions" style="background:url(http://localhost/wordpress_onlinetest/wp-content/uploads/2016/11/edit-e1478257301754.jpg) no-repeat; width:50px;"></a></td>
							
							</tr>';
							}
							echo "</table>";
						?>

						
		

					</div>
				</div>
		</form>
</div>
<?php get_footer(); ?>


<!--function to delete records from table-->
<?php
if(isset($_POST['delete']))
{
								
	$box=$_POST['checkbox'];
	while(list($key,$val)= @each ($box))
	{
		mysqli_query($conn,"delete from student where student_id=$val");
	}
	?>
	<script type="text/javascript">
		window.location.href=window.location.href;
	</script>
	<?php
}
?>