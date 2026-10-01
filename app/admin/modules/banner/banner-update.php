<?php
if (!empty($_POST['banner_headline'])) {
     include_once '../../../config/config.php';
    $banner_top_msg = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'banner_top_msg', FILTER_DEFAULT));
    $banner_headline = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'banner_headline', FILTER_DEFAULT));
    $banner_btm_msg = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'banner_btm_msg', FILTER_DEFAULT));
    $banner_button = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'banner_button', FILTER_DEFAULT));
    $banner_button_link = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'banner_button_link ', FILTER_DEFAULT));
    ///////////////////////////////////////////////////////////////////
    $tempDir = "../../../../upload/slider";
    clearstatcache();
    if (!file_exists($tempDir)) {
        mkdir($tempDir, 0777, true);
    }
    $filename = $_FILES['banner_img']['name'];
    // Valid extension
    $valid_ext = array('png', 'jpeg', 'jpg');
    $photoExt1 = @end(explode('.', $filename)); // explode the image name to get the extension
    $phototest1 = strtolower($photoExt1);
    $imgname = 'banner-'.substr(md5(mt_rand()), 0, 3).'.'.$phototest1;
    $location = $tempDir . '/' . $imgname;
    $fileextension = pathinfo($location, PATHINFO_EXTENSION);
    $file_extension = strtolower($fileextension);
    if (in_array($file_extension, $valid_ext)) {
        // Compress Image
        compressedImage($_FILES['banner_img']['tmp_name'], $location, 60);
        ///////////////////////////////////////////////////////////////////

        $search_query = "SELECT * FROM banner WHERE banner_img='$imgname'";
        $result = mysqli_query($conn, $search_query)or die(mysqli_error());
//print_r($result);
        $num_row = mysqli_num_rows($result);
        if ($num_row > 0) {
            $message = "Banner is Already Exist.";
        } else {
            $sql = "INSERT INTO banner (banner_img, banner_top_msg, banner_headline, banner_btm_msg, banner_button, banner_button_link)"
                    . "VALUES ( '$imgname', '$banner_top_msg', '$banner_headline','$banner_btm_msg', '$banner_button', '$banner_button_link')";

            if ($conn->query($sql) === TRUE) {
                $out_stauts="success";
                $message = "Banner is Succesfully Added";
            } else {
                $out_stauts="warning";
                $message = "Category  Not Added";
            }
        }
        $conn->close();
    } else {
    $out_stauts ="warning";
    $message= "Banner Image Uploading Failed !";
    }
    $response[] = array('status' => $out_stauts, 'msg' => $message);
    echo json_encode($response);
}
?>

