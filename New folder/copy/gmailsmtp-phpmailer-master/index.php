<!DOCTYPE html>
<html>
<head>
	
</head>
<body>


<form action="index.php" method="post">
	<input type="hidden" name="subject" value="Gmail SMTP Test"/>
	<input type="hidden" name="message" value="Docter accepted your order"/>
	<input type="submit" value="Send" name="send"/>
</form>

<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
if(isset($_POST['send']))
{
	$sender_name = "smtp tester";
	$sender_email = "noreply@mailer.org";
	//
	$username = "e1841116@bit.mrt.ac.lk";
	$password = "Kushan1995*";
	//

	//$receiver_email = $_POST['receiver_email'];
	$message = $_POST['message'];
	$subject = $_POST['subject'];
	
	$mail = new PHPMailer(true);
	$mail->isSMTP();
  //$mail->SMTPDebug = 2;
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
  
	$mail->SMTPSecure = 'tls';
	$mail->Port = 587;
	
	$mail->setFrom($sender_email, $sender_name);
	$mail->Username = $username;
	$mail->Password = $password;
  
	$mail->Subject = $subject;
	$mail->msgHTML($message);
	$mail->addAddress("moraalpha07@gmail.com");
	if (!$mail->send()) {
		$error = "Mailer Error: " . $mail->ErrorInfo;	}
	else {
	}
}
else{
}
?>


</body>
</html>