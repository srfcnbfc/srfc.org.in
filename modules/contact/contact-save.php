<?php
if (!empty(htmlspecialchars($_POST['enq_name'])) && !empty(htmlspecialchars($_POST['enq_email'])) && !empty(htmlspecialchars($_POST['enq_mobile']))) {
    include_once '../../app/config/config.php';
    $enq_name = htmlspecialchars(mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'enq_name', FILTER_SANITIZE_STRING)));
    $enq_email = htmlspecialchars(strtolower(mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'enq_email', FILTER_SANITIZE_EMAIL))));
    $enq_mobile = htmlspecialchars(mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'enq_mobile', FILTER_VALIDATE_INT)));
    $enq_msg = htmlspecialchars(mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'enq_msg', FILTER_SANITIZE_STRING)));

    $search_query = "SELECT * FROM  enquiry WHERE enq_mobile='$enq_mobile'";
    $result = mysqli_query($conn, $search_query)or die(mysqli_error());
    $num_row = mysqli_num_rows($result);
    if ($num_row > 0) {
        $message = "You are Already Send Message";
    } else {
        $sql = "INSERT INTO enquiry (enq_name, enq_email, enq_mobile, enq_msg)"
                . "VALUES ('$enq_name', '$enq_email', '$enq_mobile', '$enq_msg')";
        if ($conn->query($sql) === TRUE) {
            $out_stauts = "success";
            $message = "Your Enquiry is Succesfully Submitted";
        } else {
            $out_stauts = "warning";
            $message = "Your Enquiry is Failed to Submitted";
        }
    }
    $conn->close();

    $response[] = array('status' => $out_stauts, 'msg' => $message);
    echo json_encode($response);
}
?>