<?php /* Template Name: tmp_manage_test */ ?>

<?php
get_header();
include_once("connection.php");
 ?>
 <div class = "top_btns" style="margin-bottom:10px;">
			<a href ='http://localhost/wordpress_onlinetest/dashboard/'><input type = "button" name = "home" id= "home" title = "Home" style = "background:url(http://localhost/wordpress_onlinetest/wp-content/uploads/2016/11/home-1-e1478254604371.jpg) no-repeat; width : 50px; height : 40px;"></a>
			<a href ='http://localhost/wordpress_onlinetest/logout/'><input type = "button" name = "logout" id= "logout" title = "Logout" style = "background:url(http://localhost/wordpress_onlinetest/wp-content/uploads/2016/11/logout-e1478256134465.jpg) no-repeat; width : 50px; height : 40px;"></a>
		</div>
	<div id="primary" class="content-area boxed">
		<form action="" method = "post" id = "frm_manage_test">
			<div id = "main_container">
					<div id = "sub_container">
						<div class = "top_btns">
								
								<a href ='http://localhost/wordpress_onlinetest/add_test_category/'><input type = "button" name = "add" id= "add" title = "Add Question" style = "background:url(http://localhost/wordpress_onlinetest/wp-content/uploads/2016/11/Add-e1478255417718.png) no-repeat; width:50px;"></a>
								<input type = "submit" value = " " name = "delete" id= "delete" onclick="return confirm('Are you sure to delete this item?');" title = "Delete Question" style = "background:url(http://localhost/wordpress_onlinetest/wp-content/uploads/2016/11/Remove-1-e1478255324396.png) no-repeat; width:40px;">
						</div>
							
						<!-- List all the values in the table -->
						
						<?php 
						echo '<table id = "display_table_data">
							 <tr class = "table_row"><th class = "table_heading" colspan = "7">Test Categories</th></tr>
							 <tr class = "table_row">
							 <th>&nbsp;</th>
							 <th> Course</th>
							 <th> Description </th>
							 <th> No. Of Questions </th>
							 <th> Time Duration </th>
							 <th> Test Secrete Code </th>
							 <th> Edit Test</th>
							 <th> Manage Questions</th>
							 </tr>';
							$sql="SELECT test_category_id, course_name, test_category, no_of_questions, time, test_secrete_code from test_category";
							$rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));
							$test_category_id=$_POST['test_category_id'] ;
							while($result=mysqli_fetch_array($rs))
							{
							echo '<tr class = "table_row"> 
							<td><input type = "checkbox" name = "checkbox[]" value = "'.$result["test_category_id"].'", id="test_category_id[]"></td>
							<td> '.$result["course_name"].'</td>
							<td> '.$result["test_category"].'</td>
							<td> '.$result["no_of_questions"].'</td>
							<td> '.$result["time"].'</td>
							<td> '.$result["test_secrete_code"].'</td>
							<td class = "manage_buttons"><a href= "http://localhost/wordpress_onlinetest/add_test_category/"><input type = "button" name = "edit_questions" style="background:url(http://localhost/wordpress_onlinetest/wp-content/uploads/2016/11/edit-e1478257301754.jpg) no-repeat; width:50px;" ></a></td>
							<td class = "manage_buttons"><a href= "http://localhost/wordpress_onlinetest/manage-questions-dashboard/"><input type = "button" name = "manege_questions" style="background:url(http://localhost/wordpress_onlinetest/wp-content/uploads/2016/11/managequestion-e1478255782226.jpg) no-repeat; width:50px;"></a></td>
							</tr>';
							}
							echo "</table>";
						?>
					</div>
				</div>
		</form>
</div>
<?php get_footer(); ?>


<!--Function to delete record from table-->
<?php
if(isset($_POST['delete']))
	{ 
	    $box=$_POST['checkbox'];
		while(list($key,$val)= @each ($box))
		{
		mysqli_query($conn,"delete from test_category where test_category_id=$val");
		}
		?>
	    <script type="text/javascript">
		window.location.href=window.location.href;
		</script>
		<?php
	}
?>							
