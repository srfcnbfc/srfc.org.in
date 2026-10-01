<?php

session_start();
require_once '../config/data-connect.php';

$loginemail = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'email', FILTER_DEFAULT));
$loginpassword = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'password', FILTER_DEFAULT));
$out_stauts = 'warning';
$message = 'Something Wrong! Please Try Again';
$loginvalid = 0;
if (!empty($loginemail) && !empty($loginpassword)) {
    $query = "SELECT * FROM siteadmin WHERE admin_email= '$loginemail' AND admin_password='$loginpassword' AND admin_status='ACTIVE'";
    $result = mysqli_query($conn, $query)or die(mysqli_error());
    $num_row = mysqli_num_rows($result);
    if ($num_row > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['adminemail'] = $row['admin_email'];
        $_SESSION['started'] = time();
        $out_stauts = 'success';
        $message = 'You are Welcome in Admin Panel';
        $loginvalid = 1;
    } else {
        $out_stauts = 'warning';
        $message = 'Username and Password Incorrect';
        $loginvalid = 0;
    }
}
$response[] = array('status' => $out_stauts, 'msg' => $message, 'login' => $loginvalid);
echo json_encode($response);
?>