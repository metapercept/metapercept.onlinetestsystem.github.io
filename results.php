<?php 
session_start();?>
<?php include_once("connection.php"); ?>
<?php
 //code for result

  $correct_answer=0;
  $wrong_answer=0;
  $marks=0;
  $total_marks=0;


$student_id = $_GET['student_id'];
    $answer=$_POST['answer'];
    $question_no=$_POST['question_no'];
    $id = $_GET['test_category_id'];



/*$sql_sum_marks = "SELECT SUM(marks) AS Marks FROM `student_answer_tbl` WHERE flag=1 AND student_id='".$student_id."'";
$res = mysqli_query($conn,$sql_sum_marks);
$total_marks = $res['Marks'];




$sql1 = "SELECT count(flag) AS total_correct_ans FROM student_answer_tbl WHERE flag = 1 and student_id=".$student_id."'"; 
    $result=mysqli_query($conn,$sql1) or die(mysqli_error($conn));
    while ($row = mysqli_fetch_array($result)) {
       $correct_ans = $row["total_correct_ans"]; 
    }

*/

     $sql1 = "SELECT correct_ans, marks FROM questions WHERE test_category_id='".$id."' and question_no='".$question_no."'"; 
     $result=mysqli_query($conn,$sql1) or die(mysqli_error($conn));
    
     while ($row = mysqli_fetch_array($result)) {
          # code...
     
     	if($answer == $row["correct_ans"]) {     		
     		$correct_answer+=1;
               $marks = $marks+$row["marks"];

     	}
     	else {
     		$wrong_answer+=1;
     	}
          $total_marks=$total_marks+$row["marks"];
     }		
?>
<?php
 //code for result    
    if($total_marks>=1) {
    $percentage = ($marks / $total_marks)*100;
    }
    if($percentage>35) {
        $result = "Pass";
    }
    else {
        $result = "Fail";
    }




        /*$sql_insert_result="INSERT INTO result(student_id, test_category_id, correct_ans, wrong_ans,marks,percentage,result) values ('$student_id','$id','$correct_answer','$wrong_answer','$marks','$percentage','$result') ON DUPLICATE KEY UPDATE test_category_id = '$id', correct_ans = '$correct_answer', wrong_ans = '$wrong_answer', marks = '$marks', percentage = '$percentage',result = '$result'";
        $result=mysqli_query($conn,$sql_insert_result)or die(mysqli_error($conn));*/

        /* $sql_update_result="Update result SET test_category_id = '$id', correct_ans = '$correct_answer', wrong_ans = '$wrong_answer', marks = '$marks', percentage = '$percentage',result = '$result' WHERE student_id = '$student_id'";
        $result=mysqli_query($conn,$sql_update_result)or die(mysqli_error($conn));



        INSERT INTO <table> (field1, field2, field3, ...) 
VALUES ('value1', 'value2','value3', ...)
ON DUPLICATE KEY UPDATE
field1='value1', field2='value2', field3='value3', ...*/
?>