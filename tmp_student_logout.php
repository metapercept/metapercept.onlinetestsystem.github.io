<?php /* Template Name: tmp_student_logout */ ?>
<?php session_start(); ?>
<?php
get_header(); ?>
<!--div class = "top_btns" style="margin-bottom:10px;">
			<a href ='http://localhost/wordpress_onlinetest/dashboard/'><input type = "button" name = "home" id= "home" title = "Home" style = "background:url(http://localhost/wordpress_onlinetest/wp-content/uploads/2016/11/home-1-e1478254604371.jpg) no-repeat; width : 50px; height : 40px;"></a>
			<a href ='http://localhost/wordpress_onlinetest/logout/'><input type = "button" name = "logout" id= "logout" title = "Logout" style = "background:url(http://localhost/wordpress_onlinetest/wp-content/uploads/2016/11/logout-e1478256134465.jpg) no-repeat; width : 50px; height : 40px;"></a>
		</div-->
	<div id="primary" class="content-area boxed">
		<form id = "frm_student_logout" action="" method = "post" >
			<div id = "main_container">
				<div id = "sub_container">
					<table id = "student_logout_table"> 
						<tr>
							<?php //sleep(2); ?>
							<h2>You have Successfully Logged out..!!</h2>
							<?php
								$_SESSION['student_login_status'] = 0;
								//header("refresh:3; url=http://localhost/wordpress_onlinetest/student-login/");
							?>
							<script type="text/javascript">
								window.location.href = 'http://localhost/wordpress_onlinetest/student-login/';
							</script>
						</tr>					
					</table>
				</div>
			</div>
		</form>
</div>
<?php get_footer(); ?>
<?php session_destroy(); ?>