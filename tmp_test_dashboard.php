<?php /* Template Name: tmp_test_dashboard */ ?>

<?php
get_header(); ?>
<div class = "top_btns" style="margin-bottom:10px;">
			<a href =''><i class="fa fa-question-circle" aria-hidden="true" title = "Help" style = "width:20px;"></i></a>
			<a href ='http://localhost/wordpress_onlinetest/dashboard-2/'><i class="fa fa-home" title = "Home" style = "width:20px;"></i></a>
			<a href ='http://localhost/wordpress_onlinetest/logout/'><i class="fa fa-sign-out" aria-hidden="true" title = "Logout"></i></a>
		</div>
	<div id="primary" class="content-area boxed">
		<form id = "frm_test_dashboard" action="" method = "post" >
			<div id = "main_container">
				<div id = "sub_container">
					<table id = "display_btns" style = "border:1px solid navy;"> 
						<tr>
							<tr>
								<th colspan = 3 class = "form_heading">Test Dashboard</th>
						</tr>
						</tr>
						<tr>
							<div class = "btn_list" id = "first_list">
								<td><a href="http://localhost/wordpress_onlinetest/create-test/"><input name="create_test" type="button" id = "btn_create_course" class = "input_btn" value="Create Test" /></a></td>
								<td><a href="http://localhost/wordpress_onlinetest/update-test/"><input name="update_test" type="button" id = "btn_update_course" class = "input_btn" value="Update Test" /></a></td>
								<td><a href="http://localhost/wordpress_onlinetest/delete-test/"><input name="delete_test" type="button" id = "btn_delete_course" class = "input_btn" value="Delete Test" /></a></td>
							</div>
						</tr>
						
					</table>
				</div>
			</div>
		</form>
</div>
<?php get_footer(); ?>