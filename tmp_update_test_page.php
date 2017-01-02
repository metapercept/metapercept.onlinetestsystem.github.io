<?php /* Template Name: tmp_update_test_page */ ?>


<?php
include_once("connection.php");
 ?>

<?php
$sql="SELECT test_category_id, course_name, test_category, no_of_questions, time, test_secrete_code, instructions from test_category where test_category_id = '". $_GET['test_category_id'] . "'";
$rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));
while($result=mysqli_fetch_array($rs))
	{
		$id = $result["test_category_id"];
		$course_name = $result["course_name"];
		$test_category = $result["test_category"];
		$no_of_questions = $result["no_of_questions"];
		$time = $result["time"];
		$code = $result["test_secrete_code"];
		$instructions = $result["instructions"];
	}


if(isset($_POST['save']))
{
	$id = $_POST["test_category_id"];
		$course_name = $_POST["course_name"];
		$test_category = $_POST["test_category"];
		$no_of_questions = $_POST["no_of_ques"];
		$time = $_POST["time"];
		$code = $_POST["test_secrete_code"];
		$instructions = $_POST["instructions"];
	
	$sql1 = "UPDATE test_category SET course_name = '$course_name', test_category = '$test_category', no_of_questions = '$no_of_questions', time = '$time', test_secrete_code = '$code', instructions = '$instructions' WHERE test_category_id = '$id'";
	$rs1 = mysqli_query($conn,$sql1);
	header('Location: http://localhost/wordpress_onlinetest/update-test/');
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
		
	<form  id = "frm_update_test_page"  method = "post" action = ""> 
		
		<div id = "main_container">
					<div id = "sub_container">
						<table width = "100%" id = "update_test_table">
							<tr>
								<th colspan = 2 class = "form_heading">Update Test Details</th>
							</tr>
							 <tr>
							 <td id = "label"><label for = "test_category_id">Test Id : </label></td>
								<td id = "textbox"><input type ='text' name = 'test_category_id' readonly = 'readonly' id='test_category_id' class = 'input_buttons1' value = "<?php echo $_GET['test_category_id']; ?>" style="width:50px;"></td>
							</tr>
							 <tr>
							 	<td><label for = "course">Select Course : </label></td>
								<td id = "dropdown_course"><select name = 'course_name' required = "required">
									<option value = "<?php echo $course_name; ?>"><?php echo $course_name; ?></option>
									<option value = "Select Course">Select Course</option>
								<?php 
								$sql="SELECT course_name from courses";
								$rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));
								while($result=mysqli_fetch_assoc($rs))
								{
									echo "<option value = '$result[course_name]'>$result[course_name]</option>"; 
								}?>
								</select> </td>
							 </tr>
							<tr>
								<td><label for = "test_category">Test Description : </label></td>
								<td><input type = "text" name = "test_category" placeholder = "Test Description"  class = "input_buttons1" value = "<?php echo $test_category; ?>" required = "required"></td>
							</tr>	
							<tr>
								<td><label for = "no_of_questions">No. Of Questions : </label></td>
								<td><input type="number" min="1" max="100" step="1" value = "<?php echo $no_of_questions; ?>" name = "no_of_ques" class = "input_buttons1" placeholder = "No Of Questions" required = "required"></td>
							</tr>	
							<tr>
								<td><label for = "time">Time for Test(in Minutes) : </label></td>
								<td><input type="number" min="1" max="120" step="1" value = "<?php echo $time; ?>" name="time" class = "input_buttons1" placeholder = "Time for test"  required = "required" ></td>
							</tr>
							<tr>
								<td><label for = "test_secrete_code">Test Code : </label></td>
								<td><input type = "text" name = "test_secrete_code" placeholder = "Test Code" class = "input_buttons1" value = "<?php echo $code; ?>" required = "required"></td>
							</tr>		
							<tr>
								<td><label for = "instructions">Test Instructions : </label></td>
								<td><textarea col = 5 row = 5 name = "instructions" placeholder = "Test Instructions" required = "required"><?php echo $instructions;; ?></textarea>
							</tr>	
						
							<tr>
								<td>&nbsp;</td>
								<td class = "save_reset">
								<input type = "submit" value = "Update" id = "save" name = "save" title = "Save">
								<input type = "reset" name = "reset" id ="reset"></td>
							</tr>
							<tr><td><p id = "result"></p></td></tr>
  						</table>       
  					</div>
           
             </div>
        </form>
           
	</div>

<!--script src='../wp-content/themes/upright/insert.js'></script-->
 <?php get_footer(); ?>

