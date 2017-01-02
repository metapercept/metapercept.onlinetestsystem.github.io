<?php /* Template Name: tmp_admin_login */ ?>

<?php
get_header(); 
session_start();
$_SESSION['login_status'] = 0; ?>


<?php include_once("connection.php"); ?>
<!--div class = "top_btns" style="margin-bottom:10px;">
			<a href ='http://localhost/wordpress_onlinetest/dashboard/'><input type = "button" name = "home" id= "home" title = "Home" style = "background:url(http://localhost/wordpress_onlinetest/wp-content/uploads/2016/11/home-1-e1478254604371.jpg) no-repeat; width : 50px; height : 40px;"></a>
			<a href ='http://localhost/wordpress_onlinetest/logout/'><input type = "button" name = "logout" id= "logout" title = "Logout" style = "background:url(http://localhost/wordpress_onlinetest/wp-content/uploads/2016/11/logout-e1478256134465.jpg) no-repeat; width : 50px; height : 40px;"></a>
		</div-->
<div id="primary" class="content-area boxed">
			<form action="" method="post" id="frm_admin_login"> 	
				<div id = "main_container">
					<div id = "sub_container">
				
					<table width = "100%" id = "admin_login_table">
						<tr>
						<th colspan = 2 class = "form_heading">Login</th>
						</tr>
						<tr>
							<td id = "label"><label>Admin Username : </label></td>
							<td id = "textbox"><input type = "text" name = "admin_user_name" id="admin_user_name" class = "input_buttons1" required = "required"></td>
						</tr>
						<tr>
							<td><label>Password : </label></td>
							<td><input type = "password" name = "admin_pwd" id="password" class = "input_buttons1" required = "required"></td>
						</tr>	
						<tr>
							<td>&nbsp;</td>
							<td class = "save_reset">
								<input type = "submit" value = "Login" id = "submit" name = "submit" title = "Login">
								<input type = "reset" name = "reset" id ="reset">
							</td>
						</tr>
  					 </table>       
  					</div>
             </div>

				
	      	
                  <?php   
               		 	
						if(isset($_POST['submit'])) {
								$user_name=$_POST['admin_user_name'];
								$password=$_POST['admin_pwd'];
							if(empty($user_name)) {
								die("Please Enter Username");
							}
							if(empty($password)) {
								
								die("Please Enter Password");
							}

						$rs="select * from user_login where user_name = '$user_name' and password = '$password'";
						$result = mysqli_query($conn, $rs) or die(mysqli_error($conn));
						
						$row = mysqli_fetch_array($result);
						if($row['user_name']==$user_name && $row['password']==$password)
						{
							$_SESSION['login_status'] = 1;
							?>
							<script type="text/javascript">
								window.location.href = 'http://localhost/wordpress_onlinetest/dashboard-2/';
							</script>
							<?php
						}
						else
						{?>
							<script type="text/javascript">
							alert("Incorrect Username or Password");
							//window.location.assign("http://localhost/wordpress_onlinetest/dashboard/");
							</script>

						<?php	//echo "Incorrect Username or password";
							//window.location.assign("http://localhost/wordpress_onlinetest/dashboard/");
						}
						
					}			
						//echo "inserted";
                /*  	  global $wpdb;
               		     $userlogin_table = $wpdb->prefix."user_login";
                		  $data=array(
							"user_name"=> $_POST['user_name'],
 							"password"=> $_POST['user_pwd']
							);
						  $wpdb->insert( $userlogin_table, $data);
                    */
             	  ?>
             </form>
             </div>
	</div>
<?php get_footer(); ?>