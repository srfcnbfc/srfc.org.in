<?php
if (!empty($_POST['person_name']) && !empty($_POST['notification_msg'])) {
    include_once '../../../config/config.php';
    $emp_code = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'person_name', FILTER_DEFAULT));
    $notification_msg = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'notification_msg', FILTER_DEFAULT));
    $out_stauts = "warning";
    $message = "Something Wrong! Please try again.";
    $sql = "INSERT INTO emp_notification (emp_code,notification_msg)"
            . "VALUES ('$emp_code','$notification_msg')";

    if ($conn->query($sql) === TRUE) {
        $out_stauts = "success";
        $message = "Notification is Succesfully Added";
    } else {
        $out_stauts = "warning";
        $message = "Notification  Not Added";
    }
    $conn->close();
    $response[] = array('status' => $out_stauts, 'msg' => $message);
    echo json_encode($response);
}
?>
