  <?php /* Template Name: tmp_display_questions_for_test */ ?>
  <?php
  session_start();
  include_once("connection.php");?>



<!--Function for Timer-->
<script type="text/javascript">
function formatTime(seconds) {
    var h = Math.floor(seconds / 3600),
        m = Math.floor(seconds / 60) % 60,
        s = seconds % 60;
    if (h < 10) h = "0" + h;
    if (m < 10) m = "0" + m;
    if (s < 10) s = "0" + s;
    return h + ":" + m + ":" + s;
}

var counter = setInterval(timer, 1000);

function timer() {
    count--;
    if (count < 0) { 
      alert("Time Up"); 
      window.location = 'http://localhost/wordpress_onlinetest/finish-page/?test_category_id='+id+'&student_no='+student_no; 
      return clearInterval(counter);}
    document.getElementById('status').innerHTML = "Time Left : " + formatTime(count);
    //document.getElementById('status').style.color = "red";
    
   
}

<?php     
        $id = $_GET['test_category_id'];
        $sql1="SELECT time FROM test_category where test_category_id = ".$id; 
        $result=mysqli_query($conn,$sql1) or die(mysqli_error($conn));
        $row = mysqli_fetch_array($result);
    ?>
    var time = "<?php echo $row['time']; ?>";
    var seconds = time * 60;
    var count = seconds;

formatTime(seconds);
</script>


  <?php get_header();

   ?>
  <div id="primary" class="content-area boxed">
    <form id = "frm_display_questions" action = "" method = "post">
      <div id = "main_container">
        <div id = "sub_container">
                  <div id = "title" style = "color:blue; text-align:center;padding-top:-2px;"><h3>Test Conductor</h3></div>
                  <div id ="question_display" style = "border:1px solid black;">
                  <table id = "questions">
                    <?php
                  $id = $_GET['test_category_id'];
                   $sql = "SELECT COUNT(question_no) FROM questions where test_category_id =".$id;  
                $rs_result = mysqli_query($conn, $sql) or die(mysqli_error($conn));  
                $row = mysqli_fetch_array($rs_result);  
                $total_records = $row[0];  
                if (mysqli_num_rows($rs_result)== 0){
                  echo "No Questions for Test.";
                }
                else {
                    $sr_no = 1;
                    $sql1="SELECT * FROM questions where test_category_id = '".$id."' LIMIT 0,1"; /*order by RAND() LIMIT 1 OFFSET $a";*/
                    $result=mysqli_query($conn,$sql1) or die(mysqli_error($conn));
                    if($result === FALSE) { 
                      die(mysql_error()); // TODO: better error handling
                    }

                    while ($row = mysqli_fetch_array($result))
                    {
                       
                      $ques_no = $row['question_no'];
                      $ques = $row['question'];
                      $opt1 = $row['opt1'];
                      $opt2 = $row['opt2'];
                      $opt3 = $row['opt3'];
                      $opt4 = $row['opt4'];
                        echo "<tr><td width = '33.33%'><div id = 'status' class = 'blink_me' style = 'font-size:16px;'></div></td>
                              <td width = '33.33%'><div id = 'quest_no' style = 'text-align:center; font-size:16px;'>Question No : ". $sr_no ."</div></td>
                              <td width = '33.33%'><div>&nbsp;</div></td>
                        </tr>";
                        echo "<tr>";
                        echo "<td  colspan = '3'><div id = 'question' style = 'border:1px solid black!important; border-radius:5px; margin:2px; padding: 5px; height:100px;'>".$ques."</div></td></tr>";  
                        echo "<tr><td width = '100%!important'>1. <input type='radio' name='answer' value='option1' id = 'op1' class = 'answer'>" . " " . $opt1 . "</td></tr>";
                        echo "<tr><td width = '100%!important'>2. <input type='radio' name='answer' value='option2' id = 'op2' class = 'answer'>" . " " . $opt2 . "</td></tr>";
                        echo "<tr><td width = '100%!important'>3. <input type='radio' name='answer' value='option3' id = 'op3' class = 'answer'>" . " " . $opt3 . "</td></tr>";
                        echo "<tr><td width = '100%!important'>4. <input type='radio' name='answer' value='option4' id = 'op4' class = 'answer'>" . " " . $opt4 . "</td></tr>";  
                        echo "<tr><td width = '100%!important'><input type='hidden' value='$ques_no' name='question_no' id = 'question_no'></td></tr>";
                       
                    }  
                  }  
   

    

            ?>       </table> 
          <input type='hidden' value='$total_records' name='total_records'>
          <input type='button' id = 'next' name='next' value='Next' class = 'next_question' disabled>
          <!--input type='button' id = 'prev' name='prev' value='Previous' class = 'prev_question'-->
          <input type='button' id = 'finish' name='finish' value='Finish'>
          
                 </div>
              </div>
               </div>
          </form>
             
    </div>
  <?php

      
  ?>

   <?php get_footer(); ?>


