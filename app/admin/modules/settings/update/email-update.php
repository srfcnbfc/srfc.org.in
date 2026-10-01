<?php
if (!empty($_POST['smtp_host']) && !empty($_POST['smtp_port']) && !empty($_POST['smtp_secure']) && !empty($_POST['sender_name']) && !empty($_POST['mail_username']) && !empty($_POST['mail_password'])  ) {
    include_once '../../../../config/config.php';
    $smtp_host = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'smtp_host', FILTER_DEFAULT));
    $smtp_port = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'smtp_port', FILTER_DEFAULT));
    $smtp_secure = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'smtp_secure', FILTER_DEFAULT));
    $sender_name = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'sender_name', FILTER_DEFAULT));
    $mail_username = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'mail_username', FILTER_DEFAULT));
    $mail_password= mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'mail_password', FILTER_DEFAULT));
    $default_mail= mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'default_mail', FILTER_DEFAULT));
    ///////////////////////////////////////////////////////////////////

    $sql = "UPDATE mail_setup SET smtp_host='$smtp_host',smtp_port='$smtp_port',smtp_secure='$smtp_secure',sender_name='$sender_name',username='$mail_username',password='$mail_password' , default_email='$default_mail' WHERE 1";

    if ($conn->query($sql) === TRUE) {
        $out_stauts = "success";
        $message = "Email is Succesfully Update";
    } else {
        $out_stauts = "warning";
        $message = "Email Not Update";
    }

    $conn->close();

    $response[] = array('status' => $out_stauts, 'msg' => $message);
    echo json_encode($response);
}
?>