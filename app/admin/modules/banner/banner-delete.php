
<?php
if (!empty($_POST['code'])) {
    include_once '../../../config/config.php';
    $banner_id = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'code', FILTER_DEFAULT));
    ///////////////////////////////////////////////////////////////////

    $search_query = "SELECT banner_id FROM banner WHERE banner_id='$banner_id'";
    $result = mysqli_query($conn, $search_query)or die(mysqli_error());
//print_r($result);
    $num_row = mysqli_num_rows($result);
    if ($num_row > 0) {
        $sql = "DELETE FROM banner WHERE banner_id='$banner_id'";

        if ($conn->query($sql) === TRUE) {
            $out_stauts = "success";
            $message = "Banner is Succesfully Deleted";
        } else {
            $out_stauts = "warning";
            $message = "Banner  Not Deleted";
        }
    } else {
        $out_stauts = "warning";
        $message = "Banner  Not Available";
    }
    $conn->close();

    $response[] = array('status' => $out_stauts, 'msg' => $message);
    echo json_encode($response);
}
?>