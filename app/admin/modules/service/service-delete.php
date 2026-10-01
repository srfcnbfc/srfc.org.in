<?php
if (!empty($_POST['code'])) {
    include_once '../../../config/config.php';
    $service_code = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'code', FILTER_DEFAULT));
    ///////////////////////////////////////////////////////////////////

    $search_query = "SELECT service_code FROM service WHERE service_code='$service_code'";
    $result = mysqli_query($conn, $search_query)or die(mysqli_error());
//print_r($result);
    $num_row = mysqli_num_rows($result);
    if ($num_row > 0) {
        $sql = "DELETE FROM service WHERE service_code='$service_code'";

        if ($conn->query($sql) === TRUE) {
            $out_stauts = "success";
            $message = "Service is Succesfully Deleted";
        } else {
            $out_stauts = "warning";
            $message = "Service  Not Deleted";
        }
    } else {
        $out_stauts = "warning";
        $message = "Service  Not Available";
    }
    $conn->close();

    $response[] = array('status' => $out_stauts, 'msg' => $message);
    echo json_encode($response);
}
?>