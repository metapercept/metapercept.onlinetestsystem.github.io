<?php /* Template Name: tmp_create_course */ ?>
<?php
include_once("connection.php");
 ?>
 <?php
if(isset($_POST[save])) {
		$course=$_POST['course_name']; 
		$start_date=$_POST['start_date'];
		$rs="insert into courses (course_name, course_start_date) values('$course','$start_date')";
		$result = mysqli_query($conn, $rs) or die(mysqli_error($conn)); 
//header('Location: http://localhost/wordpress_onlinetest/create_course/');

	}

?>

<?php
get_header();
?>
<div class = "top_btns" style="margin-bottom:10px;">
			<!--a href ='http://localhost/wordpress_onlinetest/course-dashboard/'><input type = "button" name = "home" id= "home" title = "Home" style = "background:url(http://localhost/wordpress_onlinetest/wp-content/uploads/2016/11/home-e1482125419621.jpg) no-repeat; width : 20px; height : 20px;"></a-->
			<a href =''><i class="fa fa-question-circle" aria-hidden="true" title = "Help" style = "width:20px;"></i></a>
			<a href ='http://localhost/wordpress_onlinetest/course-dashboard/'><i class="fa fa-home" title = "Home" style = "width:20px;"></i></a>
			<a href ='http://localhost/wordpress_onlinetest/logout/'><i class="fa fa-sign-out" aria-hidden="true" title = "Logout"></i></a>
			<!--input type = "button" name = "logout" id= "logout" title = "Logout" style = "background:url(http://localhost/wordpress_onlinetest/wp-content/uploads/2016/11/logout-e1482125464894.jpg) no-repeat; width : 20px; height : 20px;"-->
		</div>
<div id="primary" class="content-area boxed" >
		
	<form  id = "frm_create_course"  method = "post" action = ""> 
		
		<div id = "main_container">
					<div id = "sub_container">
						<table width = "100%" id = "create_course_table">
							<tr>
								<th colspan = 2 class = "form_heading">Course Details</th>
							</tr>
							
							 <tr>
							 	<td><label for = "course">Course Name : </label></td>
								<td><input type = "text" name = "course_name" placeholder = "Course Name"  class = "input_buttons1" required = "required"></td>
							 </tr>
							<tr>
								<td><label for = "course_start_date">Course Start Date : </label></td>
								<td><input type = "date" name = "start_date" value="mm/dd/yyyy" class = "input_buttons1" required = "required"></td>
							</tr>
						
							<tr>
								<td>&nbsp;</td>
								<td class = "save_reset">
								<input type = "submit" value = "Save" id = "submit" class = "btn_submit" name = "save" title = "Save">
								<input type = "reset" name = "reset" id ="reset" class = "btn_submit"></td>
							</tr>
							<tr><td><p id = "result"></p></td></tr>
  						</table>       
  					</div>
           
             </div>
        </form>
           
	</div>

<!--script src='../wp-content/themes/upright/insert.js'></script-->
 <?php get_footer(); ?>

