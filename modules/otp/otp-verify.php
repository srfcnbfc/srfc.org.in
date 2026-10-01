<?php
include_once '../../app/config/front-config.php';

$tokenData = htmlspecialchars(filter_input(INPUT_POST, 'token', FILTER_DEFAULT));
$otp1 = htmlspecialchars(filter_input(INPUT_POST, 'otp1', FILTER_SANITIZE_NUMBER_INT));
$otp2 = htmlspecialchars(filter_input(INPUT_POST, 'otp2', FILTER_SANITIZE_NUMBER_INT));
$otp3 = htmlspecialchars(filter_input(INPUT_POST, 'otp3', FILTER_SANITIZE_NUMBER_INT));
$otp4 = htmlspecialchars(filter_input(INPUT_POST, 'otp4', FILTER_SANITIZE_NUMBER_INT));
$otp5 = htmlspecialchars(filter_input(INPUT_POST, 'otp5', FILTER_SANITIZE_NUMBER_INT));

$otpData = $otp1 . $otp2 . $otp3 . $otp4 . $otp5;
$verify_sql = "SELECT * FROM guest_enquiry WHERE guest_token ='$tokenData' and guest_otp='$otpData' and guest_verify_status='UNVERIFIED'";
$result = mysqli_query($conn, $verify_sql)or die(mysqli_error());
$num_row = mysqli_num_rows($result);
if ($num_row > 0) {
    $otp_update = "UPDATE guest_enquiry SET guest_verify_status='VERIFIED'";
    if ($conn->query($otp_update) === TRUE) {
        $message = "Successfully Verified";
        $mytoken = $tokenData;
        $task ='1';
    } else {
        $message = "Verification Failed ! Please try again";
        $mytoken = $tokenData;
        $task ='1';
    }
} else {
    $message = "Please Enter Correct Otp";
    $mytoken = "";
    $task ='0';
}
$response[] = array('message' => $message, 'mytoken' => $mytoken, 'task_status'=>$task);
echo json_encode($response);
?>