<script type="text/javascript">
/*$(document).ready(function(){
 $("#sub_container").on("click",".next_question",function(event){ 
 if($(".answer").attr('checked', false)) {
    alert("please choose any one answer.");
 }
});
});*/
</script>

  <!--Code to save data through AJAX-->
<script type="text/javascript">  
var id = "<?php echo $_GET['test_category_id'];?>";     
var student_id = "<?php echo $_GET['student_id'];?>";
$(document).ready(function(){ 
//$('input[type=radio]').change(function(){     
$('#question_display').on('click', 'input[name=answer]:radio', function() {     
 $('input[type="button"]').prop('disabled', false);
    var question_no = $('#question_no').val();
    var answer = $(this).val();   //alert(id+student_id+question_no+answer);
     var data = '&test_category_id='+id+'&student_id='+student_id+'&question_no='+question_no+'&answer='+answer;
     //alert(data);
      $.ajax({    //create an ajax request to load_page.php
        url: "http://localhost/wordpress_onlinetest/wp-content/themes/upright/saveAnswers.php?test_category_id="+id+"&student_id="+student_id,
        method: "POST",
        data: data,//async: false,                      
        success: function(){
                          
          /* $.ajax({
                        method :'POST',
                        url : 'http://localhost/wordpress_onlinetest/wp-content/themes/upright/results.php?test_category_id='+id+"&student_id="+student_id,
                        data : data,
                        success : function() {
                           //alert(data);
                        }
                    });*/
          //alert("<?php echo "answer".$_SESSION['answer']; ?>");
          //alert("<?php echo $_SESSION['correct_answer']; ?>");
         //alert("<?php echo $_SESSION['wrong_answer']; ?>");
        //alert("Record Inserted Successfully..");
        },
         error: function(){
               }
        });

  });
});
</script>





 <!--Code for NEXT Button Click-->
 <script type="text/javascript">

  $(document).ready(function() {
        $("#finish").hide(); 
       /* $("#prev").hide();*/
      });
var page_offset=0;
var id = "<?php echo $_GET['test_category_id'];?>";
var sr_no = 1;
var total_records="<?php echo $total_records;?>";
var question_no = $("#question_no").value;
 $(document).ready(function(event) {
  $("#sub_container").on("click",".next_question",function(event){
  event.preventDefault(); 

    //$("#next").click(function()
      page_offset+=1;
      sr_no+=1;
     //var count = "<?php echo $total_records; ?>";
     /*if(page_offset==1) {
     $(document).ready(function() {
    
        $("#prev").show();

      });
   }*/

     if(page_offset==total_records-1) {
      $(document).ready(function() {

        $("#next").hide();
        $("#finish").show();

      });
     }
     //Ajax Call for display next question without page refresh.
      

      $.ajax({    //create an ajax request to load_page.php
        type: "GET",
        url: "http://localhost/wordpress_onlinetest/wp-content/themes/upright/questions.php?test_category_id="+id+"&count="+page_offset+"&sr_no="+sr_no,  
        //async: false,           
        dataType: "html",   //expect html to be returned                
        success: function(response){       

            $("#questions").html(response); 
           
           
            //alert(response);
        }

});
});
});
</script>


<!--Code for PREVIOUS Button Click-->
<script type="text/javascript">
/* 
var page_offset=0;
var id = "<?php echo $_GET['test_category_id'];?>";
var sr_no = 1;
var total_records="<?php echo $total_records;?>";
 $(document).ready(function() {
  $("#sub_container").on("click",".prev_question",function(event){
 event.preventDefault();
    //$("#next").click(function()
      page_offset-=1;
      sr_no-=1;
     //var count = "<?php echo $total_records; ?>";
     /*if(page_offset==total_records-1) {
      $(document).ready(function() {
        $("#next").show();
        $("#finish").show();

      });
     }*/
 /*   if(page_offset==0) {
     $(document).ready(function() {
      
        $("#prev").hide();

      });
   }

      $(document).ready(function() {
       // $("#finish").hide();
        $("#next").show();
      });
     //Ajax Call for display next question without page refresh.
      
      $.ajax({    //create an ajax request to load_page.php
        type: "GET",
        url: "http://localhost/wordpress_onlinetest/wp-content/themes/upright/questions.php?test_category_id="+id+"&count="+page_offset+"&sr_no="+sr_no,  
        //async: false,           
        dataType: "html",   //expect html to be returned                
        success: function(response){                    
            $("#questions").html(response); 
            //alert(response);
        }

});
});
});
*/
</script>


<script type="text/javascript">
$(document).ready(function(){
  $("#finish").click(function(event){
    event.preventDefault();
   var id = "<?php echo $_GET['test_category_id'];?>";
   var student_id = "<?php echo $_GET['student_id'];?>";
     window.location = 'http://localhost/wordpress_onlinetest/finish-page?test_category_id='+id+'&student_id='+student_id; 
     //alert("hi");
  });
});


</script>

