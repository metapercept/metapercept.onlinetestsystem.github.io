<?php /* Template Name: tmp_create_test*/ ?>
<?php
include_once("connection.php");
 ?>
 <?php
 if(isset($_POST[save])) {
		$course=$_POST['course_name']; 
		$test=$_POST['test_category'];
		$question=$_POST['no_of_ques'];
		$time=$_POST['time'];
		$secrete_code=$_POST['test_secrete_code'];
		$instructions=$_POST['instructions'];
		$rs="insert into test_category (course_name, test_category, no_of_questions, time, test_secrete_code, instructions) values('$course','$test','$question','$time','$secrete_code','$instructions')";
		$result = mysqli_query($conn, $rs) or die(mysqli_error($conn)); 
		header('Location: http://localhost/wordpress_onlinetest/test-dashboard/');
	}

?>

<?php
get_header();
?>
<div class = "top_btns" style="margin-bottom:10px;">
			<a href =''><i class="fa fa-question-circle" aria-hidden="true" title = "Help" style = "width:20px;"></i></a>
			<a href ='http://localhost/wordpress_onlinetest/test-dashboard/'><i class="fa fa-home" title = "Home" style = "width:20px;"></i></a>
			<a href ='http://localhost/wordpress_onlinetest/logout/'><i class="fa fa-sign-out" aria-hidden="true" title = "Logout"></i></a>
		</div>
<div id="primary" class="content-area boxed" >
		
	<form  id = "frm_create_test"  method = "post" action = ""> 
		
		<div id = "main_container">
					<div id = "sub_container">
						<table width = "100%" id = "create_test_table">
							<tr>
								<th colspan = 2 class = "form_heading">New Test Details</th>
							</tr>
							
							 <tr>
							 	<td><label for = "course">Select Course : </label></td>
								<td id = "dropdown_course"><select name = 'course_name'>
									<option value = "Select_Course">Select Course</option>
								<?php 
								$sql="SELECT course_name from courses";
								$rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));
								while($result=mysqli_fetch_assoc($rs))
								{
									echo "<option value = $result[course_name]>$result[course_name]</option>"; 
								}?>
								</select> </td>
							 </tr>
							<tr>
								<td><label for = "test_category">Test Description : </label></td>
								<td><input type = "text" name = "test_category" placeholder = "Test Description"  class = "input_buttons1" required = "required"></td>
							</tr>	
							<tr>
								<td><label for = "no_of_questions">No. Of Questions : </label></td>
								<td><input type="number" min="1" max="100" step="1" value="1" name = "no_of_ques" class = "input_buttons1" placeholder = "No Of Questions" required = "required"></td>
							</tr>	
							<tr>
								<td><label for = "time">Time for Test(in Minutes) : </label></td>
								<td><input type="number" min="1" max="120" step="1" name="time" class = "input_buttons1" required = "required"placeholder = "Time for test" required ></td>
							</tr>
							<tr>
								<td><label for = "test_secrete_code">Test Code : </label></td>
								<td><input type = "text" name = "test_secrete_code" placeholder = "Test Code" class = "input_buttons1" required = "required"></td>
							</tr>		
							<tr>
								<td><label for = "instructions">Test Instructions : </label></td>
								<td><textarea col = 5 row = 5 name = "instructions" placeholder = "Test Instructions" required = "required"></textarea>
							</tr>	
						
							<tr>
								<td>&nbsp;</td>
								<td class = "save_reset">
								<input type = "submit" value = "Save" id = "submit" name = "save" title = "Save">
								<input type = "reset" name = "reset" id ="reset"></td>
							</tr>
  						</table>       
  					</div>
           
             </div>
        </form>
           
	</div>

<!--script src='../wp-content/themes/upright/insert.js'></script-->
 <?php get_footer(); ?>

