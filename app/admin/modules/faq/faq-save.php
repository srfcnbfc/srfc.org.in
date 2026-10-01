<?php

if (!empty($_POST['service_code']) && !empty($_POST['faq_ques']) && !empty($_POST['faq_ans'])) {
    include_once '../../../config/config.php';
    $service_code = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'service_code', FILTER_DEFAULT));
    $faq_ques = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'faq_ques', FILTER_DEFAULT));
    $faq_ans = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'faq_ans', FILTER_DEFAULT));

    $sql = "INSERT INTO faq (service_code,faq_ques,faq_ans)"
            . "VALUES ('$service_code','$faq_ques', '$faq_ans')";

    if ($conn->query($sql) === TRUE) {
        $out_stauts = "success";
        $message = "FAQ is Succesfully Added";
    } else {
        $out_stauts = "warning";
        $message = "FAQ  Not Added";
    }
    $conn->close();
    $response[] = array('status' => $out_stauts, 'msg' => $message);
    echo json_encode($response);
}
?>