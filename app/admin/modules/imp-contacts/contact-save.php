<?php

if (!empty($_POST['person_name']) && !empty($_POST['person_mobile']) && !empty($_POST['person_designation'])) {
    include_once '../../../config/config.php';
    $person_name = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'person_name', FILTER_DEFAULT));
    $person_mobile = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'person_mobile', FILTER_DEFAULT));
    $person_designation = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'person_designation', FILTER_DEFAULT));
    $person_location = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'person_location', FILTER_DEFAULT));
    $out_stauts = "warning";
    $message = "Something Wrong! Please try again.";
    $sql = "INSERT INTO imp_contact (person_name,person_mobile,person_designation,person_location)"
            . "VALUES ('$person_name','$person_mobile', '$person_designation','$person_location')";

    if ($conn->query($sql) === TRUE) {
        $out_stauts = "success";
        $message = "Conatct is Succesfully Added";
    } else {
        $out_stauts = "warning";
        $message = "Conatct  Not Added";
    }
    $conn->close();
    $response[] = array('status' => $out_stauts, 'msg' => $message);
    echo json_encode($response);
}
?>