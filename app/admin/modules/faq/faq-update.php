<?php

if (!empty($_POST['faq_id']) && !empty($_POST['faq_ques']) && !empty($_POST['faq_ans'])) {
    include_once '../../../config/config.php';
    $faq_id = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'faq_id', FILTER_DEFAULT));
    $faq_ques = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'faq_ques', FILTER_DEFAULT));
    $faq_ans = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'faq_ans', FILTER_DEFAULT));

    $sql = "UPDATE faq SET faq_ques='$faq_ques',faq_ans='$faq_ans' WHERE faq_id='$faq_id'";

    $search_query = "SELECT * FROM faq WHERE faq_id='$faq_id'";
    $result = mysqli_query($conn, $search_query)or die(mysqli_error());
//print_r($result);
    $num_row = mysqli_num_rows($result);
    if ($num_row > 0) {
        if ($conn->query($sql) === TRUE) {
            $out_stauts = "success";
            $message = "FAQ is Succesfully Updated";
        } else {
            $out_stauts = "warning";
            $message = "FAQ  Not Update";
        }
    } else {
        $out_stauts = "warning";
        $message = "FAQ  Not Available";
    }
    $conn->close();

    $response[] = array('status' => $out_stauts, 'msg' => $message);
    echo json_encode($response);
}
?>