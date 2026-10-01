<?php

if (!empty(htmlspecialchars($_POST['candidate_name'])) && !empty(htmlspecialchars($_POST['candidate_email'])) && !empty(htmlspecialchars($_POST['candidate_mobile']))) {
    include_once '../../app/config/config.php';
    $candidate_name = htmlspecialchars(mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'candidate_name', FILTER_SANITIZE_STRING)));
    $candidate_email = htmlspecialchars(strtolower(mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'candidate_email', FILTER_SANITIZE_EMAIL))));
    $candidate_mobile = htmlspecialchars(mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'candidate_mobile', FILTER_VALIDATE_INT)));
    $candidate_address = htmlspecialchars(mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'candidate_address', FILTER_SANITIZE_STRING)));
    $job_vacancy = htmlspecialchars(mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'job_vacancy', FILTER_SANITIZE_STRING)));
   
    
    ///////////////////////////////////////////////////////////////////
    $tempDir = "../../upload/resume/";
    clearstatcache();
    if (!file_exists($tempDir)) {
        mkdir($tempDir, 0777, true);
    }
    $filename = $_FILES['candidate_resume']['name'];
    // Valid extension
    $valid_ext = array('pdf');
    $photoExt1 = @end(explode('.', $filename)); // explode the image name to get the extension
    $phototest1 = strtolower($photoExt1);
    $imgname =substr(md5(mt_rand()), 0, 3) . '.' . $phototest1;
    $location = $tempDir . '/' . $imgname;
    $fileextension = pathinfo($location, PATHINFO_EXTENSION);
    $file_extension = strtolower($fileextension);
    if (in_array($file_extension, $valid_ext)) {
        move_uploaded_file($_FILES['candidate_resume']['tmp_name'], $location);
        ///////////////////////////////////////////////////////////////////

        $search_query = "SELECT * FROM  job_resume WHERE candidate_mobile='$candidate_mobile' and vacancy_id='$job_vacancy'";
        $result = mysqli_query($conn, $search_query)or die(mysqli_error());
        $num_row = mysqli_num_rows($result);
        if ($num_row > 0) {
            $message = "You are already applied";
        } else {
            $sql = "INSERT INTO job_resume (candidate_name, candidate_mobile, candidate_email, vacancy_id, candidate_address, candidate_resume)"
                    . "VALUES ('$candidate_name', '$candidate_mobile', '$candidate_email', '$job_vacancy', '$candidate_address', '$imgname')";

            if ($conn->query($sql) === TRUE) {
                $out_stauts = "success";
                $message = "Your Application is Succesfully Submitted";
            } else {
                $out_stauts = "warning";
                $message = "Your Application is Failed to Submitted";
            }
        }
        $conn->close();
    } else {
        $out_stauts = "warning";
        $message = "Resume Uploading Failed !";
    }
    $response[] = array('status' => $out_stauts, 'msg' => $message);
    echo json_encode($response);
}
?>