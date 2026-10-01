<?php
if (!empty($_POST['emp_name']) && !empty($_POST['emp_code']) && !empty($_POST['emp_mobile'])) {
    include_once '../../../config/config.php';
    $emp_name = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'emp_name', FILTER_DEFAULT));
    $emp_code = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'emp_code', FILTER_DEFAULT));
    $emp_mobile = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'emp_mobile', FILTER_DEFAULT));
    $emp_department = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'emp_department', FILTER_DEFAULT));
    $emp_designation= mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'emp_designation', FILTER_DEFAULT));
    $emp_job_type= mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'emp_job_type', FILTER_DEFAULT));
    $emp_location = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'emp_location', FILTER_DEFAULT));
    $out_stauts = "warning";
    $message = "Something Wrong! Please Try Again";
    $sql = "UPDATE employee SET emp_name='$emp_name', emp_mobile='$emp_mobile', emp_department='$emp_department',emp_designation='$emp_designation',emp_job_type='$emp_job_type', emp_location='$emp_location' WHERE emp_code='$emp_code'";

    if ($conn->query($sql) === TRUE) {
        $out_stauts = "success";
        $message = "Employee is Succesfully Updated";
    } else {
        $out_stauts = "warning";
        $message = "Employee  Not Update";
    }
    $conn->close();
    $response[] = array('status' => $out_stauts, 'msg' => $message);
    echo json_encode($response);
}
?>