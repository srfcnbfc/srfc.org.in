<?php
if (!empty($_POST['code'])) {
    include_once '../../../config/config.php';
    $category_code = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'code', FILTER_DEFAULT));
    ///////////////////////////////////////////////////////////////////

    $search_query = "SELECT category_code FROM category WHERE category_code='$category_code'";
    $result = mysqli_query($conn, $search_query)or die(mysqli_error());
//print_r($result);
    $num_row = mysqli_num_rows($result);
    if ($num_row > 0) {
        $sql = "DELETE FROM category WHERE category_code='$category_code'";
        if ($conn->query($sql) === TRUE) {
            $out_stauts = "success";
            $message = "Category is Succesfully Deleted";
        } else {
            $out_stauts = "warning";
            $message = "Category  Not Deleted";
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