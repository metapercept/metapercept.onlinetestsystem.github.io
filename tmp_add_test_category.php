<?php /* Template Name: tmp_add_test_category */ ?>
<?php
include_once("connection.php");
 ?>
 <?php
if(isset($_POST['save'])) {
		$course=$_POST['course_name']; 
		$test=$_POST['test_category'];
		$question=$_POST['no_of_ques'];
		$time=$_POST['time'];
		$secrete_code=$_POST['test_secrete_code'];
		$instructions=$_POST['instructions'];
		$rs="insert into test_category (course_name, test_category, no_of_questions, time, test_secrete_code, instructions) values('$course','$test','$question','$time','$secrete_code','$instructions')";
		$result = mysqli_query($conn, $rs) or die(mysqli_error($conn)); 
	header('Location: http://localhost/wordpress_onlinetest/create-test/');
	}

?>

<?php
get_header();
?>
<div class = "top_btns" style="margin-bottom:10px;">
			<a href ='http://localhost/wordpress_onlinetest/dashboard/'><input type = "button" name = "home" id= "home" title = "Home" style = "background:url(http://localhost/wordpress_onlinetest/wp-content/uploads/2016/11/home-1-e1478254604371.jpg) no-repeat; width : 50px; height : 40px;"></a>
			<a href ='http://localhost/wordpress_onlinetest/logout/'><input type = "button" name = "logout" id= "logout" title = "Logout" style = "background:url(http://localhost/wordpress_onlinetest/wp-content/uploads/2016/11/logout-e1478256134465.jpg) no-repeat; width : 50px; height : 40px;"></a>
		</div>
<div id="primary" class="content-area boxed" >
		
	<form  id = "frm_add_test_category"  method = "post" action = ""> 
		
		<div id = "main_container">
					<div id = "sub_container">
						<table width = "100%" id = "add_test_table">
							<tr>
								<div class = "top_btns">
								<a href ='http://localhost/wordpress_onlinetest/manage-test-dashboard/'><input type = "button" name = "list" id= "list" title = "Category List" style = "background:url(http://localhost/wordpress_onlinetest/wp-content/uploads/2016/11/list-alt-128-2-e1478257442174.png) no-repeat; width:40px;"></a>
							
								</div>
							</tr>
							<tr>
								<th colspan = 2 class = "form_heading">Test Details</th>
							</tr>
							<tr>
								<td id = "label"><label for = "test_category_id">Test Id : </label></td>
								<td id = "textbox">
								<?php
								$id = $mysqli->insert_id;
									/* $sql="SELECT test_category_id from test_category";
									$rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));
									while($result=mysqli_fetch_array($rs))
									{
									 $id = $result["test_category_id"];

									}
									
									echo "<input type ='text' name = 'test_category_id' readonly = 'readonly' id='test_category_id' class = 'input_buttons1' value ='".$id."'>";*/
								?>
								<input type ='text' name = 'test_category_id' readonly = 'readonly' id='test_category_id' class = 'input_buttons1' value = '<?php ".$id."?> ' >
								 <input type = "button" name = "search" id = "search_test" value = "Search" style = "background:url(http://localhost/wordpress_onlinetest/wp-content/uploads/2016/10/search-e1477304610896.jpg) no-repeat;"></td>
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
									echo "<option value = '$result[course_name]'>$result[course_name]</option>"; 
								}?>
								</select> </td>
							 </tr>
							<tr>
								<td><label for = "test_category">Test Description : </label></td>
								<td><input type = "text" name = "test_category" placeholder = "Test Description"  class = "input_buttons1"></td>
							</tr>	
							<tr>
								<td><label for = "no_of_questions">No. Of Questions : </label></td>
								<td><input type="number" min="1" max="100" step="1" value="1" name = "no_of_ques" class = "input_buttons1" placeholder = "No Of Questions"></td>
							</tr>	
							<tr>
								<td><label for = "time">Time for Test(in Minutes) : </label></td>
								<td><input type="number" min="1" max="120" step="1" value="1" name="time" class = "input_buttons1" placeholder = "Time for test" required ></td>
							</tr>
							<tr>
								<td><label for = "test_secrete_code">Test Code : </label></td>
								<td><input type = "text" name = "test_secrete_code" placeholder = "Test Code" class = "input_buttons1"></td>
							</tr>		
							<tr>
								<td><label for = "instructions">Test Instructions : </label></td>
								<td><textarea col = 5 row = 5 name = "instructions" placeholder = "Test Instructions"></textarea>
							</tr>	
						
							<tr>
								<td>&nbsp;</td>
								<td class = "save_reset">
								<input type = "submit" value = "Save" id = "submit" name = "save" title = "Save">
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

