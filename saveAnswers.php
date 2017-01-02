<?php
session_start();?>
<?php include_once("connection.php");?>
    <?php       
   // $correct_answer = 0;
    //$wrong_answer = 0;
    $student_id = $_GET['student_id'];
    $answer=$_POST['answer'];
    $question_no=$_POST['question_no'];
    $id = $_GET['test_category_id'];
    
    $sql1 = "SELECT correct_ans, marks FROM questions WHERE test_category_id='".$id."' and question_no='".$question_no."'"; 
    $result=mysqli_query($conn,$sql1) or die(mysqli_error($conn));
    while ($row = mysqli_fetch_array($result)) {
       $correct_ans = $row["correct_ans"];
       $marks = $row["marks"]; 
/*    if($answer == $row["correct_ans"]) {            
        $correct_answer+=1;
            $marks = $marks+$row["marks"];
  */    }


    if(isset($_POST['answer'])) {
        $question_no=$_POST['question_no'];
    $sql1 = "SELECT * FROM student_answer_tbl WHERE question_no='".$question_no."'"; 
    $result=mysqli_query($conn,$sql1) or die(mysqli_error($conn));
     $rowcount=mysqli_num_rows($result);
      if($rowcount==1) {

            $rs="UPDATE student_answer_tbl SET answer = '$answer' WHERE question_no = '$question_no'";
            $result=mysqli_query($conn,$rs)or die(mysqli_error($conn));
            }
            else {
            $rs1="INSERT INTO student_answer_tbl(student_id, test_category_id, question_no, answer, correct_ans, marks) values ('$student_id', '$id', '$question_no','$answer','$correct_ans','$marks') ";
             $result1=mysqli_query($conn,$rs1)or die(mysqli_error($conn));
              
            }

   }
  
 // $rs="INSERT INTO student_answer_tbl(student_id, test_category_id, question_no, answer, correct_ans, marks) values ('$student_id', '$id', '$question_no','$answer','$correct_ans','$marks')";
    // $result=mysqli_query($conn,$rs)or die(mysqli_error($conn));
    $update_flag = "UPDATE student_answer_tbl SET flag = '1' where answer = correct_ans";
     $result=mysqli_query($conn,$update_flag) or die(mysqli_error($conn));
    $update_flag = "UPDATE student_answer_tbl SET flag = '0' WHERE answer!= correct_ans";
     $result=mysqli_query($conn,$update_flag) or die(mysqli_error($conn));

    ?>
    
