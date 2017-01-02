<?php /* Template Name: tmp_finish_page */ ?>
<?php session_start();
include_once("connection.php");?>
<?php
 //code for result
//$_SESSION['correct_answer'] = 1;
//$_SESSION['wrong_answer'] = 1;

	// $student_id = $_GET['student_id'];
 //   //echo $student_id;
 //    $id = $_GET['test_category_id'];
 //    $correct_answer = $_SESSION['correct_answer'];
 //    $wrong_answer = $_SESSION['wrong_answer'];
 //    $marks = $_SESSION['marks'];
 //    $total_marks = $_SESSION['total_marks'];
 //    if($total_marks>=1) {
 //    $percentage = ($marks / $total_marks)*100;
	// }
 //    if($percentage>35) {
 //    	$result = "Pass";
 //    }
 //    else {
 //    	$result = "Fail";
 //    }
 //        $sql_result="insert into result(student_id, test_category_id, correct_ans, wrong_ans,marks,percentage,result) values ('$student_id','$id','$correct_answer','$wrong_answer','$marks','$percentage','$result')";
 //        $result=mysqli_query($conn,$sql_result)or die(mysqli_error($conn));
$student_id = $_GET["student_id"];
$id = $_GET['test_category_id'];

$sql_sum_marks = "SELECT SUM(marks) AS Marks FROM student_answer_tbl WHERE flag=1 AND student_id='".$student_id."'";
$res = mysqli_query($conn,$sql_sum_marks);
while ($row = mysqli_fetch_array($res)) {
      	$marks = $row['Marks'];
 
    }

$sql_total_marks = "SELECT SUM(marks) AS total_marks FROM student_answer_tbl WHERE student_id='".$student_id."'";
$res1 = mysqli_query($conn,$sql_total_marks);
while ($row1 = mysqli_fetch_array($res1)) {
       $total_marks = $row1["total_marks"]; 
    }



$sql1 = "SELECT count(flag) AS total_correct_ans FROM student_answer_tbl WHERE flag = 1 and student_id='".$student_id."'"; 
    $result=mysqli_query($conn,$sql1) or die(mysqli_error($conn));
    while ($row2 = mysqli_fetch_array($result)) {
       $correct_ans = $row2["total_correct_ans"]; 
    }

$sql_total_questions = "SELECT COUNT(id) as total_questions FROM student_answer_tbl WHERE student_id='".$student_id."'";
$res2 = mysqli_query($conn,$sql_total_questions);
while ($row3 = mysqli_fetch_array($res2)) {
       $total_questions = $row3['total_questions'];
    }


$wrong_answer = $total_questions - $correct_ans;

 if($total_marks>=1) {
    $percentage = ($marks / $total_marks)*100;
	}
    if($percentage>35) {
    	$result = "Pass";
    }
    else {
    	$result = "Fail";
    }
        $sql_result="insert into result(student_id, test_category_id, correct_ans, wrong_ans,marks,percentage,result) values ('$student_id','$id','$correct_ans','$wrong_answer','$marks','$percentage','$result')";
        $result=mysqli_query($conn,$sql_result)or die(mysqli_error($conn));
?>

