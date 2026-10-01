<?php
if (!empty($_POST['code'])) {
    include_once '../../../config/config.php';
    $subcategory_code = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'code', FILTER_DEFAULT));
    ///////////////////////////////////////////////////////////////////

    $search_query = "SELECT subcat_code FROM subcategory WHERE subcat_code='$subcategory_code'";
    $result = mysqli_query($conn, $search_query)or die(mysqli_error());
//print_r($result);
    $num_row = mysqli_num_rows($result);
    if ($num_row > 0) {
        $sql = "DELETE FROM subcategory WHERE subcat_code='$subcategory_code'";
        $sql1 = "UPDATE product SET subcat_code='$default_subcategory_code' WHERE subcat_code='$subcategory_code'";

        if ($conn->query($sql) === TRUE and $conn->query($sql1) === TRUE) {
            $out_stauts = "success";
            $message = "SubCategory is Succesfully Deleted";
        } else {
            $out_stauts = "warning";
            $message = "SubCategory  Not Deleted";
        }
    } else {
        $out_stauts = "warning";
        $message = "SubCategory  Not Available";
    }
    $conn->close();

    $response[] = array('status' => $out_stauts, 'msg' => $message);
    echo json_encode($response);
}
?>