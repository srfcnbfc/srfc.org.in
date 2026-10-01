<?php
if (!empty($_POST['category_id'] && !empty($_POST['category_name']))) {
    include_once '../../../config/config.php';
    $category_code = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'category_id', FILTER_DEFAULT));
    $category_slug = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'category_slug', FILTER_DEFAULT));
    $category_name = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'category_name', FILTER_DEFAULT));
    $enableimg = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'enableimg', FILTER_DEFAULT));

    if ($enableimg === 'img_enable') {
        ///////////////////////////////////////////////////////////////////
        $tempDir = "../../../../upload/icon";
        clearstatcache();
        if (!file_exists($tempDir)) {
            mkdir($tempDir, 0777, true);
        }
        $filename = $_FILES['category_img']['name'];
        // Valid extension
        $valid_ext = array('png', 'jpeg', 'jpg');
        $photoExt1 = @end(explode('.', $filename)); // explode the image name to get the extension
        $phototest1 = strtolower($photoExt1);
        $imgname = $category_slug . '-' . substr(md5(mt_rand()), 0, 3) . '.' . $phototest1;
        $location = $tempDir . '/' . $imgname;
        $fileextension = pathinfo($location, PATHINFO_EXTENSION);
        $file_extension = strtolower($fileextension);
        if (in_array($file_extension, $valid_ext)) {
            // Compress Image
            compressedImage($_FILES['category_img']['tmp_name'], $location, 60);
            ///////////////////////////////////////////////////////////////////
        }
        $sql = "UPDATE category SET category_name='$category_name',category_slug='$category_slug', category_icon='$imgname' WHERE category_id='$category_code'";
    } else {
        $sql = "UPDATE category SET category_name='$category_name',category_slug='$category_slug' WHERE category_id='$category_code'";
    }
    $search_query = "SELECT * FROM category WHERE category_id='$category_code'";
    $result = mysqli_query($conn, $search_query)or die(mysqli_error());
//print_r($result);
    $num_row = mysqli_num_rows($result);
    if ($num_row > 0) {
        if ($conn->query($sql) === TRUE) {
            $out_stauts = "success";
            $message = "Category is Succesfully Updated";
        } else {
            $out_stauts = "warning";
            $message = "Category  Not Update";
        }
    } else {
        $out_stauts = "warning";
        $message = "Category  Not Available";
    }
    $conn->close();

    $response[] = array('status' => $out_stauts, 'msg' => $message);
    echo json_encode($response);
}
?>