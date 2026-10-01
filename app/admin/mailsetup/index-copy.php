<?php

require 'class/class.phpmailer.php';
$mail = new PHPMailer;
$mail->IsSMTP();        //Sets Mailer to send message using SMTP
$mail->Host = 'sg3plcpnl0177.prod.sin3.secureserver.net';  //Sets the SMTP hosts of your Email hosting, this for Godaddy
$mail->Port = '587';        //Sets the default SMTP server port
$mail->SMTPAuth = true;       //Sets SMTP authentication. Utilizes the Username and Password variables
$mail->Username = 'contact@ryl.co.in';     //Sets SMTP username
$mail->Password = 'So9685861552@';     //Sets SMTP password
$mail->SMTPSecure = 'tls';       //Sets connection prefix. Options are "", "ssl" or "tls"
$mail->From = "contact@ryl.co.in";     //Sets the From email address for the message
$mail->FromName = "RYL COMPANY";    //Sets the From name of the message
$mail->AddAddress('raipursomnath@gmail.com', 'Nayan');  //Adds a "To" address
$mail->AddCC('contact@ryl.co.in', 'RYL'); //Adds a "Cc" address
$mail->WordWrap = 50;       //Sets word wrapping on the body of the message to a given number of characters
$mail->IsHTML(true);       //Sets message type to HTML				
$mail->Subject = "Test mail";    //Sets the Subject of the message
$mail->Body = "Demo Mail";    //An HTML or plain text message body
if ($mail->Send()) {        //Send an Email. Return true on success or false on error
    $error = '<label class="text-success">Thank you for contacting us</label>';
} else {
    $error = '<label class="text-danger">There is an Error</label>';
}
$name = '';
$email = '';
$subject = '';
$message = '';
?>