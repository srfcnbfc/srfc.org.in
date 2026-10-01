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
    $bike_brand = htmlspecialchars(filter_input(INPUT_POST, 'bike_brand', FILTER_SANITIZE_STRING));
    $bike_model = htmlspecialchars(filter_input(INPUT_POST, 'bike_model', FILTER_SANITIZE_STRING));
    $bike_reg_no = htmlspecialchars(filter_input(INPUT_POST, 'bike_reg_no', FILTER_SANITIZE_STRING));
    $bike_reg_year = htmlspecialchars(filter_input(INPUT_POST, 'bike_reg_year', FILTER_DEFAULT));
    
    $pincode = htmlspecialchars(filter_input(INPUT_POST, 'pincode', FILTER_SANITIZE_STRING));
    $city = htmlspecialchars(filter_input(INPUT_POST, 'applicant_city', FILTER_DEFAULT));
    $state = htmlspecialchars(filter_input(INPUT_POST, 'applicant_state', FILTER_DEFAULT));
    $address = htmlspecialchars(filter_input(INPUT_POST, 'applicant_address', FILTER_DEFAULT));
    $applicaiton_type = "Two Wheeler Finance";

    $two_wheeler_query = "SELECT * FROM refinance_loan WHERE mobile='$mobile'";
    $query_num_rows = getNumRows($two_wheeler_query);
    if ($query_num_rows > 0) {
        $message = "You already applied! Please wait";
        $status = "warning";
    } else {
        $finance_submit = "INSERT INTO refinance_loan(name, mobile, pin, address, city, state, bike_brand, bike_model_name, bike_reg_no, bike_reg_year)"
                . "VALUES('$applicant_name','$mobile','$pincode','$address','$city','$state','$bike_brand','$bike_model', '$bike_reg_no','$bike_reg_year')";
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