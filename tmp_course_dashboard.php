<?php /* Template Name: tmp_course_dashboard */ ?>

<?php
get_header(); ?>
<div class = "top_btns" style="margin-bottom:10px;">
			<a href =''><i class="fa fa-question-circle" aria-hidden="true" title = "Help" style = "width:20px;"></i></a>
			<a href ='http://localhost/wordpress_onlinetest/dashboard-2/'><i class="fa fa-home" title = "Home" style = "width:20px;"></i></a>
			<a href ='http://localhost/wordpress_onlinetest/logout/'><i class="fa fa-sign-out" aria-hidden="true" title = "Logout"></i></a>
		</div>
	<div id="primary" class="content-area boxed">
		<form id = "frm_course_dashboard" action="" method = "post" >
			<div id = "main_container">
				<div id = "sub_container">
					<table id = "display_btns"> 
						<tr>
								<th colspan = 3 class = "form_heading">Course Dashboard</th>
						</tr>
						<tr>
							<div class = "btn_list" id = "first_list">
								<td><a href="http://localhost/wordpress_onlinetest/create-course/"><input name="create_course" type="button" id = "btn_create_course" class = "input_btn" value="Create Course" /></a></td>
								<td><a href="http://localhost/wordpress_onlinetest/update_course/"><input name="update_course" type="button" id = "btn_update_course" class = "input_btn" value="Update Course" /></a></td>
								<td><a href="http://localhost/wordpress_onlinetest/delete-course/"><input name="delete_course" type="button" id = "btn_delete_course" class = "input_btn" value="Delete Course" /></a></td>
							</div>
						</tr>
						
					</table>
				</div>
			</div>
		</form>
</div>
<?php get_footer(); ?>