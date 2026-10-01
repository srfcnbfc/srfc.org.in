<?php

if (!empty($_POST['service_name'] && !empty($_POST['service_slug']) && !empty($_POST['service_headline']))) {
    include_once '../../../config/config.php';
    include_once '../../session.php';
    $service_name = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'service_name', FILTER_DEFAULT));
    $service_slug = strtolower(mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'service_slug', FILTER_DEFAULT)));
    $service_headline = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'service_headline', FILTER_DEFAULT));
    $service_shrt_description = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'service_shrt_descp', FILTER_DEFAULT));
    $service_description = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'service_descp', FILTER_DEFAULT));
   

    $service_status = "ACTIVE";
    $service_code = 'S-' . substr(md5(mt_rand()), 0, 7);
    ///////////////////////////////////////////////////////////////////
    $tempDir = "../../../../upload/services";
    clearstatcache();
    if (!file_exists($tempDir)) {
        mkdir($tempDir, 0777, true);
    }
    $filename = $_FILES['service_img']['name'];
    // Valid extension
    $valid_ext = array('png', 'jpeg', 'jpg');
    $photoExt1 = @end(explode('.', $filename)); // explode the image name to get the extension
    $phototest1 = strtolower($photoExt1);
    $imgname = $service_slug . '-' . substr(md5(mt_rand()), 0, 3) . '.' . $phototest1;
    $location = $tempDir . '/' . $imgname;
    $fileextension = pathinfo($location, PATHINFO_EXTENSION);
    $file_extension = strtolower($fileextension);
    if (in_array($file_extension, $valid_ext)) {
        // Compress Image
        compressedImage($_FILES['service_img']['tmp_name'], $location, 9);
        ///////////////////////////////////////////////////////////////////

        $search_query = "SELECT * FROM service WHERE service_code='$service_code'";
        $result = mysqli_query($conn, $search_query)or die(mysqli_error());
//print_r($result);
        $num_row = mysqli_num_rows($result);
        if ($num_row > 0) {
            $message = "Category is Already Exist.";
        } else {
            $sql = "INSERT INTO service (service_code, service_name, service_slug, service_headline, service_shrt_description, service_description, service_img, service_status)"
                    . "VALUES ('$service_code', '$service_name', '$service_slug', '$service_headline', '$service_shrt_description', '$service_description', '$imgname', '$service_status')";

            if ($conn->query($sql) === TRUE) {
                $out_stauts = "success";
                $message = "Service is Succesfully Added";
            } else {
                $out_stauts = "warning";
                $message = "Service  Not Added";
            }
        }
        $conn->close();
    } else {
        $out_stauts = "warning";
        $message = "Service Image Uploading Failed !";
    }
    $response[] = array('status' => $out_stauts, 'msg' => $message);
    echo json_encode($response);
}
?>