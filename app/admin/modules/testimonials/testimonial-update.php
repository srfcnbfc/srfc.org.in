<?php

if (!empty($_POST['client_name']) && !empty($_POST['client_designation']) && !empty($_POST['client_msg'])) {
    include_once '../../../config/config.php';
    $testimonial_id = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'testimonial_id', FILTER_DEFAULT));
    $client_name = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'client_name', FILTER_DEFAULT));
    $client_designation = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'client_designation', FILTER_DEFAULT));
    $client_msg = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'client_msg', FILTER_DEFAULT));
    $enableimg = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'enableimg', FILTER_DEFAULT));

    if ($enableimg === 'img_enable') {
        ///////////////////////////////////////////////////////////////////
        $tempDir = "../../../../upload/testimonial";
        clearstatcache();
        if (!file_exists($tempDir)) {
            mkdir($tempDir, 0777, true);
        }
        $filename = $_FILES['client_img']['name'];
        // Valid extension
        $valid_ext = array('png', 'jpeg', 'jpg');
        $photoExt1 = @end(explode('.', $filename)); // explode the image name to get the extension
        $phototest1 = strtolower($photoExt1);
        $imgname = substr(md5(mt_rand()), 0, 3) . '.' . $phototest1;
        $location = $tempDir . '/' . $imgname;
        $fileextension = pathinfo($location, PATHINFO_EXTENSION);
        $file_extension = strtolower($fileextension);
        if (in_array($file_extension, $valid_ext)) {
            // Compress Image
            compressedImage($_FILES['client_img']['tmp_name'], $location, 60);
            ///////////////////////////////////////////////////////////////////
        }
        $sql = "UPDATE testimonial SET person_name='$client_name',person_designation='$client_designation', testimonial_description='$client_msg', person_img='$imgname' WHERE testimonial_id='$testimonial_id'";
    } else {
        $sql = "UPDATE testimonial SET person_name='$client_name',person_designation='$client_designation', testimonial_description='$client_msg' WHERE testimonial_id='$testimonial_id'";
    }

    if ($conn->query($sql) === TRUE) {
        $out_stauts = "success";
        $message = "Testimonial is Succesfully Updated";
    } else {
        $out_stauts = "warning";
        $message = "Testimonial  Not Update";
    }
    $conn->close();
    $response[] = array('status' => $out_stauts, 'msg' => $message);
    echo json_encode($response);
}
?>