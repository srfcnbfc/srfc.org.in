<?php

if (!empty($_POST['blog_id'] && !empty($_POST['blog_title']) && !empty($_POST['blog_slug']))) {
    include_once '../../../config/config.php';
    $blog_id = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'blog_id', FILTER_DEFAULT));
    $blog_title = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'blog_title', FILTER_DEFAULT));
    $blog_slug = strtolower(mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'blog_slug', FILTER_DEFAULT)));
    $blog_tag = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'blog_tag', FILTER_DEFAULT));
    $blog_meta_descp = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'blog_meta_descp', FILTER_DEFAULT));
    $blog_descp = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'blog_descp', FILTER_DEFAULT));
    $enableimg = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'enableimg', FILTER_DEFAULT));
    if ($enableimg === 'img_enable') {
        ///////////////////////////////////////////////////////////////////
        $tempDir = "../../../../upload/blog";
        clearstatcache();
        if (!file_exists($tempDir)) {
            mkdir($tempDir, 0777, true);
        }
        $filename = $_FILES['blog_img']['name'];
        // Valid extension
        $valid_ext = array('png', 'jpeg', 'jpg');
        $photoExt1 = @end(explode('.', $filename)); // explode the image name to get the extension
        $phototest1 = strtolower($photoExt1);
        $imgname = $blog_slug . '-' . substr(md5(mt_rand()), 0, 3) . '.' . $phototest1;
        $location = $tempDir . '/' . $imgname;
        $fileextension = pathinfo($location, PATHINFO_EXTENSION);
        $file_extension = strtolower($fileextension);
        if (in_array($file_extension, $valid_ext)) {
            // Compress Image
            compressedImage($_FILES['blog_img']['tmp_name'], $location, 60);
            ///////////////////////////////////////////////////////////////////
        }
        $sql = "UPDATE blog SET blog_title= '$blog_title', blog_slug= '$blog_slug', blog_tag= '$blog_tag', blog_meta_descp= '$blog_meta_descp', blog_descp= '$blog_descp', blog_img='$imgname' WHERE blog_id='$blog_id'";
    } else {
        $sql = "UPDATE blog SET blog_title= '$blog_title', blog_slug= '$blog_slug', blog_tag= '$blog_tag', blog_meta_descp= '$blog_meta_descp', blog_descp= '$blog_descp' WHERE blog_id='$blog_id'";
    }
    $search_query = "SELECT * FROM blog WHERE blog_id='$blog_id'";
    $result = mysqli_query($conn, $search_query)or die(mysqli_error());
//print_r($result);
    $num_row = mysqli_num_rows($result);
    if ($num_row > 0) {
        if ($conn->query($sql) === TRUE) {
            $out_stauts = "success";
            $message = "Blog Post is Succesfully Updated";
        } else {
            $out_stauts = "warning";
            $message = "Blog Post  Not Update";
        }
    } else {
        $out_stauts = "warning";
        $message = "Blog Post  Not Available";
    }
    $conn->close();

    $response[] = array('status' => $out_stauts, 'msg' => $message);
    echo json_encode($response);
}
?>