<?php

require 'PHPMailer/PHPMailerAutoload.php';

if(isset($_POST['submit']))
	{	
	try {
			$to_email = $_POST['form_email'];
			$mobile = $_POST['form_mob'];
			$name = $_POST['form_name'];
			$body = $_POST['form_message'];
			
			$message = "<b>Name :</b> $name<br \> <b>Mobile :</b>$mobile<br \> <b>Email :</b> $to_email<br \><br \> <b>Message :</b> $body ";			
			$mail = new PHPMailer(true);
			//Server settings			
			$mail->isSMTP();                                            // Send using SMTP
			$mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
			$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
			$mail->Username   = 'vinobharathi5@gmail.com';                     // SMTP username
			$mail->Password   = 'friendforevermona';                               // SMTP password
			$mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
			$mail->Port       = 587;                                    // TCP port to connect to

			//Recipients
			$mail->setFrom($to_email,$name);
			$mail->addAddress('vinobharathi5@gmail.com', 'friendforevermona'); // Add a recipient
			
			// Content
			$mail->isHTML(true);                                  // Set email format to HTML
			$mail->Subject = $subject;
			$mail->Body    = $message;
			
			if (!$mail->send()) { //send the message, check for errors
              echo "Mailer Error: " . died($error);
           } else {
                echo '<script language="javascript">';
                echo 'window.location="thankyou.html"';
                echo '</script>';
           }
			
	} catch (Exception $e) {
		echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	}
}
?>