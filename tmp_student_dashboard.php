<?php /* Template Name: tmp_student_dashboard */ ?>

<?php
get_header(); ?>
<div class = "top_btns" style="margin-bottom:10px;">
			<a href =''><i class="fa fa-question-circle" aria-hidden="true" title = "Help" style = "width:20px;"></i></a>
			<a href ='http://localhost/wordpress_onlinetest/dashboard-2/'><i class="fa fa-home" title = "Home" style = "width:20px;"></i></a>
			<a href ='http://localhost/wordpress_onlinetest/logout/'><i class="fa fa-sign-out" aria-hidden="true" title = "Logout"></i></a>
		</div>
	<div id="primary" class="content-area boxed">
		<form id = "frm_student_dashboard" action="" method = "post" >
			<div id = "main_container">
				<div id = "sub_container">
					<table id = "display_btns" style = "border:1px solid navy;"> 
						<tr>
							<tr>
								<th colspan = 4 class = "form_heading">Student Dashboard</th>
						</tr>
						</tr>
						<tr>
							<div class = "btn_list" id = "first_list">
								<td><a href="http://localhost/wordpress_onlinetest/student-registration/"><input name="register_student" type="button" id = "btn_register_student" class = "input_btn" value="Register Student" /></a></td>
								<td><a href="http://localhost/wordpress_onlinetest/update-student/"><input name="update_student" type="button" id = "btn_update_student" class = "input_btn" value="Update Student" /></a></td>
								<td><a href="http://localhost/wordpress_onlinetest/delete-student/"><input name="delete_student" type="button" id = "btn_delete_student" class = "input_btn" value="Delete Student" /></a></td>
								<td><a href="http://localhost/wordpress_onlinetest/assign-test/"><input name="assign_test" type="button" id = "btn_assign_test" class = "input_btn" value="Assign Test" /></a></td>
							</div>
						</tr>
						
					</table>
				</div>
			</div>
		</form>
</div>
<?php get_footer(); ?>