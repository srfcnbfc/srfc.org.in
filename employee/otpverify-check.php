<?php
session_start();
require_once 'config/data-connect.php';
$verify1 = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'otp1', FILTER_DEFAULT));
$verify2 = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'otp2', FILTER_DEFAULT));
$verify3 = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'otp3', FILTER_DEFAULT));
$verify4 = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'otp4', FILTER_DEFAULT));
$verify5 = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'otp5', FILTER_DEFAULT));

$otp_final = $verify1.$verify2.$verify3.$verify4.$verify5; 
$employeeID = $_SESSION['employee_id'];
$out_stauts = 'warning';
$message = 'Something Wrong! Please Try Again';
$otpvalid = 0;
if (!empty($otp_final)) {
    $query = "SELECT * FROM emp_otp_verify WHERE emp_code= '$employeeID' AND otp_no='$otp_final' AND otp_status='ACTIVE'";
    $result = mysqli_query($conn, $query)or die(mysqli_error());
    $num_row = mysqli_num_rows($result);
    if ($num_row > 0) {
        $row = mysqli_fetch_assoc($result);
         $message = 'You are Welcome in Admin Panel';
         $_SESSION['EmpSessionID']  = $employeeID;
         $otp_verify_done  = "UPDATE emp_otp_verify SET otp_status='EXPIRED' WHERE emp_code='$employeeID'";
         if ($conn->query($otp_verify_done)){
             $otpvalid =1;
         }
//        $otp_sql = "INSERT INTO emp_otp_verify(emp_code, emp_mobile, otp_no, otp_status)"
//                . "VALUES('$employeeID','$mobile','$login_otp','ACTIVE')";
//        if ($conn->query($otp_sql)) {
//            $_SESSION['employee_id'] = $row['emp_code'];
//            $_SESSION['started'] = time();
//            $out_stauts = 'success';
//            $message = 'You are Welcome in Admin Panel';
//            $loginvalid = 1;
//        }
    } else {
        $out_stauts = 'warning';
        $message = 'OTP is Incorrect';
        $otpvalid = 0;
    }
}
$response[] = array('status' => $out_stauts, 'msg' => $message, 'otp' => $otpvalid);
echo json_encode($response);
?>