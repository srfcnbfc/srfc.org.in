<?php

include_once '../../../app/config/config.php';
$message = "Sorry ! Something Wrong Please Try Again";
$status = "warning";
$tokenvalue = htmlspecialchars(filter_input(INPUT_POST, 'token', FILTER_SANITIZE_STRING));
$mobile_sql = "SELECT * FROM guest_enquiry WHERE guest_token='$tokenvalue' and guest_verify_status='VERIFIED'";
$num_row = getNumRows($mobile_sql);

if ($num_row > 0) {
    $mobile = getsingleData($mobile_sql)['guest_mobile'];
    $applicant_name = htmlspecialchars(filter_input(INPUT_POST, 'applicant_name', FILTER_DEFAULT));
    $tractor_brand = htmlspecialchars(filter_input(INPUT_POST, 'tractor_brand', FILTER_SANITIZE_STRING));
    $tractor_model = htmlspecialchars(filter_input(INPUT_POST, 'tractor_model', FILTER_SANITIZE_STRING));
    $tractor_reg_no = htmlspecialchars(filter_input(INPUT_POST, 'tractor_reg_no', FILTER_SANITIZE_STRING));
    $tractor_reg_year = htmlspecialchars(filter_input(INPUT_POST, 'tractor_reg_year', FILTER_SANITIZE_STRING));

    $pincode = htmlspecialchars(filter_input(INPUT_POST, 'pincode', FILTER_SANITIZE_STRING));
    $city = htmlspecialchars(filter_input(INPUT_POST, 'applicant_city', FILTER_DEFAULT));
    $state = htmlspecialchars(filter_input(INPUT_POST, 'applicant_state', FILTER_DEFAULT));
    $address = htmlspecialchars(filter_input(INPUT_POST, 'applicant_address', FILTER_DEFAULT));

    $two_wheeler_query = "SELECT * FROM tractor_refinance WHERE mobile='$mobile'";
    $query_num_rows = getNumRows($two_wheeler_query);
    if ($query_num_rows > 0) {
        $message = "You already applied! Please wait";
        $status = "warning";
    } else {
        $finance_submit = "INSERT INTO tractor_refinance(name, mobile, pin, address, city, state, tractor_brand, tractor_model_name, tractor_reg_no, tractor_reg_year)"
                . "VALUES('$applicant_name','$mobile','$pincode','$address','$city','$state','$tractor_brand','$tractor_model','$tractor_reg_no','$tractor_reg_year')";
        $otp_update = "UPDATE guest_enquiry SET guest_verify_status='COMPLETED'";

        if (($conn->query($finance_submit) === TRUE ) && ($conn->query($otp_update) === TRUE )) {
            $message = "Congrats ! You are Successfully Applied";
            $status = "success";
        } else {
            $message = "Sorry ! Something Wrong Please Try Again";
            $status = "warning";
        }
    }
} else {
    $message = "Sorry ! Something Wrong Please Try Again";
    $status = "warning";
}
$conn->close();
$response[] = array('status' => $status, 'msg' => $message);
echo json_encode($response);
?>