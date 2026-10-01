<?php
if (!empty($_POST['subcategory_name'])) {
    include_once '../../../config/config.php';
    $category_code = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'category_code', FILTER_DEFAULT));
    $subcategory_code = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'subcategory_code', FILTER_DEFAULT));
    $subcategory_name = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'subcategory_name', FILTER_DEFAULT));
    $subcategory_description = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'subcategory_description', FILTER_DEFAULT));
    $enableimg = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'enableimg', FILTER_DEFAULT));

    if ($enableimg === 'img_enable') {
        ///////////////////////////////////////////////////////////////////
        $tempDir = "../../../../upload/subcategory";
        clearstatcache();
        if (!file_exists($tempDir)) {
            mkdir($tempDir, 0777, true);
        }
        $filename = $_FILES['subcategory_img']['name'];
        // Valid extension
        $valid_ext = array('png', 'jpeg', 'jpg');
        $photoExt1 = @end(explode('.', $filename)); // explode the image name to get the extension
        $phototest1 = strtolower($photoExt1);
    $imgname = $slug.'-'.substr(md5(mt_rand()), 0, 3).'.'.$phototest1;
    $location = $tempDir . '/' . $imgname;
        $fileextension = pathinfo($location, PATHINFO_EXTENSION);
        $file_extension = strtolower($fileextension);
        if (in_array($file_extension, $valid_ext)) {
            // Compress Image
            compressedImage($_FILES['subcategory_img']['tmp_name'], $location, 60);
            ///////////////////////////////////////////////////////////////////
        }
        $sql = "UPDATE subcategory SET category_code='$category_code', subcat_name='$subcategory_name', subcat_desp='$subcategory_description', subcat_img='$imgname' WHERE subcat_code='$subcategory_code'";
    } else {
        $sql = "UPDATE subcategory SET category_code='$category_code', subcat_name='$subcategory_name', subcat_desp='$subcategory_description' WHERE subcat_code='$subcategory_code'";
   }
    $search_query = "SELECT * FROM subcategory WHERE subcat_code='$subcategory_code'";
    $result = mysqli_query($conn, $search_query)or die(mysqli_error());
//print_r($result);
    $num_row = mysqli_num_rows($result);
    if ($num_row > 0) {
        if ($conn->query($sql) === TRUE) {
            $out_stauts = "success";
            $message = "SubCategory is Succesfully Updated";
        } else {
            $out_stauts = "warning";
            $message = "SubCategory  Not Update";
        }
    } else {
        $out_stauts = "warning";
        $message = "SubCategory  Not Available";
    }
    $conn->close();

    $response[] = array('status' => $out_stauts, 'msg' => $message);
    echo json_encode($response);
}
?>