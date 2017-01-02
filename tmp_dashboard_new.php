<?php /* Template Name: tmp_dashboard_new */ ?>

<?php
get_header(); ?>
<div class = "top_btns" style="margin-bottom:10px;">
			<a href =''><i class="fa fa-question-circle" aria-hidden="true" title = "Help" style = "width:20px;"></i></a>
			<a href ='http://localhost/wordpress_onlinetest/logout/'><i class="fa fa-sign-out" aria-hidden="true" title = "Logout"></i></a>

		</div>
	<div id="primary" class="content-area boxed">
		<form id = "frm_dashboard" action="" method = "post" >
			<div id = "main_container">
				<div id = "sub_container">
					<table id = "display_btns" style = "border:1px solid navy;"> 
						<tr>
							<tr>
								<th colspan = 3 class = "form_heading">Dashboard</th>
						</tr>
						</tr>
						<tr>
							<div class = "btn_list" id = "first_list">
								<td><a href="http://localhost/wordpress_onlinetest/course-dashboard/"><input name="manage_courses" type="button" id = "btn_manage_courses" class = "input_btn" value="Courses" /></a></td>
								<td><a href=" http://localhost/wordpress_onlinetest/test-dashboard/"><input name="manage_tests" type="button" id = "btn_manage_tests" class = "input_btn" value="Tests" /></a></td>
								<td><a href="http://localhost/wordpress_onlinetest/student-dashboard/"><input name="manage_students" type="button" id = "btn_manage_students" class = "input_btn" value="Students" /></a></td>
							</div>
						</tr>
						
					</table>
				</div>
			</div>
		</form>
</div>
<?php get_footer(); ?>