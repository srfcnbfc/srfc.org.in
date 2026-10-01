<?php
if (!empty($_POST['code'])) {
    include_once '../../../config/config.php';
    $id = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'code', FILTER_DEFAULT));
    ///////////////////////////////////////////////////////////////////

    $search_query = "SELECT personal_loan_id FROM personal_loan WHERE personal_loan_id='$id'";
    $result = mysqli_query($conn, $search_query)or die(mysqli_error());
//print_r($result);
    $num_row = mysqli_num_rows($result);
    if ($num_row > 0) {
        $sql = "DELETE FROM personal_loan WHERE personal_loan_id='$id'";

        if ($conn->query($sql) === TRUE) {
            $out_stauts = "success";
            $message = "Personal Loan is Succesfully Deleted";
        } else {
            $out_stauts = "warning";
            $message = "Personal Loan  Not Deleted";
        }
    } else {
        $out_stauts = "warning";
        $message = "Personal Loan  Not Available";
    }
    $conn->close();

    $response[] = array('status' => $out_stauts, 'msg' => $message);
    echo json_encode($response);
}
?>