<?php /* Template Name: tmp_admin_logout */ ?>

<?php
session_start();
get_header(); ?>

	<div id="primary" class="content-area boxed">
		<form id = "frm_admin_logout" action="" method = "post" >
			<div id = "main_container">
				
				<h2>You have Successfully Logged out..!!</h2>
				<?php //header("Location: http://localhost/wordpress_onlinetest/", true, 303); 
					$_SESSION['login_status'] = 0;
				?>
				<script type="text/javascript">
					window.location.href = 'http://localhost/wordpress_onlinetest/';
				</script>
										
						
			</div>
		</form>
</div>
<?php get_footer(); 

  ?>