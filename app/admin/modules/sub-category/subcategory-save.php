<?php
if (!empty($_POST['subcategory_name'] && !empty($_POST['subcategory_description']))) {
    include_once '../../../config/config.php';
    $category_code = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'category_code', FILTER_DEFAULT));
    $subcategory_name = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'subcategory_name', FILTER_DEFAULT));
   $subcategory_description = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'subcategory_description', FILTER_DEFAULT));
    $subcategory_status = "ACTIVE";
    $subcategory_code = 'SUBCAT-' . substr(md5(mt_rand()), 0, 7);

     $slug = sanitize($subcategory_name);
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

        $search_query = "SELECT * FROM subcategory WHERE subcat_code='$subcategory_code'";
        $result = mysqli_query($conn, $search_query)or die(mysqli_error());
//print_r($result);
        $num_row = mysqli_num_rows($result);
        if ($num_row > 0) {
            $message = "Category is Already Exist.";
        } else {
            $sql = "INSERT INTO subcategory (category_code, subcat_code,  subcat_name,  subcat_desp, subcat_img, subcat_status)"
                    . "VALUES ('$category_code','$subcategory_code', '$subcategory_name', '$subcategory_description', '$imgname',  '$subcategory_status')";

            if ($conn->query($sql) === TRUE) {
                $out_stauts="success";
                $message = "SubCategory is Succesfully Added";
            } else {
                $out_stauts="warning";
                $message = "SubCategory  Not Added";
            }
        }
        $conn->close();
    } else {
    $out_stauts ="warning";
    $message= "SubCategory Image Uploading Failed !";
    }
    $response[] = array('status' => $out_stauts, 'msg' => $message);
    echo json_encode($response);
}
?>