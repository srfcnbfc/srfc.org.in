<?php
if (!empty($_POST['code'])) {
    include_once '../../../config/config.php';
    $enq_id = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'code', FILTER_DEFAULT));
    ///////////////////////////////////////////////////////////////////

    $search_query = "SELECT enq_id FROM enquiry WHERE enq_id='$enq_id'";
    $result = mysqli_query($conn, $search_query)or die(mysqli_error());
//print_r($result);
    $num_row = mysqli_num_rows($result);
    if ($num_row > 0) {
        $sql = "DELETE FROM enquiry WHERE enq_id='$enq_id'";

        if ($conn->query($sql) === TRUE) {
            $out_stauts = "success";
            $message = "Enquiry is Succesfully Deleted";
        } else {
            $out_stauts = "warning";
            $message = "Enquiry  Not Deleted";
        }
    } else {
        $out_stauts = "warning";
        $message = "Enquiry  Not Available";
    }
    $conn->close();

    $response[] = array('status' => $out_stauts, 'msg' => $message);
    echo json_encode($response);
}
?>