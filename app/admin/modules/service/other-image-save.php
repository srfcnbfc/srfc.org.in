<?php

if (!empty($_POST['product_code'] && !empty($_POST['image_name']))) {
    include_once '../../../config/config.php';
    $product_code = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'product_code', FILTER_DEFAULT));
    $product_image_name = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'image_name', FILTER_DEFAULT));
    ///////////////////////////////////////////////////////////////////
    $tempDir = "../../../../upload/product/$product_code/";
    clearstatcache();
    if (!file_exists($tempDir)) {
        mkdir($tempDir, 0777, true);
    }
    $filename = $_FILES['product_img']['name'];
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
        compressedImage($_FILES['product_img']['tmp_name'], $location, 60);
        ///////////////////////////////////////////////////////////////////
        $out_stauts = "warning";
        $message = "Something Wrong";
        $sql = "INSERT INTO product_imgs (prod_code, prod_img, img_name)"
                . "VALUES ('$product_code','$imgname','$product_image_name')";

        if ($conn->query($sql) === TRUE) {
            $out_stauts = "success";
            $message = "Image is Succesfully Added";
        } else {
            $out_stauts = "warning";
            $message = "Image  Not Added";
        }
    }
    $conn->close();

    $response[] = array('status' => $out_stauts, 'msg' => $message);
    echo json_encode($response);
}
?>