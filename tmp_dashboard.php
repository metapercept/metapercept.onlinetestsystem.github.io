<?php /* Template Name: tmp_dashboard */ ?>
		
<?php
get_header(); ?>
<div class = "top_btns" style="margin-bottom:10px;">
			<a href ='http://localhost/wordpress_onlinetest/dashboard/'><input type = "button" name = "home" id= "home" title = "Home" style = "background:url(http://localhost/wordpress_onlinetest/wp-content/uploads/2016/11/home-1-e1478254604371.jpg) no-repeat; width : 50px; height : 40px;"></a>
			<a href ='http://localhost/wordpress_onlinetest/logout/'><input type = "button" name = "logout" id= "logout" title = "Logout" style = "background:url(http://localhost/wordpress_onlinetest/wp-content/uploads/2016/11/logout-e1478256134465.jpg) no-repeat; width : 50px; height : 40px;"></a>
		</div>
	<div id="primary" class="content-area boxed">
		<form id = "frm_dashboard" action="" method = "post" >
			<div id = "main_container">
				<div id = "sub_container">
					<table id = "display_btns" style = "border:1px solid navy;"> 
						<tr>
							<div class = "top_btns">
							
							</div>
						</tr>
						<tr>
							<div class = "btn_list" id = "first_list">
								<td><a href="http://localhost/wordpress_onlinetest/manage-test-dashboard/"><input name="manage_tests" type="button" id = "btn_manage_test" class = "input_btn" value="Manage Tests" /></a></td>
								<td><a href="http://localhost/wordpress_onlinetest/manage-questions-dashboard/"><input name="manage_questions" type="button" id = "btn_manage_questions" class = "input_btn" value="Manage Questions" /></a></td>
							</div>
						</tr>
						<tr>
							<div class = "btn_list" id = "second_list">
								<td><a href="http://localhost/wordpress_onlinetest/manage-student-dashboard/"><input name="manage_students" type="button" id = "btn_manage_students" class = "input_btn" value="Manage Students" /></a></td>
								<td><a href=" http://localhost/wordpress_onlinetest/manage-user-dashboard/"><input name="manage_users" type="button" id = "btn_manage_users" class = "input_btn" value="Manage Users" /></a></td>
							</div>
						</tr>
						<!--<div class = "btn_list" id = "first_list">
							<ul class = "ul_btn">
								<li class = "li_btn"><a href="http://localhost/wordpress_onlinetest/manage-test-dashboard/"><input name="manage_tests" type="button" id = "btn_manage_test" class = "input_btn" value="Manage Tests" /></a></li>
								<li class = "li_btn"><a href="http://localhost/wordpress_onlinetest/manage-questions-dashboard/"><input name="manage_questions" type="button" id = "btn_manage_questions" class = "input_btn" value="Manage Questions" /></a></li>
							</ul>
						</div>
						</tr>
						<tr>
						<div class = "btn_list" id = "second_list">
							<ul class = "ul_btn">
								<li class = "li_btn"><a href="http://localhost/wordpress_onlinetest/manage-student-dashboard/"><input name="manage_students" type="button" id = "btn_manage_students" class = "input_btn" value="Manage Students" /></a></li>
								<li class = "li_btn"><a href=" http://localhost/wordpress_onlinetest/manage-user-dashboard/"><input name="manage_users" type="button" id = "btn_manage_users" class = "input_btn" value="Manage Users" /></a></li>
							</ul>
						</div-->
						
					</table>
				</div>
			</div>
		</form>
</div>
<?php get_footer(); ?>