<?php
get_header(); ?>
<div class = "top_btns" style="margin-bottom:10px;">
			<a href ='http://localhost/wordpress_onlinetest/student-logout/'><i class="fa fa-sign-out" aria-hidden="true" title = "Logout"></i></a>
		</div>
	<div id="primary" class="content-area boxed">
		<form id = "frm_result" action="" method = "post" >
			<div id = "main_container">
				<div id = "sub_container">
					<table id = "display_result" style = "border:1px solid navy;"> 
				  <?php
				  //code to get test category name
 					$sql_test="SELECT test_category from test_category where test_category_id = '". $_GET['test_category_id'] . "'";
					$rs_test = mysqli_query($conn, $sql_test) or die(mysqli_error($conn));
					while($result_test=mysqli_fetch_array($rs_test)) {
						$test = $result_test["test_category"];
					}
				  //code to get student name
				  $sql_stud="SELECT fname, lname from student where student_id = '". $_GET['student_id'] . "'";
					$rs_stud = mysqli_query($conn, $sql_stud) or die(mysqli_error($conn));
					while($result_stud=mysqli_fetch_array($rs_stud)) {
						$fname = $result_stud["fname"];
						$lname = $result_stud["lname"];
					}
               
               		//code to get result
                  $sql_res="SELECT * FROM result where test_category_id = '".$_GET['test_category_id']."' and student_id='".$_GET['student_id']."'";
                  $result_res=mysqli_query($conn,$sql_res) or die(mysqli_error($conn));
                  if($result_res === FALSE) { 
                    die(mysql_error()); // TODO: better error handling
                  }

                  while ($row_res = mysqli_fetch_array($result_res))
                  {
                     
                    $correct_ans = $row_res['correct_ans'];
                    $wrong_ans = $row_res['wrong_ans'];
                    $marks = $row_res['marks'];
                    $percentage = $row_res['percentage'];
                    $result = $row_res['result'];
                  } ?>
                    <tr>
								<th colspan = 2 class = "form_heading">YOUR RESULT</th>
							</tr>
							<!--tr>
								<td id = "label"><label for = "Student_id">Student Id : </label></td>
								<td id = "textbox"><input type = "text" name = "student_id" id="student_id" class = "input_buttons1" value = "<?php //echo $_GET['student_id']; ?>"></td>
							</tr-->
							<tr>
								<td><label for = "name">Name : </label></td>
								<td><input type = "text" name = "fname" id="fname" class = "input_buttons1" readonly = "readonly" value = "<?php echo $fname ." ". $lname."."; ?>"></td>
							</tr>
								
							<tr>
								<td><label for = "test">Test : </label></td>
								<td><input type="text" name="test" id="test" class = "input_buttons1" readonly = "readonly" value = "<?php echo $test; ?>"></td>
							</tr>	
							<tr>
								<td><label for = "correct_ans">Correct Answers : </label></td>
								<td><input type="text" name="correct_ans" id = "correct_ans" class = "input_buttons1" readonly = "readonly" value = "<?php echo $correct_ans; ?>"></td>
							</tr>	
							<tr>
								<td><label for = "wrong_ans">Wrong Answers : </label></td>
								<td><input type = "text" name = "wrong_ans" id="wrong_ans" class = "input_buttons1" readonly = "readonly" value = "<?php echo $wrong_ans; ?>"></td>
							</tr>	
							<tr>
								<td><label for = "marks">Marks : </label></td>
								<td><input type = "text" name = "marks" id="marks" class = "input_buttons1" readonly = "readonly" value = "<?php echo $marks; ?> out of <?php echo $total_marks;?>"></td>
							</tr>	
							<tr>
								<td><label for = "percentage">Percentage : </label></td>
								<td><input type = "text" name = "percentage" id="percentage" class = "input_buttons1" readonly = "readonly" value = "<?php echo $percentage; ?>%"></td>
							</tr>	
							<tr>
								<td><label for = "result">Result : </label></td>
								<td><input type = "text" name = "result" id="result" readonly = "readonly" class = "input_buttons1" value = "<?php echo $result; ?>"></td>
							</tr>	
							<tr>
								<td>&nbsp;</td>
								<td class = "save_reset">
								<input type = "submit" value = "Finish" id = "submit" name = "save" title = "Save">
							</tr>
                     
      
					
					</table>
				</div>
			</div>
		</form>
</div>
<?php get_footer(); ?>


<script type="text/javascript">
$(document).ready(function(){
  $("#submit").click(function(event){
  	var student_id = "<?php echo $_GET['student_id']; ?>";
    event.preventDefault();
     window.location = 'http://localhost/wordpress_onlinetest/test_end_page?student_id='+student_id;
  });
});


</script>
