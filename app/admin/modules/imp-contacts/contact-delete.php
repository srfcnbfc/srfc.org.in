<?php
if (!empty($_POST['code'])) {
    include_once '../../../config/config.php';
    $contact_id = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'code', FILTER_DEFAULT));
    ///////////////////////////////////////////////////////////////////
    $out_stauts = "warning";
    $message = "Somethig Wrong! Please try again.";
    $search_query = "SELECT contact_id FROM imp_contact WHERE contact_id='$contact_id'";
    $result = mysqli_query($conn, $search_query)or die(mysqli_error());
//print_r($result);
    $num_row = mysqli_num_rows($result);
    if ($num_row > 0) {
        $sql = "DELETE FROM imp_contact WHERE contact_id='$contact_id'";
        if ($conn->query($sql) === TRUE) {
            $out_stauts = "success";
            $message = "Contact is Succesfully Deleted";
        } else {
            $out_stauts = "warning";
            $message = "Contact  Not Deleted";
        }
    } else {
        $out_stauts = "warning";
        $message = "Contact  Not Available";
    }
    $conn->close();

    $response[] = array('status' => $out_stauts, 'msg' => $message);
    echo json_encode($response);
}
?>