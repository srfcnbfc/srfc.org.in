<?php

if (!empty($_POST['video_title'])) {
    include_once '../../../config/config.php';
    $video_title = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'video_title', FILTER_DEFAULT));
    $video_link = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'video_link', FILTER_DEFAULT));
    $video_category = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'video_category', FILTER_DEFAULT));
    ///////////////////////////////////////////////////////////////////
    $tempDir = "../../../../upload/tutorial-video";
    clearstatcache();
    if (!file_exists($tempDir)) {
        mkdir($tempDir, 0777, true);
    }
    $filename = $_FILES['video_img']['name'];
    // Valid extension
    $valid_ext = array('png', 'jpeg', 'jpg');
    $photoExt1 = @end(explode('.', $filename)); // explode the image name to get the extension
    $phototest1 = strtolower($photoExt1);
    $imgname = 'video-' . substr(md5(mt_rand()), 0, 3) . '.' . $phototest1;
    $location = $tempDir . '/' . $imgname;
    $fileextension = pathinfo($location, PATHINFO_EXTENSION);
    $file_extension = strtolower($fileextension);
    if (in_array($file_extension, $valid_ext)) {
        // Compress Image
        compressedImage($_FILES['video_img']['tmp_name'], $location, 60);
        ///////////////////////////////////////////////////////////////////

        $search_query = "SELECT * FROM video_tutorial WHERE video_thumb='$imgname'";
        $result = mysqli_query($conn, $search_query)or die(mysqli_error());
//print_r($result);
        $num_row = mysqli_num_rows($result);
        if ($num_row > 0) {
            $message = "Video is Already Exist.";
        } else {
            $sql = "INSERT INTO video_tutorial (video_title, video_thumb, video_link, video_category)"
                    . "VALUES ( '$video_title', '$imgname', '$video_link','$video_category')";

            if ($conn->query($sql) === TRUE) {
                $out_stauts = "success";
                $message = "Video is Succesfully Added";
            } else {
                $out_stauts = "warning";
                $message = "Video  Not Added";
            }
        }
        $conn->close();
    } else {
        $out_stauts = "warning";
        $message = "Video Image Uploading Failed !";
    }
    $response[] = array('status' => $out_stauts, 'msg' => $message);
    echo json_encode($response);
}
?>

