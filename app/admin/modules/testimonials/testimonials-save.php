<?php

if (!empty($_POST['client_name']) && !empty($_POST['client_designation']) && !empty($_POST['client_msg'])) {
    include_once '../../../config/config.php';
    $client_name = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'client_name', FILTER_DEFAULT));
    $client_designation = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'client_designation', FILTER_DEFAULT));
    $client_msg = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'client_msg', FILTER_DEFAULT));
    $category_status = "ACTIVE";

    
    ///////////////////////////////////////////////////////////////////
    $tempDir = "../../../../upload/testimonial/";
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

        $search_query = "SELECT * FROM testimonial WHERE person_name='$client_name'";
        $result = mysqli_query($conn, $search_query)or die(mysqli_error());
//print_r($result);
        $num_row = mysqli_num_rows($result);
        if ($num_row > 0) {
            $out_stauts = "warning";
            $message = "Client Testimonial is Already Exist.";
        } else {
            $sql = "INSERT INTO testimonial (person_name, person_designation, testimonial_description, person_img)"
                    . "VALUES ('$client_name', '$client_designation', '$client_msg', '$imgname')";

            if ($conn->query($sql) === TRUE) {
                $out_stauts = "success";
                $message = "Testimonial is Succesfully Added";
            } else {
                $out_stauts = "warning";
                $message = "Testimonial  Not Added";
            }
        }
        $conn->close();
    } else {
        $out_stauts = "warning";
        $message = "Category Image Uploading Failed !";
    }
    $response[] = array('status' => $out_stauts, 'msg' => $message);
    echo json_encode($response);
}
?>