<?php
function sendmymail($to, $to_name, $subject, $message, $from, $from_name, $from_password, $smtp, $smtp_port) {
    require 'class.phpmailer.php';
    $mail = new PHPMailer;
    $mail->IsSMTP();        //Sets Mailer to send message using SMTP
    $mail->Host = $smtp;  //Sets the SMTP hosts of your Email hosting, this for Godaddy 'sg3plcpnl0177.prod.sin3.secureserver.net';
    $mail->Port = $smtp_port;        //Sets the default SMTP server port - 587
    $mail->SMTPAuth = true;       //Sets SMTP authentication. Utilizes the Username and Password variables
    $mail->Username = $from;     //Sets SMTP username
    $mail->Password = $from_password;      //Sets SMTP password
    $mail->SMTPSecure = 'tls';       //Sets connection prefix. Options are "", "ssl" or "tls"
    $mail->From = "$from";   //Sets the From email address for the message
    $mail->FromName = "$from_name";    //Sets the From name of the message
    $mail->AddAddress($to, $to_name);  //Adds a "To" address
    $mail->AddCC($from, $from_name); //Adds a "Cc" address
    //	$mail->WordWrap = 50;							//Sets word wrapping on the body of the message to a given number of characters
    $mail->IsHTML(true);       //Sets message type to HTML				
    $mail->Subject = "$subject";    //Sets the Subject of the message
    $mail->Body = "$message";    //An HTML or plain text message body

    if ($mail->Send()) {        //Send an Email. Return true on success or false on error
        $error = '<label class="text-success">Mail Successfully Sent</label>';
    } else {
        $error = '<label class="text-danger">Sorry Cannot Find your Mail.</label>';
    }

    return $error;
}

?>