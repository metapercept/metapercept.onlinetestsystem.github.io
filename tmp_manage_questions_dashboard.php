<?php /* Template Name: tmp_manage_questions_dashboard */ ?>
<?php include_once("connection.php"); ?>
<?php
get_header();
 ?>
 <div class = "top_btns" style="margin-bottom:10px;">
 	<a href =''><i class="fa fa-question-circle" aria-hidden="true" title = "Help" style = "width:20px;"></i></a>
			<a href ='http://localhost/wordpress_onlinetest/update-test/'><i class="fa fa-home" title = "Home" style = "width:20px;"></i></a>
			<a href ='http://localhost/wordpress_onlinetest/logout/'><i class="fa fa-sign-out" aria-hidden="true" title = "Logout"></i></a>
		</div>
	<div id="primary" class="content-area boxed">
		<form id = "frm_manage_questions" action="" method = "post" >
			<div id = "main_container">			
					<div id = "sub_container">
						
						<!--Top buttons-->
						<div class = "top_btns">
								<div class = "use_address" >
								<i class="fa fa-plus" aria-hidden="true" title = "Add Questions"></i></div>
						</div>
						
						
						<?php 
						//pagination coding
							$start=0;
							$limit=5;
							 
							if(isset($_GET['id']))
							{
							    $id=$_GET['id'];
							    $start=($id-1)*$limit;
							}
							else{
							    $id=1;
							}
						?>
						<!-- List all the values in the table -->
						<?php 
						$test_category_id = $_GET['test_category_id'];
							 echo '<table id = "display_questions"> 
							 	   <tr><td class = "table_heading" colspan = "4">Questions</th></tr>';
							 	   
								$sql="SELECT test_category from test_category where test_category_id = '".$_GET['test_category_id']."'";
								$rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));
								while($result=mysqli_fetch_assoc($rs))
								
							 echo '<tr><td colspan = 7 style = "font-weight:bold;">Test Category : '.$result["test_category"].'</td>';
							 echo '<tr>
							 <th>Question No. </th>
							 <th>Question </th>
							 <th>Correct Answer </th>
							 <th>Marks </th>
							 <th>Time </th>
							 <th>Question Type </th>
							 <th>Update</th>
							 <th>Delete</th>
							 </tr>';
							 
							$sql2= "SELECT test_category_id, question_no, question, correct_ans, marks, time, question_type from questions where test_category_id='".$_GET['test_category_id']."' LIMIT $start, $limit";
					
							$rs2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
							
							while($result2=mysqli_fetch_array($rs2))
							{
							echo '<tr class = "table_row">
							<td class = "nr"> '.$result2["question_no"].'</td>
							<td> '.$result2["question"].'</td>
							<td> '.$result2["correct_ans"].'</td>
							<td> '.$result2["marks"].'</td>
							<td> '.$result2["time"].'</td>
							<td> '.$result2["question_type"].'</td>
							<td class = "edit_question"><i class="fa fa-pencil-square" aria-hidden="true"></i></td>
							<td class = "delete_question"><i class="fa fa-trash" aria-hidden="true" title = "Delete"></i></td>

							</tr>';
							}
							echo "</table>";
					
							//simple pagination
							$sql = "SELECT COUNT(question_no) FROM questions where test_category_id = ".$test_category_id;  
							$rs_result = mysqli_query($conn, $sql) or die(mysqli_error($conn));  
							$row = mysqli_fetch_array($rs_result);  
							$total_records = $row[0];  
							$total_pages = ceil($total_records / $limit); ?>
							<div id = "move_buttons">
							<?php if($id>1)
							{
							    //Go to previous page to show previous 10 items. If its in page 1 then it is inactive
							    echo "<a href='?test_category_id=".$test_category_id."&id=".($id-1)."' id='previous'><input type = 'button' class = 'move_buttons' value = 'Previous'></a>";
							}
							if($id!=$total_pages)
							{
							    ////Go to previous page to show next 10 items.
							    echo "<a href='?test_category_id=".$test_category_id."&id=".($id+1)."' id='next'><input type = 'button' class = 'move_buttons' value = 'Next'></a>";
							}
							?> 
							
							<ul id='page'>
							<?php
							//show all the page link with page number. When click on these numbers go to particular page. 
							        for($i=1;$i<=$total_pages;$i++)
							        {
							            if($i==$id) { echo "<li class='current'>".$i."</li>"; }
							             
							            else { echo "<li><a href='?test_category_id=".$test_category_id."&id=".$i."'>".$i."</a></li>"; }
							        }
							?>
							</ul>	</div>				
						
					</div>
				</div>
		</form>
</div>


<?php get_footer(); ?>

<!--Function to send test_category_id to add quesions page-->

<script type="text/javascript">

$(document).ready(function(){
	$(".use_address").click(function() { 
	 
    var test_category_id = "<?php echo $_GET['test_category_id']; ?>";

    window.location = 'http://localhost/wordpress_onlinetest/add-questions?test_category_id='+test_category_id;
    });
});
</script>

<!--Function to delete record from table-->
<script type="text/javascript">

$(document).ready(function(){
	$(".delete_question").click(function() { 
    var question_no = $(this).closest("tr")   // Finds the closest row <tr> 
                       .find(".nr")     // Gets a descendent with class="nr"
                       .text();        // Retrieves the text within <td>
                     //  alert(course_id);
confirm('Are you sure to delete this item?');
var test_category_id = "<?php echo $_GET['test_category_id']; ?>";
window.location ='http://localhost/wordpress_onlinetest/delete-question-page?question_no='+question_no+'&test_category_id='+test_category_id;
    });
});

</script>
 
 <!--Function to update question from table-->
<script type="text/javascript">

$(document).ready(function(){
	$(".edit_question").click(function() { 
    var question_no = $(this).closest("tr")   // Finds the closest row <tr> 
                       .find(".nr")     // Gets a descendent with class="nr"
                       .text();        // Retrieves the text within <td>
var test_category_id = "<?php echo $_GET['test_category_id']; ?>";
window.location ='http://localhost/wordpress_onlinetest/update-questions-page?question_no='+question_no+'&test_category_id='+test_category_id;
    });
});

</script>