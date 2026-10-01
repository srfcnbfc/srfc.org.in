<?php

if (!empty($_POST['job_title']) && !empty($_POST['job_designation'])) {
    include_once '../../../config/config.php';
    $job_title = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'job_title', FILTER_DEFAULT));
    $job_title_slug = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'job_title_slug', FILTER_DEFAULT));
    $job_designation = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'job_designation', FILTER_DEFAULT));
    $candidate_level = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'candidate_level', FILTER_DEFAULT));
    $job_timing = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'job_timing', FILTER_DEFAULT));
    $job_responsibility = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'job_responsibility', FILTER_DEFAULT));
    
    $slug = sanitize($job_title);

    ///////////////////////////////////////////////////////////////////
    $tempDir = "../../../../upload/vacancy";
    clearstatcache();
    if (!file_exists($tempDir)) {
        mkdir($tempDir, 0777, true);
    }
    $filename = $_FILES['job_img']['name'];
    // Valid extension
    $valid_ext = array('png', 'jpeg', 'jpg');
    $photoExt1 = @end(explode('.', $filename)); // explode the image name to get the extension
    $phototest1 = strtolower($photoExt1);
    $imgname = $slug . '-' . substr(md5(mt_rand()), 0, 3) . '.' . $phototest1;
    $location = $tempDir . '/' . $imgname;
    $fileextension = pathinfo($location, PATHINFO_EXTENSION);
    $file_extension = strtolower($fileextension);
    if (in_array($file_extension, $valid_ext)) {
        // Compress Image
        compressedImage($_FILES['job_img']['tmp_name'], $location, 60);
        ///////////////////////////////////////////////////////////////////

        $search_query = "SELECT * FROM vacancy WHERE job_title_slug='$job_title_slug'";
        $result = mysqli_query($conn, $search_query)or die(mysqli_error());
//print_r($result);
        $num_row = mysqli_num_rows($result);
        if ($num_row > 0) {
            $out_stauts = "warning";
            $message = "Job vacancy is Already Exist.";
        } else {
            $sql = "INSERT INTO vacancy (job_title, job_title_slug, job_designation, candidate_level, job_timing, job_responsibility, job_img)"
                    . "VALUES ('$job_title', '$job_title_slug', '$job_designation', '$candidate_level', '$job_timing', '$job_responsibility','$imgname')";

            if ($conn->query($sql) === TRUE) {
                $out_stauts = "success";
                $message = "Job vacancy is Succesfully Added";
            } else {
                $out_stauts = "warning";
                $message = "Job vacancy  Not Added";
            }
        }
        $conn->close();
    } else {
        $out_stauts = "warning";
        $message = "Job vacancy Image Uploading Failed !";
    }
    $response[] = array('status' => $out_stauts, 'msg' => $message);
    echo json_encode($response);
}
?>