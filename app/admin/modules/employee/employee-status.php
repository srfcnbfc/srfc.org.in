<?php

if (!empty($_POST['status'])) {
    include_once '../../../config/config.php';
    $emp_status = strtoupper(mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'status', FILTER_DEFAULT)));
    $emp_code = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'code', FILTER_DEFAULT));
    ///////////////////////////////////////////////////////////////////
    $out_stauts = "warning";
    $message = "Something Wrong! Please Try Again";
    $search_query = "SELECT emp_code FROM employee WHERE emp_code='$emp_code'";
    $result = mysqli_query($conn, $search_query)or die(mysqli_error());
//print_r($result);
    $num_row = mysqli_num_rows($result);
    if ($num_row > 0) {
        $sql = "UPDATE employee SET emp_status='$emp_status' WHERE emp_code='$emp_code'";

        if ($conn->query($sql) === TRUE) {
            $out_stauts = "success";
            $message = "Employee is Succesfully $emp_status";
        } else {
            $out_stauts = "warning";
            $message = "Employee  Not Changed";
        }
    } else {
        $out_stauts = "warning";
        $message = "Employee  Not Available";
    }
    $conn->close();

    $response[] = array('status' => $out_stauts, 'msg' => $message);
    echo json_encode($response);
}
?>