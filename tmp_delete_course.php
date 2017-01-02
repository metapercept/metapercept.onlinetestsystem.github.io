	<?php /* Template Name: tmp_delete_course */ ?>


<?php
get_header();
include_once("connection.php");
 ?>
 <div class = "top_btns" style="margin-bottom:10px;">
 			<a href =''><i class="fa fa-question-circle" aria-hidden="true" title = "Help" style = "width:20px;"></i></a>
			<a href ='http://localhost/wordpress_onlinetest/course-dashboard/'><i class="fa fa-home" title = "Home" style = "width:20px;"></i></a>
			<a href ='http://localhost/wordpress_onlinetest/logout/'><i class="fa fa-sign-out" aria-hidden="true" title = "Logout"></i></a>
		</div>
	<div id="primary" class="content-area boxed">
		<form action="" method = "post" id = "frm_delete_course">
			<div id = "main_container">
					<div id = "sub_container">
						<?php 
						//pagination coding
							$start=0;
							$limit=5;
							 
							if(isset($_GET['id']))
							{
							    $id=$_GET['id'];
							    $start=($id-1)*$limit;
							}
							else{
							    $id=1;
							}
						?>
						<!-- List all the values in the table -->
						
						<?php 
						echo '<table id = "display_table_data">
							 <tr class = "table_row"><td class = "table_heading" colspan = "4">Delete Course</th></tr>
							 <tr class = "table_row">
							 <th> Course Id</th>
							 <th> Description </th>
							 <th> Start Date </th>
							 <th> Delete Course</th>
							 </tr>';
							$sql="SELECT course_id, course_name, course_start_date from courses LIMIT $start, $limit";
							$rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));
							$course_id=$_POST['course_id'] ;
							while($result=mysqli_fetch_array($rs))
							{
							echo '<tr class = "table_row"> 
							<td class = "nr"> '.$result["course_id"].'</td>
							<td> '.$result["course_name"].'</td>
							<td> '.$result["course_start_date"].'</td>
							<td class = "use_address"><i class="fa fa-trash" aria-hidden="true" title = "Delete"></i></td>
							</tr>';
							}
							echo "</table>";
					//simple pagination
							$sql = "SELECT COUNT(course_id) FROM courses";  
							$rs_result = mysqli_query($conn, $sql) or die(mysqli_error($conn));  
							$row = mysqli_fetch_array($rs_result);  
							$total_records = $row[0];  
							$total_pages = ceil($total_records / $limit); ?>
							<div id = "move_buttons">
							<?php if($id>1)
							{
							    //Go to previous page to show previous 10 items. If its in page 1 then it is inactive
							    echo "<a href='?id=".($id-1)."' id='previous'><input type = 'button' class = 'move_buttons' value = 'Previous'></a>";
							}
							if($id!=$total_pages)
							{
							    ////Go to previous page to show next 10 items.
							    echo "<a href='?id=".($id+1)."' id='next'><input type = 'button' class = 'move_buttons' value = 'Next'></a>";
							}
							?> 
							
							<ul id='page'>
							<?php
							//show all the page link with page number. When click on these numbers go to particular page. 
							        for($i=1;$i<=$total_pages;$i++)
							        {
							            if($i==$id) { echo "<li class='current'>".$i."</li>"; }
							             
							            else { echo "<li><a href='?id=".$i."'>".$i."</a></li>"; }
							        }
							?>
							</ul>	</div>				
					</div>
				</div>
		</form>
</div>
<?php get_footer(); ?>

<!--Function to delete record from table-->
<script type="text/javascript">

$(document).ready(function(){
	$(".use_address").click(function() { 
    var course_id = $(this).closest("tr")   // Finds the closest row <tr> 
                       .find(".nr")     // Gets a descendent with class="nr"
                       .text();        // Retrieves the text within <td>
                     //  alert(course_id);
confirm('Are you sure to delete this item?');
window.location =' http://localhost/wordpress_onlinetest/delete-course-page?course_id='+course_id;
    });
});

</script>
