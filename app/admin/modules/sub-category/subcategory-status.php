<?php
if (!empty($_POST['status'])) {
    include_once '../../../config/config.php';
    $subcategory_status = strtoupper(mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'status', FILTER_DEFAULT)));
    $subcategory_code = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'code', FILTER_DEFAULT));
    ///////////////////////////////////////////////////////////////////

    $search_query = "SELECT subcat_code FROM subcategory WHERE subcat_code='$subcategory_code'";
    $result = mysqli_query($conn, $search_query)or die(mysqli_error());
//print_r($result);
    $num_row = mysqli_num_rows($result);
    if ($num_row > 0) {
        $sql = "UPDATE subcategory SET subcat_status='$subcategory_status' WHERE subcat_code='$subcategory_code'";

        if ($conn->query($sql) === TRUE) {
            $out_stauts = "success";
            $message = "SubCategory is Succesfully $subcategory_status";
        } else {
            $out_stauts = "warning";
            $message = "SubCategory  Not Changed";
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