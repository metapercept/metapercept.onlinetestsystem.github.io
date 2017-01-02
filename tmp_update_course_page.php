<?php /* Template Name: tmp_update_course_page */ ?>

<script type="text/javascript">
/*var new_var =  localStorage.getItem('course_id');

</script>


<?php
include_once("connection.php");
 ?>

<?php
$sql="SELECT course_name, course_start_date from courses where course_id = '". $_GET['course_id'] . "'";
	$rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));
	while($result=mysqli_fetch_array($rs)) {
		$course_name = $result["course_name"];
		$date = $result["course_start_date"];
	}



if(isset($_POST['save']))
{
	$id = $_POST['course_id'];
	$course = $_POST['course_name'];
	$start_date = $_POST['start_date'];
	$sql1 = "UPDATE courses SET course_name = '$course', course_start_date = '$start_date' WHERE course_id = '$id'";
	$rs1 = mysqli_query($conn,$sql1);
	header('Location: http://localhost/wordpress_onlinetest/update_course/');
}
?>


<?php
get_header();
?>
<div class = "top_btns" style="margin-bottom:10px;">
			<a href =''><i class="fa fa-question-circle" aria-hidden="true" title = "Help" style = "width:20px;"></i></a>
			<a href ='http://localhost/wordpress_onlinetest/course-dashboard/'><i class="fa fa-home" title = "Home" style = "width:20px;"></i></a>
			<a href ='http://localhost/wordpress_onlinetest/logout/'><i class="fa fa-sign-out" aria-hidden="true" title = "Logout"></i></a>
		</div>
<div id="primary" class="content-area boxed" >
		
	<form  id = "frm_update_course_page"  method = "post" action = ""> 
		
		<div id = "main_container">
					<div id = "sub_container">
						<table width = "100%" id = "update_course_table">
							<tr>
								<th colspan = 2 class = "form_heading">Course Details</th>
							</tr>
							 <tr>
							 	<td><label for = "course_id">Course Id : </label></td>
								<td><input type = "text" name = "course_id" id = "txt_course_id" value = "<?php echo $_GET['course_id']; ?>" readonly = "readonly" class = "input_buttons1"></td>
							 </tr>
							 <tr>
							 	<td><label for = "course">Course Name : </label></td>
								<td><input type = "text" name = "course_name" placeholder = "Course Name"  class = "input_buttons1" value = "<?php echo $course_name; ?>" required = "required"></td>
							 </tr>
							<tr>
								<td><label for = "course_start_date">Course Start Date : </label></td>
								<td><input type = "date" name = "start_date"  class = "input_buttons1" value = "<?php echo $date; ?>"required = "required"></td>
							</tr>
						
							<tr>
								<td>&nbsp;</td>
								<td class = "save_reset">
								<input type = "submit" value = "Update" id = "submit" name = "save" title = "Update">
								<input type = "reset" name = "reset" id ="reset"></td>
							</tr>
							<tr><td><p id = "result"></p></td></tr>
  						</table>       
  					</div>
           
             </div>
        </form>
           
	</div>

<!--script src='../wp-content/themes/upright/insert.js'></script-->
 <?php get_footer(); ?>

