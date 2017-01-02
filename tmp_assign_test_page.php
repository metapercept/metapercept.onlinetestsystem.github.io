<?php /* Template Name: tmp_assign_test_page */ ?>


<?php
include_once("connection.php");
require 'PHPMailer/PHPMailerAutoload.php';
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
		$course_name = $result["course_name"];

	}



/*    if(isset($_POST['save'])) {
    	$rs="insert into assign_test_tbl(student_id, test_category, assigned_date) values ('".$_POST['student_id']."', '".$_POST['test']."','".$_POST['datetime']."')";
    	$result=mysqli_query($conn,$rs)or die(mysqli_error($conn));
	}*/

	if(isset($_POST['save'])) {
    	$rs="insert into assign_test_tbl(student_id, test_category) values ('".$_POST['student_id']."', '".$_POST['test']."')";
    	$result=mysqli_query($conn,$rs)or die(mysqli_error($conn));
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
		
	<form  id = "frm_assign_test_page"  method = "post" action = ""> 
		
		<div id = "main_container">
					<div id = "sub_container">
						<table width = "100%" id = "assign_test_table">
							<tr>
								<th colspan = 2 class = "form_heading">Assign Test</th>
							</tr>
							<tr>
								<th colspan = 2 style = "color:red; font-weight:normal;">* Please Select Test from List And Allocate Date and Time. And then Assign the Test.</th>
							</tr>
							<tr>
								<td id = "label"><label for = "Student_id">Student Id : </label></td>
								<td id = "textbox"><input type = "text" name = "student_id" id="student_id" class = "input_buttons1" readonly = "readonly" value = "<?php echo $_GET['student_id']; ?>"></td>
							</tr>
							<tr>
								<td><label for = "fname">First Name : </label></td>
								<td><input type = "text" name = "fname" placeholder = "Enter First Name" id="fname" readonly = "readonly" class = "input_buttons1" value = "<?php echo $fname; ?>"></td>
							</tr>
							<tr>
								<td><label for = "lname">Last Name : </label></td>
								<td><input type = "text" name = "lname" placeholder = "Enter Last Name" id="lname" readonly = "readonly" class = "input_buttons1" value = "<?php echo $lname; ?>"></td>
							</tr>		
							<tr>
								<td><label for = "email_id">Email Id : </label></td>
								<td><input type="email" name="email_id" id="email_id" class = "input_buttons1" readonly = "readonly" placeholder = "Enter Email id" value = "<?php echo $email_id; ?>"></td>
							</tr>	
							<tr>
								<td><label for = "phone_no">Phone no : </label></td>
								<td><input type="tel" name="phone_no" id = "phone_no" class = "input_buttons1" readonly = "readonly" placeholder = "Enter Phone No." value = "<?php echo $phone_no; ?>"></td>
							</tr>	
							<tr>
								<td><label for = "password">Password : </label></td>
								<td><input type = "text" name = "password" placeholder = "Enter Password" readonly = "readonly" id="password" class = "input_buttons1" value = "<?php echo $password; ?>"></td>
							</tr>	
							<tr>
								<td><label for = "course_name">Course Name : </label></td>
								<td id = "dropdown_course"><select name = "course_name" id = "course_name" disabled = "disabled">
									<option value = "<?php echo $course_name; ?>"><?php echo $course_name; ?></option>
									<option value = "Select Course">Select Course</option>
								<?php $sql="SELECT course_name from courses";
							$rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));
							while($result=mysqli_fetch_assoc($rs))
							{
								echo "<option value = '$result[course_name]''>$result[course_name]</option>"; 
							} ?>
							</select> </td>
							</tr>	
							<tr>
								<td><label for = "test">Select Test : </label></td>
								<td id = "dropdown_test"><select name = "test" id = "test" required = "required">
									<option value = "Select Test">Select Test</option>
								<?php $sql="SELECT test_category_id,test_category from test_category where course_name = '".$course_name."'";
							$rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));
							while($result=mysqli_fetch_assoc($rs))
							{
								$test_category_id = $result["test_category_id"];
								echo "<option value = '$result[test_category]''>$result[test_category]</option>"; 
							} ?>
							</select><input type = "hidden" name = "test_category_id" value = "<?php echo $test_category_id; ?>"> </td>
							</tr>	
							<!--tr>
								<td><label for = "Date and Time">Date And Time : </label></td>
								<td><input type = "datetime-local" name = "datetime" id="datetime" class = "input_buttons1" min = "01/01/1990" max = "31/12/2050" required = "required"></td>
							</tr-->	
							<tr>
								<td>&nbsp;</td>
								<td class = "save_reset">

								<!--input type = "submit" value = "Update" id = "update" name = "update" title = "Update"-->
								<input type = "submit" value = "Assign Test" id = "submit" name = "save" title = "Assign Test" onclick = "assignTest()">
								<input type = "reset" name = "reset" id ="reset"></td>
							</tr>
							
  						</table>       
  					</div>
           
             </div>
        </form>
           
	</div>

 <?php get_footer(); ?>

