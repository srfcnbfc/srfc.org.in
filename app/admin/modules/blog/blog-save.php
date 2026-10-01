<?php

if (!empty($_POST['blog_title']) && !empty($_POST['blog_slug'])) {
    include_once '../../../config/config.php';
    include_once '../../session.php';
    $blog_title = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'blog_title', FILTER_DEFAULT));
    $blog_slug = strtolower(mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'blog_slug', FILTER_DEFAULT)));
    $blog_tag = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'blog_tag', FILTER_DEFAULT));
    $blog_meta_descp = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'blog_meta_descp', FILTER_DEFAULT));
    $blog_descp = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'blog_descp', FILTER_DEFAULT));

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

        $search_query = "SELECT * FROM blog WHERE blog_slug='$blog_slug'";
        $result = mysqli_query($conn, $search_query)or die(mysqli_error());
//print_r($result);
        $num_row = mysqli_num_rows($result);
        if ($num_row > 0) {
            $message = "Blog Post is Already Exist.";
        } else {
            $sql = "INSERT INTO blog (blog_title, blog_slug, blog_tag, blog_img, blog_meta_descp, blog_descp)"
                    . "VALUES ('$blog_title', '$blog_slug', '$blog_tag', '$imgname', '$blog_meta_descp', '$blog_descp')";

            if ($conn->query($sql) === TRUE) {
                $out_stauts = "success";
                $message = "Blog Post is Succesfully Added";
            } else {
                $out_stauts = "warning";
                $message = "Blog Post  Not Added";
            }
        }
        $conn->close();
    } else {
        $out_stauts = "warning";
        $message = "Blog Post Image Uploading Failed !";
    }
    $response[] = array('status' => $out_stauts, 'msg' => $message);
    echo json_encode($response);
}
?>