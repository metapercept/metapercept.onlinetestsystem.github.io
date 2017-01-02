<?php /* Template Name: tmp_add_questions */ ?>
<?php
include_once("connection.php");
$test_category_id = $_GET['test_category_id'];
?>


<?php 
	
		if(isset($_POST[save])) {
		
		
		$question=$_POST['question'];
	
		$opt1 = $_POST['option1'];
		$opt2 = $_POST['option2'];
		$opt3 = $_POST['option3'];
		$opt4 = $_POST['option4'];
		$correct_answer = $_POST['correct_ans'];
		$marks = $_POST['marks'];
		$time = $_POST['time'];
		$question_type = $_POST['question_type'];
		$rs="insert into questions (test_category_id, question, opt1, opt2, opt3, opt4, correct_ans, marks, time, question_type)
			values('$test_category_id','$question','$opt1','$opt2','$opt3','$opt4','$correct_answer','$marks','$time','$question_type')";
		$result = mysqli_query($conn, $rs) or die(mysqli_error($conn));
			//header('Location: http://localhost/wordpress_onlinetest/manage-questions-dashboard/');
		}
	
	

?>

<?php
get_header();

 ?>
<div class = "top_btns" style="margin-bottom:10px;">
	<a href =''><i class="fa fa-question-circle" aria-hidden="true" title = "Help" style = "width:20px;"></i></a>
	<a href ='http://localhost/wordpress_onlinetest/update-test/'><i class="fa fa-home" title = "Home" style = "width:20px;"></i></a>
	<a href ='http://localhost/wordpress_onlinetest/logout/'><i class="fa fa-sign-out" aria-hidden="true" title = "Logout"></i></a>
		</div>
<div id="primary" class="content-area boxed">
	<form id = "frm_add_questions" action = "" method = "post">
		<div id = "main_container">
			<div id = "sub_container">
				
				<table width = "100%" id = "add_question_table">
					<tr>
						<th colspan = 2 class = "form_heading">Add Questions for test</th>
						</tr>
						<tr>
							<td><label for = "question">Question : </label></td>
							<td><textarea name = "question" placeholder = "Enter Question Here" id="question" rows = 3 cols = 20 required = "required"></textarea> </td>
							</tr>	
							<tr>
								<td><label for = "Option_1">Option 1: </label></td>
								<td id = "textbox"><input type = "text" name = "option1" placeholder = "Option 1" id="option1" class = "input_buttons1" required = "required"> </td>
							</tr>
							<tr>
								<td><label for = "Option_2">Option 2: </label></td>
								<td id = "textbox"><input type = "text" name = "option2" placeholder = "Option 2" id="option2" class = "input_buttons1" required = "required"> </td>
							</tr>
							<tr>
								<td><label for = "Option_3">Option 3: </label></td>
								<td id = "textbox"><input type = "text" name = "option3" placeholder = "Option 3" id="option3" class = "input_buttons1" required = "required"> </td>
							</tr>	
							<tr>
								<td><label for = "Option_4">Option 4: </label></td>
								<td id = "textbox"><input type = "text" name = "option4" placeholder = "Option 4" id="option4" class = "input_buttons1"> </td>
							</tr>	
							<tr>
								<td><label for = "correct_answer">Correct Answer: </label></td>
								<td id = "dropdown" name = "correct_ans"><select id = "correct_answer" name = "correct_ans" required = "required">
									<option value="Choose correct answer">Choose correct answer</option>
									<option value="Option 1">Option 1</option>
									<option value="Option 2">Option 2</option>
									<option value="Option 3">Option 3</option>
									<option value="Option 4">Option 4</option>
								</select> </td>
								
							</tr>	
							<tr>
								<td><label for = "Question Type">Question Type: </label></td>
								<td id = "drp_quest_type" name = "question_type"><select id = "quest_type" name = "question_type" required = "required">
									<option value="select">Choose Question Type</option>
									<option value="radio_buttons">Radio Button</option>
									<option value="checkbox">Checkbox</option>
								</select> </td>
							</tr>	
							<tr>
								<td><label for = "marks">Marks : </label></td>
								<td><input type="number" min="1" max="5" step="1" value="1" name = "marks" id="marks" class = "input_buttons1" placeholder = "Marks for question" required = "required"></td>
							</tr>	
							<tr>
								<td><label for = "time">Time(in Minutes) : </label></td>
								<td><input type="number" min="1" max="120" step="1" value="1" name="time" class = "input_buttons1" placeholder = "Time for test" required = "required"></td>
							</tr>	
							<tr>
								<td>&nbsp;</td>
								<td>
								<input type = "submit" value = "Save" id = "save" name = "save" title = "Save">
								<input type = "reset" name = "reset" id ="reset"></td>
							</tr>
							
  						</table>       
  					</div>
             </div>
        </form>
           
	</div>

	

 <?php get_footer(); ?>