<script type="text/javascript">
/*$(document).ready(function() {
	$('#submit').click(function() {
		var student_id = $('#student_id').val();
    	var test_category_id = $('#test_category_id').val();
    	var datetime = $('#datetime').val();
    	var fname = $('#fname').val();
    	var lname = $('#lname').val();
    	var email_id = $('#email_id').val();
    	var password = $('#password').val();
    	var test = $('#test').val();
		var data = '&student_id='+student_id+'&test_category_id='+test_category_id+'&datetime='+datetime+'&fname='+fname+'&lname='+lname+'&email_id='+email_id+'&password='+password+'&test='+test;
		$.ajax({    //create an ajax request to load_page.php
        url: "http://localhost/wordpress_onlinetest/wp-content/themes/upright/sent_mail.php",
        method: "POST",
       	data: data,
        success: function(){
        	alert("mail sent Successfully..");
        },
         error: function(){
               }
        });


	});
});*/
</script>

<script type="text/javascript">
function assignTest() {
<?php


/*Mail Function*/
//if(isset($_POST['test']) && isset($_POST['datetime'])) {
//	if(isset($_POST['save']))
//	{
if(isset($_POST['save'])) {
		$id = $_POST['student_id'];
		$test_category_id = $_POST['test_category_id'];
		$datetime = $_POST['datetime'];
		$test_category = $_POST['test'];
		$sql1 = "UPDATE student SET test_category_id = '$test_category_id', test_category = '$test_category', assigned_date = '$datetime' where student_id = $id";
		$rs1 = mysqli_query($conn,$sql1);

		$sql="SELECT created from student where student_id = '". $_GET['student_id'] . "'";
		$rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));
		while($result=mysqli_fetch_array($rs)) {
		$created = $result["created"];
		}


	/*mail function*/
		$message = "<html><body>";
		$message.="<h3> Hi ". $_POST['fname']." ".$_POST['lname']."<br>";
		$message.="Following are your test details. Please login to the following link and use following credentials to start the Test..<br> All The Best.!!!</h3><br>";
		$message.="Student Id : ". $_POST['student_id']."<br>";
		$message.="Username : ". $_POST['email_id']."<br>";
		$message.="Password : ". $_POST['password']."<br>";
		$message.="Test : ". $_POST['test']."<br>";
		/*$message.="Date and Time : ". $_POST['datetime']."<br>";*/
		$message.="Date and Time : ". $created."<br>";
		$message.="Test url : <a class = 'link' href = 'http://localhost/wordpress_onlinetest/student-login?date=$created&id=$id'>Start Test</a>";
		//$message.="Test url : <span class = 'link'>Start Test</span>";
		$message.="</html></body>";
		
		$mail = new PHPMailer;
		$mail->isSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->SMTPAuth = true;
		$mail->Username = 'anaghadeshpande1990';
		$mail->Password = 'password123!@#';
		$mail->SMTPSecure = 'tls';
		$mail->Port = 587; 
		$mail->From = 'anagha@metapercept.com';
		$mail->FromName = 'Anagha D';
		$mail->addAddress($_POST['email_id'], 'anagha');
		$mail->WordWrap = 50;
		$mail->Subject = 'Test Assignment';
		$mail->Body = $message;
		$mail->isHTML(true);
		if(!$mail->send()) {
		   echo 'Message could not be sent.';
		   echo 'Mailer Error: ' . $mail->ErrorInfo;
		   
		} 
		
		
	}
	//}
//}?>

window.location='http://localhost/wordpress_onlinetest/assign-test/';
} 
</script>