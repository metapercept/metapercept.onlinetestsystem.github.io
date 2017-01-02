<?php /* Template Name: tmp_student_login */ ?>
<?php session_start(); ?>
<?php
get_header(); 

$_SESSION['student_login_status'] = 0;
//$_SESSION['student_id'] = 0;
//$_SESSION['test_caregory_id'] = 0;
?>
<?php include_once("connection.php"); ?>



<div id="primary" class="content-area boxed">
			<form action="" method="post" id="frm_student_login"> 	
				<div id = "main_container">
					<div id = "sub_container">
				
					<table width = "100%" id = "student_login_table">
						<tr>
						<th colspan = 2 class = "form_heading">Student Login</th>
						</tr>
						<tr>
							<td id = "label"><label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Email Id : </label></td>
							<td id = "textbox"><input type = "text" name = "student_email" id="student_email" class = "input_buttons1"></td>
						</tr>
						<tr>
							<td><label>Password : </label></td>
							<td><input type = "password" name = "student_pwd" id="password" class = "input_buttons1"></td>
						</tr>	
						<tr>
							<td>&nbsp;</td>
							<td class = "save_reset">
								<input type = "submit" value = "Login" id = "save" name = "submit" title = "Login">
								<input type = "reset" name = "reset" id ="reset">
							</td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td id = "message">
								<label>*Incorrect Email Id or Password..</label>
							</td>
						</tr>
  					 </table>       
  					</div>
             </div>

				
	  
                  <?php   
               		 	
						if(isset($_POST['submit'])) {
								$email_id=$_POST['student_email'];
								$password=$_POST['student_pwd'];
							if(empty($email_id)) {
								die("Please Enter Email Id");
							}
							if(empty($password)) {
								
								die("Please Enter Password");
							}

							$rs="select * from student where email_id = '$email_id' and password = '$password'";
							$result = mysqli_query($conn, $rs) or die(mysqli_error($conn));
						
							$row = mysqli_fetch_array($result);
							
							
							if($row['email_id']==$email_id && $row['password']==$password)
							{
								$student_id = $row['student_id'];
								$test_category_id = $row['test_category_id'];									 	  	
								//$_SESSION['student_login_status'] = 1;
							?>

							<script type="text/javascript">
							var student_id = "<?php echo $student_id; ?>";
							var test_category_id = "<?php echo $test_category_id; ?>";
							
							window.location.href = 'http://localhost/wordpress_onlinetest/instructions-for-test?test_category_id='+test_category_id+' &student_id= '+student_id;
							</script>
							<?php
							}
							else
							{?>
							
							<script type="text/javascript">
								alert("Incorrect Username or Password");
							</script>
							<?php
							}
						}			
             	  ?>
             </form>
             </div>
	</div>
<?php get_footer(); ?>


<script type="text/javascript">
/*$(document).ready(function() {

<?php 

$created_date = "SELECT created FROM assign_test_tbl WHERE student_id='".$student_id."'";
$res = mysqli_query($conn,$created_date);
while ($row = mysqli_fetch_array($res)) {
      	$created = $row['created'];
 
    }

$date_b = $_GET['date'];

$interval = date_diff($created,$date_b);
?>
var interval = "<?php echo $interval;?>";
alert(interval);
//echo $interval->format('%h:%i:%s');
	//$testDate = strtotime($_GET['date']);
	//$currentDate =strtotime('now');

	//$dateDiff = $currentDate-$testDate;
	//$days_between = ceil(($testDate - $currentDate) / 86400);
	//echo $days_between;
	//echo $dateDiff / (60 * 60 * 24);



	// when the link is clicked pull the information from the database and get the time
// SQL goes here

// this will give you the difference in seconds
//$diff = time() - $testDate;

// we'll pretend the time expires in 8 hours
//$expires_in = 24 * 60 * 60;

// for this example we'll pretend the expiration is 8 hours
//if($diff <= $expires_in)
//{
  // has not been more then 8 hours
//}
//else
//{
  // has been more then 8 hours
//var dateDiff = "<?php echo $days_between; ?>";
//alert(dateDiff);
//if (strtotime($testDate) >= (time() + 86400)) {
//if(dateDiff<0) {
	//alert("Your Test Time has been Expired. Please Contact to Admin.");
	//window.location = 'http://localhost/wordpress_onlinetest/test-expires';
//}



});*/
</script>



<script type="text/javascript">
$(document).ready(function() {

<?php 
	$testDate = strtotime($_GET['date']); ?> var date = "<?php echo $testDate; ?>"; alert(date); <?php
	//$currentDate =strtotime('now');

	//$dateDiff = $currentDate-$testDate;
	//$days_between = ceil(($testDate - $currentDate) / 86400);
	//echo $days_between;
	//echo $dateDiff / (60 * 60 * 24);



	// when the link is clicked pull the information from the database and get the time
// SQL goes here

// this will give you the difference in seconds
$diff = time() - $testDate;

// we'll pretend the time expires in 8 hours
$expires_in = 8 * 60 * 60;

// for this example we'll pretend the expiration is 8 hours
if($diff <= $expires_in)
{
  // has not been more then 8 hours
}
else
{
  // has been more then 8 hours
?>
//var dateDiff = "<?php echo $days_between; ?>";
//alert(dateDiff);
//if (strtotime($testDate) >= (time() + 86400)) {
//if(dateDiff<0) {
	alert("Your Test Time has been Expired. Please Contact to Admin.");
	window.location = 'http://localhost/wordpress_onlinetest/test-expires';
//}
<?php
}
?>



});
</script>

<?php
$time_one = $_GET['date'];
$time_two = now();
//$time_one = new DateTime('2010-07-29 12:43:54');
//$time_two = new DateTime('2010-07-30 01:20:45');
$difference = $time_one->diff($time_two);
echo $difference->format('%h hours %i minutes %s seconds');
?>




<script type="text/javascript">
/*var testDate = "<?php echo $_GET['date']; ?>";

// Split timestamp into [ Y, M, D, h, m, s ]
var t = "<?php echo $_GET['date']; ?>".split(/[-]/);

// Apply each element to the Date function
//var d = new Date(Date.UTC(t[0], t[1]-1, t[2]));
console.log(testDate);
//console.log(t);
//console.log(d);

// -> Wed Jun 09 2010 14:12:01 GMT+0100 (BST)

var currDate = new Date().toLocaleString();//.split(/[- : ,]/);
console.log(currDate);

$(document).ready(function() {


var days = (t - currDate) / 1000 / 60 / 60 / 24;
console.log(days);
});*/
</script>