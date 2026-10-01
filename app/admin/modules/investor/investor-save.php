<?php

if (!empty($_POST['investor_name'])) {
    include_once '../../../config/config.php';
    $investor_name = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'investor_name', FILTER_DEFAULT));
    
    ///////////////////////////////////////////////////////////////////
    $tempDir = "../../../../upload/investor";
    clearstatcache();
    if (!file_exists($tempDir)) {
        mkdir($tempDir, 0777, true);
    }
    $filename = $_FILES['investor_img']['name'];
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
        compressedImage($_FILES['investor_img']['tmp_name'], $location, 5);
        ///////////////////////////////////////////////////////////////////

        $search_query = "SELECT * FROM investor WHERE investor_name='$investor_name'";
        $result = mysqli_query($conn, $search_query)or die(mysqli_error());
//print_r($result);
        $num_row = mysqli_num_rows($result);
        if ($num_row > 0) {
            $message = "Investor is Already Exist.";
        } else {
            $sql = "INSERT INTO investor (investor_name, investor_img)"
                    . "VALUES ('$investor_name', '$imgname')";

            if ($conn->query($sql) === TRUE) {
                $out_stauts = "success";
                $message = "Investor is Succesfully Added";
            } else {
                $out_stauts = "warning";
                $message = "Investor  Not Added";
            }
        }
        $conn->close();
    } else {
        $out_stauts = "warning";
        $message = "Investor Image Uploading Failed !";
    }
    $response[] = array('status' => $out_stauts, 'msg' => $message);
    echo json_encode($response);
}
?>