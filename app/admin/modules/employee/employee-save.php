<?php

if (!empty($_POST['emp_name']) && !empty($_POST['emp_code']) && !empty($_POST['emp_mobile'])) {
    include_once '../../../config/config.php';
    $emp_name = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'emp_name', FILTER_DEFAULT));
    $emp_code = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'emp_code', FILTER_DEFAULT));
    $emp_mobile = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'emp_mobile', FILTER_DEFAULT));
    $emp_department= mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'emp_department', FILTER_DEFAULT));
    $emp_designation= mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'emp_designation', FILTER_DEFAULT));
    $emp_job_type= mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'emp_job_type', FILTER_DEFAULT));
    $emp_location = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'emp_location', FILTER_DEFAULT));

        $search_query = "SELECT * FROM employee WHERE emp_code='$emp_code'";
        $result = mysqli_query($conn, $search_query)or die(mysqli_error());
        $num_row = mysqli_num_rows($result);
        if ($num_row > 0) {
            $out_stauts = "warning";
            $message = "Employee is Already Exist.";
        } else {
            $sql = "INSERT INTO employee (emp_code, emp_mobile, emp_name, emp_location, emp_department,emp_designation,emp_job_type)"
                    . "VALUES ('$emp_code', '$emp_mobile', '$emp_name', '$emp_location', '$emp_department', '$emp_designation', '$emp_job_type')";

            if ($conn->query($sql) === TRUE) {
                $out_stauts = "success";
                $message = "Employee is Succesfully Added";
            } else {
                $out_stauts = "warning";
                $message = "Employee  Not Added";
            }
        }
        $conn->close();
   
    $response[] = array('status' => $out_stauts, 'msg' => $message);
    echo json_encode($response);
}
?>