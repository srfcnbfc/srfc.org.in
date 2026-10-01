<?php
if (!empty($_POST['code'])) {
    include_once '../../../config/config.php';
    $notification_id = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'code', FILTER_DEFAULT));
    ///////////////////////////////////////////////////////////////////
    $out_stauts = "warning";
    $message = "Somethig Wrong! Please try again.";
    
    $search_query = "SELECT notification_id FROM emp_notification WHERE notification_id='$notification_id'";
    $result = mysqli_query($conn, $search_query)or die(mysqli_error());
    $num_row = mysqli_num_rows($result);
    if ($num_row > 0) {
        $sql = "DELETE FROM emp_notification WHERE notification_id='$notification_id'";
        if ($conn->query($sql) === TRUE) {
            $out_stauts = "success";
            $message = "Notification is Succesfully Deleted";
        } else {
            $out_stauts = "warning";
            $message = "Notification  Not Deleted";
        }
    } else {
        $out_stauts = "warning";
        $message = "Notification  Not Available";
    }
    $conn->close();

    $response[] = array('status' => $out_stauts, 'msg' => $message);
    echo json_encode($response);
}
?>