<?php

if (!empty($_POST['status'])) {
    include_once '../../../config/config.php';
    $category_status = strtoupper(mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'status', FILTER_DEFAULT)));
    $category_code = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'code', FILTER_DEFAULT));
    ///////////////////////////////////////////////////////////////////

    $search_query = "SELECT category_code FROM category WHERE category_code='$category_code'";
    $result = mysqli_query($conn, $search_query)or die(mysqli_error());
//print_r($result);
    $num_row = mysqli_num_rows($result);
    if ($num_row > 0) {
        $sql = "UPDATE category SET category_status='$category_status' WHERE category_code='$category_code'";

        if ($conn->query($sql) === TRUE) {
            $out_stauts = "success";
            $message = "Category is Succesfully $category_status";
        } else {
            $out_stauts = "warning";
            $message = "Category  Not Changed";
        }
    } else {
        $out_stauts = "warning";
        $message = "Category  Not Available";
    }
    $conn->close();

    $response[] = array('status' => $out_stauts, 'msg' => $message);
    echo json_encode($response);
}
?>