<?php

if (!empty($_POST['code'])) {
    include_once '../../../config/config.php';
    $investor_doc_cat_id = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'code', FILTER_DEFAULT));
    ///////////////////////////////////////////////////////////////////

    $search_query = "SELECT cat_id FROM investor_doc_category WHERE cat_id='$investor_doc_cat_id'";
    $result = mysqli_query($conn, $search_query)or die(mysqli_error());
//print_r($result);
    $num_row = mysqli_num_rows($result);
    if ($num_row > 0) {
        $sql = "DELETE FROM investor_doc_category WHERE cat_id='$investor_doc_cat_id'";
        if ($conn->query($sql) === TRUE) {
            $out_stauts = "success";
            $message = "Investor Document Category is Succesfully Deleted";
        } else {
            $out_stauts = "warning";
            $message = "Investor Document Category Not Deleted";
        }
    } else {
        $out_stauts = "warning";
        $message = "Investor Document Category Not Available";
    }
    $conn->close();

    $response[] = array('status' => $out_stauts, 'msg' => $message);
    echo json_encode($response);
}
?>