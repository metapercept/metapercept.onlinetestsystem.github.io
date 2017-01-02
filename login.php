<?php /* Template Name: upright */ ?>
<?php
//echo "Hi! I am a PHP File in Wordpress template Folder!"
?>
<?php
$conn = mysql_connect("localhost","root","");
mysql_select_db("online_test_db");
//$id=$_POST['id'];
if(isset($_POST['submit'])) {
//$user_name=$_POST['user_name'];
//$password=$_POST['user_pwd'];
$user_name="welcome";
$password="welcome";

$rs="insert into user_login(user_name, password)
values('$user_name','$password')";
$result=(mysql_query($rs,$conn)) or die (mysql_error());
//echo "inserted";
}
?>
		<?php
    /*	function user_login_shortcode(){ ?>

          <div class="wrap">
              <form action="" method="post">
                  	<label>User Name : </label>
					<input type = "text" name = "user_name" id="user_name">
					<label>Password : </label>
					<input type = "password" name = "user_pwd" id="password">
					<input type = "submit" value = "Login" name = "submit">
              </form>
              <form method="post">
                  <?php   
                
                  if(isset('$_POST['submit']')) {
                  	  global $wpdb;

                         $user_name=$_POST['user_name'];
						 $password=$_POST['user_pwd'];
               		     $userlogin_table = $wpdb->prefix."user_login";
                		  $data=array(

							'user_name ' = $_POST[ 'firstNametxt '],
 							'password ' = $_POST[ 'lastNametxt ']

							);
						  $wpdb->insert( $userlogin_table, $data);
                    }
             	  ?>
             </form>
             </div>

             <?php
                  }
                  add_shortcode( 'userlogin', 'user_login_shortcode' );

             ?>*/
