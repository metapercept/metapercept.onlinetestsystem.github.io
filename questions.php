<?php /* Template Name: tmp_questions */ ?>
<?php
include_once("connection.php");?>

    <?php        
        /*if(isset($_POST['next']))
        {
                $total_records=$_POST['total_records'];
        }*/
        /*if(!isset($total_records))
        {
                $total_records=1;
        }*/
     //   $i = 1;
        $sr_no = $_GET['sr_no'];
       $count = $_GET['count'];
    $id = $_GET['test_category_id'];

 $sql = "SELECT COUNT(question_no) FROM questions where test_category_id =".$id;  
              $rs_result = mysqli_query($conn, $sql) or die(mysqli_error($conn));  
              $row = mysqli_fetch_array($rs_result);  
              $total_records = $row[0];  
              if (mysqli_num_rows($rs_result)== 0){
                echo "No Questions for Test.";
              }
              else {

                $sql1="SELECT * FROM questions where test_category_id = '". $id . "' LIMIT $count,1"; /*order by RAND() LIMIT 1 OFFSET $a";where test_category_id = '". $id . "'*/
                $result=mysqli_query($conn,$sql1) or die(mysqli_error($conn));
                while ($row = mysqli_fetch_array($result))
                {
                   
                  $ques_no = $row['question_no'];
                  $ques = $row['question'];
                  $opt1 = $row['opt1'];
                  $opt2 = $row['opt2'];
                  $opt3 = $row['opt3'];
                  $opt4 = $row['opt4'];
                    echo "<tr><td width = '33.33%'><div id = 'status'></div></td>
                          <td width = '33.33%'><div id = 'quest_no' style = 'text-align:center;'>Question No : ". $sr_no ."</div></td>
                          <td width = '33.33%'><div>&nbsp;</div></td>
                    </tr>";
                    echo "<tr>";
                    echo "<td  colspan = '3'><div id = 'question' style = 'border:1px solid black!important; border-radius:5px; margin:2px; padding: 5px; height:100px;'>".$ques."</div></td></tr>";  
                    echo "<tr><td>1. <input type='radio' value='option1' name='answer' id = 'op1'>" . " " . $opt1 . "</td></tr>";
                    echo "<tr><td>2. <input type='radio' value='option2' name='answer' id = 'op2''>" . " " . $opt2 . "</td></tr>";
                    echo "<tr><td>3. <input type='radio' value='option3' name='answer' id = 'op3'>" . " " . $opt3 . "</td></tr>";
                    echo "<tr><td>4. <input type='radio' value='option4' name='answer' id = 'op4'>" . " " . $opt4 . "</td></tr>";	
                   echo "<tr><td><input type='hidden' value='$ques_no' name='question_no' id = 'question_no'></td></tr>";
                }              
                }            
    ?>

    <script type="text/javascript">
    $(document).ready(function(){
$('input[type="button"]').prop('disabled', true);
});
    </script>
    
