<?php /* Template Name: tmp_update_student_page */ ?>


<?php
include_once("connection.php");
 ?>

<?php
$sql="SELECT fname, lname, email_id, phone_no, password, course_name from student where student_id = '". $_GET['student_id'] . "'";
	$rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));
	while($result=mysqli_fetch_array($rs)) {
		$fname = $result["fname"];
		$lname = $result["lname"];
		$email_id = $result["email_id"];
		$phone_no = $result["phone_no"];
		$password = $result["password"];
		$course_name = $result["course_name"];;
	}



if(isset($_POST['save']))
{
	$id = $_POST['student_id'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email_id = $_POST['email_id'];
	$phone_no = $_POST['phone_no'];
	$password = $_POST['password'];
	$course_name = $_POST['course_name'];
	$sql1 = "UPDATE student SET fname = '$fname', lname = '$lname', email_id = '$email_id', phone_no = '$phone_no', password = '$password', course_name = '$course_name' WHERE student_id = '$id'";
	$rs1 = mysqli_query($conn,$sql1);
	header('Location: http://localhost/wordpress_onlinetest/update-student/');
}
?>


<?php
get_header();
?>
<div class = "top_btns" style="margin-bottom:10px;">
	<a href =''><i class="fa fa-question-circle" aria-hidden="true" title = "Help" style = "width:20px;"></i></a>
	<a href ='http://localhost/wordpress_onlinetest/student-dashboard/'><i class="fa fa-home" title = "Home" style = "width:20px;"></i></a>
	<a href ='http://localhost/wordpress_onlinetest/logout/'><i class="fa fa-sign-out" aria-hidden="true" title = "Logout"></i></a>
		</div>
<div id="primary" class="content-area boxed" >
		
	<form  id = "frm_update_student_page"  method = "post" action = ""> 
		
		<div id = "main_container">
					<div id = "sub_container">
						<table width = "100%" id = "update_student_table">
							<tr>
								<th colspan = 2 class = "form_heading">Student Registration</th>
							</tr>
							<tr>
								<td id = "label"><label for = "Student_id">Student Id : </label></td>
								<td id = "textbox"><input type = "text" name = "student_id" id="student_id" class = "input_buttons1" value = "<?php echo $_GET['student_id']; ?>" readonly = "readonly"></td>
							</tr>
							<tr>
								<td><label for = "fname">First Name : </label></td>
								<td><input type = "text" name = "fname" placeholder = "Enter First Name" id="fname" class = "input_buttons1" value = "<?php echo $fname; ?>" required = "required"></td>
							</tr>
							<tr>
								<td><label for = "lname">Last Name : </label></td>
								<td><input type = "text" name = "lname" placeholder = "Enter Last Name" id="lname" class = "input_buttons1" value = "<?php echo $lname; ?>" required = "required"></td>
							</tr>		
							<tr>
								<td><label for = "email_id">Email Id : </label></td>
								<td><input type="email" name="email_id" id="email_id" class = "input_buttons1" placeholder = "Enter Email id" value = "<?php echo $email_id; ?>" required = "required"></td>
							</tr>	
							<tr>
								<td><label for = "phone_no">Phone no : </label></td>
								<td><input type="tel" name="phone_no" id = "phone_no" class = "input_buttons1" placeholder = "Enter Phone No." value = "<?php echo $phone_no; ?>" required = "required"></td>
							</tr>	
							<tr>
								<td><label for = "password">Password : </label></td>
								<td><input type = "text" name = "password" placeholder = "Enter Password" id="password" class = "input_buttons1" value = "<?php echo $password; ?>" required = "required"></td>
							</tr>	
							<tr>
								<td><label for = "course_name">Course Name : </label></td>
								<td id = "dropdown_course"><select name = "course_name" id = "course_name" required = "required">
									<option value = "<?php echo $course_name; ?>"><?php echo $course_name; ?></option>
									
								<?php $sql="SELECT course_name from courses";
							$rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));
							while($result=mysqli_fetch_assoc($rs))
							{
								echo "<option value = $result[course_name]>$result[course_name]</option>"; 
							} ?>
							</select> </td>
							</tr>	
							<tr>
								<td>&nbsp;</td>
								<td class = "save_reset">
								<input type = "submit" value = "Update" id = "submit" name = "save" title = "Save">
								<input type = "reset" name = "reset" id ="reset"></td>
							</tr>
  						</table>       
  					</div>
           
             </div>
        </form>
           
	</div>

 <?php get_footer(); ?>

