<?php
if (!empty($_POST['service_name'] && !empty($_POST['service_slug']) && !empty($_POST['service_headline']))) {
    include_once '../../../config/config.php';
    $service_code = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'service_code', FILTER_DEFAULT));
    $service_name = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'service_name', FILTER_DEFAULT));
    $service_slug = strtolower(mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'service_slug', FILTER_DEFAULT)));
    $service_headline = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'service_headline', FILTER_DEFAULT));
    $service_shrt_description = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'service_shrt_descp', FILTER_DEFAULT));
    $service_description = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'service_descp', FILTER_DEFAULT));
    $service_status = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'service_status', FILTER_DEFAULT));
    $enableimg = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'enableimg', FILTER_DEFAULT));

    if ($enableimg === 'img_enable') {
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
            compressedImage($_FILES['service_img']['tmp_name'], $location, 60);
            ///////////////////////////////////////////////////////////////////
        }
        $sql = "UPDATE service SET service_name= '$service_name', service_slug= '$service_slug', service_headline= '$service_headline', service_shrt_description= '$service_shrt_description', service_description= '$service_description', service_img= '$imgname', service_status= '$service_status'  WHERE service_code='$service_code'";
    } else {
        $sql = "UPDATE service SET service_name= '$service_name', service_slug= '$service_slug', service_headline= '$service_headline', service_shrt_description= '$service_shrt_description', service_description= '$service_description', service_status= '$service_status'  WHERE service_code='$service_code'";
   }
    $search_query = "SELECT * FROM service WHERE service_code='$service_code'";
    $result = mysqli_query($conn, $search_query)or die(mysqli_error());
//print_r($result);
    $num_row = mysqli_num_rows($result);
    if ($num_row > 0) {
        if ($conn->query($sql) === TRUE) {
            $out_stauts = "success";
            $message = "Service is Succesfully Updated";
        } else {
            $out_stauts = "warning";
            $message = "Service  Not Update";
        }
    } else {
        $out_stauts = "warning";
        $message = "Service  Not Available";
    }
    $conn->close();

    $response[] = array('status' => $out_stauts, 'msg' => $message);
    echo json_encode($response);
}
?>