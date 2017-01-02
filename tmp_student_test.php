<?php /* Template Name: tmp_student_test */ ?>

<?php
get_header();
include_once("connection.php");
 ?>
	<div id="primary" class="content-area boxed">
		<form action="" method = "post" id = "frm_manage_user_dashboard">
			<div id = "main_container">
				<input type = "button" name = "logout" value = "Logout" class = "top_btns1">
				<a href = " http://localhost/wordpress_onlinetest/dashboard/" ><input type = "button" name = "dashboard" value = "Dashboard" class = "top_btns1"></a>
				<input type = "button" name = "delete_test" value = "Delete" class = "top_btns1">
				<a href = "http://localhost/wordpress_onlinetest/add_test_category/" ><input type = "button" name = "add_test" value = "Add" class = "top_btns1">
			
					<div id = "sub_container">

						<!-- List all the values in the table -->

						<?php 
						echo '<table id = "display_user_data">
							 <tr><th class = "table_heading" colspan = "7">User Management</th></tr>
							 <tr>
							 <th>&nbsp;</th>
							 <th> Student Name </th>
							 <th> Email-ID </th>
							 <th> Contact Number </th>
							 <th> Course </th>
							 <th> Assigned Test</th>
							 <th> Edit </th>
							 </tr>';
							
							//$sql="SELECT student_id, CONCAT(fname,' ',lname) AS Name, email_id, phone_no, course_name, test_category_id from student";
							 $sql="SELECT student_id, fname, email_id, phone_no, course_name, test_category_id from student";
							$rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));
							while($result=mysqli_fetch_array($rs))
							{
							echo '<tr class = "table_row">
							<td><input type = "checkbox" name = "no_checkbox[]" value = ""></td>
							<td> '.$result["fname"].'</td>
							<td> '.$result["email_id"].'</td>
							<td> '.$result["phone_no"].'</td>
							<td> '.$result["course_name"].'</td>
							<td> '.$result["test_category_id"].'</td>
							<td><a href= "http://localhost/wordpress_onlinetest/add_test_category/"><input type = "button" name = "edit_questions" style="background:url(http://localhost/wordpress_onlinetest/wp-content/uploads/2016/10/edit2-e1477292824549.jpg) no-repeat;"></a></td>
							
							</tr>';
							}
							echo "</table>";
						?>

						
		

					</div>
				</div>
		</form>
</div>
<?php get_footer(); ?>