<?php


/*Mail Function*/
if(isset($_POST['test']) && isset($_POST['datetime'])) {
	if(isset($_POST['save']))
	{
		$id = $_POST['student_id'];
		$test_category_id = $_POST['test_category_id'];
		$datetime = $_POST['datetime'];
		$sql1 = "UPDATE student SET test_category_id = '$test_category_id', assigned_date = '$datetime' where student_id = $id";
		$rs1 = mysqli_query($conn,$sql1);

	/*mail function*/
		$message = "<html><body>";
		$message.="<h3> Hi ". $_POST['fname']." ".$_POST['lname']."<br>";
		$message.="Following are your test details. Please login to the following link and use following credentials to start the Test..<br> All The Best.!!!</h3><br>";
		$message.="Username : ". $_POST['email_id']."<br>";
		$message.="Password : ". $_POST['password']."<br>";
		$message.="Test : ". $_POST['test']."<br>";
		$message.="Date and Time : ". $_POST['datetime']."<br>";
		$message.="Test url : <a class = 'link' href = 'http://localhost/wordpress_onlinetest/student-login?date=$datetime'>Start Test</a>";
		//$message.="Test url : <span class = 'link'>Start Test</span>";
		$message.="</html></body>";

		$mail = new PHPMailer;
		$mail->isSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->SMTPAuth = true;
		$mail->Username = 'anaghadeshpande1990';
		$mail->Password = 'password123!@#';
		$mail->SMTPSecure = 'tls';
		$mail->Port = 587; 
		$mail->From = 'anaghadeshpande1990@gmail.com';
		$mail->FromName = 'Anagha D';
		$mail->addAddress('anaghad@metapercept.com', 'anagha');	
		//$mail->addReplyTo('beingbalram@gmail.com', 'Balram Khichar');
		$mail->WordWrap = 50;
		$mail->Subject = 'Test Assignment';
		$mail->Body = $message;
		$mail->isHTML(true);
		if(!$mail->send()) {
		   echo 'Message could not be sent.';
		   echo 'Mailer Error: ' . $mail->ErrorInfo;
		   exit;
		}
	}
}

?>