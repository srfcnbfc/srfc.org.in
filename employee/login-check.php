<?php
session_start();
require_once 'config/data-connect.php';
require 'modules/sms/smsapi.php';
$employeeID = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'employeeID', FILTER_DEFAULT));
$mobile = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'employeeMobile', FILTER_DEFAULT));
$login_otp = rand(10000, 99999);



$out_stauts = 'warning';
$message = 'Something Wrong! Please Try Again';
$loginvalid = 0;
if (!empty($employeeID) && !empty($mobile)) {
    $query = "SELECT * FROM employee WHERE emp_code= '$employeeID' AND emp_mobile='$mobile' AND emp_status='ACTIVE'";
    $result = mysqli_query($conn, $query)or die(mysqli_error());
    $num_row = mysqli_num_rows($result);
    if ($num_row > 0) {
        $row = mysqli_fetch_assoc($result);
         $message = 'You are Welcome in Admin Panel';
        $otp_sql = "INSERT INTO emp_otp_verify(emp_code, emp_mobile, otp_no, otp_status)"
                . "VALUES('$employeeID','$mobile','$login_otp','ACTIVE')";
        if ($conn->query($otp_sql)) {
            sendsms($mobile, $login_otp);  // Send OTP
            
            $_SESSION['employee_id'] = $row['emp_code'];
            $_SESSION['started'] = time();
            $out_stauts = 'success';
            $message = 'You are Welcome in Admin Panel';
            $loginvalid = 1;
        }
    } else {
        $out_stauts = 'warning';
        $message = 'Username and Password Incorrect';
        $loginvalid = 0;
    }
}
$response[] = array('status' => $out_stauts, 'msg' => $message, 'login' => $loginvalid);
echo json_encode($response);
?>