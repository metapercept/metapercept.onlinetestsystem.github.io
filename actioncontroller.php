
<?php
include_once("connection.php");
if(isset($_POST['save'])) {
		$course=$_POST['course_name']; 
		$test=$_POST['test_category'];
		$question=$_POST['no_of_ques'];
		$time=$_POST['time'];
		$secrete_code=$_POST['test_secrete_code'];
		$instructions=$_POST['instructions'];
		$rs="insert into test_category (course_name, test_category, no_of_questions, time, test_secrete_code, instructions) values('$course','$test','$question','$time','$secrete_code','$instructions')";
		if(mysqli_query($conn,$rs)) {
			 echo 'success';
		 }
		 exit;
		}
?>

<script type="text/javascript">
/*
$("#save").click(function(event){
	alert("hi");
var $form = $(this);
var $data = $form.serialize();
	event.preventDefault();
 jQuery.ajax({

            type: "POST", // HTTP method POST or GET
            url: "../wp-content/themes/upright/actioncontroller.php", //Where to make Ajax calls
            dataType:"text", // Data type, HTML, json etc.
            data:$data, //Form variables
            success:function(result){
            	alert(result);
                 $('#result').html(result);
            }
            });
});
*/
</script>