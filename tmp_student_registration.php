<?php /* Template Name: tmp_student_registration */ ?>

<?php
include_once("connection.php");
 ?>
 <?php
if(isset($_POST[save])) {
		$fname=$_POST['fname']; 
		$lname=$_POST['lname'];
		$email_id=$_POST['email_id'];
		$phone_no=$_POST['phone_no'];
		$password=$_POST['password'];
		$course_name =$_POST['course_name'];
		$test_category=$_POST['test_category'];
		$email_id = filter_var($email_id, FILTER_SANITIZE_EMAIL);

		// Validate e-mail
		if (!filter_var($email_id, FILTER_VALIDATE_EMAIL) === false) {
		    //echo("$email is a valid email address");
		    $rs="insert into student (fname, lname, email_id, phone_no, password, test_category,course_name) values('$fname','$lname','$email_id','$phone_no','$password','$test_category','$course_name')";
					$result = mysqli_query($conn, $rs) or die(mysqli_error($conn)); 
		} else {
		    //echo("$email is not a valid email address");
		}		

		
		 
		//echo "New record created successfully.";
	//header('Location: http://localhost/wordpress_onlinetest/manage-student-dashboard/');

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
<div id="primary" class="content-area boxed">
		
	<form id = "frm_add_student" action = "" method = "post">
		<div id = "main_container">			
					<div id = "sub_container">
						<table width = "100%" id = "add_student_table">
							<!--tr>
								<div class = "top_btns">
									<a href ='http://localhost/wordpress_onlinetest/manage-student-dashboard/'><input type = "button" name = "list" id= "list" title = "Category List" style = "background:url(http://localhost/wordpress_onlinetest/wp-content/uploads/2016/11/list-alt-128-2-e1478257442174.png) no-repeat; width:40px;"></a>
								</div>
							</tr-->
							<tr>
								<th colspan = 2 class = "form_heading">Student Registration</th>
							</tr>
							<!--tr>
								<td id = "label"><label for = "Student_id">Student Id : </label></td>
								<td id = "textbox"><input type = "text" name = "student_id" id="student_id" class = "input_buttons1"></td>
							</tr-->
							<tr>
								<td><label for = "fname">First Name : </label></td>
								<td><input type = "text" name = "fname" placeholder = "Enter First Name" id="fname" class = "input_buttons1" required = "required"></td>
							</tr>
							<tr>
								<td><label for = "lname">Last Name : </label></td>
								<td><input type = "text" name = "lname" placeholder = "Enter Last Name" id="lname" class = "input_buttons1" required = "required"></td>
							</tr>		
							<tr>
								<td><label for = "email_id">Email Id : </label></td>
								<td><input type="email" name="email_id" id="email_id" class = "input_buttons1" placeholder = "Enter Email id" required = "required"></td>
							</tr>	
							<tr>
								<td><label for = "phone_no">Phone no : </label></td>
								<td><input type="tel" name="phone_no" id = "phone_no" class = "input_buttons1" placeholder = "Enter Phone No." required = "required"></td>
							</tr>	
							<tr>
								<td><label for = "password">Password : </label></td>
								<td><input type = "password" name = "password" placeholder = "Enter Password" id="password" class = "input_buttons1" required = "required">
									<input type = "button" name = "show" value = "Show" id = "showHidePwd" style = "float:left;"><!--input type="checkbox" id="showHide" /><label for="showHide" id="showHideLabel">Show Password</label--></td>
							</tr>	
							<tr>
								<td><label for = "course_name">Course Name : </label></td>
								<td id = "dropdown_course"><select name = "course_name" id = "course_name" required = "required">
									<option value = "Select_Course">Select Course</option>
								<?php $sql="SELECT course_id, course_name from courses";
							$rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));
							while($result=mysqli_fetch_assoc($rs))
							{
								echo "<option value = '$result[course_name]'>$result[course_name]</option>"; 
							} ?>
							</select> </td>
							</tr>	
							
							<tr>
								<td>&nbsp;</td>
								<td class = "save_reset">
								<input type = "submit" value = "Save" id = "submit" name = "save" title = "Save">
								<input type = "reset" name = "reset" id ="reset"></td>
							</tr>
  						</table>       
  					</div>
           <?php   
               		 	

             	  ?> 
             </div>
        </form>
           
	</div>
 <?php get_footer(); 
?>


<!-- Functionality to show hide password-->
<script type="text/javascript">
$(document).ready(function() {
  $("#showHidePwd").click(function() {
    if ($("#password").attr("type") == "password") {
      $("#password").attr("type", "text");
      $("#showHidePwd").attr("value","Hide");

    } else {
      $("#password").attr("type", "password");
      $("#showHidePwd").attr("value","Show");
    }
  });
});
</script>