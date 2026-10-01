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
    $shop_name= htmlspecialchars(filter_input(INPUT_POST, 'shop_name', FILTER_SANITIZE_STRING));
    $shop_location = htmlspecialchars(filter_input(INPUT_POST, 'shop_location', FILTER_SANITIZE_STRING));
    
    $pincode = htmlspecialchars(filter_input(INPUT_POST, 'pincode', FILTER_SANITIZE_STRING));
    $city = htmlspecialchars(filter_input(INPUT_POST, 'applicant_city', FILTER_DEFAULT));
    $state = htmlspecialchars(filter_input(INPUT_POST, 'applicant_state', FILTER_DEFAULT));
    $address = htmlspecialchars(filter_input(INPUT_POST, 'applicant_address', FILTER_DEFAULT));

    $two_wheeler_query = "SELECT * FROM business_loan WHERE mobile='$mobile'";
    $query_num_rows = getNumRows($two_wheeler_query);
    if ($query_num_rows > 0) {
        $message = "You already applied! Please wait";
        $status = "warning";
    } else {
        $finance_submit = "INSERT INTO business_loan(name, mobile, pin, address, city, state, shop_name, shop_location)"
                . "VALUES('$applicant_name','$mobile','$pincode','$address','$city','$state','$shop_name','$shop_location')";
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
$response[] = array( 'status' => $status, 'msg' => $message);
echo json_encode($response);
?>