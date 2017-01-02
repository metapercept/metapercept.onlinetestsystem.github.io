<?php /* Template Name: tmp_update_questions */ ?>
<?php
include_once("connection.php");


$sql="SELECT question_no, test_category_id, question,opt1,opt2, opt3, opt4, correct_ans, marks, time, question_type from questions where question_no = '". $_GET['question_no'] . "'";
	$rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));
	while($result=mysqli_fetch_array($rs)) {
		$question_no = $result["question_no"];
		$test_category_id = $result["test_category_id"];
		$question = $result["question"];
		$opt1 = $result["opt1"];
		$opt2 = $result["opt2"];
		$opt3 = $result["opt3"];
		$opt4 = $result["opt4"];
		$correct_ans = $result["correct_ans"];
		$marks = $result["marks"];
		$time = $result["time"];
		$question_type = $result["question_type"];
	}

if(isset($_POST[save])) {
		$test_category_id = $_POST['test_category_id'];
		$question_no = $_POST['question_no'];
		$question=$_POST['question'];
		$opt1 = $_POST['option1'];
		$opt2 = $_POST['option2'];
		$opt3 = $_POST['option3'];
		$opt4 = $_POST['option4'];
		$correct_ans = $_POST['correct_ans'];
		$marks = $_POST['marks'];
		$time = $_POST['time'];
		$question_type = $_POST['question_type'];
		$rs="UPDATE questions SET  test_category_id = '$test_category_id', question = '$question', opt1 = '$opt1', opt2 = '$opt2', opt3 = '$opt3', opt4 = '$opt4', correct_ans = '$correct_ans', marks = '$marks', time = '$time',question_type = '$question_type' WHERE question_no = '$question_no'";
		$result = mysqli_query($conn, $rs) or die(mysqli_error($conn));
		header("Location: http://localhost/wordpress_onlinetest/manage-questions-dashboard?test_category_id=$test_category_id");
		 }
		?>

<?php
get_header();

 ?>
<div class = "top_btns" style="margin-bottom:10px;">
			<a href =''><i class="fa fa-question-circle" aria-hidden="true" title = "Help" style = "width:20px;"></i></a>
			<a href ="http://localhost/wordpress_onlinetest/manage-questions-dashboard?test_category_id=<?php echo $_GET['test_category_id']; ?>"><i class="fa fa-home" title = "Home" style = "width:20px;"></i></a>
			<a href ='http://localhost/wordpress_onlinetest/logout/'><i class="fa fa-sign-out" aria-hidden="true" title = "Logout"></i></a>
		</div>
<div id="primary" class="content-area boxed">
	<form id = "frm_update_questions" action = "" method = "post">
		<div id = "main_container">
			<div id = "sub_container">
				
				<table width = "100%" id = "update_question_table">
					<tr>
						<th colspan = 2 class = "form_heading">Update Question</th>
						</tr>
						<tr>
							<td><label for = "test_category_id">Test Category Id : </label></td>
							<td id = "textbox"><input type = "text" name = "test_category_id" placeholder = "Test_category_id" id="test_category_id" class = "input_buttons1" value = "<?php echo $test_category_id; ?>" required = "required"> </td>
							</tr>	
						<tr>
							<td><label for = "question_no">Question No : </label></td>
							<td id = "textbox"><input type = "text" name = "question_no" placeholder = "Question No" id="question_no" class = "input_buttons1" value = "<?php echo $question_no; ?>" required = "required"> </td>
							</tr>	
						<tr>
							<td><label for = "question">Question : </label></td>
							<td><textarea name = "question" placeholder = "Enter Question Here" id="question" rows = 3 cols = 20 required = "required"><?php echo $question; ?></textarea> </td>
							</tr>	
							<tr>
								<td><label for = "Option_1">Option 1: </label></td>
								<td id = "textbox"><input type = "text" name = "option1" placeholder = "Option 1" id="option1" class = "input_buttons1" value = "<?php echo $opt1; ?>" required = "required"> </td>
							</tr>
							<tr>
								<td><label for = "Option_2">Option 2: </label></td>
								<td id = "textbox"><input type = "text" name = "option2" placeholder = "Option 2" id="option2" class = "input_buttons1" value = "<?php echo $opt2; ?>" required = "required"> </td>
							</tr>
							<tr>
								<td><label for = "Option_3">Option 3: </label></td>
								<td id = "textbox"><input type = "text" name = "option3" placeholder = "Option 3" id="option3" class = "input_buttons1" value = "<?php echo $opt3; ?>" required = "required"> </td>
							</tr>	
							<tr>
								<td><label for = "Option_4">Option 4: </label></td>
								<td id = "textbox"><input type = "text" name = "option4" placeholder = "Option 4" id="option4" class = "input_buttons1" value = "<?php echo $opt4; ?>" required = "required"> </td>
							</tr>	
							<tr>
								<td><label for = "correct_answer">Correct Answer: </label></td>
								<td id = "dropdown" name = "correct_ans"><select id = "correct_answer" name = "correct_ans" required = "required">
									<option value = "<?php echo $correct_answer; ?>"><?php echo $correct_ans; ?></option>
									
									<option value="Option 1">Option 1</option>
									<option value="Option 2">Option 2</option>
									<option value="Option 3">Option 3</option>
									<option value="Option 4">Option 4</option>
								</select> </td>
								
							</tr>	
							<tr>
								<td><label for = "Question Type">Question Type: </label></td>
								<td id = "drp_quest_type" name = "question_type"><select id = "quest_type" name = "question_type" required = "required">
									<option value = "<?php echo $question_type; ?>"><?php echo $question_type; ?></option>
									
									<option value="radio_buttons">Radio Button</option>
									<option value="checkbox">Checkbox</option>
								</select> </td>
							</tr>	
							<tr>
								<td><label for = "marks">Marks : </label></td>
								<td><input type="number" min="1" max="5" step="1" value = "<?php echo $marks; ?>" name = "marks" id="marks" class = "input_buttons1" placeholder = "Marks for question" required = "required"></td>
							</tr>
							<tr>
								<td><label for = "time">Time(in Minutes) : </label></td>
								<td><input type="number" min="1" max="120" step="1" value = "<?php echo $time; ?>" name="time" class = "input_buttons1" placeholder = "Time for test" required = "required"></td>
							</tr>		
							<tr>
								<td>&nbsp;</td>
								<td>
								<input type = "submit" value = "Update" id = "save" class = "use_address" name = "save" title = "Save">
								<input type = "reset" name = "reset" id ="reset"></td>
							</tr>
							
  						</table>       
  					</div>
             </div>
        </form>
           
	</div>

	

 <?php get_footer(); ?>
