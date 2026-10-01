<?php
if (!empty($_POST['contact_no']) || !empty($_POST['contact_email']) ) {
    include_once '../../../../config/config.php';
    $out_stauts = "warning";
    $message = "Some thing Problem";
    $contact_no = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'contact_no', FILTER_DEFAULT));
    $contact_shrt_location = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'contact_shrt_location', FILTER_DEFAULT));
    $contact_email = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'contact_email', FILTER_DEFAULT));
    $contact_address = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'contact_address', FILTER_DEFAULT));
    $contact_map = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'contact_map', FILTER_DEFAULT));
    ///////////////////////////////////////////////////////////////////
$sql = "UPDATE contact SET contact_no= '$contact_no', contact_email= '$contact_email', contact_address= '$contact_address', contact_shrt_location= '$contact_shrt_location', contact_map= '$contact_map' WHERE 1";
  if ($conn->query($sql) === TRUE) {
        $out_stauts = "success";
        $message = "Contact is Succesfully Update";
    } else {
        $out_stauts = "warning";
        $message = "Contact  Not Added";
    }

    $conn->close();
    $response[] = array('status' => $out_stauts, 'msg' => $message);
    echo json_encode($response);
}
?>