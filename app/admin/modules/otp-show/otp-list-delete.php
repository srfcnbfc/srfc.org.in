<?php
if (!empty($_POST['code'])) {
    include_once '../../../config/config.php';
    $guest_id = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'code', FILTER_DEFAULT));
    ///////////////////////////////////////////////////////////////////
    $search_query = "SELECT guest_id FROM guest_enquiry WHERE guest_id='$guest_id'";
    $result = mysqli_query($conn, $search_query)or die(mysqli_error());
//print_r($result);
    $num_row = mysqli_num_rows($result);
    if ($num_row > 0) {
        $sql = "DELETE FROM guest_enquiry WHERE guest_id='$guest_id'";

        if ($conn->query($sql) === TRUE) {
            $out_stauts = "success";
            $message = "Mobile is Succesfully Deleted";
        } else {
            $out_stauts = "warning";
            $message = "Mobile  Not Deleted";
        }
    } else {
        $out_stauts = "warning";
        $message = "Mobile  Not Available";
    }
    $conn->close();

    $response[] = array('status' => $out_stauts, 'msg' => $message);
    echo json_encode($response);
}
?>